@extends('layouts.mainpage')
@section('content')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
<section class="category_img"  style=" position: absolute;  background-position: left; /* Положение фона */;   /* Положение фона */
  top: 0;
  left: 0;
  width: 100%;">

<div class="block-category" style="  width: 100%">


        <img    class="img-fluid" src="/img/сategory/{{$c_category->img}}" alt="">
        <div class="caption text-center title-category" >
            <h1 class="text-uppercase">{{$c_category->name}}</h1>
            <p>{{$c_category->descriotion}}</p>
        </div>
    </div>

</div>




</section>

<section  class="blog-div">
<!-- Page Content -->
<div class="container">

    <div class="row" id="app">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            {{ Breadcrumbs::render('category',$c_category) }}
            <h1 style="border-bottom:1px solid #f5f5f5" class="my-4">Заметки на тему :
                <small>{{$c_category->name}}</small>
            </h1>
           <div v-if="category">

               @include('publish.ajaxpubcategory')
           </div>


                <!-- Blog Post -->






                    <div v-if!="category" class="card mb-4"  v-for="publ in publish">

                        <img   :src="publ.img | getImg"  width="750px" height="300px" class="card-img-top" />
                        <div class="card-body">
                            <h2 class="card-title">@{{publ.title}}</h2>
                            <p :inner-html.prop="publ.descriotion | readMore"></p>
                            <a   :href="publ.id |pathPublish " class="btn btn-primary">Подробнее &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Опубликовано @{{publ.date}}
                            <a href="#">@{{publ.author}}</a>
                        </div>
                    </div>

                    </div>







        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Поск</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="query" placeholder="По ключевому слову...">
                        <span class="input-group-btn">
                            <div id="">
                            <button class="btn btn-default" @click="search()" type="button" v-if="!loading">Go!</button>
<button  v-if="loading" class="btn btn-default" type="button">Загрузка...</button>
                    </div>
              </span>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" v-if="error">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                @{{ error }}

            </div>
            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Категории</h5>
                <div class="card-body">
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-md-6">
                            <a href="{{$category->id}}">{{$category->name}}</a>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Топ-5 маршрутов</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
</section>
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {



            getPosts($(this).attr('href').split('page=')[1]);

            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '/ajax/publish?page=' + page,

        }).done(function(data)

            {

                $("#content").empty();
                $("#content").empty().html(data);

                location.hash = page;

            })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    alert('No response from server');

                });

        }

</script>
