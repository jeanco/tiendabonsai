
@extends('template_11.layouts.index')
@section('content')
<!-- Content -->
<div class="top_panel">
		<input type="hidden" name="" value="{{ $symbol_ }}" id="currency_symbol">
		<input type="hidden" name="" value="{{ $decimal_ }}" id="currency_decimal">
		<input type="hidden" name="" value="{{ $rate }}" id="exchange_rate">

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

		if($product['price'] != 0) {
			$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
		}

		$disabled = "";
		if($product['stock'] < $product['minimum_quantity']){
			$disabled = "disabled";
		}
	@endphp
	    <div class="container margin_30">
			@if($product['promotion_available'])
	        {{--<div class="countdown_inner">-{{ $discount }}% Esta oferta termina en <div data-countdown="2020/03/15" class="countdown"></div>
			</div>--}}
			@endif
	        <div class="row">
	            <div class="col-md-5">
								<div class="mb-2 breadcrumbs">
										<ul>
												<li><a href="/">Inicio</a></li>
												<li><a href="/catalogo">Catálogo</a></li>
												<li><a href="/catalogo?categoria={{ $item[0]->category_slug }}&subcategoria=">{{ $item[0]->category_name }}</a></li>
												<li><a href="/catalogo?categoria={{ $item[0]->category_slug }}&subcategoria={{ $item[0]->subcategory_slug }}">{{ $item[0]->subcategory_name }}</a></li>
										</ul>
								</div>
	                <div class="all">
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
	            <div class="col-md-4">
	                <div class="prod_info">
   		        			<input type="hidden" id="main_product_id" value="{{ $product['main_product_id'] }}">

	                	<input type="hidden" name="" id="product_id" value="{{ $product['id'] }}">
	                	<input type="hidden" id="color_id" value="{{ $product_presentation['color_id'] }}">

										<h1 style="font-weight: 700;" id="product_name">{{ $product['name'] }}</h1>
	                    <!--span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span-->
	                    <p>{!! $product['description'] !!}</p>
	                    <div class="prod_options">
	                    </div>

	                </div>

	            </div>
	            <div class="col-md-3">
	                <div class="prod_info">

										<div class="col-md-12 select_input" style="display: none;">
												<label for="review">Precio por Sucursal</label>
												<form action="/api/template_11/set-place-no-ajax", method="POST" id="place_form_">
															{{ csrf_field() }}
															<select class="form-control" size="1" name="place_id" id="place_select_">
																	@foreach($places as $key => $place)
																			@if($place['id'] == $place_id_selected)
																			<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>
																			@else
																			<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
																			@endif
																	@endforeach
															</select>
												</form>
												<div style="font-size: 11px;background: #d3fed3;   padding: 5px; margin-top: 5px;">
													<span style="font-weight: bold;" >Nota: </span>Puede seleccionar la sucursal que esta más cerca a su ubicación para visualizar el precio sugerido.
												</div>
										</div>

										@if(count($sizes))

											<div class="mb-2">
												<h6 class="font-weight-bold">Color</h6>
												<div class="btn-group-toggle" data-toggle="buttons">
													@foreach($colors as $key => $color)
														<a href="/catalogo/{{ $color['color_presentation']['product']['slug'] }}" data-index="{{ $color['id'] }}" class="p-2 mr-1 btn btn_color" style="background: {{ $color['description']  }}">
															<input type="radio" name="options" id="option1">
														</a>
													@endforeach
													{{--
													<a href="#" class="p-2 btn btn_color active">
														<input type="radio" name="options" id="option1" checked>
													</a>
													<a href="#" class="p-2 btn btn_color">
														<input type="radio" name="options" id="option2">
													</a>
													<a href="#" class="p-2 btn btn_color">
														<input type="radio" name="options" id="option3">
													</a>
													--}}
												</div>
											</div>

											{{--
											<div class="mb-2">
												<h6>Color</h6>
												<div class="colors">
														<ul id="attribute-colors">
															@foreach($colors as $key => $color)
															<li><a href="/catalogo/{{ $color['color_presentation']['product']['slug'] }}" data-index="{{ $color['id'] }}" class="color color_{{ $color['id'] }}" style="background: {{ $color['description']  }}"></a></li>
															@endforeach
																<li><a href="#0" class="color color_2"></a></li>
																<li><a href="#0" class="color color_3"></a></li>
																<li><a href="#0" class="color color_4"></a></li>
														</ul>
												</div>
											</div>
											--}}
											<div class="mb-2">
												<h6 class="mb-0">Talla</h6>
												<select class="form-control py-1" id="attribute-sizes" style="width: auto; height: auto;">
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

										@endif

										<div class="mb-2">
											<h6 class="mb-0">Marca: {{$brand}}</h6>
										</div>

	                    <div class="row">

	                    	<div class="col-lg-4 col-md-4" id="price-area">
								<!-- <label class="font-weight-bold">Precio:</label> -->

								@php
                					$price = $product['price'];
                				@endphp

                				@if(!$product['has_hidden_price'])
									@if($product['promotion_available'])
			                    		@php
			                    			$price = $product['price_promotion'];
			                    		@endphp
										<div class="price_main">
											<span class="new_price" style="font-weight: 700;">{{ $symbol_ }}{{ number_format($product['price_promotion']*$rate, $decimal_, '.', '') }}</span> <br>
											<span class="percentage">{{ $discount }} % DSCTO.</span> <br>
											<span class="old_price">{{ $symbol_ }}{{ number_format($product['price']*$rate, $decimal_, '.', '') }}</span></div><br><br>
									@else
										@if($product['price'])
											<div class="price_main"><span class="new_price" style="font-weight: 700;">{{ $symbol_ }}{{ number_format($product['price']*$rate, $decimal_, '.', '') }}</span><br><br></div>

											@php
		                    					$price = $product['price'];
		                    				@endphp
										@else
											{{--
											<div class="price_main"><span class="new_price">{{ $symbol_ }}{{ $product['price'] }}</span><br><br></div>
											--}}
										@endif
									@endif
								@else
									<span>{{$product['message_about_price']}}</span>
								@endif
	                        </div>

	             				<div class="col-lg-8 col-md-8">
		                        	<div class="price_main" id="available-stock-area">
				                        @if($product['stock'] < $product['minimum_quantity'])
		                        			<span style="font-weight: bold;">Stock No Disponible </span>
		                        		@endif
		                        	</div>
		                        </div>

	                    </div>
	                    <div class="row">

	                        <div class="col-lg-6 col-md-6">
	                        	<label class=""><strong>Cantidad</strong></label>
	                        	  <input type="hidden" name="" value="{{ $price*$rate }}" id="product_price">
	                        	  <div class="numbers-row product_profile">
										<input style="    left: 15% !important;" type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $product['stock'] }}" value="{{ $product['minimum_quantity'] }}" id="quantity_1" class="qty2" name="quantity_1">
	                                </div>
	                        </div>

	                        @if(!$product['has_hidden_price'])
		                        @if($product['unit_price'])
		                        <div class="col-lg-6 col-md-6">
		                        	<label class=""><strong>Total</strong></label>
											<div class="price_main"><span class="new_price" id="product_total" style="font-weight: 700;">{{ $symbol_ }}{{ $price*$product['minimum_quantity']*$rate }}</span><br><br></div>

		                        </div>
		                        @endif
		                    @endif
	                        <div class="col-md-12">
	                        	<span>Compra mínima {{ $product['minimum_quantity'] }} Unidades</span>

	                        </div>

	                    </div>
	                    <div class="row">
	                    	<input type="hidden" name="" id="product_minimum-quantity" value="{{ $product['minimum_quantity'] }}">
	                        <div class="col-lg-12 col-md-12">
														<div class="btn_add_to_cartx">
															<a href="#" data-index="{{ $product['id'] }}" class="btn btn_cars {{ $disabled }}" id="add_item_to_cart_with_number" style="width: 100%; margin: 10px 0 10px 0;">LO LLEVO</a>
														</div>
	                        </div>

	                        {{--<div class="col-lg-12 col-md-12">
															<div class="btn_add_to_cartx"><a data-index="{{ $product['id'] }}" class="btn_1 {{ $disabled }}" id="buy_now" style="width: 100%; margin: 10px 0 10px 0;">Comprar Ahora</a></div>
	                        </div>--}}

	                        <div class="col-lg-12 col-md-12" style="display: none;">
															<div class=""><a   href="/checkout" class="btn_1 {{ $disabled }}"  style="width: 100%; margin: 10px 0 10px 0;">Pagar Ahora</a></div>
	                        </div>

	                        @if($product['pdf'])
	                        <div class="col-lg-12 col-md-12">
															<div class="btn_add_to_cartx"><a  href="{{ $product['pdf'] }}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; background: #fdf010; color: black">Descargar Ficha Técnica</a></div>
	                        </div>
	                        @endif

													<div class="col-md-12 product_actions">
					                    <ul>
					                        <li>
					                            <a href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank"><img src="/template_11/img/whatsapp.png" class="button_select" width="40px" style=" background: white;"><span>Whatsapp</span></a>
					                        </li>
					                        <li>
					                            <a href="tel:{{ $company_main->cel }}" ><img src="/template_11/img/llamar.png" class="button_select" width="40px" style=" background: white; "><span style="padding-top: 9px;">Contactar</span></a>
					                        </li>
					                    </ul>
					                </div>

	                        <div class="col-lg-12 col-md-12 text-center pt-2">
														<a  href="/catalogo" style="text-decoration: underline;" id="pivot">Ir al Catálogo</a>
														<div class="tooltip" id="tooltip">
																<div class="thumb">
																	<img src="/template_11/img/paso_checkout_catalogo.png" alt="">
																</div>
																<div class="info">
																	<h4 class="titulo">Agregar e ir al Catálogo</h4>
																	<p class="resumen">Puede Agregar a su Carrrito la cantidad seleccionada y luego puede continuar eligiendo otro producto desde nuestro Catálogo.</p>
																	<!--p class="resumen">
																		La Torre Eiffel es el monumento más famoso de Paris y símbolo de la capital francesa.<br />
																	</p>
																	<div class="contenedor-btn">
																		<button>Comprar Boletos</button>
																	</div-->
																</div>
														</div>
	                        </div>
													<div class="col-md-12 mt-3">
														<div class="row align-items-center mx-0">
															<label class="mb-0 font-weight-bold">Compartir:&nbsp;</label>
															<a href="http://facebook.com/sharer.php?u={{route('item-profile', $product['slug'] )}}" target="_blank" style="color: #3b5998;"><i class="fab fa-facebook fa-3x"></i></a>&nbsp;
															<a href="whatsapp://send?text=Visita {{route('item-profile', $product['slug'] )}}" target="_blank" style="color: #64b161;"><i class="fab fa-whatsapp-square fa-3x"></i></a>&nbsp;
														</div>
													</div>


	                    </div>
											<!-- /prod_info -->


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
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Características y detalles</a>
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
	                                Características y detalles
	                            </a>
	                        </h5>
	                    </div>

	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    <h3>Características</h3>
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
	                <!--div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
	                    <div class="card-header" role="tab" id="heading-B">
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

	                            <p class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
	                        </div>

	                    </div>

	                </div-->
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
	            <!--span>Products</span-->
	            <p>También tienes otra variedad de productos para escoger</p>
	        </div>
	        <div class="owl-carousel owl-theme products_carousel">
						@foreach ($related_products as $related_product)
							@php
								$image = ($related_product['photo']) ? $related_product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
								$disabled = "";
								if($product['stock'] < $product['minimum_quantity']){
									$disabled = "disabled";
								}
							@endphp

							<div class="p-2">

								<div class="fig_item text-center">
									<a href="/catalogo/{{ $related_product['slug'] }}"><img src="{{ $image }}" alt="" style="height: 250px;"></a>
									@if($related_product['promotion_available'])
										<span class="ribbon_ofert">Oferta</span>
									@else
										<!-- <span class="ribbon new">Nuevo</span> -->
									@endif
									@if($related_product['promotion_available'])
										<div class="brand_ribbon"><img src="{{ $related_product['promotion_label_image'] }}"></div>
									@endif
								</div>
								<div class="name_item_new mt-2">
									<div class="brand_item_new font-weight-bold" style="color: #c3c3c3; font-size: 12px;">{{ count($related_product['brands_perfil_product_template_11']) ? $related_product['brands_perfil_product_template_11'][0]['name'] : 'Otros' }}</div>
									<a href="/catalogo/{{ $related_product['slug'] }}" title="{{ $related_product['name'] }}"><div class="item_name" data-stock="{{ $related_product['stock'] }}">{{ $related_product['name'] }}</div></a>
								</div>
								<hr class="my-2">
								<div class="price_item_area">
									@if($related_product['stock'] > 0)

										@if(!$related_product['has_hidden_price'])
											@if($related_product['promotion_available'])
												<div class="old_item_price">{{ $symbol }}{{ number_format($related_product['price']*$rate, $decimal, '.', '') }}</div>
												<div class="actual_item_price">{{ $symbol }}{{ number_format($related_product['price_promotion']*$rate, $decimal, '.', '') }}</div>
												@if($related_product['promotion_discount_type'] == 1)
													<div class="detail_item_price">Ahorras {{ $related_product['promotion_discount'] }}%</div>
												@else
													<div class="detail_item_price">Ahorras {{ $symbol }}{{ number_format($related_product['promotion_discount']*$rate, $decimal, '.', '') }}</div>
												@endif
											@else
												<div class="actual_item_price">{{ ($related_product['price']) ? $symbol.number_format($related_product['price']*$rate, $decimal, '.', '') : '' }}</div>
											@endif
										@else
											<span>{{$related_product['message_about_price']}}</span>
										@endif
									@endif
									@if($related_product['stock'] <= 0)
										<div class="non_item_stock">Stock No Disponible</div>
									@endif

								</div>
								<div class="mb-2 input_item_cant">

										<div class="mb-0 min_item_buy">
											@if($related_product['minimum_quantity'] > 1)
												Compra mínima: {{ $related_product['minimum_quantity'] }} und.
											@endif
										</div>

										<div class="numbers-row" style="text-align: center !important;">
											<input type="text" data-min="{{ $related_product['minimum_quantity'] }}" data-max="{{ $related_product['stock'] }}" value="{{ $related_product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
											<div class="inc button_inc">+</div>
											<div class="dec button_inc">-</div>
										</div>
								</div>
								<div style="text-align: center;">
									<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $related_product['stock'] <= 0 || ($related_product['price'] == null)  ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $related_product['id'] }}">LO LLEVO</a>
								</div>
							</div>

