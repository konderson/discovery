@extends('layouts.mainpage')
@section('content')
<div  class="banner container-fluid"  style="background: url(img/bg_route.jpg); background-size: cover;  background-position: left; /* Положение фона */;   /* Положение фона */
  top: 0;
  left: 0;
  width: 100%;
  margin-top: -150px;
  height: auto;">


<center>


     <div style="padding-bottom: 50px" >
         <h2 class="form-title;" style="color:#fff;margin-bottom: 20px;padding-top: 300px;margin-top: -250px;">Созать новое туристическое место</h2>
<!--<img width="150px" height="100px" src="img/kompas.png"> -->
         @if (\Session::has('bad'))
             <div class="alert alert-danger" style="width: 20%">
                 <ul>
                     <li> <img style="width: 20px;height: 20px;margin-left: 10px" src="img/error.png">{!! \Session::get('bad') !!}</li>
                 </ul>
             </div>
         @endif
<div class="form_border" style="background-color: #fff;; ">

         <form method="post" enctype="multipart/form-data" action="{{route('addpost')}}">
             {{ csrf_field() }}
             <div class="">
                 <h5 class="form-title" style="opacity: 9;color: #000">Название публикации вашей точки</h5>
                 <input class="form-control" type="text" id="name" name="name" style="border: 1px solid #3df;border-radius: 5px;padding: 2px;opacity: 0.7 ">
             </div>
             <div >
                 <h5 class="form-title" style="opacity: 9;color: #000">Опешите подробней место которое вы хотите порекомендовать другим</h5>
                 <div style="border: 1px solid #3df;border-radius: 5px;padding: 2px;opacity: 0.7 "> <textarea class="form-control"  id="editor1" name="description" cols="80"   style="border: 1px solid #3df;border-radius: 5px;opacity: 0.7 " rows="10"></textarea>
        </textarea>
                 </div>
             </div>

<div style="width: 100%;">


<div><h5 class="form-title">Загрузите фотографии которые передадут атмосферу посещаемого вами места </h5></div>
<div class="row" id="upload" style="border: 1px solid #41cbee;width: 80%">
    <div class="col-md-4" style="overflow: hidden;margin-top: 8px;">
    <div style="" class="box">
        <input type="file" name="upload[]" id="file-7" class=""  multiple />

    </div>
    </div>
    <div class="col-md-4" style="overflow: hidden;margin-top: 8px;">
        <div class="box">
        <input type="file" name="upload[]" id="file-7" class=""  multiple />

    </div>
    </div>
    <div class="col-md-4" style="overflow: hidden;margin-top: 8px;">
        <div  class="box">
            <input type="file" name="upload[]" id="file-7" class=""  multiple />

        </div>
    </div>
    <div class="col-md-4"style="overflow: hidden;margin-top: 8px;">
        <img id="addbtn" style="width: 20px;height: 20px;margin-top: 12px" src="/img/add.png">
        <p>Добавить еще</p>
    </div>

</div>




<div style="margin-top: 15px">

    <div><h5 class="form-title">Выбирите категорию</h5></div>
    <div class="pure-css-select-style theme-filled">
    <select  id="category"  name="category" style="width: 300px;"  >
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach

    </select>
    </div>
</div>
    <div style="padding-top: 20px">
        <h5 class="form-title" style="opacity: 9;color: #000">Укажите стоимость мпршрута(!Не обязательно)</h5>
        <input class="form-control" type="text" id="cost" style="border: 1px solid #3df;border-radius: 5px;padding: 2px;opacity: 0.7;margin-bottom: 12px;">
    </div>
    <h5 class="form-title" style="opacity: 9;color: #000">Укажите ваш маршрут на карте</h5>
    <div id="map" style="width: 100%; height: 400px"></div>

</div>
             <div class="row">

              <div class="col-md-6 " style="float: right">

                  <input id="cordinata1" type="text" name="cordinata1">
                  <p>Кордината A</p>
              </div>

                 <div class="col-md-6" style="float: left">
                     <input id="cordinata2" name="cordinata2" type="text">
                     <p>Кордината B</p>
                 </div>

             </div>




             <div style="text-align: center;margin-top: 20px;"><input class="btn badge-info" style="width: 190px" type="submit" value="Создать"> </div>
         </form>
</div>
     </div>

    </center>





</div>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>





<script src="//cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
<script>
    $(document).ready(function() { //скрипт ld
        CKEDITOR.replace('editor1');





$('#addbtn').click( function () {
    addBtn();

});


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
                center: [42.8750, 74.6137],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 7
            });


            // Обработка события, возникающего при щелчке
            // левой кнопкой мыши в любой точке карты.
            // При возникновении такого события откроем балун.
            myMap.events.add('click', function (e) {
                if (!myMap.balloon.isOpen()) {
                    var coords = e.get('coords');
                    myMap.balloon.open(coords, {
                        contentHeader:'Событие!',
                        contentBody:'<p>Точка выброна на карте.</p>' +
                            '<p>Координаты: ' + [
                                coords[0].toPrecision(6),
                                coords[1].toPrecision(6)
                            ].join(', ') + '</p>',
                        contentFooter:'<sup>Щелкните еще раз</sup>'
                    });
                   $('#cordinata1').val(coords[0].toPrecision(6))
                    $('#cordinata2').val(coords[1].toPrecision(6))
                }
                else {
                    myMap.balloon.close();
                }
            });

            // Обработка события, возникающего при щелчке
            // правой кнопки мыши в любой точке карты.
            // При возникновении такого события покажем всплывающую подсказку
            // в точке щелчка.
            myMap.events.add('contextmenu', function (e) {
                alert( coords[1]);
                myMap.hint.open(e.get('coords'), 'Кто-то щелкнул правой кнопкй');
            });

            // Скрываем хинт при открытии балуна.
            myMap.events.add('balloonopen', function (e) {
                myMap.hint.close();
            });
        }


    });


</script>

<script>

    function addBtn(){

        var newElems = $("<div class='col-md-4 ' style='overflow: hidden;margin-top: 8px;'><div style=' '>")
            .append("<input type='file' name='upload[]'  class=''  /></div>")



        $('#upload').prepend(newElems);

    };
</script>