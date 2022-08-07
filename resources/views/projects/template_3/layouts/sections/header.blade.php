
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
								<li>
									<span>
										<a href="#" class="font_bold">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											<span class="menu_display">Categorías</span>
											<!--span class="menu_display">Menú de </span>Categorías-->
										</a>

									</span>
									<div id="menu_" class="font_bold">  {{--aqui hay que editar el menu_ para que funcione en responsive--}}
										<ul>
											@foreach ($header_categories as $key => $category)
											<li>
												<span>
													<a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="item_menu">
														<span class="icon_menu"><img src="{{ $category['icon'] }}" style="height: 20px;"></span>  {{ $category['name'] }}
													</a>
												</span>
												<ul>
													@foreach ($category['subcategories'] as $subcategory)
														<li><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria={{ $subcategory['slug'] }}" class="menu_option">{{ $subcategory['name'] }}</a></li>
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
					<div class="col-md-3 d-none d-md-block">
						<div class="custom-search-input">
							<input type="text" placeholder="Buscar más productos" id="search_product">
							<button type="submit" id="button_enviar"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>
					<!-- ////////////////// -->
					<div class="col-md-5">
						<ul class="top_tools">
							<!--  -->

							@if(Auth::check())
							<li>
								<div class="dropdown">
									<!--a href="javascript:void(0);" id="sign_out" data-toggle="dropdown"><i class="fas fa-sign-out-alt fa-lg"></i></a-->
									<a href="#" id="sign_out" data-toggle="dropdown" class="access_link font_bold" style="line-height: 65px;"><span>Account</span></a>
									<div id="sign_menu" class="dropdown-menu dropdown-menu-right font_bold" aria-labelledby="sign_out">
								    {{--  <a class="dropdown-item" href="/miperfil/{{ Auth::user()->id }}">Mi Panel</a>
								    <a class="dropdown-item" href="/miperfil/{{ Auth::user()->id }}">Lista de compras</a>
								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a> --}}

										<a class="dropdown-item" href="/miperfil">Mi Cuenta</a>

								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
								  </div>
								</div>
							</li>
							@else
							<!--li><a href="/acceder" title="Ingresar">Iniciar Sesión<i class="fas fa-sign-in-alt fa-lg"></i></a></li-->
							<li>
								<div class="dropdown dropdown_sign_in">
									<a id="sign_in" href="/acceder" data-toggle="dropdown" class="font_bold">Iniciar Sesión</a>
									<div class="dropdown-menu" aria-labelledby="sign_in">
										<!--a href="account.html" class="btn_1">Sign In or Sign Up</a-->
										<div class="sign-in-wrapper">
											<!--div class="divider"><span>Or</span></div-->
											@if (session()->has('data'))
										      <p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
										      <script type="text/javascript">
														$(document).ready(function(){
												    	normalSwal('Alerta', 'Nombre de usuario y/o Contraseña Incorrectas', `warning`);
												    });
													</script>
										  @endif
											{!! Form::open(['class' => 'c-login__form ', 'url' => '/login-from-landing', 'method' => 'POST', 'role' => 'form']) !!}
							      	{{ csrf_field() }}
											<div class="form-group">
													<label>Email</label>
													<input type="email" class="form-control" name="username" id="email" placeholder="Escriba su email">
													<!--i class="ti-email"></i-->
											</div>
											<div class="form-group">
													<label>Contraseña</label>
													<input type="password" class="form-control" name="password" id="password" value="" placeholder="Escriba su contraseña">
													<!--i class="ti-lock"></i-->
											</div>

											<div class="text-center">
													<input type="submit" value="Ingresar" class="btn_1 full-width">
													¿Eres nuevo en {{ $company_main->business_name }}?
													<br>
													<a href="/registro" class="btn_1">Crea tu Cuenta</a>
													<!--a href="/">Crea tu Cuenta</a-->
											</div>
											{!! Form::close() !!}

										</div>

									</div>
								</div>
							</li>

							@endif
							<li>
								<a href="#" id="routes_icon" data-toggle="dropdown"><i class="fas fa-bars fa-lg"></i></a>
								<div id="menu_routes" class="dropdown-menu dropdown-menu-right" aria-labelledby="routes_icon">
									<a class="dropdown-item" href="/nosotros">Nosotros</a>
									<a class="dropdown-item" href="/catalogo">Catálogo</a>
									<a class="dropdown-item" href="/blog">Blog</a>
									<a class="dropdown-item" href="/contacto">Contacto</a>
									<a class="dropdown-item" href="/club-de-novios">Club Novios</a>
								</div>
							</li>

							<li></li>
							<li></li>
							<li style="margin-left: 10px;">
								<div class="dropdown dropdown-cart">
									<a href="/checkout" class="cart_bt" style="color: var(--main-bg-color-primario);"><img src="/template_3/img/camioncito.png" width="38px" style="    padding-top: 0px;">
										<strong id="cart-header_quantity" style="top: 33px; right: -13px;">0</strong>
									</a>
									<div class="dropdown-menu" style="    height: 500px;   overflow: auto;">
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
							<li><a href="/suscripcion" class="btn_3">Suscribirme</a></li>
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
				<input type="submit"  id="" class="btn_1 full-width" value="Buscar">
			</div>
			{{--<div class="menu_padding" style="background: var(--main-bg-color-primario);">
				<div class="container">
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
			</div>--}}
		</div>
		<!-- /main_nav -->
		<!-- otro menu -->

</header>
	<!-- /header -->
