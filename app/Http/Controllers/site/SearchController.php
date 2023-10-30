<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartDetail;
use App\Models\Category;
use App\Models\ProductDetail;
class SearchController extends Controller
{
    //
    public function search(Request $request){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['soluong'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->where("productdetail.status","!=",0)
                                        ->where('product.name_sp', 'like', "%$request->key%")
                                        ->count();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->select("productdetail.*", "product.name_sp")
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->where("productdetail.status","!=",0)
                                        ->where('product.name_sp', 'like', "%$request->key%")
                                        ->orderBy('productdetail.created_at', 'desc')
                                        ->paginate(12);
        if(Auth::guard("client")->check()){
            $data['countCart'] = CartDetail::join("carts", "carts.id", "=", "cartdetail.cart_id")
                                        ->where("carts.client_id", "=", Auth::guard("client")->user()->id)
                                        ->count();
        }
        return view("site/listproduct/listproduct", ['data' => $data]);
    }
}
