<div class="row small-gutters">
	@if(count($products))
	@foreach ($products as $product)
	<div class="col-6 col-md-4 owl-item-card">

		<div class="grid_item ">

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


				$disabled = "";
		$not_allowed = "";
		if($product['stock'] < $product['minimum_quantity']){
			$disabled = "disabled";
			$not_allowed = "cursor:not-allowed";
		}


			@endphp

			<figure>
				{{--<center>
				<a href="/catalogo/{{ $product['slug'] }}">
				<img class="owl-lazy" src="{{ $image }}" data-src="{{ $image }}" alt="" style=" width: 100%;
    opacity: 1;">
				</a>
				</center>--}}
				<a href="/catalogo/{{ $product['slug'] }}">
					<div style="background-image: url({{ $image }});  height: 180px;
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
			{{--@if($product['promotion_available'])
			<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}"></div>
			@endif--}}

			@if($product['promotion_label_image'] != '')
			<div class="brand_ribbon"><img src="{{ $product['promotion_label_image'] }}"></div>
			@endif

			<a href="/catalogo/{{ $product['slug'] }}">
				<div class="font_bold text-center " style="font-size: 18px; color: #2b2b2b; line-height: 1.2;">{{ $product['name'] }}</div>

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
					<span class="new_price font_bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['price_promotion'] }}</span><br>
					<span class="font_bold" style="color: #d8203c;">Ahorras {{ $product['promotion_discount'] }}</span>
				@else
					<span class="new_price font_bold" style="color: #d8203c; font-size: 24px;">S/{{ $product['price'] }}</span>
				@endif
			</div>
			{{--@endif--}}
			<div class="mb-2">
						<div class="numbers-row" style="text-align: center !important;">
							<input type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
							<div class="inc button_inc">+</div>
							<div class="dec button_inc">-</div>
		        </div>
				</div>
			<div class="" style="{{ $not_allowed}}">
				<a href="javascript:void(0);" class="btn_1 add_to_cart {{ $disabled }}" title="Agregar al carrito" data-index="{{ $product['id'] }}">Agregar al Carrito</a>
			</div>
			{{--<div class="col-lg-12 col-md-12">
				<div  style="{{ $not_allowed}}"><a   data-index="{{ $product['id'] }}" href="javascript:void(0);" class="buy_now btn_1 {{ $disabled}}"  style="width: 100%; margin: 10px 0 10px 0; background:#2f2f2f; font-weight: bold;" >Pedir Ahora</a></div>
	        </div>--}}
		</div>
		</div>
		<!-- /grid_item -->
	</div>
	@endforeach


	@else
	<div class="col-12 col-md-12 text-center" >
		<img src="/template_15/img/no_result.png" style="padding: 20px; width: 120px;">
		<h1 style="font-weight: bold; color: var(--main-bg-color-primario);">NING??N RESULTADO</h1>
		<h5>Su b??squeda de "Productos" no tuvo resultados.</h5>

		<img src="">
	</div>
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

<script type="text/javascript">
	
		var _quantity_ = 1;


			$(".buy_now").click(function(e){
				
				e.preventDefault();
    			let _that = $(this);
				//let _productId = _that[0].dataset.index;
				_quantity_ = $(this).parent().prev().find('input').val();
				//alert(_quantity_);
				let _productId = $(this)[0].dataset.index;

				axios.get(`/api/template_15/product/${_productId}/is-there-stock?stock=1`)
					.then((response) => {
		            	localStorage.removeItem(`cart`);
						let _cart = {};
						
			      		_cart[_productId] = _quantity_;
						localStorage.setItem(`cart`, JSON.stringify(_cart));
						window.location.replace(`/checkout/info`);
					})
					.catch((err) => {
						$.growl.warning({
							title: err.response.data.title,
							message: err.response.data.message
						});
					});
  });

</script>
