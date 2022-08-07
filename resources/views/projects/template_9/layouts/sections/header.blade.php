
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
		

		{{--<div class="main_header">
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
								<li >
									<a    href="/">Inicio</a>
								</li>
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
								<!--li >
									<a    href="/suscripcion">Suscríbete</a>
								</li>
								<li >
									<a  class="header_cotiza"   href="/suscripcion">Suscríbete</a>
								</li-->
								
							



							
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-center">
						
						<a href="/suscripcion" class="btn_3 header_desktop" style="  margin: 0 15px 0 10px;  background: var(--main-bg-color-secundario); color: black !important;">Suscribete</a>
						<a class="phone_top header_desktop" href="{{ $company_main->whatsapp }}" target="_blank"><strong><span>Llámanos</span>{{ $company_main->cel }}</strong></a>
						<a href="{{ $company_main->whatsapp }}" target="_blank" class="header_desktop"><img src="/template_9/img/whatsapp.png" class="button_select" width="40px" style="padding: 2px; border-radius: 20px; margin: 10px;"></a>
					</div>
					
				</div>
				<!-- /row -->
			</div>
		</div>--}}
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
							<a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100" style="height: 45px !important;   width: 100%;  margin-top: 7px;"></a>

						
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input" style="margin: 10px;">
							<input type="text" placeholder="¿Qué productos necesitas?" id="search_product">
							<button type="submit" style="margin: 10px 15px 0px 0px;" id="search_button"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="/checkout" class="" style="padding-top: 5px;"> 
										<img src="/template_9/img/carrito_compras.png" width="35px" style=" padding-top: 5px;">

										<strong id="cart-header_quantity" style="background: #252525;
    padding: 1px 2px;
    border-radius: 7px; 
    position: absolute;
    right: -10px;
    top: 25px;">0</strong></a>
									<div class="dropdown-menu" >
										<div style="    height: 270px;   overflow-y: scroll;  overflow-x: hidden;">
											<ul id="cart_products">
											<!--li>
												<a href="product-detail-1.html">
													<figure><img src="/template_9/img/products/product_placeholder_square_small.jpg" data-src="/template_9/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="index.html#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_9/img/products/product_placeholder_square_small.jpg" data-src="/template_9/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Okwahn II</span>$110.00</strong>
												</a>
												<a href="http://www.ansonika.com/allaia/0" class="action"><i class="ti-trash"></i></a>
											</li-->
										</ul>
										</div>
										
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span id="cart_subtotal"></span></div>
											<!--a href="/checkout" class="btn_1 outline">Ver carrito</a-->
											<a href="/checkout" class="btn_1 outline">Ver Carrito</a>
											<a href="/checkout/info" class="btn_1">Comprar</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							
							 @if(!Auth::check())
                               <li>
								<div class="dropdown dropdown-access">
									<a href="/acceder" class="access_link" style="padding-top: 6px;"><span>Account</span></a>
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
									<a href="/miperfil" class="access_link" style="padding-top: 6px;"><span>Account</span></a>
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
						
							{{--<li>
								<a href="javascript:void(0);" class="btn_search_mob" style="padding-top: 6px;"><span>Buscar</span></a>
							</li>--}}
							<li>
								
								{{--<a href="/suscripcion" class="btn_3 header_desktop" style="  margin: 6px 15px 0 10px;  background: var(--main-bg-color-secundario); color: black !important; ">Suscribete</a>--}}
								{{-- 
								@php
									if(!isset($place_id_selected))
									{
										$place_id_selected = 0;
									}
								@endphp
								--}}
								<!--label style="color: white;">Sucursal</label-->
									<form action="/api/template_9/set-place-no-ajax", method="POST" id="place_form">
										{{ csrf_field() }}
										<div class="custom-select-form" style="padding-top: 15px;">
											<select class="wide add_bottom_5 " name="place_id" id="place_select">
			                                	@foreach($places as $key => $place)
			                                		@if($place['id'] == $place_id_selected)
														<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>
			                                		@else
														<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
			                                		@endif
			                                	@endforeach
											</select>
										</div>
									</form>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Productos
								</a>
							</li>

						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" id="value_search_" placeholder="Buscar Productos">
				<input type="submit"  id="search_" class="btn_1 full-width" value="Buscar">
			</div>
			<!-- /search_mobile -->

			<div class="menu_padding" style="background: white;">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#" style="color: #cd0000; top: -5px;">
											<span class="hamburger hamburger--spin" style="">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											<span>Categorías</span>
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
							
						</div>
						<div class="col-md-10">
							<div id="nav_category" class="owl-carousel">
						
						@foreach ($header_categories as $key => $category)
							<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item category_item font_bold">
								<div class="text-center py-2 px-3 width_category" style="height: 100%; line-height: 13px;">
									<img src="{{ $category['icon'] }}" class="category_img" style="filter: brightness(6);padding-bottom: 3px;">
									<span class="font-weight-bold">{{ $category['name'] }}</span>
								</div>
							</a>
						@endforeach
					</div>
						</div>
					</div>
					
				</div>
			</div>

		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
