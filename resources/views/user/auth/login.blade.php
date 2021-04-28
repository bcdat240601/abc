 <!-- <!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <h1>User</h1>
    <input type="text" name="email" placeholder="Nhập địa chỉ email">
    <input type="password" name="password" placeholder="Nhập mật khẩu">
    <button type="submit">Đăng nhập</button>
</form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body {
            color: rgb(255, 255, 255);
            background: #34414c;
            font-family: 'Varela Round', sans-serif;
        }
        
        .form-control {
            box-shadow: none;
            border-color: #ddd;
        }
        
        .form-control:focus {
            border-color: #b40101;
        }
        
        .login-form {
            width: 350px;
            margin: 0 auto;
            padding: 30px 0;
        }
        
        .login-form form {
            color: #000000;
            border-radius: 1px;
            margin-bottom: 15px;
            background: #fff;
            border: 1px solid #f3f3f3;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        
        .login-form h4 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }
        
        .login-form .avatar {
            color: #fff;
            margin: 0 auto 30px;
            text-align: center;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            z-index: 9;
            background: #F7941D;
            padding: 15px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        
        .login-form .avatar i {
            font-size: 62px;
        }
        
        .login-form .form-group {
            margin-bottom: 20px;
        }
        
        .login-form .form-control,
        .login-form .btn {
            min-height: 40px;
            border-radius: 2px;
            transition: all 0.5s;
        }
        
        .login-form .close {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .login-form .btn {
            background: #F7941D;
            border: none;
            line-height: normal;
        }
        
        .login-form .btn:hover,
        .login-form .btn:focus {
            background: #d77704;
        }
        
        .login-form .checkbox-inline {
            float: left;
        }
        
        .login-form input[type="checkbox"] {
            margin-top: 2px;
        }
        
        .login-form .forgot-link {
            float: right;
        }
        
        .login-form .small {
            font-size: 13px;
        }
        
        .login-form a {
            color: #f7941d;
        }
    </style>
    
    <script type="text/javascript">
        function adminlogin() {
            var useradmin = "admin";
            var passlog = "admin";

            if (document.getElementById("userlog").value == "admin" && document.getElementById("passlog").value == "admin") {
                window.location = "./admin.html";
            } else {
                if (document.getElementById("userlog").value == "") {
                    alert("Tên đăng nhập không được bỏ trống");
                } else if (document.getElementById("passlog").value == "") {
                    alert("Mật Khẩu không được bỏ trống")
                } else {
                    alert("Đăng nhập thành công <3")
                    window.location = "index2.html"
                }
            }
        }
    </script>
</head>

<body>
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
            <h4 class="modal-title">Log in</h4>
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="userlog" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="passlog" name="password" placeholder="Password" required="required">
            </div>
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Đăng nhập">
        </form>
        <div class="text-center small">Have you created your account? <a href="{{ asset('register') }}">Sign up here</a></div>
        <div class="text-center small"> <a href="{{ asset('home') }}">Home</a></div>
    </div>
</body>

</html> 
