
@extends('template_7.layouts.index')
@section('content')
<!-- Content -->
<div class="top_panel">
	    <div class="container header_panel">
	        <a href="product-detail-2.html#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
	        <label>1 product added to cart</label>
	    </div>
	    <!-- /header_panel -->
	    <div class="item">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-7">
	                    <div class="item_panel">
	                        <figure>
	                            <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/1.jpg" class="lazy" alt="">
	                        </figure>
	                        <h4>1x Armor Air X Fear</h4>
	                        <div class="price_panel"><span class="new_price">$148.00</span><span class="percentage">-20%</span> <span class="old_price">$160.00</span></div>
	                    </div>
	                </div>
	                <div class="col-md-5 btn_panel">
	                    <a href="cart.html" class="btn_1 outline">View cart</a> <a href="checkout.html" class="btn_1">Checkout</a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /item -->
	    <div class="container related">
	        <h4>Who bought this product also bought</h4>
	        <div class="row">
	            <div class="col-md-4">
	                <div class="item_panel">
	                    <a href="product-detail-2.html#0">
	                        <figure>
	                            <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/2.jpg" alt="" class="lazy">
	                        </figure>
	                    </a>
	                    <a href="product-detail-2.html#0">
	                        <h5>Armor Okwahn II</h5>
	                    </a>
	                    <div class="price_panel"><span class="new_price">$90.00</span></div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="item_panel">
	                    <a href="product-detail-2.html#0">
	                        <figure>
	                            <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/3.jpg" alt="" class="lazy">
	                        </figure>
	                    </a>
	                    <a href="product-detail-2.html#0">
	                        <h5>Armor Air Wildwood ACG</h5>
	                    </a>
	                    <div class="price_panel"><span class="new_price">$75.00</span><span class="percentage">-20%</span> <span class="old_price">$155.00</span></div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="item_panel">
	                    <a href="product-detail-2.html#0">
	                        <figure>
	                            <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/4.jpg" alt="" class="lazy">
	                        </figure>
	                    </a>
	                    <a href="product-detail-2.html#0">
	                        <h5>Armor ACG React Terra</h5>
	                    </a>
	                    <div class="price_panel"><span class="new_price">$110.00</span></div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /related -->
</div>
<!-- /add_cart_panel -->

