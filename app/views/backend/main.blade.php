<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        Trang quản lý
    </title>
    <link href="{{asset('themes/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">

    {{--<link href="{{asset('themes/bootstrap/css/bootstrap-theme.min.css')}}" type="text/css" rel="stylesheet">--}}

    <!-- MetisMenu CSS -->
    <link href="{{asset('bower_components/metisMenu/dist/metisMenu.min.css')}}" type="text/css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" type="text/css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('bower_components/datatables-responsive/css/dataTables.responsive.css')}}" type="text/css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/sb-admin-2.css')}}" type="text/css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('themes/css/styleadmin.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('themes/js/jquery-2.1.4.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('themes/js/jquery.validate.min.js')}}"></script>

    {{--<script type="text/javascript" src="{{asset('themes/js/jquery-1.4.4.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('themes/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{asset('/')}}">Trang chủ</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>{{Session::get('name')}}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>Thông tin cá nhân</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{asset('users/logout')}}"><i class="fa fa-sign-out fa-fw"></i>Thoát</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{{asset("admin")}}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ Admin</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Tăng Ni<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{asset("monks")}}">Tất cả Tăng Ni</a>
                            </li>
                            <li>
                                <a href="{{asset("positions")}}">Tất cả Nghiệp sư</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{asset("temples")}}"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý Tự viện</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý Tin Tức<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{asset("posts")}}">Tất cả Tin Tức</a>
                            </li>
                            <li>
                                <a href="{{asset("newtypes")}}">Tất cả loai tin</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{asset("members")}}"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý Thành viên</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{asset('pages')}}"><i class="fa fa-dashboard fa-fw"></i>Page</a>
                    </li>
                    <li>
                        <a href="{{asset('inboxs')}}"><i class="fa fa-dashboard fa-fw"></i>Tin nhắn</a>
                    </li>
                    <li>
                        <a href="{{asset('albums')}}"><i class="fa fa-dashboard fa-fw"></i>Album ảnh</a>
                    </li>
                    <li>
                        <a href="{{asset('logfiles')}}"><i class="fa fa-dashboard fa-fw"></i>Logs</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        @yield('content')
    </div>
    <!-- /#page-wrapper -->
</div>





{{--<div class="header">--}}

    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--<nav class="navbar navbar-default">--}}
            {{--</nav>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@yield('header')--}}
{{--</div>--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-lg-2" style="height: 100%; background-color: #2b669a" >--}}
            {{--<ul class="list-group">--}}
                {{--<li  class="list-group-item"><a href="{{asset('monks')}}">Sư</a></li>--}}
                {{--<li  class="list-group-item"><a href="{{asset('temples')}}">Chùa</a></li>--}}
                {{--<li  class="list-group-item"><a href="{{asset('members')}}">Thành viên</a></li>--}}
                {{--<li  class="list-group-item"><a href="{{asset('posts')}}">Tin tức</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="col-lg-10">--}}
            {{--@yield('content')--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="footer">--}}
    {{--@yield('footer')--}}
{{--</div>--}}

<script type="text/javascript" src="{{asset('bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" src="{{asset('bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('bower_components/datatables-plugins/filtering/type-based/accent-neutralise.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('bower_components/datatables-plugins/filtering/type-based/html.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('bower_components/datatables-plugins/filtering/phoneNumber.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/js/jquery.dataTables.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('themes/js/jj.js')}}"></script>

<script type="text/javascript" src="{{asset('dist/js/sb-admin-2.js')}}"></script>
</body>
</html>