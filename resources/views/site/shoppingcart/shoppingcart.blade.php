@include('site/master/master1')
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
          <div class="table-responsive">
            <form method="post" action="/site/shoppingcart/updateCart/{{$data["Idcart"]->id}}">
              @csrf
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                  <thead>
                    <tr>
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                      <th rowspan="1"></th>
                      <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                      <th class="a-center" rowspan="1">Qty</th>
                      <th colspan="1" class="a-center">Subtotal</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      <th class="a-right last" colspan="50"><button class="button btn-continue" title="Continue Shopping" type="button"><span>Continue Shopping</span></button>
                        <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span>Update Cart</span></button>
                        </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $sumAllProductInCart = 0; ?>
                    @foreach($data['carts'] as $cart)       
                    <tr>
                      <td class="image"><a class="product-image" title="" href="#"><img alt="" src="{{asset("img/" . $cart['ha_sp'])}}"></a></td>
                      <td><h2 class="product-name"> <a href="#">{{$cart['name_sp']}}</a> </h2></td>
                      <td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#"></a></td>
                      <td class="a-right"><span class="cart-price"> <span class="price">{{$cart['cost']}} VND</span> </span></td>
                      <td  class="a-center movewishlist">
                        <input type="number" class="input-text qty text" step="1" min="1" name="quanlity[{{$cart['product_id']}}]" value="{{$cart['quanlity']}}" title="Số lượng" size="4" placeholder="" />
                      </td>
                      <td class="a-right movewishlist"><span class="cart-price"> <span class="price">{{number_format($cart['quanlity'] * $cart['cost']) . ' VNĐ'}}
                        <?php $sumAllProductInCart += ($cart['quanlity'] * $cart['cost']); ?> VND</span> </span></td>
                      <td class="a-center last"><a title="Remove item" href="/site/shoppingcart/deleted/{{$cart['productdetail_id']}}/{{$cart["cart_id"]}}"><ion-icon name="trash-outline"></ion-icon></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </fieldset>
            </form>
          </div>
          <!-- BEGIN CART COLLATERALS -->
            <div class="totals col-sm-4">
              <h3>Shopping Cart Total</h3>
              <div class="inner">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                  <tbody>
                    <tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="a-left"><strong>Grand Total</strong></td>
                      <td class="a-right"><strong><span class="price"><?php echo number_format($sumAllProductInCart - 0) . ' VNĐ'; ?></span></strong></td>
                    </tr>
                  </tfoot>
                </table>
                <ul class="checkout">
                  <li>
                    <button class="button btn-proceed-checkout" onclick="location.href='/site/order/index{{$data['carts']}}/1'" title="Proceed to Checkout" type="button"><span>Process to Checkout</span></button>
                  </li>
                  <li><a title="Checkout with Multiple Addresses" href="multiple_addresses.html">Checkout with Multiple Addresses</a></li>
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
          
          <!--cart-collaterals--> 
          
        </div>
        <div class="crosssel">
          <div class="new_title">
            <h2><strong>you may be</strong> interested</h2>
          </div>
          <div class="category-products">
            {{-- @foreach($data['product'] as $product) --}}
            <ul class="products-grid">
              <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="product_detail.html"><img alt="Retis lapen casen" src="{{asset("site/images/banan.jpg")}}"></a>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="Retis lapen casen" href="product_detail.html">Kitchen Table</a></div>
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
              <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="/site/listproduct/list"><img alt="Retis lapen casen" src="{{asset("site/images/Banan8nguoi.jpg")}}"></a>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="Retis lapen casen" href="/site/listproduct/list">Kitchen Big Table</a></div>
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
              <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="/site/listproduct/list"><img alt="Retis lapen casen" src="{{asset("site/images/limit1.png")}}"></a>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="Retis lapen casen" href="/site/listproduct/list">chilling chair</a></div>
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
              <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="" href="/site/listproduct/list"><img alt="Retis lapen casen" src="{{asset("site/images/limit2.png")}}"></a>
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a title="Retis lapen casen" href="/site/listproduct/list">luxury bed</a></div>
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div class="rating width80"></div>
                            </div>
                            <p class="rating-links"><a href="#">1 Review(s)</a><span class="separator"></span><a href="#">Add Review</a></p>
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
              {{-- @endforeach --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('site/master/master2')
  <!-- Brand Logo Section -->
