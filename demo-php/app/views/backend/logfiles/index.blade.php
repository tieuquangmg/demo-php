@extends('backend.main')

@section('content')
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('logfiles') }}">Log admin</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('logfiles') }}">Tất cả Log admin</a></li>
        </ul>
    </nav>
    <div class="panel panel-default">
        <div class="panel-heading">
            Log admin
        </div>
        <div class="panel-body">
            <div class="col-sm-10">

            </div>
            <div class="col-sm-2">
                <a class="btn btn-danger" href="{{asset('logfiles/delete')}}">Xóa tất cả</a>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
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
@stop