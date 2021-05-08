@extends('admin/layoutadmin')
@section('content')
<div id="editingadd">

    <span id="thongtin" style="display: none;width:250px;color:red;">Thiếu Thông Tin, Xin Vui Lòng Điền Đầy Đủ Thông Tin</span>
    <input type="text" name="id" value="" style="display: none">
    <label for="Tên">Tên</label><input type="text"  class="fullname" value="">
    <span id="ten" style="display: none;width:332px;color:red;">Tên Người Dùng Có Kí Tự Đặc Biệt</span>            
    <label for="Tài Khoản">Tài Khoản</label><input type="text" class="user" value="">
    <span id="taikhoan" style="display: none;width:250px;color:red;">Trùng Tài Khoản</span>
    <label for="Mật Khẩu">Mật Khẩu</label><input type="password" class="password" value="">
    <label for="Địa Chỉ">Địa Chỉ</label><input type="text" class="address" value="">
    <label for="Ngày Sinh">Ngày Sinh</label><input type="date" class="birthday" value="">    
    <label for="Số Điện Thoại">Số điện thoại</label><input type="text" class="phone" value="">
    <span id="SDT" style="display: none;width:250px;color:red;">Sai Hoặc Thiếu Số Điện Thoại</span>    
    <label for="Email">Email</label><input type="text" class="email"  value="">        
    <span id="Email1" style="display: none;width:250px;color:red;">Sai Hoặc Thiếu Thông Tin Email</span>
    <span id="Email2" style="display: none;width:250px;color:red;">Trùng Email</span>
    <button class="nhan">Thêm</button>

    <span>@if (isset($message))
        {{$message}}
    @endif</span>    
</div>
@endsection
@section('scripts')
<script> 
        $('.nhan').click(function () {
            $('#ten').css('display', 'none');
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
                        if(checkfullname(fullname)){
                            $.post('add',{"_token": "{{ csrf_token() }}",fullname:fullname,user:user,password:password,address:address,birthday:birthday,phone:phone,email:email},function(data){
                            if(data == 1){
                                $('#taikhoan').css('display', 'inline-block');                            
                            }if(data == 2){
                                $('#Email2').css('display', 'inline-block');                            
                            }
                            if(data == 0){
                                alert('Thêm Nhân Viên Thành Công');
                                window.location.reload(true);
                            }
                        });
                        }else{
                            $('#ten').css('display', 'inline-block');
                        }                  
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
    function checkfullname(full){
        var fullname = full;
        fullname = xoa_dau(fullname);
        if(fullname.match(/^[0-9a-zA-Z ]+$/) != null){
            return true;
        }
        return false;
    }
    function xoa_dau(a) {
        a = a.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/,'a');
        a = a.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/, "e");
        a = a.replace(/ì|í|ị|ỉ|ĩ/, "i");
        a = a.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/, "o");
        a = a.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/, "u");
        a = a.replace(/ỳ|ý|ỵ|ỷ|ỹ/, "y");
        a = a.replace(/đ/, "d");
        a = a.replace(/ {1,}/," ");
        return a;
        
    }
    </script>
@endsection