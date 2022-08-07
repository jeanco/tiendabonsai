
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
					<div class="col-md-4">
						<nav class="categories">
							<ul class="clearfix" style="display: flex;">
								<li class="logo_menu"><a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100%"></a></li>
								{{--<li>
									<span>
										<a href="#" >
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Productos
										</a>
									</span>
									<div id="menu">
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
								</li>--}}
							</ul>
						</nav>
					</div>
					<!-- ////////////////// -->
					{{--<div class="col-md-3 d-none d-md-block">
						<div class="custom-search-input">
							<input type="text" placeholder="Buscar más productos" id="search_product">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>--}}
					<!-- ////////////////// -->
					<div class="col-md-8">
						<ul class="top_tools">
							<!--  -->
							{{--
							@if(Auth::check())
							<li>
								<div class="dropdown">
									<!--a href="javascript:void(0);" id="sign_out" data-toggle="dropdown"><i class="fas fa-sign-out-alt fa-lg"></i></a-->
									<a href="#" id="sign_out" data-toggle="dropdown" class="access_link" style="line-height: 65px;"><span>Account</span></a>
									<div id="sign_menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="sign_out">
								   

										<a class="dropdown-item" href="/miperfil">Mi Panel</a>
								    
								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
								  </div>
								</div>
							</li>
							@else
							<li><a href="/acceder" title="Ingresar">Iniciar Sesión<!--i class="fas fa-sign-in-alt fa-lg"></i--></a></li>
							@endif--}}
							{{--<li>
								<a href="#" id="routes_icon" data-toggle="dropdown"><i class="fas fa-bars fa-lg"></i></a>
								<div id="menu_routes" class="dropdown-menu dropdown-menu-right" aria-labelledby="routes_icon">
									<a class="dropdown-item" href="/nosotros">Nosotros</a>
									<a class="dropdown-item" href="/catalogo">Catálogo</a>
									<a class="dropdown-item" href="/blog">Blog</a>
									<a class="dropdown-item" href="/contacto">Contacto</a>
									<a class="dropdown-item" href="/club-de-novios">Club de Novios</a>
								</div>
							</li>--}}
							
							<li></li>
							<li></li>
							<li style="display: none;">
								<div class="dropdown dropdown-cart">
									<a href="/checkout" class="cart_bt" style="color: var(--main-bg-color-primario);"> <strong id="cart-header_quantity">0</strong></a>
									<div class="dropdown-menu" style="    height: 500px;   overflow: auto;">
										<ul id="cart_products">
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_6/img/products/product_placeholder_square_small.jpg" data-src="/template_6/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="index.html#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_6/img/products/product_placeholder_square_small.jpg" data-src="/template_6/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Okwahn II</span>$110.00</strong>
												</a>
												<a href="http://www.ansonika.com/allaia/0" class="action"><i class="ti-trash"></i></a>
											</li>
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span id="cart_subtotal">$200.00</span></div>
											<a href="/checkout" class="btn_1 outline">Ver carrito</a>
											<a href="/checkout/info" class="btn_1">Comprar</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li><a href="/suscripcion" class="btn_3">Suscribete</a></li>
							<li><a href="{{$company_main->whatsapp}}" target="_blank" class="btn_3" style="background: var(--main-bg-color-secundario);"><img src="/template_6/img/whatsapp.png" width="18px"> {{ $company_main->cel }}</a></li>
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
			{{--<div class="search_mob_wp">
				<input type="text" class="form-control" id="value_search" placeholder="Buscar más productos">
				<input type="submit"  id="search_product_mobile" class="btn_1 full-width" value="Buscar">
			</div>--}}
			{{--<div style="background: var(--main-bg-color-primario);">
				<div class="container">
					<div id="nav_category" class="owl-carousel">
						@foreach ($header_categories as $key => $category)
							<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item category_item">
								<div class="text-center py-2 px-3">
									<img src="{{ $category['icon'] }}" class="category_img" style="filter: brightness(6);">
									<span class="font-weight-bold">{{ $category['name'] }}</span>
								</div>
							</a>
						@endforeach
					</div>
				</div>
			</div>--}}
		</div>
		<!-- /main_nav -->
		<!-- otro menu -->

</header>
	<!-- /header -->
