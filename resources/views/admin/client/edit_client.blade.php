@include('admin/master/tieude')
@include('admin/master/danhmuc')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li><a href="">Quản lý thành viên</a></li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-8">
						<form role="form" method="post" action="/admin/client/xl_editclt/{{$data['client']->id}}">
							@csrf
							<div class="form-group">
								<label>Họ & Tên</label>
								<input type="text" name="name" class="form-control" value="{{$data['client']->name}}" placeholder="name" required>
							</div>
							
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" value="{{$data["client"]->email}}" class="form-control">
								<!-- Lấy email cũ để xử lý trong hàm update -->
								{{-- <input type="hidden" name="old_email" value="" class="form-control"> --}}
							</div>
							<div class="form-group">
								<label>Mat khau</label>
								<input type="text" name="password" class="form-control" value="{{$data['client']->password}}" placeholder="">
							</div>
							<div class="form-group">
								<label>SDT</label>
								<input type="text" name="phone" class="form-control" value="{{$data["client"]->phone}}" placeholder="">
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" value="{{$data['client']->address}}" placeholder="">
							</div>
							<input type="submit" name="btn_update" class="btn btn-primary" value="Cập nhật">
							<button type="reset" class="btn btn-default">Làm mới</button>
					</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

</div> <!--/.main-->
@include('admin/master/thongtin')