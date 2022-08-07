
		{{--<div class="container margin_60_35">
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px">Productos Destacados</h2>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach ($featured_products as $product)
					@php
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

					<div class="item">
						<div class="grid_item">
							<span class="ribbon new">Nuevo</span>
							<figure>
								<a href="/catalogo/{{ $product['slug'] }}">
								<img class="owl-lazy" src="" data-src="{{ $image }}" alt="">
								</a>
							</figure>
							<!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
							<a href="/catalogo/{{ $product['slug'] }}">
								<h3>{{ $product['name'] }}</h3>
							</a>
							<div class="price_box">
								@if($product['promotion_available'])
									<span class="new_price">S/{{ $product['price_promotion'] }}</span>
									<br>
									<span class="old_price">S/{{ $product['price'] }}</span>
								@else
									<span class="new_price">S/{{ $product['price'] }}</span>
								@endif
							</div>
							<ul>
								<!--li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li-->
								<li><a href="" data-index="{{ $product['id'] }}" class="tooltip-1 add_to_cart" data-toggle="tooltip" data-placement="left" title="Agregar al carrito"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->
			
			</div>
			<!-- /products_carousel -->
		</div>--}}

		

		@foreach($categories_featured as $f => $category)
		<div class="container margin_60_35">
			<div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 20px;">Mejor Calidad en <b>{{ $category['name'] }}</b> {{-- $category['icon_white'] --}}</div>
			<div class="owl-carousel owl-theme products_carousel " >
				@foreach ($category['products'] as $product)
					@php
						$image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

						if(count($product['other_photo'])){
							$image = $product['other_photo']['resource_thumb'];
						}

						if(count($product['main_photo'])){
							$image = $product['main_photo']['resource_thumb'];
						}
					@endphp
					<div class="item owl-item-card" >
						<div class="grid_item" style="display: flex;
						    flex-direction: column;
						    justify-content: space-between;
						    height: 280px;">
							
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
							
							<div style="">
						    <a href="/catalogo/{{ $product['slug'] }}">
								<div class="font-weight-bold text-center" style="font-size: 12px; color: #2b2b2b;" data-stock="{{ $product['stock'] }}">{{ $product['name'] }}</div>
								
							</a>

							@if($product['stock'] > 0)
							<div class="price_box text-center my-3">
								@if($product['promotion_available'])
									<span class="old_price">S/{{ $product['price'] }}</span><br>
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 22px;">S/{{ $product['price_promotion'] }}</span><br>
									<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
								@else
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 22px;">{{ ($product['unit_price']) ? "S/".$product['unit_price']['price'] : '' }}</span>
								@endif
							</div>

						


							@endif

    						@if($product['stock'] <= 0)
								<span>Stock No Disponible</span>

							@endif
							</div>
						</div>
							<div class="row">
								<div class="col-6" style="padding-right: 4px !important; padding-left: 4px !important;">
									<div class="numbers-row" style="margin: 0px 0px 0px 20px; text-align: center !important; width: 85% !important;">
										<input type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
	                                	<!-- <div class="inc button_inc">+</div><div class="dec button_inc">-</div> -->
	               						</div>
								</div>
								<div class="col-6" style="text-align: center; padding-right: 4px !important; padding-left: 4px !important;">
											<a   href="javascript:void(0);" class="btn_1 add_to_cart {{ $product['stock'] <= 0 || !($product['unit_price'])  ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}" style="width: 110px;
    										border-radius: 10px !important;" >Agregar</a>
								</div>
							</div>
						<!-- /grid_item -->
					</div>
				@endforeach
				<!-- /item -->
			</div>
			<!-- /products_carousel -->
		</div>
		@endforeach

		<!-- /container -->
