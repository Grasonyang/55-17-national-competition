<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request){
        try{
            $request->validate([
                "email"=>"required|email|string",
                "password"=>"required|string|min:8",
            ]);
            if(Auth::attempt([
                "email"=>$request->input('email'),
                "password"=>$request->input('password'),
            ])){
                return redirect()->route('home');
            }else{
                abort(400);
            }
        }catch(\Exception $e){
            abort(400);
        }
    }
    public function register(Request $request){
        try{
            $request->validate([
                "name"=>"required|string",
                "email"=>"required|email|string|unique:users,email",
                "password"=>"required|string|min:8",
            ]);
            $user=User::create([
                "name"=>$request->input('name'),
                "email"=>$request->input('email'),
                "password"=>$request->input('password'),
            ]);
            Auth::login($user);
            return redirect()->route('home');
        }catch(\Exception $e){
            abort(400);
        }
    }
    public function logout(Request $request){
        try{
            Auth::logout();
            return redirect()->route('home');
        }catch(\Exception $e){
            abort(400);
        }
    }
}
