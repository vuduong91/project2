@include('admin/master/tieude')
@include('admin/master/danhmuc')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Chi tiết đơn hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết đơn hàng</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div id="toolbar" class="btn-group">
                <a href="product-add.html" class="btn btn-success">
                    <i class="glyphicon glyphicon-list"></i> Toàn bộ đơn hàng
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tongdon = 0; ?>
                            @foreach($data['product'] as $pro)
                                <tr>
                                    <td>{{$pro['id']}}</td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img style="height: 80px; weight: 100px" src="{{asset("img/" . $pro['ha_sp'])}}" alt="product">
                                        </a>
                                    </td>
                                    <td>{{number_format($pro['cost']) . ' VNĐ'}}</td>
                                    <td>{{number_format($pro['quanlity'])}}</td>
                                    <?php $tongtiensanpham = $pro['cost'] * $pro['quanlity'];  ?>
                                    <td>{{number_format($tongtiensanpham) . ' VNĐ'}}</td>
                                    <?php $tongdon += $tongtiensanpham ?>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="thongtindonhang">
        <table width="100%">
            <tr>
                <td colspan="2" style="text-align:center">Thông tin đơn hàng</td>
                <td colspan="2" style="text-align:center">Thông tin người nhận</td>
            </tr>
            <tr>
                <td>Tổng tiền sản phẩm: </td>
                <td>{{number_format($tongdon) . ' VNĐ'}}</td>
                <td style="color:red; font-weight:bold">Tên người nhận: </td>
                <td>{{$data['orders']->name}}</td>
            </tr>
            <tr>
                <td>Mã giảm giá được áp dụng: </td>
                <td><?php //echo number_format($data['order']['sum_total'] - $tongdon - 30000) . ' VNĐ'; ?></td>
                <td style="color:red; font-weight:bold">Số điện thoại người nhận: </td>
                <td>{{$data['orders']->phone}}</td>
            </tr>
            <tr>
                <td>Chi phí vận chuyển: </td>
                <td>{{number_format(30000) . ' VNĐ'}}</td>
                <td style="color:red; font-weight:bold">Địa chỉ giao hàng: </td>
                <td>{{$data['orders']->address}}</td>
            </tr>
            <tr>
                <td>Tổng đơn: </td>
                <td>{{number_format($data['orders']->sum) . ' VNĐ'}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Hình thức vận chuyển: </td>
                <td>{{$data['orders']->namePay}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Trạng thái đơn hàng: </td>
                <td><?php switch($data['orders']->status){
                    case 0:
                        echo 'Đơn hàng đã huỷ';
                        break;
                    case 1:
                        echo 'Đang chờ xử lý đơn';
                        break;
                    case 2:
                        echo 'Đơn hàng đang giao';
                        break;
                    case 3:
                        echo 'Đã giao hàng thành công';
                        break;
                } ?></td>
                <td></td>
                <td></td>
            </tr>
            <form method="post" action="/admin/order/updateOrder/{{$data['orders']->id}}">
            @csrf
            <tr>
                <td style="color: blue">Thay đổi trạng thái</td>
                <td><select name="status">
                    @if($data['orders']->status == 1 || $data['orders']->status < 2)
                        <option value="0" @if($data['orders']->status == 0) selected @endif>Huỷ đơn</option>
                    @endif
                    @if($data['orders']->status == 1)
                        <option value="1" @if($data['orders']->status == 1) selected @endif>Chờ xử lý</option>
                    @endif
                    @if($data['orders']->status == 1 || $data['orders']->status == 2)
                        <option value="2" @if($data['orders']->status == 2) selected @endif>Đang giao hàng</option>
                    @endif
                    @if($data['orders']->status == 1 || $data['orders']->status == 2)
                        <option value="3" @if($data['orders']->status == 3) selected @endif>Giao thành công</option>
                    @endif
                </select></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: center;">
                @if($data['orders']->status >= 1 && $data['orders']->status <= 2)
                    <td colspan="4"><button type="submit" name="submit" style="border-radius: 10px; background-color:white; padding:5px;">Cập nhật</button></td>
                @endif
            </tr>
            </form>
        </table>
    </div>
    <!--/.row-->
    <!--/.row-->
</div>
<!--/.main-->
@include('admin/master/thongtin')