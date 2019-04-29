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
$c_category=Category::where('id',$id)->first();

return view('publish.pubcategory',compact(["publication","categories","c_category"]));

}

public  function detalPublic($id){//метод для перенаправления на страницу с подробным описание

        $dpublish=Publish::where('id',$id)->first();

$category=Category::where('id',$dpublish->category_id)->first();

return view('publish.detal',compact(['dpublish','category']));


}
static public function new(){
        return view('new');
}
}
