@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
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
                    <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST" id="brandProductForm">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" name="brand_product_name" onkeyup="removeAccents(this)" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                            <input type="hidden" name="slug_brand_name" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize:none" rows="8"  name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                        </div>                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa thương hiệu</label>
                            <textarea style="resize:none" rows="8"  name="brand_product_keywords" class="form-control" id="exampleInputPassword1" placeholder="Từ khóa thương hiệu"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm danh mục</button>
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

@endsection