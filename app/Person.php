<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
protected  $table='person';
    public  function  user(){
        return $this->belongsTo(User::class);
    }

}
