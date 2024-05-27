@extends('welcome')

@section('content')
<div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="" data-size="" data-share="true"></div>

<div class="features_items"><!--features_items-->
    @foreach($category_name as $key => $category_name_title)
    <h2 class="title text-center">{{$category_name_title->category_name}}</h2>
    @endforeach
    @foreach($category_by_id as $key => $product)
        <a href="{{URL::to('chi-tiet-san-pham/'.$product->slug_product_name)}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" height="250px" width="150px">
                            <h2>{{number_format($product->product_price).' VND'}}</h2>
                            <p>{{$product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>  
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    <div class="fb-comments" data-href="https://www.youtube.com/watch?v=B9Occl7sDFI&amp;list=PLWTu87GngvNxpWN6FVuEcS-YvFNq6RnqG&amp;index=57" data-width="" data-numposts="5"></div>
</div><!--features_items-->

@endsection
