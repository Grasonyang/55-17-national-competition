<?php

namespace App\Services;
use Illuminate\Http\Request;
class Token{
    public static function getToken(Request $request){
        $token = $request->header('X-Authorization');
        $access_token = str_replace("Bearer ", "", $token);
        return $access_token;
    }
    public static function genToken(){
        $token = uniqid();
        $token = 'aaa'.$token;
        return $token;
    }
    
}