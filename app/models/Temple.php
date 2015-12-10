<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/11/2015
 * Time: 4:11 PM
 */

class Temple extends Eloquent {

    protected $table = 'temples';

    public  static $rules = array(
        'name'=>'required|max:50|min:3',
        'adress'=>'required|max:200',
        'image'=>'required|max:2000',
        'year_built'=>'required|numeric|between:1800,2050',
        'architecture'=>'required|max:200',
        'abbot'=>'required|max:200',
        'history'=>'required',
        'bots'=>'required|max:200',
        'website'=>'required|max:400',
        'phone'=>'required|max:200',
        'email'=>'required|max:200',
    );
    public  static $rules_update = array(
        'name'=>'required|max:50|min:3',
        'adress'=>'required|max:200',

        'year_built'=>'required|numeric|between:1800,2050',
        'architecture'=>'required|max:200',
        'abbot'=>'required|max:200',
        'history'=>'required',
        'bots'=>'required|max:200',
        'website'=>'required|max:400',
        'phone'=>'required|max:200',
        'email'=>'required|max:200',
    );

}