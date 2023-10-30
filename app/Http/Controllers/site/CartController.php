<?php

namespace App\Http\Controllers\site;

use Carbon\Carbon;
use App\Models\adminAuth;
use App\Models\usertAuth;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function show(){
        if(Auth::guard("client")->check()){
            $count = Cart::where("isDeleted", "!=", 0)->where("client_id", Auth::guard("client")->user()->id)->count();
            // trường hợp 1; tài khoản chưa có giỏ hàng
            if($count == 0){
                $cart = new Carts();
                $cart->created_at = Carbon::now();
                $cart->updated_at = Carbon::now();
                $cart->client_id = Auth::guard("client")->user()->id;
                $cart->isDeleted = 1;
                $cart->save();
            }
            // trường hợp 2: tài khoản đã có giỏ hàng
            $data['carts'] = Cart::join("cartdetail", "cartdetail.cart_id", "=", "carts.id")
                                ->join("productdetail", "productdetail.id", "=", "cartdetail.productdetail_id")
                                ->join("product", "product.id", "=", "productdetail.product_id")
                                ->select("cartdetail.*", "productdetail.ha_sp","productdetail.cost","productdetail.id as product_id", "product.name_sp")
                                ->where("carts.client_id", "=", Auth::guard("client")->user()->id)
                                ->where("cartdetail.isDeleted","!=",0)
                                ->where("productdetail.isDeleted","!=",0)
                                ->where("productdetail.status","!=",0)
                                ->paginate(12);
            $data['Idcart'] = Cart::where("client_id", "=", Auth::guard("client")->user()->id)->first();
            return view("site/shoppingcart/shoppingcart", ["data" => $data]);
        }
        return redirect("/login/showViewlogin");
    }
    public function addCartDetail(Request $request, $id){
        if(Auth::guard("client")->check()){
            if($this->checkProductInCart($id)){
            $cart= CartDetail::join("carts","cartdetail.cart_id","=","carts.id")
            ->where("carts.client_id","=",Auth::guard('client')->user()->id)
            ->where("cartdetail.productdetail_id","=",$id)
            ->first();
            $quanityCurrent = $this->getCountProductInCart($id);
            $updatedQuantity = $request->qty;
            $sum = $quanityCurrent + $updatedQuantity;
            $quanityProductMax = $this->getCoutProductInProduct($id);
            if($sum <= $quanityProductMax){
                        }else{
                            $sum = $quanityProductMax;
                        }
            DB::table('cartdetail')
                        ->join('carts', 'cartdetail.cart_id', '=', 'carts.id')
                        ->where('carts.client_id', '=', Auth::guard('client')->user()->id)
                        ->where('cartdetail.productdetail_id', '=', $id)
                        ->update(['quanlity' => $sum]);
                    notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                    return redirect()->back();
            }else{
                $this->addNewProductInCart($id, $request->qty);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }
        }
    }

    private function checkProductInCart($idProduct){
        $count = Cart::join("cartdetail", "cartdetail.cart_id", "=", "carts.id")
                        ->where("cartdetail.productdetail_id", "=", $idProduct)
                        ->where("carts.client_id", "=", Auth::guard("client")->user()->id)
                        ->count();
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }

    private function getCountProductInCart($idProduct){
        $cart = CartDetail::join("carts", "cartdetail.cart_id", "=", "carts.id")
                                ->where("carts.client_id", "=", Auth::guard("client")->user()->id)
                                ->where("cartdetail.productdetail_id", "=", $idProduct)
                                ->first();
        return $cart->quanlity;
    }

    private function getCoutProductInProduct($idProduct){
        $product = ProductDetail::where("id", "=", $idProduct)->where("isDeleted", "!=", 0)->first();
        return $product->quanlity;
    }

    private function addNewProductInCart($idProduct, $quanityAdd){
        $cart = Cart::where("client_id", "=", Auth::guard("client")->user()->id)->first();
        $cart_detail = new CartDetail();
        $cart_detail->cart_id = $cart->id;
        $cart_detail->productdetail_id = $idProduct;
        $cart_detail->quanlity = $quanityAdd;
        $cart_detail->created_at = Carbon::now();
        $cart_detail->updated_at = Carbon::now();   
        $cart_detail->isDeleted = 1;
        $cart_detail->save();
        return redirect()->back();
    }

    public function addCartList($id, $quanity){
        $idProduct = $id;
        $quanityAdd = $quanity;
        if(Auth::guard("client")->check()){
            if($this->checkProductInCart($id)){
                // đã có sản phẩm trong giỏ hàng
                // update số lượng 
                // Lấy số lượng sản phẩm có trong giỏ hàng
                $quanityCurrent = $this->getCountProductInCart($idProduct);
                // lấy số lượng vừa thêm vào
                $updatedQuantity = $quanityAdd;
                // tổng số lượng mới
                $sum = $quanityCurrent + $updatedQuantity;
                // lấy số lượng sản phẩm thực tế còn trong kho
                $quanityProductMax = $this->getCoutProductInProduct($idProduct);
                // nếu tổng số lượng mới <= số lượng có sản phẩm trong kho -> số lượng mới giữ nguyên 
                // nếu tổng số lượng mới > số lượng có trong kho -> giỏ hàng chỉ chứa tối đa số lượng sản phẩm có trong kho 
                if($sum <= $quanityProductMax){
                    
                }else{
                    $sum = $quanityProductMax;
                }

                DB::table('cartdetail')
                    ->join('carts', 'cartdetail.cart_id', '=', 'carts.id')
                    ->where('carts.client_id', '=', Auth::guard('client')->user()->id)
                    ->where('cartdetail.productdetail_id', '=', $idProduct)
                    ->update(['quanlity' => $sum]);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }else{
                // chưa có sản phẩm 
                // thêm mới sản phẩm vào giỏ hàng
                $this->addNewProductInCart($idProduct, $quanityAdd);
                notyf()->addSuccess("Thêm vào giỏ hàng thành công !!");
                return redirect()->back();
            }
        }
    }

    public function xl_deleted($idPro, $idCart){
        DB::table("cartdetail")->where("cart_id", "=", $idCart)
                                ->where("productdetail_id", "=", $idPro)
                                ->delete();
        notyf()->addSuccess("Xoá thành công !!");
        return redirect()->back();                       
    }

    /* xem kĩ phần này 2h -> 3h trong rec */ 
    /* xem kĩ phút 2h38-2h44 */
    public function updateCart(Request $request, $idCart){
        $arrQuanity = $request->input('quanlity');

        if (is_array($arrQuanity) || is_object($arrQuanity)) {
            foreach ($arrQuanity as $product_id => $quanityUpdate) {
                DB::table("cartdetail")->where("cart_id", "=", $idCart)
                                        ->where("productdetail_id", "=", $product_id)
                                        ->update([
                                            "updated_at" => Carbon::now(),
                                            "quanlity"    => $quanityUpdate,
                                        ]);
            }
        }
        notyf()->addSuccess("Cập nhật thành công !!");
        return redirect()->back();  
    }

}
