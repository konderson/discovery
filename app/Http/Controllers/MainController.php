<?php

namespace App\Http\Controllers;

use App\Category;
use App\Publish;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $categories=Category::all();
$publication=Publish::orderBy('id', 'DESC')->limit(5)->get();

        return view('index',compact(["categories","publication"]));
    }



}
