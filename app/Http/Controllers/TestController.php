<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dienthoai;

class TestController extends Controller
{
    public function tinhtoan(Request $a){
        $i = $a->phep;
        $m;
        switch($i){
            case "+":
            $m = ($a->so1 + $a->so2);
            break;
            case "-":
                $m = ($a->so1 - $a->so2);
                break;
            case "*":
                $m = ($a->so1 * $a->so2);
                break;
            case "/":
                $m = ($a->so1 / $a->so2);
                break;
        }
        return $m;
    }
    public function ses(Request $b){
        session()->put("tên",$b->so1);

        session()->push("mảng_tên",$b->so2);

        echo "show mảng:".implode(",",session()->get("mảng_tên"));
    }

}