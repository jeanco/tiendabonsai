

@extends('template_9.layouts.index')
@section('content')

	<main class="bg_gray">


	<div class="container margin_30">
		<div class="page_header">
			<!--div class="breadcrumbs">
				<ul>
					<li><a href="#">Inic</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div-->

		@if(!Auth::check())
		<h1>Registra tus datos para realizar la cotización</h1>
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
							<div class="tooltip" id="tooltip">
								<div class="thumb">
									<img src="/template_9/img/paso_checkout.png" alt="">
								</div>
								<div class="info">
									<h4 class="titulo">Registro de Datos</h4>
									<p class="resumen">Escriba sus datos completos para recibir su cotización.</p>
									<!--p class="resumen">
										La Torre Eiffel es el monumento más famoso de Paris y símbolo de la capital francesa.<br />
									</p>
									<div class="contenedor-btn">
										<button>Comprar Boletos</button>
									</div-->
								</div>
						</div>
						</li>
						<!--li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Ingresar</a>
						</li-->
					  @else
						<li class="nav-item" id="pivot">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Información </a>
							<div class="tooltip" id="tooltip">
								<div class="thumb">
									<img src="/template_9/img/paso_checkout.png" alt="">
								</div>
								<div class="info">
									<h4 class="titulo">Registro de Datos</h4>
									<p class="resumen">Escriba sus datos completos para recibir su cotización.</p>
									<!--p class="resumen">
										La Torre Eiffel es el monumento más famoso de Paris y símbolo de la capital francesa.<br />
									</p>
									<div class="contenedor-btn">
										<button>Comprar Boletos</button>
									</div-->
								</div>
						</div>
						</li>
					  @endif
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<form id="quotation_form">
							<div class="row no-gutters">
								<div class="col-md-6 form-group pr-1">
									<label>Tipo de documento<span style="color: red"> *</span></label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="document_type">
											<option value="1" selected>DNI</option>
											<option value="2">RUC</option>
										</select>
									</div>
								</div>
								<div class="col-6 form-group pr-1">
									<label>N° de Documento<span style="color: red"> *</span></label>
									<input type="text" name="identity_document" class="form-control" placeholder="Número Documento">
									<div class="mensaje-error" id="quotation-identity_document-error"></div>

								</div>

							</div>
							<div class="row no-gutters">
								<div class="col-12 form-group ">
									<label id="document-type-label">Nombres y apellidos<span style="color: red"> *</span></label>
									<input type="text" name="first_name" class="form-control" placeholder="Escriba sus Nombres y Apellidos">
									<div class="mensaje-error" id="quotation-first_name-error"></div>
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<label>Celular<span style="color: red"> *</span></label>
									<input type="text" name="cel_whatsapp" class="form-control" placeholder="Escriba su Celular">
									<div class="mensaje-error" id="quotation-cel_whatsapp-error"></div>
								</div>
								<div class="col-6 form-group pr-1">
									<label>Email<span style="color: red"> *</span></label>
									<input type="text" name="email" class="form-control" placeholder="Escriba su Email">
									<div class="mensaje-error" id="quotation-email-error"></div>
								</div>

							</div>
							<div class="row no-gutters">
								<div class="col-md-12 form-group">
									<label>Sucursal<span style="color: red"> *</span></label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="place_id">
		                                	@foreach($places as $key => $place)
		                                		@if($place['id'] == $place_selected)
													<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>
		                                		@else
													<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
		                                		@endif
		                                	@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-12 form-group ">
									<label>Dirección de Entrega<span style="color: red"> *</span></label>
									<input type="text" name="address" class="form-control" placeholder="Escriba su Dirección">
								</div>

							</div>
							<div class="row no-gutters">
								<div class="col-md-12 form-group">
									<label>Como se enteró de nuestra web<span style="color: red"> *</span></label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="type_recommendation">
											<option value="0" selected>Por la Publicidad en facebook</option>
											<option value="1">Por la Radio</option>
											<option value="2">Por el Periódico</option>
											<option value="3">Por Recomendación</option>
										</select>
									</div>
								</div>
							</div>
							<span style="color: red">Todos los datos con (*) son obligatorios.</span>
							<hr>
							<a href="" class="btn_1 full-width pivot_" id="quotation__save">Enviar Cotización</a>
							<div class="tooltip" id="tooltip__">
								<div class="thumb">
									<img src="/template_9/img/paso_checkout_quotation.png" alt="">
								</div>
								<div class="info">
									<h4 class="titulo">Cotizar Ahora</h4>
									<p class="resumen">Requerde que debe especificar la cantidad de los productos a cotizar y en breve le enviaremos su cotización a su Email.</p>
									<!--p class="resumen">
										La Torre Eiffel es el monumento más famoso de Paris y símbolo de la capital francesa.<br />
									</p>
									<div class="contenedor-btn">
										<button>Comprar Boletos</button>
									</div-->
								</div>
						</div>
							</form>

							<hr>
						</div>

					</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-8 col-md-6">
					<div class="step middle payments">
						<h3>2. Productos para seleccionar</h3>


		<div class="container ">
			@foreach($categories_ as $category)
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px; text-transform: uppercase;">{{ $category['name'] }}</h2>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach ($category->products as $key => $product)
					@php
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

					<div class="item">
						<div class="grid_item">
							<figure>
								<a href="#">
								<img class="owl-lazy" src="" data-src="{{ $image }}" alt="">
								</a>
							</figure>
							<!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
							<a href="#">
								<h3 style="color: #fff;">{{ $product['name'] }}</h3>
							</a>


							<div class="col-12 form-group pr-1">

									<label style="padding-top: 10px;">Cantidad </label><br>

									<input type="text" data-index="{{ $product['id'] }}" name="first_name" class="form-control products_selected" placeholder="">

									<label style="padding-top: 10px;"><a href="" class="more-info" data-index="{{ $product['id'] }}">Más info</a></label>
								</div>
						</div>
						<!-- /grid_item -->
					</div>

				@endforeach
				<!-- /item -->

			</div>
			@endforeach


			{{--
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px; text-transform: uppercase;">Techos</h2>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach ($featured_products as $product)
					@php
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

					<div class="item">
						<div class="grid_item">
							<figure>
								<a href="#">
								<img class="owl-lazy" src="" data-src="{{ $image }}" alt="">
								</a>
							</figure>
							<!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
							<a href="#">
								<h3 style="color: #fff;">{{ $product['name'] }}</h3>
							</a>



							<div class="col-12 form-group pr-1">

									<label style="padding-top: 10px;">Cantidad </label><br>


									<input type="text" name="first_name" class="form-control" placeholder="">
ç
									<label style="padding-top: 10px;"><a href="#0" data-toggle="modal" data-target="#size-modal{{$key}}">Más info</a></label>
								</div>
						</div>

						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->

			</div>

			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px; text-transform: uppercase;">Concretos</h2>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach ($featured_products as $product)
					@php
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

					<div class="item">
						<div class="grid_item">
							<figure>
								<a href="#">
								<img class="owl-lazy" src="" data-src="{{ $image }}" alt="">
								</a>
							</figure>
							<!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
							<a href="#">
								<h3 style="color: #fff;">{{ $product['name'] }}</h3>
							</a>



							<div class="col-12 form-group pr-1">

									<label style="padding-top: 10px;">Cantidad </label><br>


									<input type="text" name="first_name" class="form-control" placeholder="">

									<label style="padding-top: 10px;"><a href="#0" data-toggle="modal" data-target="#size-modal{{$key}}">Más info</a></label>
								</div>
						</div>

						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->

			</div>
			--}}

			<!-- /products_carousel -->
		</div>
		<!-- /container -->


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

