<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductAdminController extends Controller
{
    //
    public function list_sp(){
        if(Auth::guard("admin")->check()){
            $data["product"] = Product::join('category','category.id','=','product.category_id')
                                      ->select("category.nameCatr","product.*")
                                      ->where("product.isDeleted","!=",0)
                                      ->get();
        }
        return view('admin/product/list-product',["data" => $data]);
    }
    public function add_sp(){
        $category = Category::all()->where("isDeleted", "!=", 0);
        return view("admin/product/add-product", ['data' => $category]);
    }
    public function xl_addproduct(Request $request){
        // dd($request);
        // die;
        $product = new Product();
        $product->name_sp = $request->name_sp;
        $product->category_id = $request->category_id;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->isDeleted = 1;


        $checkNameProduct = Product::where("name_sp",$product->name_sp)->count();
        if($checkNameProduct != 0){
            notyf()->addError("Thêm sản phẩm thất bại!!");
            return redirect()->route("listProduct");
        }

        $product->save();

        notyf()->addSuccess("Thêm sản phẩm thành công");
        return redirect()->route("listProduct");
    }
    public function editproduct($id){
        $data["product"] = Product::where("id",$id)->where("isDeleted","!=",0)->first();
        $data["category"] = Category::all()->where("isDeleted","!=",0);
        return view("admin/Product/edit-product", ["data" => $data]);
    }

    public function xl_editproduct(Request $request, $id){
        $product = Product::find($id);
        $nameproduct = trim($request->name_sp);
        $checkNameProduct = Product::where("name_sp",$nameproduct)->count();
        if($checkNameProduct > 1){
            notyf()->addError("Sửa sản phẩm thất bại!!");
            return redirect("/admin/product/editView/" . $id);
        }else if($checkNameProduct == 1){
            $product->update([
                "category_id" => $request->category_id,
                "updated_at" => Carbon::now(),
            ]);
        }else{
            $product->update([
                "name_sp" => $nameproduct,
                "category_id" => $request->category_id,
                "updated_at" => Carbon::now(),
            ]);
        }
        $product->isDeleted = 1;
        $product->save();
        notyf()->addSuccess("Sửa sản phẩm thành công");
        return redirect()->route("listProduct");
    }
    public function selectProductMax($count){
        // biến count sẽ là điều kiện lọc <10 hay =0
        if($count == 5){
            $productCount = Product::where('isDeleted', '!=', 0)
            ->whereHas('productDetails', function ($query) use ($count) {
                $query->where('isDeleted', '!=', 0)
                    ->groupBy('product_id')
                    ->havingRaw('SUM(quanlity) <= ?', [$count])
                    ->havingRaw('SUM(quanlity) > 0');
            })
            ->pluck('id');
        }else{
            $productCount = Product::where('isDeleted', '!=', 0)
            ->whereHas('productDetails', function ($query) use ($count) {
                $query->where('isDeleted', '!=', 0)
                    ->groupBy('product_id')
                    ->havingRaw('SUM(quanlity) = 0');
            })
            ->pluck('id');
        }
        if(Auth::guard("admin")->check()){
            $data["product"] = Product::join("category","category.id","=","product.category_id")
                                      ->select([
                                        "product.*",
                                        "category.nameCatr",
                                      ])
                                      ->where("product.isDeleted","!=",0)
                                      ->whereIn("product.id", $productCount)
                                      ->get();
        }
        if(Auth::guard("admin")->check()){
            $data["product"] = Product::join("category","category.id","=","product.category_id")
            ->select([
                "product.*",
                "category.nameCatr"
            ])
            ->where("product.isDeleted","!=",0)
            ->whereIn("product.id", $productCount)
            ->get();
        }
        return view("admin/product/list-product", ["data" => $data]);
    }
}
