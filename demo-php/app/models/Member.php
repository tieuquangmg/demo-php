<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/11/2015
 * Time: 4:11 PM
 */

class Member extends Eloquent {

    protected $table = 'users';
            public static $rules = array(
                'name'      => 'required|max:25',
                'username'      => 'required|max:25',
                'password'   => 'required|max:25',
                'email'    => 'required|max:50'
            );
    public static $rules_update = array(
        'name'      => 'required|max:25',
        'username'      => 'required|max:25',

        'email'    => 'required|max:50'
    );

}