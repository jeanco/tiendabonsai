




@if(count($promoted_products)>0)
<div class="container margin_60_35">
			<div class="main_title">
				<h2>Productos en Promoción</h2>
				<p>Tenemos una variedad en descuentos y promociones</p>
			</div>
			<div class="row small-gutters">
				@foreach ($promoted_products as $product)
					@php
						$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
						$image = ($product['photo']) ? $product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					@endphp

				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
						<span class="ribbon new">{{ $discount }}% DSCTO.</span>
							<a href="/catalogo/{{ $product['slug'] }}">
							<img class="img-fluid lazy" src="" data-src="{{ $image }}" alt="">
							<img class="img-fluid lazy" src="" data-src="{{ $image }}" alt="">
							</a>
							<!--div data-countdown="2020/05/20" class="countdown"></div-->
						</figure>
						<!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
						<a href="/catalogo/{{ $product['slug'] }}">
							<h3>S/{{ $product['name'] }}</h3>
						</a>
						<div class="price_box">
							<span class="new_price">S/{{ $product['price_promotion'] }}</span>
							<br>
							<span class="old_price">S/{{ $product['price'] }}</span>
						</div>
						<ul>
							<!--li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li-->
							<li><a href="#" data-index="{{ $product['id'] }}" class="tooltip-1 add_to_cart" data-toggle="tooltip" data-placement="left" title="Agregar al carrito"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				@endforeach

				{{--
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon off">-30%</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/2.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/2_b.jpg" alt="">
							</a>
							<div data-countdown="2020/03/15" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Okwahn II</h3>
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
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon off">-50%</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/3.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/3_b.jpg" alt="">
							</a>
							<div data-countdown="2020/03/15" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Wildwood ACG</h3>
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
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/4.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/4_b.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor ACG React Terra</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$110.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/5.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/5_b.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Zoom Alpha</h3>
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
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/6.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/6_b.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Alpha</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$130.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon hot">Hot</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/7.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/7_b.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Max 98</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$115.00</span>
						</div>
						<ul>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="index.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon hot">Hot</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/8.jpg" alt="">
								<img class="img-fluid lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/8_b.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Max 720</h3>
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
				<!-- /col -->

				--}}
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
@else
@endif
