@extends('admin/layoutadmin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
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
                                <th>Chi Tiết</th>                                                                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr id="product-{{$item->id}}" data-row="{{$item->id}}">
                                @foreach ($item as $value)
                                <th>{{$value}}</th>
                                @endforeach
                                <th><a href="{{ asset('admin/detail/'.$object.'?id='.$item->id) }}">Xem</a></th>
                                <th><button class="delete" data-row="{{$item->id}}">Xóa</button></th>
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                <button><a href="{{ asset('admin/detail/'.$object.'/showadd') }}">Thêm</a></button>
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