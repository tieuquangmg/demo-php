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
            <div class="box">
                <div class="col-md-3 col-xs-1 box_left">
                    <ul class="news">
                        @foreach($new as $val)
                            <li>
                                <div class="thumbnail news-thumbs">
                                    <a href="{{asset('users/tin/'.$val->id.'/'.$val->title)}}">

                                    <div class="caption cover">
                                        <p>{{$val->title}}</p>
                                    </div>
                                    <img class="cover-img" src="{{asset('uploads/thumbs/'.$val->thumb)}}" alt="tin tuc">
                                    </a>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-xs-9 text-center slide">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="{{asset('themes/images/img/1435473418319_6.jpg')}}" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{asset('themes/images/img/1435473421142_7.jpg')}}"alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{asset('themes/images/img/1435473424220_8.jpg')}}" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{asset('themes/images/img/1435473426375_9.jpg')}}" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
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