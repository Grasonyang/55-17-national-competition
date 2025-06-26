<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Services\GTIN;
use App\Models\Product_Image;
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
            if(Auth::user()->role=="admin"){
                $users = User::all();
                foreach ($users as $key => $user) {
                    $names = explode('-', $user->name);
                    $user->first_name = $names[0] ?? '';
                    $user->last_name = $names[1] ?? '';
                }
                return view('manage.users', ['users'=>$users]);
            }else{
                return redirect()->route("page.manage")->with('error', 'You didn\'t have permission to access this page');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_users_add(Request $request){
        if(Auth::check()){
            $request->validate([
                'addUser_first_name' => 'required|string|max:255',
                'addUser_last_name' => 'required|string|max:255',
                'addUser_email' => 'required|email',
                'addUser_password' => 'required|min:8',
            ]);
            if(User::where('email', $request->input('email'))->exists()) {
                throw ValidationException::withMessages([
                    'email' => ['Email already exists'],
                ]);
            }else{
                $user = User::create([
                    "name"=> $request->input('addUser_first_name') . '-' . $request->input('addUser_last_name'),
                    "email" => $request->input('addUser_email'),
                    "password" => Hash::make($request->input('addUser_password')),
                    "access_token" => null,
                    "role" => 'user', // Default role
                ]);
                return redirect()->route("page.manage.users")->with('message', 'add user successful');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_users_edit(Request $request){
        if(Auth::check()){
            $user = User::find($request->input('editUser_user_id'));
            if($user){
                $request->validate([
                    'editUser_first_name' => 'required|string|max:255',
                    'editUser_last_name' => 'required|string|max:255',
                    'editUser_email' => 'required|email',
                    'editUser_password' => 'nullable|min:8',
                ]);
                $user->name = $request->input('editUser_first_name') . '-' . $request->input('editUser_last_name');
                $user->email = $request->input('editUser_email');
                $user->password = Hash::make($request->input('editUser_password'));
                $user->save();
                return redirect()->route("page.manage.users")->with('message', 'edit user successful');
            }else{
                return redirect()->route("page.manage.users")->with('error', 'User not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_users_delete(Request $request){
        if(Auth::check()){
            $user = User::find($request->input('deleteUser_user_id'));
            if($user){
                if($user->role!=="admin"){
                    $user->delete();
                    return redirect()->route("page.manage.users")->with('message', 'delete user successful');
                }else{
                    return redirect()->route("page.manage.users")->with('error', 'admin user cannot be deleted');
                }
                
            }else{
                return redirect()->route("page.manage.users")->with('error', 'User not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }

    // mamage companys
    public function page_manage_companys(Request $request){
        if(Auth::check()){
            if($request->input("user_id")!==null){
                $user = User::find($request->input("user_id"));
                $companys = Company::where('is_active', true)->where('user_id',$user->id)->get();
                return view('manage.companys', ['companys' => $companys, "user"=>$user]);
            }else{
                $users = User::all();
                $companys = Company::where('is_active', true)->get();
                return view('manage.companys', ['users'=>$users, 'companys' => $companys]);
            }
            
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_companys_add(Request $request){
        if(Auth::check()){
            $user_id = $request->input('AddCompany_user_id');
            $user = User::find($user_id);
            // dd($request);
            if($user){
                Company::create([
                    'user_id'=>$user->id,
                    'company_name'=>$request->input('AddCompany_company_name'),
                    'company_address'=>$request->input('AddCompany_company_address'),
                    'company_phone'=>$request->input('AddCompany_company_phone'),
                    'company_email'=>$request->input('AddCompany_company_email'),
                    'owner_name'=>$request->input('AddCompany_company_owner_name'),
                    'owner_phone'=>$request->input('AddCompany_company_owner_phone'),
                    'owner_email'=>$request->input('AddCompany_company_owner_email'),
                    'contact_name'=>$request->input('AddCompany_company_contact_owner'),
                    'contact_phone'=>$request->input('AddCompany_company_contact_phone'),
                    'contact_email'=>$request->input('AddCompany_company_contact_email'),
                ]);
                if($request->input("user_type")=="user"){
                    return redirect()->route("page.manage.companys", ["user_id"=>$user->id])->with('message', 'add company successful');
                }else{
                    return redirect()->route("page.manage.companys")->with('message', 'add company successful');
                }
            }else{
                return redirect()->route("page.manage.companys")->with('error', 'User not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_companys_edit(Request $request){
        if(Auth::check()){
            $company_id = $request->input('editCompany_company_id');
            $company = Company::find($company_id);
            if($company){
                $company->update([
                    'company_name'=>$request->input('editCompany_company_name'),
                    'company_address'=>$request->input('editCompany_company_address'),
                    'company_phone'=>$request->input('editCompany_company_phone'),
                    'company_email'=>$request->input('editCompany_company_email'),
                    'owner_name'=>$request->input('editCompany_company_owner_name'),
                    'owner_phone'=>$request->input('editCompany_company_owner_phone'),
                    'owner_email'=>$request->input('editCompany_company_owner_email'),
                    'contact_name'=>$request->input('editCompany_company_contact_owner'),
                    'contact_phone'=>$request->input('editCompany_company_contact_phone'),
                    'contact_email'=>$request->input('editCompany_company_contact_email'),
                ]);
                if($request->input("user_type")=="user"){
                    return redirect()->route("page.manage.companys", ["user_id"=>$company->user->id])->with('message', 'edit company successful');
                }else{
                    return redirect()->route("page.manage.companys")->with('message', 'edit company successful');
                }
            }else{
                return redirect()->route("page.manage.companys")->with('error', 'Company not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_companys_stop(Request $request){
        if(Auth::check()){
            $company_id = $request->input('stopCompany_company_id');
            $company = Company::find($company_id);
            if($company){
                $company->update([
                    'is_active' => false,
                ]);
                if($request->input("user_type")=="user"){
                    return redirect()->route("page.manage.companys", ["user_id"=>$company->user->id])->with('message', 'stop company successful');
                }else{
                    return redirect()->route("page.manage.companys")->with('message', 'stop company successful');
                }
            }else{
                return redirect()->route("page.manage.companys")->with('error', 'Company not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_companys_cancel_stop(Request $request){
        if(Auth::check()){
            $company_id = $request->input('cancelStopCompany_company_id');
            $company = Company::find($company_id);
            if($company){
                $company->update([
                    'is_active' => true,
                ]);
                if($request->input("user_type")=="user"){
                    return redirect()->route("page.manage.companys", ["user_id"=>$company->user->id])->with('message', 'cancel stop company successful');
                }else{
                    return redirect()->route("page.manage.companys")->with('message', 'cancel stop company successful');
                }
            }else{
                return redirect()->route("page.manage.companys")->with('error', 'Company not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function api_manage_companys_delete(Request $request){
        if(Auth::check()){
            $company_id = $request->input('deleteCompany_company_id');
            $company = Company::find($company_id);
            if($company){
                $company->delete();
                if($request->input("user_type")=="user"){
                    return redirect()->route("page.manage.companys", ["user_id"=>$company->user->id])->with('message', 'stop company successful');
                }else{
                    return redirect()->route("page.manage.companys")->with('message', 'stop company successful');
                }
            }else{
                return redirect()->route("page.manage.companys")->with('error', 'Company not found');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function page_manage_stop_companys(Request $request){
        if(Auth::check()){
            if($request->input("user_id")!==null){
                $user = User::find($request->input("user_id"));
                $companys = Company::where('is_active', false)->where('user_id',$user->id)->get();
                return view('manage.stopCompanys', ['companys' => $companys, "user"=>$user]);
            }else{
                $companys = Company::where('is_active', false)->get();
                return view('manage.stopCompanys', ['companys' => $companys]);
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function page_manage_delete_companys(Request $request){
        if(Auth::check()){
            if($request->input("user_id")!==null){
                $user = User::find($request->input("user_id"));
                $companys = Company::onlyTrashed('deleted_at')->where('user_id',$user->id)->get();
                return view('manage.deleteCompanys', ['companys' => $companys, "user"=>$user]);
            }else{
                $companys = Company::onlyTrashed('deleted_at')->get();
                return view('manage.deleteCompanys', ['companys' => $companys]);
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }







    public function page_manage_products(Request $request){
        if(Auth::check()){
            if($request->input("user_id")!==null){
                $user = User::find($request->input("user_id"));
                if($request->input("company_id")!==null){
                    $company = Company::find($request->input("company_id"));
                    if($company && $company->user_id == $user->id){
                        $products = Product::with('product_image')->where('company_id', $company->id)->get();
                        return view('manage.products', ['user'=>$user, 'company'=>$company,'products' => $products]);
                    }else{
                        return redirect()->route("page.manage.products")->with('error', 'Company not found or does not belong to the user');
                    }
                }else{
                    $companys = Company::where('user_id', $request->input("user_id"))->get();
                    $products = Product::with('product_image')->whereIn('company_id', $companys->pluck('id'))->get();
                    return view('manage.products', ['user'=>$user, 'companys'=>$companys,'products' => $products]);
                }
            }else{
                if($request->input("company_id")!==null){
                    $company = Company::find($request->input("company_id"));
                    $products = Product::with('product_image')->where('company_id', $company->id)->get();
                    return view('manage.products', ['products' => $products, 'company'=>$company]);
                }else{
                    $companys = Company::all();
                    $products = Product::with('product_image')->all();
                    return view('manage.products', ['products' => $products, "companys"=>$companys]);
                }
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }
    public function page_manage_products_add(Request $request){
        if(Auth::check()){
            $gtin = new GTIN();
            $gtin_code = $gtin->generate();
            // dd($request->all());
            if($request->input("addProduct_user_id")!==null){
                $user = User::find($request->input("addProduct_user_id"));
                Product::create([
                    'gtin'=> $gtin_code,
                    'company_id'=> $request->input("addProduct_company_id"),
                    'name'=>$request->input('addProduct_name'),
                    'name_in_french'=>$request->input('addProduct_name_in_french'),
                    'description'=>$request->input('addProduct_description'),
                    'description_in_french'=>$request->input('addProduct_description_in_french'),
                    'brand'=>$request->input('addProduct_brand'),
                    'origin'=>$request->input('addProduct_origin'),
                    'gross_weight'=>$request->input('addProduct_gross_weight'),
                    'net_content_weight'=>$request->input('addProduct_net_content_weight'),
                    'weight_unit'=>$request->input('addProduct_weight_unit'),
                ]);
                if ($request->hasFile('addProduct_image')) {
                    $file = $request->file('addProduct_image');
                    $path = $file->store('product_image', 'public');
                } else {
                    $path = 'product_image/default.jpg';
                }
                Product_Image::create([
                    'image_path' => $path,
                    'gtin_id' => $gtin_code,
                ]);
                return redirect()->route("page.manage.products", ["user_id"=>$user->id, "company_id"=>$request->input("addProduct_company_id")])->with('message', 'add product successful');
            }else{
                Product::create([
                    'gtin'=> $gtin_code,
                    'company_id'=> $request->input("addProduct_company_id"),
                    'name'=>$request->input('addProduct_name'),
                    'name_in_french'=>$request->input('addProduct_name_in_french'),
                    'description'=>$request->input('addProduct_description'),
                    'description_in_french'=>$request->input('addProduct_description_in_french'),
                    'brand'=>$request->input('addProduct_brand'),
                    'origin'=>$request->input('addProduct_origin'),
                    'gross_weight'=>$request->input('addProduct_gross_weight'),
                    'net_content_weight'=>$request->input('addProduct_net_content_weight'),
                    'weight_unit'=>$request->input('addProduct_weight_unit'),
                ]);
                if ($request->hasFile('addProduct_image')) {
                    $file = $request->file('addProduct_image');
                    $path = $file->store('product_image', 'public');
                    // dd($path);
                } else {
                    $path = 'product_image/default.jpg';
                }
                Product_Image::create([
                    'image_path' => $path,
                    'gtin_id' => $gtin_code,
                ]);
                return redirect()->route("page.manage.products", ["company_id"=>$request->input("addProduct_company_id")])->with('message', 'add product successful');
            }
        }else{
            return redirect()->route("user.login")->with('error', 'You need to login first');
        }
    }




    
    
}
