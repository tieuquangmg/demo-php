@extends('backend.main')

@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('members') }}">Thành viên</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('members') }}">Tất cả thành viên</a></li>
                <li><a href="{{ URL::to('members/create') }}">Thành viên mới</a>
            </ul>
        </nav>
        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa thành viên {{ $member->name }}
            </div>
            <div class="panel-body">
                <div class="col-sm-11">

                </div>
                <div class="col-sm-1">

                </div>
                @if(Session::has('error'))
                    <div class='alert alert-danger'>
                        <ul>
                            <li>{{Session::get('error')}}</li>
                        </ul>
                    </div>
                    {{Session::forget('error')}}
                    @endif
                            <!-- if there are creation errors, they will show here -->
                    {{ HTML::ul($errors->all()) }}
                        <div class="col-md-6">
                            {{ Form::model($member, array('route' => array('members.update', $member->id), 'method' => 'PUT','files' => true)) }}
                            <div class="form-group">
                                {{ Form::label('username', 'Tên đăng nhập') }}
                                {{ Form::text('username',Input::old('username'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password_new', 'Mật khẩu mới') }}
                                {{ Form::text('password_new', Input::old('password_new'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Tên hiển thị') }}
                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('status', 'Trạng thái') }}
                                {{ Form::select('status', array('1' => 'Chưa kich hoat', '2' => 'Đã kích hoạt'), Input::old('status'), array('class' => 'form-control')) }}
                            </div>
                            {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>

            </div>
        </div>
    @stop