@php
	$symbol = $current_currency[0]['symbol'];
	$decimal = $current_currency[0]['decimal'] ? 2 : 0;
@endphp

{{--<div class="toolbox elemento_stick add_bottom_30" style="color: #000; background-color: #f8f8f8;">
    <div class="container">
        <ul class="clearfix sm_none">
            <li>
                <div class="sort_select" style="color: #000;">
                    {{ $products->total() }} productos disponibles
                </div>
            </li>
        </ul>
        <div class="row align-items-center justify-content-between md_none">
          <div class="col-auto">
            <select class="form-control form-control-sm" id="order_by_select">
              <option value="DESC">Mayor precio</option>
              <option value="ASC">Menor precio</option>
            </select>
          </div>
          <div class="col-auto">
            <a href="#" class="open_filters">
              <i class="fas fa-sliders-h" style="top: 0;"></i>
              <label class="mb-0" style="font-weight: 700;">&nbsp;Filtros</label>
            </a>
          </div>
        </div>
    </div>
</div>--}}



<div class="row small-gutters">

		@if(count($products))
			@foreach ($products as $product)
				<div class="col-md-{{ $company->columns_grid }} col-6 mb-2">
					<div class="p-2">
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
						<div class="fig_item text-center">
							<a href="/catalogo/{{ $product['slug'] }}"><img src="{{ $image }}" alt="" style="height: 250px;"></a>
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
				</div>
			@endforeach
		@else
			@if(Request::get('q'))
				No se encuentraron resultados para su búsqueda:  <b>{{ Request::get('q') }}</b>
			@endif
		@endif

	{{--
	@if(count($products))
	@foreach ($products as $product)
	<div class="col-6 col-md-{{ $company->columns_grid }} owl-item-card mb-2">
		<div class="p-2">
			<div class="grid_item " style="display: flex;
							    flex-direction: column;
							    justify-content: space-between;
							    height: 320px;">

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

				<figure>
					<a href="/catalogo/{{ $product['slug'] }}">
						<div style="background-image: url({{ $image }});  height: 200px;
																background-position: center;
																background-size: contain;
																background-repeat: no-repeat;" class="item-box"></div>
																</a>
					@if($time<$item_time_promotion)
						@if($product['promotion_available'] && $product['show_promotion_timer'])
				        <div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
						</div>
						@endif
					@endif
				</figure>
				@if($product['promotion_available'])
				<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}"></div>
				@endif

				<div class="text-left">
					<div class="font-weight-bold" style="color: #c3c3c3; font-size: 12px;">{{ count($product['brands_perfil_product_template_11']) ? $product['brands_perfil_product_template_11'][0]['name'] : 'Otros' }}</div>
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
								<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ ($product['price']) ? $symbol.number_format($product['price']*$rate, $decimal, '.', '') : '' }}</span>
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

				<div class="mb-2">
						<div class="mb-0">Compra minima: 2 und.</div>
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
	</div>
	@endforeach
	@else
		@if(Request::get('q'))
			No se encuentraron resultados para su búsqueda:  <b>{{ Request::get('q') }}</b>
		@endif
	@endif
	<!-- /col -->
	--}}

	{{--
	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon off">-30%</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/2.jpg" alt="">
				</a>
				<div data-countdown="2020/03/15" class="countdown"></div>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor Okwahn II</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$90.00</span>
				<span class="old_price">$170.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon off">-50%</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/3.jpg" alt="">
				</a>
				<div data-countdown="2020/03/15" class="countdown"></div>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor Air Wildwood ACG</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$75.00</span>
				<span class="old_price">$155.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon new">New</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/4.jpg" alt="">
				</a>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor ACG React Terra</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$110.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon new">New</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/5.jpg" alt="">
				</a>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor Air Zoom Alpha</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$140.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon new">New</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/6.jpg" alt="">
				</a>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor Air Alpha</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$130.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon hot">Hot</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/7.jpg" alt="">
				</a>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor Air 98</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$115.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon hot">Hot</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/8.jpg" alt="">
				</a>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor Air 720</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$120.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	<!-- /col -->

	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon hot">Hot</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/9.jpg" alt="">
				</a>
			</figure>
			<a href="product-detail-1.html">
				<h3>Armor 720</h3>
			</a>
			<div class="price_box">
				<span class="new_price">$100.00</span>
			</div>
			<ul>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
				<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
			</ul>
		</div>
		<!-- /grid_item -->
	</div>
	--}}
	<!-- /col -->
</div>

<div class="pagination__wrapper">
	<!--ul class="pagination"-->
		{{ $products->appends(request()->except('page'))->links() }}
	<!--/ul-->
</div>
