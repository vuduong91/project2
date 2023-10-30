<?php
use App\Http\Controllers\site\LikeController;
use App\Http\Controllers\site\ProductController;
use Illuminate\Support\Facades\Route;
Route::prefix("/site/listproduct")->group(function(){
    Route::get("/list",         [ProductController::class, "list"])             ->name("listProductsite");
    Route::get("/show/{id}",    [ProductController::class, "show"]);
});

Route::prefix("/site/category")->group(function(){
    Route::get("/list/{id}",    [ProductController::class, "selectCategory"]);
});

Route::prefix("/site/like")->group(function(){
    Route::get("/product/{id}", [LikeController::class, "list"]);
    Route::get("/add/{id}",     [LikeController::class, "add"]);
});