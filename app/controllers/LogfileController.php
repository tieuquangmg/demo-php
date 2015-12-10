<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/23/2015
 * Time: 5:33 PM
 */

class LogfileController extends \BaseController {

    public function index()
    {
        $log = Logfile::paginate(50);
        return View::make('backend.logfiles.index')->with('log',$log);
    }
    public function delete_all(){
        Logfile::whereNotNull('id')->delete();
        Session::flash('message', 'Đã xóa tất cả logfile!');
        return Redirect::to('logfiles');
    }
}