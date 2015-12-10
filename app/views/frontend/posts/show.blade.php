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
                        <h3 class="title">Hoạt Động Phật Sự</h3>
                        <div class="content imgnews table">
                            <h2 class="title_news_detial">{{$post->title}}</h2>
                            <span class="news_day">Updated: ({{$post->created_at}})</span>
                            <p><a id="example1" href="#"><img title="Click Xem hình lớn" align="right" class="pictnews" src="{{asset('uploads/thumbs/'.$post->thumb)}}"></a></p>
                            <p class="description">{{$post->decription}}</p>
                            <p><em></em></p>
                            <p></p>
                            {{$post->content}}
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