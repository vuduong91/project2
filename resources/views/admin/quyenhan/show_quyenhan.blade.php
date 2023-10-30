@include('admin/master/tieude');
@include('admin/master/danhmuc');
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">quyen han</li>
            <h3 >Tài khoản: ID = {{$data->id}}</h3>
        </ol>
    </div>
    <div class="thongtindonhang">
        <form action="/admin/quyenhan/xl_edit/{{$data->id}}" method="POST">
            @csrf
            <table width="100%">
                <th>
                <td colspan="2">Quyền</td>
                </th>
                <tr>
                    <td width="50%">&emsp;Quản lý danh muc</td>
                    <td><input type="checkbox" name="ql_category" @if($data->ql_category == 1) checked @endif></td>
                </tr>
                <tr>
                    <td>&emsp;Quản lý sản phẩm </td>
                    <td><input type="checkbox" name="ql_product" @if($data->ql_product == 1)
                                                                                        checked
                                                                                     @endif ></td>
                </tr>
                <tr>
                    <td>&emsp;Quản lý tài khoản khách hàng</td>
                    <td><input type="checkbox" name="ql_client" @if($data->ql_client == 1)
                                                                                        checked
                                                                                     @endif ></td>
                </tr> 
                {{-- <tr>
                    <td>&emsp;Quản lý bài viết</td>
                    <td><input type="checkbox" name="ql_baiviet" @if($data->ql_baiviet == 1)
                                                                                        checked
                                                                                     @endif ></td>
                </tr> --}}
                <tr>
                    <td>&emsp;Quản lý đơn hàng và trạng thái</td>
                    <td><input type="checkbox" name="ql_order" @if($data->ql_order == 1)
                                                                                        checked
                                                                                     @endif ></td>
                </tr>
                
                <tr style="text-align: center;">
                    <td colspan="2">
                        <button name="submit" type="submit" style="border-radius: 10px; background-color:white; padding:5px;">Cập nhật</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</div>
@include('admin/master/thongtin');