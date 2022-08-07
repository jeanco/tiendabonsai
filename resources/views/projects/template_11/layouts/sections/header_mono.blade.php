


<header class="version_1 header_desktop">



		<div class="layer"></div><!-- Mobile menu overlay mask -->



		{{--@if(count($secction_promotions)>0)
		<div class="top_line version_1 plus_select" >
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-sm-6 col-5">{!! isset( $secction_promotions[0]->title) ? $secction_promotions[0]->title:  ''  !!}
					</div>
					<div class="col-sm-6 col-7">
						<!--ul class="top_links">
							<li>
								<div class="styled-select lang-selector">
									<select>
										<option value="English" selected>English</option>
										<option value="French">French</option>
										<option value="Spanish">Spanish</option>
										<option value="Russian">Russian</option>
									</select>
								</div>
							</li>
							<li><div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected="">US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div></li>
						</ul-->
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- End container-->
		</div>
		@else
		@endif--}}
		
		{{--
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="/"><img src="{{ $company_main->logotype }}" alt=""  style="height: 60px;
    padding: 5px 0px 5px 0px;"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100" style="height:60px !important;"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li>
									<a href="/nosotros">Nosotros</a>
								</li>
								<li>
									<a href="/catalogo">Productos</a>
								</li>
								
								<li>
									<a href="/blog">Blog</a>
								</li>
								<li>
									<a href="/contacto">Contacto</a>
								</li>
								<li>
									<a href="/suscripcion">Suscríbete</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank" style=""><strong><span><a href="/cotizar" class="btn_1">COTIZAR</a></span></strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div> --}}
		<!-- /main_header -->

		<div class="main_nav Sticky" style="background: #DE001A;">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-2 col-lg-3 d-lg-flex align-items-center">
						<div id="logo" style="    display: block;
    margin-left: 40px;
    margin-right: auto;">
							<a href="/"><img src="{{ $company_main->logotype_white }}" alt=""  style="height:45px;  padding: 5px 0px 5px 0px;"></a>
						</div>
					</div>
					<!--div class="col-xl-2 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#" style="color: #fff">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categorías
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
													{{-- 
													<li><a href="listing-grid-2-full.html">Life style</a></li>
													<li><a href="listing-grid-3.html">Running</a></li>
													<li><a href="listing-grid-4-sidebar-left.html">Training</a></li>
													<li><a href="listing-grid-5-sidebar-right.html">View all Collections</a></li>
													--}}
												</ul>
											</li>
											@endforeach

											
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div-->
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block" style="text-align: center;">
						<div class="main-menu">
							<div id="header_menu">
								<a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100" style="height:60px !important;"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>

							<ul>
								<li >
									<a    href="/nosotros">Nosotros</a>
								</li>
								<li >
									<a    href="/catalogo">Productos</a>
								</li>
								
								<li >
									<a    href="/blog">Blog</a>
								</li>
								<li >
									<a    href="/contacto">Ubícanos</a>
								</li>
								<li >
									<a    href="/suscripcion">Suscríbete</a>
								</li>
								<li >
									<a  class="header_cotiza"   href="/cotizar">Cotiza</a>
								</li>
								
							</ul>
						</div>
						<!--div class="custom-search-input">
							<input type="text" placeholder="Buscar más productos deskopt" id="search_product">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div-->
					</div>
					<div class="col-xl-2 col-lg-7 col-md-6 d-none d-md-block" style="text-align: center;">
						<div class="main-menu" style="padding-top: 13px;">
							

							<ul>
							
								<li>
									<div class="custom-search-input">
									<input type="text" placeholder="Buscar productos" id="search_product">
									<button type="submit"><i class="header-icon_search_custom"></i></button>
								</div>
								</li>
							</ul>
						</div>
						<!--div class="custom-search-input">
							<input type="text" placeholder="Buscar más productos deskopt" id="search_product">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div-->
					</div>
					<div class="col-xl-2 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="/checkout" class="" style="padding-top: 10px;"><img src="/template_11/img/carretilla.png" width="40px" style="    padding-top: 0px;"> <strong id="cart-header_quantity" style="background: #252525;
    padding: 1px 2px;
    border-radius: 7px; 
    position: absolute;
    right: -20px; top: 30px;">0</strong></a>
									<div class="dropdown-menu" >
										<div style="    height: 350px;   overflow-y: scroll;  overflow-x: hidden;">
											<ul id="cart_products">
											<!--li>
												<a href="product-detail-1.html">
													<figure><img src="/template_11/img/products/product_placeholder_square_small.jpg" data-src="/template_11/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="index.html#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_11/img/products/product_placeholder_square_small.jpg" data-src="/template_11/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Okwahn II</span>$110.00</strong>
												</a>
												<a href="http://www.ansonika.com/allaia/0" class="action"><i class="ti-trash"></i></a>
											</li-->
										</ul>
										</div>
										
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span id="cart_subtotal">$200.00</span></div>
											<!--a href="/checkout" class="btn_1 outline">Ver carrito</a-->
											<a href="/checkout" class="btn_1 outline">Ver Carretilla</a>
											<a href="/checkout/info" class="btn_1">Comprar</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<!--li>
								<a href="index.html#0" class="wishlist"><span>Wishlist</span>Salir</a>
							</li-->
							
							 @if(!Auth::check())
                               
                             @else
                               <li>
								<div class="dropdown dropdown-access">
									<a href="#" class="access_link" style="line-height: 65px;"><span>Account</span></a>
									<div class="dropdown-menu">
										<!--a href="/registro" class="btn_1">Registrarme</a-->
										Hola, {{ Auth::user()->first_name  }} {{ Auth::user()->last_name}}
										<ul>
											<!--li>
												<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
											</li>
											<li>
												<a href="account.html"><i class="ti-package"></i>My Orders</a>
											</li>
											<li>
												<a href="account.html"><i class="ti-user"></i>My Profile</a>
											</li-->
											<li>
												<a href="/logout"><i class="ti-share-alt"></i>Cerrar Sesión</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
                             @endif
							<!--li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Buscar</span></a>
							</li-->
							<!--li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categorías
								</a>
							</li-->
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!--div class="search_mob_wp">
				<input type="text" class="form-control" id="value_search" placeholder="Buscar más productos">
				<input type="submit"  id="search_product_mobile" class="btn_1 full-width" value="Buscar">
			</div-->
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->