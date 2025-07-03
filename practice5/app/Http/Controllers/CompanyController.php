<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return redirect()->route('company.show',['user_id'=>Auth::user()->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOrUpdate(Request $request, $company_id=null)
    {
        try{
            $request->validate([
                "name"=>"required|string",
                "address"=>"required|string",
                "phone"=>"required|string",
                "email"=>"required|string|email",
                "contact_name"=>"required|string",
                "contact_phone"=>"required|string",
                "contact_email"=>"required|string|email",                
            ]);
            if($company_id===null){
                // add
                
                Company::create([
                    'user_id'=>Auth::user()->id,
                    'name'=>$request->input('name'),
                    'address'=>$request->input('address'),
                    'phone'=>$request->input('phone'),
                    'email'=>$request->input('email'),
                    'contact_name'=>$request->input('contact_name'),
                    'contact_phone'=>$request->input('contact_phone'),
                    'contact_email'=>$request->input('contact_email'),
                ]);
                // dd($request->input());
                return redirect()->route('company');
            }else{
                // edit
                $company = Company::find($company_id);
                $company->update([
                    'name'=>$request->input('name'),
                    'address'=>$request->input('address'),
                    'phone'=>$request->input('phone'),
                    'email'=>$request->input('email'),
                    'contact_name'=>$request->input('contact_name'),
                    'contact_phone'=>$request->input('contact_phone'),
                    'contact_email'=>$request->input('contact_email'),
                ]);
                return redirect()->route('company');
            }
        }catch(\Exception $e){
            abort(400, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $user_id = null)
    {
        if($user_id!==null){
            if(Auth::user()->role==="admin"){
                $companies = Company::where('status', 1)->get();
                return view('company', ["companies"=>$companies]);
            }else{
                $companies =Company::where('status', 1)->where('user_id', $user_id)->get();
                return view('company', ["companies"=>$companies]);
            }
        }else{
            $companies = Company::where('status', 1)->get();
            return view('company', ["companies"=>$companies]);
        }
    }
     /**
     * Display the specified resource.
     */
    public function stop_show(Request $request, $user_id = null)
    {
        if($user_id!==null){
            if(Auth::user()->role==="admin"){
                $companies = Company::where('status', 0)->get();
                return view('stop_company', ["companies"=>$companies]);
            }else{
                $companies =Company::where('status', 0)->where('user_id', $user_id)->get();
                return view('stop_company', ["companies"=>$companies]);
            }
        }else{
            $companies = Company::where('status', 0)->get();
            return view('stop_company', ["companies"=>$companies]);
        }
    }
    /**
     * Stop the specified resource from storage.
     */
    public function stop(Request $request,$company_id=null)
    {
        if($company_id===null){
            abort(400,'No Company id');
        }else{
            $company = Company::find($company_id);
            $company->status = 0;
            $company->save();
            return redirect()->route('company');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $company_id=null)
    {
        if($company_id===null){
            abort(400,'No Company id');
        }else{
            $company = Company::find($company_id);
            if(Auth::user()->role==="admin"){
                $company->forceDelete();
                return redirect()->route('company');
            }else{
                 $company->delete();
                return redirect()->route('company');
            }
        }
    }
}
