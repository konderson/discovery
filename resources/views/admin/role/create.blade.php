<html>
<head>
    <title>Создать роль</title>
</head>
<body>


<form method="post" action="{{route('role.store')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="name"></label>
        <input type="text" name="name" class="form-control" PLACEHOLDER="Введите ......">

    </div>

    <div class="form-group">
        <label for="name"></label>
        <input type="text" name="display_name" class="form-control" PLACEHOLDER="Введите ......">

    </div>

    <div class="form-group">
        <label for="name"></label>
        <input type="text" name="description" class="form-control" PLACEHOLDER="Введите ......">

    </div>
@foreach($permissions as $permission)
     <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
    @endforeach
<input type="submit" value="Создать">
</form>

</body>
</html>

