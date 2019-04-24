@extends('layouts.mainpage')
@section('content')
    <div class="container">
<section class="top">

<div class="row">

<div class="col-md-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <div><p class="category-info" ><span class="name_title">Категория</span> : Природа</p></div>
    <div><p class="title_name">{{$dpublish->title}}</p></div>
</div>

    <div  class="col-md-2">
        <div class="info-block" >

<div style="text-align: center;color: red;font-weight: bold;float: left;margin-right:60px;">

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
                <p style="font-size:15px;">21</p>
            </div>
        </div>

    </div>

    </div>
    <div class="col-md-2">
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
                <div class="col-md-9">
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
                        <div><img style="width: 300px;height: 200px" src="/img/new/{{$publ}}"></div>
                        @endforeach
                            <div><img style="width: 300px;height: 200px" src="/img/slider2.jpg"></div>
                        <div><img style="width: 300px;height: 200px" src="/img/slider2.jpg"></div>
                        <div><img style="width: 300px;height: 200px" src="/img/slider2.jpg"></div>
                        <div><img style="width: 300px;height: 200px"src="/img/slider3.jpg"></div>
                        <div><img style="width:300px;height: 200px" src="/img/slider1.jpg"></div>
                        <div><img style="width:300px;height: 200px" src="/img/slider1.jpg"></div>
                    </div>
                    <div class="text-description">
{!!$dpublish->descriotion!!}
                    </div>
                </div>

                <div class="col-md-3">

                </div>

            </div>
        </section>

    </div>
    @endsection
<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.navbar-light').css('background','#000');
        $('.breadcrumb').css('background','#fff');
        $('.slick-current').css('height','80px');

        $("#likes").click(function () {

           addlikeJS();

        });


        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 3,
            asNavFor: '.slider-for',
            focusOnSelect: true
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
