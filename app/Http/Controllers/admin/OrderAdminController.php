<?php

namespace App\Http\Controllers\admin;

use App\Models\Receiver;
use App\Models\OrderModel;
use App\Models\Paymentmethods;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class OrderAdminController extends Controller
{
    //
    public function list(){
        // lấy toàn bộ đơn hàng
        $data['orders'] = OrderModel::where("isDeleted", "!=", 0)
                                    ->orderBy('created_at', 'asc')
                                    ->get();
        return view("admin/order/list-order", ["data" => $data]);
    }

    public function show($id){
        // lấy thông tin của 1 đơn hàng bất kì
        $data["orders"] = OrderModel::join("receiver", "orders.receiver_id", "=", "receiver.id")
                                    ->join("shipping", "shipping.id", "=", "orders.shipping_id")
                                    ->select([
                                        "orders.*", 
                                        "shipping.namePttt", 
                                        "receiver.name", 
                                        "receiver.phone", 
                                        "receiver.address"
                                    ])
                                    ->where("orders.isDeleted", "!=", 0)
                                    ->where("orders.id", "=", $id)
                                    ->first();
        $data['product'] = OrderModel::join("orderdetail", "orderdetail.order_id", "=", "orders.id")
                                    ->join("productdetail", "productdetail.id", "=", "orderdetail.product_id")
                                    ->join("product", "product.id", "=", "productdetail.product_id")
                                    ->select([
                                        "productdetail.ha_sp", 
                                        "product.name_sp", 
                                        "orderdetail.quanlity", 
                                        "orderdetail.cost", 
                                        "productdetail.id"
                                    ])
                                    ->where("orders.isDeleted", "!=", 0)
                                    ->where("orders.id", "=", $id)
                                    ->get();
        return view("admin/order/detail-order", ["data" => $data]);
    }

    public function update(Request $request,$id){
        $order = OrderModel::where("id", "=", $id)->where("isDeleted", "!=", 0)->first();
        $statusCurrent = $order->status;

        // kiểm tra status định chuyển 
        // nếu chuyển tuyến tức là (từ 1-> 3) -> không cần quan tâm
        if($statusCurrent > 0 && $statusCurrent < 3){
            // đang nằm trong khoảng 1 -> 3
            if($statusCurrent < $request->status){
                $order->update([
                    "updated_at" => Carbon::now(),
                    "status" => $request->status,
                ]);
                $order->save();
                notyf()->addSuccess("Thay đổi trạng thái thành công !!");
                return back();
            }
        }
        // nếu huỷ (1 -> 0) -> còn phải xử lý hoàn lại số lượng sản phẩm
        // làm chức năng huỷ sản phẩm ở đây
        if($statusCurrent == 1 && $request->status == 0)
        {
            $this->deleteOrder($id);
            return back();
        }
    }

    public function deleteOrder($id){
        // Cập nhật trạng thái huỷ đơn
        $order = OrderModel::find($id);
        if($order->status == 1){
            $order->update([
                "updated_at" => Carbon::now(),
                "status" => 0,
            ]);
            $order->save();
            // Trả số lượng về
            $product = ProductDetail::join("order_detail", "order_detail.product_id", "=", "product_detail.id")
                                    ->join("order", "order_detail.order_id", "=", "order.id")
                                    ->select([
                                        "order_detail.quanity", 
                                        "product_detail.id",
                                    ])
                                    ->where("product_detail.isDeleted", "!=", 0)
                                    ->where("order.isDeleted", "!=", 0)
                                    ->where("order.id", "=", $id)
                                    ->get();
            // dd($product);
            foreach($product as $pro){
                // Lấy sản phẩm cần cập nhật
                $productDetail = ProductDetail::where("isDeleted", "!=", 0)
                                ->find($pro['id']);
                // Cập nhật số lượng sản phẩm 
                $quanityCurrent = $productDetail->quanity;
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
            notyf()->addError("Huỷ đơn không thành công thành công");
            
        }
    }

    // Hàm lọc đơn hàng
    // $count -> 1 chờ xử lý (chưa xử lý), 2 đang giao hàng, 3 đã giao thành công, 0 là đã huỷ

    public function SelectedOrder($status){
        $data['orders'] = OrderModel::where("isDeleted", "!=", 0)->where("status", "=", $status)->get();
        return view("admin/order/list-order", ["data" => $data]);
    }
}
