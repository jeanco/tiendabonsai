
		<div class="container margin_60_35">
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
				{{-- 
				<div class="item">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="owl-lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/5.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Air Zoom Alpha</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$140.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /item -->
				<div class="item">
					<div class="grid_item">
						<span class="ribbon hot">Hot</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="owl-lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/8.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Air Color 720</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$120.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /item -->
				<div class="item">
					<div class="grid_item">
						<span class="ribbon off">-30%</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="owl-lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/2.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Okwahn II</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$90.00</span>
							<span class="old_price">$170.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /item -->
				<div class="item">
					<div class="grid_item">
						<span class="ribbon off">-50%</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="owl-lazy" src="/template_2/img/products/product_placeholder_square_medium.jpg" data-src="/template_2/img/products/shoes/3.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Air Wildwood ACG</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$75.00</span>
							<span class="old_price">$155.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /item -->
				--}}
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		