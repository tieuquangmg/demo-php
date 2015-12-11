<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    public static function check_login($user_input,$password){
        $array1=array('user_input'=>$user_input);
        $rules=array("user_input"=>"email");
        if(Validator::make($array1,$rules)->fails()) {
            $check = User::where("username", "=", $user_input)->where("password", "=", $password)->where('status','=',2)->count();
            if ($check > 0) {
                $user1 = User::where("username", "=", $user_input)->get()->first();
                Session::put('name', $user1->name);
                Session::put('id_taikhoan', $user1->id);
            }
        }
        else {
            $check = User::where("email", "=", $user_input)->where("password", "=", $password)->where('status','=',2)->count();
           if($check > 0){
            $user1 = User::where("email","=",$user_input)->get()->first();
                Session::put('name',$user1->name);
                Session::put('id_taikhoan', $user1->id);
            }
        }
        if($check>0){
            return true;
        }
        else return false;
    }

    public static function check_username($username){
        if(User::where("username","=",$username)->count()>0)
            return false;
        else return true;
    }

    public static function check_email($email){
        if(User::where("email","=",$email)->count()>0)
            return false;
        else return true;
    }

    public function roles(){
        return $this->belongsToMany('Role', 'user_role', 'user_id', 'role_id');
    }

    public function scopeActived($query){
        return $query->whereActive(1);
    }
}
