<?php

namespace App\Http\Controllers;

use App\Publish;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public  function  search(Request $request){
        $error=['error'=>'По вашему запросу не чего не найдено,пожайлуста используйте другое ключивое слово!'];
        if ($request->has('q')){
            $post=Publish::search($request->get('q'))->get();
            return $post->count()?$post:$error;//если нет результата тогда вернем сообщение об ошибке
        }
        return $error;
    }
}
