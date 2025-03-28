<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service\User\UserServiceInterface;

class AccountController extends Controller
{

    private $userSevice;

    public function __construct(UserServiceInterface $userSevice)
    {
        $this->userSevice = $userSevice;
    }


    //
    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 2,
        ];

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            // return redirect(''); // Redirect to intended page after login
            return redirect()->intended((''));
        } else {
            return back()->with('notification','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    public function register()
    {
        return view('front.account.register');
    }

    public function postRegister(Request $request){
        if($request->password != $request->password_confirmation){
            return back()->with('notification', 'mat khau k dung');
        }

        $data =[
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 2,
        ];

        $this->userSevice->create($data);

        return redirect('account/login')->with('notification', 'Register Success! PL LI');

        

    }
}