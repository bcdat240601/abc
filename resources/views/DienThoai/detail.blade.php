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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Giá Tiền</th>
                            <th>Màu sắc</th>
                            {{-- <th>Mô Tả</th> --}}
                            <th>RAM</th>
                            <th>ROM</th>
                            <th>Pin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$data->name}}</th>
                            <th>{{number_format($data->price)}}</th>
                            <th>{{$data->color}}</th>
                            {{-- <th>{{$data->mota}}</th> --}}
                            <th>{{$data->RAM}}</th>
                            <th>{{$data->ROM}}</th>
                            <th>{{$data->battery}}</th>
                        </tr>
                    </tbody>
                </table>
                <button id="edit">Chỉnh sửa</button>
                <button><a href="{{ asset('admin/table/sp') }}">Quay Về</a></button>
            </div>
        </div>
    </div>

</div>
<div id="editing">
    <form id="form" action="{{ route('edit')}}" method="post">
        @csrf
        <input type="text" name="id" value="{{$data->id}}" style="display: none">
        <span id="thongbao" style="color: red;display: none;">Vui Lòng Điền Đầy Đủ Thông Tin</span>
        <label for="name">Tên</label><input type="text" name="name" class="name" value="{{$data->name}}">
        <label for="price">Giá</label><input type="text" name="price" class="price" value="{{$data->price}}">
        {{-- <label for="color">Màu sắc</label><input type="text" name="color" value="{{$data->color}}"> --}}
        <label for="color">Màu sắc</label><select name="color" id="cars">
            <option value="Trắng">Trắng</option>
            <option value="Đen">Đen</option>
            <option value="Đỏ">Đỏ</option>
          </select><br>
        {{-- <label for="nation">Mô tả</label><input type="text" name="mota" class="mota" value="{{$data->mota}}" style="margin-bottom: 3px;width:200%;height:150px;"> --}}
        <label for="RAM">RAM</label><select name="RAM" id="cars">
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="16">16</option>
          </select><br>
          <label for="ROM">ROM</label><select name="ROM" id="cars">
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="16">16</option>
          </select><br>
          <label for="battery">Pin(mma)</label><select name="battery" id="cars">
            <option value="1000">1000</option>
            <option value="2000">2000</option>
            <option value="3000">3000</option>
            <option value="4000">4000</option>
          </select><br>
        <input type="submit" value="Lưu">
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/code/edit.js') }}"></script>
<script>
    $('#thongbao').css('display', 'none');
    $('#form').submit(function () { 
      var ten = $('.name').val();
      var price = $('.price').val();
      var mota = $('.mota').val();
      if(ten != "" && price != "" && mota != ""){
        return true;
      }else{        
      $('#thongbao').css('display', 'block');
      return false;
      }
    });
  </script>
@endsection