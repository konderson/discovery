<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
protected  $table='person';
    public  function  user(){
        return $this->belongsTo(User::class);
    }





}
