<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $req){
        $id = $req->id;
        $a = dienthoai::find($id);
        $phone = new Product($a->id,$a->name,$a->price);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            // $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            echo 'Bạn Đã Thêm Vào Giỏ Hàng Sản Phẩm Này Rồi';
        }
        else{
            $cart[$id] = [
                'id' => $phone->id,
                'name' => $phone->name,
                'price' => $phone->price,
                'quantity' => 1
            ];
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
            
        echo 'Đã thêm vào giỏ hàng';
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
}
