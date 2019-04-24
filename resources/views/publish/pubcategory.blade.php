@extends('layouts.mainpage')
@section('content')
<section class="category_img"  style=" position: absolute;  background-size: cover;  background-position: left; /* Положение фона */;   /* Положение фона */
  top: 0;
  left: 0;
  width: 100%;
  height: 600px;">

<div  style="  width: 100%">

    <div class="item">
        <img class="img-fluid" src="/img/fish.jpg" alt="">
        <div class="caption text-center" style="margin-top: -670px;color: #fff;">
            <h1 class="text-uppercase">Охота и рыбалка</h1>
            <p style="font-size: 30px">«...Охоту по справедливости должно почесть одним из главнейших занятий человека  В горных реках Кыргызстана водится много речных рыб а на горных склонах можно поохотится на разрешеных зверей.</p>
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
                <small>Охота и Рыбалка</small>
            </h1>

            <!-- Blog Post -->
           @foreach($publication as $publ)
            <div class="card mb-4">
                <img width="750px" height="300px" class="card-img-top" src="/img/new/{{\App\Publish::getImg($publ->img)}}" alt="Card image cap">

                <div class="card-body">
                    <h2 class="card-title">{{$publ->title}}</h2>
                    <p class="card-text">{{\App\Publish::subDescript($publ->descriotion)}}</p>
                    <a   href="#" class="btn btn-primary">Подробнее &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Опубликовано {{$publ->date}}
                    <a href="#">Михаил Барзых</a>
                </div>
            </div>
@endforeach
            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>

            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>

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