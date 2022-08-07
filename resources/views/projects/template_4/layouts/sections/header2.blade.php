<header class="version_1 movil_header">

		<div class="layer"></div><!-- Mobile menu overlay mask -->

		@if(count($secction_promotions)>0)
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
		@endif

		<div class="main_header" style="border-bottom: 1px solid #e1e1e1;">
			<div class="container">
				<div class="row small-gutters" style=" margin-bottom: 0px !important;">
					<div class="col-5 align-items-center" style="margin-top: 7px; text-align: center;">
						<div id="logo">
							<a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100%"></a>
						</div>
					</div>
					
					<div class="col-7 align-items-center " style="margin-top: 8px;">
						<a href="/suscripcion" class="btn_4">SUSCRÍBETE</a>
						<a href="{{ $company_main->whatsapp }}" style="    padding: 0 5px 0 10px;" target="_blank"><img src="/template_5/img/whatsapp.png" class="button_select" width="33px" style="  "></a>
						
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky" style="background-color: #fff;">
			<div class="container">
				<div class="row small-gutters" style="text-align: center;">
					<!-- ////////////////// -->
					<div class="col-md-4">
						<nav class="categories">
							<ul class="clearfix">
								<li>

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
											<li style="text-align: center;     padding-top: 20px;"><a href="/nosotros">Nosotros</a></li>
												<li style="text-align: center;"><a href="/catalogo">Catálogo</a></li>
												<li style="text-align: center;"><a href="/blog">Blog</a></li>
												<li style="text-align: center;"><a href="/contacto">Contacto</a></li>
												<!--li style="text-align: center;"><a href="/club-de-novios">Club de Novios</a></li-->
												<li style="text-align: center;"><a href="/suscripcion">Suscríbete</a></li>
												@if(!Auth::check())
				                               
					                             @else
					                          
													<li class="megamenu submenu">
														<a href="javascript:void(0);" class="show-submenu-mega">Mi Usuario</a>
														<div class="menu-wrapper">
															<div class="row small-gutters">
																<div class="col-lg-3">
																	<h3>Hola, {{ Auth::user()->first_name  }} {{ Auth::user()->last_name}}</h3>
																	<ul>
																		<li style="text-align: center;"><a href="/miperfil">Mi Panel</a></li>
																		<li style="text-align: center;"><a href="/logout">Cerrar Sesión</a></li>
																		
																	</ul>
																</div>
																
																
															</div>
															<!-- /row -->
														</div>
														<!-- /menu-wrapper -->
													</li>
					                             @endif
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<!-- ////////////////// -->
					<div class="col-md-5 d-none d-md-block">
						<div class="custom-search-input">
							<input type="text" placeholder="Buscar más productos" id="search_product">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>
					<!-- ////////////////// -->
					<div class="col-md-3">
						<ul class="top_tools">
							<!--li>
		               	  	<a href="{{ $company_main->whatsapp }}" target="_blank" class="header_desktop"><img src="/template_5/img/whatsapp.png" class="button_select" width="33px" style="  "></a>
		               	  </li-->
							<li style="margin-right: 15px;">
								<div class="dropdown dropdown-cart">
									<!--a href="/checkout" class="cart_bt" style="color: var(--main-bg-color-primario);"><strong id="cart-header_quantity_mobil" style="top: 16px; right: -5px;">0</strong></a-->
									<a href="/checkout" class="cart_bt" style="color: var(--main-bg-color-primario);"><img src="/template_4/img/carrito_compras.png" width="30px" style="    padding-top: 0px;"> <strong id="cart-header_quantity_mobil" style="top: 16px; right: -13px;">0</strong></a>
									<div class="dropdown-menu" style="    height: 500px;   overflow: auto; ">
										<ul id="cart_products">
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_3/img/products/product_placeholder_square_small.jpg" data-src="/template_3/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="index.html#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_3/img/products/product_placeholder_square_small.jpg" data-src="/template_3/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
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
								 @if(!Auth::check())
                               <li>
								<div class="dropdown dropdown-access">
									<a href="/acceder" class="access_link" style=""><span>Account</span></a>
									<div class="dropdown-menu">
										<a href="/acceder" class="btn_1">Ingresar</a>
										
										<ul>
											<!--li>
												<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
											</li>
											<li>
												<a href="account.html"><i class="ti-package"></i>My Orders</a>
											</li-->
											<li>
												<a href="/registro"><!--i class="ti-user"></i-->¡Crear Mi Cuenta Ahora!</a>
											</li>
											<!--li>
												<a href="/logout"><i class="ti-share-alt"></i>Cerrar Sesión</a>
											</li-->
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li> 
                             @else
                               <li>
								<div class="dropdown dropdown-access">
									<a href="/miperfil" class="access_link" style=""><span>Account</span></a>
									<div class="dropdown-menu">
										<!--a href="/registro" class="btn_1">Registrarme</a-->
										Hola, {{ Auth::user()->first_name  }} {{ Auth::user()->last_name}}
										<ul>
											<!--li>
												<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
											</li>
											<li>
												<a href="account.html"><i class="ti-package"></i>My Orders</a>
											</li-->
											<li>
												<a href="/miperfil"><i class="ti-user"></i>Mi Panel</a>
											</li>
											<li>
												<a href="/logout"><i class="ti-share-alt"></i>Cerrar Sesión</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
                             @endif
							<li><a href="javascript:void(0);" class="btn_search_mob" ><span>Buscar</span></a></li>
							<!--li>
			                     <div id="logo">
			                  <a href="/"><img src="{{ $company_main->logotype }}" alt=""  style="height: 20px;"></a>
			               </div>
			                </li-->
							<li>
								<a href="#menu" class="btn_cat_mob" style="width: 130px; padding-left: 20px;">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Menú de Categorías
								</a>
							</li>
						</ul>
					</div>
					<!-- ////////////////// -->
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" id="value_search_mobile" placeholder="Buscar más productos">
				<input type="submit"  id="search_product_mobile" class="btn_1 full-width" value="Buscar" style="background: var(--main-bg-color-secundario);">
			</div>
			 <div style="background: var(--main-bg-color-primario);">
				<div class="container px-4">
					<div id="nav_category2" class="owl-carousel">
						@foreach ($header_categories as $key => $category)
							<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item category_item">
								<div class="text-center py-2 px-3">
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
	<!-- /header -->
