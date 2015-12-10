<?php


class NewtypesController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $newtypes = Newtypes::all();
        return View::make('backend.newtypes.index')->with('newtypes',$newtypes);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('backend.newtypes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Newtypes::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('newtypes/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $newtypes = new Newtypes();
            $newtypes->name       = Input::get('name');
            $newtypes->save();
            Logfile::addData('thêm','Loại tin',$newtypes->id,$newtypes->name);

            // redirect
            Session::flash('message', 'Thêm newtypes mới thành công!');
            return Redirect::to('newtypes');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
//        // get the post
//        $Monk = Monk::find($id);
//
//        // show the view and pass the post to it
//        return View::make('backend.monks.show')
//            ->with('monk', $Monk);
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
        $newtype = Newtypes::find($id);
        // show the edit form and pass the nerd
        return View::make('backend.newtypes.edit')
            ->with('newtypes', $newtype);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $validator = Validator::make(Input::all(), Position::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('positions/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $post = Newtypes::find($id);;
            $post->name = Input::get('name');
            $post->save();
            Logfile::addData('Sửa','Loại tin',$post->id,$post->name);

            // redirect
            Session::flash('message', 'Sửa loại tin thành công!');
            return Redirect::to('newtypes');
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
        // delete
        if(count(Post::Where('category','=',$id)->get()) > 0){
            Session::flash('message', 'Không thể xóa vì có Tin tức thuộc Thể loại tin này!');
            return Redirect::to('newtypes');
        }else {
            $monk = Newtypes::find($id);
            $monk->delete();
            Logfile::addData('Xóa','Loại tin',$monk->id,$monk->name);

            // redirect
            Session::flash('message', 'Thể loại da  bị xóa!');
            return Redirect::to('newtypes');
        }
    }


}