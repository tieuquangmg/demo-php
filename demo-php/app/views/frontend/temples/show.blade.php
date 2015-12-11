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
                        <h3 class="title">Tự viện</h3>
                        <div class="content imgnews table">

                            <h2 class="title_news_detial">{{$temple->name}}</h2>
                            <span class="news_day">Updated: ({{$temple->created_at}})</span>
                            <p>
                                <a id="example1" href="#">
                                    <img title="Click Xem hình lớn" align="right" class="pictnews" src="{{asset('uploads/thumbs/'.$temple->image)}}">
                                </a>
                            </p>
                            <div>
                                <p>Tên : {{$temple->name}}</p>
                                <p>Địa Chỉ : {{$temple->adress}}</p>
                                <p>Trụ Trì : {{$temple->abbot}}</p>
                                <p>Website : {{$temple->website}}</p>
                                <p>Số Điện Thoại : {{$temple->phone}}</p>
                                <p>Email : {{$temple->email}}</p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Các Đời Tổ</th>
                                        @foreach(Position::all() as $key=>$val)
                                            <th>{{$val->name}}</th>
                                             @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p>{{$temple->bots}}</p>
                                        </td>
                                        @foreach(Position::all() as $key=>$val)
                                            <td>
                                            @foreach(Monk::where('position','=',$val->id)->where('last_temple','=',$temple->id)->get() as $key1=>$val1)
                                                <p><a class="ajax" href="{{asset('data?id='.$val1->id)}}">{{$val1->phap_danh}}</a></p>
                                            @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                                <h3>Thông tin khác</h3>
                                <div>
                                    {{$temple->other}}
                                </div>
                            </div>
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
    <script>
        $(document).ready(function(){
            //Examples of how to assign the Colorbox event to elements
            $(".ajax").colorbox({rel:'ajax' , innerWidth:600, innerHeight:200, transition:"none"});
            //Example of preserving a JavaScript event for inline calls.
        });
    </script>
    @endsection