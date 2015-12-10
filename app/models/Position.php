<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/14/2015
 * Time: 3:03 AM
 */

class Position extends Eloquent{
    protected $table = "positions";

    public static $rules = array(
        'name'      => 'required|max:25',
    );
}