<?php


class InboxController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $inboxs = Inbox::orderBy('id','desc')->get();
        return View::make('backend.inboxs.index')->with('inboxs',$inboxs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the post
        $inbox = Inbox::find($id);
        $inbox->view = 1;
        $inbox->save();
        Logfile::addData('Đọc tin','Tin nhắn',$inbox->id,$inbox->name);
        // show the view and pass the post to it
        return View::make('backend.inboxs.show')
            ->with('inbox', $inbox);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $inbox = Inbox::find($id);
        $inbox->delete();
        Logfile::addData('Xóa','Tin nhắn',$inbox->id,$inbox->name);
        // redirect
        Session::flash('message', 'Tin Đã bị xóa!');
        return Redirect::to('inboxs');
    }


}
