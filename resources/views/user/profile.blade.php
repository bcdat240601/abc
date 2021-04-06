<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($hoadon as $item)
            <div class="hoadon">
                <div>Mã hóa đơn:{{$item->mahd}}</div>
                {{-- <div>Mã khuyến mãi : @if ({{$item->code_km}} == null)
                    Không
                @else
                    {{$item->code_km}}
                @endif 
                    </div> --}}
                <div>Tổng tiền: {{$item->total}} VNĐ</div>
                <div>Ngày Thanh Toán :{{$item->created_at}}</div>
                <div class="detail"><a href="{{ asset('hoadondetail?mahd='.$item->mahd) }}">Xem Chi Tiết</a></div>
            </div>
        @endforeach
    </ul>
</body>
</html>