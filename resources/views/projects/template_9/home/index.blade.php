
@extends('template_9.layouts.index')
@section('content')
<!-- Content -->
<main>
      <!-- New Car -->
     {{-- <div class="header_desktop">
     	 @include('template_9.home.0_banner_video')
     </div> --}}
   

    <div class="">
    	@include('template_9.home.1_banner')
    </div>
    
    {{--@include('template_9.home.8_we')--}}
    {{--@include('template_9.home.1_banner')--}}
    @include('template_9.home.2_category')
    {{--@include('template_9.home.11_more_options')--}}
    @include('template_9.home.4_banner_promotion')
    {{--@include('template_9.home.12_more_sellers')--}}

    @include('template_9.home.3_promotion')

     @include('template_9.home.6_brands')

    {{--@include('template_9.home.2_category')--}}
    
    @include('template_9.home.5_featured')

   
    @include('template_9.home.7_blog')
    @include('template_9.home.9_social_netwok')

 </main>
<!-- Content END-->
@stop
@section('plugins-css')

@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_9/js/modernizr.js"></script>
	<!--script src="/template_9/js/video_header.min.js"></script>
	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script-->
	<script src="/template_9/js/isotope.min.js"></script>
	<script src="/template_9/js/carousel-home-2.js"></script>
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

	    $(document).on('keyup', '.quantity_1', function(){
	        let _that = $(this);
	        let _inputNumber = $(this), _max = _that[0].dataset.max, _min = _that[0].dataset.min, _value_to_set;

	        _value_to_set = _inputNumber.val();

	        if (isNaN(_value_to_set)) {
	        	_value_to_set = _min;
	        } else {
		        if (_inputNumber.val() > parseInt(_max)) {
		            _value_to_set = _max;
		        }
		        if (_inputNumber.val() < parseInt(_min)) {
		           _value_to_set = _min;
		        }
	        }

	        myEfficientFnQuantity(_value_to_set,_inputNumber);
	    });

	    var myEfficientFnQuantity = debounce(function(_value_to_set, _inputNumber) {
	        _inputNumber.val(_value_to_set);
	    }, 500);

		$(document).on('click', '.inc', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt(_that.prev().val());
			let _max = parseInt(_that.prev()[0].dataset.max);

			if (!(_oldQuantity <= _max)) {
				_that.prev().val(_oldQuantity-1);
			}
			
		});

		$(document).on('click', '.dec', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt(_that.prev().prev().val());
			let _min = parseInt(_that.prev().prev()[0].dataset.min);

			if (!(_oldQuantity >= _min)) {
				_that.prev().prev().val(_oldQuantity+1);
			}
		});
	</script>
@stop