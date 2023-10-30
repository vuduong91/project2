@include('admin/master/tieude');
@include('admin/master/danhmuc');
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <label>Tên sản phẩm (Không cần thay đổi)</label>
                        <input type="text" value="{{$data["name_sp"]->name_sp}}">
                        
                            <form role="form" method="post" action="/admin/product_detail/xl_addct/{{$data['id']}}"  enctype="multipart/form-data">
								@csrf
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required name="cost" type="number" min="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required name="warranty" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input required name="discount" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input required name="new" type="text" class="form-control">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input name="ha_sp" type="file">
                        </div>
                        <div class="form-group">
                            
                             
                        </div>
                        <div class="form-group">
                            <label>So luong</label>
                            <input name="quanlity" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value=1 selected>Còn hàng</option>
                                <option value=0>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input name="featured" type="checkbox" value=1>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea required name="details" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form> 
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div> <!--/.main-->

<script>
    function preview() {
        prd_image.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
@include('admin/master/thongtin');   