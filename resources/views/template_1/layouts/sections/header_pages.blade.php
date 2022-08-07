
<div class="menu_padding margin_60_35" style="background: white; font-family: 'fira_sans', sans-serif;padding-bottom: 20px;">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6" style="color: #080808;font-weight: bold;">
							 <?php
				              date_default_timezone_set('America/Lima');
				                ?>
							<span >{{date('d')}} {{date('M')}} {{date('Y')}} | Idioma</span> <select id="idioma_id" style="color: #080808;font-weight: bold;">
								<option value="1">Español</option><option value="2">Ingles</option>
							</select>
						</div>
						<div class="col-md-6 text-right">
							<a class="phone_top"  style=""><strong><span><a href="/suscripcion" class="btn_1">AFILIATE</a></span></strong></a>
						</div>
						<div class="col-md-12 text-center">
							<a href="/"><img src="{{ $company_main->logotype }}" alt=""  style="height: 90px;
    padding: 5px 0px 5px 0px;"></a>
						</div>
					</div>

				</div>
			</div>

<header class="version_1 header_desktop" style="border-top: 2px solid #ff9900;font-family: 'fira_sans_regular', sans-serif;">



		<div class="layer"></div><!-- Mobile menu overlay mask -->

		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container" style="padding-top: 15px;">
				<div class="row small-gutters">
						<div class="col-lg-3 d-lg-flex align-items-center" style="border-bottom: 8px solid var(--main-bg-color-primario);">
						<h3 style="font-size: 25px; margin-bottom: 0px !important;
    font-weight: bold; font-family: 'fira_sans_black', sans-serif;">{{Session::get('menu_pages')}}</h3>
					</div>
					<nav class="col-lg-9 text-right" style="border-bottom: 2px solid var(--main-bg-color-primario);">
						
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100" style="height:60px !important;"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
									
								<li>
									<a  style="padding: 25px 10px 5px 10px;" href="/nosotros">NOSOTROS</a>
								</li>
								
								<li >
									<a  style="padding: 25px 10px 5px 10px;"    href="/blog?tag=publicaciones">PUBLICACIONES</a>
								</li>
								<li >
									<a  style="padding: 25px 10px 5px 10px;"    href="/catalogo">TIENDA</a>
								</li>
								<li >
									<a  style="padding: 25px 10px 5px 10px;"    href="/libros">LIBROS</a>
								</li>
								<li >
									<a  style="padding: 25px 10px 5px 10px;"    href="/blog?tag=workshops">CLASES Y WORKSHOPS</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" id="value_search_" placeholder="Buscar Productos">
				<input type="submit"  id="search_" class="btn_1 full-width" value="Buscar">
			</div>
			<!-- /search_mobile -->

			
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
