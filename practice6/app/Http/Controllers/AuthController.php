<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request){
        try{
            $request->validate([
                "email"=>"required|string|email",
                "password"=>"required|string",
            ]);
            if(Auth::attempt([
                "email"=>$request->input("email"),
                "password"=>$request->input("password")
            ])){
                return view('home');
            }else{
                abort(401,"login fail");
            }
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
    public function register(Request $request){
        try{
            $request->validate([
                "name"=>"required|string",
                "email"=>"required|string|email",
                "password"=>"required|string",
            ]);
            $user=User::create([
                "name"=>$request->input("name"),
                "email"=>$request->input("email"),
                "password"=>Hash::make($request->input("password")),
            ]);
            Auth::login($user);
            return view('home');
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
    public function logout(Request $request){
        try{
            Auth::logout();
            return view('home');
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
}
