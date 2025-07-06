<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $reques, $isStop=false)
    {
        $users = User::all();
        $companies = Company::where('status',!$isStop)
            ->when(Auth::user()->role!=="admin", function ($query){
                $query->where('user_id', Auth::id());
            })->get();
        return view('company',[
            "isStop"=>$isStop,
            "companies"=>$companies,
            "users"=>(Auth::user()->role!=="admin")? [Auth::user()]: $users
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
    public function store(Request $request)
    {
        try{
            $request->validate([
                'user_id'=>"required",
                'name'=>"required|string",
                'address'=>"required|string",
                'phone'=>"required|string",
                'email'=>"required|email|unique:companies,email",
                'contact_name'=>"required|string",
                'contact_number'=>"required|string",
                'contact_address'=>"required|string",
            ]);
            Company::create([
                'user_id'=>$request->input('user_id'),
                'name'=>$request->input('name'),
                'address'=>$request->input('address'),
                'phone'=>$request->input('phone'),
                'email'=>$request->input('email'),
                'contact_name'=>$request->input('contact_name'),
                'contact_number'=>$request->input('contact_number'),
                'contact_address'=>$request->input('contact_address'),
            ]);
            return redirect()->route('company');
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $company_id)
    {
        if($company_id===null)
            abort(402, 'Cant Get Company Id');
        $company = Company::find($company_id);
        if($company===null)
            abort(402, 'Cant Find Company');
        try{
            $request->validate([
                'name'=>"required|string",
                'address'=>"required|string",
                'phone'=>"required|string",
                'email'=>"required|email",
                'contact_name'=>"required|string",
                'contact_number'=>"required|string",
                'contact_address'=>"required|string",
            ]);
            $company->update([
                'name'=>$request->input('name'),
                'address'=>$request->input('address'),
                'phone'=>$request->input('phone'),
                'email'=>$request->input('email'),
                'contact_name'=>$request->input('contact_name'),
                'contact_number'=>$request->input('contact_number'),
                'contact_address'=>$request->input('contact_address'),
            ]);
            return redirect()->route('company');
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
    /**
     * Stop the specified resource in storage.
     */
    public function stop(Request $request, $company_id)
    {
        if($company_id===null)
            abort(402, 'Cant Get Company Id');
        $company = Company::find($company_id);
        if($company===null)
            abort(402, 'Cant Find Company');
        try{
            $company->status = 0;
            $company->save();
            return redirect()->route('company');
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $company_id)
    {
        if($company_id===null)
            abort(402, 'Cant Get Company Id');
        $company = Company::find($company_id);
        if($company===null)
            abort(402, 'Cant Find Company');
        try{
            if(Auth::user()->role=="admin"){
                foreach ($company->products as $product) {
                    $product->product_images()->forceDelete();
                    $product->forceDelete();
                }
                $company->forceDelete();
            }else{
                $company->delete();
            }
            return redirect()->route('company');
        }catch(\Exception $e){
            abort(400,$e->getMessage());
        }
        
    }
}
