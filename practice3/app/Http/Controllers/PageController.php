<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request){
        return view('home');
    }
    public function login(Request $request){
        return view('auth.login');
    }
    public function register(Request $request){
        return view('auth.register');
    }
    
}
