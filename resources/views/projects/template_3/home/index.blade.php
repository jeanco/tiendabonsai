
@extends('template_3.layouts.index')
@section('content')
<!-- Content -->
<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
<main>
      <!-- New Car -->
    {{-- @include('template_3.home.0_banner_video')
    @include('template_3.home.8_we') --}}
    @include('template_3.home.1_banner')
    {{-- @include('template_3.home.2_category') --}}
    {{-- @include('template_3.home.3_promotion') --}}

    @include('template_3.home.4_banner_promotion')
    @include('template_3.home.5_featured')
    @include('template_3.home.6_brands')
    @include('template_3.home.9_social_netwok')
    @include('template_3.home.7_blog')

</main>
<!-- Content END-->
@stop
@section('plugins-css')
<style type="text/css">
        .price_main .old_price {
    font-size: 18px !important;
    font-size: 18px !important;
    color: #000000;
}

.price_main .transfer_price {
    font-size: 18px !important;
    font-size: 18px !important;
    background: yellow;
    color: blue;
}

.price_main .new_price {
    font-size: 20px;
    color: #ff3838;
}

.price_main .percentage {
    top: -2px
}

.percentage {
    background: #F33;
    color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    font-size: 0.65rem;
    line-height: 1;
    font-weight: 600;
    position: relative;
    padding: 3px;
    top: -1px;
    margin-left: 2px;
    display: inline-block;
}
    </style>
@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_3/js/modernizr.js"></script>
	<!--script src="/template_3/js/video_header.min.js"></script-->

	<script>
		// Video Header
		/*HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});*/
	</script>
	<script src="/template_3/js/isotope.min.js"></script>
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

		<script type="text/javascript">
		$(document).ready(function(){

        /* Preloader */

     var preloaderFadeOutTime = 0;
      hidePreloader();

        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            setTimeout(function() {
                preloader.fadeOut(preloaderFadeOutTime);
            }, 10);
        }



    });
	</script>
@stop
