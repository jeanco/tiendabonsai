@extends('website.layouts.index')
@section('content')
<section class="checkout-page">
  <div class="container">
    <!-- Header -->
    {{--<div class="heading-sub">
      <h3 class="pull-left">Carrito de Compras</h3>
      <ul class="other-link-sub pull-right">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Compras</a></li>
        <li><a class="active" href="#">Carrito</a></li>
      </ul>
      <div class="clearfix"></div>
    </div>--}}
    <ul class="breadcrumb hidden-sm-down">
      <li><a href="/orden" style="padding: 26px 50px 26px 65px;">01. Carrito de Compras</a></li>
      <li><a href="/orden/info" style="padding: 26px 50px 26px 65px;">02. Confirmar</a></li>
      <li><a href="/orden/pago-en-linea" class="active" title="" style="padding: 26px 50px 26px 65px;">03. Orden de Pago</a></li>
      <li><a href="#" title="" style="padding: 26px 50px 26px 65px;">04. Orden Completada</a></li>
    </ul>
    <div class="text-center hidden-sm-up">
      <a href="/orden" class="shop-bar1"><i class="fas fa-cart-arrow-down fa-2x"></i></a>
      <a href="/orden/info" class="shop-bar1"><i class="fas fa-address-card fa-2x"></i></a>
      <a href="/orden/pago-en-linea" class="shop-bar"><i class="far fa-credit-card fa-2x"></i></a>
      <a href="JavaScript:Void(0);" class="shop-bar1"><i class="far fa-thumbs-up fa-2x"></i></a>
    </div>
    <!-- ////// -->
    <div class="checkout-cart-form">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="billing-details-heading">
            <h2 class="billing-title">
            Medio de Pago
            </h2>
          </div>
          <div class="row" style="margin-top: 20px;">
            <div class="col-md-4 col-sm-12"><label>Tarjeta de Crédito o Débito</label></div>
            <div class="col-md-8 col-sm-12">
              <div>
                <form>
                  <div>
                    <label>
                      <span style="font-weight: 400;">Correo Electrónico</span>
                      <input class="form-control" type="text" size="50" data-culqi="card[email]" id="card[email]">
                    </label>
                  </div>
                  <div>
                    <label>
                      <span style="font-weight: 400;">Número de tarjeta</span>
                      <input class="form-control input-credit-card" type="text" size="20" data-culqi="card[number]" id="card[number]">
                    </label>
                  </div>
                  <div>
                    <label>
                      <span style="font-weight: 400;">CVV</span>
                      <input class="form-control" type="text" size="4" data-culqi="card[cvv]" id="card[cvv]">
                    </label>
                  </div>
                  <div>
                    <label>
                      <span style="font-weight: 400;">Fecha expiración (MM/YYYY)</span>
                      <div class="row" style="display: flex; align-items: center;">
                        <div class="col-md-5" style="display: flex;"><input class="form-control" size="2" data-culqi="card[exp_month]" id="card[exp_month]"></div>
                        <div class="col-md-1" style="display: flex;">/</div>
                        <div class="col-md-5" style="display: flex;"><input class="form-control" size="4" data-culqi="card[exp_year]" id="card[exp_year]"></div>
                      </div>


                    </label>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="aside-shopping-cart-total">
            <h2>TOTAL DE CARRITO</h2>
            <ul>
              <li><span class="text">Subtotal:</span><span class="cart-number" id="payment_subtotal">S/.0.00</span></li>
          <li><span class="text">Total:</span><span class="cart-number big-total-number" id="payment_total">S/.0.00</span></li>
        </ul>
        <div class="process">
          <a href="#"><button class="btn-checkout" id="btn_pagar">CONFIRMAR COMPRA</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="shopping-cart-option">
    <div class="button-option">
      <a href="/catalogo" class="btn-continue-shopping active">Continuar Comprando </a>
      <a href="#" onclick="localStorage.removeItem('cart');window.location.reload();return false;" class="btn-clear">Vaciar Carrito</a>
    </div>
    <!--div class="shopping-cart-coupon">
    <div class="row">
      <div class="col-md-5 col-sm-12">
        <form action="checkout-1.html#" method="POST" class="coupon-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Coupon Code">
            <span class="icon-coupon"></span>
          </div>
          <button type="submit" class="btn-submit"></button>
        </form>
      </div>
      <div class="col-md-7 col-sm-12">
        <a href="#" class="btn-update-cart">Actualizar</a>
      </div>
    </div>
  </div-->
</div>
</div>
</div>
</section>
@stop
@section('pulgins-js')
<script type="text/javascript" src="/website/js/bootstrap-slider.min.js"></script>
<!-- <script type="text/javascript" src="website/js/catalog.js"></script> -->
<script type="text/javascript" src="/oyeepe/js/payment.js"></script>
<script src="https://checkout.culqi.com/v2"></script>
<script type="text/javascript" src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
<script type="text/javascript">
    var cleaveCreditCard = new Cleave('.input-credit-card', {
    creditCard: true
    });
</script>
<script>
  $(".windows8").hide();
  //Culqi.publicKey = 'pk_test_yv85Xy5wMKbc0SU1'; //oyeepe
  Culqi.publicKey = 'pk_test_b972b42883c7acbe'; //noveltie
  Culqi.init();
</script>
<script>
  $('#btn_pagar').on('click', function(e) {
  // Crea el objeto Token con Culqi JS
  Culqi.createToken();
  e.preventDefault();
  });

  function culqi() {
      if (Culqi.token) { // ¡Objeto Token creado exitosamente!
      var token = Culqi.token.id;
      alert('Se ha creado un token:' + token);

      axios.post(`/api/oyeepe/register-order`, {
          'token_example': token,
          'product_ids': localStorage.getItem('cart'),
          'identity_document': localStorage.getItem('identity_document'),
      })
      .then((risposta) => {
            // console.log(risposta.data);
            localStorage.removeItem('cart');
            console.log(risposta.data);
            window.location.replace('/completado');

            //Ajax to the orden;

      })
      .catch((error) => {
        console.log(error.response.data);
      });


      //En esta linea de codigo debemos enviar el "Culqi.token.id"
      //hacia tu servidor con Ajax
      } else { // ¡Hubo algún problema!
      // Mostramos JSON de objeto error en consola
      console.log(Culqi.error);
      alert(Culqi.error.user_message);
      }
  };
</script>


@stop
