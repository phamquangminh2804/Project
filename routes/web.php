<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
//front end
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class, 'index'])->name('trang-chu');
Route::post('/tim-kiem', [HomeController::class, 'search'])->name('tim-kiem');


//danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{slug_category_name}', [CategoryProduct::class, 'show_category_home'])->name('danh-muc-san-pham');
Route::get('/thuong-hieu-san-pham/{slug_brand_name}', [BrandProduct::class, 'show_brand_home'])->name('thuong-hieu-san-pham');
Route::get('/chi-tiet-san-pham/{slug_product_name}', [ProductController::class, 'details_product'])->name('chi-tiet-san-pham');

//backend

//send mail
Route::get('/send-mail', [HomeController::class,'send_mail'])->name('send-mail');
//end send mail

//Login facebook
Route::get('/login-facebook', [AdminController::class, 'login_facebook'])->name('login-facebook');
Route::get('/admin/callback', [AdminController::class, 'callback_facebook'])->name('admin/callback');

//Login  google
Route::get('/login-google', [AdminController::class, 'login_google'])->name('login-google');
Route::get('/callback', [AdminController::class, 'callback_google'])->name('callback');



//admin login
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
Route::get('/logout', [AdminController::class, 'log_out'])->name('logout');

Route::post('/login', [AdminController::class, 'log_in'])->name('login');

//category product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product'])->name('add-category-product');
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product'])->name('edit-category-product');
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product'])->name('delete-category-product');
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product'])->name('all-category-product');
Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product'])->name('unactive-category-product');
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product'])->name('active-category-product');

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product'])->name('save-category-product');
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product'])->name('update-category-product');

//brand product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product'])->name('add-brand-product');
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product'])->name('edit-brand-product');
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product'])->name('delete-brand-product');
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product'])->name('all-brand-product');
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product'])->name('unactive-brand-product');
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product'])->name('active-brand-product');

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product'])->name('save-brand-product');
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product'])->name('update-brand-product');

//product
Route::get('/add-product', [ProductController::class, 'add_product'])->name('add-product');
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product'])->name('edit-product');
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product'])->name('delete-product');
Route::get('/all-product', [ProductController::class, 'all_product'])->name('all-product');
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('unactive-product');
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])->name('active-product');

Route::post('/save-product', [ProductController::class, 'save_product'])->name('save-product');
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('update-product');

//cart

Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::post('/update-cart-qty', [CartController::class, 'update_cart_qty'])->name('update-cart-qty');
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('show-cart');
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart'])->name('delete-to-cart');
Route::get('/del-product/{session_id}', [CartController::class, 'delete_product']);
Route::get('/del-all-product', [CartController::class, 'delete_all_product']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax'])->name('add-cart-ajax');
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::post('/update-cart', [CartController::class, 'update_cart']);

//checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('login-checkout');
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::get('/continue-order', [CheckoutController::class, 'continue_order'])->name('continue-order');
Route::get('/del-fee', [CheckoutController::class, 'del_fee'])->name('del-fee');

Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');
Route::post('/add-customer', [CheckoutController::class, 'add_customer'])->name('add-customer');
Route::post('/login-customer', [CheckoutController::class, 'login_customer'])->name('login-customer');
Route::post('/order-place', [CheckoutController::class, 'order_place'])->name('order-place');
Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee'])->name('calculate-fee');


//order
Route::get('/manage-order', [CheckoutController::class, 'manage_order'])->name('manage-order');
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order'])->name('view-order');

//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']);
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home'])->name('select-delivery-home');

//delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);
