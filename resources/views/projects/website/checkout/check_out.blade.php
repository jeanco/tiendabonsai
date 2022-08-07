
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
              <li><a href="/orden/info" class="active" style="padding: 5px 70px 5px 70px;">02. Confirmar</a></li>
              <li><a href="JavaScript:Void(0);" title="">03. Orden Completada</a></li>
          </ul>
          <div class="text-center hidden-sm-up">
            <a href="/orden" class="shop-bar1"><i class="fas fa-cart-arrow-down fa-2x"></i></a>
            <a href="/orden/info" class="shop-bar"><i class="fas fa-address-card fa-2x"></i></a>
            <a href="JavaScript:Void(0);" class="shop-bar1"><i class="far fa-thumbs-up fa-2x"></i></a>
          </div>
          <!-- ////// -->
            <div class="orders">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="login-required">
                            <p>¿Eres Cliente? CLICK <a href="#" title="" class="login">AQUÍ</a> PARA INGRESAR</p>
                            <p>¿Tiene un cupón? CLICK <a href="#" title="" class="coupon-code">AQUÍ</a> E INGRESA TU CÓDIGO</p>
                        </div> -->
                        <div class="billing-details">
                            <div class="billing-details-heading">
                                <h2 class="billing-title">
                                        Detalles de facturación
                                    </h2>
                            </div>
                            <div class="billing-details-content">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>DNI</strong>
                                            <input type="text" name="postcode" class="form-control" id="checkout_identity-document" value="{{ (Auth::check()) ? \App\Customer::whereUserId(Auth::user()->id)->first()->identity_document : '' }}">
                                        </div>
                                        <div class="col-md-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Nombres *</strong>
                                            <input type="text" name="first_name" class="form-control" id="checkout_firstname" value="">
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Apellidos *</strong>
                                            <input type="text" name="last_name" class="form-control" id="checkout_lastname" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Correo electrónico *</strong>
                                            <input type="text" name="email" class="form-control" id="checkout_email_" value="">
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Celular *</strong>
                                            <input type="text" name="phone" class="form-control" id="checkout_cel-whatsapp_" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>País *</strong>
                                            <select name="CountryType" id="checkout_country" class="form-control">
                                                @foreach($countries as $key => $country)
                                                    <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Ciudad*</strong>
                                            <select name="CountryType" id="checkout_city" class="form-control">
                                                @foreach($cities as $key => $city)
                                                    <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Dirección *</strong>
                                            <input type="text" name="address" class="form-control" id="checkout_address" value="">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="checkbox" name="acc"> Create an account?
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Observación</strong>
                                            <textarea name="note" id="checkout_description" tabindex="2" class="form-control form-textarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(!Auth::check())
                            <input type="checkbox" name="" id="checkout_create-a-user">
                            <label>¿Desea crear un usuario?</label>
                            @endif
                            <br>
                            <div id="checkout_create-a-user-area" style="display: none;">
                                <div class="row" style="display: flex; margin-bottom: 10px;">
                                    <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Titular de línea</div>
                                    <div class="col-md-10 col-sm-12">
                                        <input type="text" name="" class="form-control" value="" id="register_cel-holder">
                                        <div id="register-cel-holder-error" class="mensaje-error text-danger"></div>
                                    </div>
                                </div>
                                <div class="row" style="display: flex; margin-bottom: 10px;">
                                    <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Sexo</div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control" id="register_gender">
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                            <option value="0">Otros</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">F. Nac.</div>
                                    <div class="col-md-4 col-sm-12">
                                        <input type="date" name="" class="form-control" id="register_birthday" value="">
                                    </div>
                                </div>
                                <div class="row" style="display: flex; margin-bottom: 10px;">
                                    <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Contraseña</div>
                                    <div class="col-md-10 col-sm-12">
                                        <input type="text" name="" class="form-control" id="register_password" value="">
                                        <div id="register-password-error" class="mensaje-error text-danger"></div>
                                    </div>
                                </div>
                                <div class="row" style="display: flex; margin-bottom: 10px;">
                                    <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Repetir Contraseña</div>
                                    <div class="col-md-10 col-sm-12">
                                        <input type="text" name="" class="form-control" id="register_password-verification" value="">
                                        <div id="register-password-confirmation-error" class="mensaje-error text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>












                    </div>
                    <div class="col-md-4">
                        <div class="aside-order">
                            <h2>FORMA DE PAGO</h2>
                            
                            
                            <div class="order-transfer clearfix">
                                <ul class="tabs">
                                    @foreach($accounts as $key => $account)
                                    <li data-index={{ $account['id'] }} class="payment-way-selected {{ ($key == 0) ? 'active' : '' }}">
                                        <img height="20px" " src="{{ $account['payment_entity']['logo'] }}">
                                        <h4>{{ $account['name'] }}
                                            <span>{{-- $account['description'] --}}</span></h4>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="checkout-cart-form">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="billing-details-heading">
            <h2 class="billing-title">
            Medio de Pago
            </h2>
          </div>
          <div class="row" style="margin-top: 20px;">
            <div class="col-md-12 col-sm-12"><label>Tarjeta de Crédito o Débito</label></div>
            <div class="col-md-12 col-sm-12">
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
                  <div class="process">
          <a href="#"><button class="btn-checkout" id="btn_pagar">CONFIRMAR COMPRA</button></a>
        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
       
  </div>
  
