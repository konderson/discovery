@extends('layouts.mainpage')
@section('content')
<div class="container">
<section class="top">

<div class="row">

<div class="col-md-5">
    {{ Breadcrumbs::render('detal',$category, $dpublish) }}

    <div><p class="category-info" ><span class="name_title">Категория</span> : {{$category->name}}</p></div>
    <div><p class="title_name">{{$dpublish->title}}</p></div>
</div>

    <div  class="col-md-2 col-sm-4  col-6 block-info-pub ">
        <div class="info-block" >

<div class="" style="text-align: center;color: red;font-weight: bold;float: left;margin-right:60px;">

    <div style=" margin-right:5px;float: left;">
        <img id="likes" style="height: 21px;width: 21px;" src="/img/likes.png">
    </div>
    <div style="float: left;">
        <p id="like" style="font-size: 15px;">{{$dpublish->c_like}}</p>
    </div>




</div>
        <div style="text-align: center; color: red;font-weight: bold;">
            <div style="float: left;margin-right:5px;">
                <img style="height: 18px;width: 23px;" src="/img/view.png">
            </div>
            <div style="float: left;">
                <p  id="view" style="font-size:15px;">{{$dpublish->c_view}}</p>
            </div>
        </div>

    </div>

    </div>
    <div class="col-md-2 col-6  col-sm-8 block-cocial" style="padding: 0">
        <div id="share">

            <!-- facebook -->
            <a class="facebook"  target="blank"><i class="fa fa-facebook"></i></a>

            <!-- twitter -->
            <a class="twitter"  target="blank"><i class="fa fa-twitter"></i></a>

            <!-- google plus -->
            <a class="googleplus"  target="blank"><i class="fa fa-google-plus"></i></a>

            <!-- linkedin -->
            <a class="linkedin"><i class="fa fa-linkedin"></i></a>

            <!-- pinterest -->
            <a class="pinterest"  target="blank"><i class="fa fa-pinterest-p"></i></a>

        </div>

    </div>
    <div class="col-md-3">
        <div><p class="map-title" >Объект на карте</p></div>
    </div>
</div>
</section>


        <section class="content">
            <div class="row">
                <div class="col-lg-9 blog_r ">
                    <center><div class="slider-for">

                            @foreach((\App\Publish::getAllImg($dpublish->img)) as $publ)
                        <div><img  style="width: 450px;height: 200px" src="/img/new/{{$publ}}">

                        </div>
@endforeach
                    </div>
</center>
                    <center><p class="gallery-name">Галерея публикация на тему:{{$dpublish->title}}</p></center>
                    <div class="slider-nav">
                        @foreach((\App\Publish::getAllImg($dpublish->img)) as $publ)
                        <div><img  class="img-slide"  src="/img/new/{{$publ}}"></div>
                        @endforeach

                    </div>
                    <div class="text-description" style="height: auto; border:1px solid #2170ee;color:#000;border-radius: 5px;margin-top: 50px;margin-bottom: 50px">
<span style="text-align: center;padding: 5px">{!!$dpublish->descriotion!!} </span>
                    </div>
                </div>

                <div class="col-lg-3 blog_l  ">
                 <div class="rigt_bar">
                     <div><p class="map-title-adapt" >Объект на карте</p></div>
                 </div>   <div id="map" style="width: 100%;height: 350px"></div>

                </div>

            </div>
        </section>
<div></div>
</div>

<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script>
    $(document).ready(function(){
        addView();
        $('.navbar-light').css('background','#000');
        $('.breadcrumb').css('background','#fff');
        $('.slick-current').css('height','80px');
initMap();
        $("#likes").click(function () {

           addlikeJS();

        });


        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay:true,
            autoplaySpeed:1200,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            mobileFirst: true,
            slidesToScroll: 3,
            autoplay:true,
            autoplaySpeed:200,
            asNavFor: '.slider-for',
            focusOnSelect: true,
            responsive: [
                {

                    breakpoint: 500,
                    settings: {

                    }
                }
                ]
        });

    });
</script>

<script>
function addlikeJS() {//метод асинхроного обнавления лайков
    id='{{$dpublish->id}}';//получаем id публикации
var c_like=$("#like").text();//текущие количесто лайков



    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '{{route('addlike')}}',
        data: {'c_like':c_like,'id':id},
        success: function (data) {
data=JSON.parse(data.toString());
            if (typeof data.error !=="undefined"){
            alert(data.error)
            }
            if (typeof data.c_like !=="undefined"){
                $("#like").text(data.c_like.toString());
            }



        }


    });


}
</script>


<script>

    function initMap() {
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                // Координаты центра карты.
                // Порядок по умолчанию: «широта, долгота».
                // Чтобы не определять координаты центра карты вручную,
                // воспользуйтесь инструментом Определение координат.
                center: [{{$dpublish->cordinate1}}, {{$dpublish->cordinate2}} ],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 8
            });
            myMap.geoObjects
                .add(new ymaps.Placemark([{{$dpublish->cordinate1}}, {{$dpublish->cordinate2}} ],{
                    iconContent: '{{$dpublish->title}}'
                }, {
                    preset: 'islands#darkOrangeStretchyIcon'

            }));




        }


    }
</script>


    <script>
        function addView() {//функция асинхроно добовляет количество просмотра

            id='{{$dpublish->id}}';//получаем id публикации
            var c_view=$("#view").text();//текущие количесто лайков



            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{route('addview')}}',
                data: {'c_view':c_view,'id':id},
                success: function (data) {
                    data=JSON.parse(data.toString());
                    if (typeof data.error !=="undefined"){
                        alert(data.error)
                    }
                    if (typeof data.c_view !=="undefined"){

                        $("#view").text(data.c_view.toString());
                    }



                }



            });
        };

    </script>
@endsection