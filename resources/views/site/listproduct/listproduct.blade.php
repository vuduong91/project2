@include('site/master/master1')
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"><a href="index.html">Home</a><span>/</span></li>
            <li><a href="grid.html">Page</a><span>/</span></li>
            <li><strong>Product</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  
  <section class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-xs-12 col-sm-push-3"> 
          <!-- category slider -->
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1 owl-carousel owl-theme">
                  <div class="item"> <a href="#"><img style="height: 100px; width: 200px" alt="category-img" src="{{asset('site/images/logonh1.jpg')}}"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      {{-- <div class="small-tag"><span>Sale</span> 10% OFF</div>
                      <h2 class="cat-heading">Fresh Vegetables</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                    </div>
                  </div>
                  <div class="item"> <a href="#"><img style="height: 100px; width: 200px" alt="category-img" src="{{asset('site/images/logonh2.png')}}"></a> </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End category slider --> 
          
          <!-- Col- Main -->
          <article class="col-main">
            <h2 class="page-heading"><span class="page-heading-title">Regular product</span></h2>
            <div class="display-product-option">
              <div class="pager hidden-xs">
                <div class="pages">
                  
                </div>
              </div>
              <div class="sorter">
               
              </div>
            </div>
            <div class="category-products">
              
              <ol class="products-list" id="products-list">
                @foreach($data['product'] as $product)
                <li class="item">
                  <div class="product-image"><a href="" title="Retis lapen casen">
                    <img class="small-image" src="{{asset("img/" . $product['ha_sp'])}}" alt="Retis lapen casen"></a></div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="/site/listproduct/show/{{$product['id']}}" title="Retis lapen casen">{{$product['name_sp']}}</a></h2>
                    <div class="ratings">
                    <div class="desc std" >
                      <a class="link-learn" href="/site/listproduct/{{$product['id']}}">Mo ta san pham: </a>
                     <p>{{$product['details']}}</p>
                    </div>
                    <div class="price-box" href="/site/listproduct/{{$product['id']}}><span class="regular-price><span class="price"></span>{{number_format($product['cost']).'VNĐ'}}   </span> </div>
                    <div class="actions">
                      <button class="button btn-cart" title="Add to Cart" type="button"  onclick="location.href='/site/shoppingcart/addList/{{$product['id']}}/1' ">
                      <span>Add to Cart</span></button>
                      <span class="add-to-links">
                      <a title="Add to Wishlist" class="button link-wishlist" href="  @if(Auth::guard("client")->check())
                        /site/like/add/{{$product['id']}}
                    @else
                        /login/showViewlogin
                    @endif"><i class="fa fa-heart"></i>
                      <span>Add to Wishlist</span></a> 
                      <a title="Product_detail" class="button link-compare" href="/site/listproduct/show/{{$product['id']}}"><i class="fa fa-signal"></i>
                      <span>Product detail</span></a> </span> </div>
                  </div>
                </li>
                @endforeach
              </ol>
             
            </div>
          </article>
          <!--	End article  --> 
        </div>
        <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9"> 
          <!--	Sidebar  -->
          <aside class="col-left sidebar"> 
            <!-- Categories -->
            <div class="side-nav-categories">
              <div class="block-title">Categories</div>
              <form action="/site/search" method="post" class="form-inline">
                @csrf
              <div class="box-content box-category">
                @foreach($data['category'] as $category)
                <ul>
                  <li><a href="/site/category/list/{{$category['id']}}">{{$category['nameCatr']}}</a></li>
                </ul>
                @endforeach
              </div>
            </div>
            <!-- My Cart -->
            
              
            </div>
            <!-- Add Banner -->
      </div>
    </div>
  </section>
  @include('site/master/master2')