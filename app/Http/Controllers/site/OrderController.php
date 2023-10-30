<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\File;

use App\Models\Receiver;
use App\Models\OrderModel;
use App\Models\Paymentmethods;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    //
    public function index($id){
        $data["client"] = Auth::guard("client")->user();
        $data["carts"] = Cart::join("cartdetail", "cartdetail.cart_id", "=", "carts.id")
                            ->join("productdetail", "productdetail.id", "=", "cartdetail.productdetail_id")
                            ->join("product", "product.id", "=", "productdetail.product_id")
                            ->select("cartdetail.*", "productdetail.ha_sp","productdetail.cost","productdetail.id as product_id", "product.name_sp")
                            ->where("carts.client_id", "=", $id)
                            ->where("productdetail.isDeleted", "!=", 0)
                            ->where("productdetail.status", "!=", 0)
                            ->get();
        $data["shipping"] = Paymentmethods::all();
        return view("site/order/checkout", ["data" => $data]);
    }
    public function add(Request $request){
        // thêm dữ liệu vào bảng receiver
        $recever = new Receiver();
        $recever->created_at = Carbon::now();
        $recever->updated_at = Carbon::now();
        $recever->isDeleted = 1;
        $recever->client_id = Auth::guard("client")->user()->id;
        $recever->name = $request->billing_company;
        $recever->address = $request->billing_address_1;
        $recever->phone = $request->billing_phone;
        $recever->sex = 1;
        $recever->save();
        // lấy id thông tin người nhận bản ghi mới nhất (dựa vào id tài khoản tránh trường hợp 2 tài khoản khác nhau đặt hàng cùng lúc)
        $idRecever = Receiver::where("client_id", "=", Auth::guard("client")->user()->id)
                                ->latest()->first()->id;
        // thêm dữ liệu vào bảng order
        $order = new OrderModel();
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->isDeleted = 1;
        $order->client_id = Auth::guard("client")->user()->id;
        $order->receiver_id = $idRecever;
        $order->shipping_id = $request->payment_method;
        $order->status = 1;
        $order->sum = $request->sumOrder;
        $order->dateorder = Carbon::now();
        
        if($request->payment_method == 1){
            $order->detail = 2;
        }else{
            $order->detail = 1;
        }
        $order->save();
        // // lấy id đơn hàng bản ghi mới nhất (dựa vào id tài khoản tránh trường hợp 2 tài khoản khác nhau đặt hàng cùng lúc)
        $idOrder = OrderModel::where("client_id", "=", Auth::guard("client")->user()->id)
                                ->latest()->first()->id;
        // // thêm dữ liệu vào bảng Order detail
        // // lấy thông tin của giỏ hàng
        $cart = Cart::join("cartdetail", "carts.id", "=", "cartdetail.cart_id")
                    ->join("productdetail", "productdetail.id", "=", "cartdetail.productdetail_id")
                    ->select([
                        "cartdetail.productdetail_id", 
                        "cartdetail.quanlity", 
                        "productdetail.cost"
                    ])
                    ->where("carts.client_id","=",Auth::guard("client")->user()->id)
                    ->get();
        $idCart = Cart::where("client_id", "=", Auth::guard("client")->user()->id)->first()->id;
        // // Phương pháp nối chuỗi đồng thời sẽ hạ số lượng sản phẩm xuống 
        $stringJson = "[";
        foreach($cart as $cart_detail){
            // nối chuỗi
            $stringJson .= '{
                "created_at": "'.Carbon::now().'",
                "updated_at": "'.Carbon::now().'",
                "product_id": "'.$cart_detail['productdetail_id'].'",
                "order_id": "'.$idOrder.'",
                "cost": "'.$cart_detail['cost'].'",
                "quanlity": "'.$cart_detail['quanlity'].'",
                "isDeleted": "1"
            },';


        //     // Xử lý trừ số lượng sản phẩm
            $product = ProductDetail::find($cart_detail['productdetail_id']);
        //     // Lấy số lượng và trạng thái sản phẩm trong kho
            $quanityCurrent = $product->quanlity;
            $isSoidCurrent = $product->status;
        //     // cập nhật số lượng sản phẩm
            $quanityUpdate = $quanityCurrent - $cart_detail['quanlity'];
        //     // cập nhật trạng thái sản phẩm
            if($quanityUpdate <= 0){
                $isSoidCurrent = 0;
            }else if($quanityUpdate > 0 && $quanityUpdate <= 10){
                $isSoidCurrent = 1;
            }else{
                $isSoidCurrent = 2;
            }}
        // cập nhật sản phẩm
            // $product->update([
            //     "quanlity" => $quanityUpdate,
            //     "status"  => $isSoidCurrent,
            // ]);
            // $product->save();

      // xoá cart detail
            DB::table("cartdetail")->where("cart_id", "=", $idCart)
            ->where("productdetail_id", "=", $cart_detail['productdetail_id'])
            ->delete();               
        // // bỏ dấu , ở cuối chuỗi lớn 
        $stringJson = rtrim($stringJson, ',') . "]";
        $stringArray = json_decode($stringJson, true);
        DB::table('orderdetail')->insert($stringArray);

        // // xem phương thức thanh toán là loại nào
        // // nếu là thanh toán sau 
        if($request->payment_method == 2){
            return view("site/order/thankyou");
        }
        // nếu là chuyển khoản -> quét QR
        if($request->payment_method == 1){

            return view('site/order/QR', [
                "price" => $request->sumOrder,
                "idOrder" => $idOrder
            ]);
        }
    }
    public function list(){
        $data['orders'] = OrderModel::where("isDeleted", "!=", 0)
                                    ->where("client_id", "=", Auth::guard("client")->user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        return view("site/Order/list", ["data" => $data]);
    }
    public function show($id){
        $data = OrderModel::join("orderdetail", "orderdetail.order_id", "=", "orders.id")
                            ->join("receiver", "receiver.id", "=", "orders.receiver_id")
                            ->join("shipping", "shipping.id", "=", "orders.shipping_id")
                            ->join("productdetail", "productdetail.id", "=", "orderdetail.product_id")
                            ->join("product", "productdetail.product_id", "=", "product.id")
                            ->select([
                                "orders.*", 
                                "orderdetail.cost", 
                                "product.name_sp", 
                                "receiver.name", 
                                "receiver.phone", 
                                "receiver.address", 
                                "receiver.sex",
                                "shipping.namePttt",
                                "orderdetail.quanlity"
                            ])
                            ->where("orders.isDeleted", "!=", 0)
                            ->where("orders.id", "=", $id)
                            ->get();
        return view("site/order/detail", ["data" => $data]);
    }
    public function deleted($id){
        // Cập nhật trạng thái huỷ đơn
        $order = OrderModel::find($id);
        if($order->status == 1){
            $order->update([
                "updated_at" => Carbon::now(),
                "status" => 0,
            ]);
            $order->save();
            $product = ProductDetail::join("orderdetail", "orderdetail.product_id", "=", "productdetail.id")
                                    ->join("orders", "orderdetail.order_id", "=", "orders.id")
                                    ->select([
                                        "orderdetail.quanlity", 
                                        "productdetail.id"
                                    ])
                                    ->where("productdetail.isDeleted", "!=", 0)
                                    ->where("orders.isDeleted", "!=", 0)
                                    ->where("orders.id", "=", $id)
                                    ->get();
            foreach($product as $pro){
                // Lấy sản phẩm cần cập nhật
                $productDetail = ProductDetail::where("isDeleted", "!=", 0)
                                ->find($pro['id']);
                // Cập nhật số lượng sản phẩm 
                $quanityCurrent = $productDetail->quanlity;
                $quanityBonus = $pro["quanlity"];
                $sumQuanity = $quanityCurrent + $quanityBonus;
                $productDetail->update([
                    "updated_at" => Carbon::now(),
                    "quanlity" => $sumQuanity,
                ]);
                $productDetail->save();
            }
            notyf()->addSuccess("Huỷ đơn thành công");
        }else{
            notyf()->addError("Huỷ đơn không thành công");
        }
        return redirect("/site/order/show/". $id);
    }
}
