
@extends('template_13.layouts.index')
@section('content')
<!-- Content -->
<main style="background-color: #fafafa;">
      <!-- New Car -->
     {{-- <div class="header_desktop">
     	 @include('template_13.home.0_banner_video')
     </div> --}}


    <div class="">
    	{{-- @include('template_13.home.1_banner') --}}
      @include('template_13.home.15_banner_image')
    </div>

    @include('template_13.home.13_offers')

    {{--@include('template_13.home.8_we')--}}

    @include('template_13.home.2_category')

    {{--@include('template_13.home.11_more_options')--}}

    @include('template_13.home.4_banner_promotion')

    {{--@include('template_13.home.12_more_sellers')--}}

    {{-- @include('template_13.home.3_promotion') --}}

    {{--  @include('template_13.home.6_brands') --}}

    @include('template_13.home.5_featured')

    @include('template_13.home.14_banner_offers')


    @include('template_13.home.7_blog')
    {{-- @include('template_13.home.9_social_netwok')  --}}

 </main>
<!-- Content END-->
@stop
@section('plugins-css')

@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_13/js/modernizr.js"></script>
	<!--script src="/template_13/js/video_header.min.js"></script>
	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script-->
	<script src="/template_13/js/isotope.min.js"></script>
	<script src="/template_13/js/carousel-home-2.js"></script>
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

  <script type="text/javascript">
    $(document).ready(function(){
      $('#promotions').owlCarousel({
        dots:false,
        margin:20,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
        }
      });
    });
  </script>

  <script type="text/javascript">
  	var presentations;
  	$(`.see-presentations`).on('click', function(){
  		$(`#add-presentation-to-cart`).addClass('disabled');
  		$(`#product-presentation-price`).hide();
  		let _id = $(this)[0].dataset.index;
  		axios.get(`/api/template_13/products/${_id}/presentations`)
  			.then((response) => {
  				presentations = response.data.presentations;
				let _content = `<option value="">Seleccione</option>`;

				response.data.presentations.forEach(value => {
				_content += `<option value="${value.id}">${value.color.name}</option>`;
				});

				document.querySelector(`#presentation_name`).innerHTML = `Nombre del Producto: ${response.data.product_name}`;
				document.querySelector(`#product_presentations`).innerHTML = _content;
  			})
  	});

  	getElement(`#product_presentations`).addEventListener('change', (e) => {
  		$(`#add-presentation-to-cart`).attr('data-index', "");
  		$(`#add-presentation-to-cart`).removeClass('disabled');
  		$(`#add-presentation-to-cart`).addClass('disabled');
  		$(`#product-presentation-price`).hide();
  		let _object_found;
  		if (e.target.value) {
	  		$(`#add-presentation-to-cart`).removeClass('disabled');
	  		$(`#product-presentation-price`).show();
	  		_object_found = presentations.filter(a => a.id == e.target.value);
	  		$(`#add-presentation-to-cart`).attr('data-index', _object_found[0].product.id);

	  		if (_object_found[0].product.promotion_available) {
				getElement(`#product-price`).innerHTML = `Precio: S/ ${_object_found[0].product.price_promotion}`;
	  			getElement(`#old-product-price`).innerHTML = `S/ ${_object_found[0].product.price}`;
	  			return;
	  		}
	  		getElement(`#product-price`).innerHTML = `Precio: S/ ${_object_found[0].product.price}`;
	  		getElement(`#old-product-price`).innerHTML = ``;
  		}
  	});


  </script>
@stop
