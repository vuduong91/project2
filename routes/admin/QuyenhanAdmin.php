<?php

use App\Http\Controllers\admin\QuyenHanAdminController;
use Illuminate\Support\Facades\Route;
Route::prefix("/admin/quyenhan/")->middleware("checkQuyentk")->group(function(){
    Route::get  ("/list",           [QuyenHanAdminController::class, "list"])        ->name("quyenList");
    Route::get  ("/show/{id}",      [QuyenHanAdminController::class, "show"]);
    Route::post ("/xl_edit/{id}",   [QuyenHanAdminController::class, "xl_edit"]);
});
?>