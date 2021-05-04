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
            <div class="rounded" style="margin-top: 124px;margin-left: 192px;">
                <button type="button" class="btn btn-danger nut" style="background-color: rgb(241 74 102);margin-bottom:37px;"><a href="{{ asset('myaccount') }}">Thông Tin Cá Nhân<img class=""src="{{ asset('img/undraw_profile.svg') }}" style="width:30px;margin-left:17px;"></a></button>
                <button type="button" class="btn btn-danger nut" style="background-color: rgb(132 89 235);"><a href="{{ asset('profile') }}">Lịch Sử Giao Dịch<i class="fas fa-fw fa-folder"></i></a></button>
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