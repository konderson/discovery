<?php

namespace App\Http\Controllers;

use App\Category;
use App\Publish;
use Illuminate\Http\Request;

class PublishController extends Controller
{

static $id=0;

    public  function  getByCategory($id){
self::$id=$id;
$data=Publish::where('category_id',$id)->paginate(3);
$categories=Category::all();
$c_category=Category::where('id',$id)->first();




return view('publish.pubcategory',compact(["data","categories","c_category"]));

}

    public  function  getByCategoryAjax(Request $request){

        if ($request->ajax()) {
            $data=Publish::where('category_id',4)->paginate(3);
            return view('publish.ajaxpubcategory', compact('data'));

        }



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
