<footer>
		<div class="container">
			<div class="row mt-3 mb-4 py-2 justify-content-center" style=" border: solid #7b7b7b;   border-width: 1px 0px;">
				<div class="col-md-3">
					<div class="row align-items-center my-2">
						<div class="col-2" style="color: var(--main-bg-color-secundario);"><i class="far fa-envelope fa-2x"></i></div>
						<div class="col-10 text-white" style="line-height: 1.1;">
							<b>Escribenos</b><br><span>{{ $company_main->email }}</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row align-items-center my-2">
						<div class="col-2" style="color: var(--main-bg-color-secundario);"><i class="fas fa-map-marker-alt fa-2x"></i></div>
						<div class="col-10 text-white" style="line-height: 1.1;">
							<b>Ubícanos</b><br><span>{{ $company_main->address }}</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row align-items-center my-2">
						<div class="col-2" style="color: var(--main-bg-color-secundario);"><i class="fas fa-phone fa-2x"></i></div>
						<div class="col-10 text-white" style="line-height: 1.1;">
							<b>Llámanos</b><br><span>{{ $company_main->phone }}, {{ $company_main->cel }}</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row align-items-center my-2">
						<div class="col-2" style="color: var(--main-bg-color-secundario);"><i class="fas fa-book fa-2x"></i></div>
						<div class="col-10" style="line-height: 1.1;">
							<a href="/reclamaciones" class="text-white"><b>Libro de<br>Reclamaciones</b></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="    padding-top: 10px;">
				<!-- ////////////// -->
				<div class="col-lg-2 col-md-6">
					<img src="{{ $company_main->logotype_white }}" alt=""  height="100" style="padding-bottom: 15px">
					<h3 data-target="#collapse_1"><b>Redes Sociales</b></h3>
					<div class="collapse dont-collapse-sm" id="collapse_1">
						<div class="follow_us mt-3">
							<ul>
								<li><a href="{{ $company_main->facebook }}" target="_blank" ><i style="color: white" class="fab fa-facebook-f fa-2x"></i></a></li>
								<li><a href="{{ $company_main->instagram }}" target="_blank" ><i style="color: white" class="fab fa-instagram fa-2x"></i></a></li>
								<li><a href="{{ $company_main->twitter }}" target="_blank" ><i style="color: white" class="fab fa-twitter fa-2x"></i></a></li>
								
								
								<li><a href="{{ $company_main->youtube }}" target="_blank" ><i style="color: white" class="fab fa-youtube fa-2x"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /////////// -->
				<div class="col-lg-2 col-md-6 ">
					<h3 data-target="#collapse_2"><b>Sobre {{$company_main->name_company}}</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="/nosotros">Nosotros</a></li>

							<li><a href="/nosotros#quienes-somos">¿Quienes Somos?</a></li>
							<!--li><a href="/nosotros#nuestra-historia">Nuestra Historia</a></li-->
							<li><a href="/nosotros#vision">Visión</a></li>
							<li><a href="/nosotros#mision">Misión</a></li>
							<li><a href="/nosotros#valores">Valores Corporativos</a></li>
							<li><a href="/blog">Blog y Noticias</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 footer_center">
					<h3 data-target="#collapse_3"><b>Servicio al Cliente</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_3">
						<ul>
							
							
							<li><a href="/catalogo">Ver Catálogo</a></li>
							{{--
								<li><a href="/pasos-para-comprar-online">Como comprar online</a></li>
								<li><a href="/formas-de-pago">Formas de Pago</a></li>
							<li><a href="/metodos-de-entrega">Métodos de Entrega</a></li>
							<li><a href="/cambios-y-devoluciones">Cambios y Devoluciones</a></li>
							<li><a href="/politicas-de-privacidad">Políticas de Privacidad</a></li>--}}
							@foreach($services as $service)
							@if($service->slug == 'servicio-tecnico')

							@else
								<li>
								<a href="/{{ $service->slug }}">{{ $service->name }}</a>
							</li>
							@endif
						
							@endforeach
						</ul>
					</div>
				</div>
				<!-- /////////// -->
				
				<!-- /////////// -->
				<div class="col-lg-2 col-md-6">
					<h3 data-target="#collapse_4"><b>Más de {{ $company_main->name_company }}</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_4">
						<ul>
							<!--li><a href="/servicios">Nuestros Servicios</a></li-->
							<li><a href="/contacto#ubicacion">Ubicación de la Tienda</a></li>
							<li><a href="/contacto">Contáctenos</a></li>
							@foreach($services as $service)
							@if($service->slug == 'servicio-tecnico')
							<li>
								<a href="/{{ $service->slug }}">Soporte Técnico</a>
							</li>
							@endif
							@endforeach
							<li><a href="/soporte">Preguntas Frecuentas</a></li>
							
							
							
							<!--li><a href="/terminos-y-condiciones">Términos y Condiciones</a></li-->
							


						</ul>
					</div>
				</div>
				<!-- /////////// -->
				<div class="col-lg-2 col-md-6">
					<h3 data-target="#collapse_5"><b>Mi cuenta</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_5">
						<ul>
							<!--li><a href="/servicios">Nuestros Servicios</a></li-->
							<li><a href="/acceder">Regístrate</a></li>
							<li><a href="/miperfil#data">Información Personal</a></li>
							<li><a href="/miperfil#orders">Pedidos</a></li>
							<li><a href="#">Facturas por abono</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-3">
					<h3 style="padding-left: 40px;">Medios de Pago</h3>
					<ul class="footer-selector clearfix">
						<li><img src="/template_3/img/tarjetas.png" data-src="/template_3/img/tarjetas.png" alt="" height="28" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-9">
					<ul class="additional_links">
						<li><span>{{ $company_main->name_company }} © 2020 - Todos los derechos reservados</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
