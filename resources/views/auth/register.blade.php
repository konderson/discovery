<!DOCTYPE html>
<html>
<head>

    <title>Персональные данные</title>
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
    <h1>Персональные данные</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"placeholder="Имя пользователя" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif


                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email адрес" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif



                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Пароль" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                <input id="password-confirm" type="password" class="form-control" placeholder="Подтвердите пароль"  name="password_confirmation" required>

<input  type="text" name="address" class="form-control" placeholder="Адрес">
                <input  type="text" name="phone" class="form-control" placeholder="Номер телефона">
                <p style="text-align: left;color:rgba(239,255,253,0.45);" class="form-control-label"> Дата рождения</p>
                <input type="text" id="startdate" name="bday" value="{{ date('d-m-Y ')}}" placeholder="{{ date('d-m-Y ')}}"  class="datepicker-here form-control"    data-date-format="dd.mm.yyyy" style="">
                <input type="submit" value="Создать ">
            </form>
            <p>Уже существует аккаунт? <a href="/login"> Войти сейчас!</a></p>
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