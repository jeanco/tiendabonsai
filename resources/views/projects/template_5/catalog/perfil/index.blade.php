
@extends('template_5.layouts.index')
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
		$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
		$disabled = "";
		$not_allowed = "";
		if($product['stock'] < $product['minimum_quantity']){
			$disabled = "disabled";
			$not_allowed = "cursor:not-allowed";
		}


	@endphp
	    <div class="container margin_30">
			@if($product['promotion_available'])
	        {{--<div class="countdown_inner">-{{ $discount }}% This offer ends in <div data-countdown="2020/03/15" class="countdown"></div>
			</div>--}}
			@endif
	        <div class="row">
	            <div class="col-md-5">
	                <div class="all">
	                    <div class="slider">
	                        <div class="owl-carousel owl-theme main">

								@foreach ($product->images as $image)
									<div style="background-image: url({{ $image['resource'] }});" class="item-box"></div>
								@endforeach
								{{--
	                            <div style="background-image: url(/template_5/img/products/shoes/1.jpg);" class="item-box"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/2.jpg);" class="item-box"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/3.jpg);" class="item-box"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/4.jpg);" class="item-box"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/5.jpg);" class="item-box"></div>
								<div style="background-image: url(/template_5/img/products/shoes/6.jpg);" class="item-box"></div>
								--}}
	                        </div>
	                        <div class="left nonl"><i class="ti-angle-left"></i></div>
	                        <div class="right"><i class="ti-angle-right"></i></div>
	                    </div>
	                    <div class="slider-two">
	                        <div class="owl-carousel owl-theme thumbs">
								@foreach ($product->images as $key => $image)
									@if ($key == 0)
										<div style="background-image: url({{ $image['resource'] }});" class="item active"></div>
									@else
										<div style="background-image: url({{ $image['resource'] }});" class="item"></div>
									@endif
								@endforeach
								{{--
	                            <div style="background-image: url(/template_5/img/products/shoes/1.jpg);" class="item active"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/2.jpg);" class="item"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/3.jpg);" class="item"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/4.jpg);" class="item"></div>
	                            <div style="background-image: url(/template_5/img/products/shoes/5.jpg);" class="item"></div>
								<div style="background-image: url(/template_5/img/products/shoes/6.jpg);" class="item"></div>
								--}}
	                        </div>
	                        <div class="left-t nonl-t"></div>
	                        <div class="right-t"></div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <!--div class="breadcrumbs">
	                    <ul>
	                        <li><a href="product-detail-2.html#">Home</a></li>
	                        <li><a href="product-detail-2.html#">Category</a></li>
	                        <li>Page active</li>
	                    </ul>
	                </div-->
	                <!-- /page_header -->
	                <div class="prod_info">
	                	<input type="hidden" name="" id="product_id" value="{{ $product['id'] }}">
						<h1>{{ $product['name'] }}</h1>
	                    <!--span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span-->
	                    <p>{!! $product['description'] !!}</p>
	                    <div class="prod_options">
	                        <!--div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
	                                <ul>
	                                    <li><a href="product-detail-2.html#0" class="color color_1 active"></a></li>
	                                    <li><a href="product-detail-2.html#0" class="color color_2"></a></li>
	                                    <li><a href="product-detail-2.html#0" class="color color_3"></a></li>
	                                    <li><a href="product-detail-2.html#0" class="color color_4"></a></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="product-detail-2.html#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <div class="custom-select-form">
	                                    <select class="wide">
	                                        <option value="" selected>Small (S)</option>
	                                        <option value="">M</option>
	                                        <option value=" ">L</option>
	                                        <option value=" ">XL</option>
	                                    </select>
	                                </div>
	                            </div>
	                        </div-->

	                    </div>

	                </div>

	            </div>
	            <div class="col-md-3">
	                <!--div class="breadcrumbs">
	                    <ul>
	                        <li><a href="product-detail-2.html#">Home</a></li>
	                        <li><a href="product-detail-2.html#">Category</a></li>
	                        <li>Page active</li>
	                    </ul>
	                </div-->
	                <!-- /page_header -->
	                <div class="prod_info">

	                    <div class="row">

	                    	<div class="col-md-12 select_input">
                                <label for="review">Precio por Sucursal</label>

                                <select class="form-control" size="1" name="place_id">
                                	@foreach($places as $key => $place)
             		                    @if($place['id'] == $place_selected)
											<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>
                                		@else
											<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
                                		@endif
                                	@endforeach
                                </select>
                                <div style="font-size: 11px;background: #d3fed3;   padding: 5px;
    margin-top: 5px;"><span style="font-weight: bold;" >Nota: </span>Puede seleccionar la sucursal que esta m??s cerca a su ubicaci??n para visualizar el precio sugerido.</div>
                                 
                            </div>

	                    	<div class="col-lg-12 col-md-12">

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
										<span class="old_price">S/{{ $product['price'] }}</span></div><br><br>
								@else
									@if($product['unit_price'])
										<div class="price_main"><span class="new_price">S/{{ $product['unit_price']['price'] }}</span><br><br></div>

										@php
	                    					$price = $product['unit_price']['price'];
	                    				@endphp
									@else
										<div class="price_main"><span class="new_price">S/{{ $product['price'] }}</span><br><br></div>
									@endif


								@endif
	                        </div>

	                        @if($disabled)
	             				<div class="col-lg-8 col-md-8">
		                        	<div class="price_main">
		                        	<span style="font-weight: bold;">Stock No Disponible </span>
		                        	</div>
		                        </div>
	                        @endif

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
										<div class="price_main"><span class="new_price" id="product_total">S/{{ $price*$product['minimum_quantity'] }}</span><br><br></div>

	                        </div>
	                        <div class="col-md-12">
	                        	<span>Compra m??nima {{ $product['minimum_quantity'] }} Unidades</span>

	                        </div>

	                    </div>
	                    <div class="row">
	                    	<input type="hidden" name="" id="product_minimum-quantity" value="{{ $product['minimum_quantity'] }}">
	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx" style="{{ $not_allowed}}"><a href="#" data-index="{{ $product['id'] }}" class="btn_1 {{ $disabled }}" id="add_item_to_cart_with_number" style="width: 100%; margin: 10px 0 10px 0;">Agregar al Carrito</a></div>
	                        </div>

	                        {{--<div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a data-index="{{ $product['id'] }}" class="btn_1 {{ $disabled }}" id="buy_now" style="width: 100%; margin: 10px 0 10px 0;">Comprar Ahora</a></div>
	                        </div>--}}

	                        <div class="col-lg-12 col-md-12">
							<div class="" style="{{ $not_allowed}}"><a   data-index="{{ $product['id'] }}" href="/checkout" class="btn_1 {{ $disabled}}"  style="width: 100%; margin: 10px 0 10px 0; background:#2f2f2f; font-weight: bold;" id="buy_now">Comprar Ahora</a></div>
	                        </div>



	                        @if($product['pdf'])
	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a  href="{{ $product['pdf'] }}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; background: #fdf010; color: black">Descargar Ficha T??cnica</a></div>
	                        </div>
	                        @endif
	                        

	                        <div class="col-lg-12 col-md-12 text-center" style="padding-top: 150px;">
							<a  href="/catalogo" style="text-decoration: underline;" id="pivot">Ir al Cat??logo</a>
							<div class="tooltip" id="tooltip">
									<div class="thumb">
										<img src="/template_5/img/paso_checkout_catalogo.png" alt="">
									</div>
									<div class="info">
										<h4 class="titulo">Agregar e ir al Cat??logo</h4>
										<p class="resumen">Puede Agregar a su Carrrito la cantidad seleccionada y luego puede continuar eligiendo otro producto desde nuestro Cat??logo.</p>
										<!--p class="resumen">
											La Torre Eiffel es el monumento m??s famoso de Paris y s??mbolo de la capital francesa.<br />
										</p>
										<div class="contenedor-btn">
											<button>Comprar Boletos</button>
										</div-->
									</div>
							</div>
	                        </div>

	                    </div>
	                </div>
	                <!-- /prod_info -->
	                <div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank"><img src="/template_5/img/whatsapp.png" class="button_select" width="40px" style=" background: white;"><span>Whatsapp</span></a>
	                        </li>
	                        <li>
	                            <a href="tel:{{ $company_main->cel }}" ><img src="/template_5/img/llamar.png" class="button_select" width="40px" style=" background: white; "><span style="padding-top: 9px;">Contactar</span></a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /product_actions -->
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
	                <li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Caracter??sticas</a>
	                </li>
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
	                                Detalles del Producto
	                            </a>
	                        </h5>
	                    </div>

	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-12">
	                                    {!! $product['specifications'] !!}
	                                </div>

	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
	                    <div class="card-header" role="tab" id="heading-B">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
	                                Caracter??sticas
	                            </a>
	                        </h5>
	                    </div>

	                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-12">
	                                   {!! $product['features'] !!}
	                                </div>

	                            </div>
	                        </div>
	                    </div>
	                </div>
	               \
	                <!-- /tab B -->
	            </div>
	            <!-- /tab-content -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /tab_content_wrapper -->

	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Tambi??n te puede interesar</h2>
	            <!-- <span>Products</span>
	            <p>Tambi??n tienes otra variedad de productos para escoger</p> -->
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

						$time=Carbon\Carbon::now()->format('Y/m/d');
								$item_time_promotion=Carbon\Carbon::parse($related_product['promotion_end_at'])->format('Y/m/d');
					@endphp
	            <div class="item">
	                <div class="grid_item">
	                    <span class="ribbon new">Nuevo</span>
											<figure>
												
												<a href="/catalogo/{{ $related_product['slug'] }}"><div style="background-image: url({{ $image }});  height: 180px;
															background-position: center; 
															background-size: contain;
															background-repeat: no-repeat;" class="item-box"></div></a>
												@if($time<$item_time_promotion)
													@if($related_product['promotion_available'] && $related_product['show_promotion_timer'])
											        <div class="countdown_inner" style="">Esta Oferta termina en <br><div data-countdown="{{ \Carbon\Carbon::parse($related_product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
													</div>
													@endif
												@endif
											</figure>
											@if($related_product['promotion_available'])
											<div class="brand_ribbon"><img src="{{ $related_product['promotion_label_image'] }}"></div>
											@endif
											<a href="/catalogo/{{ $related_product['slug'] }}">
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
	                            <img class="owl-lazy" src="/template_4/img/products/product_placeholder_square_medium.jpg" data-src="/template_4/img/products/shoes/5.jpg" alt="">
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
	                            <img class="owl-lazy" src="/template_4/img/products/product_placeholder_square_medium.jpg" data-src="/template_4/img/products/shoes/8.jpg" alt="">
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
	                            <img class="owl-lazy" src="/template_4/img/products/product_placeholder_square_medium.jpg" data-src="/template_4/img/products/shoes/2.jpg" alt="">
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
	                            <img class="owl-lazy" src="/template_4/img/products/product_placeholder_square_medium.jpg" data-src="/template_4/img/products/shoes/3.jpg" alt="">
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
								<h3>Garant??a</h3>
								<p>Garantizamos la calidad del producto</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Pago seguro</h3>
								<p>100% Seguro en l??nea</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>Soporte 24/7</h3>
								<p>Atendemos v??a Online</p>
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
    <link href="/template_5/css/product_page.css" rel="stylesheet">
    <link href="/template_5/css/tooltips.css" rel="stylesheet">

