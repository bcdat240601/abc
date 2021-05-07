@extends('admin/layoutadmin')
@section('content')
<div id="editingadd">

    <span id="thongtin" style="display: none;width:250px;color:red;">Thiếu Thông Tin, Xin Vui Lòng Điền Đầy Đủ Thông Tin</span>
    <input type="text" name="id" value="" style="display: none">
    <label for="Tên">Tên</label><input type="text"  class="fullname" value="">
    <span id="taikhoan" style="display: none;width:250px;color:red;">Trùng Tài Khoản</span>
    <label for="Tài Khoản">Tài Khoản</label><input type="text" class="user" value="">
    <label for="Mật Khẩu">Mật Khẩu</label><input type="password" class="password" value="">
    <label for="Địa Chỉ">Địa Chỉ</label><input type="text" class="address" value="">
    <label for="Ngày Sinh">Ngày Sinh</label><input type="date" class="birthday" value="">
    <span id="SDT" style="display: none;width:250px;color:red;">Sai Hoặc Thiếu Số Điện Thoại</span>
    <label for="Số Điện Thoại">Số điện thoại</label><input type="text" class="phone" value="">
    <span id="Email1" style="display: none;width:250px;color:red;">Sai Hoặc Thiếu Thông Tin Email</span>
    <span id="Email2" style="display: none;width:250px;color:red;">Trùng Email</span>
    <label for="Email">Email</label><input type="text" class="email"  value="">        
    <button class="nhan">Thêm</button>

    <span>@if (isset($message))
        {{$message}}
    @endif</span>
    <button ><a href="{{ asset('admin/table/nv') }}">Quay Lại</a></button>
</div>
@endsection
@section('scripts')
<script> 
        $('.nhan').click(function () {
            $('#taikhoan').css('display', 'none');
            $('#SDT').css('display', 'none');
            $('#Email1').css('display', 'none');
            $('#Email2').css('display', 'none');
            var fullname = $('.fullname').val();
            var user = $('.user').val();
            var password = $('.password').val();
            var address = $('.address').val();
            var birthday = $('.birthday').val();
            var phone = $('.phone').val();
            var email = $('.email').val();
            if(fullname != "" && user != "" && password != "" && address != "" && birthday != "" && phone != "" && email != ""){
                if (checkphone(phone)) {
                    if (checkemail(email)) {                                                      
                        $.post('add',{"_token": "{{ csrf_token() }}",fullname:fullname,user:user,password:password,address:address,birthday:birthday,phone:phone,email:email},function(data){
                            if(data == 1){
                                $('#taikhoan').css('display', 'inline-block');                            
                            }if(data == 2){
                                $('#Email2').css('display', 'inline-block');                            
                            }
                            if(data == 0){
                                window.location.reload(true);
                            }
                        });                    
                    }else {
                        $('#Email1').css('display', 'inline-block');                    

                    }
                }else {                
                    $('#SDT').css('display', 'inline-block');                
                }   
            }else{
                $('#thongtin').css('display', 'inline-block');
            } 

            
        });
    function checkphone(pho){
        var phone = pho;
        if(phone.match(/((09|03|07|08|05|01)([0-9]{8})\b)/) != null){
            return true;
        }
        return false;
    }
    function checkemail(ema){
        var email = ema;
        if(email.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/) != null){
            return true;
        }
        return false;
    }
    </script>
@endsection