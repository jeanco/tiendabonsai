

		@foreach($categories_featured as $f => $category)
		<div class="container margin_60_35">
			<div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 2px;">{!! $category['content'] !!} {{--<b>{{ $category['name'] }}</b>--}} {{-- $category['icon_white'] --}}</div>
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

						$brand = 'Otros';

						if(count($product['brands_perfil_product'])){
						$brand = $product['brands_perfil_product'][0]['name'];
						}		

						$time=Carbon\Carbon::now()->format('Y/m/d');
						$item_time_promotion=Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d');
						

					@endphp
					<div class="item owl-item-card" >
						<div class="grid_item">
							
							{{--@if($product['promotion_available'])
							<span class="ribbon ofert">Oferta</span>
							@else
							<span class="ribbon new">Nuevo</span>
							@endif--}}
							{{--<figure>
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
							</figure>--}}
							<figure>
							<a href="/catalogo/{{ $product['slug'] }}">
								<div style="background-image: url({{ $image }});  height: 180px;
																		background-position: center; 
																		background-size: contain;
																		background-repeat: no-repeat;" class="item-box"></div>
																		</a>
										@if($time<$item_time_promotion)
											@if($product['promotion_available'])
									        <div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
											</div>
											@endif
										@endif
						</figure>
						@if($product['promotion_available'])
							@if($product['promotion_label_image'])
							<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}" style=" width: 64px;"></div>
							@else
							<div class="brand_ribbon"></div>
							@endif
						
						@endif






							<span class="b_font_" style="color: var(--main-bg-color-primario);">Marca: {{$brand}} </span>
							<a href="/catalogo/{{ $product['slug'] }}">
								<div class="font-weight-bold text-center" style="font-size: 16px; color: #2b2b2b;" data-stock="{{ $product['stock'] }}">{{ $product['name'] }}</div>
								
							</a>
							<div style="display: flex;
						    flex-direction: column;
						    justify-content: space-between;
						    height: 135px;">

    						@if($product['stock'] <= 0)
									<span>{{--Stock No Disponible--}}</span>
								@endif
							{{--@if($product['stock'] > 0)--}}
							<div class="price_box text-center my-3">
								@if($product['promotion_available'])
									<span class="old_price">S/{{ $product['price'] }}</span><br>
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 22px;">S/{{ $product['price_promotion'] }}</span><br>
									<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
								@else
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 22px;">S/{{ $product['price'] }}</span>
								@endif
							</div>
							{{--@endif--}}

							 @if($product['stock'] <= 0)
							<div class="" >
								<a href="javascript:void(0);" class="btn_1 add_to_cart {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}" style="background: #3c3c3c9e;">Agregar al Carrito</a>
							</div>
							@else
							<div class="">
								<a href="javascript:void(0);" class="btn_1 add_to_cart {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">Agregar al Carrito</a>
							</div>
							@endif
							
								
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
