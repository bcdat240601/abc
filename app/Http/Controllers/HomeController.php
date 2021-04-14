<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;
use App\Models\Product;
use App\Models\hoadon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
class HomeController extends Controller
{
    public function Home(){
        session()->forget('search');
        session()->forget('page');
        $show = dienthoai::all()->take(3);
        $Titem = dienthoai::all()->take(8);
        $items = session()->get('cart');
        return view('home',["Titem"=>$Titem,'show'=>$show,'items'=>$items]);
    }
    public function ShopGrid(){
        session()->forget('search');
        $current_page = session()->get('page');
        if(isset($current_page)){
            $page = $current_page;
        }else {
            $page = 1;
        }
        $truyvan = DB::table('dienthoai');
        $where_to_return = 'shopgrid';
        return $this->chung($truyvan,$where_to_return,$page);
    }
    public function paginate(Request $req){
        session()->forget('search');
        $page = $req->page;
        session()->put('page', $page);
        $truyvan = DB::table('dienthoai');
        $where_to_return = 'component/listproduct';
        return $this->chung($truyvan,$where_to_return,$page);
    }
    public function Blog(){
        session()->forget('search');
        session()->forget('page');
        $items = session()->get('cart');
        return view('blog',['items'=>$items]);
    }
    public function Cart(){
        session()->forget('search');
        session()->forget('page');
        $items = session()->get('cart');
        return view('cart',['items'=>$items]);
    }
    public function CheckOut(){
        session()->forget('search');
        $items = session()->get('cart');
        session()->forget('page');
        return view('checkout',['items'=>$items]);
    }
    public function Contact(){
        session()->forget('search');
        $items = session()->get('cart');
        session()->forget('page');
        return view('contact',['items'=>$items]);
    }
    public function detail($id){
        session()->forget('search');
        session()->forget('page');
        $product = dienthoai::find($id);
        return view('detail',['pd'=>$product]);
    }
    public function cate(){
        session()->forget('search');
        if (isset($_GET['id'])) {
            $id_hang = $_GET['id'];
        } else {
            $id_hang = session()->get('idhang');
        }
        $truyvan = DB::table('dienthoai')->where('id_hang',$id_hang);
        session()->put('idhang',$id_hang);
        $quantity = $truyvan->count();
        $item_per_page = 3;
        $number_page = ceil($quantity/$item_per_page);
        $current_page = session()->get('page');
        if(isset($current_page) && $number_page >= $current_page){
            $page = $current_page;
        }else {
            $page = 1;
        }
        session()->put('page', $page);
        $truyvan = DB::table('dienthoai')->where('id_hang',$id_hang);
        $where_to_return = 'shopgrid';
        return $this->chung($truyvan,$where_to_return,$page);
    }
    public function paginateforcate(Request $req){
        session()->forget('search');
        $id_hang = $_GET['id'];
        $page = $req->page;
        session()->put('page', $page);
        $truyvan = DB::table('dienthoai')->where('id_hang',$id_hang);
        $where_to_return = 'component/listproduct';
        return $this->chung($truyvan,$where_to_return,$page);
    }
    public function history(){
        session()->forget('search');
        $user = Auth::user();
        $hoadon = DB::table('hoadon')->where('id_khach',$user->id)->get();
        return view('user/profile',['hoadon'=>$hoadon]);
    }
    public function hoadondetail(){
        session()->forget('search');
        $mahd = $_GET['mahd'];
        $cthd = DB::table('cthd')->where('ma_hd',$mahd)->get();
        return view('user/hoadondetail',['cthd'=>$cthd]);
    }
    function xoa_dau($a) {
        $a = preg_replace('/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/','a',$a);
        $a = preg_replace('/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/', "e",$a);
        $a = preg_replace('/ì|í|ị|ỉ|ĩ/', "i",$a);
        $a = preg_replace('/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/', "o",$a);
        $a = preg_replace('/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/', "u",$a);
        $a = preg_replace('/ỳ|ý|ỵ|ỷ|ỹ/', "y",$a);
        $a = preg_replace('/đ/', "d",$a);
        $a = preg_replace('/ {1,}/'," ",$a);
        return $a;
    }
    public function search(){
        session()->put('search',1);
        $search = $_GET['search'];
        $search = $this->xoa_dau($search);
        $search = strtoupper($search);
        session()->put('keyword',$search);
        $truyvan = DB::table('dienthoai')->select('id','name','price','image')->where('name','LIKE',"%{$search}%");
        $quantity = $truyvan->count();
        $item_per_page = 3;
        $number_page = ceil($quantity/$item_per_page);
        $current_page = session()->get('page');
        if(isset($current_page) && $number_page >= $current_page){
            $page = $current_page;
        }else {
            $page = 1;
        }
        $where_to_return = 'shopgrid';
        $page = 1;
        return $this->chung($truyvan,$where_to_return,$page);
    }
    public function searchpagi(Request $req){
        $search = session()->get('keyword');
        $page = $req->page;
        session()->put('page', $page);
        $truyvan = DB::table('dienthoai')->select('id','name','price','image')->where('name','LIKE',"%{$search}%");
        $where_to_return = 'component/listproduct';
        return $this->chung($truyvan,$where_to_return,$page);
    }
    public function chung($truyvan,$where_to_return,$page){
        $quantity = $truyvan->count();
        $item_per_page = 3;
        $number_page = ceil($quantity/$item_per_page);
        $offset = ($page - 1)*$item_per_page;
        $showitem = $truyvan->limit($item_per_page)->offset($offset)->get();
        $items = session()->get('cart'); 
        return view($where_to_return,['items'=>$items,'showitem'=>$showitem,'number_page'=>$number_page]);
    }
    // public function search(){
    //     session()->put('phantrang',2);
    //     $dem = 0;
    //     $sp = DB::table('dienthoai')->select('id')->get();
    //     $search = $_GET['search'];
    //     $search = $this->xoa_dau($search);
    //     $search = strtoupper($search);
    //     $item_per_page = 3;
    //     $page = 1;
    //     $allsanpham = session()->get('allsanpham');
    //     foreach ($sp as $id) {
    //         if(strpos($allsanpham[$id->id]['name'],$search) !== false){
    //             $allsanpham[$id->id]['flag']= 1;
    //             $dem = $dem + 1;
    //         }
    //     }
    //     $offset = ($page - 1)*$item_per_page;
    //     $number_page = ceil($dem/$item_per_page);
    //     $items = session()->get('cart');
    //     return view('shopgrid',['items'=>$items,'showitem'=>$allsanpham,'number_page'=>$number_page]);
    // }
}
