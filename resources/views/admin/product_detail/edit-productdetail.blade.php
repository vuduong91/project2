@include('admin/master/tieude');
@include('admin/master/danhmuc');
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Sản phẩm số 1</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm: Sản phẩm số 1</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form action="/admin/product_detail/xl_editct/{{$data["productdetail"]->id}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="cost" required value="<?php echo $data['productdetail']['cost']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="warranty" required value="<?php echo $data['productdetail']['warranty']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" name="discount" required value="<?php echo $data['productdetail']['discount']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" name="new" required value="<?php echo $data['productdetail']['new']; ?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>so luong</label>
                                <input type="text" name="quanlity" required value="<?php echo $data['productdetail']['quanlity']; ?>" type="text" class="form-control">
                            </div>

                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file"  name="ha_sp" onchange="preview();">

                            <input type="hidden" name="ha_old" value="<?php echo $data['productdetail']['ha_sp']  ?>">
                            <br>
                            <div>
                                <?php 
                                     if(empty($data['productdetail']['ha_sp'])) {
                                         echo '<img src="/mvc/public/admin/images/no-img.jpg" id="ha_sp">';
                                     }else{
                                         echo '<img src="/mvc/public/admin/images/'.$data['productdetail']['ha_sp'].'" id="ha_sp">';
                                     }
                                ?>
                                
                            </div>
                        </div> 
                        <div class="form-group">  
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option <?php if($data['productdetail']['status'] == 1) echo "selected"; ?> value=1>Còn hàng</option>
                                <option <?php if($data['productdetail']['status'] == 2) echo "selected"; ?> value=2>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input name="featured" type="checkbox" value=1 <?php if($data['productdetail']['featured'] == 1) echo "checked"; ?>>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="details" required class="form-control" rows="3"><?php echo $data['productdetail']['details'] ?></textarea>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div> <!--/.main-->
{{-- <script>
    function preview() {
        prd_image.src=URL.createObjectURL(event.target.files[0]);
    }
</script> --}}
@include('admin/master/thongtin');   