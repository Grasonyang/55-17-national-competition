<?php

namespace App\Services;
use Illuminate\Http\Request;
class Response{
    public static function json($success, $message=null, $data=null,$code=200){
        // dd($success, $message, $data, $code);
        if($success){
            if($data==null){
                return response()->json([
                    "success"=>$success,
                ],$code);
            }else{
                return response()->json([
                    "success"=>$success,
                    "dara"=>$data,
                ],$code);
            }
        }else{
            // dd([
            //     "success"=>$success,
            //     "message"=>$message,
            // ]);
            return response()->json([
                "success"=>$success,
                "message"=>$message,
            ],$code);
        }
        
    }
}