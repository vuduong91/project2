<?php

namespace App\Http\Middleware\site;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if(Auth::guard('client')->check()){
                return $next($request);
        }
        notyf()->addSuccess('Bạn cần phải đăng nhập');
        return redirect('/login/showViewlogin');
    }
}
