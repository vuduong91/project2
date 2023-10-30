<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicons Icon -->
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<title>Brezza- Furniture shopping luxury</title>
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{asset('site/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/font-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/jquery.mobile-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/revslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/style.css')}}">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>

<body class="compare-page">
<div id="page" > 
  <!-- Header -->
  <header  style=" background: rgb(2,0,36);
  background: radial-gradient(circle, rgba(2,0,36,1) 64%, rgba(4,3,60,1) 74%, rgba(9,9,121,1) 100%, rgba(0,212,255,1) 100%);">
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row"> 
            <!-- Header Language -->
            <div class="col-xs-12 col-sm-6">
              <div class="dropdown block-language-wrapper"><a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"><img style="width: 30px"  src="{{asset('site/images/image2.jpg')}}" alt="VietNam">VietNam<span class="caret"></span></a>
              </div>
              <!-- End Header Language --> 
              <!-- Header Currency -->
              <div class="dropdown block-currency-wrapper"><a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="#">VND<span class="caret"></span></a>
              </div>
              <!-- End Header Currency -->
              <div class="welcome-msg">Welcome and enjoy to shopping for your house!</div>
            </div>
            <div class="col-xs-6 hidden-xs" > 
              <!-- Header Top Links -->
              <div class="toplinks">
                <div class="links">
                  <div class="myaccount"><a href="login.html"><span class="hidden-xs">My Account</span></a></div>
                  <div class="check"><a href="/site/order/list"><span class="hidden-xs">Checkout</span></a></div>
                  <div class="login" style="color:black" ><a href="
                                          @if(Auth::guard("client")->check())
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
                                                          </span></a></div>
                </div>
              </div>
              <!-- End Header Top Links --> 
            </div>
          </div>
        </div>
      </div>
      <div class="container" >
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-block"> 
            <!-- Logo -->
            <div class="logo"><a title="Brezza" href="/site/home/home"><img alt="Brezza Logo" src="{{asset('site/images/logo.png')}}"></a></div>
            <!-- End Logo --> </div>
          <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 hidden-xs">
            <div class="search-box">
              <form action="/site/search" method="POST" >
                @csrf
                <input type="text" placeholder="Search here..." maxlength="70" name="search" id="search">
                <button type="button" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
              </form>
            </div>
          </div>
          
            <div class="top-cart-contain pull-right"> 
              <!-- Top Cart -->
              <div class="mini-cart"> 
                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a href=""><span class="cart_count"></span><span class="cart-title hidden-xs hidden-sm">My Cart </span><span class="price hidden-xs"> </span></a></div>
                <div>
                  <div class="top-cart-content">
                    <ul class="mini-products-list" id="cart-sidebar">
                    </ul>
                    <div class="actions">
                      <button class="btn-checkout" type="button" onclick="location.href='/site/shoppingcart/show';"><i class="fa fa-check"></i><span>shopping cart</span></button>
                  </div>
                </div>
              </div>
              <!-- End Top Cart --> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header --> 
    
    <!-- Navigation -->
    <nav  style="background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);">
      <div class="container"  >
        <div class="mm-toggle-wrap" >
          <div  class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span></div>
        </div>
        <div  style="background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);">
          <ul id="nav" class="hidden-xs" >
            <li class="level0 parent drop-menu" id="nav-home"><a href="/site/home/home" class="level-top"><span>Home</span></a>
              <ul class="level1">
                {{-- <li class="level1"><a href="newsletter.html"><span>Fruit Store</span></a></li>
                <li class="level1"><a href="../kid/newsletter.html"><span>Kid Store</span></a></li>
                <li class="level1"><a href="../furniture/newsletter.html"><span>Furniture Store</span></a></li> --}}
              </ul>
            </li>
            <li class="level0 nav-6 level-top drop-menu"><a class="level-top" href="#"><span>Pages</span></a>
              <ul class="level1">
                <li class="level2"><a href="/site/listproduct/list"><span>Product</span></a></li>
                <li class="level2"><a href="/site/shoppingcart/show"><span>Shopping Cart</span></a></li>
                <li class="level2"><a href="/site/order/list"><span>Checkout</span></a></li>
                <li class="level2"><a href="
                                                @if(Auth::guard("client")->check())
                                                    /site/like/product/{{Auth::guard("client")->user()->id}}
                                                @else
                                                    /login/showViewlogin
                                                @endif
                                                "><span>Wishlist</span></a></li>
              </ul>
            </li>
            
           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End nav --> 
  </header>