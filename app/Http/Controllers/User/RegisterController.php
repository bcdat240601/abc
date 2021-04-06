<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use DB;

class RegisterController extends Controller
{
    public function register(Request $req){
        $model = new User();
        $model->name = $req->fullname;
        if ($this->checkuser($req->user)){
            if ($this->checkphone($req->phone)) {
                if ($this->checkemail($req->email)) {
                    $model->user = $req->user;
                    $model->password = Hash::make($req->password);
                    $model->birthday = $req->birthday;
                    $model->phonenumber = $req->phone;
                    $model->email = $req->email;
                    $model->save();
            return redirect('home');;   
                }else {
                    $message = 'Email không hợp lệ';
                    return view('user/register',['message'=>$message]);
                }
            }else {
                $message = 'Số Điện Thoại Không Hợp Lệ';
                return view('user/register',['message'=>$message]);
            }
        }else {
            $message = 'Đã trùng tài khoản';
            return view('user/register',['message'=>$message]);
        }
    }
    public function checkuser($user){
        $getuser = DB::table('khachhang')->select('user')->get();
        foreach ($getuser as $username) {
            if($username->user == $user){
                return false;
            }
        }
        return true;
    }
    public function checkphone($phone){
        if(!preg_match("/((09|03|07|08|05|01)+([0-9]{9})\b)/",$phone)){
            return false;
        }
        return true;
    }
    public function checkemail($email){
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$email)){
            return false;
        }
        return true;
    }
}
