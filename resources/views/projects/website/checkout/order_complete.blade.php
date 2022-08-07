
@extends('website.layouts.index')

@section('content')



 <section class="checkout-page">
        <div class="container">
          <!-- Header -->
          <div class="heading-sub">
              <h3 class="pull-left">Carrito de Compras</h3>
              <ul class="other-link-sub pull-right">
                 <li><a href="#">Inicio</a></li>
                 <li><a href="#">Compras</a></li>
                 <li><a class="active" href="#">Carrito</a></li>
              </ul>
              <div class="clearfix"></div>
          </div>
          <ul class="breadcrumb hidden-sm-down">
              <li><a href="/orden" style="padding: 5px 70px 5px 70px;">01. Carrito de Compras</a></li>
              <li><a href="/orden/info">02. Confirmar</a></li>
              <li><a href="JavaScript:Void(0);"  class="active">03. Orden Completada</a></li>
          </ul>
          <div class="text-center hidden-sm-up">
              <a href="/orden" class="shop-bar1"><i class="fas fa-cart-arrow-down fa-2x"></i></a>
              <a href="/orden/info" class="shop-bar1"><i class="fas fa-address-card fa-2x"></i></a>
              <a href="JavaScript:Void(0);" class="shop-bar"><i class="far fa-thumbs-up fa-2x"></i></a>
          </div>
          <!-- ////// -->
            <div class="complete-page text-center">
                <h2 class="status"><span class="ion-checkmark-circled fa-4 icon-check" ></span>¡Felicidades! Has <span >completado</span> el pago.</h2>
                <br>
                <span>Verfique su correo, le hemos enviado el detalle de su pedido, <br> Gracias por su compra!</span>
            </div>
            <div class="button-option text-center">
                        <a href="/catalogo" class="btn-continue-shopping active">Continuar Comprando </a>

                    </div>
        </div>
</section>


@stop

@section('pulgins-js')

<script type="text/javascript" src="website/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="website/js/catalog.js"></script>
<script type="text/javascript">
  $(".windows8").hide();
</script>
@stop
