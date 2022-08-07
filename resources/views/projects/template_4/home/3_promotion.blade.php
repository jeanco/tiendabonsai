




@if(count($promoted_products))
<div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 5px; padding-top: 30px; font-weight: bold; color: var(--main-bg-color-primario);">{{$company_main->title_promotion}}</div>

<div id="carousel-home" class="header_desktop" style="padding-bottom: 50px;">
			<div class="owl-carousel owl-theme">
				@php
					$k = 0;
				@endphp
				@for ($i = 0; $i < $sliders_quantity; $i++)
				<div class="owl-slide cover" >
					<div class="opacity-mask" >
						<div class="container">
							<div class="row justify-content-center ">
								<div class="container margin_60_35">
									<div class="row small-gutters categories_grid">
										<div class="col-sm-12 col-md-8 pr-3">
											<a href="/catalogo/{{ $promoted_products[$k]['slug'] }}" style="padding-right: 20px;">
												<img src="{{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" data-src="{{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy">
												{{--<div class="wrapper">
													<h2>{{ $promoted_products[$k]['name'] }}</h2>
													<p></p>
												</div>--}}
											</a>
										</div>
										<div class="col-sm-12 col-md-4">
											<div class="row small-gutters mt-md-0 mt-sm-2">
												<div class="col-sm-12">
													<a href="{{ isset($promoted_products[$k+1]) ? '/catalogo/'. $promoted_products[$k+1]['slug'] : '#' }}" style="padding-right: 15px;">
														<img src="{{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"  data-src="{{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy">
														{{--<div class="wrapper">
															<h2>{{ isset($promoted_products[$k+1]) ? $promoted_products[$k+1]['name'] : '' }}</h2>
															<p></p>
														</div>--}}
													</a>
												</div>
												<div class="col-sm-12 mt-sm-2">
													<a href="{{ isset($promoted_products[$k+2]) ? '/catalogo/'. $promoted_products[$k+2]['slug'] : '#' }}" style="padding-right: 15px;">
														<img src="{{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"  data-src="{{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-fluid lazy">
														{{--<div class="wrapper">
															<h2>{{ isset($promoted_products[$k+2]) ? $promoted_products[$k+2]['name'] : '' }}</h2>
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
					$k += 3;
				@endphp
				@endfor
				<!--/owl-slide-->
			
			</div>
			<div id="icon_drag_mobile"></div>
		</div>



<div id="carousel-home" class="header_movil">
			<div class="owl-carousel owl-theme" style="height: 200px !important;">
				@php
					$k = 0;
				@endphp

				@foreach( $promoted_products as $k => $promoted_product )
				<a href="/catalogo/{{ $promoted_products[$k]['slug'] }}">
					<div class="owl-slide cover" style="background-image: url({{ isset($promoted_products[$k]) ? $promoted_products[$k]['promotion_image'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}); height: 200px;
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;">
				
				</div>
				</a>
				@endforeach

			</div>

		</div>




@endif




