
@extends('website.layouts.index')

@section('content')

<section class="shop-single-page">
    <div class="container">
            <!-- <div class="heading-sub">
                <h3 class="pull-left">shop single</h3>
                <ul class="other-link-sub pull-right">
                    <li><a href="shop-single.html#home">Home</a></li>
                    <li><a href="shop-single.html#shop">Shop</a></li>
                    <li><a class="active" href="shop-single.html#detail">Detail</a></li>
                </ul>
                <div class="clearfix"></div>
            </div> -->
        <br>
        <input type="hidden" id="company_id" value="{{ $product['company_id'] }}">
        <div class="widget-shop-single">
            <div class="row">
            	<div class="col-md-5 col-sm-12">
                @include('website.catalog.perfil.1_product_left')
              </div>
              <div class="col-md-7 col-sm-12">
                @include('website.catalog.perfil.2_product_right')
              </div>
            </div>
            <div class="product-detail-bottom">
                @include('website.catalog.perfil.3_product_content')
            </div>
        </div>
        <div class="related-product-page">
            @include('website.catalog.perfil.4_product_relations')
        </div>
    </div>
</section>

<!-- <a href="#"  class="shoppingCard" style="margin: 30px; position: fixed; right: 0px; bottom: 280px; z-index: 5;">
    <div   class="carrito animElem elmActive">
        <div class="mango"></div>
        <div class="cesta"></div>
        <div class="ruedas"></div>
    </div>
    <div  class=" check animElem"></div>
</a> -->

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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script type="text/javascript" src="/website/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="/website/js/location.js"></script>
{{--<script type="text/javascript" src="/website/js/home.js"></script>--}}

<script type="text/javascript">
    var aux = 0;
$(document).ready(function(){
  $(".windows8").hide();
  $(".shoppingCard").click(function(e){
    e.preventDefault();
    $(this).find(".check, .carrito").toggleClass("elmActive");
  });


});




$(".ok").click(function() {
    //add_cart_notification();
       console.log(aux);


        if (aux==0){
            $(".shoppingCard").click();
       const element =  document.querySelector('.shoppingCard ')
        /*element.classList.add('animated', 'bounceOut','delay-1s')*/
            aux=1;
        }else{
            console.log('entro');
          /*  $.growl.notice({ message: "Se ha confirmado la orden." });*/

        // mostrar_carrito();
        Swal.fire({

          position: 'center',
         // icon: 'success',
          title: '¡Se a agregado a su carrito!',
          showConfirmButton: false,
          timer: 1500,
          /*showClass: {
            popup: 'animated fadeInDown faster'
          },*/
           imageUrl: 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/dab60938212491.5968c68fa9113.gif',  
          imageAlt: 'Custom image',
          imageWidth: 250,
           // imageHeight: 200,
        })
        }



        





  });


function mostrar_carrito(){

                 $(".shoppingCard").removeClass("animated");
                 $(".shoppingCard").removeClass("bounceOut");
                 $(".shoppingCard").removeClass("delay-0.5s");
                $(".shoppingCard").click();
                setTimeout(function() {
                $(".shoppingCard").click();
                const element =  document.querySelector('.shoppingCard ')
                 element.classList.add('animated', 'bounceOut','delay-0.5s')

                  }, 500);

}



var bandera = 1;
$(document).on('click', '.notification_cart', function() {
        //add_cart_notification();
       //console.log("JEAN PASO POR AQUI");
       //$(".shoppingCard").click();

       if (bandera == 1) {
        $('body, html').animate({
            scrollTop: '0px'
        }, 250);

        const element =  document.querySelector('.photo-cart ')
        element.classList.add('animated', 'bounce','delay-0s')
        bandera = 0;
       }else{

       }




});

</script>
@stop
