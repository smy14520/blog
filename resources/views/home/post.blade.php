@extends('layout.home')
@section('content')
  <!-- Begin Wrapper -->
  <div id="wrapper">
  
@include('layout.quote')
   
  	<!-- Begin Blog -->
  	<div class="containers">
    <div class="posts">
        <h1 class="title">{{$post->title}}</h1>
        <div class="posts_content">{!! $post->content !!}</div>
    </div>

    
    
    
    
    <!-- Begin Comments Section -->
		<!-- Begin Comments -->
        
        <h3 class="line">留言板</h3>
        
        <!-- Begin Comments -->
        <div id="comments">
          <ol id="singlecomments" class="commentlist">
            {{--<li class= "clearfix">--}}
              {{--<div class="user"><img alt="" src="{{asset('resources/views/home/style/images/art/m1.jpg')}}" height="48" width="48" class="avatar" /><a class="reply-link" href="#">Reply</a></div>--}}
              {{--<div class="message">--}}
              {{--<div class="top"></div>--}}
              {{--<div class="middle">--}}
                {{--<div class="info">--}}
                  {{--<h4><a href="#">Jacqueline</a></h4>--}}
                  {{--<span class="date">April 4, 2010</span>  </div>--}}
                {{--<p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros sodales ac.</p>--}}
                {{--</div>--}}
                {{--<div class="bottom"></div>--}}
              {{--</div>--}}
              {{--<div class="clear"></div>--}}
              {{--<ul class="children">--}}
                {{--<li class= "clearfix">--}}
                  {{--<div class="user"><img alt="" src="{{asset('resources/views/home/style/images/art/m1.jpg')}}" height="48" width="48" class="avatar" /><a class="reply-link" href="#">Reply</a></div>--}}
                  {{--<div class="message">--}}
                    {{--<div class="info">--}}
                      {{--<h4><a href="#">Mathieu</a></h4>--}}
                      {{--<span class="date">April 4, 2010</span></div>--}}
                    {{--<p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros sodales ac.</p>--}}
                  {{--</div>--}}
                  {{--<div class="clear"></div>--}}
                  {{--<ul class="children">--}}
                    {{--<li class= "clearfix">--}}
                      {{--<div class="user"><img alt="" src="{{asset('resources/views/home/style/images/art/m1.jpg')}}" height="48" width="48" class="avatar" /><a class="reply-link" href="#">Reply</a></div>--}}
                      {{--<div class="message">--}}
                        {{--<div class="info">--}}
                          {{--<h4><a href="#">Charlene</a></h4>--}}
                          {{--<span class="date">April 4, 2010</span></div>--}}
                        {{--<p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros.</p>--}}
                      {{--</div>--}}
                      {{--<div class="clear"></div>--}}
                    {{--</li>--}}
                  {{--</ul>--}}
                {{--</li>--}}
              {{--</ul>--}}
            {{--</li>--}}


            {{--<li class= "clearfix">--}}
              {{--<div class="user"><img alt="" src="{{asset('resources/views/home/style/images/art/m1.jpg')}}" height="48" width="48" class="avatar" /><a class="reply-link" href="#">Reply</a></div>--}}
              {{--<div class="message">--}}
                {{--<div class="info">--}}
                  {{--<h4><a href="#">Isabel</a></h4>--}}
                  {{--<span class="date">April 4, 2010</span></div>--}}
                {{--<p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros sodales ac.</p>--}}
              {{--</div>--}}
              {{--<div class="clear"></div>--}}
            {{--</li>--}}
              @foreach($comm as $v)
            <li class= "clearfix">
              <div class="user"><img alt="" src="http://www.blog.com/resources/views/home/style/images/art/m1.jpg" height="48" width="48" class="avatar" /><a class="reply-link" href="#">Reply</a></div>
              <div class="message">
                <div class="info">
                  <h4><a href="#">{{$v->name}}</a></h4>
                  <span class="date">{{$v->created_at}}</span></div>
                <p>{{$v->content}}</p>
              </div>
              <div class="clear"></div>
            </li>
                  @endforeach
          </ol>
        </div>
        <!-- End Comments --> 
        
        <!-- Begin Form -->
        <div class="comment-form">
          <h3 class="line">留言</h3>
          <div class="form-container">
            <form class="forms" action="{{url('/comment')}}" method="post">
              <fieldset>
                <ol>
                  <li class="form-row text-input-row">
                      {{csrf_field()}}
                      <input type="hidden" name="pid" value="{{$post->id}}">
                    <label>Name</label>
                    <input type="text" name="name" value="" class="text-input required" title="" />
                  </li>
                  <li class="form-row text-input-row">
                    <label>Email</label>
                    <input type="text" name="email" value="" class="text-input required email" title="" />
                  </li>
                  <li class="form-row text-area-row">
                    <label>Message</label>
                    <textarea name="content" class="text-area required"></textarea>
                  </li>
                  <li class="form-row hidden-row">

                  </li>
                  <li class="button-row">
                    <input type="submit" value="Submit"  class="btn-submit" />
                  </li>
                </ol>

              </fieldset>
            </form>
            <div class="response"></div>
          </div>
        </div>
        <!-- End Form --> 
        
        <!-- End Comments -->
    <!-- End Comments Section -->
    
	 <!-- End Container -->
      <!-- sidebar -->



<!-- end sidebar -->
  <!-- End Wrapper -->


<!-- End Body Wrapper -->
@endsection
