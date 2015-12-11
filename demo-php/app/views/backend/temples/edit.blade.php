@extends('backend.main')

@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('temples') }}">Tự viện</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('temples') }}">Tất cả Tự viện</a></li>
                <li><a href="{{ URL::to('temple/create') }}">Thêm Tự viện</a>
            </ul>
        </nav>
<ul class="breadcrumb">
        <li>Admin</li>
        <li>Tự viện</li>
        <li>Sủa thông tin: {{ $temple->name }}</li>
</ul>
        @if(Session::has('errorImage'))
            <div class='alert alert-danger'>
                <ul>
                    <li>{{Session::get('errorImage')}}</li>
                </ul>
            </div>
            {{Session::forget('errorImage')}}
            @endif
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}
        {{ Form::model($temple, array('route' => array('temples.update', $temple->id), 'method' => 'PUT','files' => true)) }}
        {{$temple->image == null}}
        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa thông tin tự viện
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                        <tbody>
                        <tr>
                            <td>{{ Form::label('name', 'Tên chùa: ')}}</td>
                            <td>{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('adress', 'Địa chỉ') }}</td>
                            <td>{{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('year_built', 'năm xây dựng') }}</td>
                            <td>{{ Form::text('year_built',Input::old('year_built'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('architecture', 'Kiến trúc') }}</td>
                            <td>{{ Form::text('architecture', Input::old('architecture'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('abbot', 'Trụ trì') }}</td>
                            <td>{{ Form::text('abbot', Input::old('abbot'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('history', 'Lịch Sử') }}</td>
                            <td>{{ Form::text('history', Input::old('history'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('bots', 'Các Đời Tổ') }}</td>
                            <td>{{ Form::text('bots', Input::old('bots'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('website', 'Website') }}</td>
                            <td>{{ Form::text('website', Input::old('website'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('phone', 'Số Điện thoại') }}</td>
                            <td>{{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('email', 'Email') }}</td>
                            <td>{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}</td>
                        </tr>
                        <tr>
                            <td>{{ Form::label('other', 'Thông tin khác') }}</td>
                            <td>{{ Form::textarea('other', Input::old('other'), array('class' => 'form-control')) }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-mg-4">
                        <div class="form-group">
                            {{ Form::label('image', 'Ảnh') }}
                            <div><img class="avatar" src="<?php echo asset("uploads/thumbs/{$temple->image}") ?>" width='120' /></div>
                            {{ Form::file('image', Input::old('image'), array('class' => 'form-control')) }}
                        </div>
                        <label><h4>{{$temple->name}}</h4></label>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-danger" href="{{asset("temples")}}" >Hủy bỏ</a>

            </div>
        </div>
        {{ Form::close() }}
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'other' );
            </script>
    @stop