<div id="content">
    <!-- Blog Post -->
    @foreach($data as $publ)
        <div class="card mb-4">
            <img width="750px" height="300px" class="card-img-top" src="/img/new/{{\App\Publish::getImg($publ->img)}}" alt="Card image cap">

            <div class="card-body">
                <h2 class="card-title">{{$publ->title}}</h2>
                <p class="card-text">{{\App\Publish::subDescript($publ->descriotion)}}</p>
                <a   href="/publish/detal/{{$publ->id}}" class="btn btn-primary">Подробнее &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Опубликовано {{$publ->date}}
                <a href="#">Михаил Барзых</a>
            </div>
        </div>



@endforeach

    {{ $data->links() }}
</div>
