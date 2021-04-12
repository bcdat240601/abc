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
        if(session()->get('role')==1 && session()->get('islogin')==1 ){
        $user = Auth::guard('admin')->user();
        echo 'Xin chào Admin, '. $user->name;
        }
        else return  redirect('admin/login');
    }
    

}