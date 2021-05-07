<?php

namespace App\Http\Controllers\User\Auth;
use App\Models\User;
use App\Models\dienthoai;
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
        $o = User::where('email','=',$request->email)->first();
        $block = $o->block;
        if($block == 1){
            $message = 'Tài khoản bạn đã bị khóa';
            return view('user/auth/login',['message'=>$message]);
        }
        if (Auth::attempt($credentials)) {
            session()->forget('search');
            session()->forget('page');
            session()->put('select',3);
            $items = session()->get('cart');
            $show = dienthoai::all()->take(3);
            $Titem = dienthoai::all()->take(8);
            session()->put('login',1);
            $o = User::where('email','=',$request->email)->first();
            $role=$o->role;
            session()->put('role',$role);
            $idkh = $o->id;
            session()->put('idkh',$idkh);
            return view('home',["Titem"=>$Titem,'show'=>$show,'items'=>$items]);
        } else {
            $message = 'Tài khoản không hợp lệ';
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