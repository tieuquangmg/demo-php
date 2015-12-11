@extends('backend.main')
    @section('content')
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('positions') }}">nghiệp sư</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('positions') }}">Tất cả nghiệp sư</a></li>
                    <li><a href="{{ URL::to('positions/create') }}">Thêm nghiệp sư mới</a>
                </ul>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thêm nghiệp sư
                </div>
                <div class="panel-body">
                    <div class="col-sm-10">

                    </div>
                    <div class="col-sm-2">

                    </div>

                </div>
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

            {{ Form::open(array('url' => 'positions', 'files' => true)) }}

            <div class="form-group">
                {{ Form::label('name', 'Tên') }}
                {{ Form::text('name',Input::old('name'), array('class' => 'form-control')) }}
            </div>
                {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    @stop
