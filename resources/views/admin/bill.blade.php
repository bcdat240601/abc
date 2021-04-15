<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($bill as $item)
        <div>
            <div>Mã hóa đơn: {{$item->mahd}}</div>
            <div>Id khách: {{$item->id_khach}}</div>
            <div>Tổng tiền:{{$item->total}}</div>
            <div>Ngày khởi tạo: {{$item->created_at}}</div>
            <button><a href="{{ asset('admin/xuly') }}">Xử Lý</a></button>
        </div>
    @endforeach
</body>
</html>