<!-- ///////////////////////////////////////// -->
{{--
			            <div class="item p-2">
			                <div class="grid_item">
			                    <!-- <span class="ribbon new">Nuevo</span> -->
			                    <figure>
			                        <a href="/catalogo/{{ $related_product['slug'] }}">
																	<img class="owl-lazy" src="{{ $image }}" data-src="{{ $image }}" alt="">
			                        </a>
			                    </figure>
			                    <!--div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div-->
													<div class="text-left">
														<div class="font-weight-bold" style="color: #c3c3c3; font-size: 12px;">Marca</div>
				                    <a href="/catalogo/{{ $related_product['slug'] }}">
				                        <div class="item_name">{{ $related_product['name'] }}</div>
				                    </a>
													</div>
													<hr class="my-1">

			                    @if($related_product['stock'] > 0)
									@if(!$related_product['has_hidden_price'])
					                    <div class="price_box text-left">
																@if($related_product['promotion_available'])
																	<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ $symbol_ }}{{ number_format($related_product['price_promotion']*$rate, $decimal_, '.', '') }}</span><br>
																	<span class="old_price font-weight-bold" style="color: #d8203c;">{{ $symbol_ }}{{ number_format($related_product['price']*$rate, $decimal_, '.', '') }}</span>
																@else
																	<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">{{ $symbol_ }}{{ number_format($related_product['price']*$rate, $decimal_, '.', '') }}</span>
																@endif
					                    </div>
					                @else
										<span>{{$related_product['message_about_price']}}</span>
									@endif

											<div class="mb-2">
											<div class="numbers-row product_related" style="text-align: center !important;">
											<input type="text" data-min="{{ $related_product['minimum_quantity'] }}" data-max="{{ $related_product['stock'] }}" value="{{ $related_product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
							                </div>
											</div>
											<div style="text-align: center;">
											<a href="javascript:void(0);" class="btn btn-block btn_cars add_to_cart {{ $related_product['stock'] <= 0 ? 'disabled' : '' }}" title="Agregar al carrito" data-index="{{ $related_product['id'] }}">LO LLEVO</a>
															</div>

			                    @endif

			                   	@if($related_product['stock'] <= 0)
			                   		<br>
			                    	<span style="font-weight: bold;">Stock No Disponible </span>
			                    @endif

			                </div>
			                <!-- /grid_item -->
						</div>
