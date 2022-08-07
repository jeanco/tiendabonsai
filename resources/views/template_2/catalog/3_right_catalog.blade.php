<div class="row small-gutters" style="padding-top: 20px;">
	@foreach ($products as $product)
	<div class="col-6 col-md-3">
		<div class="grid_item">
			@php
				$image = ($product['photo']) ? $product['photo']['resource_thumb']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

				$disabled = "";

				if($product['stock'] < $product['minimum_quantity']){
					$disabled = "disabled";
				}

				$img_promoted = "";
				$time=Carbon\Carbon::now()->format('Y/m/d');
				$item_time_promotion = Carbon\Carbon::now()->addDays(1)->format('Y/m/d');
				$timer = false;

				if(count($product['price_promoted'])){
					$img_promoted = $product['price_promoted']['etiquette'];

					if($product['price_promoted']['promotion_end_at']){
						$timer = true;
						$item_time_promotion=Carbon\Carbon::parse($product['price_promoted']['promotion_end_at'])->addDays(1)->format('Y/m/d');
					}
				}

				$price_original = $product['price'];

				if($product['unit_price']){
					$price_original = $product['unit_price']['price'];
				}

				$porcent =  ($product['price'] - $product['price_promotion'])*100/$product['price'];
				$porcent = round($porcent,2);
			@endphp

			<div class="brand_ribbon_left">
				@if(count($product['price_promoted']) )
				<span style="background: #27a9a0; border-radius: 2px;color: white;padding: 3px 5px;font-size: 0.9rem;font-weight: bold;">-{{$porcent}}% Dscto.</span>
				@else
					
				@endif
			</div>


			@if(count($product['price_promoted']) && $time < $item_time_promotion)
				<span class="ribbon off"><img src="{{ $img_promoted }}" width="50"></span>
				<!--div class="brand_ribbon"><img src="{{ $img_promoted }}" width="50"></div-->
			@endif
			<figure>
				<a href="/catalogo/{{ $product['slug'] }}">
				<img class="img-fluid lazy" src="{{ $image }}" data-src="{{ $image }}" alt="">
				</a>

			{{--@if($timer)
				@if($time < $item_time_promotion)
			        <div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($product['price_promoted']['promotion_end_at'])->addDays(1)->format('Y/m/d') }}" class="countdown"></div>
					</div>
				@endif
			@endif--}}
				<!-- <div data-countdown="2021/11/10" class="countdown"></div> -->
			</figure>
			<a href="/catalogo/{{ $product['slug'] }}">
				<h3>{{ $product['name'] }}</h3>
			</a>
			<div class="price_box">
				{{--@if(count($product['price_promoted']) && $time < $item_time_promotion)--}}
				@if(count($product['price_promoted']) )
					<span class="new_price">S/{{ $product['price_promoted']['price'] }}</span><br>
					<span class="old_price">S/{{ $price_original }}</span><br><br>
					
				@else
					<span class="new_price">S/{{ $price_original }}</span>
				@endif

			</div>

			@if($disabled)
				<!--span style="font-weight: bold;">Stock No Disponible </span-->
			@endif
			<ul>
				<!--li><a href="#" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
				<li><a href="#" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li-->
				<li>
				<a   href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" 
				class="tooltip-1 add_to_cart {{ $disabled }}" data-toggle="tooltip" data-placement="left" title="Comprar por whatwapp"
				>
				<!--i class="ti-shopping-cart"></i--><img src="/template_2/img/whatsapp.png" class="button_select" width="40px">
			</a>
			</li>
			</ul>
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/2.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/3.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/4.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/5.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/6.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/7.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/8.jpg" alt="">
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
					<img class="img-fluid lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/9.jpg" alt="">
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
	<ul class="pagination">
		{{ $products->appends(request()->except('page'))->links() }}
	</ul>
</div>
