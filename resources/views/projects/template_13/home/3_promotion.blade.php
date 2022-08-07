
@if(count($promoted_products)>0)
{{--<div class="container margin_60_35">
			<div class="main_title">
				<h2>Productos en Promoción</h2>
				<p>Tenemos una variedad en descuentos y promociones</p>
			</div>
			<div class="row small-gutters">
				@foreach ($promoted_products as $product)
					@php
						$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
						<span class="ribbon new">{{ $discount }}% DSCTO.</span>
							<a href="/catalogo/{{ $product['slug'] }}">
							<img class="img-fluid lazy" src="" data-src="{{ $image }}" alt="">
							<img class="img-fluid lazy" src="" data-src="{{ $image }}" alt="">
							</a>
							<!--div data-countdown="2020/05/20" class="countdown"></div-->
						</figure>
						<!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
						<a href="/catalogo/{{ $product['slug'] }}">
							<h3>S/{{ $product['name'] }}</h3>
						</a>
						<div class="price_box">
							<span class="new_price">S/{{ $product['price_promotion'] }}</span>
							<br>
							<span class="old_price">S/{{ $product['price'] }}</span>
						</div>
						<ul>
							<!--li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li-->
							<li><a href="#" data-index="{{ $product['id'] }}" class="tooltip-1 add_to_cart" data-toggle="tooltip" data-placement="left" title="Agregar al carrito"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				@endforeach

				
			</div>
			<!-- /row -->
		</div>--}}
		<!-- /container -->


		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Productos en Promoción</h2>
				<p>Tenemos una variedad en descuentos y promociones</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel " >
				@foreach ($promoted_products as $product)
					@php
						$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

					<div class="item owl-item-card" >
						<div class="grid_item">
							
							@if($product['promotion_available'])
							<span class="ribbon ofert">Oferta</span>
							@else
							<span class="ribbon new">Nuevo</span>
							@endif
							<figure>
								<center>
								<a href="/catalogo/{{ $product['slug'] }}">
								<!--img class="owl-lazy" src="" data-src="{{ $image }}" alt="" style="max-height: 180px; width: auto;"-->
								<img class="owl-lazy" src="" data-src="{{ $image }}" alt="" style=" width: 100%;  ">
								</a>
								</center>
								@if($product['promotion_available'])
						        <div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
								</div>
								@endif
							</figure>
							@if($product['promotion_available'])
							@if($product['promotion_label_image'])
							<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}">
							</div>
							@endif
								
							@endif
							<a href="/catalogo/{{ $product['slug'] }}">
								<div class="font-weight-bold text-center" style="font-size: 12px; color: #2b2b2b;" data-stock="{{ $product['stock'] }}">{{ $product['name'] }}</div>
								
							</a>
							<div style="display: flex;
						    flex-direction: column;
						    justify-content: space-between;
						    height: 135px;">

    						@if($product['stock'] <= 0)
									<span>Stock No Disponible</span>
								@endif
							@if($product['stock'] > 0)
							<div class="price_box text-center my-3">
								@if($product['promotion_available'])
									<span class="old_price">S/{{ $product['price'] }}</span><br>
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 22px;">S/{{ $product['price_promotion'] }}</span><br>
									<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
								@else
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 22px;">S/{{ $product['price'] }}</span>
								@endif
							</div>
							@endif
							<div class="">
								<a href="javascript:void(0);" class="btn_1 add_to_cart {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">Agregar al Carrito</a>
							</div>
								
							</div>
							

						</div>
						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->
			</div>
			<!-- /products_carousel -->
		</div>






@else
@endif


{{--<div id="carousel-home-2">
			<div class="owl-carousel owl-theme">
				<div class="owl-slide cover" style="background-image: url(/template_13/img/slides/slide_home_1_vertical.jpg);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center white">
										<h2 class="owl-slide-animated owl-slide-title">Runnig<br>Collection</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url(/template_13/img/slides/slide_home_2_vertical.jpg);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center white">
										<h2 class="owl-slide-animated owl-slide-title">Easy Fit<br>Collection</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url(/template_13/img/slides/slide_home_3_vertical.jpg);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center white">
										<h2 class="owl-slide-animated owl-slide-title">Casual<br>Collection</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url(/template_13/img/slides/slide_home_4_vertical.jpg);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center black">
										<h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Monarch</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Lightweight cushioning and durable support with a Phylon midsole
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
				</div>
			</div>
			<div id="icon_drag_mobile"></div>
		</div>--}}
		<!--/carousel-->

