<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/11/2015
 * Time: 4:11 PM
 */

class Post extends Eloquent {

    protected $table = 'post';

    public static $rules = array(
        'title'      => 'required',
        'thumb'      => 'required|max:2000',
        'decription'  => 'required|max:400',
        'category'   => 'required',
        'content'    => 'required'
    );
    public static $rules_update = array(
        'title'      => 'required',

        'decription' => 'required|max:400',
        'category'   => 'required',
        'content'    => 'required'
    );

    public static function menu(){
        $new_sub = array();
        foreach (Newtypes::all() as $val){
            $new_sub[$val->id]['name'] = $val->name;
            $new_sub[$val->id]['val'] = Post::where('category','=',$val->id)->take(10)->get();
        }
        return $new_sub;
    }
}