</div>

                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="aside-order">
                            <h2>SU PEDIDO</h2>
                            <table class="table table-product">
                                <thead>
                                    <tr>
                                        <th>PRODUCTO</th>
                                        <th style="width: 27%;"></th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody id="checkout_tbody">

                                </tbody>
                            </table>
                            <ul class="tabs-first">
                                <li><span class="text" >Subtotal:</span><span class="cart-number sub-number pull-right" id="checkout_subtotal">$1,750.00</span></li>
                                <!--li><span class="text">ENVÍO:</span><br><br>
                                  <input class="inputcheck" id="radio1" type="checkbox" style="display: none;">
                                  <label class="checkbox" for="radio1" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;NACIONAL: $12.00</label>
                                  <input class="inputcheck" id="radio2" type="checkbox" style="display: none;">
                                  <label class="checkbox" for="radio2" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;Envio Gratis</label>
                                  <input class="inputcheck" id="radio3" type="checkbox" style="display: none;">
                                  <label class="checkbox" for="radio3" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;INTERNACIONAL: $60.00</label>
                                  <input class="inputcheck" id="radio4" type="checkbox" style="display: none;">
                                  <label class="checkbox" for="radio4" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;DELIVERY LOCAL: $5.00</label>
                                </li-->
                                {{-- <li><span class="text">Envío:</span>
                                    <div class="shipping">
                                        <form action="checkout-2.html#">
                                            <input type="radio" name="gender" value="Flat" id="radio1" checked="checked">
                                            <label for="radio1">NACIONAL: <span class="shipping-number">$12.00</span></label>
                                            <input type="radio" name="gender" value="Free" id="radio2">
                                            <label for="radio2">Envio Gratis</label>
                                            <input type="radio" name="gender" value="Delivery" id="radio3">
                                            <label for="radio3">INTERNACIONAL: <span class="shipping-number">$60.00</span></label>
                                            <input type="radio" name="gender" value="Local-Delivery" id="radio4">
                                            <label for="radio4">DELIVERY LOCAL: <span class="shipping-number indent">$5.00</span></label>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </li> --}}
                                <li><span class="text" >Total:</span><span class="cart-number big-total-number pull-right" id="checkout_total">$1,750.00</span></li>
                                <li><span class="text">Subtotal:</span><span class="cart-number" id="payment_subtotal">S/.0.00</span></li>
                            </ul>
                            {{--<div class="order-transfer clearfix">
                                <ul class="tabs">
                                    @foreach($accounts as $key => $account)
                                    <li data-index={{ $account['id'] }} class="payment-way-selected {{ ($key == 0) ? 'active' : '' }}">
                                        <img height="40px" " src="{{ $account['payment_entity']['logo'] }}">
                                        <h4>{{ $account['name'] }}
                                            ></h4>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>--}}
                            <a href="/completado" type="submit" id="checkout__save" class="btn-order" style="text-align: center;">realizar pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop

@section('pulgins-js')

<script type="text/javascript" src="/website/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="/website/js/orden_info.js"></script>
<script type="text/javascript">

    $(".windows8").hide();

$(`#checkout_create-a-user`).on('change', function(E) {
  E.preventDefault();
  let _that = $(this);

  if (_that.prop('checked')) {
    $(`#checkout_create-a-user-area`).show();
  } else {
    $(`#checkout_create-a-user-area`).hide();
    // console.log("Non checked");
  }
});

</script>

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
