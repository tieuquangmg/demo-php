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

                            {{ Form::open(array('url' => 'users/lien-he', 'files' => true)) }}
                            <div class="form-group">
                                {{ Form::label('name', 'Tên') }}
                                {{ Form::text('name',Input::old('name'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('phone', 'Số Điện Thoại') }}
                                {{ Form::text('phone',Input::old('phone'), array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('content', 'Nội Dung') }}
                                {{ Form::textarea('content',Input::old('content'), array('class' => 'form-control')) }}
                            </div>
                                <div class="form-group">
                                    {{ Form::captcha() }}
                                </div>
                            {{ Form::submit('Gửi', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
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
@endsection