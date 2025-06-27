<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == "admin"){
                // 如果是管理員，則繼續請求
                return $next($request);
            }else{
                return redirect()->route('home')->with("error","你沒有權限!!!");
            }
        }else{
            return redirect()->route('login')->with("error","尚未登入!!!");
        }


        return $next($request);
    }
}
