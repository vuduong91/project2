@include('admin/master/tieude')
@include('admin/master/danhmuc')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active">Danh mục 1</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:Danh mục 1</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            {{-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> --}}
                        <form action="/admin/category/xl_edit/{{$data->id}}" role="form" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="nameCatr" required value="{{$data->nameCatr}}" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
</body>

@include('admin/master/thongtin')
