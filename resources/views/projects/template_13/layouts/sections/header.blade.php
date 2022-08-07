
<header class="version_1 header_desktop">



		<div class="layer"></div><!-- Mobile menu overlay mask -->

		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-md-auto">
							<a href="/"><img src="{{ $company_main->logotype }}" alt="" width="100" style="height: 45px !important;   width: auto;  margin-top: 7px;"></a>
					</div>

					<div class="col-md-5 d-none d-md-block">
						<div class="custom-search-input" style="margin: 10px;">
							<input type="text" placeholder="¿Qué productos estas buscando?" id="search_product">
							<!-- <button type="submit" style="margin: 10px 15px 0px 0px;" id="search_button"><i class="header-icon_search_custom"></i></button> -->
						</div>
					</div>

					<div class="col-md-auto">
						<ul class="top_tools">
							<li>

								<div class="dropdown dropdown-cart" style="padding-left: 20px;">
									<a href="/checkout">
										<div  class="row align-items-center" style="height: 100%">
											<img src="/template_13/img/icon_5_.png" width="35px">
											<strong id="cart-header_quantity" class="counter_car">0</strong>
											<label class="font-weight-bold img_none">&emsp;Mi carrito</label>
										</div>
									</a>
									<div class="dropdown-menu" >
										<div class="scroll_menu" style=" max-height: 270px; overflow-y: auto;  overflow-x: hidden;">
											<ul id="cart_products" >
											</ul>
										</div>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span id="cart_subtotal"></span></div>
											<!--a href="/checkout" class="btn_1 outline">Ver carrito</a-->
											<a href="/checkout" class="btn_1 outline">Ver Carrito</a>
											<a href="/checkout/info" class="btn_1 sales_car">Comprar</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>

							 @if(!Auth::check())
              <li>
								<div class="dropdown dropdown-access" style="padding-left: 20px;">
									<a href="/acceder">
										<div  class="row align-items-center" style="height: 100%">
											<img src="/template_13/img/icon_4_.png" width="35px">
											<label class="font-weight-bold img_none">&nbsp;Mi cuenta</label>
										</div>
									</a>
									<div class="dropdown-menu">
										<a href="/acceder" class="btn_1 sales_car">Ingresar</a>
										<ul>
											<li>
												<a href="/registro"><!--i class="ti-user"></i-->¡Crear Mi Cuenta Ahora!</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
						
              @else
              <li>
								<div class="dropdown dropdown-access" style="padding-left: 20px;">
									<a href="/miperfil">
										<div  class="row align-items-center" style="height: 100%">
											<img src="/template_13/img/icon_4_.png" width="35px">
											<label class="font-weight-bold img_none">&nbsp;Mi cuenta</label>
										</div>
									</a>
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

							<li>
								<div  class="row align-items-center" style="height: 60px;">
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

									<!--span class="font-weight-bold text-white label_pedidos">Pedidos&nbsp;</span-->
									<a class="btn_menu_1 text_pedidos" href="{{ $company_main->whatsapp }}" target="_blank">
										<img src="\template_13\img\whatsapp_ico.png" alt="" class="img_none" style="height: 17px;">
										{{ $company_main->cel }}
									</a>
								</div>
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
					<div class="row justify-content-center">
						<div class="col-md-auto pad_categories" style="background-color: #d9d9d9;">
							<nav class="categories">
								<ul class="clearfix">
									<li>
										<span>
											<a href="#" class="text-center" style="top: -5px;">
												<span class="hamburger hamburger--spin" style="">
													<span class="hamburger-box">
														<span class="hamburger-inner"></span>
													</span>
												</span><br>
												<label style="font-size: 16px; font-weight: 700; line-height: 1; margin-top: 15px; text-transform: none;">Categorías</label>
											</a>
										</span>
										<div id="menu_"> {{--aqui hay que editar el menu_ para que funcione en responsive--}}
											<ul class="scroll_menu">
												@foreach ($header_categories as $key => $category)
												<li><span><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria="><span><img src="{{ $category['icon'] }}" style="height: 34px; width: auto;"></span>  {{ $category['name'] }}</a></span>
													<ul  class="scroll_menu">
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
						<div class="col-md-10 px-0">
							<div id="nav_category" class="owl-carousel">

								@foreach ($header_categories as $key => $category)
									<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item category_item font_bold">
										<div class="text-center py-2 px-3 width_category" style="height: 100%; line-height: 13px;">
											<img src="{{ $category['icon'] }}" class="category_img" style="padding-bottom: 3px;">
											<label style="font-size: 14px; font-weight: 700; line-height: 1; margin-top: 8px;">{{ $category['name'] }}</label>
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
