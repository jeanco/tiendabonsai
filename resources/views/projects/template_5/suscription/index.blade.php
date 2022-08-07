
@extends('template_5.layouts.index')
@section('content')

		<main class="bg_gray">
		<div class="top_banner general top_banner_suscription">
			<div class="opacity-mask  banner-suscription d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)" style="background:  url({{ isset( $gallery_company[6]->resource) ? $gallery_company[6]->resource:  ''  }}); background-size: cover;">
				<div class="container">
					<div class="row justify-content-end" style="padding-top: 30px;">
						 <div class="col-md-12">
				<div class="content">
					<div class="wrapper">
					
					
					 <form action="modal-newsletter.html#">
					 	<div class="row">
					 		<div class="col-md-2">
					 			
					 		</div>
					 		<div class="col-md-8" >
					 			<h2 style="color: white; padding-bottom: 10px;">Regístrate para recibir más novedades</h2>
					<h6 style="color: white;"><span style="background: #fdd411; padding: 1px 6px 1px 6px; border-radius: 5px; color: black; ">Aquí podrás dejar tus datos para recibir ofertas, descuentos y noticias de <span style=" font-weight: bold;">{{ $company_main->business_name }}</span></span ></h6>
					 		</div>
					 		<div class="col-md-2">
					 			
					 		</div>
					 		
					 	</div>
					 	<div class="row" style="padding-top: 40px">
					 		<div class="col-md-2">
					 		</div>
					 		<div class="col-md-2">
					 			<div class="form-group">
									 <input type="text" class="form-control" placeholder="Nombes y Apellidos" id="subscription_name">
									 <div id="subscription-error-name" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-2">
					 			<div class="form-group">
									 <input type="number" class="form-control" placeholder="Número celular" id="subscription_cellphone">
									 <div id="subscription-error-cellphone" class="text-error mensaje-error text-danger"></div>
								</div>
					 		</div>
					 		<div class="col-md-4">
					 			<div class="form-group">
									 <input type="email" class="form-control" placeholder="Correo electrónico" id="subscription_email">
									 <div id="subscription-error-email" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-2">
					 		</div>
					 		
					 	</div>

					 	<div class="row">
					 		<div class="col-md-2">
					 			
					 		</div>
					 		<div class="col-md-8" style="text-align: right;">
					 			
					
							<button type="button" class="btn_1 mt-2 mb-4" id="subscription__save">Suscribirse</button>
					 		</div>
					 		<div class="col-md-2">
					 			
					 		</div>
					 		
					 	</div>
					 	
					 	
						
					 	
					 </form>
					</div>
				</div>
            </div>
					</div>
				</div>
			</div>
			<!--img src="/template_5/img/top_about.jpg" class="img-fluid" alt="" style="filter: brightness(0.5);"-->
		</div>
		<!--/top_banner-->

		<!-- /container -->
	</main>
	<!--/main-->


		<!--div class="popup_wrapper">
		<div class="popup_content newsletter">
			<span class="popup_close">Close</span>
			<div class="row no-gutters">
            <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                <figure><img src="/template_5/img/newsletter_img.jpg" alt=""></figure>
            </div>
            <div class="col-md-7">
				<div class="content">
					<div class="wrapper">
					<img src="/template_5/img/logo_black.svg" alt="" width="100" height="35">
					<h3>Regístrate para resivir mpás novedades</h3>
					<p>Aquí podras dejar tus datos para resivir nuestras ofertas, descuentos y noticias de nuestra empresa.</p>
					 <form action="modal-newsletter.html#">
					 	<div class="form-group">
					 		<input type="email" class="form-control" placeholder="Enter your email address">
					 	</div>
						
					 	<button type="submit" class="btn_1 mt-2 mb-4">Subscribe</button>
						  <div class="form-group">
								<label class="container_check d-inline">Don't show this PopUp again
								  <input type="checkbox">
								  <span class="checkmark"></span>
								</label>
							</div>
					 </form>
					</div>
				</div>
            </div>
        </div>
		
		</div>
	</div-->
	

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_5/css/account.css" rel="stylesheet">



@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<!--script src="/template_5/js/carousel-home.js"></script-->
	<script src="/template_5/js/subscriptions.js"></script>

@stop