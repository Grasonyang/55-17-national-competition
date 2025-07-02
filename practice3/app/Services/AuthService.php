<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthService{
    protected $errors = [
        "*.required" =>"MSG_MISSING_FIELD",
        "*.email" =>"MSG_WRONG_DATA_TYPE",
        "*.min" =>"MSG_PASSWORD_NOT_SECURE",
        '*.email.unique' =>"MSG_USER_EXISTS",
    ];
    protected $errors_code=[
        "MSG_MISSING_FIELD"=>400,
        "MSG_WRONG_DATA_TYPE"=>400,
        "MSG_INVALID_LOGIN"=>403,
        "MSG_USER_EXISTS"=>409,
        "MSG_PASSWORD_NOT_SECURE"=>409,
    ];
    public function res($success,$message=null){
        if($success){
            return response()->json([
                'success'=>true,
                'user'=>Auth::user(),
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => $message
            ], $errors_code[$message] ?? 500);
        }
    }
    public function logout(Request $request){
        try{
            $request->validate([
                "email"=>"requeired|email|unique:users,email",
                "name"=>"requeired",
                "password"=>"requeired|min:8",
            ]);
            $user =User::create([
                "email"=>$request->input('email'),
                "password"=>$request->input('password'),
                "name"=>$request->input('name'),
            ]);
            Auth::login($user);
            return res(true);

        }catch(\Exception $e){
            return res(false, $e->getMessage());
        }
    }
    public function login(Request $request){
        try{
            $request->validate([
                "email"=>"requeired|email",
                "password"=>"requeired",
            ]);
            if(Auth::attempt([
                "email"=>$request->input('email'),
                "password"=>$request->input('password'),
            ])){
                return res(true);
            }else{
                return res(false, "MSG_INVALID_LOGIN");
            }
        }catch(\Exception $e){
            return res(false, $e->getMessage());
        }
    }
    public function register(Request $request){
        try{
            Auth::logout();
            return response()->json([
                'success'=>true,
            ]);
        }catch(\Exception $e){
            return res(false, $e->getMessage());
        }
    }
}