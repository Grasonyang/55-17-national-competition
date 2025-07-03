<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $company_id = $request->input('company_id');
        if($company_id===null){  
            return redirect()->route('product.show',['company_id'=> null]);
        }else{
            if(Auth::user()->role==="user"){
                $company = Company::find($company_id);
                if($company==null || $company->user_id !== Auth::user()->id)
                    abort(403, 'Unauthorized action.');
            }
            return redirect()->route('product.show',['company_id'=>$company_id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOrUpdate(Request $request, $product_id=null)
    {
        $company_id = $request->input('company_id');
        // dd($company_id );
        try{
            $request->validate([
                "name"=>"required|string",
                "name_in_f"=>"required|string",
                "description"=>"required|string",
                "description_in_f"=>"required|string",
                "brand"=>"required|string",
                "origin"=>"required|string",
                "gross_weight"=>"required|integer",
                "net_content_weight"=>"required|integer",
                "unit"=>"required|string",
                "images"=>"array",
                "images.*"=>"image|mimes:jpeg,png,jpg,gif,svg",
                "file"=>"array",
                "files.*"=>"image|mimes:jpeg,png,jpg,gif,svg",
            ]);
            if($product_id===null){
                if($company_id===null){
                    abort(400,'No Company id');
                }
                $product = Product::create([
                    'gtin'=>uniqid(),
                    'company_id'=>$company_id,
                    'name'=>$request->input('name'),
                    'name_in_f'=>$request->input('name_in_f'),
                    'description'=>$request->input('description'),
                    'description_in_f'=>$request->input('description_in_f'),
                    'brand'=>$request->input('brand'),
                    'origin'=>$request->input('origin'),
                    'gross_weight'=>$request->input('gross_weight'),
                    'net_content_weight'=>$request->input('net_content_weight'),
                    'unit'=>$request->input('unit'),
                ]);
                if($request->hasFile('files')){
                    foreach($request->file('files') as $file){
                        $path = $file->store('products/'.$product->gtin, 'public');
                        $product->files()->create([
                            'gtin'=>$product->gtin,
                            'image_url'=>asset('storage/'.$path),
                        ]);
                    }
                }
                return redirect()->route('product.show', ['company_id'=>$company_id ?? null]);
            }else{
                $product = Product::find($product_id);
                if($product->company_id !== $company_id){
                    abort(403, 'Unauthorized action.');
                }
                $product->update([
                    'name'=>$request->input('name'),
                    'name_in_f'=>$request->input('name_in_f'),
                    'description'=>$request->input('description'),
                    'description_in_f'=>$request->input('description_in_f'),
                    'brand'=>$request->input('brand'),
                    'origin'=>$request->input('origin'),
                    'gross_weight'=>$request->input('gross_weight'),
                    'net_content_weight'=>$request->input('net_content_weight'),
                    'unit'=>$request->input('unit'),
                ]);
                $product->images()->delete();
                if($request->hasFile('images')){
                    foreach($request->file('images') as $image){
                        $product->images()->create([
                            'gtin'=>$product->gtin,
                            'image_url'=>$image
                        ]);
                    }
                }
                if($request->hasFile('files')){
                    foreach($request->file('files') as $file){
                        $path = $file->store('products/'.$product->gtin, 'public');
                        $product->files()->create([
                            'gtin'=>$product->gtin,
                            'image_url'=>asset('storage/'.$path),
                        ]);
                    }
                }
                return redirect()->route('product.show', ['company_id'=>$company_id ?? null]);
            }
        }catch(\Exception $e){
            abort(400, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $company_id = $request->input('company_id');
        if($company_id!==null){
            if(Auth::user()->role==="admin"){
                $products = Product::where('status', 1)->where('company_id', $company_id)->get();
                return view('product', ["company_id"=>$company_id, "companies"=>null,"products"=>$products]);
            }else{
                $products =Product::where('status', 1)->where('company_id', $company_id)->get();
                return view('product', ["company_id"=>$company_id,"companies"=>null, "products"=>$products]);
            }
        }else{
            if(Auth::user()->role==="admin"){
                $companies = Company::where('status', 1)->get();
                $products = Product::where('status', 1)->get();
                return view('product', ["companies"=>$companies, "products"=>$products]);
            }else{
                $companies = Company::where('status', 1)->where('user_id', Auth::user()->id)->get();
                $products = Product::where('status', 1)->whereIn('company_id', $companies->pluck('id'))->get();
                // dd($products->first());
                return view('product', ["company_id"=>null, "companies"=>$companies, "products"=>$products]);
            }
        }
    }
     /**
     * Display the specified resource.
     */
    public function stop_show(Request $request)
    {
        $company_id = $request->input('company_id');
        if($company_id!==null){
            if(Auth::user()->role==="admin"){
                $products = Product::where('status', 0)->where('company_id', $company_id)->get();
                return view('product', ["company_id"=>$company_id, "companies"=>null,"products"=>$products]);
            }else{
                $products =Product::where('status', 0)->where('company_id', $company_id)->get();
                return view('product', ["company_id"=>$company_id,"companies"=>null, "products"=>$products]);
            }
        }else{
            if(Auth::user()->role==="admin"){
                $companies = Company::where('status', 0)->get();
                $products = Product::where('status', 0)->get();
                return view('product', ["companies"=>$companies, "products"=>$products]);
            }else{
                $companies = Company::where('status', 0)->where('user_id', Auth::user()->id)->get();
                $products = Product::where('status', 0)->whereIn('company_id', $companies->pluck('id'))->get();
                return view('product', ["company_id"=>null, "companies"=>$companies, "products"=>$products]);
            }
        }
    }
    /**
     * Stop the specified resource from storage.
     */
    public function stop(Request $request,$product_id=null)
    {
        $company_id = $request->input('company_id');
        $product = Product::find($product_id);
        $company = Company::find($product->company_id);
        if($company->user_id !== Auth::user()->id && Auth::user()->role!=="admin"){
            abort(403, 'Unauthorized action.');
        }
        $product->status = 0;
        $product->save();
        return redirect()->route('product.show', ['company_id'=>$company_id ?? null]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $product_id=null)
    {
        $company_id = $request->input('company_id');
        $product = Product::find($product_id);
        $company = Company::find($product->company_id);
        if($company->user_id !== Auth::user()->id && Auth::user()->role!=="admin"){
            abort(403, 'Unauthorized action.');
        }
        if(Auth::user()->role=="admin"){
            $product->forceDelete();
        }else{
            $product->delete();
        }
        return redirect()->route('product.show', ['company_id'=>$company_id ?? null]);
    }
}
