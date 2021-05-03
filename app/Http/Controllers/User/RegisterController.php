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
        if ($req->fullname != "" && $req->user != "" && $req->password != "" && $req->birthday != "" && $req->phone != "" && $req->email != "") {
            if ($this->checkname($req->fullname)) {
                if ($this->checkuser($req->user)){
                    if ($this->checkphone($req->phone)) {
                        if ($this->checkemail($req->email)) {
                            $model->name = $req->fullname;
                            $model->user = $req->user;
                            $model->password = Hash::make($req->password);
                            $model->birthday = $req->birthday;
                            $model->phonenumber = $req->phone;
                            $model->email = $req->email;
                            $model->save();                            
                            return redirect('login');   
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
            } else {
                $message = 'Tên đầy đủ không thể chứa ký tự đặc biệt';
                return view('user/register',['message'=>$message]);
            }
        } else {
            $message = 'Bạn chưa nhập đủ thông tin';
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
        if(!preg_match("/(^(09|03|07|08|05|01)([0-9]{8})\b)/",$phone)){
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
    public function checkname($name){
        if(!preg_match("/^[a-z0-9A-Z]+/",$name)){
            return false;
        }
        return true;
    }
}
