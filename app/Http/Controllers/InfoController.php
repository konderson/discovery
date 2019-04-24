<?php

namespace App\Http\Controllers;

use App\Publish;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{

   public function addLike(Request $request){
       if(Auth::check()){

           $id=$request->id;
           $current_count=$request->c_like;
           $new_count=$current_count+1;
           Publish::where('id',$id)->update(['c_like'=>$new_count]);
           echo json_encode(['c_like'=>$new_count]);
       }
       else{
           echo json_encode(['error'=>'Авторизуйтесь']);
       }

   }
}
