<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    protected $fillable=['name','display_name','description'];
    protected $table='role';
protected  $role=null;


    public static  function hasRole( $role_id){
        $user_id=Auth::id();

        $isHas=DB::table('role_user')->where(['user_id'=>$user_id,'role_id'=>$role_id])->count('user_id');
        if($isHas>0){
       return true;
   }else{
       return false;
   }

    }

    public  static  function  getRoleId($role_name){
        $id=DB::table('roles')->select('id')->where('name',$role_name)->first();

        return $id->id;;
    }


}
