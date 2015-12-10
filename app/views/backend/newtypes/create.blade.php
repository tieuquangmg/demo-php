@extends('backend.main')
    @section('content')
        <div class="container">

            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('newtypes') }}">Tin tức</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('newtypes') }}">Tất cả Tin tức</a></li>
                    <li><a href="{{ URL::to('newtypes/create') }}">Thêm Tin tức mới</a>
                </ul>
            </nav>

            <h1>Thêm Tin tức</h1>

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

            {{ Form::open(array('url' => 'newtypes', 'files' => true)) }}

            <div class="form-group">
                {{ Form::label('name', 'Tên') }}
                {{ Form::text('name',Input::old('name'), array('class' => 'form-control')) }}
            </div>
                {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    @stop