--}}
<!-- ////////////////////////////////////////// -->

						@endforeach

	        </div>
	        <!-- /products_carousel -->
	    </div>
	    <!-- /container -->

	</main>
	<!-- /main -->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_11/css/product_page.css" rel="stylesheet">
    <link href="/template_11/css/tooltips.css" rel="stylesheet">

@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
    <script  src="/template_11/js/carousel_with_thumbs.js"></script>
    <script  src="/template_11/js/add_cart_with_number.js"></script>
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

	        myEfficientFnQuantity_(_value_to_set,_inputNumber);
	        //change_quantity(_that.next()[0].dataset.index, _inputNumber.val(), _that.next()[0].dataset.price, _that.parent().parent().next().children());
	    });

	    var myEfficientFnQuantity_ = debounce(function(_value_to_set, _inputNumber) {
	        // _inputNumber.val(_value_to_set);
	        // change_quantity(_inputNumber.next()[0].dataset.index, _inputNumber.val(), _inputNumber.next()[0].dataset.price, _inputNumber.parent().parent().next().children());
	        _inputNumber.val(_value_to_set);
	        calculate_total_product();
	    }, 500);

		$(document).on('click', '.product_profile .inc', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt($(`#quantity_1`).val());
			let _max = parseInt(_that.prev()[0].dataset.max);

			if (!(_oldQuantity <= _max)) {
				$(`#quantity_1`).val(_oldQuantity-1);
			}
			calculate_total_product();
		});

		$(document).on('click', '.product_profile .dec', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt($(`#quantity_1`).val());
			let _min = parseInt(_that.prev().prev()[0].dataset.min);

			if (!(_oldQuantity >= _min)) {
				$(`#quantity_1`).val(_oldQuantity+1);
			}
			calculate_total_product();

		});

		calculate_total_product();
		function calculate_total_product(){
			$(`#product_total`).html(`${getElement('#currency_symbol').value}${(parseInt($(`#quantity_1`).val())*parseFloat($(`#product_price`).val())).toFixed(getElement('#currency_decimal').value)}`);
		}

	    $(document).on('keyup', '.quantity_1', function(){
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
	    }, 500);

		$(document).on('click', '.product_related .inc', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt(_that.prev().val());
			let _max = parseInt(_that.prev()[0].dataset.max);

			if (!(_oldQuantity <= _max)) {
				_that.prev().val(_oldQuantity-1);
			}

		});

		$(document).on('click', '.product_related .dec', function(e){
			let _that = $(this);
			e.preventDefault();
			let _oldQuantity = parseInt(_that.prev().prev().val());
			let _min = parseInt(_that.prev().prev()[0].dataset.min);

			if (!(_oldQuantity >= _min)) {
				_that.prev().prev().val(_oldQuantity+1);
			}
		});

    $(`#place_select_`).on('change', function(){
        $(`#place_form_`).submit();
    });

		get_presentation_price();

		$(`#attribute-sizes`).on('change', function(e){
			get_presentation_price();
		})

		function get_presentation_price(){
			axios.get(`/api/template_12/presentation-price?main_product_id=${$(`#main_product_id`).val()}&color_id=${$(`#color_id`).val()}&size_id=${$(`#attribute-sizes`).val()}`)
				.then((response) => {
					let _price, _discount;
					document.querySelector(`#price-area`).innerHTML = ``;
					if (response.data.promotion_available) {
						_price = response.data.price_promotion;
						_discount = parseInt(((response.data.price - response.data.price_promotion)*100)/response.data.price);

						document.querySelector(`#price-area`).innerHTML = `								<div class="price_main">
										<span class="new_price">${getElement('#currency_symbol').value}${(response.data.price_promotion*getElement('#exchange_rate').value).toFixed(getElement('#currency_decimal').value)}</span>
										<span class="percentage">${_discount.toFixed(2)}% DSCTO.</span> <br>
										<span class="old_price">${getElement('#currency_symbol').value}${(response.data.price*getElement('#exchange_rate').value).toFixed(getElement('#currency_decimal').value)}</span>
									</div>
									<br>
									<br>`;


					} else {
						_price = response.data.price;

						document.querySelector(`#price-area`).innerHTML = `							<div class="price_main">
									<span class="new_price">${getElement('#currency_symbol').value}${(response.data.price*getElement('#exchange_rate').value).toFixed(getElement('#currency_decimal').value)}</span>
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
	<script src="/template_11/js/tooltips.js"></script>

@stop
