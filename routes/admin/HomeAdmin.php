<?php
use App\Http\Controllers\admin\HomeAdminController;
use Illuminate\Support\Facades\Route;
Route::prefix("/admin/home")->middleware("checkQuyentk")->group(function(){
    Route::get  ("/index/{year}",          [HomeAdminController::class, "index"])      ->name("homeAdmin");
});
?>  