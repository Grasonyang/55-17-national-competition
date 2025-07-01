<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService{
    public $validate = [
        'name'=>"string",
        'email'=>"reqeuired|email",
        'password'=>"required|min:8",
    ];
    public $validateMSG = [
        '*.required' => 'MSG_MISSING_FIELD',
        '*.email' => 'MSG_WRONG_DATA_TYPE',
        '*.min' => 'MSG_WRONG_DATA_TYPE',
        '*.stirng' => 'MSG_WRONG_DATA_TYPE',
        '*.exist'=>'MSG_USER_EXISTS',

    ];
    protected $validateCode=[
        "MSG_MISSING_FIELD"=>400,
        "MSG_WRONG_DATA_TYPE"=>400,
    ];
    protected function success(){

    }
    protected function fail(){

    }
    
    public function login(Request $request){
        try{
            $request->validate($this->validate, $this->validateMSG);
        }
        catch (\Exception $e){
            fail($e->getMessage());
        }
    }
    public function register(Request $request){
        try{
            $request->validate($this->validate, $this->validateMSG);
            $request->validate([
                    'name'=>'required'
                ], $this->validateMSG);
            
        }
        catch (\Exception $e){
            fail($e->getMessage());
        }
    }
    public function logout(Request $request){
        try{
            

        }
        catch (\Exception $e){
            fail($e->getMessage());
        }
    }
}