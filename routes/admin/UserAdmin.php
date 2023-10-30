<?php
use App\Http\Controllers\admin\UserAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/user")->middleware("checkQuyenuser")->group(function(){
    Route::get  ("/ngdung",           [UserAdminController::class, "ngdung"])      ->name("ngdung");
    Route::get  ("/addnv",        [UserAdminController::class, "addView"])   ->name("addNV");
    Route::post ("/xl_addnv",         [UserAdminController::class, "xl_add"]);
    Route::get  ("/show/{id}",      [UserAdminController::class, "showView"]);
    Route::post ("/xl_editnv/{id}",   [UserAdminController::class, "xl_editnv"]);
    Route::get  ("/xl_deletednv/{id}",[UserAdminController::class, "xl_deletednv"]);
});
?>  