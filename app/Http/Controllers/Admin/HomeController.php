<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Constant; // Add this line to import the Constants class

class HomeController extends Controller
{
    //
    public function getLogin(){
        return view('admin.user.login');
    }
    public function postLogin(Request $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'), 
        ];
    
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            if (!in_array(Auth::user()->level, [Constant::user_level_host, Constant::user_level_admin])) {
                Auth::logout();
                return back()->with('notification', 'Bạn không có quyền truy cập.');
            }
            return redirect()->intended('admin');
        } else {
            return back()->with('notification','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect('admin/login');
    }
    
}
