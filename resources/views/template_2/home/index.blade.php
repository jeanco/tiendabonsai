
@extends('template_2.layouts.index')
@section('content')
<!-- Content -->
<main>
      <!-- New Car -->
     {{--<div class="header_desktop_video">
     	 @include('template_2.home.0_banner_video')
     </div> --}}
   

 
    	@include('template_2.home.1_banner')
   
    
    @include('template_2.home.8_we')
    {{--@include('template_2.home.1_banner')--}}
    {{--@include('template_2.home.2_category')--}}
    
    @include('template_2.home.4_banner_promotion')
  

    {{--@include('template_2.home.3_promotion')--}}

     @include('template_2.home.6_brands')

    @include('template_2.home.9_category')
    
    {{--@include('template_2.home.5_featured')--}}
   
    @include('template_2.home.7_blog')

 </main>
<!-- Content END-->
@stop
@section('plugins-css')

@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_2/js/modernizr.js"></script>
	<script src="/template_2/js/video_header.min.js"></script>
	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="/template_2/js/isotope.min.js"></script>
	<script>
		// Isotope filter
		$(window).on('load',function(){
		  var $container = $('.isotope-wrapper');
		  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
		});
		$('.isotope_filter').on( 'click', 'a', 'change', function(){
		  var selector = $(this).attr('data-filter');
		  $('.isotope-wrapper').isotope({ filter: selector });
		});
	</script>
@stop