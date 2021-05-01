<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dienthoai;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    public function index(){
        if(session()->get('role')==1 && session()->get('islogin')==1 || session()->get('role')==2 && session()->get('islogin')==1 ){
        $user = Auth::guard('admin')->user();
    //    echo 'Xin chào Admin, '. $user->name;
        return view('admin/admin');
        }
        else return  redirect('admin/login');
    }
    public function thongke(){
        return view('admin/thongke');
    }
    public function thongketime(){
        $from = $_GET['from']." 00:00:00";
        $to = $_GET['to']." 00:00:00";
        $thongke = DB::table('cthd')->join('dienthoai','cthd.id_dt','=','dienthoai.id')->select('dienthoai.id','dienthoai.name','cthd.giatien',DB::raw('SUM(cthd.soluong) as soluong'))->where([['created_at','>',$from],['created_at','<',$to]])->groupBy('dienthoai.id','dienthoai.name','cthd.giatien')->get();
        return view('admin/thongke',['thongke'=>$thongke,'from'=>$from,'to'=>$to]);
    }
    

}