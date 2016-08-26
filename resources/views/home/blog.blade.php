@extends('layout.home')
@section('content')
  <!-- End Header --> 
  
  

  <!-- Begin Wrapper -->
  <div id="wrapper">

	  @include('layout.quote')

  	<!-- Begin Container -->
  	<div class="container">


    
    @foreach($post as $v)
    <div class="post text">
    <div class="icon-text" style="border-color:#BED7C1;background: {{$v->color}}"><span style="color:#BED7C1">{{$v->icon}}</span></div>
    <div class="content">
    	<div class="top"></div>
    	<div class="middle">
    		<div class="post-text">
    			<h2 class="title"><a href="{{url('/post/'.$v->id)}}">{{$v->title}}</a></h2>
				{{--<p>{{$v->quotation}}</p>--}}
    		</div>
    		<div class="meta-wrapper">
			<div class="meta">
    			<ul class="post-info">
    				<li><span class="post-link"></span><a href="#">{{$v->created_at}}</a></li>
    				<li><span class="post-comment"></span><a href="#">{{$v->view}}</a></li>
    				{{--<li><span class="post-tag"></span><a href="#">quote</a>, <a href="#">library</a></li>--}}
    			</ul>
    			<div class="share"><span class="post-share"></span><a href="#">Share</a></div>
    			<div class="clear"></div>
    		</div>
    		</div>
    	</div>
    	<div class="bottom"></div>
    </div>
    </div>
    @endforeach


    
    <!-- Begin Page Navi -->
    <div class="page-navi">

                {{$post->links()}}

    </div>
    <!-- End Page Navi -->
    
	</div> <!-- End Container -->


	  @parent

  <!-- End Wrapper -->
  

@endsection