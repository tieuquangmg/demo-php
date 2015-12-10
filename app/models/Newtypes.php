<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/14/2015
 * Time: 3:32 PM
 */

class Newtypes extends Eloquent{
    public $table = "newtypes";
    public static $rules = array(
        'name'      => 'required|max:20',
    );

}