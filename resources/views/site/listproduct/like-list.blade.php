@include('site/master/master1')
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-sm-9 col-xs-12">
          <div class="col-main">
            <div class="my-account">
              <div class="page-title">
                <h2>My Wishlist</h2>
              </div>
              <div class="my-wishlist">
                <div class="table-responsive">
                  <form method="post" action="#" id="wishlist-view-form">
                    <fieldset>
                      <table id="wishlist-table" class="clean-table linearize-table data-table">
                        <thead>
                          <tr class="first last">
                            <th class="customer-wishlist-item-image"></th>
                            <th class="customer-wishlist-item-info"></th>
                            <th class="customer-wishlist-item-quantity">Quantity</th>
                            <th class="customer-wishlist-item-price">Price</th>
                            <th class="customer-wishlist-item-cart"></th>
                            <th class="customer-wishlist-item-remove"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data['product'] as $product)
                          <tr class="first odd">
                            <td class="wishlist-cell0 customer-wishlist-item-image"><a title="Retis lapen casen" href="#/" class="product-image"> <img width="150" alt="Retis lapen casen" src="{{asset("img/" . $product['ha_sp'])}}"></a></td>
                            <td class="wishlist-cell1 customer-wishlist-item-info"><h3 class="product-name"><a title="Retis lapen casen" href="/site/listproduct/{{$product['id']}}">{{$product['name_sp']}}</a></h3>
                              <textarea title="Comment" onblur="focusComment(this)" onfocus="focusComment(this)" cols="6" rows="4" name="description[31]" href="/site/listproduct/{{$product['id']}}">{{$product['details']}}</textarea></td>
                            <td data-rwd-label="Quantity" class="wishlist-cell2 customer-wishlist-item-quantity"><div class="cart-cell">
                                <div class="add-to-cart-alt">
                                  <input type="text" value="1" name="qty[31]" class="input-text qty validate-not-negative-number" pattern="\d*">
                                </div>
                              </div></td>
                            <td data-rwd-label="Price" class="wishlist-cell3 customer-wishlist-item-price"><div class="cart-cell">
                                <div class="price-box"><span href="/site/listproduct/{{$product['id']}}" class="regular-price"><span class="price"></span>{{number_format($product['cost'])."VNĐ"}} VND </span></div>
                              </div></td>
                            <td class="wishlist-cell4 customer-wishlist-item-cart"><a title="add" href='/site/shoppingcart/addList/{{$product['id']}}/1' >
                               <ion-icon name="cart-outline"></ion-icon></a></td>
                              <td class="a-center last"><a title="Remove item" href="/site/like/add/{{$product['id']}}"><ion-icon name="trash-outline"></ion-icon></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="buttons-set buttons-set2">
                        <p class="back-link"><a href="/site/listproduct/list"><small>« </small>Back</a></p>
                        {{-- <button class="button btn-add" onclick="/site/shoppingcart/addList/{{$product['id']}}/1" title="Add All to Cart" type="button"><span>Add All to Cart</span></button> --}}
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        
      </div>
    </div>
  </div>
  <!-- Brand Logo Section -->
  @include('site/master/master2')