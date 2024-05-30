@extends('welcome')

@section('content')


<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach($all_product as $key => $product)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->slug_product_name)}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form>
                                @csrf
                                    <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                
                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                    
                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->slug_product_name)}}">
                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                <p>{{$product->product_name}}</p>

                             
                             </a>
                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                            </form>

                        </div>
                            {{-- <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div> --}}
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
</div><!--features_items-->

{{-- <div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="tab-pane fade" id="blazers" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{('public/frontend/images/gallery4.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="sunglass" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{('public/frontend/images/gallery3.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/category-tab--> --}}


@endsection
