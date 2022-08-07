
<header class="version_1 desktop_header" >

		<div class="layer"></div><!-- Mobile menu overlay mask -->

		{{--@if(count($secction_promotions)>0)
		<div class="top_line version_1 plus_select" >
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-sm-6 col-5">{!! isset( $secction_promotions[0]->title) ? $secction_promotions[0]->title:  ''  !!}
					</div>
					<div class="col-sm-6 col-7">
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- End container-->
		</div>
		@else
		@endif--}}


		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<!-- ////////////////// -->
					<div class="col-md-3">
						<nav class="categories">
							<ul class="clearfix" style="display: flex;">
								<li class="logo_menu"><a href="/"><img src="{{ $company_main->logotype }}" alt="" height="55x"></a></li>
								<li>
									<span>
										<a href="#" >
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categorías
										</a>
									</span>
									<div id="menu_"> {{--aqui hay que editar el menu_ para que funcione en responsive--}}
										<ul>
											@foreach ($header_categories as $key => $category)
											<li><span><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria="><span><img src="{{ $category['icon'] }}" style="width: 24px;"></span>  {{ $category['name'] }}</a></span>
												<ul>
													@foreach ($category['subcategories'] as $subcategory)
														<li><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
													@endforeach
												</ul>
											</li>
											@endforeach
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<!-- ////////////////// -->
					<div class="col-md-4 d-none d-md-block">
						<div class="custom-search-input">
							<input type="text" placeholder="Busca más productos" id="search_product">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>
					<!-- ////////////////// -->
					<div class="col-md-5">
						<ul class="top_tools">
							<!--  -->

							
							<!--li>
								<a href="#" id="routes_icon" data-toggle="dropdown"><i class="fas fa-bars fa-lg"></i></a>
								<div id="menu_routes" class="dropdown-menu dropdown-menu-right" aria-labelledby="routes_icon">
									<a class="dropdown-item" href="/nosotros">Nosotros</a>
									<a class="dropdown-item" href="/catalogo">Catálogo</a>
									<a class="dropdown-item" href="/blog">Blog</a>
									<a class="dropdown-item" href="/contacto">Contacto</a>
									
								</div>
							</li-->

							<li></li>
							<li></li>
							<li>
								<div class="dropdown dropdown-cart">
									<a href="/checkout" class="cart_bt" style="color: var(--main-bg-color-primario);"> <strong id="cart-header_quantity">0</strong></a>
									<div class="dropdown-menu" style="    height: 500px;   overflow: auto;">
										<ul id="cart_products">
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_7/img/products/product_placeholder_square_small.jpg" data-src="/template_7/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="index.html#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_7/img/products/product_placeholder_square_small.jpg" data-src="/template_7/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Okwahn II</span>$110.00</strong>
												</a>
												<a href="http://www.ansonika.com/allaia/0" class="action"><i class="ti-trash"></i></a>
											</li>
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span id="cart_subtotal">$200.00</span></div>
											<a href="/checkout" class="btn_1 outline">Ver carrito</a>
											@if(!Auth::check())
											<a href="/acceder" class="btn_1">Comprar</a>
											
											@else
											<a href="/checkout/info" class="btn_1">Comprar</a>
											@endif
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							
							@if(Auth::check())
							<li>
								<div class="dropdown">
									<!--a href="javascript:void(0);" id="sign_out" data-toggle="dropdown"><i class="fas fa-sign-out-alt fa-lg"></i></a-->
									<a href="#" id="sign_out" data-toggle="dropdown" class="access_link" style="line-height: 65px;"><span>Account</span></a>
									<div id="sign_menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="sign_out">
								    {{--  <a class="dropdown-item" href="/miperfil/{{ Auth::user()->id }}">Mi Panel</a>
								    <a class="dropdown-item" href="/miperfil/{{ Auth::user()->id }}">Lista de compras</a>
								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a> --}}

										<a class="dropdown-item" href="/miperfil">Mi Panel</a>

								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
								  </div>
								</div>
							</li>
							@else
							<li style="text-align: center;">
								<a href="/acceder" style="line-height: 0px;    height: 40px;">
								<i class="fas fa-user fa-lg" style="padding-top: 20px;color: var(--main-bg-color-primario); "></i>
								</a>
								<a  href="/acceder" title="Ingresar" style="line-height: 20px; height: 0px;">Iniciar Sesión</a></li>
							@endif
							<li><a href="/suscripcion" class="btn_3">Suscríbete</a></li>
							<li style="margin-left: 0px;"><a href="{{$company_main->whatsapp}}" target="_blank" class="btn_3" style="background: var(--main-bg-color-secundario); padding: 5px 18px;    
}"><img src="/template_3/img/whatsapp.png" width="18px"> {{ $company_main->cel }}</a></li>
							<li><a href="javascript:void(0);" class="btn_search_mob d-md-none"><span>Buscar</span></a></li>

							{{-- <li style="display: none;">
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categorías
								</a>
							</li> --}}
						</ul>
					</div>
					<!-- ////////////////// -->
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" id="value_search" placeholder="Buscar más productos">
				<input type="submit"  id="search_product_mobile" class="btn_1 full-width" value="Buscar">
			</div>


			{{--<div class="main_header" style="background: var(--main-bg-color-primario);">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-1 col-lg-2 d-lg-flex align-items-center justify-content-end text-center">
						<a href="/" class="btn_3" style="  margin: 0 15px 0 10px;  background: var(--main-bg-color-secundario);">Inicio</a>						
					</div>
					<nav class="col-xl-8 col-lg-8">
					
						<!-- Mobile menu button -->

						<div class="main-menu main-menu-header">
							
							<ul>
								
								@foreach ($header_categories as $key => $category)
								<li class="submenu category_item" style="text-align: center;">
									<img src="{{ $category['icon'] }}" class="category_img" style="filter: brightness(6); padding-top: 10px;">
									<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item ">
										<div class="text-center py-2 px-3">
											
											<span class="font-weight-bold" style="color: white;">{{ $category['name'] }}</span>
										</div>
									</a>
									<ul>
									@foreach ($category['subcategories'] as $subcategory)
														<li style="text-align: left;"><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
									@endforeach
									</ul>
									
								</li>
								@endforeach
							
								
								
							</ul>
							
						</div>
						<!--/main-menu -->
					</nav>
					
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-center">
						<a class="phone_top" href="/suscripcion"><strong><span>Catálogo Digital</span></strong></a>
						<a href="/suscripcion" ><img src="/template_7/img/catalogo.png" class="button_select" width="30px" style="padding: 2px;  margin: 10px;"></a>
						<a href="/suscripcion" class="btn_3" style="  margin: 0 15px 0 10px;  background: var(--main-bg-color-secundario);">Suscribete</a>
						<a class="phone_top" href="{{ $company_main->whatsapp }}" target="_blank"><strong><span>Llámanos</span>{{ $company_main->cel }}</strong></a>
						<a href="{{ $company_main->whatsapp }}" target="_blank"><img src="/template_7/img/contacto.jpg" class="button_select" width="40px" style="padding: 2px; border-radius: 20px; margin: 10px;"></a>
					</div>
					
				</div>
				<!-- /row -->
			</div>
		</div>--}}
		<!-- /main_header -->


			<div style="background: var(--main-bg-color-primario);">
				<div class="container">
					<div id="nav_category" class="owl-carousel">
						@foreach ($header_categories as $key => $category)
							<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item category_item">
								<div class="text-center py-2 px-6">
									<img src="{{ $category['icon_white'] }}" class="category_img" style="filter: brightness(6);">
									<span class="font-weight-bold">{{ $category['name'] }}</span>
								</div>
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- /main_nav -->
		<!-- otro menu -->

</header>


		
		
