<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/18/2015
 * Time: 3:41 PM
 */

class Page extends Eloquent {

    protected $table = "pages";

    public static $rules = array(
        'name'      => 'required|max:15',
        'content'   => 'required',
    );
}