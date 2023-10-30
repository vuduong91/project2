
@include('admin/master/tieude');
@include('admin/master/danhmuc');
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Chi tiết sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="/admin/product_detail/add-productdetail/{{$data['id']}}" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" class="table" data-toggle="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Giá</th>
                                <th>Bảo hành</th>
                                <th>Trạng thái</th>
                                <th>Tình trạng</th>
                                <th>Khuyến mãi</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @foreach ($data["productdetail"] as $product_detail)
                                    <tr>    
                                        <td>{{$product_detail["id"]}}</td>
                                        <td class="productimgname">
                                        <a href="/admin/product_detail/show/{{$product_detail['id']}}" class="product-img">
                                            <img style="text-align: center" width="90" height="120" src="{{asset("img/" . $product_detail['ha_sp'])}}" alt="product">
                                        </a>
                                        </td>
										<td>{{$product_detail["cost"]}}</td>
                                        <td>{{$product_detail["warranty"]}}</td>
										<td>{{$product_detail["new"]}}</td>
                                        <td>{{$product_detail["status"]}}</td>
                                        <td>{{$product_detail["discount"]}}</td>		
                                        <td class="form-group">
                                            <a href="/admin/product_detail/editViewct/{{$product_detail['id']}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/admin/product_detail/xl_deletect/{{$product_detail['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>			
                                    </tr>			
									@endforeach   
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@include('admin/master/thongtin');