@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/gio-hang')}}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content = Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $value_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$value_content->options->image)}}" alt="" height="50px" width="50px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$value_content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($value_content->price).' VND'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-qty')}}" method="POST">
                                    @csrf
                                    <input  class="cart_quantity_input " name="cart_quantity" type="number" min="1" value="{{$value_content->qty}}" />
                                    {{-- <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$value_content->qty}}" > --}}
                                    <input type="hidden" value="{{$value_content->rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="update" name="update_qty" class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                    $subtotal = $value_content->price * $value_content->qty;
                                    echo number_format($subtotal).' VND';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$value_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <h4 style="margin:40px 0px; font-size:20px;">Chọn hình thức thanh toán</h4>
        <form method="POST" action="{{URL::to('/order-place')}}">
            @csrf
            <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Thanh toán bằng ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="checkbox"> Thẻ ghi nợ</label>
                </span>
                {{-- <span>
                    <label><input type="checkbox"> Paypal</label>
                </span> --}}
            </div>
            <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
        </form>
    </div>
</section> <!--/#cart_items-->


@endsection
