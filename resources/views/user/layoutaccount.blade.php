@extends('layout')
@section('content')
<div class="container-fluid">
    <style>
        .nut{
            width: 200px;
            height:70px;
            margin:0 auto;
        }
        .rouded{
            width: 350px;
        }
    </style>
    <div class="row">
        <div class="col-3 mt-5 mb-5" style="background-color: rgba(62, 77, 77, 0.514);padding-top:10px;">
            <div class="rounded" >
                <button type="button" class="btn btn-danger nut" style="background-color:rgb(184, 40, 64);"><a href="{{ asset('myaccount') }}">Thông Tin Cá Nhân</a></button>
                <button type="button" class="btn btn-danger nut" style="background-color:rgb(184, 40, 64);"><a href="{{ asset('profile') }}">Lịch Sử Giao Dịch</a></button>
            </div>            
        </div>
        <div class="col-9">
          @yield('contentaccount')
        </div>
    </div>
</div>
    </div>
</div>

@endsection