<!-- Size modal -->

	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal{{$key}}" id="product-description-modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Descripción del Producto</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  	<i class="ti-close"></i>
			</button>
			</div>
			<div class="modal-body" >
				<div class="content">
					<div class="row">
					<div class="col-md-6" id="description__">

					</div>
					<div class="col-md-6">
						<img id="cotiza_image" src="" style="width: 100%;">
					</div>

				</div>
				</div>
				

			</div>
		</div>
	</div>
</div>

@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_9/css/checkout.css" rel="stylesheet">
    <link href="/template_9/css/tooltips.css" rel="stylesheet">


@stop
@section('plugins-js')

<script type="text/javascript">
    	// Other address Panel
		$('#other_addr input').on("change", function (){
	        if(this.checked)
	            $('#other_addr_c').fadeIn('fast');
	        else
	            $('#other_addr_c').fadeOut('fast');
	    });


			    const calcularPosicionTooltip = () => {
			// Calculamos las coordenadas del icono.
			const x = icono.offsetLeft;
			const y = icono.offsetTop;

			// Calculamos el tamaño del tooltip.
			const anchoTooltip = tooltip.clientWidth;
			const altoTooltip = tooltip.clientHeight;

			// Calculamos donde posicionaremos el tooltip.
			const izquierda = x - (anchoTooltip / 2) + 90;
			const arriba = y - altoTooltip - 0;

			tooltip.style.left = `${izquierda}px`;
			tooltip.style.top = `${arriba}px`;
		};

			    $(document).ready(function(){

				timer = setTimeout(() => {
				tooltip.classList.add('activo');
			}, 500);


				timer = setTimeout(() => {
				tooltip__.classList.add('activo');
			}, 2000);

		});


	</script>
	<script src="/template_9/js/quotations.js"></script>
	<!-- <script src="/template_9/js/orden_info.js"></script> -->
	<script src="/template_9/js/tooltips.js"></script>

@stop



