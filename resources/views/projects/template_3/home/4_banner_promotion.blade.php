@if(count($promoted_products))
{{--<div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 20px; padding-top: 60px">Nuestras  <b>Promociones</b> <br>que te facinaran</div>--}}
<div id="carousel-home" class="header_desktop" style="padding-bottom: 0px;">
			<div class="owl-carousel owl-theme">
				@php
					$k = 0;
				@endphp
				@for ($i = 0; $i < $sliders_quantity; $i++)
				<div class="owl-slide cover" >
					<div class="opacity-mask d-flex align-items-center" >
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="container margin_60_35">
									<div class="row small-gutters categories_grid">
										<div class="col-sm-12 col-md-6 pr-3">
											<a href="/catalogo/{{ $promoted_products[$k]['slug'] }}" style="padding-right: 20px;">
												<img src="{{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" data-src="{{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy">
												{{--<div class="wrapper">
													<h2>{{ $promoted_products[$k]['name'] }}</h2>
													<p></p>
												</div>--}}
											</a>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="row small-gutters mt-md-0 mt-sm-2">
												<div class="col-sm-6">
													<a href="{{ isset($promoted_products[$k+1]) ? '/catalogo/'. $promoted_products[$k+1]['slug'] : '#' }}" style="padding-right: 15px;">
														<img src="{{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"  data-src="{{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy">
														{{--<div class="wrapper">
															<h2>{{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['name'] : '' }}</h2>
															<p></p>
														</div>--}}
													</a>
												</div>
												<div class="col-sm-6">
													<a href="{{ isset($promoted_products[$k+2]) ? '/catalogo/'. $promoted_products[$k+2]['slug'] : '#' }}" style="padding-right: 15px;">
														<img src="{{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"  data-src="{{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy">
														{{--<div class="wrapper">
															<h2>{{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['name'] : '' }}</h2>
															<p></p>
														</div>--}}
													</a>
												</div>
												<div class="col-sm-6 mt-sm-2">
													<a href="{{ isset($promoted_products[$k+3]) ? '/catalogo/'. $promoted_products[$k+3]['slug'] : '#' }}" style="padding-right: 15px;">
														<img src="{{ isset($promoted_products[$k+3]) ? $promoted_products[$k+3]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"  data-src="{{ isset($promoted_products[$k+3]) ? $promoted_products[$k+3]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy" style="  ">
														{{--<div class="wrapper">
															<h2>{{ isset($promoted_products[$k+3]) ? $promoted_products[$k+3]['name'] : '' }}</h2>
															<p></p>
														</div>--}}
													</a>
												</div>
												<div class="col-sm-6 mt-sm-2">
													<a href="{{ isset($promoted_products[$k+4]) ? '/catalogo/'. $promoted_products[$k+4]['slug'] : '#' }}" style="padding-right: 15px;">
														<img src="{{ isset($promoted_products[$k+4]) ? $promoted_products[$k+4]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"  data-src="{{ isset($promoted_products[$k+4]) ? $promoted_products[$k+4]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy" style="  ">
														{{--<div class="wrapper">
															<h2>{{ isset($promoted_products[$k+4]) ? $promoted_products[$k+4]['name'] : '' }}</h2>
															<p></p>
														</div>--}}
													</a>
												</div>
											</div>
										</div>

									</div>
									<!--/categories_grid-->
								</div>
								<!-- /container -->
							</div>
						</div>
					</div>
				</div>
				@php
					$k += 5;
				@endphp
				@endfor
				<!--/owl-slide-->
				{{--
				<div class="owl-slide cover" >
					<div class="opacity-mask d-flex align-items-center" >
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="container margin_60_35">
									<div class="row small-gutters categories_grid">
										<div class="col-sm-12 col-md-6">
											<a href="listing-grid-1-full.html">
												<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
												<div class="wrapper">
													<h2>PRODUCTO PROMOCIONADO</h2>
													<p>115 Products</p>
												</div>
											</a>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="row small-gutters mt-md-0 mt-sm-2">
												<div class="col-sm-6">
													<a href="listing-grid-1-full.html">
														<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
														<div class="wrapper">
															<h2>PRODUCTO PROMOCIONADO</h2>
															<p>150 Products</p>
														</div>
													</a>
												</div>
												<div class="col-sm-6">
													<a href="listing-grid-1-full.html">
														<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
														<div class="wrapper">
															<h2>PRODUCTO PROMOCIONADO</h2>
															<p>90 Products</p>
														</div>
													</a>
												</div>
												<div class="col-sm-12 mt-sm-2">
													<a href="listing-grid-1-full.html">
														<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
														<div class="wrapper">
															<h2>PRODUCTO PROMOCIONADO</h2>
															<p>120 Products</p>
														</div>
													</a>
												</div>
											</div>
										</div>

									</div>
									<!--/categories_grid-->
								</div>
								<!-- /container -->
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" >
					<div class="opacity-mask d-flex align-items-center" >
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="container margin_60_35">
									<div class="row small-gutters categories_grid">
										<div class="col-sm-12 col-md-6">
											<a href="listing-grid-1-full.html">
												<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
												<div class="wrapper">
													<h2>PRODUCTO PROMOCIONADO</h2>
													<p>115 Products</p>
												</div>
											</a>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="row small-gutters mt-md-0 mt-sm-2">
												<div class="col-sm-6">
													<a href="listing-grid-1-full.html">
														<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
														<div class="wrapper">
															<h2>PRODUCTO PROMOCIONADO</h2>
															<p>150 Products</p>
														</div>
													</a>
												</div>
												<div class="col-sm-6">
													<a href="listing-grid-1-full.html">
														<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" class="img-fluid lazy">
														<div class="wrapper">
															<h2>PRODUCTO PROMOCIONADO</h2>
															<p>90 Products</p>
														</div>
													</a>
												</div>
												<div class="col-sm-12 mt-sm-2">
													<a href="listing-grid-1-full.html">
														<img src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" data-src="https://dl.dropboxusercontent.com/s/ly70ylwvctq0rbk/1594051614-1594051614.png?dl=0" alt="" style="    height: 250px;" class="img-fluid lazy">
														<div class="wrapper">
															<h2>PRODUCTO PROMOCIONADO</h2>
															<p>120 Products</p>
														</div>
													</a>
												</div>
											</div>
										</div>

									</div>
									<!--/categories_grid-->
								</div>
								<!-- /container -->
							</div>
						</div>
					</div>
				</div>
				--}}
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<br><br><br>




<div id="carousel-home" class="header_movil">
			<div class="owl-carousel owl-theme">
				@php
					$k = 0;
				@endphp

				@foreach( $promoted_products as $k => $promoted_product )
				<a href="/catalogo/{{ $promoted_products[$k]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
				@endforeach

				{{--@for ($i = 0; $i < $sliders_quantity; $i++)
				<a href="/catalogo/{{ $promoted_products[$k]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>

				<!--/owl-slide-->
				<a href="/catalogo/{{ $promoted_products[$k+1]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>


				<a href="/catalogo/{{ $promoted_products[$k+2]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>


				<a href="/catalogo/{{ $promoted_products[$k+3]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k+3]) ? $promoted_products[$k+3]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>

				</a>

				<a href="/catalogo/{{ $promoted_products[$k+4]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k+4]) ? $promoted_products[$k+4]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>


				@php
					$k += 5;
				@endphp
				@endfor--}}

			</div>
			<div id="icon_drag_mobile"></div>
		</div>




@endif







{{--
@if(count($secction_promotions)>0)
<div class="featured lazy" data-bg="url({{ $secction_promotions[0]->image }})">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.22)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
						<h3>{!! $secction_promotions[0]->title !!}</h3>
							<p></p>
							<div class="feat_text_block">

							@if($secction_promotions[0]->link_text)
							<a class="btn_1" href="{{ $secction_promotions[0]->link }}" target="_blank" role="button">{{ $secction_promotions[0]->link_text }}</a>
							@else
							@endif

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->
@else
@endif
--}}

<div id="carousel-home" class="header_desktop menu_padding">
			<div class="owl-carousel owl-theme">
				@foreach ($catalogs as $key => $catalog)
				<a href="{{ $catalog['link'] }}" target="_blank">
					<div class="owl-slide cover" style="background-image: url({{ $catalog['image_desktop'] }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.35)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-right white">
									{{--<h2 class="owl-slide-animated owl-slide-title">{!! $catalog['title'] !!}</h2>--}}
										{{--<p class="owl-slide-animated owl-slide-subtitle">
											$catalog['subtitle']
										</p>--}}
									{{--<div class="owl-slide-animated owl-slide-cta">
										<a class="btn_1" href="{{ $catalog['link'] }}" target="_blank" role="button">$catalog['link_text']</a>
									</div>--}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>

				@endforeach
			</div>

			<div id="icon_drag_mobile"></div>
</div>
