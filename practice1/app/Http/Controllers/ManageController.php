<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ManageController extends Controller
{
    public function page_manage(Request $request){
        if(Auth::check()){
            return view('manage');
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function page_manage_users(Request $request){
        if(Auth::check()){
            $users = User::all();
            return view('manage.users', ['users'=>$users]);
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function page_manage_companys(Request $request){
        if(Auth::check()){
            return view('manage.companys');
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function page_manage_products(Request $request){
        if(Auth::check()){
            return view('manage.products');
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
}
