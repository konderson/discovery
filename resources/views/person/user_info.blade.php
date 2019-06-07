<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Adventure</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <script src="https://api-maps.yandex.ru/2.1/?apikey=f22fd6da-3482-4da0-a97f-579baabb69ee&lang=ru_RU" type="text/javascript">
    </script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS


    ============================================= -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/linearicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/pure-css-select-style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/css_btn/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slick.css')}}"/>
    @section('scripts')
        <script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
    @endsection

</head>
<body>


<!-- start banner Area -->
<section class="banner-area" id="home" style="background: #000">
    <!-- Start Header Area -->
    <header class="default-header" >
        <nav class="navbar navbar-expand-lg  navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white lnr lnr-menu"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav" >
                        <li><a href="#home">Главная</a></li>

                        <li><a href="#secvice">Рекомендуемые места</a></li>
                        <li><a href="#gallery">Галерея</a></li>
                        <li><a href="/addroute">Создать маршрут</a></li>
                        <li><a href="#about">О проекте</a></li>


                        <!-- Dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Маршруты
                            </a>
                            <div class="dropdown-menu" style="background: #3f9ae5">
                                <a class="dropdown-item" href="generic.html">Регионы</a>
                                <a class="dropdown-item" href="elements.html">Категории</a>
                                <a class="dropdown-item" href="elements.html">Лучшие отзывы</a>
                            </div>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::user())
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    {{\App\User::getName()->name}}
                                </a>
                                <div class="dropdown-menu" style="background: #393949">
                                    <a class="dropdown-item" href="generic.html"> <img width="20px" height="20px" src="/img/elements/write.png">Мои публикации</a>
                                    <a class="dropdown-item" href="elements.html"><img width="20px" height="20px" src="/img/elements/setting.png">Личный кабинет</a>
                                    <a class="dropdown-item" href="elements.html"><img width="22px" height="20px" src="/img/elements/message.png">Опавещание</a>
                                    <a href="/logout"><img style="padding-right:5px " width="28px" height="20px" src="/img/elements/logout.png">Выйти</a>

                                </div>
                            </li>


                        @else
                            <li><a href="/login">Войти</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header Area -->
</section>
<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/parallax.js')}}"></script>

</body>
</html>