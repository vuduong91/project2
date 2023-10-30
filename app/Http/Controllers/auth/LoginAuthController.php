<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\PhanQuyen;
use App\Models\adminAuth;
use App\Models\usertAuth;
class LoginAuthController extends Controller
{
    //
    public function showViewlogin(){
        return view('site/login/login');
    }
    public function login(REQUEST $request){
        Auth::guard('client')->logout();
        Auth::guard('admin')->logout();
        $email = $request->email;
        $password = $request->password;

        if(Auth::guard('admin')->attempt(["email"=>$email,"password"=>$password])){
            if(Auth::guard('admin')->user()->level == 1){
                notyf()->addSuccess('Dang nhap thanh cong');
                return redirect('/admin/home/index/2023');
            }else if(Auth::guard('admin')->user()->level == 2){
                $quyenhan = Phanquyen::where("admin_id", Auth::guard('admin')->user()->id)->first();
                if(Session::has('phanquyen')){
                    Session::forget('phanquyen');
                } 
                if($quyenhan){
                    Session::put("phanquyen",$quyenhan);
                }
                notyf()->addSuccess('Dang nhap thanh cong');
                return redirect('/admin/home/index/2023');
            }
        } 
        if(Auth::guard('client')->attempt(["email"=>$email,"password"=>$password])){
            notyf()->addSuccess('Dang nhap thanh cong');
            return redirect('/site/home/home');
        } 

        notyf()->addError('Dang nhap that bai');
        return redirect()->route("showViewlogin");
    }
    public function logout(){
        if(Session::has('phanquyen')){
            Session::forget('phanquyen');
        } 
        Auth::guard('client')->logout();
        Auth::guard('admin')->logout();
        return redirect('/site/home/home');    
    }
}
