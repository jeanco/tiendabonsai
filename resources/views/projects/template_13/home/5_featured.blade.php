
		@foreach($categories_featured as $f => $category)
		<div class="container margin_60_35">

			<div class="title_1 linea mb-3"><span>Lo que necesitas en <b>{{ $category['name'] }}</b></span></div>

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

						$time=Carbon\Carbon::now()->format('Y/m/d');
								$item_time_promotion=Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d');
					@endphp

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
									<div class="price_box">
									@if(!count($product['product_child']))

									@if($product['unit_price'])

										@if($product['unit_price'])
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($product['unit_price']['price'], 2, '.', '') }}</span>
										@elseif ($product['promotion_available'])
											<span class="old_price">S/{{ number_format($product['price'], 2, '.', '') }}</span><br>
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($product['price_promotion'], 2, '.', '') }}</span><br>
											{{-- 
											<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
											--}}
										@else
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($product['price'], 2, '.', '') }}</span>
										@endif

										@else
									<span>Stock No Disponible</span>

									@endif

									@else

										@if($product['product_child']['unit_price'])
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($product['product_child']['unit_price']['price'], 2, '.', '') }}</span>
										@elseif($product['product_child']['promotion_available'])
											<span class="old_price">S/{{ number_format($product['product_child']['price'], 2, '.', '') }}</span><br>
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($product['product_child']['price_promotion'], 2, '.', '') }}</span><br>
											{{-- 
											<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['product_child']['promotion_discount'] }}</span>
											--}}
										@else
											<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($product['product_child']['price'], 2, '.', '') }}</span>
										@endif
									

									@endif
									</div>
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
							@if(!count($product['product_child']))
								<!--a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a-->

							@if($product['unit_price'])
						<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $product['stock'] <= 0 || ($product['price'] == null)  ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a>
						@else
						<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart disabled" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a>
						@endif

							@else
								<a href="javascript:void(0);" data-toggle="modal" data-target="#carrito_more_presentations" class="btn btn-block btn_cars see-presentations {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a>
							@endif


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
