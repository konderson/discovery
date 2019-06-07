@extends('layouts.mainpage')
@section('content')

<section class="default-banner active-blog-slider">
    <div class="item-slider relative" style="background: url(img/slider1.jpg);background-size: cover;">
        <div class="overlay" style="background: rgba(0,0,0,.3)"></div>
        <div class="container">
            <div class="row fullscreen justify-content-center align-items-center">
                <div class="col-md-10 col-12">
                    <div class="banner-content text-center">
                        <h4 class="text-white mb-20 text-uppercase">Открой Кыргызстан для всех</h4>
                        <h1 class="text-uppercase text-white">#discovery kg</h1>
                        <p class="text-white text-bottom">Посещай самые интересные туристические места ,памятники культуры,природные заповедники.
                            Ходи рекомендуемыми нашими пользователями тропми.И получай настроение. </p>
                        <a href="#" class="text-uppercase header-btn">Лучшие маршруты</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="item-slider relative" style="background: url(img/slider2.jpg);background-size: cover;">
        <div class="overlay" style="background: rgba(0,0,0,.3)"></div>
        <div class="container">
            <div class="row fullscreen justify-content-center align-items-center">
                <div class="col-md-10 col-12">
                    <div class="banner-content text-center">
                        <h4 class="text-white mb-20 text-uppercase">Discover the Kyrgyzstan</h4>
                        <h1 class="text-uppercase text-white">#ачык kg</h1>
                        <p class="text-white text-bottom">Расскажи о своем самом любимом месте в Кыргызстане и по твоему маршруту пойдут толпы. Наш проект предназначен
                            показать и рассказать о самых интересных местах от сельской местности до городов, от равнин  до высот!
                        </p>
                        <a href="#" class="text-uppercase header-btn">Добавить маршрут</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item-slider relative" style="background: url(img/slider3.jpg);background-size: cover;">
        <div class="overlay" style="background: rgba(0,0,0,.3)"></div>
        <div class="container">
            <div class="row fullscreen justify-content-center align-items-center">
                <div class="col-md-10 col-12">
                    <div class="banner-content text-center">
                        <h4 class="text-white mb-20 text-uppercase">Баары үчүн ачык Кыргызстан</h4>
                        <h1 class="text-uppercase text-white">#разнообразие KG </h1>
                        <p class="text-white text-bottom">Кыргызстан разнообразная странна, с богатой историей ,многообразной культурой .Открой для себе кулинарный мир.
                            Сегодня гастрономический туризм — невероятно модное увлечение; путешественники отправляются в путь, чтобы отведать традиционные блюда и местные продукты
                        </p>
                        <a href="#" class="text-uppercase header-btn">список маршрутов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start about Area -->
<section class="section-gap info-area" id="about">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Наш проект предназначен для расширения туристических границ Кыргызстана</h1>
                    <p>Просматривай маршруты других путишествиников и добовляй свои маршруты .</p>
                </div>
            </div>
        </div>
        <div class="single-info row mt-40">
            <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
                <div class="info-thumb">
                    <img src="img/about.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 no-padding info-rigth">
                <div class="info-content">
                    <h2 class="pb-30">Расскажи об интересном <br>
                        месте другим,  <br>
                        По твоим тропам пройду другие</h2>

                        Большинство путеводителей по стране предлагают обыденные и заезженные туристические маршруты по которым путешествовал не однократно.
                    <br>
                    <br>
                      Но как охота посмотреть новые удивительные места страны,нетронутую природу ,насладится национальной культурой .
                    <br>
                        Именно для этой цели и была разработана данная площадка где вы можете просматривать интересные вам маршруты разделенные на категории а также публиковать свои интересные места, добавлять фото ,комментировать и оставлять отзывы других  маршрутов.
                    </p>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- End about Area -->


