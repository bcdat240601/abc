@extends('admin/layoutadmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4" style="display:none;" >DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>
    <style>
        .table-bordered thead th{
            text-align: center;
        }
    </style>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Company</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="table_id" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            @foreach ($title as $value)
                                <th @if ($value == 'Quyền Hạn' && session()->get('role') !=1 || $value == 'Xác Nhận' && session()->get('role') !=1 )
                                    style="display: none;"
                                @endif>{{$value}}</th>                                    
                            @endforeach                                                                                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr id="product-{{$item->id}}" data-row="{{$item->id}}">
                                @foreach ($item as $key=>$value)
                                @if ($key != 'block')
                                    <th>{{$value}}</th>                                    
                                @else
                                <th style="display: none;">{{$value}}</th>
                                @endif
                                @endforeach
                                @if ($object != 'nhanvien' && $object != 'khachhang')
                                    <th><a href="{{ asset('admin/detail/'.$object.'?id='.$item->id) }}">Xem</a></th>
                                @endif    
                                                           
                                @if ($key=='block')
                                    <th><form  @if ($item->id == 1 && $object == 'nhanvien')
                                        style="display:none;"
                                    @endif class="block">
                                    <input type="checkbox"@if (isset($item->block) && $item->block == 1)
                                        checked
                                    @endif name="block" class="block"  data-row="{{$item->id}}">
                                    <label for="vehicle1"  > Block</label><br>
                                    </form></th>    
                                
                                 
                                @endif
                                <th @if (session('onoff') == 1 && $object == 'nhanvien')
                                    style="display: none"
                                    @endif><button @if ($item->id == 1 || (session('idnv') == $item->id))
                                        style="display:none;"
                                        @endif class="delete" data-row="{{$item->id}}" value="{{isset($item->role)}}">Xóa</button></th>
                                @if (isset($item->role))
                                <form  action="{{ route('role')}}" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <th @if (session('onoff') == 0 && $object == 'nhanvien')                                                                
                                    style="display: none"
                                    @endif>
                                 <label for="role">
                                <input type="text" name="id" value="{{$item->id}}" style="display: none">
                                <select name="role">
                                    <option value="1" @if ($item->role == 1)
                                        selected
                                    @endif> Thêm Xóa Phân quyền</option>
                                    <option value="2" @if ($item->role == 2)
                                        selected
                                    @endif> Thêm Xóa</option>
                                    <option value="3" @if ($item->role == 3)
                                        selected
                                    @endif>Thêm</option>
                                    {{-- <option value="4">Sửa</option> --}}
                                    <option value="4" @if ($item->role == 4)
                                        selected
                                    @endif> Xóa</option>                                    
                                    {{-- <option value="7">Thêm Sửa</option>
                                    <option value="8"> Sửa Xóa</option> --}}
                                  </select>
                                </th>
                                <th  @if (session('onoff') == 0 && $object == 'nhanvien')
                                    style="display:none;"
                                @endif><input @if ($item->id == 1)
                                style="display:none;"
                                @endif type="submit" value="ok"></th>
                                </form>
                                @endif
                               
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                {{-- <button><a href="{{ asset('admin/detail/'.$object.'/showadd') }}">Thêm</a></button> --}}
            </div>
        </div>
    </div>
<span id="getValue" style="display: none">{{$object}}</span>
</div>
@endsection
@section('scripts')
    <script>
        $(".delete").click(function () { 
            var id= $(this).data('row');
            var object = $('#getValue').text();            
            var f=confirm("Bạn có muốn xóa");
            if(f==true)
            {     
                var object = $('#getValue').text();           
                var row=$(this).data("row");                
                $.get("detail/"+object+"/delete",{row:row},function(data){
                });
                $("#product-"+row).hide();
            }
        });
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
        $('.block').click(function(){
            var checkbox=$(this).is(":checked");
            var id= $(this).data('row');
            $.get("kh/block",{checkbox:checkbox,id:id},function(){
                window.location.reload(true);
		    });	
        })
    </script>
    
@endsection