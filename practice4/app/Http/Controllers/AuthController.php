<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function route_logout(Request $request){
        $result = $this->api_logout($request)->getData();
        if($result->success){
            return redirect()->route('home')->with('message', 'Logout successful');
        }else{
            abort($result->code, $result->message);
        }
    }
    public function route_login(Request $request){
        $result = $this->login($request)->getData();
        if($result->success){
            return redirect()->route('home')->with('message', 'Logout successful');
        }else{
            abort($result->code, $result->message);
        }
    }
    public function route_registe(Request $request){
        $result = $this->registe($request)->getData();
        dd($result);
        if($result->success){
            return redirect()->route('home')->with('message', 'Logout successful');
        }else{
            abort($result->code, $result->message);
        }
    }
    public function api_logout(Request $request){
        Auth::user()->access_token = "";
        Auth::user()->save();
        Auth::logout();
        return response()->json(['success' => true, 'message' => 'Logout successful']);
    }
    public function api_login(Request $request){
        $result = $this->login($request);
        return $result;
    }
    public function api_registe(Request $request){
        return $this->registe($request);
    }
    public function login(Request $request){
        // dd($request->input());
        try{
            $request->validate([
                "email"=>"required|email",
                "password"=>"required",
            ]);
            if(Auth::attempt([
                "email"=>$request->input('email'),
                "password"=>$request->input('password'),
            ])){
                Auth::user()->genAccessToken();
                return response()->json([
                    'success' => true,
                    'user'=> Auth::user(),
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Login failed, please check your email and password.',
                    'code' => 401
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'code' => 401
            ]);
        }
        
    }
    public function registe(Request $request){
        try{
            $request->validate([
                "name"=>"required|string",
                "email"=>"required|email|unique:users,email",
                "password"=>"required",
            ]);
            $user = User::create([
                "name"=>$request->input('name'),
                "email"=>$request->input('email'),
                "password"=>bcrypt($request->input('password')),
            ]);
            Auth::login($user);
            Auth::user()->genAccessToken();
            return response()->json([
                'success' => true,
                'user'=> Auth::user(),
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'code' => 401
            ]);
        }
    }
    
}
