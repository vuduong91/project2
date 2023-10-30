
@include('site/master/master1')
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"><a href="index.html">Home</a><span>/</span></li>
            <li><a href="grid.html">Page</a> <span>/</span></li>
            <li><a href="grid.html">Product detail</a><span>/</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view">
              <div class="product-essential">
                <form action="
                  /site/shoppingcart/addDetail/{{$data['product']->id}}" method="post" >
                  @csrf
                  <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                    <div class="new-label new-top-left"> New </div>
                    <div class="product-image">
                      <?php// dd($data)?>
                      <div class="product-full"><img id="product-zoom" src="{{asset("img/". $data['product']->ha_sp)}}" data-zoom-image="products-images/product9.jpg" alt="product-image"/> </div>
                    </div>
                    <!-- end: more-images --> 
                  </div>
                  <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                    {{-- <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a>
                       <a class="product-prev" ><span></span></a> </div> --}}
                    <div class="product-name" href="">
                        <h1>{{$data['product']->name_sp}}</h1> 
                    </div>
                    <div class="ratings">
                      <div class="rating-box">
                        <div class="rating width60"></div>
                      </div>
                      {{-- <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator">|</span> <a href="#">Add Your Review</a> </p> --}}
                    </div>
                    <div class="price-block">
                      
                      <div class="price-box" href="">
                        <p class="customer-wishlist-item-quantity"><span class="price-label">Quanlity:{{$data['product']->quanlity}}</span><span class="price"> </span></p>
                        <p class="special-price"  ><span class="price-label">Special Price</span> <span id="product-price-48" class="price"> {{number_format($data['product']->cost).'VNĐ'}} VND </span></p>
                        <p class="old-price"><span class="price-label">Regular Price:</span><span class="price"></span></p>
                        <p class="availability in-stock pull-right"><a class="" href="/site/like/add/{{$data['product']->id}}"><ion-icon name="heart-outline"></ion-icon></a></p>
                      </div>
                    </div>
                    <div class="short-description">
                      <h2>Tinh trang:</h2>
                      <p> {{$data['product']->new}}</p>
                    </div>
                    <div class="short-description"  href="/site/category/list/{{$data['product']->cateID}}">
                      <h2>Category:</h2>
                      <td><a> {{$data['product']->nameCatr}}</a></td>
                    </div>
                    <div class="add-to-box">
                      <div class="add-to-cart">
                        <div class="pull-left">
                          <div class="custom pull-left">
                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                            <input type="text" class="input-text qty" value="1" title="Qty"  maxlength="12" id="qty" name="qty">
                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                          </div>
                        </div>
                        <button class="button btn-cart" title="Add to Cart"  type="submit">Add to Cart</button>
                      </div>
                      <div class="email-addto-box">
                        <ul class="add-to-links">
                          <li></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
            <div class="add_info">
              <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Product Description</a></li>
                <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="product_tabs_description">
                  <div class="std">
                    {{$data['product']->details}}
                  </div>
                </div>
                <div class="tab-pane fade" id="product_tabs_tags">
                  <div class="box-collateral box-tags">
                    <div class="tags">
                        <div class="form-add-tags">
                          <td>
                            <a href="/site/category/list/{{$data['product']->cateID}}">{{$data['product']->nameCatr}}</a>, 

                            <a href="">{{$data['product']->name_sp}}</a>
                            <td>
                    </div>
                    <!--tags-->

                  </div>
                </div>
                
          </div>
        </div>
      </div>
      
    </div>
  </section>
  <!-- Main Container End --> 
  
  <!-- Related Products Slider -->
  
  <div class="container"> 
    
    <!-- Related Slider -->
    <div class="related-pro">
      <div class="slider-items-products">
        <div class="related-block">
          <div id="related-products-slider" class="product-flexslider hidden-buttons">
            <div class="home-block-inner">
              <div class="block-title">
                <h2>Related<br>
                  <em> Products</em></h2>
              </div>
              <div class="pretext">Sem vel turpis, mi vivamus wisi, velit dolor nulla vehicula elit molestie imperdiet, quo ipsum vitae fusce consequat. Amet id posuere amet, vitae vestibulum elit est maecenas sapien ut. </div>
              <a href="grid.html" class="view_more_bnt">View All</a> </div>
            <div class="slider-items slider-width-col4 products-grid block-content">     
              @foreach($data['product3'] as $product3)
              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info">
                      <a class="product-image" title="" href="/site/listproduct/show/{{$product3['id']}}"><img alt="" src="{{asset("img/" . $product3['ha_sp'])}}"></a>
                      <div class="new-label new-top-right">new</div>
                      <div class="box-hover">
                        <ul class="add-to-links">
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="Retis lapen casen" href="/site/listproduct/{{$product3['id']}}">{{$product3['name_sp']}}</a></div>
                      <div class="rating">
                        <div class="ratings">
                          <div class="rating-box">
                            <div class="rating width80"></div>
                          </div>
                          <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator"></span><a href="#">Add Review</a></p>
                        </div>
                      </div>
                      <div class="item-content">
                        <div class="item-price" href="/site/listproduct/{{$product3['id']}}">
                          <div class="price-box"><span class="regular-price"><span class="price">{{number_format($product3['cost']).'VNĐ'}}</span></span></div>
                        </div>
                        <div class="action">
                          <button class="button btn-cart" onclick="location.href='/site/shoppingcart/addList/{{$product3['id']}}/1' "type="submit"><span>Add to Cart</span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End related products Slider --> 
    
  </div>
  <!-- Related Products Slider End --> 
  
  <!-- Upsell Product Slider -->
  
  <div class="container"> 
    <!-- upsell Slider -->
    <div class="upsell-pro">
      <div class="slider-items-products">
        <div class="upsell-block">
          <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
            <div class="home-block-inner">
              <div class="block-title">
                <h2>Sold out<br>
                  <em>Product</em></h2>
              </div>
              <div class="pretext"></div>
              <a href="grid.html" class="view_more_bnt">View All</a> </div>
            <div class="slider-items slider-width-col4 products-grid block-content">
              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="product_detail.html"><img alt="Retis lapen casen" src="{{asset('site/images/limit1.png')}}"></a>
                      
                      <div class="box-hover">
                        <ul class="add-to-links">
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="" href="product_detail.html">Ghế bar Fifties da màu cognac</a></div>
                      <div class="rating">
                        <div class="ratings">
                          <div class="rating-box">
                            <div class="rating width80"></div>
                          </div>
                       
                        </div>
                      </div>
                      <div class="item-content">
                        <div class="item-price">
                      
                        </div>
                        <div class="action">
                    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Item -->
              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="product_detail.html"><img alt="Retis lapen casen" src="{{asset('site/images/limit2.png')}}"></a>
                      <div class="box-hover">
                        <ul class="add-to-links">
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="" href="product_detail.html">Giường hộc kéo Penny 1m8</a></div>
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div class="rating width80"></div>
                            </div>
                          
                          </div>
                        </div>
                        <div class="item-price">
                          <div class="price-box"><span class="regular-price"><span class="price"></span></span></div>
                        </div>
                        <div class="action">
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Item --> 
              
              <!-- Item -->
              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="product_detail.html"><img alt="Retis lapen casen" src="{{asset('site/images/limit3.png')}}"></a>
                      <div class="box-hover">
                        <ul class="add-to-links">
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="" href="product_detail.html">Giường cao su Avalot</a></div>
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div class="rating width80"></div>
                            </div>
                            <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator"></span><a href="#"></a></p>
                          </div>
                        </div>
                        <div class="item-price">
                        
                        </div>
                        <div class="action">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  
              <!-- End Item -->
              
              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="product_detail.html"><img alt="Retis lapen casen" src="{{asset('site/images/limit4.png')}}"></a>
                    
                      <div class="box-hover">
                        <ul class="add-to-links">
                      
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="" href="product_detail.html">Bàn làm việc Finn 260011</a></div>
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div class="rating width80"></div>
                            </div>
                            <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator">|</span><a href="#"></a></p>
                          </div>
                        </div>
                        <div class="item-price">
                        
                        </div>
                        <div class="action">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- End Item --> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Upsell  Slider --> 
  </div>
  @include('site/master/master2')