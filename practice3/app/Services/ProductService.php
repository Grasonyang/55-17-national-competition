<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;
use App\Models\Product;
use App\Models\ProductImage;

class ProductService{
    protected $validate=[
        "gtin"=>"required|string",
        "company_id"=>"required|integer",
        "name"=>"required|string",
        "name_in_French"=>"required|string",
        "description"=>"required|string",
        "description_in_French"=>"required|string",
        "brand"=>"required|string",
        "origin"=>"required|string",
        "gross_weight"=>"required|integer",
        "net_content_weight"=>"required|integer",
        "weight_unit"=>"required|string",
        "image_urls"=>"array",
        "image_urls.*"=>"required|string|url",
        "upload_image_urls"=>"array",
        "upload_image_urls.*"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",   
    ];
    protected $errors = [
        "*.required" =>"MSG_MISSING_FIELD",
        "*.integer" =>"MSG_WRONG_DATA_TYPE",
        "*.string" =>"MSG_WRONG_DATA_TYPE",
        "*.url" =>"MSG_WRONG_DATA_TYPE",
        '*.array' =>"MSG_WRONG_DATA_TYPE",
        '*.mimes' =>"MSG_INVALID_FILE_FORMAT",
        '*.image' =>"MSG_WRONG_DATA_TYPE",
    ];
    protected $errors_code=[
        "MSG_MISSING_FIELD"=>400,
        "MSG_WRONG_DATA_TYPE"=>400,
        "MSG_INVALID_FILE_FORMAT"=>400,
    ];
    public function res($success,$message=null,$products=null){
        if($success){
            return response()->json([
                'success'=>true,
                'products'=>$products,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => $message
            ], $this->errors_code[$message] ?? 500);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $products = Product::all();
            return $this->res(true, null, $products);
        }else{
            $companyids = Auth()->user()->companies()->pluck('id');
            $products = Product::whereIn('company_id', $companyids)->get();
            return $this->res(true, null, $products);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createoredit(Request $request, $product_id = null)
    {
        try{
            $request->validate($this->validate, $this->errors);
            $request->validate($this->validate, $this->errors);
            // 創建或更新產品
            $productData = $request->except(['image_urls', 'upload_image_urls']);
            $product = Product::updateOrCreate(['gtin' => $request->input('gtin')], $productData);
            
            // 處理圖片：先刪除所有舊圖片，再新增
            $product->images()->delete();
            
            // 處理保留的圖片URLs
            if ($request->has('image_urls')) {
                foreach ($request->input('image_urls') as $imageUrl) {
                    ProductImage::create([
                        'gtin' => $product->gtin,
                        'image_url' => $imageUrl
                    ]);
                }
            }
            
            // 處理新上傳的圖片檔案
            if ($request->hasFile('upload_image_urls')) {
                foreach ($request->file('upload_image_urls') as $file) {
                    $path = $file->store('products', 'public');
                    ProductImage::create([
                        'gtin' => $product->gtin,
                        'image_url' => Storage::url($path)
                    ]);
                }
            }
            
            return $this->res(true, null, $product->load('images'));
            
        } catch(\Exception $e) {
            return $this->res(false, $e->getMessage());
        }
    }

    /**
     * 產品停用
     */
    public function stop(Request $request, Product $product)
    {
        //
    }

    /**
     * 產品刪除
     * if admin force delete
     * else delete
     */
    public function destroy(Product $product)
    {
        //
    }
}