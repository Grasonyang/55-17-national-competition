<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Gtin;
class ManageController extends Controller
{
    public function page_admin_manage_company(Request $request){
        $companys = Company::where("status",true)->get();
        return view("manage.admin.company", ["companys"=>$companys]);
    }
    public function page_admin_manage_stop_company(Request $request){
        $companys = Company::where("status",false)->get();
        return view("manage.admin.stopCompany", ["companys"=>$companys]);
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
        $products = Product::where("status",true)->get();
        // dd($products);
        foreach($products as $product){
            if(isset($product->product_images[0]))
                $product->show_image = $product->product_images[0]->image_url;
            else
                $product->show_image = "default.png";
        }
        // dd($products);
        return view("manage.admin.product", ["products"=>$products]);
    }
    public function page_admin_manage_one_product(Request $request, $gtin){
        $product = Product::where("gtin",$gtin)->first();
        $companys = Company::where("status",true)->get();
        if(isset($product->product_images[0]))
            $product->show_image = $product->product_images[0]->image_url;
        else
            $product->show_image = "default.png";
        // dd($products);
        return view("manage.admin.showProduct", ["product"=>$product, "companys"=>$companys]);
    }
    public function action_admin_manage_product_add(Request $request){
        $request->validate([
            'name'=>"required",
            'name_in_french'=>"required",
            'description'=>"required",
            'description_in_french'=>"required",
            'brand'=>"required",
            'origin'=>"required",
            'gross_weight'=>"required",
            'net_content_weight'=>"required",
        ]);
        $gtin = Gtin::generate();
        $product=Product::create([
            'gtin'=>$gtin,
            'name'=>$request->input('name'),
            'name_in_french'=>$request->input('name_in_french'),
            'description'=>$request->input('description'),
            'description_in_french'=>$request->input('description_in_french'),
            'brand'=>$request->input('brand'),
            'origin'=>$request->input('origin'),
            'gross_weight'=>$request->input('gross_weight'),
            'net_content_weight'=>$request->input('net_content_weight'),
            'weight_unit'=>$request->input('weight_unit') || 'g',
        ]);
        if($request->hasFile('image')){
            $images = $request->file('image');
            foreach($images as $image){
                $path = $image->store('product_images', 'public');
                $product->product_images()->create([
                    "product_id" => $gtin,
                    'image_url' => $path
                ]);
            }
        }
        if(!$product){
            return redirect()->route('admin.manage.product')->with("error","新增產品失敗!!!");
        }
        return redirect()->route('admin.manage.product')->with("success","新增產品成功!!!");
    }
    public function action_admin_manage_product_add_company(Request $request){
        $product = Product::where("gtin",$request->input('product_id'))->first();
        if(!$product){
            return redirect()->route('admin.manage.product')->with("error","產品選擇失敗!!!");
        }
        // dd($request->input('company_id'));
        $product->company_id = $request->input('company_id');
        $product->save();
        return redirect()->route('admin.manage.product')->with("success","產品選擇成功!!!");
    }
    public function action_admin_manage_product_edit(Request $request){
        $request->validate([
            'name'=>"required",
            'name_in_french'=>"required",
            'description'=>"required",
            'description_in_french'=>"required",
            'brand'=>"required",
            'origin'=>"required",
            'gross_weight'=>"required",
            'net_content_weight'=>"required",
        ]);
        $product=Product::where("gtin",$request->input('product_id'))->first();
        if(!$product){
            return redirect()->route('admin.manage.product')->with("error","修改產品失敗!!!");
        }
        $product->update([
            'gtin'=>$request->input('product_id'),
            'name'=>$request->input('name'),
            'name_in_french'=>$request->input('name_in_french'),
            'description'=>$request->input('description'),
            'description_in_french'=>$request->input('description_in_french'),
            'brand'=>$request->input('brand'),
            'origin'=>$request->input('origin'),
            'gross_weight'=>$request->input('gross_weight'),
            'net_content_weight'=>$request->input('net_content_weight'),
            'weight_unit'=>$request->input('weight_unit') || 'g',
        ]);
        $product->product_images()->delete(); // 刪除舊的圖片
        if($request->hasFile('image')){
            $images = $request->file('image');
            foreach($images as $image){
                $path = $image->store('product_images', 'public');
                $product->product_images()->create([
                    "product_id" => $request->input('product_id'),
                    'image_url' => $path
                ]);
            }
        }
        if($request->input('image_url')){
            $images = $request->input('image_url');
            foreach($images as $image){
                $product->product_images()->create([
                    "product_id" => $request->input('product_id'),
                    'image_url' => $image
                ]);
            }
        }

        return redirect()->route('admin.manage.product')->with("success","修改產品成功!!!");
    }
    public function action_admin_manage_product_delete(Request $request){
        $product = Product::where("gtin",$request->input('product_id'))->first();
        $product->forceDelete();
        if(!$product){
            return redirect()->route('admin.manage.product')->with("error","刪除產品失敗!!!");
        }
        return redirect()->route('admin.manage.product')->with("success","刪除產品成功!!!");
    }
    public function action_admin_manage_product_stop(Request $request){
        $product = Product::where("gtin",$request->input('product_id'))->first();
        $product->status = false;
        // dd($product);
        $product->save();
        if(!$product){
            return redirect()->route('admin.manage.product')->with("error","停用產品失敗!!!");
        }
        return redirect()->route('admin.manage.product')->with("success","停用產品成功!!!");
    }
    public function page_admin_manage_stop_product(Request $request){
        $products = Product::where("status",false)->get();
        return view("manage.admin.stopProduct", ["products"=>$products]);
    }






    public function page_user_manage(Request $request){

    }
    
}
