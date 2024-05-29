<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/admin/bootstrap.min.css') }}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/admin/style.css') }}" rel="stylesheet" type='text/css' />
<link href="{{asset('public/backend/css/admin/style-responsive.css') }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/admin/font.css') }}" type="text/css"/>
<link href="{{asset('public/backend/css/admin/font-awesome.css') }}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/admin/morris.css') }}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/admin/monthly.css') }}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/admin/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/js/admin/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/admin/morris.min.js')}}"></script>


<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">


</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        Admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/images/admin/2.png')}}">
                <span class="username">
                    <?php
                        $name =  Session::get('admin_name');
                        if($name){
                            echo $name;
                        }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class="fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>
                    </ul>
                </li> 
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/insert-coupon')}}">Quản lý mã giảm giá</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Vận chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Quản lý vận chuyển</a></li>
                        
                        
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                    </ul>
                </li> 
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>     
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/admin/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/admin/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/admin/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/admin/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/admin/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor5/ckeditor.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
	ClassicEditor
    .create(document.querySelector('#ckeditor1'), {
        toolbar: [
            'heading',
            '|',
            'bold','italic','underline','strikethrough','subscript','superscript',
            '|',
            'alignment','bulletedList','numberedList','indent','outdent',
            '|',
            'blockQuote','code','link','insertTable','imageUpload','mediaEmbed',
            '|',
            'undo','redo',
            '|',
            'highlight','fontColor','fontBackgroundColor','fontSize','fontFamily',
            '|',
            'removeFormat','htmlEmbed','horizontalLine','specialCharacters','selectAll','findAndReplace','sourceEditing'
        ]
    })
    .catch(error => {
        console.error(error);
    });
</script>
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#ckeditor2' ) ,{
            ckfinder: {
            uploadUrl: 'http://localhost:8080/shopping/public/cpanel/ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700'
        },
        toolbar: {
            items: [
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link','ckfinder', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
                
            ],
            shouldNotGroupWhenFull: true
        }

        })
        .catch( error => {
            console.error( error );
        } );
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                product_name: {
                    required: true
                },
                product_price: {
                    required: true
                },
                product_image: {
                    required: true
                },
                product_desc: {
                    required: true
                },
                product_content: {
                    required: true
                },
                category_product: {
                    required: true
                },
                brand_product: {
                    required: true
                },
                product_status: {
                    required: true
                }
            },
            messages: {
                product_name: {
                    required: 'Vui lòng nhập tên sản phẩm'
                },
                product_price: {
                    required: 'Vui lòng nhập giá sản phẩm'
                },
                product_image: {
                    required: 'Vui lòng chọn hình ảnh sản phẩm'
                },
                product_desc: {
                    required: 'Vui lòng nhập mô tả sản phẩm'
                },
                product_content: {
                    required: 'Vui lòng nhập nội dung sản phẩm'
                },
                category_product: {
                    required: 'Vui lòng chọn danh mục sản phẩm'
                },
                brand_product: {
                    required: 'Vui lòng chọn thương hiệu sản phẩm'
                },
                product_status: {
                    required: 'Vui lòng chọn trạng thái hiển thị'
                }
            }
        });
    });
  </script>

  <script>
    $(document).ready(function() {
        $('#brandProductForm').validate({
            rules: {
                brand_product_name: {
                    required: true
                },
                brand_product_desc: {
                    required: true
                }
            },
            messages: {
                brand_product_name: {
                    required: 'Vui lòng nhập tên thương hiệu'
                },
                brand_product_desc: {
                    required: 'Vui lòng nhập tên mô tả thương hiệu'
                }
            },
            errorClass: 'error-message',
            errorElement: 'div',
            errorPlacement: function(error, element) {
            error.insertAfter(element);
            }
        });
        });
  </script>


<script>
    $(document).ready(function() {
        $('#categoryProductForm').validate({
            rules: {
            category_product_name: {
                required: true
            }
            },
            messages: {
            category_product_name: {
                required: 'Vui lòng nhập tên danh mục'
            }
            },
            errorClass: 'error-message',
            errorElement: 'div',
            errorPlacement: function(error, element) {
            error.insertAfter(element);
            }
        });
    });
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/admin/jquery.scrollTo.j')}}s"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
<script type="text/javascript" src="{{asset('public/backend/js/admin/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->

    <script type="text/javascript">
        $(document).ready(function(){
    
            fetch_delivery();
    
            function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                 $.ajax({
                    url : '{{url('/select-feeship')}}',
                    method: 'POST',
                    data:{_token:_token},
                    success:function(data){
                       $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur','.fee_feeship_edit',function(){
    
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                 var _token = $('input[name="_token"]').val();
                // alert(feeship_id);
                // alert(fee_value);
                $.ajax({
                    url : '{{url('/update-delivery')}}',
                    method: 'POST',
                    data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                    success:function(data){
                       fetch_delivery();
                    }
                });
    
            });
            $('.add_delivery').click(function(){
    
               var city = $('.city').val();
               var district = $('.district').val();
               var wards = $('.wards').val();
               var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
               // alert(city);
               // alert(district);
               // alert(wards);
               // alert(fee_ship);
                $.ajax({
                    url : '{{url('/insert-delivery')}}',
                    method: 'POST',
                    data:{city:city, district:district, _token:_token, wards:wards, fee_ship:fee_ship},
                    success:function(data){
                       fetch_delivery();
                    }
                });
    
    
            });
            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                // alert(action);
                //  alert(matp);
                //   alert(_token);
    
                if(action=='city'){
                    result = 'district';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                       $('#'+result).html(data);     
                    }
                });
            }); 
        })
    </script>
    <script type="text/javascript">
        $('.order_details').change(function(){
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();
    
            //lay ra so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function(){
                quantity.push($(this).val());
            });
            //lay ra product id
            order_product_id = [];
            $("input[name='order_product_id']").each(function(){
                order_product_id.push($(this).val());
            });
            j = 0;
            for(i=0;i<order_product_id.length;i++){
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
    
                if(parseInt(order_qty)>parseInt(order_qty_storage)){
                    j = j + 1;
                    if(j==1){
                        alert('Số lượng bán trong kho không đủ');
                    }
                    $('.color_qty_'+order_product_id[i]).css('background','#000');
                }
            }
            if(j==0){
              
                    $.ajax({
                            url : '{{url('/update-order-qty')}}',
                                method: 'POST',
                                data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                                success:function(data){
                                    alert('Thay đổi tình trạng đơn hàng thành công');
                                    location.reload();
                                }
                    });
                
            }
    
        });
    </script>
    <script type="text/javascript">
        $('.update_quantity_order').click(function(){
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_'+order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();
            // alert(order_product_id);
            // alert(order_qty);
            // alert(order_code);
            $.ajax({
                    url : '{{url('/update-qty')}}',
    
                    method: 'POST',
    
                    data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                    // dataType:"JSON",
                    success:function(data){
    
                        alert('Cập nhật số lượng thành công');
                     
                       location.reload();
                        
                  
                        
    
                    }
            });
    
        });
    </script>
</body>
</html>
