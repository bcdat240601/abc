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
        .content{
            height: 660px;
        }
    </style>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <div class="row content">
        <div class="col-3 mt-5 mb-5" style="background-color: rgb(75 221 221 / 5%);padding-top:10px;">
            <div class="rounded" style="text-align: center;margin-top:150px;" >
                <a href="{{ asset('myaccount') }}"><button type="button" class="btn btn-danger nut" style="background-color: rgb(241 74 102);margin-bottom:37px;">Thông Tin Cá Nhân<img class=""src="{{ asset('img/undraw_profile.svg') }}" style="width:30px;margin-left:17px;"></button></a>
                <a href="{{ asset('profile') }}"><button type="button" class="btn btn-danger nut" style="background-color: rgb(132 89 235);">Lịch Sử Giao Dịch<i class="fas fa-fw fa-folder"></i></button></a>
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