@include('admin/master/tieude')
@include('admin/master/danhmuc')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách người dùng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách người dùng</h1>
        </div>
    </div><!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="/admin/client/addclt" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm người dùng
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="phone" data-sortable="true">SDT</th>
                                <th data-field="address" data-sortable="true">Dia chi</th>
                                <th data-field="" data-sortable="true">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['client'] as $client)
                            <tr>
                                <td>{{$client['id']}}</td>
                                <td>{{$client['name']}}</td>
                                <td>{{$client['email']}}</td>
                                <td>{{$client['phone']}}</td>
                                <td>{{$client['address']}}</td>
                                <td class="form-group">
                                    <a href="/admin/client/showclt/{{$client['id']}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="/admin/client/xl_deletedclt/{{$client['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach  
                                    
                                </td>
                                
                            </tr>

                            
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div> <!--/.main-->
@include('admin/master/thongtin')

