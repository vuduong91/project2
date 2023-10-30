<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class CategoryAdminController extends Controller
{
    //
    public function list_dm(){
        $data['category'] = Category::where('isDeleted',"!=", 0 )->get(); 
        return view('admin/category/category',["data"=>$data]);
    }
    public function adcate() {
        $data['category'] = Category::all(); 
        return view('admin/category/add_category',["data"=>$data]);
    }
    public function xl_add(REQUEST $request) {
        
        // DB:: table("category")->insert([
        //     'nameCatr'=> $request ->cat_name
        // ]);
        // return redirect()->route("listCategory");
        // // dd($request);
        $validate = $request->validate([
            'nameCatr' =>  "required|string|max:255",      
        ]);
        $category = new Category();
        $category->nameCatr = $validate['nameCatr'];
        $category->created_at = Carbon::now();
        $category->updated_at = Carbon::now();
        $category->isDeleted = 1;
        $category->save();
        return redirect()->route("listCategory");
    }
    public function xl_delete($id){
        $category = Category::find($id);
        $category->update([
            'isDeleted' => 0,
        ]);
        $category->save();
        return redirect()->route("listCategory");
    }
    public function edit($id){
        $category = Category::where("id", $id)->first();
        return view("admin/category/edit_category",['data'=> $category]);
    }
    public function xl_edit(Request $request, $id){
        $validate = $request->validate([
            "nameCatr"=> "required|string|max:255",
        ]);
        $category = Category::find($id);
        $category->update([
            "nameCatr" => $validate['nameCatr'],
            "updated_at"=> Carbon::now(),          
        ]);
        $category->save();
        return redirect()->route("listCategory");
    }
    
}
