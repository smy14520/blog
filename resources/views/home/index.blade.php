@extends('layout.home')
@section('content')
  <script type="text/javascript">
    $(window).load(function() {
      $('#slider').nivoSlider({
        directionNavHide: false,
        captionOpacity: 1.0
      });
    });
  </script>

  <!-- Begin Slider -->
  @include('layout.quote')
  <div class="slider-wrapper theme-default">

            <div id="slider" class="nivoSlider">
              @foreach($data as $v)
                <img src="{{url($v->bigimg)}}" alt=""/>
                @endforeach

                {{--<img src="style/images/art/s2.jpg" alt="" title="Donec ullamcorper nulla non metus auctor fringilla." />--}}
                {{--<img src="style/images/art/s3.jpg" alt="" />--}}
                {{--<img src="style/images/art/s4.jpg" alt="" />--}}
            </div>
        </div>
  <!-- End Slider --> 
  
  <!-- Begin Wrapper -->
  <div id="wrapper">

    <div class="two-third">
      {{--<h3 class="line">Our Services</h3>--}}
      {{----}}
      {{--<h4>Commodo Egestas Risus Cursus</h4>--}}
      {{--<p>Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula id elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>--}}
      {{--<div class="clear"></div>--}}
      {{--<br />--}}
      {{--<br />--}}
      {{--<img src="style/images/icon-2.png" alt=""  class="left"/>--}}
      {{--<h4>Egestas Ridiculus Vestibulum Cras Amet</h4>--}}
      {{--<p>Maecenas faucibus mollis interdum. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Lorem ipsum sit amet, consectetur adipiscing elit. Vestibulum id ligula porta.</p>--}}
      {{--<div class="clear"></div>--}}
      {{--<br />--}}
      {{--<br />--}}
      {{--<img src="style/images/icon-3.png" alt=""  class="left"/>--}}
      {{--<h4>Dapibus Nibh Tristique Sollicitudin</h4>--}}
      {{--<p>Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula id elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>--}}
      {{--<div class="clear"></div>--}}
    {{--</div>--}}
    {{--<div class="one-third last">--}}
      {{--<h3 class="line">Latest Posts</h3>--}}
      {{--<ul class="latest-posts">--}}
        {{--<li> <span class="date"><em class="day">22</em><em class="month">May</em></span>--}}
          {{--<h5>Lorem Fermentum Pharetra</h5>--}}
          {{--<p>Maecenas faucibus mollis interdum. Lorem ipsum… <a href="#" class="more">Continue Reading →</a></p>--}}
        {{--</li>--}}
        {{--<li> <span class="date"><em class="day">14</em><em class="month">Jun</em></span> --}}
          {{--<h5>Sit Fringilla Vulputate Purus</h5>--}}
          {{--<p>Maecenas faucibus mollis interdum. Lorem ipsum… <a href="#" class="more">Continue Reading →</a></p>--}}
        {{--</li>--}}
        {{--<li> <span class="date"><em class="day">18</em><em class="month">Aug</em></span> --}}
          {{--<h5>Sit Fringilla Vulputate Purus</h5>--}}
          {{--<p>Maecenas faucibus mollis interdum. Lorem ipsum… <a href="#" class="more">Continue Reading →</a></p>--}}
        {{--</li>--}}
      {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="clear"></div>--}}
  {{--</div>--}}
  <!-- End Wrapper -->
  
  <div class="push"></div>
</div>
<!-- End Body Wrapper -->

@endsection