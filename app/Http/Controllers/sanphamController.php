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
        $object = 'sanpham';
        $data = DB::table('dienthoai')->select('id','name','price','color')->get();
        $title = ['Id','Tên','Giá','Color'];
        return view('admin/table',['data'=>$data,'title'=>$title,'object'=>$object]);
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
        $model->battery = $req->battery;
        $model->RAM = $req->RAM;
        $model->ROM = $req->ROM;
        $model->price = $req->price;
        $model->color = $req->color;
        $model->cpu = $req->cpu;
        $model->screen = $req->screen;
        $model->kichthuoc = $req->kichthuoc;
        $model->trongluong = $req->trongluong;
        $model->nation = $req->nation;
        $model->save();
        return view('DienThoai/detail',['data'=>$model]);
    }
    public function add(Request $req){
        $file = $req->file;
        $model = new dienthoai();
        $model->name = $req->name;
        $model->battery = $req->battery;
        $model->RAM = $req->RAM;
        $model->ROM = $req->ROM;
        $model->price = $req->price;
        $model->color = $req->color;
        $model->cpu = $req->cpu;
        if(isset($file)){
            $model->image = $file->getClientOriginalName();
            $file->move('images/product', $file->getClientOriginalName());
        }
        $model->screen = $req->screen;
        $model->kichthuoc = $req->kichthuoc;
        $model->trongluong = $req->trongluong;
        $model->nation = $req->nation;
        $model->id_hang = $req->idhang;
        $model->save();
        return view('DienThoai/Add',['data'=>$model]);
    }
    public function delete(Request $req){
        $row = $req->row;
        $model = DB::table('dienthoai')->where('id', '=', $row)->delete();
        return view('DienThoai/detail');
    }
}
