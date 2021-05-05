@extends('admin/layoutadmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4" style="display:none;" >DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            @foreach ($title as $value)
                                <th>{{$value}}</th>                                    
                            @endforeach                                                                                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr id="product-{{$item->id}}" data-row="{{$item->id}}">
                                @foreach ($item as $value)
                                <th>{{$value}}</th>
                                @endforeach
                                @if ($object != 'nhanvien')
                                    <th><a href="{{ asset('admin/detail/'.$object.'?id='.$item->id) }}">Xem</a></th>
                                @endif
                               
                                <th><button class="delete" data-row="{{$item->id}}">Xóa</button></th>
                                @if (isset($item->role))
                                <form action="{{ route('role')}}" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <th>
                                 <label for="role">Role
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
                                <th><input @if ($item->id == 1)
                                    style="display:none;"
                                @endif type="submit" value="Thêm"></th>
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
    </script>
    
@endsection