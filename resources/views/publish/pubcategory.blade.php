@extends('layouts.mainpage')
@section('content')
<section class="category_img"  style=" position: absolute;  background-size: cover;  background-position: left; /* Положение фона */;   /* Положение фона */
  top: 0;
  left: 0;
  width: 100%;">

<div  style="  width: 100%">

    <div class="item">
        <img class="img-fluid" src="/img/сategory/{{$c_category->img}}" alt="">
        <div class="caption text-center" style="margin-top: -470px;color: #fff;">
            <h1 class="text-uppercase">{{$c_category->name}}</h1>
            <p style="font-size: 30px">{{$c_category->descriotion}}</p>
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

            <h1 style="border-bottom:1px solid #f5f5f5" class="my-4">Заметки на тему :
                <small>{{$c_category->name}}</small>
            </h1>

            <!-- Blog Post -->
           @foreach($publication as $publ)
            <div class="card mb-4">
                <img width="750px" height="300px" class="card-img-top" src="/img/new/{{\App\Publish::getImg($publ->img)}}" alt="Card image cap">

                <div class="card-body">
                    <h2 class="card-title">{{$publ->title}}</h2>
                    <p class="card-text">{{\App\Publish::subDescript($publ->descriotion)}}</p>
                    <a   href="/" class="btn btn-primary">Подробнее &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Опубликовано {{$publ->date}}
                    <a href="#">Михаил Барзых</a>
                </div>
            </div>
@endforeach


            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

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
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-md-6">
                            <a href="pulic/">{{$category->name}}</a>
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