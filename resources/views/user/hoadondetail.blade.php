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
        .item{
            margin-bottom:20px;
        }
    </style>
    <div>
        @foreach ($cthd as $item)
            <div class="item">
                <div>Mã Điện Thoại:{{$item->id_dt}}</div>
                <div>Số Lượng:{{$item->soluong}}</div>
                <div>Giá Tiền Sản Phẩm:{{number_format($item->giatien)}} VNĐ</div>
                <div>Tổng Tiền Sản Phẩm: {{number_format($item->total)}} VNĐ</div>
            </div>
        @endforeach
    </ul>
</body>
</html>