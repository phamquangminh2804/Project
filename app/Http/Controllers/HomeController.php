<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class HomeController extends Controller
{
    public function index(Request $request){

        //seo
        $meta_desc = "Cửa hàn bán đồ điện tử";
        $meta_keywords = "ITShop";
        $meta_title = "cua hang do dien tu";
        $url_canonical = $request->url();
        //end seo
        
        $category_product = DB::table('tbl_category_product')
            ->where('category_status','1')
            ->orderBy('category_id','desc')
            ->get();
        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status','1')
            ->orderBy('brand_id','desc')
            ->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        // ->orderBy('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')
            ->where('product_status','1')
            ->orderBy('product_id','desc')
            ->limit(6)
            ->get();

        return view('pages.home')
            ->with('category',$category_product)
            ->with('brand',$brand_product)
            ->with('all_product',$all_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical);
    }

    public function send_mail()
{
        $to_name = "Pham Quang Minh";
        $to_email = "phamquangminh2804@gmail.com"; // Địa chỉ email để gửi đến
        
        $data = array("name" => "nội dung tên", "body" => "asdasd"); // Nội dung thư trong file mail.blade.php
        
        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Test mail nhé'); // Tiêu đề thư
            $message->from($to_email,  $to_name); // Địa chỉ email và tên người gửi
        });
    }

    public function search(Request $request){

        $keywords = $request->keywords_submit;
        $meta_desc = "tìm kiếm";
        $meta_keywords = "tìm kiếm";
        $meta_title = "tìm kiếm";
        $url_canonical = $request->url();

        $category_product = DB::table('tbl_category_product')
            ->where('category_status','1')
            ->orderBy('category_id','desc')
            ->get();

        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status','1')
            ->orderBy('brand_id','desc')
            ->get();

        // $all_product = DB::table('tbl_product')
        //     ->where('product_status','1')
        //     ->orderBy('product_id','desc')
        //     ->limit(4)
        //     ->get();

        $search_product = DB::table('tbl_product')
            ->where('product_name','like','%'.$keywords.'%')
            ->get();

        return view('pages.category.search')
            ->with('category',$category_product)
            ->with('brand',$brand_product)
            ->with('search_product',$search_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical);
        }

}
