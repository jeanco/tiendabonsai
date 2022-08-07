

		@foreach($categories_featured as $f => $category)
		<div class="container margin_60_35">
			<div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 20px;">Mejor Calidad en <b>{{ $category['name'] }}</b> {{-- $category['icon_white'] --}}</div>
			<div class="owl-carousel owl-theme products_carousel " >
				@foreach ($category['products'] as $product)
					@php
						$image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

						if(count($product['other_photo'])){
							$image = $product['other_photo']['resource'];
						}

						if(count($product['main_photo'])){
							$image = $product['main_photo']['resource'];
						}
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
		@endforeach

		<!-- /container -->
