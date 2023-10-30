<?php
use App\Http\Controllers\admin\CategoryAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/category")->middleware("checkQuyencategory")->group(function(){
    Route::get('/listdm',[CategoryAdminController::class,"list_dm"])->name("listCategory");
    Route::get('/add_category',[CategoryAdminController::class,"adcate"]);
    Route::post('/xl_add',[CategoryAdminController::class,"xl_add"]);
    Route::get('/xl_delete/{id}',[CategoryAdminController::class,"xl_delete"]);
    Route::get('/edit/{id}',[CategoryAdminController::class,"edit"]);
    Route::post('/xl_edit/{id}',[CategoryAdminController::class,"xl_edit"]);
});

// Route::get('/admin/category/listdm',[CategoryAdminController::class,"list_dm"]);

?>  