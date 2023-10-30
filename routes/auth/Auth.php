<?php
use App\Http\Controllers\auth\LoginAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix("/login")->group(function(){
    Route::get("/showViewlogin",[LoginAuthController::class,'showViewlogin'])->name("showViewlogin");
    Route::post("/xl_login",[LoginAuthController::class,'login'])->name("login");
});

Route::get("/logout", [LoginAuthController::class, "logout"]);
?>