<?php

namespace App\Http\Middleware\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckQuyenUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('admin')->check()){
            if(Auth::guard('admin')->user()->level ==1){
                return $next($request);
            } else{
                if(Session::get('phanquyen')->ql_user == 1){
                    return $next($request);
                } else{
                    abort(403,"Ban khong co quyen truy cap");
                }
                
            }
        }
        abort(403,"Ban khong co quyen truy cap");
    }
}
