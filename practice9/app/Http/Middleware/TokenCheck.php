<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;

class TokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = trim($request->header('X-Authorization'));
        $token = str_replace("Bearer ","",$token);
        
        if(User::where('access_token',$token)->exists()){
            $request->attributes->set('user_token', $token);
            return $next($request);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"MSG_INVALID_ACCESS_TOKEN"
            ],401);
        }
    }
}
