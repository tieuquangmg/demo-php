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
                        <h3 class="title">Tăng ni</h3>
                    </div>
                    <div class="row">
                        <form  method="GET" action="{{asset('users/tang-ni')}}">
                            <input type="text" name="key" placeholder="Nhập từ khóa ..." value="{{@$_GET['key']}}">
                            <label> Tìm theo </label>
                            <select name="type">
                                <option value="the_danh"@if(@$_GET['type'] == 'the_danh'){{'selected'}}@endif>Thế Danh</option>
                                <option value="phap_danh"@if(@$_GET['type'] == 'phap_danh'){{'selected'}}@endif>Pháp Danh</option>
                                <option value="adress"@if(@$_GET['type'] == 'adress'){{'selected'}}@endif>Địa Chỉ</option>
                            </select>
                            <label>Tự viện</label>
                            <select name="temple" >
                                @foreach(Temple::all() as $val)
                                    <option value="">Tất cả</option>
                                    <option value="{{$val->id}}"@if(@$_GET['temple'] == $val->id){{'selected'}}@endif>{{$val->name}}</option>
                                @endforeach
                            </select>
                            <label>nghiệp sư</label>
                            <select name="position" >
                                <option value="">Tất cả</option>
                                @foreach(Position::all() as $val)
                                    <option value="{{$val->id}}" @if(@$_GET['position'] == $val->id){{'selected'}}@endif >{{$val->name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="tim kiem">
                        </form>
                    </div>
                    <?php $stt = 1; ?>
                @foreach($monks as $value )
                        <?php $stt ++ ?>
                        <a class='ajax' href="{{asset('data?id='.$value->id)}}">
                        <div class="row" style="padding: 5px 15px;@if(($stt % 2) != 0){{'background-color: #c7ddef'}}@else{{'background-color: #f5f5f5'}}@endif">
                            <div class="col-xs-2 user_image">
                                <img src="{{asset('uploads/thumbs/'.$value->image)}}"
                                     class="img-responsive">
                            </div>
                            <div class="col-xs-10 monk_info">
                                <p> Thế danh:{{$value->the_danh}}</p>
                                <p> Thế danh:{{$value->phap_danh}}</p>
                                <p> Năm sinh:{{Carbon::createFromFormat('Y-m-d',$value->birthday)->format('d-m-Y')}}</p>
                                <p> Đại chỉ:{{$value->adress}}</p>
                            </div>
                        </div>
                        </a>
                    @endforeach
                    <div class="row">
                        {{$monks->appends($_GET)->links()}}
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