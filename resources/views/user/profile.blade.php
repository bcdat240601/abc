<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .hoadon{
            margin-bottom: 15px;
        }
    </style>
    <div>
        @foreach ($hoadon as $item)
            <div class="hoadon">
                <div>Mã hóa đơn:{{$item->mahd}}</div>
                <div>Mã khuyến mãi :
                    @if ($item->code_km == null)
                        Không
                    @else
                        {{$item->code_km}}
                    @endif 
                    </div>
                <div>Tổng tiền: {{number_format($item->total)}} VNĐ</div>
                <div>Ngày Thanh Toán :{{$item->created_at}}</div>
                <div class="detail"><a href="{{ asset('hoadondetail?mahd='.$item->mahd) }}">Xem Chi Tiết</a></div>
                @if ($item->chotdon == 0)
                    <div><a href="{{ asset('huydon?mahd='.$item->mahd) }}">Hủy Đơn Hàng</a></div>
                @endif
            </div>
        @endforeach
        <a href="{{ asset('home') }}">Quay về trang chủ</a>
    </ul>
</body>
</html>