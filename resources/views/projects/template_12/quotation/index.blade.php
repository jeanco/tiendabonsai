

@extends('template_12.layouts.index')
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
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Registro </a>
						</li>
						<!--li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Ingresar</a>
						</li-->
					  @else
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Información </a>
						</li>
					  @endif
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<form id="checkout_form">
							<div class="row no-gutters">
								<div class="col-md-6 form-group pr-1">
									<label>Tipo de documento</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="city_id">
											<option value="0" selected>DNI</option>
											<option value="1">RUC</option>
										</select>
									</div>
								</div>
								<div class="col-6 form-group pr-1">
									<label>N° de Documento</label>
									<input type="text" name="first_name" class="form-control" placeholder="Número Documento">
								</div>

							</div>
							<div class="row no-gutters">
								<div class="col-12 form-group ">
									<label>Razón Social</label>
									<input type="text" name="first_name" class="form-control" placeholder="Escriba su Razón Social">
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<label>Celular</label>
									<input type="text" name="first_name" class="form-control" placeholder="Escriba su Celular">
								</div>
								<div class="col-6 form-group pr-1">
									<label>Email</label>
									<input type="text" name="first_name" class="form-control" placeholder="Escriba su Email">
								</div>

							</div>
							<div class="row no-gutters">
								<div class="col-md-12 form-group">
									<label>Sucursal</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="city_id">
											<option value="0" selected>Tacna</option>
											<option value="1">Ilo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-12 form-group ">
									<label>Dirección de Entrega</label>
									<input type="text" name="first_name" class="form-control" placeholder="Escriba su Dirección">
								</div>

							</div>



							<hr>
							<a href="" class="btn_1 full-width" id="checkout__save">Enviar Cotización</a>
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
			<div class="main_title">
				<h2>Muros y Tabiquerías</h2>
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
									<label>Cantidad</label>
									<input type="text" name="first_name" class="form-control" placeholder="">
								</div>
						</div>
						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->

			</div>

			<div class="main_title">
				<h2>Techos</h2>
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
									<label>Cantidad</label>
									<input type="text" name="first_name" class="form-control" placeholder="">
								</div>
						</div>

						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->

			</div>
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
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_12/css/checkout.css" rel="stylesheet">


@stop
@section('plugins-js')

<script>
    	// Other address Panel
		$('#other_addr input').on("change", function (){
	        if(this.checked)
	            $('#other_addr_c').fadeIn('fast');
	        else
	            $('#other_addr_c').fadeOut('fast');
	    });
	</script>
	<script src="/template_12/js/orden_info.js"></script>

@stop
