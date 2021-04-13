<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Models\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.auth.login');
        }

        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {

           
            $o = admin::where('email','=',$request->email)->first();
            $role=$o->role;
            session()->put('islogin',1);
            session()->put('role',$role);
            $name=$o->name;
            session()->put('name',$name);
            return redirect()->route('dashboard');

        } else {
            return redirect()->back()->withInput();
        }
    }
    public function Manager(){
        if(session()->get('role')==1 && session()->get('login')==1) return redirect()->route('dashboard');
        if(session()->get('role')==0 && session()->get('login')==1) return view('home');
        else echo 'invalid';
    }
    public function logout(){
        Auth::logout();
        session()->put('islogin',0);
        \session()->forget('role');
        return redirect()->route('admin.login');
    }
}