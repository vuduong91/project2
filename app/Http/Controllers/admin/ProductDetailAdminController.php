<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class ProductDetailAdminController extends Controller
{
    //

    public function list_ct($id){
        $data['productdetail'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
        ->select("product.name_sp", "productdetail.*")
        ->where("productdetail.isDeleted" , "!=", 0)
        ->where("productdetail.product_id", "=", $id)
        ->where("productdetail.status", "!=", 0)
        ->get();
     $data['id'] = $id;
    //  dd($data);
      return view("admin/product_detail/list-productdetail", ['data' => $data]);
    }
    public function addct($id){
        $data["name_sp"] = Product::where("id",$id)->first();
        $data['id'] = $id;
        return view("admin/product_detail/add-productdetail", ["data" => $data]);
    }
    public function xl_addct(Request $request ,$id){
        $product_detail = new  ProductDetail();
        $product_detail->created_at = Carbon::now();
        $product_detail->updated_at = Carbon::now();

        $partImg = time() . "." . $request->ha_sp->extension();
        $request->ha_sp->move(public_path('img'), $partImg);
        $product_detail->ha_sp = $partImg;

        $product_detail->cost = $request->cost;
        $product_detail->warranty = $request->warranty;
        $product_detail->details = $request->details;
        $product_detail->discount= $request->discount;
        $product_detail->new= $request->new;
        $product_detail->featured = $request->featured;
        $product_detail->isDeleted = 1;
        $product_detail->status = $this->status($request->quanlity);
        $product_detail->quanlity = $request->quanlity;
        $product_detail->product_id = $id;

        $product_detail->save();
        notyf()->addSuccess("Thêm sản phẩm thành công");
        return redirect("/admin/product_detail/list_ct/".$id);
    }
    public function xl_deletect($id){
        $product_detail = ProductDetail::find($id);
        $product_detail->update([
            "isDeleted" => 0,
        ]);
        $product_detail->save();
        notyf()->addSuccess("Xoá sản phẩm thành công");
        return redirect("/admin/product_detail/list_ct/". $id);
    }

    public function editViewct($id){
        $data["productdetail"] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
        ->select("product.name_sp", "productdetail.*")
                        ->where("productdetail.id", $id)
                        ->where("productdetail.isDeleted", "!=", 0)
                        ->first();
        $data['id'] = $id;
        return view("admin/Product_detail/edit-productdetail", ["data" => $data]);
    }

    public function xl_editct(Request $request, $id){
        $product_detail = ProductDetail::find($id);
        if($request->ha_sp == null){
            $img = $request->ha_old;
        }else{
            $img = time() . "." . $request->ha_sp->extension();
            $request->ha_sp->move(public_path('img'), $img);
        }
        $product_detail->update([   
            "updated_at" => Carbon::now(),
            "ha_sp" => $img,
            "cost" => $request->cost,
            "warranty" => $request->warranty,
            "details" => $request->details,
            "discount" => $request->discount,
            "new" => $request->new,
            "featured" => $request->featured,
            "status" => $request->status,
            "quanlity" => $request->quanlity,
        ]);

        $product_detail->save();
        notyf()->addSuccess("Sửa sản phẩm thành công");
        return redirect("/admin/product_detail/editViewct/". $id);
    }
    public function status($quanlity){
        if($quanlity == 0){
            return 0;
        }else if($quanlity <= 10 && $quanlity > 0){
            return 1;
        }else{
            return 2;
        }
    }
}
