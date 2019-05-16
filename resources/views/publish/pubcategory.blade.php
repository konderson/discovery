@extends('layouts.mainpage')
@section('content')
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

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            {{ Breadcrumbs::render('category',$c_category) }}
            <h1 style="border-bottom:1px solid #f5f5f5" class="my-4">Заметки на тему :
                <small>{{$c_category->name}}</small>
            </h1>
            @include('publish.ajaxpubcategory')
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Поск</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="По ключевому слову...">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
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
                <h5 class="card-header">Side Widget</h5>
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
