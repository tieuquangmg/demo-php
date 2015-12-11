@extends('backend.main')
    @section('content')

            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('temples') }}">Tự viện</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('temples') }}">Tất cả Tự viện</a></li>
                    <li><a href="{{ URL::to('temples/create') }}">Thêm Tự viện mới</a>
                </ul>
            </nav>

            <ul class="breadcrumb">
                <li>Thêm tự viện</li>
            </ul>
            {{ Form::open(array('url' => 'temples', 'files' => true)) }}
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Thêm tự viện</div>
                <div class="panel-body">
                    @if(Session::has('errorImage'))
                        <div class='alert alert-danger'>
                            <ul>
                                <li>{{Session::get('errorImage')}}</li>
                            </ul>
                        </div>
                        {{Session::forget('errorImage')}}
                    @endif
                        {{ HTML::ul($errors->all()) }}
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'Tên chùa') }}
                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('adress', 'Địa chỉ') }}
                                {{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('year_built', 'năm xây dựng') }}
                                {{ Form::number('year_built',Input::old('year_built'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('architecture', 'Kiến trúc') }}
                                {{ Form::text('architecture', Input::old('architecture'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('abbot', 'Trụ trì') }}
                                {{ Form::text('abbot', Input::old('abbot'), array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('history', 'Lịch Sử') }}
                                {{ Form::text('history', Input::old('history'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('bots', 'Các Đời Tổ') }}
                                {{ Form::text('bots', Input::old('bots'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('website', 'Website') }}
                                {{ Form::text('website', Input::old('website'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('phone', 'Số Điện thoại') }}
                                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('image', 'Ảnh đại diện') }}
                                {{ Form::file('image', Input::old('image'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('other', 'Thông tin khác') }}
                                {{ Form::textarea('other', Input::old('other'), array('class' => 'form-control')) }}
                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                    {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}
                    <a href="{{asset('temples')}}" class="btn btn-danger">Hủy bỏ</a>
                </div>
            </div>
            <!-- if there are creation errors, they will show here -->
            {{ Form::close()}}
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'other' );
        </script>
    @stop
