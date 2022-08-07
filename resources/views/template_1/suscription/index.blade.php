
@extends('template_1.layouts.index')
@section('content')

		<main class="bg_gray">

			<div class="container margin_60_35 add_bottom_30">
				
					
				
				<div class="row justify-content-center align-items-center">
					
					<div class="col-lg-12">
						<!--h2 style="font-weight: bold; padding-top: 20px">Apasionados por el arte bonsái y comprometidos con la naturaleza
¡Somos el Club Bonsái Tacna!</h2-->

						{!!$company_main->mission!!}
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-lg-3 pl-lg-5 text-center ">
					</div>

					<div class="col-lg-6 pl-lg-5 text-center " style="padding:40px;">
							<iframe width="100%" height="380" src="https://www.youtube.com/embed/{{ isset($videoyou[1]) ? $videoyou[1]:  ''  }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 25px;"></iframe>
					</div>
					<div class="col-lg-3 pl-lg-5 text-center ">
					</div>
					
				</div>
					
		
				
				
			</div>
		<div class="">
			
				<div class="container">
					<div class="row justify-content-end" style="padding-top: 30px;">
						 <div class="col-md-12">
				<div class="content">
					<div class="wrapper">
					
					
					 <form action="modal-newsletter.html#">
					 	
					 	<div class="row" style="padding-top: 40px">
					 		<div class="col-md-3"></div>
					 		<div class="col-md-6">
					 			<div class="form-group">
					 				<label>Nombres y Apellidos:</label>
									 <input type="text" class="form-control" placeholder="Nombes y Apellidos" id="subscription_name">
									 <div id="subscription-error-name" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-3"></div>


					 		<div class="col-md-3"></div>
					 		<div class="col-md-6">
					 			<div class="form-group">
					 				<label>DNI:</label>
									 <input type="number" class="form-control" placeholder="Número de DNI" id="subscription_cellphone">
									 <div id="subscription-error-cellphone" class="text-error mensaje-error text-danger"></div>
								</div>
					 		</div>
					 		<div class="col-md-3"></div>

					 		<div class="col-md-3"></div>
					 		<div class="col-md-6">
					 			<div class="form-group">
					 				<label>Celular:</label>
									 <input type="number" class="form-control" placeholder="Número celular" id="subscription_cellphone">
									 <div id="subscription-error-cellphone" class="text-error mensaje-error text-danger"></div>
								</div>
					 		</div>
					 		<div class="col-md-3"></div>

					 		<div class="col-md-3"></div>
					 		<div class="col-md-6">
					 			<div class="form-group">
					 				<label>Correo:</label>
									 <input type="email" class="form-control" placeholder="Correo electrónico" id="subscription_email">
									 <div id="subscription-error-email" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-3"></div>


					 		<div class="col-md-3"></div>
					 		<div class="col-md-6">
					 			<div class="form-group">
					 				<label>País y Ciudad:</label>
									 <input type="email" class="form-control" placeholder="Escriba su país y región" id="">
									 <div id="subscription-error-email" class="text-error mensaje-error text-danger"></div>

					 			</div>
					 		</div>
					 		<div class="col-md-3"></div>
					 		
					 		
					 	</div>

					 	<div class="row">
					 		<div class="col-md-3">
					 			
					 		</div>
					 		<div class="col-md-6" style="text-align: right;">
					 			
					
							<button type="button" class="btn_1 mt-2 mb-4" id="subscription__save">Registrarme</button>
					 		</div>
					 		<div class="col-md-3">
					 			
					 		</div>
					 		
					 	</div>
					 	<br>
					 	<br>
					 	
					 	
						
					 	
					 </form>
					</div>
				</div>
            </div>
					</div>
				</div>
			
			<!--img src="/template_1/img/top_about.jpg" class="img-fluid" alt="" style="filter: brightness(0.5);"-->
		</div>

		<div class="container   text-center"  style=" border-top: double var(--main-bg-color-primario); margin-top: 25px;">
	<div class="row">
		<div class="col-md-12">
					
				
								
								<div class="banner_info_footer" style="padding-top: 25px;">
									
									{!!$company_main->proposal_value!!}
									
								</div>
				
				</div>
	
		
	</div>
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
                <figure><img src="/template_1/img/newsletter_img.jpg" alt=""></figure>
            </div>
            <div class="col-md-7">
				<div class="content">
					<div class="wrapper">
					<img src="/template_1/img/logo_black.svg" alt="" width="100" height="35">
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
    <link href="/template_1/css/account.css" rel="stylesheet">



@stop
@section('plugins-js')
<!-- SPECIFIC SCRIPTS -->
	<!--script src="/template_1/js/carousel-home.js"></script-->
	<script src="/template_1/js/subscriptions.js"></script>
	

@stop