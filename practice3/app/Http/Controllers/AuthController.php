<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $aS){
        $this->authService = $aS;
    }
    public function logout(Request $request){
        $result = $this->authService->logout($request);
        if($result['success']){
            return redirect()->route('home')->with('message', '登入成功');
        } else {
            throw new \Exception($result['message']);
        }
    }
    public function login(Request $request){
        $result = $this->authService->login($request);
        if($result['success']){
            return redirect()->route('home')->with('message', '登出成功');
        } else {
            throw new \Exception($result['message']);
        }
    }
    public function register(Request $request){
        $result = $this->authService->register($request);
        if($result['success']){
            return redirect()->route('home')->with('message', '註冊成功');
        } else {
            throw new \Exception($result['message']);
        }
    }
}
