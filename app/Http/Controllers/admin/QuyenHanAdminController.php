<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\Admin;
use Carbon\Carbon;
class QuyenHanAdminController extends Controller
{
    //
    public function list(){
        $data = Admin::where("admin.isDeleted", "!=", 0)
                        ->get();
        return view("admin/quyenhan/list_quyenhan", ["data" => $data]);
    }
    public function show($id){
        $check = PhanQuyen::where("admin_id", $id)->exists();
        if(!$check){
            $quyen = new PhanQuyen();
            $quyen->ql_category = 0;
            $quyen->ql_user = 0;
            $quyen->ql_order = 0;
            $quyen->ql_client = 0;
            $quyen->ql_product = 0;
            $quyen->admin_id = $id;
            $quyen->created_at = Carbon::now();
            $quyen->updated_at = Carbon::now();
            $quyen->isDeleted = 1;
            $quyen->save();
        }
        $data = PhanQuyen::where("admin_id", $id)->where("isDeleted","!=",0)->first();
        return view("admin/quyenhan/show_quyenhan", ["data" => $data]);
    }
    public function xl_edit(Request $request, $id){
        if($request->ql_product == "on"){
            $sanpham = 1;
        }else{
            $sanpham = 0;
        }
        // if($request->xl_donhang == "on"){
        //     $donhang = 1;
        // }else{
        //     $donhang = 0;
        // }
        if($request->ql_client == "on"){
            $khachhang = 1;
        }else{
            $khachhang = 0;
        }
        if($request->ql_category == "on"){
            $danhmuc = 1;
        }else{
            $danhmuc = 0;
        }
        if($request->ql_user== "on"){
            $nhanvien = 1;
        }else{
            $nhanvien = 0;
        }
        $data = PhanQuyen::find($id);
        $data->update([
            "ql_product" => $sanpham,
            "ql_client"  => $khachhang,
            "ql_category"  => $danhmuc,
            "ql_user"  => $nhanvien,
        ]);
        $data->save();
        notyf()->addSuccess("Sửa quyền thành công");
        return redirect("admin/quyenhan/show/". $id);
    }
}
