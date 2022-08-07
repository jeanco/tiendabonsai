

@extends('template_7.layouts.index')
@section('content')

	<main class="bg_gray">


	<div class="container margin_30">

		<div class="page_header">
			@if(!Auth::check())
			<h1>Registra tus datos para realizar el pedido de compra</h1>
			@if (session()->has('data'))
	    		<p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
	    	@endif
			@endif
		</div>
		<!-- /page_header -->
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="step first">
					<h3>1. Datos del Cliente</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">

					  @if(!Auth::check())
						<li class="nav-item" id="pivot">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Registro </a>

						</li>
						<!--li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Ingresar</a>
						</li-->
					  @else
						<li class="nav-item" id="pivot">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Información </a>
						</li>
					  @endif
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<form id="checkout_form">
								<div class="row no-gutters document-type-one">
									<div class="col-6 form-group pr-1">
									<input type="text" name="first_name" value="{{ $first_name }}" class="form-control" placeholder="Nombres">
										<div class="mensaje-error" id="checkout-first-name-error"></div>
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" name="last_name" value="{{ $last_name }}" class="form-control" placeholder="Apellidos">
										<div class="mensaje-error" id="checkout-last-name-error"></div>
									</div>
								</div>
								<div class="form-group">
									<input type="text" value="{{ $identity_document }}" name="identity_document" class="form-control" placeholder="N° de Documento">
									<div class="mensaje-error" id="checkout-identity-document-error"></div>
								</div>
								<div class="form-group">
									<input type="text" name="phone" value="{{ $cel_whatsapp }}" class="form-control" placeholder="Teléfono">
									<div class="mensaje-error" id="checkout-phone-error"></div>
								</div>
								<div class="form-group document-type-two">
									<input type="text" name="business_name" class="form-control" placeholder="Razon Social">
									<div class="mensaje-error" id="checkout-business-name-error"></div>
								</div>
								@if(!Auth::check())
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Correo Eléctrónico">
									<div class="mensaje-error" id="checkout-email-error"></div>
								</div>
								<div class="form-group">
									<input type="hidden" name="password" class="form-control" placeholder="Contraseña" value="12345678">
									<div class="mensaje-error" id="checkout-password-error"></div>
								</div>
								<hr>
								@endif
								<div class="form-group">
							    <select style="display: none;" class="form-control" name="document_type">
							      <!-- <option value="">Tipo de Documento</option> -->
							      <option value="1">DNI</option>
							      <option value="2">RUC</option>
							    </select>
							    <div class="mensaje-error" id="checkout-document-type-error"></div>
							  </div>
								
								
								<div class="form-group">
									<input type="hidden" value="{{ $address }}" name="address" class="form-control" placeholder="Dirección" value="---">
								</div>
								<!-- /row -->
								
								<div class="form-group">
									<input type="hidden" value="{{ $birthday }}" name="birthday" class="form-control datepicker" placeholder="Fecha de nacimiento" value="21/08/2020">
									<div class="mensaje-error" id="customer-birthday-error"></div>
								</div>

								<div class="form-group">
								<input type="text" value="" name="note" class="form-control" placeholder="Escribir una Nota">
								</div>
								<hr>
							</form>
							<form id="other-billing_form">
								<input type="hidden" name="" id="country_id" value="{{ $country_id }}">
								<input type="hidden" name="" id="city_id" value="{{ $city_id }}">
								<input type="hidden" name="" id="province_id" value="{{ $province_id }}">
								<input type="hidden" name="" id="district_id" value="{{ $district_id }}">
								<div class="payments">
									<ul>
										<li>
											<label class="container_radio">Recoger en Tienda<a href="javascript:void(0);"></a>
												<input type="radio" name="on-shop" id="on-shop" checked="checked">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_radio">Envío a domicilio<a href="javascript:void(0);"></a>
												<input type="radio" name="delivery-home" id="delivery-home">
												<span class="checkmark"></span>
											</label>
										</li>
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
								<div class="col-md-12 form-group">
									<label>Sucursal</label>
									<div class="form-group">
									<input type="text" name="address" class="form-control" value="Sucursal Tacna" disabled>
									</div>
								</div>
								<div class="col-md-12 form-group">
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
								<div class="col-md-6 form-group pr-1">
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="city_id">
											<option value="0" selected>Departamento</option>
											<option value="1">Tacna</option>
											<option value="2">Moquegua</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 form-group pr-1">
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
								<div class="col-md-12 form-group">
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

							<div class="form-group">
								<input type="text" value="{{ $address_two }}" name="address" class="form-control" placeholder="Dirección del destino">
							</div>
							<div class="form-group">
								<input type="text" value="{{$reference_two}}" name="reference" class="form-control" placeholder="Referencia">
							</div>
							


							{{--<div class="form-group">
								<input type="number" value="{{ $identity_document_two }}" name="identity_document" class="form-control" placeholder="N° DNI">
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<input type="text" value="{{ $first_name_two }}" name="first_name" class="form-control" placeholder="Nombres">
								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" value="{{ $last_name_two }}" name="last_name" class="form-control" placeholder="Apellidos">
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<input type="text" value="{{ $cel_whatsapp_two }}" name="phone" class="form-control" placeholder="Celular de contacto">
							</div>--}}
							</div>
							</form>
							<!-- /other_addr_c -->
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
				<div class="col-lg-4 col-md-6">
					<div class="step middle">
						<h3>2. Formas de Pago</h3>
						<div class="method-payments">
							<ul >
								@foreach ($accounts as $key => $account)
								<li>
									<label class="container_radio">{{ $account['name'] }}<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="account_id" data-index="{{ $account['id'] }}" checked>
										<span class="checkmark"></span>
									</label>
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

							<!--div class="form-group">
									<label class="container_check">Solicito Factura. No válido para productos de Zofra de Tacna
									  <input type="checkbox" id="with_invoice">
									  <span class="checkmark"></span>
									</label>
							</div-->

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
				<div class="col-lg-4 col-md-6">
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
	<div class="modal fade" id="payments_method" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Pago en tienda</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Los pagos en tienda se realiza luego de la comfirmación del producto reservada.</p>
		  </div>
		</div>
	  </div>
	</div>

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_7/css/checkout.css" rel="stylesheet">


@stop
@section('plugins-js')

<script>
		$(`input[name="birthday"]`).datepicker({
		    format: 'dd/mm/yyyy',
		    language: 'es-ES',
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
	<script src="/template_7/js/orden_info.js"></script>
	<script src="https://checkout.culqi.com/js/v3"></script>

@stop
