@extends('admin/layoutadmin')
@section('content')
@foreach ($bill as $item)
<div>
    <div>Mã hóa đơn: {{$item->mahd}}</div>
    <div>Id khách: {{$item->id_khach}}</div>
    <div>Tổng tiền: {{number_format($item->total)}} VNĐ</div>
    <div>Ngày khởi tạo: {{$item->created_at}}</div>
    <div>
        <input type="radio" name="state-{{$item->mahd}}" data-id="{{$item->mahd}}" class="cxl" id="cxl-1" value="0" @if ($item->chotdon == 0)
            checked
        @endif>
        <label for="cxl">Chưa Xử Lý</label>
        <input type="radio" name="state-{{$item->mahd}}" data-id="{{$item->mahd}}" class="dxl" id="dxl-1" value="1" @if ($item->chotdon == 1)
            checked
        @endif>
        <label for="dxl">Đã Xử Lý</label>
    </div>
    {{-- <div>
        <select name="state" id="">
            <option value="0">Chưa xử lý</option>
        </select>
    </div> --}}
</div>
@endforeach

@endsection

@section('scripts')
<script>
    $('.dxl').click(function () { 
        var id =$(this).data('id');
        $.get('xuly',{mahd:id,state:1},function(data){
        });
    });
</script>
@endsection
