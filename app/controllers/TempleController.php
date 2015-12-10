<?php


class TempleController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $temples = Temple::all();
        return View::make('backend.temples.index')->with('temple',$temples);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('backend.temples.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Temple::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {

            return Redirect::to('temples/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $image = Input::file('image');
            $imageName=$image->getClientOriginalName();
            $nameArray=explode('.', $imageName);
            $imageType= end($nameArray);
            $imageRules=array("jpg","jpeg","png");
            $imageSize = $image->getClientSize();
            var_dump($imageSize);
            if(in_array($imageType, $imageRules) && $imageSize < 2048000){
                $imageNewName=  uniqid(rand(), true);
                $imageNewName=md5($imageNewName);
                $imageNewName=  substr($imageNewName, 0, 10);
                $imageNewName.=".".$imageType;
                Input::file('image')->move('uploads/thumbs', $imageNewName);
                $image = Image::make(sprintf('uploads/thumbs/%s', $imageNewName))->fit(212,120)->save();
                // upload hinh anh

                // store
                $temple = new Temple();
                $temple->name       = Input::get('name');
                $temple->adress       = Input::get('adress');
                $temple->image    = $imageNewName;
                $temple->year_built     = Input::get('year_built');
                $temple->architecture     = Input::get('architecture');
                $temple->abbot     = Input::get('abbot');
                $temple->history     = Input::get('history');
                $temple->bots     = Input::get('bots');
                $temple->website     = Input::get('website');
                $temple->phone     = Input::get('phone');
                $temple->email     = Input::get('email');
                $temple->other     = Input::get('other');
                $temple->save();
                Logfile::addData('thêm','Tự viện',$temple->id,$temple->name);
                // redirect
                Session::flash('message', 'Thêm tin mới thành công!');
                return Redirect::to('temples');
            }
            else{
                return Redirect::to('temples/create')
                    ->with('errorImage', "Không đúng định dạng hình ảnh hoặc Kichs thước quá lớn(< 2mb)")
                    ->withInput();
            }
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
        // get the post
        $temple = Temple::find($id);

        // show the view and pass the post to it
        return View::make('backend.temples.show')
            ->with('temple', $temple);
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
        $temple = Temple::find($id);

        // show the edit form and pass the nerd
        return View::make('backend.temples.edit')
            ->with('temple', $temple);
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
        $validator = Validator::make(Input::all(), Temple::$rules_update);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('temples/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $image = Input::file('image');
            var_dump($image);
            if (!is_null($image)) {// nếu có thay doi hinh anh
                $imageName = $image->getClientOriginalName();
                var_dump($imageName);
                $nameArray = explode('.', $imageName);
                $imageType = end($nameArray);
                $imageRules = array("jpg", "jpeg", "png");
                $imageSize = $image->getClientSize();
                if (in_array($imageType, $imageRules) && $imageSize < 2048000) { //neu dung thi tien hanh insert vao csdl
                    $imageNewName = uniqid(rand(), true);
                    $imageNewName = md5($imageNewName);
                    $imageNewName = substr($imageNewName, 0, 10);
                    $imageNewName .= "." . $imageType;
                    Input::file('image')->move('uploads/thumbs', $imageNewName); // upload hinh anh
                    $image = Image::make(sprintf('uploads/thumbs/%s', $imageNewName))->fit(212,120)->save();
                    $old = Temple::find($id)->image;
                    if(file_exists('uploads/thumbs/'.$old))
                        unlink('uploads/thumbs/'.$old);
                    // store
                    $temple = Temple::find($id);;
                    $temple->name       = Input::get('name');
                    $temple->adress       = Input::get('adress');
                    $temple->image    = $imageNewName;
                    $temple->year_built     = Input::get('year_built');
                    $temple->architecture     = Input::get('architecture');
                    $temple->abbot     = Input::get('abbot');
                    $temple->history     = Input::get('history');
                    $temple->bots     = Input::get('bots');
                    $temple->website     = Input::get('website');
                    $temple->phone     = Input::get('phone');
                    $temple->email     = Input::get('email');
                    $temple->other     = Input::get('other');
                    $temple->save();
                    Logfile::addData('thêm','Tự viện',$temple->id,$temple->name);

                    // redirect
                    Session::flash('message', 'Sửa tin thành công!');
                    return Redirect::to('temples');
                }else{
                    return Redirect::to("temples/{$id}/edit")
                        ->with('errorImage', "Không đúng định dạng hình ảnh hoặc kích thước quá lớn (<2MB)")
                        ->withInput();
                }
            }else{
                // store
                $temple = Temple::find($id);
                $temple->name       = Input::get('name');
                $temple->adress       = Input::get('adress');

                $temple->year_built     = Input::get('year_built');
                $temple->architecture     = Input::get('architecture');
                $temple->abbot     = Input::get('abbot');
                $temple->history     = Input::get('history');
                $temple->bots     = Input::get('bots');
                $temple->website     = Input::get('website');
                $temple->phone     = Input::get('phone');
                $temple->email     = Input::get('email');
                $temple->other     = Input::get('other');
                $temple->save();
                Logfile::addData('thêm','Tự viện',$temple->id,$temple->name);


                // redirect
                Session::flash('message', 'Sửa tin thành công!');
                return Redirect::to('temples');
            }
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
        $temple = Temple::find($id);
        $temple->delete();
        Logfile::addData('Xóa','Tự viện',$temple->id,$temple->name);

        if(file_exists('uploads/thumbs/'.$temple->image)){
            unlink('uploads/thumbs/'.$temple->image);
        }
        // redirect
        Session::flash('message', 'Tin Đã bị xóa!');
        return Redirect::to('temples');
    }


}
