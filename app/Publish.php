<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Publish extends Model
{

    use Searchable;
    protected $table = "publish";

   static public function getImg($img)
    {
        $image=json_decode($img);
        echo $image[0];
    }
static  public function getAllImg($img){
    $image=json_decode($img);
    $array = (array)$image;
return $array;
}
    static  public function subDescript($text){
        $str = substr($text,0,900);
        $str = $str . "...";
        echo $str;
    }


public  function  category(){
       return $this->belongsTo(Category::class);
}

}