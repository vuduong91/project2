<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Like;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LikeController extends Controller
{

    public function list($id){
        $data['category'] = Category::where("isDeleted", "!=", 0)->get();
        $data['product'] = ProductDetail::join("product", "product.id", "=", "productdetail.product_id")
                                        ->join("category","category.id","=","product.category_id")
                                        ->join("wishlist", "wishlist.productdetail_id", "=", "productdetail.id")
                                        ->join("client", "client.id", "=", "wishlist.client_id")
                                        ->select([
                                            "productdetail.*", 
                                            "product.name_sp"
                                        ])
                                        ->where("productdetail.isDeleted", "!=", 0)
                                        ->where("wishlist.isDeleted", "!=", 0)
                                        ->where("client.id", "=", $id)
                                        ->orderBy('wishlist.created_at', 'desc')
                                        ->paginate(12);
                                        // dd($data);
        return view("site/listproduct/like-list", ['data' => $data]);
    }

    // id la id cua Product_detail
    public function add($id){
        if(Auth::guard("client")->check()){
            $dk = Like::where("isDeleted", "!=", 0)
                        ->where("productdetail_id", "=", $id)
                        ->where("client_id", "=", Auth::guard("client")->user()->id)
                        ->count();
            // lấy đối tượng chứa id
            $idLike = Like::where("isDeleted", "!=", 0)
                        ->where("client_id","=", Auth::guard("client")->user()->id)
                        ->where("productdetail_id", "=", $id)
                        ->first();
            if($dk > 0){
            // trường hợp 1, sản phẩm đã trong danh sách yêu thích
                $like = Like::find($idLike->id);
                $like->delete();
                notyf()->addSuccess("Đã xoá thành công khỏi danh sách yêu thích !");
                return back();
            }else{
            // trường hợp 2, sản phẩm chưa có trong danh sách yêu thích
                $like = new Like();
                $like->created_at = Carbon::now();
                $like->isDeleted = 1;
                $like->client_id = Auth::guard("client")->user()->id;
                $like->productdetail_id = $id;
                $like->save();
                notyf()->addSuccess("Đã yêu thích sản phẩm !");
                return back();
            }
        }
        notyf()->addSuccess('Bạn cần phải đăng nhập!');
        return redirect("/login/showViewlogin");
    }
}
