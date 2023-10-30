<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view ('site/home');
    // $_SESSION['account']['level']=1;
    // $_SESSION['Quyen_Han']['ql_sanpham']=1;
    // $_SESSION['Quyen_Han']['ql_donhang']=1;
    // $_SESSION['Quyen_Han']['ql_taikhoan']=1;
    //trong laravel doi thanh session
    // session(['account.level'=> 1]);
    // session(['phanquyen.ql_product'=> 1]);
    // session(['phanquyen.ql_category'=> 1]);
    // session(['phanquyen.ql_order'=> 1]);
    // session(['phanquyen.ql_ql_user'=> 1]);

    if(session()->has('account.level')){
        if(session('account.level')==1){
            return redirect('/admin/home/home');
        }elseif(session('account.level')==2){
            return redirect('/site/home/home');
        }else{
            echo"lv3";
        }
    }else{
        echo"di vao admin";
    }
});
Route::prefix("/")->group(__DIR__. "/auth/Auth.php");
// Route::get('/get',[TestController::class,'test']);
// Route::get('/login',[TestController::class,'go']);
//admin
Route::prefix("/")->group(__DIR__."/admin/HomeAdmin.php");
Route::prefix("/")->group(__DIR__."/admin/CategoryAdmin.php");
Route::prefix("/")->group(__DIR__."/admin/ProductAdmin.php");
Route::prefix("/")->group(__DIR__."/admin/OrderAdmin.php");
Route::prefix("/")->group(__DIR__."/admin/UserAdmin.php");
Route::prefix("/")->group(__DIR__."/admin/ClientAdmin.php");
Route::prefix("/")->group(__DIR__."/admin/QuyenhanAdmin.php");
//site
Route::prefix("/")->group(__DIR__."/site/HomeSite.php");
Route::prefix("/")->group(__DIR__."/site/ProductSite.php");
Route::prefix("/")->group(__DIR__."/site/CartSite.php");
Route::prefix("/")->group(__DIR__."/site/Order.php");
Route::prefix("/")->group(__DIR__."/site/Search.php");