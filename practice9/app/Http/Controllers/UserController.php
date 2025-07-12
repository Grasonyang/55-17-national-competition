<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Response;
use App\Models\User;
use App\Models\user_quota_transaction;
use App\Http\Resources\UserLogin;
use App\Http\Resources\User as UserResponse;
use App\Http\Resources\Quota;

class UserController extends Controller
{
    // api 1 2 3 4 15
    
    public function index(Request $request){
        try{
            // dd($request);
            $request->validate([
                "order_by"=>"in:email,nickname,created_at,quota",
                "order_type"=>"in:asc,desc",
                "page"=>"",
                "page_size"=>"",
            ]);
            $orderBy = $request->input('order_by') ?? 'created_at';
            $orderType = $request->input('order_type') ?? 'desc';
            $page = $request->input('page') ?? 1;
            $pageSize = $request->input('page_size') ?? 10;
            if($orderBy == 'quota'){
                $users = User::withSum('transaction_quotas as quotas', 'value')
                ->orderBy('quotas', $orderType)
                ->paginate($pageSize,['*'],'page',$page);
            }else{
                $users = User::orderBy($orderBy, $orderType)
                ->paginate($pageSize,['*'],'page',$page);
            }
            return Response::json(true, null, UserResponse::collection($users));
        }catch(\Exception $e){
            dd($e);
            return Response::json(false, collect($e->errors())->first()[0]);
        }
    }
    public function update(Request $request){

    }
    public function login(Request $request){
        try{
            // dd($request);
            $request->validate([
                "email"=>"required|email",
                "password"=>"required",
            ]);
            if($user = User::where('email', $request->email)->first()){
                if(password_verify($request->password, $user->password)){
                    $user->access_token = hash("sha256", $user->email);
                    $user->save();
                    return Response::json(true, $data = new UserLogin($user));
                }else{
                    return Response::json(false, "MSG_INVALID_LOGIN");
                }
            }else{
                return Response::json(false, "MSG_INVALID_LOGIN");
            }
        }catch(\Exception $e){
            // dd($e->errors());
            return Response::json(false, collect($e->errors())->first()[0]);
        }
    }
    public function logout(Request $request){
        if($user = User::where('email', $request->attributes->get('user_token'))->first()){
            $user->access_token = null;
            $user->save();
            return Response::json(true, $data = new UserResponse($user));
        }else{
            return Response::json(false, "MSG_INVALID_LOGIN");
        }
    }
    public function register(Request $request){
        try{
            $request->validate([
                "email"=>"required|email|unique:users,email",
                "password"=>"required|string",
                "nickname"=>"required|string",
                "profile_image"=>"image|mimes:jpeg,jpg,png"
            ]);
            $file = null;
            $url = null;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image')->store('images', 'public');
                $url = url('storage/' . $file);
            }
            // dd($url);
            $user = User::create([
                "email"=>$request->input('email'),
                "nickname"=>$request->input('nickname'),
                "password_hash"=>bcrypt($request->input('password')),
                "profile_image"=>$url,
                "type"=>"USER",
            ]);
            // dd($user);
            return Response::json(true, null, new UserResponse($user));
        }catch(\Exception $e){
            // dd($e);
            if(collect($e->errors())->first()[0]=="MSG_INPUT_NAME_DUPLICATE")
                return Response::json(false, "MSG_USER_EXISTS");
            else
            return Response::json(false, collect($e->errors())->first()[0]);
        }
    }
    public function quota(Request $request){
        try{
            $request->validate([
                "order_by"=>"in:created_at",
                "order_type"=>"in:asc,desc",
                "page"=>"integer",
                "page_size"=>"integer",
            ]);
            $order_by = $request->input('order_by')??'created_at';
            $order_type = $request->input('order_type')??'desc';
            $page = $request->input('page')??1;
            $page_size = $request->input('page_size')??10;
            $quota_data = user_quota_transaction::orderBy($order_by, $order_type)
            ->paginate($page_size,['*'],'page',$page);
            $data =[
                "total_count"=> $quota_data->total(),
                "items"=> Quota::collection($quota_data),
            ];
            return Response::json(true, null, $data);
        }catch(\Exception $e){
            dd($e);
            return Response::json(false, collect($e->errors())->first()[0]);
        }
    }
}
