@extends('website.layouts.index')

@section('content')

	<section class="slide">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="padding-left: 0px; padding-right: 0px;"></div>
            <div class="col-md-9 col-sm-12 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="row top-row">
                @include('website.home.1_banner')
                @include('website.home.2_promotions')
                </div>
            </div>
        </div>
    </div>
    <div class="sub-banner"></div>
</section>

	@include('website.home.3_prudct_featured')
    @include('website.home.6_banner_companies')
	{{--@include('website.home.4_banner_intermediate')--}}
	@include('website.home.5_banner_category')


  @include('website.home.7_section_blog')





@stop

@section('pulgins-js')
{{--<script type="text/javascript" src="/website/js/home.js"></script>--}}
<script type="text/javascript" src="/website/js/menu.js"></script>
<script type="text/javascript" src="{{ URL::asset('/website/js/featured_products.js') }}"></script>

@stop
