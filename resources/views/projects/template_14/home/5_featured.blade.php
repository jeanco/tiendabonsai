<div class="mt-5"></div>
		@foreach($categories_featured as $f => $category)
			@if(count($category['products']))
				<div class="container">
					<div class="mb-2 text-center title_category" style="font-size: 2em; line-height: 1;">
						{!! $category['content'] !!}
						{{--<b>{{ $category['name'] }}</b>--}}
						{{-- $category['icon_white'] --}}
					</div>
					<div  class="owl-carousel owl-theme products_carousel " >
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

								$transfer_end_at=Carbon\Carbon::parse($product['transfer_end_at'])->format('Y/m/d');
							@endphp
							<div class="item owl-item-card" >
								<div class="grid_item">

									@if($product['promotion_available'])
									<span class="ribbon ofert">Oferta</span>
									@else
									<span class="ribbon new">Nuevo</span>
									@endif
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


										@if($product['transfer_available'] && $transfer_end_at >= $time)
											<br>
											<div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($transfer_end_at)->format('Y/m/d') }}" class="countdown"></div>
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
										<div class="font-weight-bold text-center font_bold" style="font-size: 18px; color: #2b2b2b; line-height: 1.2;" data-stock="{{ $product['stock'] }}">{{ $product['name'] }}</div>

									</a>
									<div style="display: flex;
								    flex-direction: column;
								    justify-content: space-between;
								    height: 135px;">

		    						@if($product['stock'] <= 0)
											<span style="color: red;
    font-weight: bold;
    font-size: 19px;
    margin-top: 10px;">Stock No Disponible</span>
										@endif
									@if($product['stock'] > 0)

									@endif

									<div class="price_box text-center my-3">

										<div class="row">
											<div class="col-7 text-left" style="font-size: 11px;
    letter-spacing: -0.6px; padding-right: 1px;padding-left: 1px; line-height: 22px;">
												@if($product['transfer_available'] && $transfer_end_at >= $time)
												<span>Exclusivo con Transferencia  </span><br>
												@endif
												@if($product['promotion_available'])<span>Precio Online</span><br>
												@endif
												<span>Precio Sugerido </span><br>
												
											</div>
											<div class="col-5 text-right" style="padding-right: 1px;padding-left: 1px;">
												<div class="price_main"  style="text-align: left;">
											@if($product['transfer_available'] && $transfer_end_at >= $time)
											<span class="transfer_price font_bold" style="font-size: 20px !important;">S/ {{ $product['transfer_price'] }}</span><br>
											@endif
											@if($product['promotion_available'])
											<span class="new_price font_bold" style="font-size: 18px !important;">S/ {{ $product['price_promotion'] }}</span><br>
											<span class="old_price font_bold" style="line-height: 0px;
    font-size: 15px !important;">S/ {{ $product['price'] }}</span><br>
											<span class="percentage">Ahorras {{ $product['promotion_discount'] }}</span>
											{{--<span class="font_bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>--}}
											@else
												<span class="new_price font_bold" style="">S/ {{ $product['price'] }}</span><br>
											@endif

											
											</div>
											</div>
										</div>

										{{--@if($product['promotion_available'])
											<span class="old_price">S/{{ $product['price'] }}</span><br>
											<span class="new_price  font_bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['price_promotion'] }}</span><br>
											<span class=" font_bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
										@else
											<span class="new_price  font_bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['price'] }}</span>

										@endif

										@if($product['transfer_available'])
										<br>
										<span class="new_price  font_bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['transfer_price'] }}</span>
										@endif--}}


									</div>
								
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
			@endif

		@endforeach

		<!-- /container -->
