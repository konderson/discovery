<!DOCTYPE html>
<html>
<head>

    <title>Войти</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,5); } </script>
    <!-- Custom Theme files -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>
<!-- main -->
<div class="main-w3layouts wrapper">
    <h1 style="margin-top: 100px">Войти на Dicovery.Kg</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif


                <input id="password" type="password" placeholder="Пароль" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <input type="submit" value="Войти">
            </form>
            <p>Еще не создали  аккаунт? <a href="/register"> Зарегистрироваться!</a></p>
        </div>
    </div>
    <!-- copyright -->
    <div class="colorlibcopy-agile">
        <p>© {{date('Y')}} Все прова защищены |  <a href="http//www.discov.kg/" target="_blank">Discovery.kg</a></p>
    </div>
    <!-- //copyright -->
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li> <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>



    </ul>
</div>
<!-- //main -->
</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/datepicker.min.js')}}"></script>
<script>
    $(document).ready(function() { //скрипт ld
        $('#datetime').data('datepicker');

    });
</script>