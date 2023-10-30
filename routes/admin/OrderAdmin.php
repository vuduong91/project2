<?php
use App\Http\Controllers\admin\OrderAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/order")->middleware("checkQuyenOrder")->group(function(){
    Route::get  ("/giohang",[OrderAdminController::class, "list"])->name("listAllOrder");
    Route::get  ("/show/{id}", [OrderAdminController::class, "show"]);
    Route::post ("/updateOrder/{id}", [OrderAdminController::class, "update"]);
    Route::get  ("/deletedOrder/{id}", [OrderAdminController::class, "deleteOrder"]);
    Route::get  ("/selectedOrder/{status}", [OrderAdminController::class, "SelectedOrder"]);
});
?>  