<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/14/2015
 * Time: 12:52 PM
 */

class Inbox extends Eloquent
{
    protected $table = 'inboxs';
    public static $rules = array(
        'name'      => 'required',
        'phone'      => 'required',
        'content'      => 'required|max:255',
        'g-recaptcha-response' => 'required|captcha'
    );
}