<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;
use App\Models\Product;
class HomeController extends Controller
{
    public function Home(){
        $show = dienthoai::all()->take(3);
        $Titem = dienthoai::all()->take(8);
        $items = session()->get('cart');
        return view('home',["Titem"=>$Titem,'show'=>$show,'items'=>$items]);
    }
    public function ShopGrid(){
        $data = dienthoai::paginate(3);
        $items = session()->get('cart'); 
        return view('shopgrid',['data'=>$data,'items'=>$items]);
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
}
