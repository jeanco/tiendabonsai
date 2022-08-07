
@extends('template_12.layouts.index')
@section('content')
<!-- Content -->
<main>
      <!-- New Car -->
    {{-- @include('template_12.home.0_banner_video')
    @include('template_12.home.8_we') --}}

    @include('template_12.home.1_banner')
   {{--@include('template_12.home.13_offers')--}}
    {{--@include('template_12.home.11_more_options')--}}
    
    @include('template_12.home.2_category') 
    {{-- @include('template_12.home.3_promotion') --}}
    {{--@include('template_12.home.4_banner_promotion')--}}
    @include('template_12.home.5_featured')
    @include('template_12.home.14_banner_offers')
    {{--@include('template_12.home.12_more_sellers')
    @include('template_12.home.6_brands')--}}
    @include('template_12.home.7_blog')
     @include('template_12.home.10_suscription')
    {{--@include('template_12.home.9_social_netwok')--}}

</main>
<!-- Content END-->
@stop
@section('plugins-css')

@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_12/js/modernizr.js"></script>
	<script src="/template_12/js/video_header.min.js"></script>

	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="/template_12/js/isotope.min.js"></script>
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
