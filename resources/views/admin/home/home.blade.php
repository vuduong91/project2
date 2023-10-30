@include('admin/master/tieude')
@include('admin/master/danhmuc')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('admin/icon/dash1.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{$data['countOrderInMonth']}}"></span> đơn</h5>
                        <h3 class="page-header">Số đơn trong tháng: {{number_format($data['countOrderInMonth'])}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('admin/icon/dash2.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{$data["sumPriceOrderInMonth"]}}"></span> VNĐ</h5>
                        <h3 class="page-header">Danh thu trong tháng: {{number_format($data["sumPriceOrderInMonth"]). ' VNĐ'}} </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('admin/icon/dash4.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{$data['tanglen']}}"></span> đơn</h5>
                        <h3 class="page-header">Đơn hàng tăng so với tháng trước: {{number_format($data['tanglen'])}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="{{asset('admin/icon/dash3.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{$data["giamdi"]}}"></span> đơn</h5>
                        <h3 class="page-header">Đơn hàng giảm so với tháng trước: {{number_format($data["giamdi"])}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                                <div class="panel-body">
                                    <table data-toolbar="#toolbar"
                                        data-toggle="table">
                                        <thead>
                                            <tr>
                                               <th> <div class="dash-counts">
                                                <h5><a href="/admin/count/5">Sản phẩm sắp hết</a></h5>
                                               </div> 
                                               </th>
                                               <th>
                                                @if(Auth::guard("admin")->check() || Session::get("quyenhan")->ql_oder == 1)
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h5><a href="/admin/order/selectedOrder/1" style="color:rgb(144, 45, 45);">Đơn hàng đang chờ duyệt</a></h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
                                               </th>
                                               <th>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h5><a href="/admin/order/selectedOrder/0" style="color:rgb(48, 16, 16);">Đơn hàng đã huỷ</a></h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </div>
            @endif
        </div>
                                               </th>
                                            </tr>
									    </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                        </div>
         
           
            <!-- Ngăn chặn người sử dụng không có quyền truy cập vào quyền quản lý -->
            
        <div class="row">
            <div class="col-lg-7 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Đơn hàng và doanh thu năm {{$year}}</h5>
                        <div class="graph-sets">
                            
                            <div class="dropdown">
                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2023 <img src="{{asset('admin/icon/dropdown.svg')}}" alt="img" class="ms-2">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="/admin/home/index/{{Session::get("year")}}" class="dropdown-item">{{Session::get("year")}}</a>
                                    </li>
                                    <li>
                                        <a href="/admin/home/index/{{Session::get("year") - 1}}" class="dropdown-item">{{Session::get("year") - 1}}</a>
                                    </li>
                                    <li>
                                        <a href="/admin/home/index/{{Session::get("year") - 2}}" class="dropdown-item">{{Session::get("year") - 2}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"  >
                        <canvas id="myChart"style="width: 30px; height:10px " ></canvas>
                    </div>
                </div>
            </div>
		</tr>
		<tr>  
            <!-- Ngăn chặn người dùng không có quyền quản lý sản phẩm -->
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Những sản phẩm bán chạy trong tháng</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview" >
                            <table class="table datatable " >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['product5limit'] as $product_detail)
                                    <tr>
                                        <td>{{$product_detail['id']}}</td>
                                        <td class="productimgname">
                                            <a href="" class="product-img">
                                                <img style="height: 80px; weight:80px" src="{{asset("img/" . $product_detail['ha_sp'])}}" alt="product">
                                            </a>
                                            <a href="">{{$product_detail['name_sp']}}</a>
                                        </td>
                                        <td>{{$product_detail['total_sold']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</tr>
	</ul>
        </div>
    </div>
 </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [{
        label: 'Doanh Thu',
        data: [ {{$data["priceOfmothByYear"][1]}},
                {{$data["priceOfmothByYear"][2]}}, 
                {{$data["priceOfmothByYear"][3]}}, 
                {{$data["priceOfmothByYear"][4]}}, 
                {{$data["priceOfmothByYear"][5]}}, 
                {{$data["priceOfmothByYear"][6]}}, 
                {{$data["priceOfmothByYear"][7]}}, 
                {{$data["priceOfmothByYear"][8]}}, 
                {{$data["priceOfmothByYear"][9]}}, 
                {{$data["priceOfmothByYear"][10]}}, 
                {{$data["priceOfmothByYear"][11]}}, 
                {{$data["priceOfmothByYear"][12]}},
            ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

	@include('admin/master/thongtin')