<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        form
        {
            width: 178px;
            height: 300px;
        }
        input
        {
            float: right;
        }
    </style>
    <div>register</div>
    <form action="{{ route('register') }}" method="post">
        @csrf
        Tên đầy đủ<input type="text" name="fullname"><br>
        Tên Tài Khoản<input type="text" name="user"><br>
        Mật Khẩu<input type="text" name="password"><br>
        Ngày sinh<input type="text" name="birthday"><br>
        Số Điện Thoại<input type="text" name="phone"><br>
        Email<input type="text" name="email"><br>
        <input type="submit">
    </form>
    <span>@if (isset($message))
        {{$message}}
    @endif</span>
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
</html>