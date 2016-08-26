<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>{{$title->config_title}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('resources/views/home/style/images/logoo.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/style.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/style/css/prettyPhoto.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/style/css/nivo-slider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/style/type/classic.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/style/type/goudy.css')}}" media="all"/>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery-1.6.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.nivo.slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/superfish.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.aw-showcase.js')}}"></script>
    <style>

    </style>

    <script type="text/javascript">

        $(document).ready(function()
        {

        });

    </script>
</head>
<body>
<div id="body-wrapper">
    <!-- Begin Header -->
    <div id="header">
        <div class="logo">
            <a href=""><img src="{{asset('resources/views/home/style/images/logoo.png')}}" alt="" /></a>
        </div>

        <!-- Begin Menu -->
        <div class="menu">
            <ul class="sf-menu">
                <li><a href="{{url('')}}">首页</a>
                @foreach($catetree as $v)
                <li><a href="{{url('/blog/'.$v->cate_name.'/'.$v->cate_id)}}">{{$v->cate_name}}</a>
                    @if($v['son'])
                    <ul>
                        @foreach($v['son'] as $s)
                        <li><a href="{{url('/blog/'.$s->cate_name.'/'.$v->cate_id)}}">{{$s->cate_name}}</a></li>
                       @endforeach
                    </ul>
                        @endif
                </li>
                @endforeach
                {{--<li><a href="blog.html">Blog</a>--}}
                    {{--<ul>--}}
                        {{--<li><a href="post.html">Post</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="gallery.html">Gallery</a></li>--}}
                {{--<li><a href="typography.html">Typography</a></li>--}}
                {{--<li><a href="columns.html">Columns</a></li>--}}
                {{--<li><a href="contact.html">Contact</a></li>--}}
            </ul>
        </div>
        <div class="clear"></div>
        <!-- End Menu -->
        </div>


    @section('content')


        <div class="sidebar">

            <div class="sidebox">
                <h3 class="line">About</h3>
                @if(isset($about))
               <p style="margin-left: 10px;width: 255px;word-break:break-all; ">{{$about->cate_quotation}}</p>
                    @endif
            </div>

            <div class="sidebox">
                <h3 class="line">Popular Posts</h3>
                <ul class="popular-posts" style="margin-left: 10px">
                    @foreach($posts as $v)
                    <li>
                        <a href="{{url('/post/'.$v->id)}}"><img src="{{asset('resources/views/home/style/images/art/m9.jpg')}}" alt="" /></a>
                        <h5><a href="{{url('/post/'.$v->id)}}">{{$v->title}}</a></h5>
                        <span>{{$v->created_at}} | <a href="#">{{$v->view}} view</a></span>
                    </li>

                   @endforeach
                </ul>
            </div>


            <div class="sidebox">
                <h3 class="line">Categories</h3>
                <ul class="cat-list">
                    @foreach($cateall as $v)
                    <li><a href="#">{{$v->cate_name.'/'.$v->cate_id}} ({{$v->count}})</a></li>
                     @endforeach
                </ul>
            </div>

            <div class="sidebox">
                <h3 class="line">Search</h3>
                <form class="searchform" method="get">
                    <input type="text" id="s" name="s" value="type and hit enter" onfocus="this.value=''" onblur="this.value='type and hit enter'"/>
                </form>
            </div>

        </div>
        <div class="clear"></div>

</div>
<div class="push"></div>
</div>

@show
<div id="footer">
    <div class="footer">
        <p> </p>
    </div>
</div>
{{--<script type="text/javascript" src="style/js/scripts.js"></script>--}}
</body>
<style>
    .page-navi ul li span {
        padding: 6px 12px;
        font-size: 15px;
    }
</style>
</html>