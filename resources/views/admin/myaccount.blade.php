@extends('admin/layoutadmin')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$admin->name}}</span><span class="text-black-50">{{$admin->email}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ route('editnv')}}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="row mt-3">                                        
                            <input type="text" name="id" value="{{$admin->id}}" style="display: none">
                            <div class="col-md-12"><label class="labels" for="name">Tên</label><input class="form-control" type="text" name="name" value="{{$admin->name}}"></div>
                            <div class="col-md-12"><label class="labels" for="admin">Tài Khoản</label><input class="form-control" type="text" name="user" value="{{$admin->user}}"></div>
                            <div class="col-md-12"><label class="labels" for="address">Địa Chỉ</label><input class="form-control" type="text" name="address" value="{{$admin->address}}"></div>
                            <div class="col-md-12"><label class="labels" for="birthday">Ngày Sinh</label><input class="form-control" type="text" name="birthday" value="{{$admin->birthday}}"></div>
                            <div class="col-md-12"><label class="labels" for="phonenumber">Số điện thoại</label><input class="form-control" type="text" name="phonenumber" value="{{$admin->phonenumber}}"></div>
                            <div class="col-md-12"><label class="labels" for="email">Email</label><input class="form-control" type="text" name="email" value="{{$admin->email}}"></div>
                           <div class="col-md-12"><input type="submit" value="Lưu">
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
    </div>
</div>
@endsection