
@extends('template_14.layouts.index')
@section('content')

		<main class="bg_gray">
		<div class="top_banner general">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgbargba(35, 34, 34, 0.56)"
			style="background-image:  url({{ isset( $gallery_company[5]->resource) ? $gallery_company[5]->resource:  ''  }});
				   background-size: cover;">
				<div class="container">
					<div class="row justify-content-end" style="margin-top: 150px;">
						 <div class="col-md-12">
				<div class="content">
					<div class="wrapper">


					 <form action="modal-newsletter.html#">
					 	<div class="row">
					 		<div class="col-md-2">

					 		</div>
					 		<div class="col-md-8 text-center" >
					 			<h1 style="color: white;">Suscríbete para recibir más novedades</h1>
					<h6 style="color: white; padding-bottom: 10px;">Ingresa tus datos para conocer nuestras ofertas, descuentos y noticias.</h6>
					 		</div>
					 		<div class="col-md-2">

					 		</div>

					 	</div>
					 	<div class="row">
					 		<div class="col-md-1">
					 		</div>
					 		<div class="col-md-2">
					 			<div class="form-group">
									 <input type="text" class="form-control" placeholder="Nombres" id="subscription_name">
									 <div id="subscription-error-name" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-2">
					 			<div class="form-group">
									 <input type="text" class="form-control" placeholder="Apellidos" id="subscription_lastname">
									 <div id="subscription-error-lastname" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-2">
					 			<div class="form-group">
									 <input type="number" class="form-control" placeholder="Número celular" id="subscription_cellphone">
									 <div id="subscription-error-cellphone" class="text-error mensaje-error text-danger"></div>
								</div>
					 		</div>
					 		<div class="col-md-2">
					 			<div class="form-group">
									 <input type="email" class="form-control" placeholder="Correo electrónico" id="subscription_email">
									 <div id="subscription-error-email" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-2">


							<button type="button" class="btn_1" style="height: 40px;" id="subscription__save">Suscribirme</button>
					 		</div>
					 		<div class="col-md-1">
					 		</div>

					 	</div>

					 	<!--div class="row">
					 		<div class="col-md-2">

					 		</div>
					 		<div class="col-md-8" style="text-align: right;">


							<button type="button" class="btn_1 mt-2 mb-4" id="subscription__save">Suscribirse</button>
					 		</div>
					 		<div class="col-md-2">

					 		</div>

					 	</div-->
					 </form>
					</div>
				</div>
            </div>
					</div>
				</div>
			</div>
			<!--img src="/template_14/img/top_about.jpg" class="img-fluid" alt="" style="filter: brightness(0.5);"-->
		</div>
		<!--/top_banner-->

		<!-- /container -->
	</main>
	<!--/main-->



<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_14/css/account.css" rel="stylesheet">



@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<script src="/template_14/js/carousel-home.js"></script>
	<!--script src="/template_14/js/subscriptions.js"></script-->

@stop
