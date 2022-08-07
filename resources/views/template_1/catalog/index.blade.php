@extends('template_1.layouts.index')
@section('content')
<!-- Content -->

<main>
	  <div class="container ">
	      <div class="row pt-4">
	        	@include('template_1.catalog.1_left_filters')
	            <!-- /col -->
	            <div class="col-lg-12 pt-0 margin_30">
									<div class="row justify-content-between align-items-center">
										<div class="mb-2 col-auto breadcrumbs">
		                    <ul class="m-0" id="breadcrumbs-parent">
		                        <li><a href="/">Inicio</a></li>
		                        <li><a href="/catalogo">Catálogo</a></li>
								<!-- <li><a class="a-breadcrumbs" id="breadcrumb-category" href=""></a></li>
								<li><a class="a-breadcrumbs" id="breadcrumb-subcategory" href=""></a></li> -->
		                    </ul>
		                </div>
										<div class="mb-2 col-auto text-right sm_none">
											<select class="form-control form-control-sm" id="order_by_select">
									      <option value="DESC">Mayor precio</option>
									      <option value="ASC">Menor precio</option>
									    </select>
										</div>
									</div>


	            	<!-- /top_banner -->
	                <div id="stick_here"></div>
	                <div class="toolbox elemento_stick add_bottom_30">
	                    <div class="container">
	                        <ul class="clearfix">
	                            {{--<li>
	                                <div class="sort_select" style="color: #000;">
	                                    <!--select name="sort" id="sort">
	                                        <option value="popularity" selected="selected">Sort by popularity</option>
	                                        <option value="rating">Sort by average rating</option>
	                                        <option value="date">Sort by newness</option>
	                                        <option value="price">Sort by price: low to high</option>
	                                        <option value="price-desc">Sort by price: high to
	                                    </select-->
	                                    Seleccione los filtros de {{$company_main->business_name}}
	                                </div>
	                            </li>--}}
	                            <!--li>
	                                <a href="#0"><i class="ti-view-grid"></i></a>
	                                <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
	                            </li-->
	                            <li>

	                            	<div class="row align-items-center justify-content-between md_none">
 <div class="col-auto" style="    margin-top: -7px;">
            <select class="form-control form-control-sm" id="order_by_select">
              <option value="DESC">Mayor precio</option>
              <option value="ASC">Menor precio</option>
            </select>
          </div>
	                            	<!--div class="col-auto" style="margin-top: -7px;
    margin-left: 70px; font-size: 17px;">
	                            		 <a href="#" class="open_filters" id="cerrar_menu_categorias">
								              <i class="fas fa-sliders-h" style="top: 0; font-size: 20px;"></i>
								              <label class="mb-0" style="font-weight: 700;">&nbsp;Filtros</label>
								            </a>
	                            	</div-->
	                                </div>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
					<!-- /toolbox -->
									<div id="table_data_product">
										@include('template_1.catalog.3_right_catalog')
									</div>
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
    <link href="/template_1/css/listing.css" rel="stylesheet">
@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
	<script src="/template_1/js/catalog.js"></script>
	<script src="/template_1/js/sticky_sidebar.min.js"></script>
	<script src="/template_1/js/specific_listing.js"></script>
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


		 $(document).ready(function(){
        $('li').click(function(){
          $('li').each(function(){
           //Recorremos todos los "li" para quitarles los fondos
            $(this).css('border-bottom', '');
          });
          //Se lo añadimos al que se le hace el click
          $(this).css('border-bottom', '8px solid var(--main-bg-color-terciario)');


 


        });
      });

	</script>



@stop
