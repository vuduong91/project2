<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ClientAdminController extends Controller
{
    //
    public function listclt(){
        $data['client'] = Client::where("client.isDeleted", "!=", 0)
        ->get();;
        return view('admin/client/client',['data'=>$data]);
    }
    public function addViewclt(){
        $data = Client::where("isDeleted", "!=", 0)->get();
        return view("admin/client/add_client", ["data" => $data]);
    }

    public function xl_addclt(Request $request){
        if($request->password != $request->password1){
            notyf()->addError("Mật khẩu không trùng khớp!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addClt");
        }
        $coutAdmin = Admin::where("email", $request->email)->count();
        $coutClient = Client::where("email", $request->email)->count();
        if( $coutAdmin > 0 || $coutClient > 0){
            notyf()->addError("Email đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addClt");
        }
        $coutAdminP = Admin::where("phone", $request->phone)->count();
        $coutClientP = Client::where("phone", $request->phone)->count();
        if( $coutAdminP > 0 || $coutClientP > 0){
            notyf()->addError("Số điện thoại đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addClt");
        }

        $client = new Client();
        
        $client->created_at = Carbon::now();
        $client->updated_at = Carbon::now();
        $client->isDeleted = 1;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = bcrypt($request->password);
        $client->address = $request->address;
        $client->save();
        notyf()->addSuccess("Thêm người dùng thành công");
        return redirect()->route("addClt");
    }
    public function xl_deletedclt($id){
        $client = Client::find($id);
        $client->update([
            "isDeleted" => 0
        ]);
        $client->save();
        notyf()->addSuccess("Xoá nhân viên thành công");
        return redirect()->route("client");
    }
    public function showViewclt($id){
        $data['client'] = Client::where("id",$id)->where("isDeleted","!=",0)->first();
        return view("admin/client/edit_client", ['data' => $data]);
    }
    
    public function xl_editclt(Request $request, $id){
        // dd($request);
        $client = Client::find($id);
        if($client->password != $request->password){
            $client->update([
                "name"=> $request->name,
                "phone"=> $request->phone,
                "password" => bcrypt($request->password),
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }else{
            $client->update([
                "phone"=> $request->phone,
                "name" => $request->name,
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }
        notyf()->addSuccess("Sửa nhân viên thành công");
        return redirect("/admin/client/showclt/". $id);
    }
}
