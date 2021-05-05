@extends('admin/layoutadmin')
@section('content')
<div id="editingadd">
        <input type="text" name="id" value="" style="display: none">
        <label for="Tên">Tên</label><input type="text" class="fullname" name="fullname" value="">
        <label for="Tài Khoản">Tài Khoản</label><input type="text" class="user" name="user" value="">
        <label for="Mật Khẩu">Mật Khẩu</label><input type="text" class="password" name="password" value="">
        <label for="Địa Chỉ">Địa Chỉ</label><input type="date" class="address" name="address" value="">
        <label for="Ngày Sinh">Ngày Sinh</label><input type="date" class="birthday" name="birthday" value="">
        <label for="Số Điện Thoại">Số điện thoại</label><input type="text" class="phone" name="phone" value="">
        <label for="Email">Email</label><input type="text" class="email" name="email" value="">        
        <input type="submit"  class="nhan" value="Thêm">
    <span>@if (isset($message))
        {{$message}}
    @endif</span>
    <button ><a href="{{ asset('admin/table/nv') }}">Quay Lại</a></button>
</div>
@endsection
@section('scripts')
    <script> 
        $('.nhan').click(function () {
            
            var fullname = $('.fullname').text();
            var user = $('.user').text();
            var password = $('.password').text();
            var address = $('.address').text();
            var birthday = $('.birthday').text();
            var phone = $('.phone').val();;
            var email = $('.email').text();            
        // if ($this->checkuser(user)){
            if (checkphone(phone)) {
                if (checkemail(email)) {                    
                    $.post('admin/detail/nhanvien/add',{fullname:fullname,user:user,password:password,address:address,birthday:birthday,phone:phone,email:email},function(){
                    });                    
                }else {
                    alert('c');                                       
                }
            }else {                
                alert('b');                
            }
        // }
        // else {     
        //     echo 'a';       
        //     return false;
        // }    
            
        });
    // function checkuser($user){
    //     $getuser = DB::table('nhanvien')->select('user')->get();
    //     foreach ($getuser as $username) {
    //         if($username->user == $user){
    //             return false;
    //         }
    //     }
    //     return true;
    // }
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