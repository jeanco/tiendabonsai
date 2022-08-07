<!--<footer class="revealed">-->
<div style="background-color: #fff;">
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
</div>

<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6" style="color: #000;">
					<div style="font-size: 25px; line-height: 1; font-weight: 500;">
						Comunícate<br>con Nosotros
					</div>
					<div class="py-3"><a href="{{ $company_main->whatsapp }}" target="_blank" class="btn btn_footer_1"><img src="\template_1\img\whatsapp_ico.png" alt="" style="height: 28px;">{{ $company_main->cel }}</a></div>




					<div style="font-size: 18px; font-weight: 700;">Síguenos en:</div>
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
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="mb-2" style="font-size: 14px; font-weight: 700;">NOSOTROS</div>
					<div class="dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="/nosotros">Conócenos</a></li>
							<li><a href="/contacto">Contáctanos</a></li>
							<li><a href="/blog">Novedades y noticias</a></li>
							<li><a href="/suscripcion">Suscríbete</a></li>
							<li><a href="/reclamaciones">Libro de Reclamaciones</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="mb-2" style="font-size: 14px; font-weight: 700;">ATENCIÓN AL CLIENTE</div>
					<div class="dont-collapse-sm links" id="collapse_3">
						<ul>
							{{--
							<li><a href="/preguntas-frecuentes">Preguntas Frecuentes</a></li>
							<li><a href="/terminos-y-condiciones">Terminos y condiciones</a></li>
							<li><a href="/politicas-privacidad">Políticas de privacidad y seguridad</a></li>

							<li><a href="/reclamaciones">Libro de reclamaciones</a></li>
							--}}

							@foreach($services as $service)
							<li>
								<a href="/{{ $service->slug }}">{{ $service->name }}</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="mb-2" style="font-size: 14px; font-weight: 700;">MEDIO DE PAGO</div>
					<ul class="footer-selector clearfix">
						<li><img data-src="https://dl.dropboxusercontent.com/s/owf28h9tacn8yph/PAGOS.png?dl=0" alt="" width="" height="40" class="lazy"></li>
					</ul>
				</div>
			</div>
			<!-- /row-->
			<hr class="my-4">
			<div class="row add_bottom_25">
				<div class="col-12 text-center" style="font-size: 12px;">
					© 2021 {{ $company_main->business_name }}. Todos los derechos reservados. Desarrollado por Noveltie
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
