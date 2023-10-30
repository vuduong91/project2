<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function list(){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->select("productdetail.*", "product.name_sp")
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->where("productdetail.status","!=",0)
                                        ->paginate(12);
        // $data['countCart'] = CardDetail::join("cart", "cart.id", "=", "cart_detail.cart_id")
        //                                 ->where("cart.client_id", "=", Auth::guard("client")->user()->id)
        //                                 ->count();
        // san pham yeu thich
        return view("site/listproduct/listproduct", ['data' => $data]);
    }
    
    public function show($id){
        $data['category'] = Category::where("isDeleted", "!=", 0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->join("category", "category.id", "=", "product.category_id")
                                        ->select("productdetail.*", "product.name_sp", "category.nameCatr", "category.id AS cateID")
                                        ->where("productdetail.id", "=", $id)->first();
        $data['product3'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->select("productdetail.*", "product.name_sp")
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->where("product.category_id","=", $data['product']->cateID)
                                        ->limit(3)->get();
        return view("site/listproduct/productdetail" , ["data" => $data]);
    }

    public function selectCategory($id){
        $data['category'] = Category::where("isDeleted","!=",0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->join("category","category.id","=","product.category_id")
                                        ->select("productdetail.*", "product.name_sp")
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->where("category.id","=",$id)
                                        ->paginate(12);
        if(Auth::guard("client")->check()){
            $data['carts'] = CartDetail::join("carts", "carts.id", "=", "cartdetail.cart_id")
                                        ->where("carts.client_id", "=", Auth::guard("client")->user()->id)
                                        ->count();
        }
        return view("site/listproduct/listproduct", ["data" => $data]);
    }
}
