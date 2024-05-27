@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="container">
        <form action="{{URL::to('/continue-order')}}" >
            <div class="review-payment">
                <h2>Cảm ơn bạn đã đặt hàng</h2>
            </div>
            <input type="submit" value="Tiếp tục mua hàng" name="continue_order" class="btn btn-primary btn-sm">
        </form>
    </div>
</section> <!--/#cart_items-->


@endsection
