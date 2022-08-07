
		@foreach($categories_featured as $f => $category)
		<div class="container margin_60_35">

			<div class="title_1 linea mb-3"><span>Lo que necesitas en <b>{{ $category['name'] }}</b></span></div>

			<div class="owl-carousel owl-theme products_carousel" >
				@foreach ($category['products'] as $product)

					@php
						$image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

						if(count($product['other_photo'])){
							$image = $product['other_photo']['resource_thumb'];
						}

						if(count($product['main_photo'])){
							$image = $product['main_photo']['resource_thumb'];
						}

						$time=Carbon\Carbon::now()->format('Y/m/d');
								$item_time_promotion=Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d');
					@endphp

					<div class="p-2">

						<div class="fig_item text-center">
							<a href="/catalogo/{{ $product['slug'] }}"><img src="{{ $image }}" alt="" style="height: 250px;"></a>
							@if($product['promotion_available'])
								<span class="ribbon_ofert">Oferta</span>
							@else
								<!-- <span class="ribbon new">Nuevo</span> -->
							@endif
							@if($product['promotion_available'])
								<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}"></div>
							@endif
							@if($time<$item_time_promotion)
								@if($product['promotion_available'] && $product['show_promotion_timer'])
									<div class="countdown_inner"><div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown_new"></div></div>
								@endif
							@endif
						</div>
						<div class="name_item_new mt-2">
							<div class="brand_item_new font-weight-bold" style="color: #c3c3c3; font-size: 12px;">{{ count($product['brands_perfil_product_template_11']) ? $product['brands_perfil_product_template_11'][0]['name'] : 'Otros' }}</div>
							<a href="/catalogo/{{ $product['slug'] }}" title="{{ $product['name'] }}"><div class="item_name" data-stock="{{ $product['stock'] }}">{{ $product['name'] }}</div></a>
						</div>
						<hr class="my-2">
						<div class="price_item_area">
							@if($product['stock'] > 0)

								@if(!$product['has_hidden_price'])
									@if($product['promotion_available'])
										<div class="old_item_price">{{ $symbol }}{{ number_format($product['price']*$rate, $decimal, '.', '') }}</div>
										<div class="actual_item_price">{{ $symbol }}{{ number_format($product['price_promotion']*$rate, $decimal, '.', '') }}</div>
										@if($product['promotion_discount_type'] == 1)
											<div class="detail_item_price">Ahorras {{ $product['promotion_discount'] }}%</div>
										@else
											<div class="detail_item_price">Ahorras {{ $symbol }}{{ number_format($product['promotion_discount']*$rate, $decimal, '.', '') }}</div>
										@endif
									@else
										<div class="actual_item_price">{{ ($product['price']) ? $symbol.number_format($product['price']*$rate, $decimal, '.', '') : '' }}</div>
									@endif
								@else
									<span>{{$product['message_about_price']}}</span>
								@endif
							@endif
							@if($product['stock'] <= 0)
								<div class="non_item_stock">Stock No Disponible</div>
							@endif

						</div>
						<div class="mb-2 input_item_cant">

								<div class="mb-0 min_item_buy">
									@if($product['minimum_quantity'] > 1)
										Compra mínima: {{ $product['minimum_quantity'] }} und.
									@endif
								</div>

								<div class="numbers-row" style="text-align: center !important;">
									<input type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
									<div class="inc button_inc">+</div>
									<div class="dec button_inc">-</div>
								</div>
						</div>
						<div style="text-align: center;">
							<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $product['stock'] <= 0 || ($product['price'] == null)  ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">LO LLEVO</a>
						</div>
					</div>
<!-- //////////////////////////////////////////////////////// -->
{{--
					<div class="item owl-item-card" style="background-color: #fff;">
						<div class="grid_item mb-0" style="display: flex;
						    flex-direction: column;
						    justify-content: space-between;
								height: 320px;">

							@if($product['promotion_available'])
								<span class="ribbon ofert">Oferta</span>
							@else
								<!-- <span class="ribbon new">Nuevo</span> -->
							@endif
							<figure>
								<center>
									<a href="/catalogo/{{ $product['slug'] }}">
										<img class="owl-lazy" src="" data-src="{{ $image }}" alt="" style=" height: 200px; width: auto; ">
									</a>
								</center>
								@if($time<$item_time_promotion)
									@if($product['promotion_available'])
									     <div class="countdown_inner" style="padding-top: 20px;">
										<div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
									</div>
									@endif
								@endif


							</figure>
							@if($product['promotion_available'])
								@if($product['promotion_label_image'])
									<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}"></div>
								@endif
							@endif

							<div class="text-left px-2">
								<div class="font-weight-bold" style="color: #c3c3c3; font-size: 12px;">Marca</div>
						    <a href="/catalogo/{{ $product['slug'] }}">
									<div class="item_name" data-stock="{{ $product['stock'] }}">{{ $product['name'] }}</div>
								</a>
								<hr class="my-1">
								@if($product['stock'] > 0)

									@if(!$product['has_hidden_price'])
									<div class="price_box">
										@if($product['promotion_available'])
											<span class="old_price">{{ $symbol }}{{ number_format($product['price']*$rate, $decimal, '.', '') }}</span><br>
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ $symbol }}{{ number_format($product['price_promotion']*$rate, $decimal, '.', '') }}</span><br>

											@if($product['promotion_discount_type'] == 1)
											<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}%</span>
											@else
											<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $symbol }}{{ number_format($product['promotion_discount']*$rate, $decimal, '.', '') }}</span>
											@endif
										@else
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ $symbol }}{{ number_format($product['price']*$rate, $decimal, '.', '') }}</span>
										@endif
									</div>
									@else
										<span>{{$product['message_about_price']}}</span>
									@endif
								@endif

    						@if($product['stock'] <= 0)
									<span>Stock No Disponible</span>
								@endif
							</div>
						</div>

						<div class="p-2">
									<div class="numbers-row" style="text-align: center !important; width: 100% !important;">
										<input type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
	                </div>
						</div>
						<div class="px-2 pb-2">
							<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">LO LLEVO</a>
						</div>
						<!-- /grid_item -->
					</div>
--}}
<!-- /////////////////////////////// -->
				@endforeach
				<!-- /item -->
			</div>
			<!-- /products_carousel -->
		</div>
		@endforeach

		<!-- /container -->
