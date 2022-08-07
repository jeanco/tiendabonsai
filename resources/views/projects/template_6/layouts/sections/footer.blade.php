<footer>
		<div class="container">
			{{--<div class="row mt-3 mb-4 py-2 justify-content-center" style=" border: solid #7b7b7b;   border-width: 1px 0px;">
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
			<div class="row">
				<!-- ////////////// -->
				<div class="col-lg-3 col-md-6">
					<img src="{{ $company_main->logotype_white }}" alt=""  height="60" style="padding-bottom: 15px">
					<h3 data-target="#collapse_4"><b>Redes Sociales</b></h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div class="follow_us mt-3">
							<ul>
								<li><a href="{{ $company_main->twitter }}" target="_blank" ><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/template_6/img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="{{ $company_main->facebook }}" target="_blank" ><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/template_6/img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="{{ $company_main->instagram }}" target="_blank" ><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/template_6/img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="{{ $company_main->youtube }}" target="_blank" ><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/template_6/img/youtube_icon.svg" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /////////// -->
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1"><b>Sobre Tiendas Kamasa</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="/nosotros#quienes-somos">¿Quienes Somos?</a></li>
							<li><a href="/nosotros#nuestra-historia">Nuestra Historia</a></li>
							<li><a href="/nosotros#mision">Visión y Misión</a></li>
							<li><a href="/nosotros#valores">Valores Corporativos</a></li>
							<li><a href="/nosotros#trabaja">Trabaja con Nosotros</a></li>
						</ul>
					</div>
				</div>
				<!-- /////////// -->
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2"><b>Servicios al Cliente</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="/contacto">Contáctenos</a></li>
							<li><a href="/contacto#ubicacion">Ubicación de la Tienda</a></li>
							<li><a href="/soporte">Soporte Técnico</a></li>
							<li><a href="/soporte#preguntas">Preguntas Frecuentas</a></li>
						</ul>
					</div>
				</div>
				<!-- /////////// -->
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_3"><b>Más de Tiendas Kamasa</b></h3>
					<div class="collapse dont-collapse-sm links" id="collapse_3">
						<ul>
							<li><a href="/servicios">Nuestros Servicios</a></li>
							<li><a href="/catalogo">Ver Catálogo</a></li>
							<li><a href="/club-de-novios">Club Novios</a></li>
							<li><a href="/blog">Blog y Noticias</a></li>
						</ul>
					</div>
				</div>
				<!-- /////////// -->
			</div>--}}
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/template_6/img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><span>© 2020 {{ $company_main->business_name }}</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
