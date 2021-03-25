@extends('admin/layoutadmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh Sửa Sản Phẩm</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng Chỉnh Sửa Sản Phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Pin</th>
                            <th>RAM</th>
                            <th>ROM</th>
                            <th>Giá Tiền</th>
                            <th>Màu sắc</th>
                            <th>Thông số CPU</th>
                            <th>Screen</th>
                            <th>Kích thước</th>
                            <th>Trọng Lượng</th>
                            <th>Quốc gia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$data->name}}</th>
                            <th>{{$data->battery}}</th>
                            <th>{{$data->RAM}}</th>
                            <th>{{$data->ROM}}</th>
                            <th>{{$data->price}}</th>
                            <th>{{$data->color}}</th>
                            <th>{{$data->cpu}}</th>
                            <th>{{$data->screen}}</th>
                            <th>{{$data->kichthuoc}}</th>
                            <th>{{$data->trongluong}}</th>
                            <th>{{$data->nation}}</th>
                        </tr>
                    </tbody>
                </table>
                <button id="edit">Chỉnh sửa</button>
            </div>
        </div>
    </div>

</div>
<div id="editing">
    <form action="{{ route('edit')}}" method="post">
        @csrf
        <input type="text" name="id" value="{{$data->id}}" style="display: none">
        <label for="name">Tên</label><input type="text" name="name" value="{{$data->name}}">
        <label for="battery">Pin</label><input type="text" name="battery" value="{{$data->battery}}">
        <label for="RAM">RAM</label><input type="text" name="RAM" value="{{$data->RAM}}">
        <label for="ROM">ROM</label><input type="text" name="ROM" value="{{$data->ROM}}">
        <label for="price">Giá</label><input type="text" name="price" value="{{$data->price}}">
        <label for="color">Màu sắc</label><input type="text" name="color" value="{{$data->color}}">
        <label for="cpu">CPU</label><input type="text" name="cpu" value="{{$data->cpu}}">
        <label for="screen">Screen</label><input type="text" name="sreen" value="{{$data->screen}}">
        <label for="kichthuoc">Kích Thước</label><input type="text" name="kichthuoc" value="{{$data->kickthuoc}}">
        <label for="trongluong">Trọng Lượng</label><input type="text" name="trongluong" value="{{$data->trongluong}}">
        <label for="nation">Quốc Gia</label><input type="text" name="nation" value="{{$data->nation}}">
        <input type="submit" value="Lưu">
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/code/edit.js') }}"></script>
@endsection