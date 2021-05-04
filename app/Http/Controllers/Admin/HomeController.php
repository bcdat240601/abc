<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dienthoai;
use App\Models\User;
use App\Models\admin;
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
        $type = $_GET['select'];
        if ($_GET['from'] == null) {
            $message = 'Thiếu Thời Gian Bắt Đầu Thống Kê';
            return view('admin/thongke',['message'=>$message]);
        }elseif($_GET['to'] == null){
            $message = 'Thiếu Thời Gian Kết Thúc Thống Kê';
            return view('admin/thongke',['message'=>$message]);
        }
        else{
            $from = $_GET['from']." 00:00:00";
            $to = $_GET['to']." 00:00:00";
            if ($type == 1) {
                $title = ['Tên 10 Sản Phẩm Bán Chạy Nhất','Giá Tiền','Số Lượng Bán'];
                $thongke = DB::table('cthd')->join('dienthoai','cthd.id_dt','=','dienthoai.id')->select('dienthoai.name','cthd.giatien',DB::raw('SUM(cthd.soluong) as soluong'))->where([['created_at','>',$from],['created_at','<',$to]])->groupBy('dienthoai.name','cthd.giatien')->orderByDesc('soluong')->take(10)->get();
                session()->put('thongketype',1);
            }
            if ($type == 2) {
                $title = ['Tên 10 Khách Hàng Mua Nhiều Nhất','Số Lần Mua Hàng'];
                $thongke = DB::table('hoadon')->join('khachhang','hoadon.id_khach','=','khachhang.id')->select('khachhang.name',DB::raw('COUNT(khachhang.id) as solan'))->where([['created_at','>',$from],['created_at','<',$to]])->groupBy('khachhang.name')->orderByDesc('solan')->take(10)->get();
                session()->put('thongketype',2);
            }
            return view('admin/thongke',['thongke'=>$thongke,'from'=>$from,'to'=>$to,'title'=>$title]);
        }
        
    }
    public function myaccount(){
        $id = session()->get('idnv');
        $admin = admin::where('id','=',$id)->first();    
        return view('admin/myaccount',['admin'=>$admin]);
    }
    

}