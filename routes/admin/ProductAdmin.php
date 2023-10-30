<?php
use App\Http\Controllers\admin\ProductAdminController;
use App\Http\Controllers\admin\ProductDetailAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/product")->middleware("checkQuyenproduct")->group(function(){
    Route::get('/list',[ProductAdminController::class,"list_sp"])->name("listProduct");
    Route::get('/add-product',[ProductAdminController::class,"add_sp"]);
    Route::post('/xl_addproduct',[ProductAdminController::class,"xl_addproduct"]);
    Route::get("/editView/{id}",  [ProductAdminController::class, 'editproduct'])                ->name("editProduct");
    Route::post("/xl_edit/{id}",   [ProductAdminController::class, 'xl_editproduct']);
});
Route::prefix("/admin/product_detail")->middleware("checkQuyenproduct")->group(function() {
    Route::get  ("/list_ct/{id}",      [ProductDetailAdminController::class, "list_ct"])          ->name("listProductDetail");
    Route::get  ("/add-productdetail/{id}",   [ProductDetailAdminController::class, "addct"])       ->name("addProductDetail");
    Route::post ("/xl_addct/{id}",    [ProductDetailAdminController::class, "xl_addct"]);
    Route::get  ("/xl_deletect/{id}", [ProductDetailAdminController::class, "xl_deletect"]);
    Route::get  ("/editViewct/{id}",  [ProductDetailAdminController::class, "editViewct"]); 
    Route::post ("/xl_editct/{id}",   [ProductDetailAdminController::class, "xl_editct"]);
});
Route::get("/admin/count/{count}",[ProductAdminController::class, "selectProductMax"]);
?>  