<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dienthoai;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $show = dienthoai::all()->take(3);
        $Titem = dienthoai::all()->take(8);
        $items = session()->get('cart');
        // echo 'Xin chào User, '. $user->name;
        return view('home',['username'=>$user->name,"Titem"=>$Titem,'show'=>$show,'items'=>$items]);
    }
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
        return view('cart');
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