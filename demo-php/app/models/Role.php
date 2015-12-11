<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/13/2015
 * Time: 11:40 PM
 */

class Role extends Eloquent {
    protected $table = 'role';
    //protected $guarded = [];

    public function users(){
        return $this->belongsToMany('User', 'user_role', 'role_id', 'user_id');
   }
}