<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\login;

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function callback_google()
    {
        $users = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($users, 'google');
        
        $account_name = Login::where('admin_id', $authUser->login->admin_id)->first();
        Session::put('admin_name', $account_name->admin_name);
        Session::put('admin_id', $account_name->admin_id);
        
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }
    
    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        
        if ($authUser) {
            return $authUser;
        }
          
        $orang = Login::where('admin_email', $users->email)->first();
    
        if (!$orang) {
            $orang = Login::create([
                'admin_name' => $users->name,
                'admin_email' => $users->email,
                'admin_password' => '',
                'admin_phone' => '',
                'admin_status' => 1
            ]);
        }
        
        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);
    
        $hieu->login()->associate($orang);
        $hieu->save();
    
        $account_name = Login::where('admin_id', $hieu->login->admin_id)->first();
        Session::put('admin_name', $account_name->admin_name);
        Session::put('admin_id', $account_name->admin_id);
        
        return $hieu;
    }



    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    
    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
        if($account){
            // Đăng nhập vào trang quản trị  
            $account_name = Login::where('admin_id', $account->login->admin_id)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{
            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);
    
            $orang = Login::where('admin_email', $provider->getEmail())->first();
    
            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''
                ]);
            }
    
            $hieu->login()->associate($orang);
            $hieu->save();
    
            $account_name = Login::where('admin_id', $orang->admin_id)->first();
    
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }


    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function log_in(Request $request)
    {
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
    
        if ($login) { // Kiểm tra xem có bản ghi tương ứng trong cơ sở dữ liệu hay không
            Session::put('admin_name', $login->admin_name);
            Session::put('admin_id', $login->admin_id);
            return redirect('/dashboard');
        } else {
            Session::flash('message', 'Mật khẩu hoặc tài khoản chưa đúng!');
            return redirect('/admin');
        }

        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);
        // $result = DB::table('tbl_admin')
        //     ->where('admin_email', $admin_email
        //     )->where('admin_password', $admin_password)
        //     ->first();
        // if ($result) {
        //     Session::put('admin_name', $result->admin_name);
        //     Session::put('admin_id', $result->admin_id);
        //     return redirect('/dashboard');
        // } else {
        //     Session::flash('message', 'Mật khẩu hoặc tài khoản chưa đúng!');
        //     return redirect('/admin');
        // }
    }

    public function log_out(){
        $this->AuthLogin();

        Session::forget('admin_name');
        Session::forget('admin_id');
        return redirect('/admin');
    }
}