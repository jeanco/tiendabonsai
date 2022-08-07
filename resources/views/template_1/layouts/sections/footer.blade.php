<!--<footer class="revealed">-->
{{--<div style="background-color: #fff;">
	<div class="container margin_60_35" >
		<div class="row">
			<div class="col-md-4" style="border-right: 1px solid #ddd;">
				<div class="row align-items-center">
					<div class="col-3">
						<img src="/template_1/img/icon_1.png" alt="" style="width: 100%;">
					</div>
					<div class="col-9">
						<div class="font-weight-bold">Disfruta tu tiempo</div>
						<div>Compra online y retira en tienda</div>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="border-right: 1px solid #ddd;">
				<div class="row align-items-center">
					<div class="col-3">
						<img src="/template_1/img/icon_2.png" alt="" style="width: 100%;">
					</div>
					<div class="col-9">
						<div class="font-weight-bold">Compra con tarjeta</div>
						<div>con toda seguridad</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row align-items-center">
					<div class="col-3">
						<img src="/template_1/img/icon_3.png" alt="" style="width: 100%;">
					</div>
					<div class="col-9">
						<div class="font-weight-bold">Ofertas exclusivas</div>
						<div>En nuestra tienda online</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="background-color: var(--main-bg-color-terciario);">
	<div class="container margin_60_35" >
		<div class="text-white mb-2">
			<img src="/template_1/img/icon_6_.png" alt="" width="35px">&nbsp;
			<span style="font-size: 18px; font-weight: 600;">¡Suscribete Caser@!</span> y entérate de las últimas promociones
		</div>
		<form>
			<div class="row">
				<div class="col-md-3 mb-2">
					<input type="text" class="form-control" id="subscription_name" value="" placeholder="Nombres y apellidos">
					<div id="subscription-name-error" class="text-error mensaje-error text-danger"></div>
				</div>
				<div class="col-md-3 mb-2">
					<input type="text" class="form-control" id="subscription_cellphone" value="" placeholder="Celular">
					<div id="subscription-cellphone-error" class="text-error mensaje-error text-danger"></div>
				</div>
				<div class="col-md-3 mb-2">
					<input type="text" class="form-control" id="subscription_email" value="" placeholder="Correo Electrónico">
					<div id="subscription-email-error" class="text-error mensaje-error text-danger"></div>
				</div>
				<div class="col-md-3 mb-2">
					<a href="#" class="btn btn-danger btn-block font-weight-bold" id="subscription__save">SUSCRIBIRME</a>
				</div>
			</div>
		</form>
	</div>
</div> --}}

<footer style="font-family: 'fira_sans', sans-serif;">
		<div class="container" style="border-top: 8px solid var(--main-bg-color-terciario); padding-top: 25px;">
			<div class="row">
				<div class="col-lg-3 col-md-6" style="color: #000; text-align: center;" >

				
							<a href="/"><img src="{{ $company_main->logotype_white }}" alt=""  style="height: 120px;
    padding: 5px 0px 5px 0px;"></a>
						
					
					




					
					
				</div>
				<div class="col-lg-3 col-md-6" >
					<div class="mb-2" style="font-size: 14px; font-weight: 700;">Contacto:</div>
					<div class="dont-collapse-sm links" id="collapse_2" style="color: black;
    font-weight: bold;">
						<div class=""><a href="{{ $company_main->whatsapp }}" target="_blank" class="">{{ $company_main->cel }} (pe)</a></div>
						<div class="">{{ $company_main->email }}</div>
						<div class="">{{ $company_main->address }}</div>

						<!--ul>
							<li><a href="/nosotros">Conócenos</a></li>
							<li><a href="/contacto">Contáctanos</a></li>
							<li><a href="/blog">Novedades y noticias</a></li>
							<li><a href="/suscripcion">Suscríbete</a></li>
							<li><a href="/reclamaciones">Libro de Reclamaciones</a></li>
						</ul-->
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="mb-2" style="font-size: 14px; font-weight: 700;">Nuestras redes sociales</div>
					<div class="dont-collapse-sm links" id="collapse_3">
						<div class="my-3">
						@if($company_main->facebook)
						<a href="{{ $company_main->facebook }}" target="_blank"  class="btn_social px-2"><i class="fab fa-facebook fa-lg"></i></a>
						@endif
						@if($company_main->facebook)
						<a href="{{ $company_main->instagram }}" target="_blank"  class="btn_social px-2"><i class="fab fa-instagram fa-lg"></i></a>
						@endif
						@if($company_main->youtube)
						<a href="{{ $company_main->youtube }}" target="_blank"  class="btn_social px-2"><i class="fab fa-youtube fa-lg"></i></a>
						@endif
						@if($company_main->twitter)
						<a href="{{ $company_main->twitter }}" target="_blank"  class="btn_social px-2"><i class="fab fa-twitter fa-lg"></i></a>
						@endif
						@if($company_main->linkedin)
						<a href="{{ $company_main->linkedin }}" target="_blank"  class="btn_social px-2"><i class="fab fa-linkedin-in fa-lg"></i></a>
						@endif
						<a href="https://www.tiktok.com/@club_bonsai_tacna?_t=8UJl2Ew8A10&_r=1" target="_blank"  class=""><img src="/template_1/img/tiktok.png" width="35px"></a>
					</div>
						{{--<ul>
							

							@foreach($services as $service)
							<li>
								<a href="/{{ $service->slug }}">{{ $service->name }}</a>
							</li>
							@endforeach
						</ul>--}}
					</div>
				</div>
				<div class="col-lg-3 col-md-6 text-center">
					<div class="mb-2" style="font-size: 14px; font-weight: 700;">Si quieres apoyar al club</div>
					<a class="phone_top" ><strong><span><a href="/suscripcion" class="btn_1">AFILIATE</a></span></strong></a>
					<br><br>
					<a class="phone_top"  style=""><strong><span><a href="/donaciones" class="btn_1">DONACIÓN</a></span></strong></a>
				</div>
			</div>
			<!-- /row-->

			<div class="container   text-center"  style="border-bottom: double var(--main-bg-color-primario); border-top: double var(--main-bg-color-primario); margin-top: 25px;">
	<div class="row">
		<div class="col-md-12">
					
				
								
								<div class="banner_info_footer">
									
									<p style="margin-bottom:0px !important; font-weight: bold;">Apasionados por el arte bonsái y comprometidos con la naturaleza ¡Somos el Club Bonsái Tacna!</p>
									
								</div>
				
				</div>
	
		
	</div>
</div>
<br>
<div class="row add_bottom_25">
				@foreach($services as $service)
							
							<div class="col-4 text-center" style="font-size: 12px;">
						<a href="/{{ $service->slug }}">{{ $service->name }}</a>
					</div>
							@endforeach

				
			</div>

			<hr class="my-4">
			<div class="row add_bottom_25">
				<div class="col-12 text-center" style="font-size: 12px;">
					© <?php
              date_default_timezone_set('America/Lima');
                ?>
                 {{date('Y')}} {{ $company_main->business_name }}. Todos los derechos reservados. Desarrollado por Noveltie
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
