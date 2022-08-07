

@extends('template_10.layouts.index')
@section('content')

	<main class="bg_gray">


	<div class="container margin_30">

		<div class="page_header">
			@if(!Auth::check())
			<h1>Registra tus datos para realizar el pedido de tu compra</h1>
			@if (session()->has('data'))
	    		<p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
	    	@endif
			@endif
		</div>
		<!-- /page_header -->
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="step first">
					<h3>1. Datos del Cliente</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">

					  @if(!Auth::check())
						<li class="nav-item" id="pivot">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Registro </a>
							<div class="tooltip" id="tooltip">
									<div class="thumb">
										<img src="/template_10/img/paso_checkout.png" alt="">
									</div>
									<div class="info">
										<h4 class="titulo">Registro de Datos</h4>
									<p class="resumen">Escriba sus datos completos y digite su contraseña para crear su cuenta. En caso que ya se encuentra registrado, Haga click en Ingresar.</p>
										<!--p class="resumen">
											La Torre Eiffel es el monumento más famoso de Paris y símbolo de la capital francesa.<br />
										</p>
										<div class="contenedor-btn">
											<button>Comprar Boletos</button>
										</div-->
									</div>
							</div>

						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Ingresar</a>
						</li>
					  @else
						<li class="nav-item" id="pivot">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Información </a>
						</li>
					  @endif
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<form id="checkout_form">

								@if(!Auth::check())
								<div class="form-group">
									<label>Correo Electrónico</label>
									<input type="email" name="email" class="form-control" placeholder="Correo Eléctrónico">
									<div class="mensaje-error" id="checkout-email-error"></div>
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" name="password" class="form-control" placeholder="Contraseña para crear mi cuenta">
									<div class="mensaje-error" id="checkout-password-error"></div>
								</div>
								<hr>
								@endif
								<div class="form-group">
									<label>Datos para tu comprobante de pago</label>
							    <select class="form-control" name="document_type">
							      <!-- <option value="">Tipo de Documento</option> -->
							      <option value="1">Persona</option>
							      <option value="2">Empresa</option>
							    </select>
							    <div class="mensaje-error" id="checkout-document-type-error"></div>
							  </div>
								<div class="form-group">
									<label>N° de Documento de Identidad</label>
									<input type="text" value="{{ $identity_document }}" name="identity_document" class="form-control" placeholder="Ingrese el N° de RUT">
									<div class="mensaje-error" id="checkout-identity-document-error"></div>
								</div>
								<div class="row no-gutters document-type-one">
									<div class="col-6 form-group pr-1">
										<label>Nombres</label>
									<input type="text" name="first_name" value="{{ $first_name }}" class="form-control" placeholder="Ingrese su nombre">
										<div class="mensaje-error" id="checkout-first-name-error"></div>
									</div>
									<div class="col-6 form-group pl-1">
										<label>Apellidos</label>
										<input type="text" name="last_name" value="{{ $last_name }}" class="form-control" placeholder="Ingrese sus apellidos completos">
										<div class="mensaje-error" id="checkout-last-name-error"></div>
									</div>
								</div>
								<div class="form-group document-type-two">
									<label>Razón Social</label>
									<input type="text" name="business_name" class="form-control" placeholder="Ingrese la Razón Social">
									<div class="mensaje-error" id="checkout-business-name-error"></div>
								</div>
								<div class="form-group" style="display: none;">
									<input type="text" value="{{ $address }}" name="address" class="form-control" placeholder="Dirección">
								</div>
								<!-- /row -->
								<div class="form-group">
									<label>Celular / Whatsapp</label>
									<input type="text" name="phone" value="{{ $cel_whatsapp }}" class="form-control" placeholder="Ingrese su N° celular">
									<div class="mensaje-error" id="checkout-phone-error"></div>
								</div>
								<div class="form-group">
									<label>Fecha de nacimiento</label>
									<input type="text" value="{{ $birthday }}" name="birthday" class="form-control datepicker" placeholder="Ej: 07/02/1991">
									<div class="mensaje-error" id="customer-birthday-error"></div>
								</div>
								<hr>
							</form>

							<hr>
						</div>
						<!-- /tab_1 -->
						@if(!Auth::check())
					  	<div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2">
						{!! Form::open(['class' => 'c-login__form ', 'url' => '/login-from-checkout', 'method' => 'POST', 'role' => 'form']) !!}
						{{ csrf_field() }}
						  {{--
						  <a href="#0" class="social_bt facebook">Login con Facebook</a>
						  <a href="#0" class="social_bt google">Login con Google</a>
						  --}}
						  <div class="form-group">
						  		<label>Correo Electrónico</label>
								<input type="email" name="username" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Contraseña</label>
								<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="password" id="password_in">
							</div>
						  	<div class="clearfix add_bottom_15">
								{{--
								<div class="checkboxes float-left">
									<label class="container_check">Remember me
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
								</div>
								--}}
								<!--div class="float-right"><a id="forgot" href="#0">Lost Password?</a></div-->
							</div>
							  <div id="forgot_pw">
								<div class="form-group">
									<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
								</div>
								<p>A new password will be sent shortly.</p>
								<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
							</div>
							<hr>
							  <input type="submit" class="btn_1 full-width" value="Ingresar">
						{!! Form::close() !!}
						</div>
						@endif
						<!-- /tab_2 -->
					</div>
				</div>
				<!-- /step -->
			</div>
			<div class="col-lg-3 col-md-6">
					<div class="step middle">
						<h3>2. Método de entrega</h3>
						<div class="payments method-payments">
							<form id="other-billing_form">
								<input type="hidden" name="" id="country_id" value="{{ $country_id }}">
								<input type="hidden" name="" id="city_id" value="{{ $city_id }}">
								<input type="hidden" name="" id="province_id" value="{{ $province_id }}">
								<input type="hidden" name="" id="district_id" value="{{ $district_id }}">
								<div class="payments">
									<ul>
										<li>
											<label class="container_radio">Retiro en Tienda<a href="#0" class="info" data-toggle="modal" data-target="#payments_store"></a>
												<input type="radio" name="on-shop" id="on-shop" checked="checked">
												<span class="checkmark"></span>
											</label>
										</li>

										<li>
											<label class="container_radio">Envío a domicilio<a href="#0" class="info" data-toggle="modal" data-target="#home_delivery"></a>
												<input type="radio" name="delivery-home" id="delivery-home">
												<span class="checkmark"></span>
											</label>
										</li>
										<!--li>
											<label class="container_radio">Envío gratis<a href="#0" class="info" data-toggle="modal" data-target="#free_shipping"></a>

												<span class="checkmark"></span>
											</label>

										</li-->

									</ul>
									
								</div>

