<div class="row small-gutters">
	@foreach ($products as $product)
	<div class="col-6 col-md-3 owl-item-card">

		<div class="grid_item ">

			@php
				$image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

				if(count($product['other_photo'])){
					$image = $product['other_photo']['resource'];
				}

				if(count($product['main_photo'])){
					$image = $product['main_photo']['resource'];
				}
			@endphp

			<figure>
				<center>
				<a href="/catalogo/{{ $product['slug'] }}">
				{{--<img class="owl-lazy" src="{{ $image }}" data-src="{{ $image }}" alt="" style="max-height: 180px; width: auto;">--}}
				<img class="owl-lazy" src="{{ $image }}" data-src="{{ $image }}" alt="" style=" width: 100%;
    opacity: 1;">
				</a>
				</center>
				@if($product['promotion_available'])
		        <div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
				</div>
				@endif
			</figure>
			@if($product['promotion_available'])
			<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}"></div>
			@endif
			<a href="/catalogo/{{ $product['slug'] }}">
				<div class="font-weight-bold text-center" style="font-size: 12px; color: #2b2b2b;">{{ $product['name'] }}</div>
				
			</a>
			<div style="display: flex;
						    flex-direction: column;
						    justify-content: space-between;
						    height: 135px;">
						    @if($product['stock'] <= 0)
					<span>Stock No Disponible</span>
				@endif
			{{--@if($product['stock'] > 0)--}}
			<div class="price_box text-center my-3">
				@if($product['promotion_available'])
					<span class="old_price">S/{{ $product['price'] }}</span><br>
					<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['price_promotion'] }}</span><br>
					<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
				@else
					<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['price'] }}</span>
				@endif
			</div>
			{{--@endif--}}
			<div class="">
				<a href="javascript:void(0);" class="btn_1 add_to_cart {{ $product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">Agregar al Carrito</a>
			</div>
		</div>
		</div>
		<!-- /grid_item -->
	</div>
	@endforeach
	<!-- /col -->
	{{--
	<div class="col-6 col-md-4">
		<div class="grid_item">
			<span class="ribbon off">-30%</span>
			<figure>
				<a href="product-detail-1.html">
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/2.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/3.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/4.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/5.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/6.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/7.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/8.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_6/img/products/product_placeholder_square_medium.jpg" data-src="/template_6/img/products/shoes/9.jpg" alt="">
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
