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
            <div>{{$item->mahd}}</div>
            <div>{{$item->id_khach}}</div>
            <div>{{$item->total}}</div>
            <div>{{$item->created_at}}</div>
        </div>
    @endforeach
</body>
</html>