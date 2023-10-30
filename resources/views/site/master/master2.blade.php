<div class="brand-logo" >
    <div class="container">
      <div class="slider-items-products">
        <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6">
            {{-- <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh1.png')}}" alt="Brand Logo"></a></div> --}}
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh2.png')}}" alt="Brand Logo1"></a></div>
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh3.png')}}" alt="Brand Logo2"></a></div>
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh4.png')}}" alt="Brand Logo3"></a></div>
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh5.png')}}" alt="Brand Logo4"></a></div>
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh6.png')}}" alt="Brand Logo5"></a></div>
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh7.png')}}" alt="Brand Logo6"></a></div>
            <div class="item"><a href="#"><img style="height: 50px" src="{{asset('site/images/logonh8.png')}}" alt="Brand Logo7"></a></div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <!-- End Brand Logo Section --> 
  <!-- Footer -->
  <footer style="background: rgb(2,0,36);
  background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(73,71,181,1) 38%, rgba(9,9,121,1) 100%, rgba(0,212,255,1) 100%);">
    <div class="footer-inner" style="" >
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-lg-8">
            <div class="footer-column pull-left">
              <h4>My Account</h4>
              <ul class="links">
                <li><a title="Login" href="@if(Auth::guard("client")->check())
                  /logout
              @else
                  /login/showViewlogin
              @endif
                  "><span class="hidden-xs">
                              @if(Auth::guard("client")->check())
                                  Logout
                              @else
                                  LogIn
                              @endif
                              </span></a></a>
                            </li>
                <li><a title="Checkout" href="/site/order/list">Checkout</a></li>
              </ul>
            </div>
            <div class="footer-column pull-left">
              <h4>Style Advisor</h4>
              <ul class="links">
                <li><a title="Orders History" href="/site/like/product">whishlist</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-lg-4">
            <div class="footer-column-last">
              {{-- <div class="newsletter-wrap">
                <h4>Sign up for emails</h4>
                <form id="newsletter-validate-detail" method="post" action="#">
                  <div id="container_form_news">
                    <div id="container_form_news2">
                      <input type="text" class="input-text required-entry validate-email" placeholder="Enter your email address" title="Sign up for our newsletter" id="newsletter" name="email">
                      <button class="button subscribe" title="Subscribe" type="submit"><i class="fa fa-envelope"></i><span>Subscribe</span> </button>
                    </div>
                  </div>
                </form>
              </div> --}}
              <div class="social">
                <h4>Follow Us</h4>
                <ul class="link">
                  <li class="fb pull-left"><a title="FaceBook" href="https://www.facebook.com/profile.php?id=100071153757108"><i class="fa fa-facebook"></i></a></li>
                  {{--<li class="tw pull-left"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="googleplus pull-left"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="rss pull-left"><a href="#"><i class="fa fa-rss"></i></a></li>
                  <li class="pintrest pull-left"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li class="linkedin pull-left"><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
                  <li  class="youtube pull-left"><a title="youtube"  href="https://www.youtube.com/shorts/Gt6_xdzXpfI"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
              <div class="payment-accept">
                {{-- <div><a href="#"><img src="images/payment-1.png" alt="payment1"></a> <img src="images/payment-2.png" alt="payment2"> <img src="images/payment-3.png" alt="payment3"> <img src="images/payment-4.png" alt="payment4"> </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-middle">
      <div class="container">
        <div class="row">
          {{-- <div class="text-center"><a href="index.html"><img src="images/footer-logo.png" alt="logo"></a></div> --}}
          <address>
          <i class="fa fa-map-marker"></i> 39 Bắc Hồng, Đông Anh Hà Nội.<i class="fa fa-mobile"></i><span> 0928825568</span> <i class="fa fa-envelope"></i><span> crspth2003@gmail.com</span>
          </address>
        </div>
      </div>
    </div>
    <div class="our-features-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-xs-12 col-sm-6">
            <div class="feature-box"> <span class="fa fa-phone"></span>
              <div class="content">
                <h3>Hotline  0928825568</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-5 col-xs-12 coppyright">&copy; 39 Bắc Hồng, Đông Anh Hà Nội.</div>
          <div class="col-sm-7 col-xs-12 company-links">
            <ul class="links">
              {{-- <li><a href="#" title="Magento Themes">Magento Themes</a></li>
              <li><a href="#" title="Premium Themes">Premium Themes</a></li>
              <li><a href="#" title="Service Packs">Service Packs</a></li> --}}
              <li class="last"><a href="#" title="Extensions & Plugins">Extensions & Plugins</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer --> 
</div>
<!-- End page -->
<!-- mobile menu -->
<div id="mobile-menu">
  <ul>
    <li>
      <div class="mm-search">
        <form id="search1" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
          </div>
        </form>
      </div>
    </li>
    <li><a href="index.html">Home</a>
      <ul>
        <li class="level1"><a href="newsletter.html"><span>Fruit Store</span></a></li>
                <li class="level1"><a href="../kid/newsletter.html"><span>Kid Store</span></a></li>
                <li class="level1"><a href="../furniture/newsletter.html"><span>Furniture Store</span></a></li>
      </ul>
    </li>
    <li><a href="#">Pages</a>
      <ul>
        <li><a href="grid.html">Grid</a></li>
        <li><a href="list.html">List</a></li>
        <li><a href="product_detail.html">Product Detail</a></li>
        <li><a href="shopping_cart.html">Shopping Cart</a></li>
        <li><a href="checkout.html">Checkout</a></li>
        <li><a href="wishlist.html">Wishlist</a></li>
        <li><a href="dashboard.html">Dashboard</a></li>
        <li><a href="multiple_addresses.html">Multiple Addresses</a></li>
        <li><a href="about_us.html">About us</a></li>
        <li><a href="blog.html">Blog</a>
          <ul>
            <li><a href="blog-detail.html">Blog Detail</a></li>
          </ul>
        </li>
        <li><a href="contact_us.html">Contact us</a></li>
        <li><a href="404error.html">404 Error Page</a></li>
      </ul>
    </li>
    
    <li><a href="about_us.html">About us</a></li>
    <li><a href="contact-us.html">Contact Us</a></li>
  </ul>
  <div class="top-links">
    <ul class="links">
      <li><a title="My Account" href="login.html">My Account</a></li>
      <li><a title="Wishlist" href="wishlist.html">Wishlist</a></li>
      <li><a title="Checkout" href="checkout.html">Checkout</a></li>
      <li><a title="Blog" href="blog.html"><span>Blog</span></a></li>
      <li><a title="Login" href="login.html"><span>Login</span></a></li>
    </ul>
  </div>
</div> 

<!-- JavaScript --> 
<script src="{{asset('site/js/jquery.min.js')}}"></script> 
<script src="{{asset('site/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('site/js/jquery.mobile-menu.min.js')}}"></script> 
<script src="{{asset('site/js/common.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>