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
                        <h3 class="title">Liên Hệ</h3>
                        <div class="content contact_form">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            {{ HTML::ul($errors->all()) }}
                                <form method="post" action="{{Asset('users/register')}}" id="form-register">
                                    <h3>Đăng ký</h3>
                                    <label>Tên Đăng nhập</label>
                                    <input type="text" name="username" id="username" placeholder="Username" class="form-control"/>
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-password" class="form-control"/>
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control"/>
                                    <label>Tên Thật</label>
                                    <input type="text" name="name" id="name" placeholder="Tên Thật" class="form-control"/>
                                    <label></label>
                                    <button class="btn btn-lg btn-primary btn-block">Đăng kí</button>
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
    <script type="text/javascript">
        $("#form-register").validate({
            rules:{
                username:{
                    required:true,
                    minlength:3
                },
                password:{
                    required:true,
                    minlength:6
                },
                password_confirmation:{
                    equalTo:"#password"
                },
                email:{
                    required:true,
                    email:true,
                    remote:{
                        url:"{{Asset('check/check-email')}}",
                        type:"POST"
                    }
                }
            },
            messages:{
                username:{
                    required:"Vui lòng username",
                    minlength:"Phải nhập 3 kí tự trở lên",
                    remote:"Username đã tồn tại"
                },
                password:{
                    required:"Vui lòng nhập mật khẩu",
                    minlength:"Mật khẩu phải 6 kí tự trở lên",
                },
                password_confirmation:{
                    equalTo:"Mật khẩu xác nhận không đúng"
                },
                email:{
                    required:"Vui lòng nhập email",
                    email:"Không dúng định dạng email",
                    remote:"Email này đã tồn tại"
                }
            }
        })
    </script>
@endsection