<?php

use App\Http\Controllers\site\CartController;
use Illuminate\Support\Facades\Route;

Route::prefix("/site/shoppingcart")->middleware("checkClient")->group(function(){
    Route::get  ("/show",                       [CartController::class, "show"])            ->name("showCard");
    Route::post ("/addDetail/{id}",             [CartController::class, "addCartDetail"]);
    Route::get  ("/addList/{id}/{quanity}",     [CartController::class, "addCartList"]);
    Route::get  ("/deleted/{idPro}/{idCart}",   [CartController::class, "xl_deleted"]);
    Route::post ("/updateCart/{idCart}",        [CartController::class, "updateCart"]);
})

?>