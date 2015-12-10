@extends('frontend.main')
@section('content')
    <div class="container main">
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <div class="baner">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 content_waper">
                <div class="col-xs-9">
                    <div class="row">
                        <h3 class="title">Đăng nhập</h3>
                        <div class="content contact_form">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            {{ HTML::ul($errors->all()) }}

                                <form method="post" action="{{Asset('users/login')}}" id="form-login">
                                    @if(Session::has("register_success"))
                                        {{Session::get("register_success")}}
                                        <?php Session::forget("register_success")?>
                                        <?php // xóa session đăng ký?>
                                    @endif

                                    <h3>Đăng nhập</h3>
                                        <label>Tên Đăng nhập</label>
                                    <input type="text" name="user_input" id="user_input" placeholder="Username or email" value="admin" class="form-control"/>
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" id="password" placeholder="Password" value="admin" class="form-control"/>
                                    @if(isset($error_message))
                                        <label class="error">{{$error_message}}</label>
                                    @endif
                                    <?php // thông báo lỗi đăng nhập?>
                                    <p> Bạn chưa có tài khoản hãy <a href="{{Asset('users/register')}}">Đăng ký</a></p>
                                    <button class="btn btn-lg btn-primary btn-block">Đăng nhập</btn>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="cots_right">
                        @foreach(Post::menu() as $key=>$val1)
                            <div class="box_right">
                                <h2 class="title">{{$val1['name']}}</h2>
                                <div class="cont">
                                    <ul>
                                        @foreach($val1['val'] as $key2=>$val2)
                                            <li><a href="{{asset('users/tin/'.$val2->id).'/'.$val2->title}}">{{$val2->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <div class="baner">
                </div>
            </div>
        </div>
    </div>
@endsection