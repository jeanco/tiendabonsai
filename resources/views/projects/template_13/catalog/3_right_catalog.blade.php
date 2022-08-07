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
	<div class="col-6 col-md-4 owl-item-card mb-2">
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
					{{--<center>
					<a href="/catalogo/{{ $product['slug'] }}">
					<img class="owl-lazy" src="{{ $image }}" data-src="{{ $image }}" alt="" style=" width: 100%;
	    opacity: 1;">
					</a>
					</center>--}}
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
						<div class="price_box">
							@if(!count($product['product_child']))
								{{--@if($product['unit_price'])
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{$product['unit_price']['price']}}</span>

								@elseif($product['promotion_available'])
									<span class="old_price">S/{{ $product['price'] }}</span><br>
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ $product['price_promotion'] }}</span><br>
									
								@else
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ ($product['price']) ? "S/".$product['price'] : '' }}</span>
								@endif--}}

								@if($product['unit_price'])
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{$product['unit_price']['price']}}</span>
								@else
									<span>Stock No Disponible</span>
								@endif

							@else

								@if($product['product_child']['unit_price'])
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ "S/".$product['product_child']['unit_price']['price'] }}</span>
								@elseif($product['product_child']['promotion_available'])
									<span class="old_price">S/{{ $product['product_child']['price'] }}</span><br>
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ $product['product_child']['price_promotion'] }}</span><br>
									{{-- 
									<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['product_child']['promotion_discount'] }}</span>
									--}}
								@else
									<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ "S/".$product['product_child']['price'] }}</span>
								@endif
							@endif
						</div>
					@endif

					@if($product['stock'] <= 0)
						<span>Stock No Disponible</span>
					@endif
				</div>

			</div>

				<div class="mb-2">
						<div class="numbers-row" style="text-align: center !important;">
							<input type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
							<div class="inc button_inc">+</div>
							<div class="dec button_inc">-</div>
		        </div>
				</div>
				<div style="text-align: center;">
					@if(!count($product['product_child']))

						@if($product['unit_price'])
						<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $product['stock'] <= 0 || ($product['price'] == null)  ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a>
						@else
						<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart disabled" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a>
						@endif

						


					@else
						<a href="javascript:void(0);" data-toggle="modal" data-target="#carrito_more_presentations" class="btn btn-block btn_cars see-presentations {{ $product['stock'] <= 0 || ($product['price'] == null)  ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">AGREGAR AL CARRITO</a>
					@endif
				</div>

		<!-- /grid_item -->
		</div>


	</div>
	@endforeach
	@else
		@if(Request::get('q'))
			No se encuentraron resultados para su búsqueda:  <b>{{ Request::get('q') }}</b>
		@endif
	@endif
	<!-- /col -->
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
