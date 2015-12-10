<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/11/2015
 * Time: 7:16 PM
 */
class UserController extends \BaseController
{

    public function getRegister()
    {
        if (Session::has("logined"))
            return Redirect::to('/');
        return View::make('frontend.users.register');
    }

    public function postRegister()
    {
        var_dump(Input::all());
        $rules = array(
            "username" => "required|min:3|max:25",
            "password" => "required|min:6|max:25",
            "email" => "required|email",
            "name" => "required|max:25"
        );

        if (!Validator::make(Input::all(), $rules)->fails()) {
            if (User::check_username(Input::get("username")) && User::check_email(Input::get("email"))) {
                var_dump('fsdfsdfsdfsd');
                $user = new User();
                $user->username = Input::get("username");
                $user->password = md5(sha1(Input::get("password")));
                $user->email = Input::get("email");
                $user->name = Input::get("name");
                $user->save();
                Logfile::addData('Đăng ký','Thành viện',$user->id,$user->name);

                User::find($user->id)->roles()->attach(1);
                Session::put("logined", "true");
                Session::put('name', $user->name);
                Session::put('id_taikhoan', $user->id);
                Session::put("register_success", Input::get('username') . " đã đăng ký thành công");
                return Redirect::to("/");
            }
        }
        var_dump(Input::all());
    }

    public function getLogin()
    {
        if (Session::has("logined"))
            return Redirect::to('/');
        return View::make('frontend.users.login');
    }

    public function postLogin()
    {
        if (User::check_login(Input::get("user_input"), md5(sha1(Input::get("password"))))) {
            //Đăng nhập thành công
            Session::put("logined", "true");

            //$role = Userrole::Where("user_id","=",Session::get('id_taikhoan'))->get()->first();
            $role = User::find(Session::get('id_taikhoan'))->roles()->first();
            var_dump($role->id);
            Session::put("role", $role->id);
            //Tạo session login
            if ($role->id == 2)
                return Redirect::to("admin");
            else
                return Redirect::to("/");
        } else return View::make("frontend.users.login")->with("error_message", "Tên đăng nhập hoặc mật khẩu không đúng");
        //Thông báo lõi
    }

    public function getLogout()
    {
        Session::forget("logined");
        Session::forget("role");
        //Xóa session đăng nhập
        return Redirect::to("/");
    }

//    public function getEditProfile()
//    {
//        if (!Session::has("logined"))
//            return Redirect::to("users/login");
//        return View::make("frontend/users/edit-profile");
//    }

    public function getTinTuc($category)
    {
        if (@$category == null || @$category == 'all') {
            $new = Post::Paginate(10);
            $type = "mới nhất";
        } else {
            $new = Post::where('category', '=', $category)->paginate(1);
            $new->setBaseUrl($category);
            $type = Newtypes::find($category)->name;
        }
        return View::make("frontend/posts/index")->with('posts', $new)->with('category', $type);
    }

    public function getTin($id, $name)
    {
        $new = Post::find($id);
        return View::make('frontend/posts/show')->with('post', $new);
    }

    public function getTangNi()
    {
        if(Session::get('logined') == true) {
            $mang = $_GET;
            $monks = Monk::where(function ($a) use ($mang) {
                if ($_GET != null) {
                    if ($_GET['temple'] != null) {
                        $a->where('last_temple', '=', $mang['temple']);
                    }
                    if ($_GET['position'] != null) {
                        $a->where('position', '=', $mang['position']);
                    }
                    if ($_GET['key'] != null && $_GET['type'] != null) {
                        $a->where($mang['type'], 'like', '%' . $mang['key'] . '%');
                    }
                }
            })->paginate(10);
            return View::make("frontend/monk/index")->with('monks', $monks);
        }else{
            return View::make("frontend/users/login");
        }
    }

    public function getTuVien($var)
    {
        if(Session::get('logined') == true) {
        $temples = Temple::paginate(10);
        return View::make('frontend/temples/index')->with('temples', $temples);
        }else{
            return View::make("frontend/users/login");
        }
    }

    public function getViewTuVien($id, $name){
    if(Session::get('logined') == true) {
        $temple = Temple::find($id);
        return View::make('frontend/temples/show')->with('temple', $temple);
    }else{
        return View::make("frontend/users/login");
        }
    }
    public function getPage($id, $name)
    {
        $page = Page::find($id);
        return View::make('frontend/pages/show')->with('page', $page);
    }

    public function getLienHe()
    {
        return View::make('frontend/contact/edit');
    }

    public function postLienHe(){
        $validator = Validator::make(Input::all(), Inbox::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()){
            return Redirect::to('users/lien-he')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            $inbox = new Inbox();
            $inbox->name  = Input::get('name');
            $inbox->phone  = Input::get('phone');
            $inbox->content  = Input::get('content');
            $inbox->save();
            Logfile::addData('Gửi','Tin nhắn',$inbox->id,$inbox->name);

            // redirect
            Session::flash('message', 'Gửi Tin nhắn thành công!');
            return Redirect::to('users/lien-he');
        }
    }
    public function getAlbums(){
        return View::make('frontend/albums/index');
    }
}