<!-- Start project Area -->
<section class="project-area section-gap" id="project">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-30 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Последние публикации </h1>
                    <p> Места которые понравились другим.<br>Могут стать и твими любимыми</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center d-flex">
            <div class="active-works-carousel mt-40 col-lg-8">
                @foreach($publication as $publ)
                <div class="item">
                    <img  style="width: 700px;height: 350px" src="img/new/{{\App\Publish::getImg($publ->img)}}" alt="">
                    <div class="caption text-center mt-20">
                        <h6 class="text-uppercase">{{$publ->title}}</h6>

                        <p>{{\App\Publish::subDescript($publ->descriotion)}}</p>
                        <center><a  style="margin-top: 15px"href="/publish/detal/{{$publ->id}}" class="btn btn-primary">Подробнее</a></center>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End project Area -->


<!-- Start feature Area -->
<section class="feature-area section-gap" id="secvice">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Категории маршрутов </h1>
                    <p>Просматривай публикации других по интересующим тебя направлениям.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6  blog_l">
                <div class=" mb-30" style="margin-top:40px">
                  <a href="publish/category/{{$category->id}}"> <img style="height: 180px;width: 400px" src="img/сategory/{{$category->img_small}}" class="img-fluid" alt="">
                  <p style="margin-top: -95px;text-align:center;color: #fff;font-size:28px;font-weight: bold;" >{{$category->name}}</p></a>
                </div>
            </div>

@endforeach
        </div>
    </div>
</section>
<!-- End feature Area -->


<!-- Start gallery Area -->
<section class="gallery-area" id="gallery">
    <div class="container-fluid">
        <div class="row no-padding">
            <div class="active-gallery">
                <div class="item single-gallery">
                    <img src="img/g1.jpg" alt="">
                </div>
                <div class="item single-gallery">
                    <img src="img/g2.jpg" alt="">
                </div>
                <div class="item single-gallery">
                    <img src="img/g3.jpg" alt="">
                </div>
                <div class="item single-gallery">
                    <img src="img/g4.jpg" alt="">
                </div>
                <div class="item single-gallery">
                    <img src="img/g5.jpg" alt="">
                </div>
                <div class="item single-gallery">
                    <img src="img/g6.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End gallery Area -->


<!-- Start faq Area -->
<section class="faq-area section-gap" id="faq"   style="background: url(img/bg_route.jpg); background-size: cover;  background-position: left; /* Положение фона */;   /* Положение фона */
  top: 0;
  left: 0;
  width: 100%;
  height: auto;">>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Немного статистики проекта</h1>

                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div class="counter-left col-lg-3 col-md-3">
                <div class="single-facts">
                    <h2 class="counter">27</h2>

                </div>
                <div class="single-facts">
                    <h2 class="counter">2394</h2>

                </div>
                <div class="single-facts">
                    <h2 class="counter">5</h2>
</div>
                <div class="single-facts">
                    <h2 class="counter">933</h2>

                </div>
            </div>
            <div class="faq-content col-lg-9 col-md-9">
                <div class="single-faq" style="margin-top: 50px">
                    <h2 class="text-uppercase">
                        Количество маршрутов и статей
                    </h2>

                </div>
                <div class="single-faq" style="margin-top: 50px">
                    <h2 class="text-uppercase">
                        Пользователей использующих наш сайт
                    </h2>

                </div>
                <div class="single-faq" style="margin-top: 70px">
                    <h2 class="text-uppercase">
                      Посетивших сегодня сайт
                    </h2>

                </div>
                <div class="single-faq"style="margin-top: 70px">
                    <h2 class="text-uppercase">
                        Количество прошедших по маршрутам сайта
                    </h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End faq Area -->




<!-- Start logo Area -->
<section class="logo-area">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>
<!-- End logo Area -->


<!-- start contact Area -->
<section class="contact-area section-gap" id="contact">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">If you need, Just drop us a line</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                    <input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                </div>
                <div class="col-lg-6 form-group">
                    <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                    <button class="primary-btn mt-20">Send Message<span class="lnr lnr-arrow-right"></span></button>
                    <div class="alert-msg">
                    </div>
                </div></div>
        </form>

    </div>
</section>
<!-- end contact Area -->

@endsection