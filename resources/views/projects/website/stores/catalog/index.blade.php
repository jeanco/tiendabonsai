
@extends('website.layouts.index')

@section('content')

	<section class="shop-list-v2-page">
        <div class="container">
           @include('website.catalog.1_banner')
            <div class="widget-product-list">

                <div class="row" >
                	@include('website.catalog.2_left_filter')
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
                    <div id="table_data" class="text">
                            @include('website.catalog.3_right_catalog')
                    </div>
                </div>
            </div>
        </div>
    </section>





@stop

@section('pulgins-js')

<script type="text/javascript" src="website/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="website/js/catalog.js"></script>

<script type="text/javascript">


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





