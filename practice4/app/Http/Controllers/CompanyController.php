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
    public function index()
    {
        
        return redirect()->route('company.show',['user_id'=>Auth::user()->id]);
    }

    /**
     * create or update
     */
    public function store_or_update(Request $request,$company_id=null)
    {
        try{
            if($company_id===null || !($company = Company::find($company_id))){
                $request->validate([
                    'name' =>'required|string',
                    'address'=>'required|string',
                    'phone'=>'required|string',
                    'email'=>'required|string|email|unique:companies,email',
                    'contact_name'=>'required|string',
                    'contact_phone'=>'required|string',
                    'contact_email'=>'required|string|email',
                ]);
                
                Company::create([
                    'user_id' => Auth::user()->id, // Temporarily hardcoded since auth is disabled
                    'name'=>$request->input('name'),
                    'address'=>$request->input('address'),
                    'phone'=>$request->input('phone'),
                    'email'=>$request->input('email'),
                    'contact_name'=>$request->input('contact_name'),
                    'contact_phone'=>$request->input('contact_phone'),
                    'contact_email'=>$request->input('contact_email'),
                ]);
            }else{
                $request->validate([
                    'name' =>'required|string',
                    'address'=>'required|string',
                    'phone'=>'required|string',
                    'email'=>'required|string|email',
                    'contact_name'=>'required|string',
                    'contact_phone'=>'required|string',
                    'contact_email'=>'required|string|email',
                ]);
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
            }
            
            
            return redirect()->route('company.show',['user_id'=>Auth::user()->id])->with('message', 'successfully');
        }catch(\Exception $e){
            abort(400, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $user_id = null)
    {
        // dd($user_id);
        if($user_id){
            $companies = Company::where('user_id', $user_id)->get();
            return view('company',['companies'=>$companies])->with('message', 'Company get successfully');
        }else{
            if(Auth::user()->role==="admin"){
                $companies = Company::all();
                return view('company',['companies'=>$companies])->with('message', 'Company get successfully');
            }else{
                $companies = Company::where('user_id', $user_id)->get();
                return view('company',['companies'=>$companies])->with('message', 'Company get successfully');
            }
        }
    }
    /**
     * Stop the specified resource from storage.
     */
    public function stop(Request $request, $company_id = null)
    {
        if($company_id===null){
            abort(404, 'Company not found');
        }else{
            $company=Company::find($company_id);
            // dd($company);
            if(Auth::user()->role==="user"){
                if($company->user_id !== Auth::user()->id){
                    abort(403, 'You do not have permission to stop this company');
                }
            }
            $company->update(['status' => 0]);
            $company->products()->update(['status' => 0]);
            return redirect()->route('company.show',['user_id'=>Auth::user()->id])->with('message', 'Company stopped successfully');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $company_id = null)
    {
        if($company_id===null){
            abort(404, 'Company not found');
        }else{
            if(Auth::user()->role==="admin"){
                Company::where('id',$company_id)->forceDelete();
                return redirect()->route('company')->with('message', 'Company deleted successfully');
            }else{
                $company=Company::where('id',$company_id);
                if($company->user_id !== Auth::user()->id){
                    abort(403, 'You do not have permission to stop this company');
                }
                $company->delete();
                return redirect()->route('company')->with('message', 'Company deleted successfully');
            }
        }
    }
}
