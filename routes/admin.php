
<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Models\dienthoai;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\nhanvienController;
use App\Http\Controllers\sanphamController;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
Route::middleware('auth:admin')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});
Route::get('home', function () {
    if(session()->get('role')==1 && session()->get('islogin')==1 || session()->get('role')==2 && session()->get('islogin')==1  ){
     return view('admin/admin');
    }
    else return  redirect('admin/login');
});
Route::get('forgot', function () {
    return view('admin/forgotpassword');
});
Route::get('table/sp', [sanphamController::class, 'showsp'] );
Route::get('table/kh', [khachhangController::class, 'showkh'] );
Route::get('table/nv', [nhanvienController::class, 'shownv'] );
// function a($name){
//     $id = $_GET['id'];
//     $model = DB::table($name)->where('id',"=",$id)->first();
//     return view('admin/detail',['data'=>$model]);    
// }
Route::get('detail/khachhang', [khachhangController::class, 'detailkh']);
Route::get('detail/sanpham', [sanphamController::class, 'detailsp']);

Route::post('detail/sanpham/save',[sanphamController::class, 'edit'])->name('edit');
Route::get('detail/sanpham/showadd', function(){
    return view('DienThoai/Add');
});
Route::post('detail/sanpham/add',[sanphamController::class, 'add'])->name('add');

Route::get("table/detail/sanpham/delete",[sanphamController::class, 'delete']);

Route::get('detail/khachhang/showadd', function(){
    return view('KhachHang/Add');
});
Route::post('detail/khachhang/save',[khachhangController::class, 'edit'])->name('editkh');
Route::post('detail/khachhang/add',[khachhangController::class, 'add'])->name('addkh');
Route::get("table/detail/khachhang/delete",[khachhangController::class, 'delete']);

Route::get("table/detail/nhanvien/delete",[nhanvienController::class, 'delete']);

Route::get('logout',[LoginController::class, 'logout']);

Route::get('detail/nhanvien/showadd', function(){
    return view('nhanvien/add');
});
Route::post('detail/nhanvien/add',[nhanvienController::class, 'addnv'])->name('addnv');

Route::get('checkbill',[nhanvienController::class, 'checkbill']);


Route::get('chart',function(){
    return view('admin/chart');
});

Route::get('xuly',[nhanvienController::class, 'xuly'])->name('admin.xuly');

Route::get('thongke',[HomeController::class, 'thongke']);
Route::get('thongketime',[HomeController::class, 'thongketime'])->name('thongketheothoigian');

