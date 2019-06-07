<?php

namespace App\Http\Controllers;

use App\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public  function  index(){
        return view('admin_panel.index');
    }

    public  function  publication(){
        $publication=Publish::orderBy('date', 'desc')
            ->get();
return view('admin_panel.publication',compact(['publication']));
    }
}
