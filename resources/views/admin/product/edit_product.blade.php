@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span id="message" class="text-alert">' . $message . '</span>';
                        Session::forget('message');
                    }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($edit_product as $key => $product)
                        <form role="form" action="{{URL::to('/update-product/'.$product->product_id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" value="{{$product->product_name}}" onkeyup="removeAccents(this)" name="product_name" class="form-control" id="exampleInputEmail1">
                            <input type="hidden" value="{{$product->slug_product_name}}" name="slug_product_name" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" value="{{$product->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1">
                        </div>  
                        <div class="form-group" style="width: 300px">
                            <div  style="display: ruby;">
                            <label for="exampleInputEmail1" style="float:left">Hình ảnh sản phẩm</label>  
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" onchange="displayImage(event)">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" style="width: 100px; height: 100px; margin-top: 10px;float:left ">
                            <p id="arow" style="display: none;">=====></p>
                            <img id="previewImage" src="#" alt="Preview" style="width: 100px; height: 100px; margin-top: 10px; display: none; ">
                        </div>
                    </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize:none"  rows="8" type="password" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm">{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize:none" rows="8" type="password" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả nội dung sản phẩm">{{$product->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_keywords">Từ khóa sản phẩm</label>
                            <textarea style="resize:none" rows="8" name="product_keywords" class="form-control"  placeholder="Từ khóa sản phẩm">{{$product->meta_keywords}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="category_product" class="form-control input-sm m-bot15">
                                    @foreach($category_product as $key => $category)
                                        @if($category->category_id==$product->category_id)
                                            <option selected value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @else
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                <select name="brand_product" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        @if($brand->brand_id==$product->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                        </div>
                        
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>
    </div>
</div>


<script>
    setTimeout(function() {
        var messageElement = document.getElementById('message');
        if (messageElement) {
            var opacity = 1;
            var intervalID = setInterval(function() {
                if (opacity <= 0) {
                    messageElement.style.display = 'none';
                    clearInterval(intervalID);
                } else {
                    opacity -= 0.5; // Tốc độ mờ dần
                    messageElement.style.opacity = opacity;
                }
            }, 100); // Thời gian mờ dần (milliseconds)
        }
    }, 2000); // Thời gian hiển thị trước khi bắt đầu mờ dần (milliseconds)

    //slug
    function removeAccents(str) {
            let substr = str.value;
            var AccentsMap = [
                "aàảãáạăằẳẵắặâầẩẫấậ",
                "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
                "dđ", "DĐ",
                "eèẻẽéẹêềểễếệ",
                "EÈẺẼÉẸÊỀỂỄẾỆ",
                "iìỉĩíị",
                "IÌỈĨÍỊ",
                "oòỏõóọôồổỗốộơờởỡớợ",
                "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
                "uùủũúụưừửữứự",
                "UÙỦŨÚỤƯỪỬỮỨỰ",
                "yỳỷỹýỵ",
                "YỲỶỸÝỴ",
                " .:/@#<>%^*()",
            ];
            for (var i=0; i<AccentsMap.length; i++) {
                var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
                var char = AccentsMap[i][0];
                substr = substr.replace(re, char);
                substr = substr.replace(/\s/g,'-');
            }
            document.querySelector('#slug').value = substr;
        }
</script>

<script>
    function displayImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('arow').src = e.target.result;
                document.getElementById('arow').style.display = 'block';
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('previewImage').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection