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
                        <form action="/admin/product/xl_edit/{{$data["product"]->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name_sp" required value="{{$data["product"]->name_sp}}">
                            </div>
                            <label>Danh mục</label>
                            <select name="category_id" class="form-control">
                                @foreach($data['category'] as $category)
                                        <option @if($data['product']->category_id == $category['id'])  selected  @endif value={{$category['id']}}>
                                            {{$category["nameCatr"]}}
                                        </option>
                                    @endforeach
                            </select>
                            {{-- <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required value="<?php// echo $data['product']['prd_price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required value="<?php// echo $data['product']['prd_warranty']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input type="text" name="prd_accessories" required value="<?php// echo $data['product']['prd_accessories']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" name="prd_promotion" required value="<?php// echo $data['product']['prd_promotion']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" name="prd_new" required value="<?php// echo $data['product']['prd_new']; ?>" type="text" class="form-control">
                            </div> --}}

                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="prd_image" onchange="preview();">
                            <br>
                            <div>
                                <?php// 
                                    // if(empty($data['product']['prd_image'])) {
                                    //     echo '<img src="/mvc/public/admin/images/no-img.jpg" id="prd_image">';
                                    // }else{
                                    //     echo '<img src="/mvc/public/admin/images/'.$data['product']['prd_image'].'" id="prd_image">';
                                    // }
                                //?>
                                
                            </div>
                        </div> --}}
                        <div class="form-group">
                            
                        </div>

                        {{-- <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option <?php// if($data['product']['prd_status'] == 1) echo "selected"; ?> value=1>Còn hàng</option>
                                <option <?php// if($data['product']['prd_status'] == 2) echo "selected"; ?> value=2>Hết hàng</option>
                            </select>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input name="prd_featured" type="checkbox" value=1 <?php if($data['product']['prd_featured'] == 1) echo "checked"; ?>>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="prd_details" required class="form-control" rows="3"><?php echo $data['product']['prd_details'] ?></textarea>
                        </div> --}}
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