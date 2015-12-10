<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Carbon\Carbon;
//Route::get('/test',function(){
//    $time = Inbox::find(1)->get();
//    foreach($time as $ff){
//       // var_dump($ff->created_at->format('H:i:s d/m/Y'));
//    }
//    //var_dump($time);
//    $input  = '2015-07-23 05:08:18';
//    $format = 'Y-m-d H:i:s';
//
//    $date = Carbon::createFromFormat('Y-m-d H:i:s', $input);
//    var_dump($date);
//});


Route::filter("checkUser", function(){
    if(Session::get('role')!=2) return Redirect::to("/");
});

Route::group(array("prefix"=>"admin","before"=>"checkUser"), function(){
    Route::get("/", function(){
        $log = Logfile::orderBy('id','desc')->paginate(25);
        return View::make('backend.home')
            ->with('log',$log);
    });

});


Route::get('/', function()
{
    $new = Post::all()->take(3);
    return View::make('frontend.home')->with('new',$new);
});

Route::get('data',function(){
   return View::make('frontend.ajax');
});

Route::get('ckfinder', function()
{
    return View::make('ckfinder');
});

Route::group(array("prefix"=>"check"),function(){
    Route::post("check-username",function(){
        if(User::check_username(Input::get("username")))
            return "true";
        else return "false";
    });
    Route::post("check-email",function(){
        if(User::check_email(Input::get("email")))
            return "true";
        else return "false";
    });
});

Route::filter("check-login",function(){
    if(!Session::has("logined"))
        return Redirect::to("users/login");
});

    // người sử dụng
Route::controller('users', 'UserController');
    // Admin
Route::group(array('before'=>'checkUser'), function(){
    Route::get('members/active/{type}/{id}','MemberController@active');
    Route::get('logfiles/delete','LogfileController@delete_all');

    Route::resource('posts', 'PostController');
    Route::resource('monks', 'MonkController');
    Route::resource('temples', 'TempleController');
    Route::resource('members', 'MemberController');
    Route::resource('positions', 'PositionsController');
    Route::resource('newtypes', 'NewtypesController');
    Route::resource('pages', 'PageController');
    Route::resource('inboxs', 'InboxController');
    Route::resource('albums', 'AlbumController');
    Route::resource('logfiles', 'LogfileController');

});