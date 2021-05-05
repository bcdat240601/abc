@extends('admin/layoutadmin')
@section('content')
<div id="editingadd">
        <input type="text" name="id" value="" style="display: none">
        <label for="Tên">Tên</label><input type="text" class="fullname" value="">
        <label for="Tài Khoản">Tài Khoản</label><input type="text" class="user" value="">
        <label for="Mật Khẩu">Mật Khẩu</label><input type="password" class="password" value="">
        <label for="Địa Chỉ">Địa Chỉ</label><input type="text" class="address" value="">
        <label for="Ngày Sinh">Ngày Sinh</label><input type="date" class="birthday" value="">
        <label for="Số Điện Thoại">Số điện thoại</label><input type="text" class="phone" value="">
        <label for="Email">Email</label><input type="text" class="email"  value="">        
        <button class="nhan">Them</button>
    <span>@if (isset($message))
        {{$message}}
    @endif</span>
    <button ><a href="{{ asset('admin/table/nv') }}">Quay Lại</a></button>
</div>
@endsection
@section('scripts')
    <script> 
        $('.nhan').click(function () {
            var fullname = $('.fullname').val();
            var user = $('.user').val();
            var password = $('.password').val();
            var address = $('.address').val();
            var birthday = $('.birthday').val();
            var phone = $('.phone').val();;
            var email = $('.email').val();            
        // if ($this->checkuser(user)){
            if (checkphone(phone)) {
                if (checkemail(email)) {                                                      
                    $.post('add',{"_token": "{{ csrf_token() }}",fullname:fullname,user:user,password:password,address:address,birthday:birthday,phone:phone,email:email},function(data){
                        return data;
                    });                    
                }else {
                    alert('Sai hoặc thiếu thông tin email');                                       
                }
            }else {                
                alert('Sai hoặc thiếu số điện thoại');                
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