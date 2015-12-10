<?php


class PositionsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $positions = Position::all();
        return View::make('backend.positions.index')->with('positions',$positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('backend.positions.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Position::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('positions/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
                $position = new Position();
                $position->name       = Input::get('name');
                $position->save();
            Logfile::addData('thêm','Ngiệp sư',$position->id,$position->name );

            // redirect
                Session::flash('message', 'Thêm tin mới thành công!');
                return Redirect::to('positions');
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
        $position = Position::find($id);
        // show the edit form and pass the nerd
        return View::make('backend.positions.edit')
            ->with('position', $position);
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
                    $post = Position::find($id);;
                    $post->name = Input::get('name');
                    $post->save();
            Logfile::addData('Sửa','Ngiệp sư',$post->id,$post->name );

            // redirect
                    Session::flash('message', 'Sửa tin thành công!');
                    return Redirect::to('positions');
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
//        $aa = Monk::Where('position','=',3)->get();
//        var_dump(count($aa));
//        var_dump(count(Monk::Where('position','=',$id)->get()));
        if(count(Monk::Where('position','=',$id)->get()) > 0){
            Session::flash('message', 'Không thể xóa vì có Tăng Ni thuộc Position này!');
            return Redirect::to('positions');
        }else{
            $monk = Position::find($id);
            $monk->delete();
            Logfile::addData('Xóa','Ngiệp sư',$monk->id,$monk->name );
            Session::flash('message', 'positions da  bị xóa!');
            return Redirect::to('positions');
        }
    }

}