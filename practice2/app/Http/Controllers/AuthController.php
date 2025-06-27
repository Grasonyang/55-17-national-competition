<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function action_login(Request $request){
        if(!Auth::check()){
            $request->validate([
                "email"=>"required|email",
                "password"=>"required|min:8",
            ]);
            if(Auth::attempt([
                "email"=>$request->input("email"),
                "password"=>$request->input("password"),
            ])){
                $user = Auth::user();
                if($user->role == "admin"){
                    return redirect()->route('admin.manage')->with("success","登入成功，歡迎管理員!!!");
                }else if($user->role == "user"){
                    return redirect()->route('user.manage')->with("success","登入成功，歡迎使用者!!!");
                }else{
                    Auth::logout();
                    return redirect()->route('login')->with("error","登入失敗，使用者角色錯誤!!!");
                }
            }else{
                return redirect()->route('login')->with("error","登入失敗，密碼或信箱錯誤!!!"); 
            }
        }else{
            return redirect()->route('home')->with("message","已經登入了!!!");
        }
    }
    public function action_logout(Request $request){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('home')->with("success","登出成功!!!");
        }else{
            return redirect()->route('home')->with("error","尚未登入!!!");
        }
    }
    public function action_registe(Request $request){
        if(!Auth::check()){
            $request->validate([
                "name"=>"required|min:2|max:20",
                "email"=>"required|email",
                "password"=>"required|min:8",
            ]);
            if(User::where('email', $request->input('email'))->exists()){
                return redirect()->route('registe')->with("error","註冊失敗，信箱已被使用!!!");
            }else{
                User::create([
                    "name"=>$request->input("name"),
                    "email"=>$request->input("email"),
                    "password"=>Hash::make($request->input("password")),
                    "role"=>"user", // 預設角色為使用者
                ]);
                return redirect()->route('user.manage')->with("success","註冊成功!!!");
            }
        }else{
            return redirect()->route('home')->with("message","已經登入了!!!");
        }
    }
    public function page_login(Request $request){
        return view('auth.login');
    }
    public function page_registe(Request $request){
        return view('auth.registe');
    }
}
