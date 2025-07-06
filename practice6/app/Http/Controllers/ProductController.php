<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $company_id, $isStop=false)
    {
        if($company_id===null)
            abort(402, 'Cant Get Company Id');
        $company = Company::find($company_id);
        if($company===null)
            abort(402, 'Cant Find Company');
        $products = Product::where('status',!$isStop)->get();
        return view('product',[
            "isStop"=>$isStop,
            "company"=>$company,
            "products"=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $company_id)
    {
        if($company_id===null)
            abort(402, 'Cant Get Company Id');
        $company = Company::find($company_id);
        if($company===null)
            abort(402, 'Cant Find Company');
        try{
            $request->validate([
                "name"=>"required|string",
                "name_in_f"=>"required|string",
                "description"=>"required|string",
                "description_in_f"=>"required|string",
                "brand"=>"required|string",
                "origin"=>"required|string",
                "weight"=>"required|integer",
                "net_weight"=>"required|integer",
                "weight_unit"=>"string",
            ]);
            $product = Product::create([
                "gtin"=>uniqid(),
                "company_id"=>$request->input('company_id'),
                "name"=>$request->input('name'),
                "name_in_f"=>$request->input('name_in_f'),
                "description"=>$request->input('description'),
                "description_in_f"=>$request->input('description_in_f'),
                "brand"=>$request->input('brand'),
                "origin"=>$request->input('origin'),
                "weight"=>$request->input('weight'),
                "net_weight"=>$request->input('net_weight'),
                "weight_unit"=>$request->input('weight_unit'),
            ]);
            if($request->hasFile('files')){
                foreach($request->file('files') as $file){
                    $path = $file->store('images','public');
                    $url = Storage::disk('public')->url($path);
                    ProductImage::create([
                        "product_id"=>$product->gtin,
                        "img_url"=>$url,
                    ]);
                }
            }
            // dd(1);
            return redirect()->route('product', ['company_id'=>$company_id]);
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $company_id, $product_id)
    {
        if($company_id===null)
            abort(402, 'Cant Get Company Id');
        $company = Company::find($company_id);
        if($company===null)
            abort(402, 'Cant Find Company');
        if($product_id===null){
            return redirect()->route('product', ['company_id'=>$company_id]);
        }
        $product = Product::find($product_id);
        if($product===null)
            abort('400', "Product Not Found");
        try{
            $request->validate([
                "name"=>"required|string",
                "name_in_f"=>"required|string",
                "description"=>"required|string",
                "description_in_f"=>"required|string",
                "brand"=>"required|string",
                "origin"=>"required|string",
                "weight"=>"required|integer",
                "net_weight"=>"required|integer",
                "weight_unit"=>"string",
            ]);
            $product->update([
                "name"=>$request->input('name'),
                "name_in_f"=>$request->input('name_in_f'),
                "description"=>$request->input('description'),
                "description_in_f"=>$request->input('description_in_f'),
                "brand"=>$request->input('brand'),
                "origin"=>$request->input('origin'),
                "weight"=>$request->input('weight'),
                "net_weight"=>$request->input('net_weight'),
                "weight_unit"=>$request->input('weight_unit'),
            ]);
            $product->product_images()->delete();
            if($request->hasFile('files')){
                foreach($request->file('files') as $file){
                    $path = $file->store('images','public');
                    $url = Storage::disk('public')->url($path);
                    ProductImage::create([
                        "product_id"=>$product->gtin,
                        "img_url"=>$url,
                    ]);
                }
            }
            if($request->has('urls')){
                foreach($request->input('urls') as $url){
                    ProductImage::create([
                        "product_id"=>$product->gtin,
                        "img_url"=>$url,
                    ]);
                }
            }
            return redirect()->route('product', ['company_id'=>$company_id]);
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function stop(Request $request, $company_id, $product_id)
    {
        if($company_id===null){
            return redirect()->route('company');
        }
        $company = Company::find($company_id);
        if($company===null)
            abort('400', "Company Not Found");
        if($product_id===null){
            return redirect()->route('product', ['company_id'=>$company_id]);
        }
        $product = Product::find($product_id);
        if($product===null)
            abort('400', "Product Not Found");
        $product->status = 0;
        $product->save();
        return redirect()->route('product', ['company_id'=>$company_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $company_id, $product_id)
    {
        if($company_id===null){
            return redirect()->route('company');
        }
        $company = Company::find($company_id);
        if($company===null)
            abort('400', "Company Not Found");
        if($product_id===null){
            return redirect()->route('product', ['company_id'=>$company_id]);
        }
        $product = Product::find($product_id);
        if($product===null)
            abort('400', "Product Not Found");
        try{
            if(Auth::user()->role=="admin"){
                $product->product_images()->forceDelete();
                $product->forceDelete();
            }else{
                $product->delete();
            }
            return redirect()->route('product', ['company_id'=>$company_id]);
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
}
