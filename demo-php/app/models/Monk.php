<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/11/2015
 * Time: 4:11 PM
 */

class Monk extends Eloquent {

    protected $table = 'monks';
public static $rules = array(
    'the_danh'=>'required|max:25',
    'phap_danh'=>'required|max:25',
    'birthday'=>'required',
    'cmt'=>'required|max:9',
    'birthplace'=>'required|max:255',
    'address'=>'required|max:255',
    'dad_name'=>'max:25',
    'dad_birthday'=>'numeric|between:1800,2050',

    'mother_name'=>'max:25',
    'mother_birthday'=>'numeric|between:1800,2050',

    'ordained'=>'required|numeric|between:1800,2050',


    'education'=>'max:255',

    'adress'=>'required|max:255',
    'phone'=>'required',

    'other_information'=>'max:255',
    'image'=>'max:2000'
);
    public static $rules_update = array(
        'the_danh'=>'required|max:25',
        'phap_danh'=>'required|max:25',
        'birthday'=>'required',
        'cmt'=>'required|max:9',
        'birthplace'=>'required|max:255',
        'address'=>'required|max:255',
        'dad_name'=>'max:25',
        'dad_birthday'=>'numeric|between:1800,2050',

        'mother_name'=>'max:25',
        'mother_birthday'=>'numeric|between:1800,2050',

        'ordained'=>'required|numeric|between:1800,2050',


        'education'=>'max:255',

        'adress'=>'required|max:255',
        'phone'=>'required',

        'other_information'=>'max:255',
        'image'=>'max:2000'
    );
    public static $day = array(

    );
}