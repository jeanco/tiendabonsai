
@extends('template_14.layouts.index')
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
	    <div class="container margin_30">
	        <div class="row">
	        	@include('template_14.catalog.1_left_filters')

	            <!-- /col -->
	            <div class="col-lg-8">
	            	<div class="breadcrumbs">
	                                <ul>
	                                    <li><a href="/">Inicio</a></li>
	                                    <li>Catálogo</li>
	                                </ul>
	                            </div>
	            	{{--@include('template_14.catalog.2_top_banner')--}}

	            	<!-- /top_banner -->
	                <div id="stick_here"></div>
	                <div class="toolbox elemento_stick add_bottom_30">
	                    <div class="container">
	                        <ul class="clearfix">
	                            <li>
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
	                            </li>
	                            <!--li>
	                                <a href="#0"><i class="ti-view-grid"></i></a>
	                                <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
	                            </li-->
	                            <li>
	                                <a href="#" class="open_filters" id="cerrar_menu_categorias">
	                                    <i class="ti-filter"></i><span>Filters</span>
	                                </a>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
					<!-- /toolbox -->
					<div id="table_data_product">
						@include('template_14.catalog.3_right_catalog')
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
    <link href="/template_14/css/listing.css" rel="stylesheet">
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
    font-size: 0.6rem;
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
	<script src="/template_14/js/catalog.js"></script>
	<script src="/template_14/js/sticky_sidebar.min.js"></script>
	<script src="/template_14/js/specific_listing.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

        /* Preloader */
    $(window).on('load', function() {
        var preloaderFadeOutTime = 500;
        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            setTimeout(function() {
                preloader.fadeOut(preloaderFadeOutTime);
            }, 500);
        }
        hidePreloader();
    });


    });
	</script>
@stop
