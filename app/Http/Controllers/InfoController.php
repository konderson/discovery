<?php

namespace App\Http\Controllers;

use App\Publish;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{

   public function addLike(Request $request){
       $ip = $_SERVER['REMOTE_ADDR'];
       $id=$request->id;
       if(Auth::check()){
if(DB::table('ip_likes')->where(['ip'=>$ip,'publish_id'=>$id,])->count()>0){
    echo json_encode(['error'=>'Вы уже считаете данный маршрут like!']);
}
else{
    $current_count=$request->c_like;
    $new_count=$current_count+1;
    Publish::where('id',$id)->update(['c_like'=>$new_count]);
    DB::table('ip_likes')->insert(['ip'=>$ip,'publish_id'=>$id]);
    echo json_encode(['c_like'=>$new_count]);
}


       }
       else{
           echo json_encode(['error'=>'Авторизуйтесь']);
       }

   }

   public  function  addView(Request $request){
       $ip = $_SERVER['REMOTE_ADDR'];
       $id=$request->id;
if(DB::table('ip_view')->where(['ip'=>$ip,'publish_id'=>$id,])->count()>0){
    $current_count=Publish::where('id',$id)->value('c_view');
    echo json_encode(['c_view'=>$current_count]);
}else{
    $current_count=$request->c_view;
    $new_count=$current_count+1;
    Publish::where('id',$id)->update(['c_view'=>$new_count]);
    DB::table('ip_view')->insert(['ip'=>$ip,'publish_id'=>$id,'count'=>$new_count]);
    echo json_encode(['c_view'=>$new_count]);
}


   }




}
