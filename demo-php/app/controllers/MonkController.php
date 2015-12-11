<?php


class MonkController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $monks = Monk::all();
        return View::make('backend.monks.index')->with('monk',$monks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.monks.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(Input::all(), Monk::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            var_dump(Input::all());
            return Redirect::to('monks/create')
               ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $image = Input::file('image');
            if (!is_null($image)) {
                $image = Input::file('image');
                $imageName = $image->getClientOriginalName();
                $nameArray = explode('.', $imageName);
                $imageType = end($nameArray);
                $imageRules = array("jpg", "jpeg", "png");
                $imageSize = $image->getClientSize();
                var_dump($imageSize);
                if (in_array($imageType, $imageRules) && $imageSize < 2048000) {
                    $imageNewName = uniqid(rand(), true);
                    $imageNewName = md5($imageNewName);
                    $imageNewName = substr($imageNewName, 0, 10);
                    $imageNewName .= "." . $imageType;
                    Input::file('image')->move('uploads/thumbs', $imageNewName);
                    var_dump($imageSize);
                    $image = Image::make(sprintf('uploads/thumbs/%s', $imageNewName))->fit(150, 200)->save();
                    // upload hinh anh
                    var_dump($imageSize);
                    // store
                    $post = new Monk();
                    $post->the_danh = Input::get('the_danh');
                    $post->phap_danh = Input::get('phap_danh');
                    $post->image = $imageNewName;
                    $post->birthday = Input::get('birthday');
                    $post->cmt = Input::get('cmt');
                    $post->birthplace = Input::get('birthplace');
                    $post->address = Input::get('address');
                    $post->dad_name = Input::get('dad_name');
                    $post->dad_birthday = Input::get('dad_birthday');
                    $post->dad_dead = Input::get('dad_dead');
                    $post->mother_name = Input::get('mother_name');
                    $post->mother_birthday = Input::get('mother_birthday');
                    $post->mother_dead = Input::get('mother_dead');
                    $post->ordained = Input::get('ordained');
                    if(Input::get('check_first_temple') == null){
                        $post->first_temple_other = Input::get('first_temple_other');
                        $post->first_temple = null;
                    }else{
                        $post->check_first_temple = Input::get('check_first_temple');
                        $post->first_temple = Input::get('first_temple');
                        $post->first_temple_other =  null;
                    }
                    if(Input::get('check_position') == null){
                        $post->position_other = Input::get('position_other');
                        $post->position = null;
                    }else{
                        $post->check_position = Input::get('check_position');
                        $post->position = Input::get('position');
                        $post->position_other =  null;
                    }
                    $post->education = Input::get('education');
                    if(Input::get('check_temple_other') == null){
                        $post->last_temple_other = Input::get('last_temple_other');
                        $post->last_temple = null;
                    }else{
                        $post->check_temple_other = Input::get('check_temple_other');
                        $post->last_temple = Input::get('last_temple');
                        $post->last_temple_other =  null;
                    }
                    $post->adress = Input::get('adress');
                    $post->phone = Input::get('phone');
                    $post->email = Input::get('email');
                    $post->other_information = Input::get('other_information');
                    $post->save();
                    Logfile::addData('thêm','Tăng Ni',$post->id,$post->phap_danh);
                    // redirect
                    Session::flash('message', 'Thêm mới thành công!');
                    return Redirect::to('monks');
                } else {
                    return Redirect::to('monks/create')
                        ->with('errorImage', "Không đúng định dạng hình ảnh hoặc kích thước quá lớn(< 2mb)")
                        ->withInput();
                }
            }else{
                $post = new Monk();
                $post->the_danh = Input::get('the_danh');
                $post->phap_danh = Input::get('phap_danh');
                $post->image = 'no_avatar.png';
                $post->birthday = Input::get('birthday');
                $post->cmt = Input::get('cmt');
                $post->birthplace = Input::get('birthplace');
                $post->address = Input::get('address');
                $post->dad_name = Input::get('dad_name');
                $post->dad_birthday = Input::get('dad_birthday');
                $post->dad_dead = Input::get('dad_dead');
                $post->mother_name = Input::get('mother_name');
                $post->mother_birthday = Input::get('mother_birthday');
                $post->mother_dead = Input::get('mother_dead');
                $post->ordained = Input::get('ordained');
                if(Input::get('check_first_temple') == null){
                    $post->first_temple_other = Input::get('first_temple_other');
                    $post->first_temple = null;
                }else{
                    $post->check_first_temple = Input::get('check_first_temple');
                    $post->first_temple = Input::get('first_temple');
                    $post->first_temple_other =  null;
                }
                if(Input::get('check_position') == null){
                    $post->position_other = Input::get('position_other');
                    $post->position = null;
                }else{
                    $post->check_position = Input::get('check_position');
                    $post->position = Input::get('position');
                    $post->position_other =  null;
                }
                $post->education = Input::get('education');
                if(Input::get('check_temple_other') == null){
                    $post->last_temple_other = Input::get('last_temple_other');
                    $post->last_temple = null;
                }else{
                    $post->check_temple_other = Input::get('check_temple_other');
                    $post->last_temple = Input::get('last_temple');
                    $post->last_temple_other =  null;
                }
                $post->adress = Input::get('adress');
                $post->phone = Input::get('phone');
                $post->email = Input::get('email');
                $post->other_information = Input::get('other_information');
                $post->save();
                Logfile::addData('thêm','Tăng Ni',$post->id,$post->phap_danh);
                // redirect
                Session::flash('message', 'Thêm mới thành công!');
                return Redirect::to('monks');
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
        $Monk = Monk::find($id);

        // show the view and pass the post to it
        return View::make('backend.monks.show')
            ->with('monk', $Monk);
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
        $monk = Monk::find($id);

        // show the edit form and pass the nerd
        return View::make('backend.monks.edit')
            ->with('monk', $monk);
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
        $validator = Validator::make(Input::all(), Monk::$rules_update);
        //var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('monks/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $image = Input::file('image');
            //var_dump($image);
            if (!is_null($image)) {// nếu có thay doi hinh anh
                $imageName = $image->getClientOriginalName();
                //var_dump($imageName);
                $nameArray = explode('.', $imageName);
                $imageType = end($nameArray);
                $imageRules = array("jpg", "jpeg", "png");
                $imageSize = $image->getClientSize();
                if (in_array($imageType, $imageRules) &&  $imageSize < 4048000) { //neu dung thi tien hanh insert vao csdl
                    $imageNewName = uniqid(rand(), true);
                    $imageNewName = md5($imageNewName);
                    $imageNewName = substr($imageNewName, 0, 10);
                    $imageNewName .= "." . $imageType;
                    Input::file('image')->move('uploads/thumbs', $imageNewName); // upload hinh anh
                    var_dump('dfdf');
                    Image::make('uploads/thumbs/'.$imageNewName)->fit(150,200)->save();
                    var_dump('dfdf');

                    $old = Monk::find($id)->image;
                    if(file_exists('uploads/thumbs/'.$old))
                    unlink('uploads/thumbs/'.$old);
                    // store
                    $post = Monk::find($id);;
                    $post->the_danh       = Input::get('the_danh');
                    $post->phap_danh       = Input::get('phap_danh');
                    $post->image    = $imageNewName;
                    $post->birthday     = Input::get('birthday');
                    $post->cmt     = Input::get('cmt');
                    $post->birthplace     = Input::get('birthplace');
                    $post->address     = Input::get('address');
                    $post->dad_name     = Input::get('dad_name');
                    $post->dad_birthday     = Input::get('dad_birthday');
                    $post->dad_dead     = Input::get('dad_dead');
                    $post->mother_name     = Input::get('mother_name');
                    $post->mother_birthday     = Input::get('mother_birthday');
                    $post->mother_dead     = Input::get('mother_dead');
                    $post->ordained     = Input::get('ordained');
                    if(Input::get('check_first_temple') == null){
                        $post->first_temple_other = Input::get('first_temple_other');
                        $post->first_temple = null;
                        $post->check_first_temple = Input::get('check_first_temple');
                    }else{
                        $post->check_first_temple = Input::get('check_first_temple');
                        $post->first_temple = Input::get('first_temple');
                        $post->first_temple_other =  null;
                    }
                    if(Input::get('check_position') == null){
                        $post->check_position = Input::get('check_position');
                        $post->position_other = Input::get('position_other');
                        $post->position = null;
                    }else{
                        $post->check_position = Input::get('check_position');
                        $post->position = Input::get('position');
                        $post->position_other =  null;
                    }
                    $post->education = Input::get('education');
                    if(Input::get('check_temple_other') == null){
                        $post->check_temple_other = Input::get('check_temple_other');
                        $post->last_temple_other = Input::get('last_temple_other');
                        $post->last_temple = null;
                    }else{
                        $post->check_temple_other = Input::get('check_temple_other');
                        $post->last_temple = Input::get('last_temple');
                        $post->last_temple_other =  null;
                    }
                    $post->adress     = Input::get('adress');
                    $post->phone     = Input::get('phone');
                    $post->email     = Input::get('email');
                    $post->other_information     = Input::get('other_information');
                    $post->save();
                    Logfile::addData('Sửa','Tăng Ni',$post->id,$post->phap_danh);

                    // redirect
                    Session::flash('message', 'Sửa tin thành công!');
                    return Redirect::to('monks');
                }else{
                    return Redirect::to("monks/{$id}/edit")
                        ->with('errorImage', "Không đúng định dạng hình ảnh")
                        ->withInput();
                }
            }else{
                var_dump(Input::all());
                // store
                $post = Monk::find($id);
                $post->the_danh       = Input::get('the_danh');
                $post->phap_danh       = Input::get('phap_danh');

                $post->birthday     = Input::get('birthday');
                $post->cmt     = Input::get('cmt');
                $post->birthplace     = Input::get('birthplace');
                $post->address     = Input::get('address');
                $post->dad_name     = Input::get('dad_name');
                $post->dad_birthday     = Input::get('dad_birthday');
                $post->dad_dead      = Input::get('dad_dead');
                $post->mother_name     = Input::get('mother_name');
                $post->mother_birthday     = Input::get('mother_birthday');
                $post->mother_dead    = Input::get('mother_dead');
                $post->ordained     = Input::get('ordained');
                if(Input::get('check_first_temple') == null){
                    $post->check_first_temple = Input::get('check_first_temple');
                    $post->first_temple_other = Input::get('first_temple_other');
                    $post->first_temple = null;
                }else{
                    $post->check_first_temple = Input::get('check_first_temple');
                    $post->first_temple = Input::get('first_temple');
                    $post->first_temple_other =  null;
                }
                if(Input::get('check_position') == null){
                    $post->check_position = Input::get('check_position');
                    $post->position_other = Input::get('position_other');
                    $post->position = null;
                }else{
                    $post->check_position = Input::get('check_position');
                    $post->position = Input::get('position');
                    $post->position_other =  null;
                }
                $post->education = Input::get('education');
                if(Input::get('check_temple_other') == null){
                    $post->check_temple_other = Input::get('check_temple_other');
                    $post->last_temple_other = Input::get('last_temple_other');
                    $post->last_temple = null;
                }else{
                    $post->check_temple_other = Input::get('check_temple_other');
                    $post->last_temple = Input::get('last_temple');
                    $post->last_temple_other =  null;
                }
                $post->adress     = Input::get('adress');
                $post->phone     = Input::get('phone');
                $post->email     = Input::get('email');
                $post->other_information     = Input::get('other_information');
                $post->save();
                Logfile::addData('Sửa','Tăng Ni',$post->id,$post->phap_danh);


                // redirect
                Session::flash('message', 'Sửa tin thành công!');
                return Redirect::to('monks');
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
        $monk = Monk::find($id);
        $monk->delete();
        Logfile::addData('Xóa','Tăng Ni',$monk->id,$monk->phap_danh);

        if(file_exists('uploads/'.$monk->image)){
            unlink('uploads/'.$monk->image);
        }
        // redirect
        Session::flash('message', ' Đã bị xóa!');
        return Redirect::to('monks');
	}


}
