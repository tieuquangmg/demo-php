@extends('backend/main')

@section('content')
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{User::Where("status","=",1)->count()}}</div>
                            <div>Thành viên mới !</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <a href="members"><span class="pull-left">Kích hoạt thành viên</span></a>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{count(Inbox::where('view','=',0)->get())}}</div>
                            <div>Tin nhắn chưa dọc!</div>
                        </div>
                    </div>
                </div>
                <a href="{{asset('inboxs')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem tin nhắn</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lịch sử hoạt động
                </div>
            </div>
            <div class="panel-body">
                {{--{{var_dump($log)}}--}}
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hành động</th>
                        <th>Tên Bảng</th>
                        <th>ID thành phần</th>
                        <th>tên thành phần</th>
                        <th>thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($log as $val)
                    <tr>
                        <td>{{$val->id}}</td>
                        <td>{{$val->action}}</td>
                        <td>{{$val->bang}}</td>
                        <td>{{$val->id_ingredient}}</td>
                        <td>{{$val->name_ingredient}}</td>
                        <td>{{Carbon::createFromFormat('Y-m-d H:i:s', $val->datetime)->format('H:i:s d/m/Y')}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <?php echo $log->links(); ?>
            </div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-md-5 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tin nhăn mới
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên</th>
                            <th>số điện thoại</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Inbox::Where('view','=',0)->orderBy('id','desc')->get()->take(25) as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td><a href="{{asset('inboxs/'.$val->id)}}">{{$val->name}}</a></td>
                                <td>{{$val->phone}}</td>
                                <td>{{$val->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    @stop