
@extends('template_9.layouts.index')
@section('content')
<!-- Content -->

<main>
	    <div class="container ">
	        <div class="row">
	        	@include('template_9.catalog.1_left_filters')
	            
	            <!-- /col -->
	            <div class="col-lg-9 margin_30">
	            	<div class="breadcrumbs">
	                                <ul>
	                                    <li><a href="/">Inicio</a></li>
	                                    <li>Productos</li>
	                                </ul>
	                            </div>
	            	{{--@include('template_9.catalog.2_top_banner')--}}

	            	<!-- /top_banner -->
	                <div id="stick_here"></div>
	                {{--<div class="toolbox elemento_stick add_bottom_30">
	                    <div class="container">
	                        <ul class="clearfix">
	                            <li>
	                                <div class="sort_select" style="color: white">
	                                    <!--select name="sort" id="sort">
	                                        <option value="popularity" selected="selected">Sort by popularity</option>
	                                        <option value="rating">Sort by average rating</option>
	                                        <option value="date">Sort by newness</option>
	                                        <option value="price">Sort by price: low to high</option>
	                                        <option value="price-desc">Sort by price: high to
	                                    </select-->
	                                    Lista de Productos de {{$company_main->business_name}}
	                                </div>
	                            </li>
	                            <!--li>
	                                <a href="#0"><i class="ti-view-grid"></i></a>
	                                <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
	                            </li-->
	                            <li>
	                                <a href="#" class="open_filters">
	                                    <i class="ti-filter"></i><span>Filters</span>
	                                </a>
	                            </li>
	                        </ul>
	                    </div>
	                </div>--}}
					<!-- /toolbox -->
					<div id="table_data_product">
						@include('template_9.catalog.3_right_catalog')
					</div>
					<!-- /row -->
	                {{-- <div class="pagination__wrapper">
	                    <ul class="pagination">
	                        <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
	                        <li>
	                            <a href="#0" class="active">1</a>
	                        </li>
	                        <li>
	                            <a href="#0">2</a>
	                        </li>
	                        <li>
	                            <a href="#0">3</a>
	                        </li>
	                        <li>
	                            <a href="#0">4</a>
	                        </li>
	                        <li><a href="#0" class="next" title="next page">&#10095;</a></li>
	                    </ul>
	                </div> --}}



	            	
	                
	                
	            </div>
	            <!-- /col -->
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
	<!-- /main -->


<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_9/css/listing.css" rel="stylesheet">
@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
	<script src="/template_9/js/catalog.js"></script>
	<script src="/template_9/js/sticky_sidebar.min.js"></script>
	<script src="/template_9/js/specific_listing.js"></script>
	<script type="text/javascript">
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
			_oldQuantity = _oldQuantity + 1;
			let _max = parseInt(_that.prev()[0].dataset.max);

			if (_oldQuantity >= _max) {
				_that.prev().val(_max);
				return;
			}
			_that.prev().val(_oldQuantity);

			// if (!(_oldQuantity <= _max)) {
			// 	_that.prev().val(_oldQuantity-1);
			// 	return;
			// }

			//_that.prev().val(_oldQuantity-1);
		});

		$(document).on('click', '.dec', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt(_that.prev().prev().val());
			_oldQuantity -= 1;
			let _min = parseInt(_that.prev().prev()[0].dataset.min);

			if (_oldQuantity < _min) {
				_that.prev().prev().val(_min);
				return;
			}
			_that.prev().prev().val(_oldQuantity);
			// if (!(_oldQuantity >= _min)) {
			// 	_that.prev().prev().val(_oldQuantity+1);
			// }
		});

	</script>



@stop