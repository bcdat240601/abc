@extends('admin/layoutadmin')
@section('content')
<div id="editingadd">
    <form action="{{ route('addkh')}}" method="post">
        @csrf
        <input type="text" name="id" value="" style="display: none">
        <label for="Tên">Tên</label><input type="text" name="name" value="">
        <label for="Tài Khoản">Tài Khoản</label><input type="text" name="user" value="">
        <label for="Mật Khẩu">Mật Khẩu</label><input type="text" name="password" value="">
        <label for="Địa Chỉ">Địa Chỉ</label><input type="text" name="address" value="">
        <label for="Ngày Sinh">Ngày Sinh</label><input type="date" name="birthday" value="">
        <label for="Số Điện Thoại">Số điện thoại</label><input type="text" name="phonenumber" value="">
        <label for="Email">Email</label><input type="text" name="email" value="">
        <input type="submit" value="Thêm">
    </form>
    <button ><a href="{{ asset('admin/table/kh') }}">Quay Lại</a></button>
</div>
@endsection