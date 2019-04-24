<?php

namespace App\Http\Controllers;

use App\Category;
use App\Publish;
use Illuminate\Http\Request;

class PublishController extends Controller
{



    public  function  getByCategory($id){

$publication=Publish::where('category_id',$id)->get();
$categories=Category::all();

return view('publish.pubcategory',compact(["publication","categories"]));

}

public  function detalPublic($id){//метод для перенаправления на страницу с подробным описание

        $dpublish=Publish::where('id',$id)->first();

    $ip = $_SERVER['REMOTE_ADDR'];


        return view('publish.detal',compact('dpublish'));


}
static public function new(){
        return view('new');
}
}
