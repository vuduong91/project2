<?php
use App\Http\Controllers\admin\ClientAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/client")->middleware("checkQuyenclient")->group(function(){
    Route::get  ("/listclt",           [ClientAdminController::class, "listclt"])      ->name("client");
    Route::get  ("/addclt",        [ClientAdminController::class, "addViewclt"])   ->name("addClt");
    Route::post ("/xl_addclt",         [ClientAdminController::class, "xl_addclt"]);
    Route::get  ("/showclt/{id}",      [ClientAdminController::class, "showViewclt"]);
    Route::post ("/xl_editclt/{id}",   [ClientAdminController::class, "xl_editclt"]);
    Route::get  ("/xl_deletedclt/{id}",[ClientAdminController::class, "xl_deletedclt"]);
});
?>  