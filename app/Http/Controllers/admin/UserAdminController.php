<?php

namespace App\Http\Controllers\admin;

use App\Models\Client;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class UserAdminController extends Controller
{
    //
    public function ngdung(){
        $data['admin'] = Admin::where("admin.isDeleted", "!=", 0)
        ->get();;
        return view('admin/user/user', ['data' => $data]);
    }
    public function addView(){
        $data = Admin::where("isDeleted", "!=", 0)->get();
        return view("admin/user/add_user", ["data" => $data]);
    }

    public function xl_add(Request $request){
        if($request->password != $request->password1){
            notyf()->addError("Mật khẩu không trùng khớp!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addNV");
        }
        $coutAdmin = Admin::where("email", $request->email)->count();
        $coutClient = Client::where("email", $request->email)->count();
        if( $coutAdmin > 0 || $coutClient > 0){
            notyf()->addError("Email đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addNV");
        }
        $coutAdminP = Admin::where("phone", $request->phone)->count();
        $coutClientP = Client::where("phone", $request->phone)->count();
        if( $coutAdminP > 0 || $coutClientP > 0){
            notyf()->addError("Số điện thoại đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addNV");
        }

        $staff = new Admin();
        
        $staff->created_at = Carbon::now();
        $staff->updated_at = Carbon::now();
        $staff->isDeleted = 1;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->password = bcrypt($request->password);
        $staff->address = $request->address;
        $staff->level = 2;
        $staff->save();
        notyf()->addSuccess("Thêm nhân viên thành công");
        return redirect()->route("addNV");
    }
    public function showView($id){
        $data['admin'] = Admin::where("id",$id)->where("isDeleted","!=",0)->first();
        return view("admin/user/edit_user", ['data' => $data]);
    }
    
    public function xl_editnv(Request $request, $id){
        // dd($request);
        $staff = Admin::find($id);
        if($staff->password != $request->password){
            $staff->update([
                "name"=> $request->name,
                "phone"=> $request->phone,
                "password" => bcrypt($request->password),
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }else{
            $staff->update([
                "phone"=> $request->phone,
                "name" => $request->name,
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }
        notyf()->addSuccess("Sửa nhân viên thành công");
        return redirect("/admin/user/show/". $id);
    }
   
    public function xl_deletednv($id){
        $staff = Admin::find($id);
        $staff->update([
            "isDeleted" => 0
        ]);
        $staff->save();
        notyf()->addSuccess("Xoá nhân viên thành công");
        return redirect()->route("ngdung");
    }
    }
