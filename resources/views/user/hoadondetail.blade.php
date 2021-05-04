@extends('user/layoutaccount')
@section('contentaccount')
<section class="hero-slider">
    <table class="table table-danger table-striped" style="margin-top: 20px;">
        <thead>
          <tr>
            <th scope="col">Tên Sản Phẩm: </th>
            <th scope="col">Màu sắc:</th>
            <th scope="col">Số Lượng: </th>
            <th scope="col">Giá Tiền Sản Phẩm:</th>
            <th scope="col">Tổng Tiền Sản Phẩm:</th>
            
          </tr>
        </thead>
        <tbody>
            
            @foreach ($cthd as $item)
            <tr>
            <td><a> {{$item->name}}</a></td>
            <td> {{$item->color}}</td>
            <td> {{$item->soluong}}</td>
            <td> :{{number_format($item->giatien)}} VNĐ</td>
            <td>{{number_format($item->total)}} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </section>
    @endsection
    