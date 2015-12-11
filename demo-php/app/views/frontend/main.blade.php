<html>
<head>
    <title>
        Tùng Lâm Hương Tích
    </title>
    <link href="{{asset('themes/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    {{--<link href="{{asset('themes/bootstrap/css/bootstrap-theme.min.css')}}" type="text/css" rel="stylesheet">--}}
    <link href="{{asset('themes/css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('themes/css/colorbox.css')}}" type="text/css" rel="stylesheet">

    <script type="text/javascript" src="{{asset('themes/js/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('themes/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('themes/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('themes/js/messages_vi.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('themes/js/jquery.colorbox.js')}}"></script>
</head>
<body>
<div class="header" style="background: #5F1C1F url({{asset('themes/images/img/bg_head.jpg')}})repeat center top">
    <div class="container" style="margin-bottom: 9px">
        <div class="col-sm-12 col-xs-12">
            <div class="user">
                <ul>
                    @if(@Session::get('logined'))
                        @if(@Session::get('role') == 2)<li><a href="{{asset('admin')}}">Quản lý</a></li>@else
                        <li>{{User::find(Session::get('id_taikhoan'))->first()->name}}</li>
                        @endif
                        <li><a href="{{asset("users/logout")}}">Thoát</a></li>
                    @else
                        <li><a href="{{asset("users/login")}}">Đăng nhập</a></li>
                        <li><a href="{{asset("users/register")}}">Đăng ký</a></li>
                    @endif
                    <li class="glyphicon glyphicon-asterisk"></li>
                    <li>Tiếng Việt</li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="brand">
        <div class="logo">
            {{--<img src="{{asset('themes/images/img/logo.png')}}">--}}
        </div>Tùng Lâm Hương Tích</div>
    <div class="address-bar">Hương Sơn - Mỹ Đức - Hà Nội</div>

    <div class="container">
    <nav class="" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="col-sm-3">
                    <div class="logo1">
                        <img src="{{asset('themes/images/img/phatba.png')}}">
                    </div>
                </div>
                <div class="col-sm-9 menu">
                    <nav>
                        <ul>
                            <li><a href="{{asset('/')}}">Trang Chủ</a></li>
                            <li><a href="{{asset('users/tin-tuc/all')}}">Tin Tức</a>
                                <ul>
                                    @foreach(Newtypes::all() as $val)
                                        <li><a href="{{asset('users/tin-tuc/'.$val->id)}}">{{$val->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Tra Cứu Dữ Liệu</a>
                                <ul>
                                    <li><a href="{{asset('users/tang-ni')}}">Tra cứu Tăng Ni</a></li>
                                    <li><a href="{{asset('users/tu-vien/all')}}">Tra cứu Tự Viện</a></li>
                                </ul>
                            </li>
                            <li><a href="{{asset('/users/albums')}}">Ảnh</a></li>
                        @foreach(Page::all() as $val)
                                <li><a href="{{asset('users/page/'.$val->id.'/'.$val->name)}}">{{$val->name}}</a></li>
                            @endforeach
                            <li><a href="{{asset('/users/lien-he')}}">Liên hệ</a></li>
                        </ul>
                    </nav>

                </div>
            <!-- /.navbar-collapse -->

        <!-- /.container -->
    </nav>
    </div>
</div>
    @yield('content')
<footer>
    <div class="container footer">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4>Tùng Lâm Hương Tích<h4>
                <h5>Hương Sơn - Mỹ Đức - Hà Nội</h5>
                <p>Copyright &copy; Your Website 2015</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
