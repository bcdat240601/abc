
<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Models\dienthoai;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\sanphamController;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
Route::middleware('auth:admin')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});
Route::get('home', function () {
    return view('admin/admin');
});
Route::get('forgot', function () {
    return view('admin/forgotpassword');
});
Route::get('table/sp', [sanphamController::class, 'showsp'] );
Route::get('table/kh', [khachhangController::class, 'showkh'] );
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

