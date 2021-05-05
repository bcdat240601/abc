@extends('admin/layoutadmin')
@section('content')
    <button class="thongketypebtn">
        Thống Kê Theo Loại Sản Phẩm
    </button>
    <button class="thongkeallbtn">
        Thống Kê Tất Cả
    </button>
    <div class="thongkeall" @if (session()->has('typeall'))
        @if (session('typeall') == 1)
            style='display:block;'
        @else
        style='display:none;'
        @endif
    @else
        style='display:none;'
    @endif>
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
    </div>
    <div class="thongketype" @if (session()->has('typeall'))
        @if (session('typeall') == 2)
            style='display:block;'
        @else
        style='display:none;'
        @endif
    @else
        style='display:none;'
    @endif>
        <form action="{{ route('thongketheoloai') }}" method="get">
            Chọn Thể Loại Sản Phẩm Cần Thống Kê: 
            <select name="type" >
                <option value="1" @if (session('typesanpham')==1)
                    selected
                @endif>ASUS</option>
                <option value="3" @if (session('typesanpham')==3)
                    selected
                @endif>IPHONE</option>
                <option value="5" @if (session('typesanpham')==5)
                    selected
                @endif>OPPO</option>
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
    </div>
@endsection
@section('scripts')
    <script>
        $('.thongkeallbtn').click(function () { 
            $('.thongkeall').css('display', 'block');
            $('.thongketype').css('display', 'none');
        });
        $('.thongketypebtn').click(function () { 
            $('.thongkeall').css('display', 'none');
            $('.thongketype').css('display', 'block');
        });
    </script>
@endsection