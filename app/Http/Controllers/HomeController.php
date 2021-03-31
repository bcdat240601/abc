<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;
use App\Models\Product;
use DB;
class HomeController extends Controller
{
    public function Home(){
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
        return view('blog');
    }
    public function Cart(){
        $items = session()->get('cart');
        return view('cart',['items'=>$items]);
    }
    public function CheckOut(){
        return view('checkout');
    }
    public function Contact(){
        return view('contact');
    }
    public function detail($id){
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
}
