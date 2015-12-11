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
                        <h3 class="title">Album ảnh</h3>
                        <div class="content">
                            <?php
                            $mainFolder = 'source';
                            $extensions = array("jpg", "png", "gif", "JPG", "PNG", "GIF");
                            function sort_array(&$array, $dir, $sort_by_date)
                            { // array argument must be passed as reference

                                if ($sort_by_date) {
                                    foreach ($array as $key => $item) {
                                        $stat_items = stat($dir . '/' . $item);
                                        $item_time[$key] = $stat_items['ctime'];
                                    }
                                    return array_multisort($item_time, SORT_DESC, $array);
                                }
                            }
                            function sanitize($string)
                            {
                                $string = htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
                                return $string;
                            }
                            if (empty($_REQUEST['album'])) // if no album requested, show all albums
                            {
                            $albums = array_diff(scandir($mainFolder), array('..', '.','index.html'));
                                if(count($albums)>0){


                            sort_array($albums,$mainFolder,true);
                            // var_dump($albums);
                            for($i = 0;$i < count($albums);$i++){
                            if(isset($albums[$i])){
                            //////
                            $thumb_pool = glob('thumbs/'.$albums[$i].'/*{.' . implode(",", $extensions) . '}', GLOB_BRACE);
                            if (count($thumb_pool) != 0) {
                                $album_thumb =  $thumb_pool[0];
                            ?>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="thumbnail">
                                    <a class="showAlb" rel="<?php echo $albums[$i]; ?>"
                                       href="albums?album=<?php echo urlencode($albums[$i]); ?>">
                                        <img src="{{asset($album_thumb)}}" alt="">
                                        <div class="caption">
                                            <h5><?php echo substr($albums[$i], 0, 20).'  ('.count($thumb_pool).' ảnh)'; ?></h5>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <?php
                            }
                            ///////
                            // var_dump($thumb_pool);
                            // var_dump($albums[$i]);

                            }
                            }
                                    }else{
                                    ?>
                                <h4>Không có album nào</h4>
                                <?php
                                }
                            }else{
                            $requested_album = sanitize($_REQUEST['album']); // xss prevention
                            $albums = 'thumbs/'.$requested_album;
                            $files = scandir('thumbs/'.$requested_album);
                            $files = array_diff($files, array('..', '.'));
                            $numFiles = count($files);

                            // var_dump($requested_album);
                            // var_dump($files);
                            // var_dump($numFiles);
                            if($numFiles == 0){
                            ?>
                            <div class="p10-lr"><p>There are no images in this album.</p></div>
                            <?php
                            }else{
                            sort_array($files,$albums,true); // rearrange array either by date or name
                            // var_dump($files);
                            for( $i=0; $i <= $numFiles; $i++ )
                            {
                            if(isset($files[$i]) && is_file($albums.'/'.$files[$i]))
                            {
                            $ext = strtolower(pathinfo($files[$i], PATHINFO_EXTENSION));
                            if(in_array($ext, $extensions))
                            {
                            $thumb = $albums.'/'.$files[$i];
                            ?>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <a class="group1" href="{{asset('source/'.$requested_album.'/'.$files[$i])}}">
                                    <div class="thumbnail">
                                        <img src="{{asset($thumb)}}" alt="<?php echo $files[$i]; ?>">
                                        <div class="caption">
                                            <h5>{{substr(substr($files[$i],0,-4),0,16)}}</h5>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            <?php
                            }
                            }
                            }
                            }
                            }
                            ?>
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
            $(".group1").colorbox({rel:'group1'});
        });
    </script>
@endsection