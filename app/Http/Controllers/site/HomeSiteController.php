<?php

namespace App\Http\Controllers\site;

use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeSiteController extends Controller
{
    //
    public function index(){
        $data['category'] = Category::select("category.*")
        ->where("isDeleted","!=",0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->select("productdetail.*", "product.name_sp")
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->paginate(12);
        return view('site/home/home',['data' => $data]);
    }
}