<!-- 							<div class="form-group">
								<label class="container_check" id="other_addr">Envíos a domicilio
								  <input type="checkbox" id="other-billing-address">
								  <span class="checkmark"></span>
								</label>
							</div> -->
							<div id="other_addr_c" class="pt-2">

							<!-- /row -->

							<div class="row no-gutters">
								<div class="col-md-12 form-group" style="display: none;">
									<label>Sucursal</label>
									<div class="form-group">
									<input type="text" name="address" class="form-control" value="Sucursal Tacna" disabled>
									</div>
								</div>
								<div class="col-md-12 form-group" style="margin-bottom: 0rem !important;">
									<label>País</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="country_id">
											<option value="" selected>Pais</option>
											@foreach($countries as $key => $country)
												@if($country['id'] == $country_id)
													<option value="{{ $country['id'] }}"selected=selected>{{ $country['name'] }}</option>
												@else
													<option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row no-gutters">
								<div class="col-md-6 form-group pr-1" style="margin-bottom: 0rem !important;">
									<label>Ciudad</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="city_id">
											<option value="0" selected>Departamento</option>
											<option value="1">Tacna</option>
											<option value="2">Moquegua</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 form-group pr-1" style="margin-bottom: 0rem !important;">
									<label>Provincia</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="province_id">
											<option value="0" selected>Provincia</option>
											<option value="1">Tacna</option>
											<option value="2">Tarata</option>
										</select>
									</div>
								</div>
							</div>

							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-md-12 form-group" style="margin-bottom: 0rem !important;">
									<label>Zonas y Distritos</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="district_id">
											<option value="0" selected>Distrito</option>
											<option value="1">Tacna</option>
											<option value="2">Alto de la Alianza</option>
											<option value="2">Ciudad Nueva</option>
											<option value="2">Gregorio Albarracín</option>
										</select>
										<div class="text-danger" id="shipping-error"></div>
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-bottom: 0rem !important;">
								<label>Dirección de Entrega</label>
								<input type="text" value="{{ $address_two }}" name="address" class="form-control" placeholder="Dirección del Entrega">
							</div>
							{{--<div class="form-group">
								
								<label class="container_check"> 
									@if(!Auth::check())
								  <input type="checkbox" id="terms-conditions">
								  @else
								  <input type="checkbox" checked  id="terms-conditions">
								  @endif
								  <span class="checkmark"></span>
								</label>

								<span style="padding-left: 30px">Importante: Acepto las</span><br>
								<span style="padding-left: 30px"><a href="#0" class="info" data-toggle="modal" data-target="#home_delivery_policies">Políticas de entrega a Domicilio.</a></span>
								<hr>
								<p style="text-align: justify; line-height: 15px;"><strong>Nota : </strong>  Toda entrega está sujeta a acceso y ubicación exacta del domicilio, para consultas sobre estado de entregas, confirmación o reprogramación de su despacho favor comuníquese al Teléfono   {{ $company_main->phone }}.</p>
							</div>--}}
							<div class="form-group" style="display: none;">
								<input type="number" value="{{ $identity_document_two }}" name="identity_document" class="form-control" placeholder="N° DNI">
							</div>
							<div class="row no-gutters" style="display: none;">
								<div class="col-6 form-group pr-1">
									<input type="text" value="{{ $first_name_two }}" name="first_name" class="form-control" placeholder="Nombres">
								</div>
								<div class="col-6 form-group pl-1" style="display: none;">
									<input type="text" value="{{ $last_name_two }}" name="last_name" class="form-control" placeholder="Apellidos">
								</div>
							</div>
							<!-- /row -->
							<div class="form-group" style="display: none;">
								<input type="text" value="{{ $cel_whatsapp_two }}" name="phone" class="form-control" placeholder="Celular de contacto">
							</div>
							</div>
							</form>
							<!-- /other_addr_c -->
						</div>





					</div>
					<!-- /step -->

				</div>
				<div class="col-lg-3 col-md-6">
					<div class="step middle">
						<h3>2. Formas de Pago</h3>
						<div class="payments method-payments_">
							<ul >
								@foreach ($accounts as $key => $account)
								<li>
									<label class="container_radio">{{ $account['name'] }}
										{{--<a href="#0" class="info" data-toggle="modal" data-target="#payments_method_{{ $account['id'] }}"></a>--}}
										<input type="radio" name="account_id" data-index="{{ $account['id'] }}" checked>
										<span class="checkmark"></span>
									</label>
									<div style="padding-left: 30px;">
										{!! $account['instructions'] !!}
									</div>
									
								</li>
								@endforeach

								{{--
								<li>
									<label class="container_radio">Paypal<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="payment">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Cash on delivery<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="payment">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Bank Transfer<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="payment">
										<span class="checkmark"></span>
									</label>
								</li>
								--}}
							</ul>
						</div>

							{{--<div class="form-group">
									<label class="container_check">¿Pago en tienda con tarjeta de credito o débito? Aceptamos todas estas tarjetas.
									  <input type="checkbox" id="credit_card_comission">
									  <span class="checkmark"></span>
									  <img src="/template_3/img/tarjetas.png" data-src="/template_3/img/tarjetas.png" alt="" height="28" class="lazy" style="padding-left: 25px;">
									</label>
									
							</div>--}}


							{{--<div class="form-group">
									<label class="container_check">Solicito Factura. No válido para productos de Zofra de Tacna
									  <input type="checkbox" id="with_invoice">
									  <span class="checkmark"></span>
									</label>
							</div>--}}

							{{--
							<div class="payment_info d-none d-sm-block"><figure><img src="img/cards_all.svg" alt=""></figure>	<p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones sea.</p></div>

							<h6 class="pb-2">Shipping Method</h6>

							<ul>
								<li>
									<label class="container_radio">Standard shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="shipping" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Express shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="shipping">
										<span class="checkmark"></span>
									</label>
								</li>

							</ul>
							--}}

					</div>
					<!-- /step -->

				</div>
				<div class="col-lg-3 col-md-6">
					<div class="step last">
						<h3>3. Resumen de su Orden</h3>

					<div class="box_general summary">
						<ul id="checkout_tbody">
							{{--
							<li class="clearfix"><em>1x Armor Air X Fear</em>  <span>$145.00</span></li>
							<li class="clearfix"><em>2x Armor Air Zoom Alpha</em> <span>$115.00</span></li>
							--}}
						</ul>

						<ul>
							<li class="clearfix"><em><strong>Subtotal</strong></em>  <span id="checkout_subtotal"></span></li>
							<li class="clearfix"><em><strong>DSCTO.</strong></em>  <span id="checkout_discount">0.00</span></li>
							<li class="clearfix"><em><strong>Costo de Envío</strong></em> <span id="checkout_shipping-cost">S/0.00</span></li>
							<li class="clearfix"><em><strong>Comisión 5%</strong></em> <span id="checkout_credit-card-comission">S/0.00</span></li>
						</ul>
						<div class="total clearfix">TOTAL <span id="checkout_total"></span></div>
						<div class="form-group">
								<label class="container_check">Suscribirme para recibir Novedades
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>

						{{--<a href="" class="btn_1 full-width" id="checkout__save">Comfirmar la compra</a> --}}
						<button class="btn_1 full-width" id="checkout__save">Confirmar la compra</button>
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->


	<!-- Modal Payments Method-->
	{{--@foreach($accounts as $i => $account)
	<div class="modal fade" id="payments_method_{{ $account['id'] }}" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">{{ $account['name'] }}</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  	{!! $account['instructions'] !!}
		 
		  </div>
		</div>
	  </div>
	</div>
	@endforeach--}}

	<div class="modal fade" id="payments_store" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Retiro en Tienda</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Elige esta opción y tu producto estará listo para ser entregado en horario de tienda Física, previa coordinación y confirmación de pago. El retiro de tienda no tiene costo adicional.</p>
		  </div>
		</div>
	  </div>
	</div>

	<div class="modal fade" id="home_delivery" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Envío a Domicilio</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>{{$shipping_policies}}</p>
		  </div>
		</div>
	  </div>
	</div>

		<div class="modal fade" id="free_shipping" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Envío Gratis</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Los envíos gratuitos son realizados en los productos que tenga el distintivo de ENVÍO GRATIS.
