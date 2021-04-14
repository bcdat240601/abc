<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\dienthoai;
use App\Models\User;
use DB;

class khachhangController extends Controller
{
    public function showkh()
    {
        if(session()->get('role')==1){
        $object = 'khachhang';
        $data = DB::table('khachhang')->select('id','name','user','address','birthday','phonenumber','email')->get();
        $title = ['Id','Tên','User','Địa Chỉ','Birthday','Số Điện Thoại','Email'];
        return view('admin/table',['data'=>$data,'title'=>$title,'object'=>$object]);
        }
        else echo 'invalid';
    }
    // public function detail($name){
    //     $id = $_GET['id'];
    //     $model = DB::table($name)->where('id',"=",$id)->first();
    //     return view('DienThoai/detail',['data'=>$model]);
    // }    
    public function detailkh(){
        $name = 'khachhang';
        $id = $_GET['id'];
        $model = DB::table($name)->where('id',"=",$id)->first();
        return view('KhachHang/detail',['data'=>$model]);
    }
    public function edit(Request $req){
        $model = User::find($req->id);
        $model->name = $req->name;
        $model->user = $req->user;
        $model->password = $req->password;
        $model->address = $req->address;
        $model->birthday = $req->birthday;
        $model->phonenumber = $req->phonenumber;
        $model->email = $req->email;
        $model->save();
        return view('KhachHang/detail',['data'=>$model]);
    }
    public function add(Request $req){
        // $model = User::find($req->id);
        $model = new User();
        $model->name = $req->name;
        $model->user = $req->user;
        $model->password = $req->password;
        $model->address = $req->address;
        $model->birthday = $req->birthday;
        $model->phonenumber = $req->phonenumber;
        $model->email = $req->email;
        $model->save();
        return view('KhachHang/Add',['data'=>$model]);
    }
    public function delete(Request $req){
        $row = $req->row;
        if(session()->get('role')==1 && session()->get('islogin')==1 || session()->get('role')==2 && session()->get('islogin')==1 ){
        $model = DB::table('khachhang')->where('id', '=', $row)->delete();
        return view('KhachHang/detail');
        }
    }
}
