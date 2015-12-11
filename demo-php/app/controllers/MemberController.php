<?php


class MemberController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //var_dump("quang");

        $members = Member::all();
       //var_dump($members);
        return View::make('backend.members.index')->with('members',$members);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Responsef81a482d8069a749bd141a2efa68de7d
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Member::$rules);
        var_dump(Input::all());
        // process the login
        if ($validator->fails()) {

            return Redirect::to('members/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            if(User::check_username(Input::get("username")) && User::check_email(Input::get("email"))){
                $member = new Member();
                $member->username       = Input::get('username');
                $member->password       = md5(sha1(Input::get("password")));
                $member->name    = Input::get('name');
                $member->email     = Input::get('email');
                $member->status     = 1;
                $member->save();
                //log
                Logfile::addData('thêm','thành viên',$member->id,$member->name);

                User::find($member->id)->roles()->attach(1);
                // redirect
                Session::flash('message', 'Thêm thanh vien mới thành công!');
                return Redirect::to('members');
            }
            else{
                Session::flash('message', 'ten dang nhap hoac email da ton tai');
                return Redirect::to('members/create')
                    ->with('error','ten dang nhap hoac email da ton tai')
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
        $member = Member::find($id);

        // show the view and pass the post to it
        return View::make('backend.members.show')
            ->with('member', $member);
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
        $member = Member::find($id);

        // show the edit form and pass the nerd
        return View::make('backend.members.edit')
            ->with('member', $member);
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
        $validator = Validator::make(Input::all(), Member::$rules_update);
        //var_dump(Input::all());
        // process the login
        if ($validator->fails()) {
            return Redirect::to('members/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            var_dump(Input::all());
                $member =Member::find($id);
                if($member->username != Input::get('username')) {
                    if (User::check_username(Input::get("username"))) {
                        $member->username = Input::get('username');
                    } else {
                        return Redirect::to("members/{$id}/edit")
                            ->with('error', 'ten dang nhap da ton tai')
                            ->withInput();
                    }
                }
                if(Input::get('password_new') != null){
                    $member->password       = md5(sha1(Input::get("password_new")));
                }
                $member->name    = Input::get('name');
                if($member->email != Input::get('email')) {
                    if (User::check_email(Input::get("email"))) {
                        $member->email = Input::get('email');
                    } else {
                        return Redirect::to("members/{$id}/edit")
                            ->with('error', 'Email da ton tai')
                            ->withInput();
                    }
                }
                $member->status  = Input::get('status');;
            $member->save();
            Logfile::addData('sửa','thành viên',$member->id,$member->name);

            // redirect
                Session::flash('message', 'sua thanh vien  thành công!');
                return Redirect::to('members');

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
        If(User::find($id)->roles()->first()->id == 1){
            User::find($id)->roles()->detach(1);
            $member = Member::find($id);
            $member->delete();
            Logfile::addData('Xóa','thành viên',$member->id,$member->name);
            Session::flash('message', 'Thanh vien dã bị xóa!');
            return Redirect::to('members');
        }else{
            Session::flash('message', 'Không được xóa Admin!');
            return Redirect::to('members');
        }
        // redirect
    }
    public function active($type,$id){
        if($type == 'true'){
        Member::Where('status','=',1)->update(array('status' => 2));
            return Redirect::to('members');
        }
        if($type == 'false'){
            foreach(User::Where('status','=',1)->get() as $val){
                User::find($val->id)->roles()->detach(1);
            }
            User::Where('status','=',1)->delete();
            return Redirect::to('members');
        }
        if($type == 'one'){
            $member = Member::find($id);
            $member->status = 2;
            $member->save();
            Logfile::addData('Kích hoạt','thành viên',$member->id,$member->name);
            return Redirect::to('members');
        }
    }
}
