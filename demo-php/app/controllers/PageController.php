<?php


class PageController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::all();
        return View::make('backend.pages.index')->with('pages',$pages);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        return View::make('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Responsef81a482d8069a749bd141a2efa68de7d
     */
    public function store()
    {
//
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
        $page = Page::find($id);

        // show the view and pass the post to it
        return View::make('backend.pages.show')
            ->with('page', $page);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the nerd
        $page = Page::find($id);

        // show the edit form and pass the nerd
        return View::make('backend.pages.edit')
            ->with('page', $page);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        var_dump(Input::get('content'));
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $validator = Validator::make(Input::all(), Page::$rules);
        //var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('pages/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $page =Page::find($id);
            $page->name = Input::get('name');
            $page->content = Input::get('content');
            $page->save();
            Logfile::addData('Sửa','Page',$page->id,$page->name);

            // redirect
            Session::flash('message', 'Sủa Page  thành công!');
            return Redirect::to('pages');

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }


}
