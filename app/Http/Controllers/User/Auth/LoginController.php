<?php

namespace App\Http\Controllers\User\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('user.auth.login');
        }
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            session()->put('login',1);
            $o = User::where('email','=',$request->email)->first();
            $role=$o->role;
            session()->put('role',$role);
            return redirect()->route('home');
        } else {
            $message = 'tài khoản  không hợp lệ';
            return view('user/auth/login',['message'=>$message]);
        }
    }
    public function logout(){
        echo "đã log out thành công";
        Auth::logout();
        session()->put('login',0);
        return redirect()->route('Home');
    }
}