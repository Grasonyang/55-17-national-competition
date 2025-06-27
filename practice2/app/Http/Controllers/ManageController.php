<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    public function page_admin_manage_company(Request $request){
        $companys = Company::where("status",true)->get();
        return view("manage.admin.company", ["companys"=>$companys]);
    }

    public function action_admin_manage_company_add(Request $request){
        $request->validate([
            "name"=>"required|unique:companys,name",
            "address"=>"required",
            "phone"=>"required",
            "email"=>"required|email",
            "owner_name"=>"required",
            "owner_address"=>"required",
            "owner_email"=>"required|email",
            "contact_name"=>"required",
            "contact_address"=>"required",
            "contact_email"=>"required|email",
        ]);
        $company=Company::create([
            'name'=> $request->input('name'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone'),
            'email'=> $request->input('email'),
            'owner_name'=> $request->input('owner_name'),
            'owner_address'=> $request->input('owner_address'),
            'owner_email'=> $request->input('owner_email'),
            'contact_name'=> $request->input('contact_name'),
            'contact_address'=> $request->input('contact_address'),
            'contact_email'=> $request->input('contact_email'),
        ]);
        if(!$company){
            return redirect()->route('admin.manage.company')->with("error","新增公司失敗!!!");
        }
        $company->users()->attach(Auth::id());
        return redirect()->route('admin.manage.company')->with("success","新增公司成功!!!");
    }
    public function action_admin_manage_company_edit(Request $request){
        $request->validate([
            "name"=>"required|unique:companys,name",
            "address"=>"required",
            "phone"=>"required",
            "email"=>"required|email",
            "owner_name"=>"required",
            "owner_address"=>"required",
            "owner_email"=>"required|email",
            "contact_name"=>"required",
            "contact_address"=>"required",
            "contact_email"=>"required|email",
        ]);
        $company = Company::find($request->input('company_id'));
        if(!$company){
            return redirect()->route('admin.manage.company')->with("error","修改公司失敗，未找到公司!!!");
        }
        $company->update([
            'name'=> $request->input('name'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone'),
            'email'=> $request->input('email'),
            'owner_name'=> $request->input('owner_name'),
            'owner_address'=> $request->input('owner_address'),
            'owner_email'=> $request->input('owner_email'),
            'contact_name'=> $request->input('contact_name'),
            'contact_address'=> $request->input('contact_address'),
            'contact_email'=> $request->input('contact_email'),
        ]);
        return redirect()->route('admin.manage.company')->with("success","修改公司成功!!!");
    }
    public function action_admin_manage_company_stop(Request $request){
        $company = Company::find($request->input('company_id'));
        if(!$company){
            return redirect()->route('admin.manage.company')->with("error","停用公司失敗，未找到公司!!!");
        }
        $company->status = false;
        $company->save();
        return redirect()->route('admin.manage.company')->with("success","停用公司成功!!!");
    }

    public function page_admin_manage_user(Request $request){
        $users = User::where("role","user")->get();
        return view("manage.admin.user", ["users"=>$users]);
    }
    public function action_admin_manage_user_add(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email",
        ]);
        $user=User::create([
            "name"=>$request->input("name"),
            "email"=>$request->input("email"),
            "password"=>Hash::make($request->input("password")),
        ]);
        if(!$user){
            return redirect()->route('admin.manage.user')->with("error","新增使用者失敗!!!");
        }
        return redirect()->route('admin.manage.user')->with("success","新增使用者成功!!!");
    }
    public function action_admin_manage_user_edit(Request $request){
        
        $user = User::find($request->input('user_id'));
        if($user->email != $request->input('email')){
            $request->validate([
                "name"=>"required",
                "email"=>"required|email|unique:users,email,".$user->id,
            ]);
        }else{
            $request->validate([
                "name"=>"required",
            ]);
        }
        if(!$user){
            return redirect()->route('admin.manage.user')->with("error","修改使用者失敗，未找到使用者!!!");
        }
        if($request->input('password')!=""){
            $user->password = Hash::make($request->input('password'));
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('admin.manage.user')->with("success","修改使用者成功!!!");
    }
    public function action_admin_manage_user_delete(Request $request){
        
        $user = User::find($request->input('user_id'));
        if(!$user){
            return redirect()->route('admin.manage.user')->with("error","刪除使用者失敗，未找到使用者!!!");
        }
        $user->delete();
        return redirect()->route('admin.manage.user')->with("success","刪除使用者成功!!!");
    }
    public function page_admin_manage_product(Request $request){
        dd(1);
    }
    public function page_user_manage(Request $request){

    }
    
}
