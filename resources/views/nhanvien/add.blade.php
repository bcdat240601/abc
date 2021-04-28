@extends('admin/layoutadmin')
@section('content')
<div id="editingadd">
    <form action="{{ route('addnv')}}" method="post">
        @csrf
        <input type="text" name="id" value="" style="display: none">
        <label for="Tên">Tên</label><input type="text" name="fullname" value="">
        <label for="Tài Khoản">Tài Khoản</label><input type="text" name="user" value="">
        <label for="Mật Khẩu">Mật Khẩu</label><input type="text" name="password" value="">
        <label for="Địa Chỉ">Địa Chỉ</label><input type="text" name="address" value="">
        <label for="Ngày Sinh">Ngày Sinh</label><input type="text" name="birthday" value="">
        <label for="Số Điện Thoại">Số điện thoại</label><input type="text" name="phone" value="">
        <label for="Email">Email</label><input type="text" name="email" value="">
        <label for="Email">Role</label><input type="text" name="role" value="">
        <input type="submit" value="Thêm">
    </form>
    <span>@if (isset($message))
        {{$message}}
    @endif</span>
    <button ><a href="{{ asset('admin/table/nv') }}">Quay Lại</a></button>
</div>
@endsection