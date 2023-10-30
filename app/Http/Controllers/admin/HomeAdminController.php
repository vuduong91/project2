<?php

namespace App\Http\Controllers\admin;
use App\Models\OrderModel;
use App\Models\ProductDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeAdminController extends Controller

{
    //
    public function index($year){
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();

        // Truy vấn các bản ghi trong bảng "order" được tạo trong tháng hiện tại
        $data["countOrderInMonth"] = OrderModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                                                ->where("isDeleted", "!=", 0)
                                                ->count();
        $data["sumPriceOrderInMonth"] = OrderModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                                                ->where("isDeleted", "!=", 0)
                                                ->sum('sum');
        $data["countOrderLastMonth"] = OrderModel::whereBetween('created_at', [$lastMonthStart, $lastMonthStart->endOfMonth()])
                                                ->where("isDeleted", "!=", 0)
                                                ->count();
        $data["tanglen"] = 0;
        if( $data["countOrderInMonth"] - $data["countOrderLastMonth"] >= 0){
            $data["tanglen"] = $data["countOrderInMonth"] - $data["countOrderLastMonth"];
        }
        $data['giamdi'] = 0;
        if($data["countOrderLastMonth"] - $data["countOrderInMonth"]  >= 0){
            $data["giamdi"] = $data["countOrderLastMonth"] - $data["countOrderInMonth"];
        }

        // Lấy doanh thu trong năm
        $data["priceOfmothByYear"] = [];
        for ($i = 1; $i <= 12; $i++) {
            $startOfMonthTK = Carbon::createFromDate($year, $i, 1)->startOfMonth();
            $endOfMonthTK = Carbon::createFromDate($year, $i, 1)->endOfMonth();
            
            $revenue = DB::table('orders')
                ->whereBetween('created_at', [$startOfMonthTK, $endOfMonthTK])
                ->where("isDeleted", "!=", 0)
                ->sum('sum');
            $data["priceOfmothByYear"][$i] = intval($revenue);
        }
        // Thừa còn hơn thiếu
        if (Session::has('year')) {
            Session::put('year', Carbon::now()->year);
        } else {
            Session::put('year', Carbon::now()->year);
        }

        $data['product5limit'] = ProductDetail::select(
            'productdetail.id',
            'productdetail.ha_sp',
            'product.name_sp',
            DB::raw('SUM(orderdetail.quanlity) as total_sold'),
            DB::raw('MAX(productdetail.created_at) as created_at')
        )
            ->join('orderdetail', 'productdetail.id', '=', 'orderdetail.product_id')
            ->join('orders', 'orderdetail.order_id', '=', 'orders.id')
            ->join('product', 'productdetail.product_id', '=', 'product.id')
            ->where('orders.isDeleted', '!=', 0)
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->groupBy([
                'productdetail.id', 
                'productdetail.ha_sp', 
                'product.name_sp', 
            ])
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        return view("admin/home/home",    [
                                                        "data" => $data,
                                                        "year" => $year,
                                                    ]);
    }
    

    public function account(){
        $data = [];
        if(Auth::guard("admin")->check()){
            $data = Auth::guard('admin')->user();
        }
        return view("admin/account/accountshow", ["data" => $data]);
    }
}
