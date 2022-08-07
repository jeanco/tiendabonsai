
@extends('template_7.layouts.index')
@section('content')
<!-- Content -->

<main>
	    <div class="container margin_30">
	        <div class="row">
	        	@include('template_7.catalog.1_left_filters')

	            <!-- /col -->
	            <div class="col-lg-9">
	            	@include('template_7.catalog.2_top_banner')

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
	                </div>
					<!-- /toolbox -->
					<div id="table_data_product">
						@include('template_7.catalog.3_right_catalog')
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
    <link href="/template_7/css/listing.css" rel="stylesheet">
@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
	<script src="/template_7/js/catalog.js"></script>
	<script src="/template_7/js/sticky_sidebar.min.js"></script>
	<script src="/template_7/js/specific_listing.js"></script>
@stop
