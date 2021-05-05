@extends('admin/layoutadmin')
@section('content')
<table class="table table-success table-striped" style="margin-top: 10%;width: 93%;margin-left: 4%;">
    <thead>
      <tr>
        <th scope="col">Mã hóa đơn:</th>
        <th scope="col">ID khách :</th>
        <th scope="col">Tổng tiền: </th>
        <th scope="col">Ngày khởi tạo:</th>
        <th scope="col">Trạng thái</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($bill as $item)
        <tr>
        <td><a>{{$item->mahd}}</a></td>
        <td> {{$item->id_khach}}</td>
        <td>{{number_format($item->total)}} VNĐ</td>
        <td> {{$item->created_at}}</td>
        <td><input type="radio" name="state-{{$item->mahd}}" data-id="{{$item->mahd}}" class="cxl" id="cxl-1" value="0" @if ($item->chotdon == 0)
            checked
        @endif>
        <label for="cxl">Chưa Xử Lý</label>
        <input type="radio" name="state-{{$item->mahd}}" data-id="{{$item->mahd}}" class="dxl" id="dxl-1" value="1" @if ($item->chotdon == 1)
            checked
        @endif>
        <label for="dxl">Đã Xử Lý</label></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- @foreach ($bill as $item)
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
    </div>     --}}
    {{-- <div>
        <select name="state" id="">
            <option value="0">Chưa xử lý</option>
        </select>
    </div> --}}
{{-- </div> --}}
{{-- @endforeach --}}
<span id="idnv" style="display:none;">{{session()->get('idnv')}}</span>
@endsection

@section('scripts')
<script>
    $('.dxl').click(function () { 
        var id =$(this).data('id');
        var idnhanvien = $('#idnv').text();             
        $.get('xuly',{mahd:id,state:1,idnv:idnhanvien},function(){
            alert('Xử Lí Thành Công');
        });
    });
</script>
@endsection
