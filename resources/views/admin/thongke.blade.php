@extends('admin/layoutadmin')
@section('content')
    <form action="{{ route('thongketheothoigian') }}" method="get">
        <select name="select" id="select">
            <option value="1" @if (session('thongketype')==1)
                selected
            @endif>Thống kê theo sản phẩm</option>
            <option value="2" @if (session('thongketype')==2)
            selected
        @endif>Thống kê theo khách hàng</option>
        </select><br>
        Từ Ngày: <input type="date" name="from"><br>
        <br>
        Đến Ngày: <input type="date" name="to"><br>
        <input type="submit" value="Kết Quả">
    </form>
    @if (isset($from) && isset($to))
        <div>Kết quả thống kê từ ngày {{$from}} đến ngày {{$to}}</div>
    @endif
    @if (isset($thongke))
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                @foreach ($title as $value)
                    <th>{{$value}}</th>                                    
                @endforeach            
            </tr>
        </thead>
        <tbody>
            @foreach ($thongke as $items)
                <tr>
                @foreach ($items as $item)
                    <th>{{$item}}</th>
                @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if (isset($message))
        {{$message}}
    @endif
@endsection
@section('scripts')
    
@endsection