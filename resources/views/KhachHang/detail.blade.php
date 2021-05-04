@extends('admin/layoutadmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh Sửa Sản Phẩm</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng Chỉnh Sửa Sản Phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>tên</th>
                            <th>Tài Khoản</th>                    
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$data->name}}</th>
                            <th>{{$data->user}}</th>
                            <th>{{$data->address}}</th>
                            <th>{{$data->birthday}}</th>
                            <th>{{$data->phonenumber}}</th>
                            <th>{{$data->email}}</th>                           
                        </tr>
                    </tbody>
                </table>
                <button id="edit">Chỉnh Sửa</button>
                <button><a href="{{ asset('admin/table/kh') }}">Quay Về</a></button>
            </div>
        </div>
    </div>

</div>
<div id="editing">
    <form action="{{ route('editkh')}}" method="post">
        @csrf
        <input type="text" name="id" value="{{$data->id}}" style="display: none">
        <label for="name">Tên</label><input type="text" name="name" value="{{$data->name}}">
        <label for="user">Tài Khoản</label><input type="text" name="user" value="{{$data->user}}">
        <label for="address">Địa Chỉ</label><input type="text" name="address" value="{{$data->address}}">
        <label for="birthday">Ngày Sinh</label><input type="text" name="birthday" value="{{$data->birthday}}">
        <label for="phonenumber">Số điện thoại</label><input type="text" name="phonenumber" value="{{$data->phonenumber}}">
        <label for="email">Email</label><input type="text" name="email" value="{{$data->email}}">
        <input type="submit" value="Lưu">
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/code/edit.js') }}"></script>
@endsection