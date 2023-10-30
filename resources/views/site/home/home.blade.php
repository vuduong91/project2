@include('site/master/master1')
<!-- Slider -->
<div id="magik-slideshow" class="magik-slideshow">
<!-- End Slider --> 
<!-- Content Page -->
<div class="content-page" >
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-12 hot-deal">
        <ul class="products-grid">
          <li class="right-space two-height item">
            <div class="item-inner">
              <div class="item-img">
                <div class="item-img-info"><a href="/site/listproduct/list" title="" class="product-image"><img src="{{asset('site/images/banan.jpg')}}" alt="Retis lapen casen"></a>
                  <div class="box-hover">
                  </div>
                  <div class="box-timer">
                    <div class="countbox_1 timer-grid"></div>
                  </div>
                </div>
              </div>
              <div class="item-info">
                <div class="info-inner">
                  <div class="item-title"><a href="product_detail.html" title="Retis lapen casen">kitchen table</a></div>
                  <div class="item-content">
                    <div class="rating">
                      <div class="ratings">
                        <div class="rating-box">
                          <div class="rating width80"></div>
                        </div>
                        <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator">|</span><a href="#">Add Review</a></p>
                      </div>
                    </div>
                    <div class="item-price">
                      <div class="price-box"><span class="regular-price"><span class="price"></span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- New Product Section -->
      <div class="col-md-9 col-xs-12">
        <div class="category-product">
          <div class="navbar nav-menu">
            <div class="navbar-collapse">
              
              {{-- <ul class="nav navbar-nav">
                <li>
                  <form action="/site/search" method="post" class="form-inline">
                    @csrf 
                  <div class="new_title">
                    <h2><strong>New</strong> Products</h2>
                  </div>
                  @foreach($data['category'] as $category)
                </li>
                <li><a data-toggle="tab" href="/site/category/list/{{$category['id']}}">{{$category['nameCatr']}}</a>
              </li>
              @endforeach 
              </ul>
               --}}
            </div>
          </div>
          <div class="product-bestseller">
            <div class="product-bestseller-content">
              <div class="product-bestseller-list">
                <div class="tab-container">
                  <div class="tab-panel active" id="tab-1">
                    <div class="category-products">
                      @foreach($data['product'] as $product)
                      <ul class="products-grid">
                        <li class="item col-md-3 col-sm-4 col-xs-12">
                          <div class="item-inner">
                            <div class="item-img">
                              <div class="item-img-info"><a class="product-image" title="sp" href="/site/listproduct/show/{{$product['id']}}"><img style="height: 80px; with:20px" alt="Retis lapen casen" src="{{asset("img/" . $product['ha_sp'])}}"></a>
                                <div class="box-hover">
                                  <ul class="add-to-links">
                                
                                    <li><a class="link-wishlist" href="
                                      /site/like/add/{{$product['id']}}
                                 ">Wishlist</a></li>
                                 
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title" href="/site/listproduct/{{$product['id']}}"><a>{{$product['name_sp']}} </a></div>
                                <div class="item-content">
                                  <div class="rating">
                                    <div class="ratings">
                                      <div class="rating-box">
                                        <div class="rating width80"></div>
                                      </div>
                                      {{-- <p class="rating-links"><a href="#"></a><span class="separator">|</span><a href="#">Add Review</a></p> --}}
                                    </div>
                                  </div>
                                  <div class="item-price">
                                    <div class="price-box" href="/site/listproduct/{{$product['id']}}"><span class="regular-price">{{number_format($product['cost']).'VNĐ'}}<span class="price"></span></span></div>
                                  </div>
                                  <div class="action">
                                    <button class="button btn-cart"onclick="location.href='/site/shoppingcart/addList/{{$product['id']}}/1'" type="button"><span>Add to Cart</span></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>  
                      </ul>
                      @endforeach
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Content Page --> 
<!-- Best Sellers Section-->
<section class="bestsell-pro">
  <div class="container">
    <div class="block-title">
      <h2>Best Sellers</h2>
    </div>
    <div class="slider-items-products">
      <div class="bestsell-block">
        <div id="bestsell-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid block-content">
            @foreach($data['product'] as $product)
            <ul class="item">
              <li class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a class="product-image" title="" href="/site/listproduct/show/{{$product['id']}}"><img alt="Retis lapen casen" src="{{asset("img/" . $product['ha_sp'])}}"></a>
                    <div class="new-label new-top-right">New</div>
                    <div class="box-hover">
                      <ul class="add-to-links">
                        
                        <li><a class="link-wishlist" href="/site/like/add/{{$product['id']}}">Wishlist</a></li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"><a title="Retis lapen casen" href="/site/listproduct/{{$product['id']}}">{{$product['name_sp']}}</a></div>
                    <div class="rating">
                      <div class="ratings">
                        <div class="rating-box">
                          <div class="rating width80"></div>
                        </div>
                        <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator">|</span><a href="#">Add Review</a></p>
                      </div>
                    </div>
                    <div class="item-content">
                      <div class="item-price">
                        <div class="price-box" href="/site/listproduct/{{$product['id']}}"><span class="regular-price"><span class="price">{{number_format($product['cost']).'VNĐ'}}</span></span></div>
                      </div>
                      <div class="action">
                        <button class="button btn-cart" onclick="location.href='/site/shoppingcart/addList/{{$product['id']}}/1'" type="button"><span>Add to Cart</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Bestsell Slider --> 
<!-- Featured Product Section-->
<!-- End Featured Product Section --> 
<!-- Banner Section -->
<div class="bottom-banner-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="banner-inner">
          <div class="banner-details">
            <div class="banner-bnt"><a href="/site/listproduct/list">Learn More</a></div>
          </div>
          <img style="height: 250px;width= 180px" alt="banner" src="{{asset('site/images/logonh1.jpg')}}"></div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner Section --> 
<!-- Blog Section -->

@include('site/master/master2')