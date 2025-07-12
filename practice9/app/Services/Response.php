<?php

namespace App\Services;

class Response{
    public static function json($success, $message = null, $data = null){
        // dd($message);
        $errors = [
            "MSG_INVALID_LOGIN" => 403,
            "MSG_USER_EXISTS" => 409,
            "MSG_PERMISSION_DENY" => 403,
            "MSG_MISSING_FIELD" => 400,
            "MSG_WRONG_DATA_TYPE" => 400,
            "MSG_WRONG_IMAGE_FORMAT" => 400,
            "MSG_TASK_TYPE_NOT_EXISTS" => 404,
            "MSG_TASK_NOT_EXISTS" => 404,
            "MSG_USER_NOT_EXISTS" => 404,
            "MSG_WORKER_NOT_EXISTS" => 404,
            "MSG_TASK_TYPE_NAME_EXISTS" => 409,
            "MSG_INPUT_NAME_DUPLICATE" => 400,
            "MSG_INSUFFICIENT_QUOTA" => 400,
            "MSG_CANNOT_CANCEL_TASK" => 400,
            
        ];
        if($success){
            return response()->json([
                "success"=>true,
                "data"=>$data
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>$message
            ],$errors[$message]);
        }
    }
}