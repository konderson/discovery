
<!-- start banner Area -->
<section class="banner-area" id="home">
    <!-- Start Header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg  navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white lnr lnr-menu"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
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