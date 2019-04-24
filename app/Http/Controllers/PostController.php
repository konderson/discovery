<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function  index(){
        $categories=Category::all();


        return view("addroute",compact('categories'));

    }

    public function createPost(Request $request){
        $imageNameDb=[];
        $title=$request->name;
        $cordinate1=$request->cordinata1;
        $cordinate2=$request->cordinata2;

        $description=$request->description;
        $date = date("d-m-Y h:i");
        $date=now();

        $coast=0;

        if(isset($request->coast)){
            $coast=$request->coast;
        }
$category=$request->category;

        $path=[];
        if(isset($request->upload))
        {
        foreach($request->upload as $image) {

            $imageName = time() . '.' . $image->getClientOriginalName();
            $imageNameDb[]=$imageName;
                $image->move(public_path('img/new'), $imageName);




            }

            DB::table('publish')->insert(
                [
                    'title'=>$title,
                    'descriotion'=>$description,
                    'cordinate1'=>$cordinate1,
                    'cordinate2'=>$cordinate2,
                    'img'=>json_encode($imageNameDb),
                    'date'=> $date,
                    'category_id'=>$category,
                    'coast'=>$coast,

                ]
            );



        }
        else{
            return back()->with('bad',"Ошибка!фаил не коректен ");
        }


    }
}
