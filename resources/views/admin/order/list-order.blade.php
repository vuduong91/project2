@include('admin/master/tieude')
@include('admin/master/danhmuc')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách đơn hàng</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách đơn hàng</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="table-responsive">
                            <ul>
                             <li>  <a href="/admin/order/selectedOrder/1"><span class="badges bg-lightyellow">Chờ xử lý</span></a></li>
                             <li> <a href="/admin/order/selectedOrder/2"><span class="badges bg-lightyellow">Đang giao hàng</span></a></li>
                             <li> <a href="/admin/order/selectedOrder/0"><span class="badges bg-lightred">Đã huỷ</span></a></li>
                            </ul>
                                <table class="table">
                                    <thead>
                                        <tr >
                                            <th>ID</th>
                                            <th>Ngày đặt đơn</th>
                                            <th>Trạng thái sản phẩm</th>
                                            <th>Hình thức</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['orders'] as $order)
                                            <tr>
                                                <td>{{$order['id']}}</td>
                                                <td >{{$order['dateorder']}}</td>
                                                <td>
                                                    @if($order['status'] == 3)
                                                        <span class="badges bg-lightgreen">Đã thanh toán</span>
                                                    @endif
                                                    @if($order['status'] == 0) 
                                                        <span class="badges bg-lightred">Đã huỷ</span>
                                                    @endif
                                                    @if($order['status'] == 1)
                                                        <span class="badges bg-lightyellow">Chờ xử lý</span>
                                                    @endif
                                                    @if($order['status'] == 2)
                                                        <span class="badges bg-lightyellow">Đang giao hàng</span>
                                                    @endif
                                                </td>
                                                <td>@if($order['detail'] == "2") Chuyển khoản ({{$order['id']. "_" . $order['sum']}}) @else Trực tiếp @endif</td>
                                                <td>
                                                    <a class="me-3" href="/admin/order/show/{{$order['id']}}">
                                                        <img src="{{asset('admin/images/eye.svg')}}" alt="img">
                                                    </a>
                                                    <span></span>
                                                    @if($order['status'] == 1)
                                                        <a class="me-3 confirm-text" href="/admin/order/deletedOrder/{{$order['id']}}">
                                                            <i class="glyphicon glyphicon-remove"></i></a>
                                                        </a>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>  
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
    @include('admin/master/thongtin')
