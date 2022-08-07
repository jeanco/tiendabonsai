
@extends('template_6.layouts.index')
@section('content')
<!-- Content -->
<main>
      <!-- New Car -->
    {{-- @include('template_6.home.0_banner_video')
    @include('template_6.home.8_we') --}}

    @include('template_6.home.1_banner')
    {{-- @include('template_6.home.2_category') --}}
    {{-- @include('template_6.home.3_promotion') --}}
    {{--@include('template_6.home.4_banner_promotion')
    @include('template_6.home.5_featured')
    @include('template_6.home.6_brands')
    @include('template_6.home.9_social_netwok')
    @include('template_6.home.7_blog')--}}

</main>
<!-- Content END-->
@stop
@section('plugins-css')

@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_6/js/modernizr.js"></script>
	<script src="/template_6/js/video_header.min.js"></script>

	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="/template_6/js/isotope.min.js"></script>
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