@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
    <script  src="/template_5/js/carousel_with_thumbs.js"></script>
    <script  src="/template_5/js/add_cart_with_number.js"></script>
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
	        //change_quantity(_that.next()[0].dataset.index, _inputNumber.val(), _that.next()[0].dataset.price, _that.parent().parent().next().children());
	    });

	    var myEfficientFnQuantity = debounce(function(_value_to_set, _inputNumber) {
	        // _inputNumber.val(_value_to_set);
	        // change_quantity(_inputNumber.next()[0].dataset.index, _inputNumber.val(), _inputNumber.next()[0].dataset.price, _inputNumber.parent().parent().next().children());
	        _inputNumber.val(_value_to_set);
	        calculate_total_product();
	    }, 500);

		$(document).on('click', '.inc', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt($(`#quantity_1`).val());
			let _max = parseInt(_that.prev()[0].dataset.max);

			if (!(_oldQuantity <= _max)) {
				$(`#quantity_1`).val(_oldQuantity-1);
			}

			calculate_total_product();

		});

		$(document).on('click', '.dec', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt($(`#quantity_1`).val());
			let _min = parseInt(_that.prev().prev()[0].dataset.min);

			if (!(_oldQuantity >= _min)) {
				$(`#quantity_1`).val(_oldQuantity+1);
			}
			calculate_total_product();

		});

			document.querySelector(`#buy_now`)
			.addEventListener('click', function(e){
				e.preventDefault();
    			let _that = $(this);
				let _productId = _that[0].dataset.index;

				axios.get(`/api/template_5/product/${_productId}/is-there-stock?stock=1`)
					.then((response) => {
		            	localStorage.removeItem(`cart`);
						let _cart = {};
			      		_cart[_productId] = 1;
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


		/*document.querySelector(`#buy_now`) //Luego hay que activarlo
			.addEventListener('click', function(e){
				e.preventDefault();
            	//localStorage.removeItem(`cart`);
				let _id = $(this)[0].dataset.index, _quantityToAdd = $(`#quantity_1`).val();

		        if (localStorage.getItem(`cart`) != null) {
		            _cartArray = JSON.parse(localStorage.getItem("cart"));
		            if (_cartArray[_id]) {
		              let _value = parseInt(_cartArray[_id])+parseInt(_quantityToAdd);
		              _cartArray[_id] = _value;
		            } else {
		              _cartArray[_id] = _quantityToAdd;
		            }

		            localStorage.setItem(`cart`, JSON.stringify(_cartArray));
		        } else {

		            let _cartArray = {};
		            _cartArray[_id] = _quantityToAdd;
		            localStorage.setItem(`cart`, JSON.stringify(_cartArray));
		         }

				//let _cart = {};
				//Object.assign(_cart, {productId: 1});
				//_cart[_productId] = _quantity;
				//_cart.push(productId);
				//localStorage.setItem(`cart`, JSON.stringify(_cart));
				//let _cart = [];
				//_cart.push(_productId);
				//localStorage.setItem(`cart`, _cart);
				window.location.replace(`/checkout`);
			});
		*/	
		calculate_total_product();
		function calculate_total_product(){
			$(`#product_total`).html(`S/${(parseInt($(`#quantity_1`).val())*parseFloat($(`#product_price`).val())).toFixed(2)}`);
		}

	    $(`select[name="place_id"]`).on('change', function(e){
	        axios.post(`/api/template_5/set-place`, {
	            'place_id': e.target.value,
	            'product_id': $(`#product_id`).val(),
	        })
	        .then((response) => {
	        	$(`#product_price`).val(response.data);
	        	$(`.new_price`).html(`S/${response.data.toFixed(2)}`);
	        	$(`#product_total`).html(`S/${(parseFloat(response.data)*parseFloat($(`#quantity_1`).val())).toFixed(2)}`);
	        });
	    });



	</script>
	<script src="/template_5/js/tooltips.js"></script>

@stop