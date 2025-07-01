<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
class AuthController extends Controller
{
    public function home(Request $request){
        $result = AuthService::login($request);
        if($request->expectsJson()){

        }else{

        }
    }
    public function login(Request $request){

    }
    public function register(Request $request){

    }
    public function logout(Request $request){

    }
    
}
