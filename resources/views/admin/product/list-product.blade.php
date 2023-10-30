
@include('admin/master/tieude');
@include('admin/master/danhmuc');
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="/admin/product/add-product" class="btn btn-success">
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
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="cate" data-sortable="true">Danh muc</th>
                                {{-- <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th> --}}
                                <th>lua chon</th>
                                {{-- <th>Hành động</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                                
                                    @foreach ($data["product"] as $product)
										<tr>
										<td>{{$product["id"]}}</td>
                                        <td>{{$product["name_sp"]}}</td>
										<td>{{$product["category_id"]}}</td>	
											<td class="form-group">
												<a href="/admin/product/editView/{{ $product['id']}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="/admin/product_detail/list_ct/{{ $product['id']}}" class="btn btn-danger"><img src="{{asset('admin/images/eye.svg')}}" alt="img"></a>
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