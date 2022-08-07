@extends('website.layouts.index')

@section('content')

	<section class="shop-list-v2-page">
        <div class="container">
           @include('website.catalog.1_banner')
            <div class="widget-product-list">
							<div id="circulo_" class="hide" style="position:relative; left:30%; padding-top: 330px; padding-bottom: 100px;">
											<div class="preloader-wrapper big active">
											<div class="spinner-layer spinner-blue-only">
												<div class="circle-clipper left">
													<div class="circle"></div>
												</div><div class="gap-patch">
													<div class="circle"></div>
												</div><div class="circle-clipper right">
													<div class="circle"></div>
												</div>
											</div>
										</div>
								</div>
                <div class="row" >
                	@include('website.catalog.2_left_filter')
									<div class="col-md-9 col-xs-12">
										<div id="table_data" class="text">
                            @include('website.catalog.3_right_catalog')
                    </div>
									</div>
                </div>
            </div>
        </div>
    </section>


@stop

@section('pulgins-js')

<style type="text/css">


.shoppingCard
{
  display: block;
  background-color: #24ca8a;
  width: 92px;
  height: 87px;
  border-radius: 6px;
  position: absolute;
  /*left: 45%;
  top: 45%;*/
}
.animElem
{
  opacity: 0;
  position: absolute;
  width: 92px;
  height: 87px;
  /* Animation */
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
/* Tick */
.check
{
  -webkit-transform: scale(0);
  -o-transform: scale(0);
  -moz-transform: scale(0);
  transform: scale(0);
}
.check:after
{
  content: "";
  display: block;
  width: 8px;
  height: 22px;
  border-radius: 9px;
  background-color: white;
  position: absolute;
  left: 32px;
  top: 42px;
  -webkit-transform: rotate(-35deg);
  -o-transform: rotate(-35deg);
  -moz-transform: rotate(-35deg);
  transform: rotate(-35deg);
}

.check:before
{
  content: "";
  display: block;
  width: 8px;
  height: 42px;
  border-radius: 10px;
  background-color: white;
  position: absolute;
  left: 48px;
  top: 24px;
  -webkit-transform: rotate(35deg);
  -o-transform: rotate(40deg);
  -moz-transform: rotate(40deg);
  transform: rotate(40deg);
}

/* Carrito */
.carrito
{
  -webkit-transform: scale(0);
  -o-transform: scale(0);
  -moz-transform: scale(0);
  transform: scale(0);
}
.mango
{
  position: absolute;
  left: 26px;
  top: 25px;
  width: 8px;
  height: 4px;
  background-color: white;
}
.cesta
{
  width: 35px;
  height: 25px;
  background-color: white;
  position: absolute;
  top: 29px;
  left: 30px;
}
.cesta:after
{
  content: "";
  display: block;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 25px 0 0 5px;
  border-color: transparent transparent transparent #24ca8a;
}
.cesta:before
{
  content: "";
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 0 0 6px 25px;
  border-color: transparent transparent #24ca8a transparent;
  position: absolute;
  bottom: 3px;
  right: 0px;
}
.ruedas
{
  width: 9px;
  height: 9px;
  border-radius: 100%;
  position: absolute;
  left: 32px;
  top: 54px;
  background-color: white;
  box-shadow: 22px 0px 0px white;
}
/* Fin Carrito */
/* CssEvent */
.elmActive
{
  opacity: 1 !important;
  -webkit-transform: scale(1) !important;
  -o-transform: scale(1) !important;
  -moz-transform: scale(1) !important;
  transform: scale(1) !important;
}

</style>

<script type="text/javascript" src="website/js/bootstrap-slider.min.js"></script>
{{-- <script type="text/javascript" src="/js/cart.js"></script> --}}
<script type="text/javascript" src="website/js/catalog.js"></script>

<script type="text/javascript" >

$.scrollUp({
        scrollText: 'ver catalogo',
        scrollTarget: 400,
    });



    $('.catalog-subcategory__change').click(function(){
        $("#scrollUp").click();
    });

    $('.ver_click').click(function(){
    //Some code
    //ocultar();
    //setTimeout(carga, 2000);
    $("#scrollUp").click();
    });

    $('.catalog-brand__change').change(function() {
        //ocultar();
        //setTimeout(carga, 2000);
        $("#scrollUp").click();
    });

    $('.catalog-color__change').click(function() {
        //ocultar();
        //setTimeout(carga, 2000);
        $("#scrollUp").click();
    });

    $('.catalog-category__change').on('click', function(){
        $("#scrollUp").click();
    });

    $(document).on('click', '.pagination li a', function(){
        $("#scrollUp").click();
        //console.log("victoria justice");
    });

    // $('ul li a').click(function() {
    //     //ocultar();
    //     //setTimeout(carga, 2000);
    //     $("#scrollUp").click();
    // });
</script>
@stop
