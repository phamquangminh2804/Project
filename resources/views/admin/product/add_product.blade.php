@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
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
                        <form id="myForm" role="form" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" name="product_name" onkeyup="removeAccents(this)" class="form-control" id="product_name">
                                <input type="hidden" name="slug_product_name" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="product_price">
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="product_image" onchange="displayImage(event)">
                                <img id="previewImage" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
                            </div>
                            <div class="form-group">
                                <label for="product_desc">Mô tả sản phẩm</label>
                                <textarea style="resize:none" rows="8" name="product_desc" class="form-control"  placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội dung sản phẩm</label>
                                <textarea style="resize:none" rows="8" name="product_content" class="form-control" id="ckeditor2" placeholder="Mô tả nội dung sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_keywords">Từ khóa sản phẩm</label>
                                <textarea style="resize:none" rows="8" name="product_keywords" class="form-control"  placeholder="Từ khóa sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_product">Danh mục sản phẩm</label>
                                <select name="category_product" class="form-control input-sm m-bot15">
                                    @foreach($category_product as $key => $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand_product">Thương hiệu sản phẩm</label>
                                <select name="brand_product" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_status">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
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
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('previewImage').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection