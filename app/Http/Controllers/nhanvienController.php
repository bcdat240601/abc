<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\dienthoai;
use App\Models\User;
use App\Models\admin;
use App\Models\hoadon;
use DB;

class nhanvienController extends Controller
{
    public function shownv()
    {
        if(session()->get('role')==1 && session()->get('islogin')==1 || session()->get('role')==2 && session()->get('islogin')==1 ){
        $object = 'nhanvien';
        $data = DB::table('nhanvien')->select('id','name','user','address','birthday','phonenumber','email','role')->get();
        $title = ['Id','Tên','User','Địa Chỉ','Birthday','Số Điện Thoại','Email','Role','Xóa Nhân Viên','Quyền Hạn','Xác Nhận'];
        return view('admin/table',['data'=>$data,'title'=>$title,'object'=>$object]);
        }
        if(session()->get('role')==0 && session()->get('login')==1) return view('invalid');
        else return redirect('admin/login');
        
    }

    // public function addnv(Request $req){
    //     $model = new admin();
    //     $model->name = $req->fullname;
    //     if ($this->checkuser($req->user)){
    //         if ($this->checkphone($req->phone)) {
    //             if ($this->checkemail($req->email)) {
    //                 $model->user = $req->user;
    //                 $model->password = Hash::make($req->password);
    //                 $model->address = $req->address;
    //                 $model->birthday = $req->birthday;
    //                 $model->phonenumber = $req->phone;
    //                 $model->email = $req->email;
    //                 $model->role = 2;
    //                 $model->save();
    //         return redirect('admin/table/nv');;   
    //             }else {
    //                 $message = 'Email không hợp lệ';
    //                 return view('nhanvien/add',['message'=>$message]);
    //             }
    //         }else {
    //             $message = 'Số Điện Thoại Không Hợp Lệ';
    //             return view('nhanvien/add',['message'=>$message]);
    //         }
    //     }else {
    //         $message = 'Đã trùng tài khoản';
    //         return view('nhanvien/add',['message'=>$message]);
    //     }
    // }
    // public function checkuser($user){
    //     $getuser = DB::table('nhanvien')->select('user')->get();
    //     foreach ($getuser as $username) {
    //         if($username->user == $user){
    //             return false;
    //         }
    //     }
    //     return true;
    // }
    // public function checkphone($phone){
    //     if(!preg_match("/((09|03|07|08|05|01)([0-9]{8})\b)/",$phone)){
    //         return false;
    //     }
    //     return true;
    // }
    // public function checkemail($email){
    //     if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$email)){
    //         return false;
    //     }
    //     return true;
    // }

    public function role(Request $req){
        // $name = 'nhanvien';
        // $id = $_GET['id'];
        $model = admin::find($req->id);
        $model->role = $req->role;
        $model->save();
        $id = session()->get('idnv');
        if($req->id == $id && $req->role != 1){
            session()->put('role',$req->role);
            return redirect('admin/home');
        }
        return redirect()->back();
    }
    public function addnv(Request $req){
        $users = DB::table('nhanvien')->select('user')->get();
        $emails = DB::table('nhanvien')->select('email')->get();
        foreach ($users as $user) {
            if($user->user == $req->user)
            return 1;
        }
        foreach ($emails as $email) {
            if($email->email == $req->email)
            return 2;
        }
        $model = new admin();
        $model->name = $req->fullname;
        $model->user = $req->user;
        $model->password = Hash::make($req->password);
        $model->address = $req->address;
        $model->birthday = $req->birthday;
        $model->phonenumber = $req->phone;
        $model->email = $req->email;
        $model->role = 2;
        $model->save();
        return 0;
    }
    public function checkuser($user){
        $getuser = DB::table('nhanvien')->select('user')->get();
        foreach ($getuser as $username) {
            if($username->user == $user){
                return false;
            }
        }
        return true;
    }
    public function checkphone($phone){
        if(!preg_match("/((09|03|07|08|05|01)([0-9]{8})\b)/",$phone)){
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
    public function delete(Request $req){
        $row = $req->row;
        if(session()->get('role')==1 && session()->get('islogin')==1){
        $model = DB::table('nhanvien')->where('id', '=', $row)->delete();
        return view('DienThoai/detail');
        }
    }
    public function checkbill(){        
        $bill = DB::table('hoadon')->get();
        return view('admin/bill',['bill'=>$bill]);
    }
    public function xuly (Request $req){        
        $model = hoadon::find($req->mahd);
        if($model->chotdon == 0){
            $model->id_nv = $req->idnv;
            $model->chotdon = $req->state;
            $model->save();
        }
    }
    public function editnv(Request $req){
        session()->put('name',$req->name);
        $model = admin::find($req->id);
        $model->name = $req->name;
        $model->user = $req->user;        
        $model->address = $req->address;
        $model->birthday = $req->birthday;
        $model->phonenumber = $req->phonenumber;
        $model->email = $req->email;
        $model->save();
        return redirect()->back();
    }
}
