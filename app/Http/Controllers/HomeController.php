<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;
use App\Models\Product;
use App\Models\hoadon;
use Illuminate\Support\Facades\Auth;
use DB;
class HomeController extends Controller
{
    public function Home(){
        session()->forget('page');
        $show = dienthoai::all()->take(3);
        $Titem = dienthoai::all()->take(8);
        $items = session()->get('cart');
        return view('home',["Titem"=>$Titem,'show'=>$show,'items'=>$items]);
    }
    public function ShopGrid(){
        $current_page = session()->get('page');
        $quantity = DB::table('dienthoai')->get()->count();
        $item_per_page = 3;
        $number_page = ceil($quantity/$item_per_page);
        if(isset($current_page)){
            $page = $current_page;
        }else {
            $page = 1;
        }
        $offset = ($page - 1)*$item_per_page;
        $showitem = DB::table('dienthoai')->offset($offset)->limit($item_per_page)->get();
        $items = session()->get('cart'); 
        return view('shopgrid',['items'=>$items,'showitem'=>$showitem,'number_page'=>$number_page]);
    }
    public function Blog(){
        session()->forget('page');
        $items = session()->get('cart');
        return view('blog',['items'=>$items]);
    }
    public function Cart(){
        session()->forget('page');
        $items = session()->get('cart');
        return view('cart',['items'=>$items]);
    }
    public function CheckOut(){
        $items = session()->get('cart');
        session()->forget('page');
        return view('checkout',['items'=>$items]);
    }
    public function Contact(){
        $items = session()->get('cart');
        session()->forget('page');
        return view('contact',['items'=>$items]);
    }
    public function detail($id){
        session()->forget('page');
        $product = dienthoai::find($id);
        return view('detail',['pd'=>$product]);
    }
    public function paginate(Request $req){
        $quantity = DB::table('dienthoai')->count();
        $item_per_page = 3;
        $page = $req->page;
        $number_page = ceil($quantity/$item_per_page);
        session()->put('page', $page);
        $offset = ($page - 1)*$item_per_page;
        $showitem = DB::table('dienthoai')->limit($item_per_page)->offset($offset)->get();
        $items = session()->get('cart'); 
        return view('component/listproduct',['items'=>$items,'showitem'=>$showitem,'number_page'=>$number_page]);
    }
    public function cate(){
        $id_hang = $_GET['id'];
        session()->put('idhang',$id_hang);
        $quantity = DB::table('dienthoai')->where('id_hang',$id_hang)->count();
        $item_per_page = 3;
        $page = 1;
        $number_page = ceil($quantity/$item_per_page);
        session()->put('page', $page);
        $offset = ($page - 1)*$item_per_page;
        $showitem = DB::table('dienthoai')->where('id_hang',$id_hang)->limit($item_per_page)->offset($offset)->get();
        $items = session()->get('cart'); 
        return view('shopgrid',['items'=>$items,'showitem'=>$showitem,'number_page'=>$number_page]);
    }
    public function paginateforcate(Request $req){
        $id_hang = $_GET['id'];
        $quantity = DB::table('dienthoai')->where('id_hang',$id_hang)->count();
        $item_per_page = 3;
        $page = $req->page;
        $number_page = ceil($quantity/$item_per_page);
        session()->put('page', $page);
        $offset = ($page - 1)*$item_per_page;
        $showitem = DB::table('dienthoai')->where('id_hang',$id_hang)->limit($item_per_page)->offset($offset)->get();
        $items = session()->get('cart'); 
        return view('component/listproduct',['items'=>$items,'showitem'=>$showitem,'number_page'=>$number_page]);
    }
    public function history(){
        $user = Auth::user();
        $hoadon = DB::table('hoadon')->where('id_khach',$user->id)->get();
        return view('user/profile',['hoadon'=>$hoadon]);
    }
    public function hoadondetail(){
        $mahd = $_GET['mahd'];
        $cthd = DB::table('cthd')->where('ma_hd',$mahd)->get();
        return view('user/hoadondetail',['cthd'=>$cthd]);
    }
}
