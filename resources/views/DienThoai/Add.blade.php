@extends('admin/layoutadmin')
@section('content')
<style>
    select{    
    margin-top: 10px;
    margin-left: 21px;
    }
</style>
<div id="editingadd">
    <form action="{{ route('add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" value="" style="display: none">
        <label for="name">Tên</label><input type="text" name="name" value="">
        {{-- <label for="battery">Pin</label><input type="text" name="battery" value=""> --}}
        {{-- <label for="RAM">RAM</label><input type="text" name="RAM" value="">
        <label for="ROM">ROM</label><input type="text" name="ROM" value=""> --}}
        <label for="price">Giá</label><input type="text" name="price" value="">
        <label for="color">Màu sắc</label><select name="color" id="cars">
            <option value="Trắng">Trắng</option>
            <option value="Đen">Đen</option>
            <option value="Đỏ">Đỏ</option>
          </select><br>
        {{-- <label for="cpu">CPU</label><input type="text" name="cpu" value=""> --}}
        <label for="file">Hình Ảnh</label><input type="file" name="file" value="">
        <label for="screen">Mô Tả</label><input type="text" name="mota" value="" style="height: 150px;width:200%">
        {{-- <label for="screen">Screen</label><input type="text" name="sreen" value="">
        <label for="kichthuoc">Kích Thước</label><input type="text" name="kichthuoc" >
        <label for="trongluong">Trọng Lượng</label><input type="text" name="trongluong" >
        <label for="nation">Quốc Gia</label><input type="text" name="nation" value=""> --}}
        {{-- <label for="idhang">ID Hãng</label><input type="text" name="idhang" value=""> --}}
        <label for="idhang">Thể Loại</label>
        <select name="idhang" id="cars">
            <option value="3">iphone</option>
            <option value="5">oppo</option>
            <option value="1">asus</option>
          </select>
        <input type="submit" value="Thêm Sản Phẩm">
    </form>
    <button ><a href="{{ asset('admin/table/sp') }}">Quay Lại</a></button>
</div>
@endsection