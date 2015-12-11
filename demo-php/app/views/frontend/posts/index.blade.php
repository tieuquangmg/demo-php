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
                        <h3 class="title">Tin Tức / {{$category}}</h3>
                    </div>
                    @foreach($posts as $value )
                        <div class="row" style="padding: 20px 20px;border-bottom: solid 1px #c7ddef">
                            <div class="col-xs-3">
                                <img src="{{asset('uploads/thumbs/'.$value->thumb)}}"
                                     class="img-responsive">
                            </div>
                            <div class="col-xs-9" style="padding-left: 20px">
                                <a href="{{asset('users/tin/'.$value->id.'/'.$value->title)}}"><h4>{{$value->title}}</h4></a>
                                <span class="news_day">Cập nhật: ({{$value->updated_at}})</span>
                                <p>{{$value->decription}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        {{$posts->links()}}
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