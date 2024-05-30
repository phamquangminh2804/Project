<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\City;
use App\Models\District;
use App\Models\Wards;
use App\Models\Feeship;

class CheckoutController extends Controller
{
   
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(Request $request){
        $meta_desc = "Cửa hàn bán đồ điện tử";
            $meta_keywords = "ITShop";
            $meta_title = "cua hang do dien tu";
            $url_canonical = $request->url();

        $category_product = DB::table('tbl_category_product')
            ->where('category_status','1')
            ->orderBy('category_id','desc')
            ->get();

        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status','1')
            ->orderBy('brand_id','desc')
            ->get();

        return view('pages.checkout.login_checkout')
            ->with('category',$category_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical);
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request ->customer_name;
        $data['customer_email'] = $request ->customer_email;
        $data['customer_password'] = md5($request ->customer_password);
        $data['customer_phone'] = $request ->customer_phone;

        $customer_id = DB::table('tbl_customers')
            ->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request ->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout(Request $request){
        $meta_desc = "thanh toán";
        $meta_keywords = "thanh toán";
        $meta_title = "trang thanh toán";
        $url_canonical = $request->url();
        
        $category_product = DB::table('tbl_category_product')
            ->where('category_status','1')
            ->orderBy('category_id','desc')
            ->get();

        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status','1')
            ->orderBy('brand_id','desc')
            ->get();

        $city = City::orderby('matp','ASC')->get();

        return view('pages.checkout.show_checkout')
            ->with('category',$category_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('city',$city);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request ->shipping_name;
        $data['shipping_email'] = $request ->shipping_email;
        $data['shipping_phone'] = $request ->shipping_phone;
        $data['shipping_note'] = $request ->shipping_note;
        $data['shipping_address'] = $request ->shipping_note;
        
        $shipping_id = DB::table('tbl_shipping')
            ->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
      
        return Redirect::to('/payment');
    }

    public function payment(Request $request){
        $meta_desc = "thanh toán";
        $meta_keywords = "thanh toán";
        $meta_title = "trang thanh toán";
        $url_canonical = $request->url();

        $category_product = DB::table('tbl_category_product')
            ->where('category_status','1')
            ->orderBy('category_id','desc')
            ->get();

        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status','1')
            ->orderBy('brand_id','desc')
            ->get();

        return view('pages.checkout.payment')
            ->with('category',$category_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical);
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')
            ->where('customer_email',$email)
            ->where('customer_password',$password)
            ->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/trang-chu');
        }else{
            
        return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request){
        $meta_desc = "thanh toán";
        $meta_keywords = "thanh toán";
        $meta_title = "trang thanh toán";
        $url_canonical = $request->url();
        //insert payment_method
        $data = array();
        $data['payment_method'] = $request ->payment_option;
        $data['payment_status'] = 'Đang chờ xử lí';
        $payment_id = DB::table('tbl_payment')
            ->insertGetId($data);
        // insert order
        $total= Cart::total();
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] =   $payment_id;
        $order_data['order_total'] = $total;
        $order_data['order_status'] = 'Đang chờ xử lí';
        $order_id = DB::table('tbl_order')
        ->insertGetId($order_data);
        // insert order details
        $content = Cart::content();
        foreach($content as $value_content)
        $order_details_data = array();
        $order_details_data['order_id'] =  $order_id;
        $order_details_data['product_id'] = $value_content->id;
        $order_details_data['product_name'] = $value_content->name;
        $order_details_data['product_price'] = $value_content->price;
        $order_details_data['product_sales_quantity'] = $value_content->qty;
        DB::table('tbl_order_details')
        ->insertGetId($order_details_data);

        if( $data['payment_method'] == 1){
            echo '1';
        }elseif($data['payment_method'] == 2){
            Cart::destroy();
            $category_product = DB::table('tbl_category_product')
                ->where('category_status','1')
                ->orderBy('category_id','desc')
                ->get();

            $brand_product = DB::table('tbl_brand_product')
                ->where('brand_status','1')
                ->orderBy('brand_id','desc')
                ->get();

            return view('pages.checkout.handcash')
                ->with('category',$category_product)
                ->with('brand',$brand_product)
                ->with('meta_desc',$meta_desc)
                ->with('meta_keywords',$meta_keywords)
                ->with('meta_title',$meta_title)
                ->with('url_canonical',$url_canonical);
        }else{
            echo '3';
        }
    }

    public function continue_order(Request $request){
        return Redirect::to('/trang-chu');
    }

    public function manage_order(){
        $this->AuthLogin();

        $all_order = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->select('tbl_order.*','tbl_customers.customer_name')
            ->orderBy('tbl_order.order_id','desc')->get();

        $manager_order = view('admin.order.manage_order')
            ->with('all_order',$all_order);

        return view('admin_layout')
            ->with('admin.order.manage_order',$manager_order);
    }

    public function view_order($orderId){
        $this->AuthLogin();

        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')
            ->first();

        $manager_order_by_id = view('admin.order.view_order')
            ->with('order_by_id',$order_by_id);

        return view('admin_layout')
            ->with('admin.order.view_order',$manager_order_by_id);
    }

    public function select_delivery_home(Request $request)
        {
            $data = $request->all();
            if($data['action']){
                $output = '';
                if($data['action']=="city"){
                    $select_district = District::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                        $output.='<option>---Chọn quận huyện---</option>';
                    foreach($select_district as $key => $district){
                        $output.='<option value="'.$district->maqh.'">'.$district->name_district.'</option>';
                    }
    
                }else{
    
                    $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                    $output.='<option>---Chọn xã phường---</option>';
                    foreach($select_wards as $key => $ward){
                        $output.='<option value="'.$ward->xaid.'">'.$ward->name_wards.'</option>';
                    }
                }
                echo $output;
            }
        }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            foreach($feeship as $key => $fee){
                Session::put('fee',$fee->fee_feeship);
                Session::save();
            }
        }
    }

    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }
}
