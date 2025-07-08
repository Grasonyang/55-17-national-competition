<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Services\Token;
class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Token::getToken($request);
        // dd($token);
        try{
            User::where('access_token', $token)->firstOrFail();
            return $next($request);
        }catch(\Exception $e){
            return response()->json([
                "success"=>false,
                "message"=>"MSG_INVALID_ACCESS_TOKEN",
            ],401);
        }   
    }
}
