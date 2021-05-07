<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\dienthoai;
use App\Models\User;
use DB;

class sanphamController extends Controller
{
    public function showsp()
    {
        $role = session()->get('role');
        if(isset($role) && session('islogin') == 1){
        $object = 'sanpham';
        $data = DB::table('dienthoai')->select('id','name','price','color')->get();
        $title = ['Id','Tên','Giá','Color','Chi Tiết','Xóa Sản Phẩm'];
        return view('admin/table',['data'=>$data,'title'=>$title,'object'=>$object]);
        }
        if(session()->get('role')==0 && session()->get('login')==1) return view('invalid');
        else return redirect('admin/login');
    }
    public function detailsp(){
        $name = 'dienthoai';
        $id = $_GET['id'];
       // $model = DB::table($name)->where('id',"=",$id)->first();
        $model = dienthoai::find($id);
        return view('DienThoai/detail',['data'=>$model]);
    }
    public function edit(Request $req){
        $model = dienthoai::find($req->id);
        // $model = new dienthoai();
        $model->name = $req->name;
        $model->price = $req->price;
        $model->color = $req->color;
        $model->mota = $req->mota;
        $model->save();
        return view('DienThoai/detail',['data'=>$model]);
    }
    public function add(Request $req){
        $file = $req->file;        
        $model = new dienthoai();
        $model->name = $req->name;
        // $model->battery = $req->battery;
        // $model->RAM = $req->RAM;
        // $model->ROM = $req->ROM;
        $model->price = $req->price;
        if($req->color == 1)
            $model->color = "Trắng";
        if($req->color == 2)
            $model->color = "Đen";
        if($req->color == 3)
            $model->color = "Đỏ";    
        $model->mota = $req->mota;
        if(isset($file)){
            $model->image = $file->getClientOriginalName();
            $file->move('images/product', $file->getClientOriginalName());
        }
        // $model->screen = $req->screen;
        // $model->kichthuoc = $req->kichthuoc;
        // $model->trongluong = $req->trongluong;
        // $model->nation = $req->nation;
        $model->id_hang = $req->idhang;
        $model->save();
        return view('DienThoai/Add',['data'=>$model]);
    }
    public function delete(Request $req){
        $row = $req->row;
        if(session()->get('role')==1 && session()->get('islogin')==1 || session()->get('role')==2 && session()->get('islogin')==1 ){
        $model = DB::table('dienthoai')->where('id', '=', $row)->delete();
        return view('DienThoai/detail');
        }
    }
}
