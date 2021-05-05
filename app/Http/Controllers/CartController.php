<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;
use App\Models\Product;
use App\Models\hoadon;
use App\Models\cthd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function add(Request $req){
        $id = $req->id;
        $a = dienthoai::find($id);
        $phone = new Product($a->id,$a->name,$a->price);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            echo 'Đã thêm vào giỏ hàng';
        }
        else{
            $cart[$id] = [
                'id' => $phone->id,
                'name' => $phone->name,
                'price' => $phone->price,
                'quantity' => 1
            ];
            echo 'Đã thêm vào giỏ hàng';
        }
       
        session()->put('cart',$cart);
        //echo session()->get("cart")[$id]['name'];
        // if($this->exist($id)){
        //     echo 'ton tai'.$id;
        // }
        // else{
        // return
        //         '<li id="item-cart-'.$phone->id.'">
        //             <a href="#" class="remove" data-idremove="'.$phone->id.'" title="Remove this item"><i class="fa fa-remove" ></i></a>
        //             <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
        //             <h4><a id="text">'.$phone->name.'</a></h4>
        //             <p class="quantity"> 1 x  <span class="amount">'.$phone->price.'</span></p>
        //         </li>';
        // }    
    }
    public function remove(Request $req){
        $id = $req->id;
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart',$cart);
        return 0;
    }
    public function exist($id){
        $cart = session()->get('cart');
        foreach ($cart as $i) {
            if($i == $id){
                return true;
            }
        }
        return false;
    }
    public function quantitychange(Request $req){
        $quantity = $req->quantity;
        $id = $req->id;
        $cart = session()->get('cart');
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart',$cart);
        return $quantity*$cart[$id]['price'];
    }
    public function checkout(){        
        if(session()->get('cart') == null || session()->has('cart') == false){
            return redirect()->back();
        }else{
            $total = 0;
            $user = session()->get('idkh');
            $cart = session()->get('cart');
            $modelhd = new hoadon();
                $modelhd->mahd = Str::random(3);
                $modelhd->id_khach = $user;
                $modelhd->id_nv = null;
                $modelhd->chotdon = 0;
                $modelhd->code_km = null;
                foreach ($cart as $product) {
                   $total = $total + $product['price']*$product['quantity'];
                }
                $modelhd->total = $total;
                $modelhd->save();
            foreach ($cart as $product) {
                $modelcthd = new cthd();
                $dienthoai = dienthoai::find($product['id']);
                $modelcthd->id_dt = $product['id'];
                $modelcthd->ma_hd = $modelhd->mahd;
                $modelcthd->soluong = $product['quantity'];
                $modelcthd->giatien = $product['price'];
                $modelcthd->total = $product['price']*$product['quantity'];
                $modelcthd->save();
            }
            session()->forget('cart');            
            return redirect('home');
        }
    }
}
