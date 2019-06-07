<html>
<head>
    <title>Роли</title>
</head>
<body>


<h1>Список ролей</h1>
<a class="btn " href="{{route('role.create')}}">Создать роль</a>
<table>
    <tr>
        <th>Название</th>
        <th>Имя на экране</th>
        <th>Описание</th>
        <th>Действия</th>



    </tr>
    @forelse($roles as $role)
        <tr>
            <td>{{$role->name}}</td>
            <td>{{$role->display_name}}</td>
            <td>{{$role->description}}</td>
     <td>
         <a class="btn btn-info " href="">Изменить</a>
         <form action="" method=POST">
             {{csrf_field()}}
         {{method_field('DELETE')}}
             <input type="submit" value="Удалить">
         </form>
     </td>

        </tr>

        @empty
        <tr>
            <td>
                Нет записей
            </td>
        </tr>
        @endforelse
</table>
</body>
</html>