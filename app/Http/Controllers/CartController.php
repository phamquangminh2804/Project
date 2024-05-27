<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){

        $productId = $request->productid_hidden;
        $qty = $request->qty;

        $product_info = DB::table('tbl_product')
            ->where('product_id',$productId)
            ->first();

        //
        $data['id'] = $product_info->product_id;
        $data['qty'] = $qty;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '1';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        Cart::setGlobalTax(10);
        // Cart::destroy();
        return Redirect::to('/show-cart');
    }

    public function show_cart(){
        $category_product = DB::table('tbl_category_product')
            ->where('category_status','1')
            ->orderBy('category_id','desc')
            ->get();
        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status','1')
            ->orderBy('brand_id','desc')
            ->get();


        return view('pages.cart.show_cart')
        ->with('category',$category_product)
        ->with('brand',$brand_product);
    }


    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_qty(Request $request){
        $rowId = $request->rowId_cart;
        $qty =  $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');

    }

}