Solicita tu cupón de descuento para este beneficio al Cel. 976188973.<br><br>
Solo válido para la ciudad de Puno. (Sujeto a ubicación y accesibilidad del Transporte) .</p>
		  </div>
		</div>
	  </div>
	</div>

	{{--<div class="modal fade" id="home_delivery_policies" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Política de Entrega a Domicilio</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Toda envío a domicilio se limita con la entrega del producto hasta la puerta de su domicilio, el transportista no está obligado a acceder ni manipular el producto para su ingreso, ni este es un condicional para la recepción del producto , si el cliente se niega a la recepción del mismo el transportista le hará saber que el producto  será regresado a almacén y tendrá que asumir el flete de regreso , nuestra empresa protege la salud de nuestros trabajadores y de nuestros clientes por la coyuntura que estamos atravesando debido al covid-19, por tal motivo agradecemos su compresión .</p>
		  </div>
		</div>
	  </div>
	</div>--}}
<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_4/css/checkout.css" rel="stylesheet">
    <link href="/template_2/css/tooltips.css" rel="stylesheet">

@stop
@section('plugins-js')

<script>
		$(`input[name="birthday"]`).datepicker({
		    format: 'dd/mm/yyyy',
		    language: 'es-ES',
		});

		const calcularPosicionTooltip = () => {
	// Calculamos las coordenadas del icono.
	const x = icono.offsetLeft;
	const y = icono.offsetTop;

	// Calculamos el tamaño del tooltip.
	const anchoTooltip = tooltip.clientWidth;
	const altoTooltip = tooltip.clientHeight;

	// Calculamos donde posicionaremos el tooltip.
	const izquierda = x - (anchoTooltip / 2) + 80;
	const arriba = y - altoTooltip - 20;

	tooltip.style.left = `${izquierda}px`;
	tooltip.style.top = `${arriba}px`;
};

	$(document).ready(function(){

		timer = setTimeout(() => {
		tooltip.classList.add('activo');
	}, 10);

});

  //   	// Other address Panel
		// $('#other_addr input').on("change", function (){
	 //        if(this.checked) {
	 //            $('#other_addr_c').fadeIn('fast');
	 //        	//$(`#checkout__save`).attr('disabled',true);
	 //        	$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);
	 //        } else {
	 //            $('#other_addr_c').fadeOut('fast');
		// 		//$(`#checkout__save`).attr('disabled',false);
	 //        	$(`#checkout_shipping-cost`).html(`S/0`);

		// 	}

	 //    });
	</script>
	<script src="/template_10/js/orden_info.js"></script>
	<script src="https://checkout.culqi.com/js/v3"></script>
	<script src="/template_2/js/tooltips.js"></script>

@stop
