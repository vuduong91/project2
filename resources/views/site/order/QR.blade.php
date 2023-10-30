@include('site/master/master1')
<h1 style="align-content: center">
    Thanh toán chuyển khoản
</h1>
<h3 style="align-content: center">Mã QR</h3>
<table>
    <thead>
        <tr>
            <img src="{{asset('site/images/maqr.jpg')}}" alt="product-img" class="img-fluid">
            <th>Thanh toán chuyển khoản sẽ phải đợi lâu hơn để xác nhận đơn hàng !</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <h1 class="fw-700 color-d5">Cảm ơn bạn đã đặt hàng</h1>
        <a href="/site/order/list" class="backto">Hoàn thành</a>
    <tr>
    </tbody>
</table>
@include('site/master/master2')