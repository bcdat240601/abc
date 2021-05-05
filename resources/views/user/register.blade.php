<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Bootstrap Simple Login Form with Blue Background</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="JS/formlog-reg.js"></script>
    <script type="text/javascript" src="JS/account.js"></script>
    <style>
        input{
            color:black;
        }
        body {
            color: #fff;
            background: #34414c;
            font-family: 'Roboto', sans-serif;
        }
        
        .form-control {
            height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: none;
        }
        
        .form-control:focus {
            background: #e2e2e2;
        }
        
        .form-control,
        .btn {
            border-radius: 3px;
        }
        
        .signup-form {
            width: 390px;
            margin: 30px auto;
        }
        
        .signup-form form {
            color: rgb(145, 51, 51);
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        
        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        
        .signup-form hr {
            margin: 0 -30px 20px;
        }
        
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        
        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }
        
        .signup-form .row div:first-child {
            padding-right: 10px;
        }
        
        .signup-form .row div:last-child {
            padding-left: 10px;
        }
        
        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #b40101;
            border: none;
            min-width: 140px;
        }
        
        .signup-form .btn:hover,
        .signup-form .btn:focus {
            background: #b40101 !important;
            outline: none;
        }
        
        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }
        
        .signup-form a:hover {
            text-decoration: none;
        }
        
        .signup-form form a {
            color: #b40101;
            text-decoration: none;
        }
        
        .signup-form form a:hover {
            text-decoration: underline;
        }
        
        .signup-form .hint-text {
            padding-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="signup-form">
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
    <a href="{{ asset('home') }}">Về Trang Chủ</a>
    <span>@if (isset($message))
        {{$message}}
    @endif</span>
    </div>
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('js/easing.js')}}"></script>
	<!-- Active JS -->
    <script src="{{asset('js/active.js')}}"></script>
    <script>
        $('.nhan').click(function () {
            $('#thongtin').css('display', 'none');
            $('#taikhoan').css('display', 'none');
            $('#SDT').css('display', 'none');
            $('#Email1').css('display', 'none');
            $('#Email2').css('display', 'none');
            var fullname = $('.fullname').val();
            var user = $('.user').val();
            var password = $('.password').val();
            var address = $('.address').val();
            var birthday = $('.birthday').val();
            var phone = $('.phone').val();;
            var email = $('.email').val();
            if(fullname != "" && user != "" && password != "" && address != "" && birthday != "" && phone != "" && email != ""){
                if (checkphone(phone)) {
                    if (checkemail(email)) {                                                      
                        $.post('register',{"_token": "{{ csrf_token() }}",fullname:fullname,user:user,password:password,address:address,birthday:birthday,phone:phone,email:email},function(data){
                            if(data == 1){
                                $('#taikhoan').css('display', 'inline-block');                            
                            }
                            if(data == 2){
                                $('#Email2').css('display', 'inline-block');                            
                            }else{
                                return view(data);
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
</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Bootstrap Simple Login Form with Blue Background</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="JS/formlog-reg.js"></script>
    <script type="text/javascript" src="JS/account.js"></script>
    <script type="javascript">
        function sendregister(){ alert( "đăng kí thành công" ) ;}
    </script>
    <style>
        body {
            color: #fff;
            background: #848a8f;
            font-family: 'Roboto', sans-serif;
        }
        
        .form-control {
            height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: none;
        }
        
        .form-control:focus {
            background: #e2e2e2;
        }
        
        .form-control,
        .btn {
            border-radius: 3px;
        }
        
        .signup-form {
            width: 390px;
            margin: 30px auto;
        }
        
        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        
        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        
        .signup-form hr {
            margin: 0 -30px 20px;
        }
        
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        
        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }
        
        .signup-form .row div:first-child {
            padding-right: 10px;
        }
        
        .signup-form .row div:last-child {
            padding-left: 10px;
        }
        
        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #b40101;
            border: none;
            min-width: 140px;
        }
        
        .signup-form .btn:hover,
        .signup-form .btn:focus {
            background: #b40101 !important;
            outline: none;
        }
        
        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }
        
        .signup-form a:hover {
            text-decoration: none;
        }
        
        .signup-form form a {
            color: #b40101;
            text-decoration: none;
        }
        
        .signup-form form a:hover {
            text-decoration: underline;
        }
        
        .signup-form .hint-text {
            padding-bottom: 15px;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="signup-form">
        <form action="/examples/actions/confirmation.php" method="post">
            <h2>Đăng Ký</h2>
            <p>Điền thông tin vào ô trống</p>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="name"><input type="text" id="fullnamereg" class="form-control" name="name" placeholder="Họ và Tên" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="user-name" id="userreg" class="form-control" name="user-name" placeholder="Tên đăng nhập" required="required">
            </div>
            <div class="form-group">
                <input type="password" id="passreg" class="form-control" name="password" placeholder="Mật khẩu" required="required">
            </div>
            <div class="form-group">
                <input type="password" id="repassreg" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu" required="required">
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> Tôi cam kết thông tin này là sự thật </label>
            </div>
            <div class="form-group">
                <button type="button" onclick="sendregister();" class="btn btn-primary btn-lg">Đăng ký</button>
            </div>
        </form>
        <div class="hint-text">Bạn đã có tài khoản? <a href="signin.html">Đăng nhập ngay</a></div>
        <div class="hint-text"> <a href="./index.html">Trang Chủ</a></div>
    </div>
    <script src="JS/formlog-reg.js"></script>

</body>

</html> -->