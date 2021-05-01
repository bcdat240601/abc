@extends('admin/layoutadmin')
@section('content')
<style>
    .thongke{
        margin-bottom:10px;
    }
</style>
    <form action="{{ route('thongketheothoigian') }}" method="get">
        Từ Ngày: <input type="date" name="from"><br>
        <br>
        Đến Ngày: <input type="date" name="to"><br>
        <input type="submit" value="Kết Quả">
    </form>
    @if (isset($from) && isset($to))
        <div>Kết quả thống kê từ ngày {{$from}} đến ngày {{$to}}</div>
    @endif
    @if (isset($thongke))
        @foreach ($thongke as $item)
        <div class="thongke">
            <div>Tên: {{$item->name}}</div>
            <div>Giá Tiền: {{$item->giatien}}</div>
            <div>Số Lượng: {{$item->soluong}}</div>
            {{-- <div>Tổng Tiền: {{$item->total}}</div> --}}
        </div>
        @endforeach
    @endif
@endsection
@section('scripts')
    
@endsection