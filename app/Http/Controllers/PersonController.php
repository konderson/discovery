<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function  userInfoOwner(){
        $user_id=Auth::id();
        $person=DB::table('person')->join('users','person.user_id','=','users.id')->where('users.id',$user_id)
            ->select('person.*','users.email')->get();

        return view('person.user_info',compact('person'));
    }
}
