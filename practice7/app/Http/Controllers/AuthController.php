<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User as User;
use App\Http\Resources\User as UserR;
use App\Http\Resources\UserLogin;
use App\Services\Token;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
class AuthController extends Controller
{
    public $wrongCode=[
        "MSG_INVALID_LOGIN"=>403,
        "MSG_MISSING_FIELD"=>400,
        "MSG_WRONG_DATA_TYPE"=>400,
        "MSG_WRONG_IMAGE_FORMAT"=>400,
    ];
    public function login(Request $request){
        try{
            $request->validate([
                "email"=>"required|email",
                "password"=>"required|min:4",
            ]);
            $user = User::where("email", $request->email)->firstOrFail();
            if(Hash::check($request->password, $user->password_hash)){
                $user->access_token = Token::genToken();
                $user->save();
                return Response::json(true,"", new UserLogin($user),200);
            }else{
                return Response::json(false, "MSG_INVALID_LOGIN", null, 403);
            }
        }catch(ModelNotFoundException $e){
            return Response::json(false, "MSG_INVALID_LOGIN", null, 403);
        }catch(ValidationException $e){
            $message = $e->getMessage();
            return Response::json(false, $message, null, $this->wrongCode[$message] ?? 500);
        }
    }
    public function logout(Request $request){
        $token = Token::getToken($request);
        $user = User::where('access_token', $token)->first();
        $user->access_token = null;
        $user->save();
        return Response::json(true, null, null, 200);
    }
    public function register(Request $request){
        try{
            Validator::make($request->all(), [
                "email"=>"required|email",
                "nickname"=>"required|string",
                "password"=>"required|string|min:4",
                "profile_image"=>"required|image|mimes:png,jpg,jpeg",
            ])->validate();
            // dd(1);
            $image = $request->file("profile_image")->store("image",'public');
            $url = Storage::url($image);
            $user= User::create([
                "email"=>$request->email,
                "nickname"=>$request->nickname,
                "password_hash"=>Hash::make($request->password),
                "profile_image"=>$url,
                "type"=>"user"
            ]);
            return Response::json(true,"", new UserR($user),200);
        }catch(ValidationException $e){
            $message = $e->validator->errors()->first();
            // dd($this->wrongCode[$message]);
            return Response::json(false, $message, null, $this->wrongCode[$message] ?? 500);
        }
    }
    
}
