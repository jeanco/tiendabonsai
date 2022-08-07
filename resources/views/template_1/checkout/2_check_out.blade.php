

@extends('template_1.layouts.index')
@section('content')

	<main class="bg_gray">


	<div class="container margin_30">

		<div class="page_header">
			@if(!Auth::check())
			<h1>Registra tus datos para realizar la compra</h1>
			@if (session()->has('data'))
	    		<script type="text/javascript">
			$(document).ready(function(){
	    	normalSwal('Alerta', 'Nombre de usuario y/o Contraseña Incorrectas', `warning`);
	    });
		</script>
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


								<div class="row no-gutters ">
									<div class="col-6 form-group pr-1">
									<select class="form-control" name="document_type">
								      <!-- <option value="">Tipo de Documento</option> -->
								      <option value="1">DNI</option>
								      <option value="2">RUC</option>
								    </select>
								    <div class="mensaje-error" id="checkout-document-type-error"></div>
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" id="value_dni" value="{{ $identity_document }}" name="identity_document" class="form-control" plaholder="N° de Documento">
									<div class="mensaje-error" id="checkout-identity-document-error"></div>
									</div>

							  </div>


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
								@if(!Auth::check())
								<div class="form-group">
									<input type="email" name="email" id="email_input" class="form-control" placeholder="Correo Eléctrónico">
									<div class="mensaje-error" id="checkout-email-error"></div>
								</div>
								{{-- 
								<div class="form-group">
									<input type="hidden" name="password" id="value_password" class="form-control" placeholder="Contraseña">
									<div class="mensaje-error" id="checkout-password-error"></div>
								</div>
								--}}
								<hr>
								@endif
								<div class="form-group document-type-two">
									<input type="text" name="business_name" class="form-control" placeholder="Razon Social">
									<div class="mensaje-error" id="checkout-business-name-error"></div>
								</div>
								<div class="form-group" style="display: none;">
									<input type="text" value="{{ $address }}" name="address" class="form-control" placeholder="Dirección">
								</div>
								<!-- /row -->
								<div class="row no-gutters">
									<div class="col-12 form-group pr-1">
									<input type="text" name="phone" value="{{ $cel_whatsapp }}" class="form-control" placeholder="Celular">
									<div class="mensaje-error" id="checkout-phone-error"></div>
									</div>

									<div class="col-6 form-group pl-1" style="display: none;">
										<input type="text" value="{{ $birthday }}" name="birthday" class="form-control datepicker" placeholder="Fecha de nacimiento">
									<div class="mensaje-error" id="customer-birthday-error"></div>
									</div>
									
								</div>
								<div class="form-group">
									<label class="container_check">Solicito Factura. <span style="font-weight: 300;">No válido para productos de Zofra Tacna</span>
									  <input type="checkbox" id="with_invoice">
									  <span class="checkmark"></span>
									</label>
							</div>

								<div class="form-group invoice-area">
									<input type="text" value="" name="business_document" class="form-control" placeholder="Ruc">
									<div class="mensaje-error" id="business-document-error"></div>
								</div>
								<div class="form-group invoice-area">
									<input type="text" value="" name="business_name_social" class="form-control" placeholder="Razón Social">
									<div class="mensaje-error" id="business-name-error"></div>
								</div>
								<div class="form-group invoice-area">
									<input type="text" value="" name="business_address" class="form-control" placeholder="Dirección Fiscal">
									<div class="mensaje-error" id="business-address-error"></div>
								</div>

								<hr>
							</form>
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
							  <input type="submit" class="btn sales_car btn-block full-width" value="Ingresar">
							  <br>
							  <a href="{{ route('social.auth', 'facebook') }}" class="btn social_bt facebook" style=" text-align: center;">Ingresar con Facebook</a>
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
						<h3>2. Formas de Entrega</h3>

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
								<div class="col-md-12 form-group" style="display: none;">
									<label>Sucursal</label>
									<div class="form-group">
									<input type="text" name="" class="form-control" value="Sucursal Tacna" disabled>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<div class="custom-select-form">
										<select class="wide" name="country_id">
											<!-- <option value="" selected>Pais</option> -->
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
										<select class="wide" name="city_id">
											<option value="0" selected>Departamento</option>
											<option value="1">Tacna</option>
											<option value="2">Moquegua</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 form-group pr-1">
									<div class="custom-select-form">
										<select class="wide" name="province_id">
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
										<select class="wide" name="district_id">
											<option value="0" selected>Distrito</option>
											<option value="1">Tacna</option>
											<option value="2">Alto de la Alianza</option>
											<option value="2">Ciudad Nueva</option>
											<option value="2">Gregorio Albarracín</option>
										</select>

									</div>
								</div>
							</div>

							<div class="form-group">
								<input type="text" value="{{ $address_two }}" name="address" class="form-control" placeholder="Dirección del destino">
							</div>
							<div class="form-group">
								<input type="text" value="{{ $reference }}" name="reference" class="form-control" placeholder="Referencia">
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
					<!-- /step -->

				</div>
				<div class="col-lg-3 col-md-6">

					<div class="step middle">
						<h3>3. Formas de Pago</h3>
	                   		<div class="payments">
													<!-- Acordion -->
								<div id="accordion_pay">
									@php
										$flag = 0;
									@endphp
									@foreach($payment_ways as $key => $payment_way)
									@if(count($payment_way['accounts']))
										@php
											$flag++;
										@endphp
									<div class="card mb-2">
										<!-- Titulo Item Acordion 1 -->
										<div class="card-header">
											<a href="javascript:void(0);" class="btn_pay" data-toggle="collapse" data-target="#pay_1{{ $payment_way['id'] }}">
											<div class="d-flex justify-content-between align-items-center">
							                  {{ $payment_way['name'] }} <i class="icon_faq pl-2"></i>
							                </div></a>
										</div>
										<!-- Contenido Item Acordion 1 -->
										<div id="pay_1{{ $payment_way['id'] }}" class="collapse {{ $flag == 1 ? 'show' : '' }}" data-parent="#accordion_pay">
										 	<div class="card-body method-payments">
												<!-- Opcion 1 -->
												@foreach ($payment_way['accounts'] as $i => $account)
												<img src="{{ $account['payment_entity']['logo'] }}" alt="" style="width: 80px;"><br>
												<div class="form-check">
													<input class="form-check-input radio-btn-{{ $i }}" type="radio" id="pago_1" name="account_id" data-index="{{ $account['id'] }}" {{ ($flag == 1 && $i == 0) ? 'checked' : '' }}>
													<label class="form-check-label" for="pago_1">{{ $account['name'] }}</label><br>
													<span>{{ $account['description'] }}</span>
												</div>
												@endforeach
												<!-- ---- -->
										      </div>
										</div>
									</div>
									@endif
									@endforeach
									{{-- 
									<div class="card mb-2">
															<!-- Titulo Item Acordion 1 -->
										<div class="card-header">
											<a href="javascript:void(0);" class="btn_pay" data-toggle="collapse" data-target="#pay_1">
											<div class="d-flex justify-content-between align-items-center">
							                  Pago en Línea <i class="icon_faq pl-2"></i>
							                </div></a>
										</div>
															<!-- Contenido Item Acordion 1 -->
										<div id="pay_1" class="collapse show" data-parent="#accordion_pay">
										 	<div class="card-body">
												<!-- Opcion 1 -->
												<img src="https://krealo.pe/wp-content/uploads/2020/12/Culqi-original-pa%CC%81gina-web-1-1-e1609190384639.png" alt="" style="width: 80px;"><br>
												<div class="form-check">
													<input class="form-check-input" type="radio" id="pago_1" name="pago_linea" checked>
													<label class="form-check-label" for="pago_1">Culqui</label><br>
													<span>Instrucciones</span>
												</div>
										      </div>
										  </div>
									</div>
														<!-- Fin Item Acordion 1 -->
														<!-- Item Acordion 2 -->
									<div class="card mb-2">
															<!-- Titulo Item Acordion 2 -->
									    <div class="card-header">
											<a href="javascript:void(0);" class="btn_pay collapsed" data-toggle="collapse" data-target="#pay_2">
											<div class="d-flex justify-content-between align-items-center">
											Depósito o Transferencia <i class="icon_faq pl-2"></i>
					                		</div></a>
									    </div>
															<!-- Contenido Item Acordion 2 -->
									    <div id="pay_2" class="collapse" data-parent="#accordion_pay">
									      <div class="card-body">
													<!-- Opcion 1 -->
													<img src="https://dl.dropboxusercontent.com/s/ioshldw0yqixjn1/bcp.png?dl=0" alt="" style="width: 80px;"><br>
													<div class="form-check">
														<input class="form-check-input" type="radio" id="pago_1" name="dep_trans" checked>
													  <label class="form-check-label" for="pago_1">BCP</label><br>
														<span>Instrucciones</span>
													</div>
									      </div>
									    </div>
									</div>
									--}}
														<!-- Fin Item Acordion 2 -->
								</div>
													<!-- Fin Acordion -->
									{{--
									<ul>
										@foreach($payment_ways as $key => $payment_way)
										@if($key==0)
										<li style="border-bottom: 0px solid #ededed;">

											<div  class="method-payments">
												<ul style="margin-bottom: 0;">
												@foreach ($payment_way['accounts'] as $account)

														<li>
															<img width="15%" src="{{ $account['payment_entity']['logo'] }}">
															<label class="container_radio">{{ $account['name'] }}<!--a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a-->
																<input type="radio" id="select_payment_{{$key}}" name="account_id" data-index="{{ $account['id'] }}" checked="checked">
																<span class="checkmark"></span>
															</label>
															<span>{{ $account['description'] }}</span>
														</li>

												@endforeach
												</ul>
											</div>

										</li>
										@else
										<li>


											@if($key==1)
											<label class="container_radio">{{ $payment_way['name'] }}<a href="javascript:void(0);"></a>
												<input type="radio" name="select_payment_{{$key}}" id="select_payment_{{$key}}" >
												<span class="checkmark"></span>
											</label>
											<div id="options_paymets_{{$key}}" class="method-payments">
												<ul style="padding-left: 30px;" >
												@foreach ($payment_way['accounts'] as $key => $account)

														<li>
															<img width="25%" src="{{ $account['payment_entity']['logo'] }}">
															<label class="container_radio">{{ $account['name'] }}<!--a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a-->
																<input type="radio" name="account_id" id="select_payment_more_{{$key}}" data-index="{{ $account['id'] }}" >
																<span class="checkmark"></span>
															</label>
															<span>{{ $account['description'] }}</span>
														</li>

												@endforeach
												</ul>
											</div>
											@else
											<div  class="method-payments">
												<ul >
												@foreach ($payment_way['accounts'] as $account)

														<li>
															<img width="15%" src="{{ $account['payment_entity']['logo'] }}">
															<label class="container_radio">{{ $account['name'] }}<!--a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a-->
																<input type="radio" id="select_payment_{{$key}}" name="account_id" data-index="{{ $account['id'] }}">
																<span class="checkmark"></span>
															</label>
															<span>{{ $account['description'] }}</span>
														</li>

												@endforeach
												</ul>
											</div>
											@endif

										</li>
										@endif

										@endforeach
									</ul>
									--}}
								</div>




						{{--	@foreach($payment_ways as $key => $payment_way)
							<div class="filter_type version_2">
	                        <h4  style="font-size: 14px;"><a href="#filter_{{$key}}" data-toggle="collapse" class="closed collapsed" aria-expanded="false">{{ $payment_way['name'] }}</a></h4>
							<hr style="margin: 1px 0 10px 0;">
	                        <div class="collapse" id="filter_{{$key}}" style="">
	                            <ul>
	                               @foreach ($payment_way['accounts'] as $key => $account)

										<li>
											<img width="15%" src="{{ $account['payment_entity']['logo'] }}">
											<label class="container_radio">{{ $account['name'] }}<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
												<input type="radio" name="account_id" data-index="{{ $account['id'] }}" checked>
												<span class="checkmark"></span>
											</label>
											<span>{{ $account['description'] }}</span>
										</li>

								@endforeach
	                            </ul>
	                        </div>
	                        <!-- /filter_type -->
	                    </div>


							<ul class="method-payments">
								@foreach ($payment_way['accounts'] as $key => $account)

										<li>
											<img width="15%" src="{{ $account['payment_entity']['logo'] }}">
											<label class="container_radio">{{ $account['name'] }}<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
												<input type="radio" name="account_id" data-index="{{ $account['id'] }}" checked>
												<span class="checkmark"></span>
											</label>
											<span>{{ $account['description'] }}</span>
										</li>

								@endforeach
							</ul>


							@endforeach--}}


							<!-- 	<h3>Depósito en efectivo o Transferencia bancaria</h3> -->

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

					<div class="text-danger" id="shipping-error" style=""></div>

				</div>
				<div class="col-lg-3 col-md-6">
					<div class="step last">
						<h3>4. Resumen de su Orden</h3>

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
								<label class="container_check">Acepto los términos y condiciones
								  <input type="checkbox" id="terms-conditions">
								  <span class="checkmark"></span>
								</label>
							</div>

						{{--<a href="" class="btn_1 full-width" id="checkout__save">Comfirmar la compra</a> --}}

						<button class="btn sales_car btn-block full-width" id="checkout__save">COMPRAR AHORA</button>
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
    <link href="/template_1/css/checkout.css" rel="stylesheet">


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
	<script src="/template_1/js/orden_info.js"></script>
	<script src="https://checkout.culqi.com/js/v3"></script>

@stop
