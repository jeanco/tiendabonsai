
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
					<div class="col-md-2">
						<nav class="categories">
							<ul class="clearfix" style="display: flex;">
								<li class="logo_menu"><a href="/"><img src="{{ $company_main->logotype }}" alt="" height="55x"></a></li>
								{{--<li>
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
									<div id="menu_"> <!--aqui hay que editar el menu_ para que funcione en responsive-->
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
					<div class="col-md-7 d-none d-md-block">
						<div class="custom-search-input">
							<input type="text" placeholder="Busca más productos" id="search_product">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>
					<!-- ////////////////// -->
					<div class="col-md-3">
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
									<!--a href="/checkout" class="cart_bt" style="color: var(--main-bg-color-primario);"> <strong id="cart-header_quantity">0</strong></a-->
									
									<a href="/checkout" class="cart_bt" style="margin-top: 10px; color: var(--main-bg-color-primario);"><img src="/template_14/img/carrito_compras.png" width="35px" style="    padding-top: 0px;">
										<strong id="cart-header_quantity" style="    top: 25px;  right: -3px;">0</strong>
									</a>
									<a  href="#" title="Ingresar" style="">Carrito</a>
									<div class="dropdown-menu" style="z-index: 999999;">
										<div style="overflow-y: scroll; height: 270px; overflow-x: hidden;">
											<ul id="cart_products">
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_14/img/products/product_placeholder_square_small.jpg" data-src="/template_14/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="index.html#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="/template_14/img/products/product_placeholder_square_small.jpg" data-src="/template_14/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Okwahn II</span>$110.00</strong>
												</a>
												<a href="http://www.ansonika.com/allaia/0" class="action"><i class="ti-trash"></i></a>
											</li>
										</ul>
										</div>
										
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span id="cart_subtotal">$200.00</span></div>
											<a href="/checkout" class="btn_1 outline">Ver carrito</a>
											<a href="/checkout/info" class="btn_1">Comprar</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
						
							
							@if(Auth::check())
							<li style="margin-left: 0px !important;">
								<div class="dropdown">
									<!--a href="javascript:void(0);" id="sign_out" data-toggle="dropdown"><i class="fas fa-sign-out-alt fa-lg"></i></a-->



						
									<a href="#" id="sign_out" data-toggle="dropdown" style="    margin: 25px 5px; " >Mi panel</a>
									<div id="sign_menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="sign_out" style="z-index: 999999 !important;">
								    {{--  <a class="dropdown-item" href="/miperfil/{{ Auth::user()->id }}">Mi Panel</a>
								    <a class="dropdown-item" href="/miperfil/{{ Auth::user()->id }}">Lista de compras</a>
								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a> --}}

										<a class="dropdown-item" href="/miperfil">Mi Panel</a>

								    <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
								  </div>
								</div>
							</li>
							@else
							<li style="text-align: center; margin-left: 25px !important;">
								<div class="dropdown dropdown_sign_in">
									<a href="/registro" style=" margin-top: 12px;   background: #024f91;
   
    border-radius: 12px;
    color: white;">
								Regístrate
								</a>
									<a  href="/acceder" title="Ingresar"  data-toggle="dropdown" style=" margin-top: 5px; ">Iniciar Sesión</a>
								
								
								<div class="dropdown-menu dropdown_sign_in" aria-labelledby="sign_in" style="z-index: 999999;" >
										<!--a href="account.html" class="btn_1">Sign In or Sign Up</a-->
										<div class="sign-in-wrapper">
											<div style="text-align: center; padding-bottom: 15px;"><i class="fas fa-user fa-lg" style="    padding: 30px 0px 0px 0px; font-size: 25px; color: var(--main-bg-color-primario); "></i>Iniciar Sesión</div>
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
													<a href="/registro" class="btn_1">Registrate</a>
													<!--a href="/">Crea tu Cuenta</a-->
											</div>
											{!! Form::close() !!}

										</div>

									</div>
								</div>
							</li>

							@endif
								<li>
								<div class="dropdown">
							
									<a href="#" id="sign_out" data-toggle="dropdown" style=""><i class="fas fa-user fa-lg" style="margin-top: 25px; font-size: 25px;  color: var(--main-bg-color-primario); "></i></a>
								
								</div>
							</li>
							{{--<li style="text-align: center;">
								<a href="{{ $company_main->facebook }}" target="_blank" style=" margin-top: 10px;"><img src="/template_14/img/facebook_icon.svg" style="width: 25px;     border-radius: 20px;"></a>
								<a  href="{{ $company_main->facebook }}" target="_blank" title="" style="">Síguenos</a>
								
								</li>--}}
							{{--<li><a href="/suscripcion" class="btn_3">Suscribete</a></li>
							<li><a href="{{$company_main->whatsapp}}" target="_blank" class="btn_3" style="background: var(--main-bg-color-secundario);"><i class="fas fa-phone"></i> {{ $company_main->cel }}</a></li>--}}
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


			<div class="main_header" style="background: var(--main-bg-color-primario);">
			<div class="container">
				<div class="row small-gutters">
					
					{{--<nav class="col-xl-8 col-lg-8">
						
						<!-- Mobile menu button -->

						<div class="main-menu main-menu-header">
							
							<ul>
								
								@foreach ($header_categories as $key => $category)
								<li class="submenu category_item" style="text-align: center;">
									<img src="{{ $category['icon_white'] }}" class="category_img" style="filter: brightness(6); padding-top: 10px;">
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
					</nav>--}}

					<nav class="col-xl-2 col-lg-2 categories">
							<ul class="clearfix" style="display: flex;">
								
								<li>
									<span>
										<a href="#" style="color: white; padding-top: 5px; font-size: 18px;"  >
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categorías
										</a>
									</span>
									<div id="menu_" style=""> {{--aqui hay que editar el menu_ para que funcione en responsive--}}
										<ul style="overflow-y: scroll; height: 370px; overflow-x: hidden;">
											@foreach ($header_categories as $key => $category)
											<li><span><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria="><span><img src="{{ $category['icon'] }}" style="width: 24px;"></span>  {{ $category['name'] }}</a></span>

												<ul>

													<div class="row">
														<div class="col-md-6">
															
															@foreach ($category['subcategories'] as $subcategory)
														<li><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
															@endforeach
														</div>
														<div class="col-md-6">
															<li><img src="{{ $category['image_thumb'] }}" width="250px;" style="padding: 30px;"></li>
														</div>
														
													</div>
													
													
													

												</ul>

											</li>
											@endforeach
										</ul>

								</li>
							</ul>
						</nav>
							<div class="col-xl-7 col-lg-7 align-items-center justify-content-end " style="padding-top: 20px;">
						<a href="/" class="btn_3" style="  margin: 0 15px 0 10px;  background: var(--main-bg-color-secundario);">Inicio</a> <span style="color: white;">¡Bienvenidos!</span>					
					</div>

					
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center justify-content-end text-center">
						<a class="phone_top" href="/suscripcion"><strong><span>Catálogo Digital</span></strong></a>
						<a href="/suscripcion" ><img src="/template_14/img/catalogo.png" class="button_select" width="25px" style="padding: 2px;  margin: 10px;"></a>
						<a href="/suscripcion" class="btn_3" style="  margin: 0 15px 0 10px;  background: var(--main-bg-color-secundario);">Suscribete</a>
						<a class="phone_top" href="{{ $company_main->whatsapp }}" target="_blank"><strong><span>Llámanos</span>{{ $company_main->cel }}</strong></a>
						<a href="{{ $company_main->whatsapp }}" target="_blank"><img src="/template_14/img/contacto.jpg" class="button_select" width="40px" style="padding: 2px; border-radius: 20px; margin: 10px;"></a>

						<a class="phone_top" href="{{ $company_main->facebook }}" target="_blank"><strong><i style="color: white" class="fab fa-facebook-f fa-2x"></i><span>Síguenos</span></strong></a>

					
					</div>
					
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->


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


		
		
