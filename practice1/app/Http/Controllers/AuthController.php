<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function signup(Request $request)
    {
        return view('auth.signup');
    }
    public function api_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            return redirect()->route("test")->with('message', 'Login successful');
        } else {
            throw ValidationException::withMessages([
                'fail' => ['帳號或密碼錯誤'],
            ]);
        }
    }

    public function api_signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $user = User::create([
            "name"=> $request->input('first_name') . '-' . $request->input('last_name'),
            "email" => $request->input('email'),
            "password" => Hash::make($request->input('password')),
            "access_token" => null,
            "role" => 'user', // Default role
        ]);
        Auth::login($user);
        return redirect()->route("test")->with('message', 'sign up successful');
    }
}
