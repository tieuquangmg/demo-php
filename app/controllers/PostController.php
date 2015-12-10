<?php


class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = Post::all();
        return View::make('backend.posts.index')->with('post',$posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(Input::all(), Post::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {

            return Redirect::to('posts/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $image = Input::file('thumb');
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
            Input::file('thumb')->move('uploads/thumbs', $imageNewName);
            $image = Image::make(sprintf('uploads/thumbs/%s', $imageNewName))->fit(212,120)->save();
            // upload hinh anh

            // store
            $post = new Post;
            $post->title       = Input::get('title');
            $post->thumb       = $imageNewName;
            $post->decription    = Input::get('decription');
            $post->category    = Input::get('category');
            $post->content     = Input::get('content');
            $post->save();
            Logfile::addData('thêm','Tin tức',$post->id,$post->title);
            // redirect
            Session::flash('message', 'Thêm tin mới thành công!');
            return Redirect::to('posts');
        }
            else{
                return Redirect::to('posts/create')
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
        $Post = Post::find($id);

        // show the view and pass the post to it
        return View::make('backend.posts.show')
            ->with('post', $Post);
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
        $post = Post::find($id);

        // show the edit form and pass the nerd
        return View::make('backend.posts.edit')
            ->with('post', $post);
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
        $validator = Validator::make(Input::all(), Post::$rules_update);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('posts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $image = Input::file('thumb');
            var_dump($image);
            if (!is_null($image)) {// nếu có thay doi hinh anh
                $imageName = $image->getClientOriginalName();
                var_dump($imageName);
                $nameArray = explode('.', $imageName);
                $imageType = end($nameArray);
                $imageRules = array("jpg", "jpeg", "png");
                $imageSize = $image->getClientSize();
                if (in_array($imageType, $imageRules)  && $imageSize < 2048000) { //neu dung thi tien hanh insert vao csdl
                    $imageNewName = uniqid(rand(), true);
                    $imageNewName = md5($imageNewName);
                    $imageNewName = substr($imageNewName, 0, 10);
                    $imageNewName .= "." . $imageType;
                    Input::file('thumb')->move('uploads/thumbs', $imageNewName); // upload hinh anh
                    $image = Image::make(sprintf('uploads/thumbs/%s', $imageNewName))->fit(212,120)->save();
                    $old = Post::find($id)->thumb;
                    if(file_exists('uploads/'.$old))
                    unlink('uploads/'.$old);
                    // store
                    $post = Post::find($id);
                    $post->title = Input::get('title');
                    $post->thumb = $imageNewName;
                    $post->decription = Input::get('decription');
                    $post->category = Input::get('category');
                    $post->content = Input::get('content');
                    $post->save();
                    Logfile::addData('Sửa','Tin tức',$post->id,$post->title);

                    // redirect
                    Session::flash('message', 'Sửa tin thành công!');
                    return Redirect::to('posts');
                }else{
                    return Redirect::to("posts/{$id}/edit")
                        ->with('errorImage', "Không đúng định dạng hình ảnh")
                        ->withInput();
                }
            }else{
                // store
                $post = Post::find($id);
                $post->title = Input::get('title');

                $post->decription = Input::get('decription');
                $post->category = Input::get('category');
                $post->content = Input::get('content');
                $post->save();
                Logfile::addData('Sửa','Tin tức',$post->id,$post->title);
                // redirect
                Session::flash('message', 'Sửa tin thành công!');
                return Redirect::to('posts');
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
        $post = Post::find($id);
        $post->delete();
        Logfile::addData('Xóa','Tin tức',$post->id,$post->title);
        if(file_exists('uploads/'.$post->thumb)){
            unlink('uploads/'.$post->thumb);
        }
        // redirect
        Session::flash('message', 'Tin Đã bị xóa!');
        return Redirect::to('posts');
	}


}
