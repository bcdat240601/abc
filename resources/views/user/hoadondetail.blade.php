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
        @foreach ($cthd as $item)
            <div>
                <div>Mã Điện Thoại:{{$item->id_dt}}</div>
                {{-- <div>Mã khuyến mãi : @if ({{$item->code_km}} == null)
                    Không
                @else
                    {{$item->code_km}}
                @endif 
                    </div> --}}
                <div>Giá Tiền Sản Phẩm: {{$item->total}} VNĐ</div>
            </div>
        @endforeach
    </ul>
</body>
</html>