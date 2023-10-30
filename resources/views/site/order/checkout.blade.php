@include('site/master/master1')
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
          <div class="col-main">
            <div class="page-title">
              <h1>Checkout</h1>
            </div>
            <ol class="one-page-checkout" id="checkoutSteps">
                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="/site/order/addOrder">
                  @csrf
                <div class="step-title"> <span class="number">1</span>
                  <h3>Information</h3>
                  <!--<a href="#">Edit</a> --> 
                </div>
                <div id="checkout-step-billing" class="step a-item">
                  <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                    <label for="billing_company" class="">Họ và tên người nhận&nbsp;<span class="optional"></span>
                    </label>
                    <span class="woocommerce-input-wrapper">
                        <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="{{$data["client"]->name}}" value="{{$data["client"]->name}}" autocomplete="organization" required>
                    </span>
                </p>
                <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field" data-priority="50">
                    <label for="billing_address_1" class="">Địa chỉ cụ thể&nbsp;
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                        <input type="text" class="input-text" name="billing_address_1" id="billing_address_1" placeholder="{{$data["client"]->address}}" value="{{$data["client"]->address}}" autocomplete="address-line1" required data-placeholder="House number and street name">
                    </span>
                </p>
                <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                    <label for="billing_phone" class="">Số điện thoại liên hệ&nbsp;
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                        <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="{{$data["client"]->phone}}" value="{{$data["client"]->phone}}" autocomplete="tel" required>
                    </span>
                </p>
                <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                    <label for="billing_email" class="">Địa chỉ email&nbsp;
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                        <input type="email" class="input-text" name="billing_email" id="billing_email" placeholder="{{$data["client"]->email}}" value="{{$data["client"]->email}}" autocomplete="email here" required>
                    </span>
                </div>
              </li>
              <li id="opc-shipping" class="section">
                <div class="step-title"> <span class="number">2</span>
                  <h3 class="one_page_heading"> Shipping Information</h3>
                  <!--<a href="#">Edit</a>--> 
                </div>
              </li>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Information product</th>
                    <th scope="col">Cost</th>
                  </tr>
                </thead>
                <?php $giatong = 0; ?>
                <tbody>
                  @foreach($data['carts'] as $cart)  
                  <tr class="cart_item">
                      <td class="product-name">{{$cart['name_sp']}}&nbsp; <strong class="product-quantity">×&nbsp;{{$cart["quanlity"]}}</strong></td>
                      <td class="product-total">
                          <span class="woocommerce-Price-amount amount">
                              <bdi>
                                  <span class="woocommerce-Price-currencySymbol"></span><?php $tt = $cart['cost'] * $cart['quanlity'];
                                                                                              echo number_format($tt) . ' VNĐ';  ?>
                              </bdi>
                          </span>
                      </td>
                  </tr>
                  <?php $giatong += $tt; ?>
              @endforeach
                  <tr>
                    <th scope="row">Code for use</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                          <bdi>
                              <span class="woocommerce-Price-currencySymbol"></span><?php $giamgia = 0;
                                                                                          // if (isset($_SESSION['money'])) {
                                                                                          //     $giamgia = $_SESSION['money'];
                                                                                          // }
                                                                                          // if (isset($_SESSION['percent'])) {
                                                                                          //     $giamgia = ($_SESSION['percent'] * $giatong) / 100;
                                                                                          // }
                                                                                          //echo number_format($giamgia) . ' VNĐ'; ?>
                          </bdi>
                      </span>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">All cost product</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                          <bdi>
                              <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($giatong) . ' VNĐ'; ?>
                          </bdi>
                      </span>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">shipping</th>
                    <td data-title="Shipping">
                      <ul id="shipping_method" class="woocommerce-shipping-methods">
                          <li>
                              <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method" checked="checked">
                              <label for="shipping_method_0_free_shipping1">Đồng giá 30k</label>
                          </li>
                      </ul>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">All cost</th>
                    <td>
                      <strong>
                          <span class="woocommerce-Price-amount amount">
                              <bdi>
                                  <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($giatong + 30000 - $giamgia). ' VNĐ'; ?>
                              </bdi>
                          </span>
                      </strong>
                  </td>
                  </tr>
                </tbody>
              </table>
              <input type="hidden" name="sumOrder" value="{{$giatong + 30000 - $giamgia}}">
              <div id="payment" class="woocommerce-checkout-payment">
                <ul class="wc_payment_methods payment_methods methods">
                    @foreach($data['shipping'] as $pay)
                    <li class="wc_payment_method payment_method_bacs">
                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="{{$pay['id']}}" checked="checked" data-order_button_text="">
                        <label for="payment_method_bacs"> {{$pay['namePttt']}} </label>
                        <div class="payment_box payment_method_bacs">
                            <!-- <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p> -->
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="form-row place-order">
                    <div class="woocommerce-terms-and-conditions-wrapper">
                        <div class="woocommerce-privacy-policy-text">
                            <p>
                                <!-- <a href="#" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>. -->
                            </p>
                        </div>
                    </div>

                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Thanh toán</button>

                    <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="254c5dd23d">
                    <input type="hidden" name="_wp_http_referer" value="/01.%20wp-funnel/?wc-ajax=update_order_review">
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @include('site/master/master2')