<main>
	@php
		$discount = 0;
		if($product['price'] != 0){
			$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
		}
		
	@endphp
	    <div class="container margin_30">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h3 id="product_name">{{ $product['name'] }}</h3>
	        		<input type="hidden" id="main_product_id" value="{{ $product['main_product_id'] }}">
	        		<input type="hidden" id="product_id" value="{{ $product['id'] }}">
	        		<input type="hidden" id="color_id" value="{{ $product_presentation['color_id'] }}">

	        		<hr style="margin: 3px 0 5px 0;">
	        	</div>
							<!-- Galeria ///////////////////////////////// -->
			            <div class="col-md-5">

	                <div class="all">
											<!-- nombre -->
											{{--<h3 class="md_none">{{ $product['name'] }}</h3>--}}
	                    <div class="slider">
	                        <div class="owl-carousel owl-theme main">
	                        	@if(count($main_photo))
								<div style="background-image: url({{ $main_photo->resource }});" class="item-box"></div>
								@endif

								@foreach ($other_photos as $image)
								<div style="background-image: url({{ $image['resource'] }});" class="item-box"></div>
								@endforeach
	                        </div>
	                        <div class="left nonl"><i class="ti-angle-left"></i></div>
	                        <div class="right"><i class="ti-angle-right"></i></div>
	                    </div>
	                    <div class="slider-two">
	                        <div class="owl-carousel owl-theme thumbs">
	                        	@if(count($main_photo))
									<div style="background-image: url({{ $main_photo->resource_thumb }});" class="item active"></div>
									@foreach ($other_photos as $key => $image)
										<div style="background-image: url({{ $image['resource_thumb'] }});" class="item"></div>
									@endforeach
								@else
									@foreach ($other_photos as $key => $image)
										@if ($key == 0)
											<div style="background-image: url({{ $image['resource_thumb'] }});" class="item active"></div>
										@else
											<div style="background-image: url({{ $image['resource_thumb'] }});" class="item"></div>
										@endif
									@endforeach
								@endif
	                        </div>
	                        <div class="left-t nonl-t"></div>
	                        <div class="right-t"></div>
	                    </div>
	                </div>
	            </div>
							<!-- Descripcion ///////////////////////////////// -->
	            <div class="col-md-4 sm_none">
	                <div class="prod_info">
											{{--<h1>{{ $product['name'] }}</h1>--}}
											<h1>Descripción</h1>
	                    <p>{!! $product['description'] !!}</p>
	                    <div class="prod_options">
	                    </div>
	                </div>
									<div>Tipo de producto: <span>
										@if($product['type_id'] == 2)
										Régimen General
										@else
										Zofra tacna
										@endif

								</span></div>
	            </div>
							<!-- Precio ///////////////////////////////// -->
	            <div class="col-md-3">


	                <div class="prod_info prod_options">

	                	@if(count($sizes))
	            	 	<div class="row">
	            	 		<h6 class="col-12">Color</h6>
	                            <div class="col-12 colors">
	                                <ul id="attribute-colors">
	                                	@foreach($colors as $key => $color)
	                                	<li><a href="/catalogo/{{ $color['color_presentation']['product']['slug'] }}" data-index="{{ $color['id'] }}" class="color color_{{ $color['id'] }}" style="background: {{ $color['description']  }}"></a></li>
	                                	@endforeach
	                                    {{--
	                                    <li><a href="#0" class="color color_2"></a></li>
	                                    <li><a href="#0" class="color color_3"></a></li>
	                                    <li><a href="#0" class="color color_4"></a></li>
	                                    --}}
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<h6 class="col-12">Talla</h6>
	                            <div class="col-12">
	                                <div class="custom-select-form">
	                                    <select class="wide" id="attribute-sizes" style="display: none;">
	                                    	@foreach($sizes as $size)
	                                        	<option value="{{ $size['size_id'] }}">{{ $size['size']['name'] }}</option>
	                                    	@endforeach
	                                    	{{--
	                                        <option value="">M</option>
	                                        <option value=" ">L</option>
	                                        <option value=" ">XL</option>
	                                        --}}
	                                    </select>
	                                </div>
	                            </div>
	                        </div>
	                        @endif
	                        <div class="row">
	            				<h6 class="col-12">Marca: {{$brand}}</h6>
								@if($product['promotion_available'])
						        <div class="countdown_inner">-{{ $discount }}% Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
								@endif
							</div>
	                    <div class="row">

	                    	<!--div class="col-md-12 select_input">
                                <label for="review">Precio por Sucursal</label>
                                <select class="form-control" size="1">
                                    <option value="India">Tacna</option>
                                    <option value="UAE">Ilo</option>
                                </select>
                            </div-->

	                    	<div class="col-lg-12 col-md-12" id="price-area">
                    			@php
							 		$price = $product['price'];
							 	@endphp
								@if($product['promotion_available'])
								 	@php
								 		$price = $product['price_promotion'];
								 	@endphp
									<div class="price_main">
										<span class="new_price">S/{{ $product['price_promotion'] }}</span>
										<span class="percentage">{{ $discount }}% DSCTO.</span> <br>
										<span class="old_price">S/{{ $product['price'] }}</span>
									</div>
									<br>
									<br>
								@else
									<div class="price_main"><span class="new_price">S/{{ $product['price'] }}</span><br><br>
									</div>
								@endif
	                        </div>
	                    </div>
	                    <div class="row">

	                        <div class="col-lg-6 col-md-6">
	                        	<label class=""><strong>Cantidad</strong></label>
	                        	  <input type="hidden" name="" value="{{ $price }}" id="product_price">

	                        	  <div class="numbers-row">
										<input type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" id="quantity_1" class="qty2" name="quantity_1">
	                                </div>
	                        </div>


	                        <div class="col-lg-6 col-md-6">
	                        	<label class=""><strong>Total</strong></label>
										<div class="price_main"><span class="new_price" id="product_total">S/{{ number_format($price*$product['minimum_quantity'], 2, ".", "") }}</span><br><br></div>

	                        </div>
	                        <div class="col-lg-12" id="available-stock-area">
	                        	@if($product['stock'] == 0)
	                        	<span>Stock No disponible</span>
	                        	@endif
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a href="#" data-index="{{ $product['id'] }}" class="btn_1 {{ $product['stock'] == 0 ? 'disabled' : '' }}" id="add_item_to_cart_with_number" style="width: 100%; margin: 10px 0 10px 0;">Agregar Carrito</a></div>
	                        </div>

	                        <div class="col-lg-12 col-md-12">

							<div class="btn_add_to_cartx">


								


								<a data-index="{{ $product['id'] }}" class="btn_1 {{ $product['stock'] == 0 ? 'disabled' : '' }}" id="buy_now" style="width: 100%; margin: 10px 0 10px 0;">Comprar Ahora</a>
					


							</div>
	                        </div>
	                        @if( $product['pdf'])
	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a  href="{{ $product['pdf'] }}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; background: #fdf010; color: black">Descargar Ficha Técnica</a></div>
	                        </div>
	                        @endif

	                    </div>
	                </div>
	                <!-- /prod_info -->
	                <div>
	                	<h5>Comparte con tus amigos:</h5>
	                </div>
	                <div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank"><img src="/template_7/img/whatsapp.png" class="button_select" width="56px" style="padding: 1px; background: white;"><span>Whatsapp</span></a>
	                        </li>
	                        <li>
	                            <a href="tel:{{ $company_main->cel }}" ><img src="/template_7/img/contacto.jpg" class="button_select" width="40px" style="padding: 1px; background: white; padding-top: 9px;"><span style="padding-top: 9px;">Contactar</span></a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /product_actions -->
									<!--  -->
									<div class="prod_info md_none">
											<p><small>--</small><br>{!! $product['description'] !!}</p>
	                </div>
	            </div>

	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->

	    <div class="tabs_product bg_white version_2">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Detalles del Producto</a>
	                </li>
	                <!--li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Reviews</a>
	                </li-->
	            </ul>
	        </div>
	    </div>
	    <!-- /tabs_product -->
	    <div class="tab_content_wrapper">
	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
	                    <div class="card-header" role="tab" id="heading-A">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
	                                Características
	                            </a>
	                        </h5>
	                    </div>

	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    {!! $product['specifications'] !!}
	                                </div>
	                                <div class="col-lg-5">
	                                    <h3>Especificaciones</h3>
	                                    {!! $product['features'] !!}
	                                    <!-- /table-responsive -->
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- /TAB A -->
	                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
	                    <div class="card-header" role="tab" id="heading-B"  style="display: none;">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
	                                Reviews
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
	                                            <em>Published 54 minutes ago</em>
	                                        </div>
	                                        <h4>"Commpletely satisfied"</h4>
	                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
	                                            <em>Published 1 day ago</em>
	                                        </div>
	                                        <h4>"Always the best"</h4>
	                                        <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /row -->
	                            <div class="row justify-content-between">
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
	                                            <em>Published 3 days ago</em>
	                                        </div>
	                                        <h4>"Outstanding"</h4>
	                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
	                                            <em>Published 4 days ago</em>
	                                        </div>
	                                        <h4>"Excellent"</h4>
	                                        <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /row -->
	                            <p class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
	                        </div>
	                        <!-- /card-body -->
	                    </div>

	                </div>
	                <!-- /tab B -->
	            </div>
	            <!-- /tab-content -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /tab_content_wrapper -->

	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Productos Relacionados</h2>
	            <!-- <span>Products</span>
	            <p>También tienes otra variedad de productos para escoger</p> -->
	        </div>
	        <div class="owl-carousel owl-theme products_carousel">
				@foreach ($related_products as $related_product)
					@php
						$image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

						if(count($related_product['other_photo'])){
							$image = $related_product['other_photo']['resource'];
						}

						if(count($related_product['main_photo'])){
							$image = $related_product['main_photo']['resource'];
						}
					@endphp
	            <div class="item">
	                <div class="grid_item">
	                    <span class="ribbon new">Nuevo</span>
											<figure>
												<center>
												<a href="/catalogo/{{ $related_product['product_child']['slug'] }}">
												<img class="owl-lazy" src="" data-src="{{ $image }}" alt="" style="max-height: 180px; width: auto;">
												</a>
												</center>
												@if($related_product['promotion_available'])
										        <div class="countdown_inner" style="padding-top: 20px;"><div data-countdown="{{ \Carbon\Carbon::parse($related_product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
												</div>
												@endif
											</figure>
											@if($related_product['promotion_available'])
											<div class="brand_ribbon"><img src="{{ $related_product['promotion_label_image'] }}"></div>
											@endif
											<a href="/catalogo/{{ $related_product['product_child']['slug'] }}">
												<div class="font-weight-bold text-center" style="font-size: 18px; color: #2b2b2b;">{{ $related_product['name'] }}</div>
											</a>

											<div style="display: flex;
										    flex-direction: column;
										    justify-content: space-between;
										    height: 135px;">

						    				@if($product['stock'] <= 0)
												<span>Stock No Disponible</span>
											@endif

											<div class="price_box text-center my-3">
												@if($related_product['promotion_available'])
													<span class="old_price">S/{{ $related_product['price'] }}</span><br>
													<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 24px;">S/{{ $related_product['price_promotion'] }}</span><br>
													<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $related_product['promotion_discount'] }}</span>
												@else
													<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 24px;">S/{{ $related_product['price'] }}</span>
												@endif
											</div>
											<div class="">
												<a href="javascript:void(0);" class="btn_1 add_to_cart {{ $related_product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $related_product['id'] }}">Agregar al Carrito</a>
											</div>
										</div>
	                </div>
	                <!-- /grid_item -->
				</div>
				@endforeach

				{{--
				<!-- /item -->
	            <div class="item">
	                <div class="grid_item">
	                    <span class="ribbon new">New</span>
	                    <figure>
	                        <a href="product-detail-1.html">
	                            <img class="owl-lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/5.jpg" alt="">
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
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
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
	                            <img class="owl-lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/8.jpg" alt="">
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
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
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
	                            <img class="owl-lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/2.jpg" alt="">
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
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
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
	                            <img class="owl-lazy" src="/template_7/img/products/product_placeholder_square_medium.jpg" data-src="/template_7/img/products/shoes/3.jpg" alt="">
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
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
	                        <li><a href="product-detail-2.html#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
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

	    <div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Garantía</h3>
								<p>Te brindamos calidad</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Compra Segura</h3>
								<p>En todos sus métodos de pago</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>Soporte 24/7</h3>
								<p>Atendemos vía Online</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->

	</main>
	<!-- /main -->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_7/css/product_page.css" rel="stylesheet">

@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
    <script  src="/template_7/js/carousel_with_thumbs.js"></script>
    <script  src="/template_7/js/add_cart_with_number.js"></script>
	<script>

	    $(document).on('keyup', '#quantity_1', function(){
	        let _that = $(this);
	        let _inputNumber = $(this), _max = _that[0].dataset.max, _min = _that[0].dataset.min, _value_to_set;

	        _value_to_set = _inputNumber.val();

	        if (isNaN(_value_to_set)) {
	        	_value_to_set = _min;
	        } else {
		        if (_inputNumber.val() > parseInt(_max)) {
		            _value_to_set = _max;
		        }
		        if (_inputNumber.val() < parseInt(_min)) {
		           _value_to_set = _min;
		        }
	        }

	        myEfficientFnQuantity(_value_to_set,_inputNumber);
	    });

	    var myEfficientFnQuantity = debounce(function(_value_to_set, _inputNumber) {
	        _inputNumber.val(_value_to_set);
	        calculate_total_product();
	    }, 500);

		$(document).on('click', '.inc', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt($(`#quantity_1`).val());
			let _max = parseInt(_that.prev()[0].dataset.max);

			if (!(_oldQuantity <= _max)) {
				_oldQuantity = _max;
			}
			myEfficientFnQuantity(_oldQuantity, $(`#quantity_1`));

		});

		$(document).on('click', '.dec', function(e){
			e.preventDefault();
			let _that = $(this);
			let _oldQuantity = parseInt($(`#quantity_1`).val());
			let _min = parseInt(_that.prev().prev()[0].dataset.min);

			if (!(_oldQuantity >= _min)) {
				_oldQuantity = _min;
			}
			myEfficientFnQuantity(_oldQuantity, $(`#quantity_1`));

		});


		document.querySelector(`#buy_now`)
			.addEventListener('click', function(e){
				e.preventDefault();

				let _productId = $(this)[0].dataset.index;

				axios.get(`/api/template_7/product/${_productId}/is-there-stock?stock=1`)
					.then((response) => {
		            	localStorage.removeItem(`cart`);
						let _cart = {};
			      		_cart[_productId] = 1;
						localStorage.setItem(`cart`, JSON.stringify(_cart));
						//window.location.replace(`/checkout/info`);
						window.location.replace(`/checkout`);
					})
					.catch((err) => {
						$.growl.warning({
							title: err.response.data.title,
							message: err.response.data.message
						});
					});


			});

		function calculate_total_product(){
			//console.log(parseInt($(`#quantity_1`).val()), parseFloat($(`#product_price`).val()));

			$(`#product_total`).html(`S/${(parseInt($(`#quantity_1`).val())*parseFloat($(`#product_price`).val())).toFixed(2)}`);
		}

		get_presentation_price();

		$(`#attribute-sizes`).on('change', function(e){
			get_presentation_price();
		})

		function get_presentation_price(){
			axios.get(`/api/template_7/presentation-price?main_product_id=${$(`#main_product_id`).val()}&color_id=${$(`#color_id`).val()}&size_id=${$(`#attribute-sizes`).val()}`)
				.then((response) => {
					let _price, _discount;
					document.querySelector(`#price-area`).innerHTML = ``;

					if (response.data.promotion_available) {
						_price = response.data.price_promotion;
						_discount = parseInt(((response.data.price - response.data.price_promotion)*100)/response.data.price);

						document.querySelector(`#price-area`).innerHTML = `								<div class="price_main">
										<span class="new_price">S/${response.data.price_promotion}</span>
										<span class="percentage">${_discount.toFixed(2)}% DSCTO.</span> <br>
										<span class="old_price">S/${response.data.price}</span>
									</div>
									<br>
									<br>`
					} else {
						_price = response.data.price;

						document.querySelector(`#price-area`).innerHTML = `							<div class="price_main">
									<span class="new_price">S/${response.data.price}</span>
									<br>
									<br>
								</div>`
					}
					document.querySelector(`#product_price`).value = _price;
					document.querySelector(`#quantity_1`).value = (response.data.stock) ? 1 : 0;
					$(`#quantity_1`).attr('data-max', response.data.stock);
					$(`#add_item_to_cart_with_number`).attr('data-index', response.data.id);
					getElement(`#product_name`).innerHTML = response.data.name;
					calculate_total_product();

					getElement(`#available-stock-area`).innerHTML = ``;
					$(`#add_item_to_cart_with_number`).removeClass(`disabled`);
					$(`#buy_now`).removeClass(`disabled`);

					if (response.data.stock == 0) {
						getElement(`#available-stock-area`).innerHTML = `<span>Stock No disponible</span>`;
						$(`#add_item_to_cart_with_number`).addClass(`disabled`);
						$(`#buy_now`).addClass(`disabled`);

					}


				});
		}



	</script>


@stop
