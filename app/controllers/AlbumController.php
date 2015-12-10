<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/21/2015
 * Time: 3:27 PM
 */

class AlbumController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('backend.album.index');
    }
}
