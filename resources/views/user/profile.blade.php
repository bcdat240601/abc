@extends('user/layoutaccount')
@section('contentaccount')
<
<section class="hero-slider">
<table class="table table-success table-striped" style="margin-top: 20px;">
    <thead>
      <tr>
        <th scope="col">Mã hóa đơn:</th>
        <th scope="col">Mã khuyến mãi :</th>
        <th scope="col">Tổng tiền: </th>
        <th scope="col">Ngày Thanh Toán :</th>
        <th scope="col">Xem chi tiết</th>
        <th scope="col">Hủy Đơn Hàng</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($hoadon as $item)
        <tr>
        <td><a>{{$item->mahd}}</a></td>
        <td> @if ($item->code_km == null)
            Không
        @else
            {{$item->code_km}}
        @endif </td>
        <td> {{number_format($item->total)}} VNĐ</td>
        <td> {{$item->created_at}}</td>
        <td class="detail"><a href="{{ asset('hoadondetail?mahd='.$item->mahd) }}">Xem Chi Tiết</a></td>
        <td>@if ($item->chotdon == 0)
            <a href="{{ asset('huydon?mahd='.$item->mahd) }}">Hủy Đơn Hàng</a>
        @endif</td>
        </tr>
        @endforeach
    </tbody>
</table>
</section>
@endsection
