<?php
use App\Http\Controllers\site\HomeSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/site/home/home',[HomeSiteController::class,"index"]);

?>  