<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function unset_coupon()
    {
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công');
        }
    }

    public function insert_coupon()
    {
        return view('admin.coupon.insert_coupon');
    }

    public function delete_coupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }

    public function list_coupon()
    {
        $coupon = Coupon::orderByDesc('coupon_id')->paginate(2);
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }

    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();

        $coupon = new Coupon;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('insert-coupon');
    }
}