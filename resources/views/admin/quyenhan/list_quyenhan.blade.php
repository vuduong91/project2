@include('admin/master/tieude');
@include('admin/master/danhmuc');
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">quyen han</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết quyen han</h1>
        </div>
    </div>
    <!--/.row-->
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Tên nhân viên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $staff)<tr>
                                    <td>{{$staff['id']}}</td>
                                    <td>{{$staff['name']}}</td>
                                    <td>{{$staff['email']}}</td>
                                    <td>{{$staff['phone']}}</td>
                                    <td class="form-group">
                                        <a href="/admin/quyenhan/show/{{$staff['id']}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>	
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/master/thongtin');