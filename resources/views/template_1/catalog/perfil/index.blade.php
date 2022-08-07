
@extends('template_1.layouts.index')
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
		$time=Carbon\Carbon::now()->format('Y/m/d');
		$item_time_promotion=Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d');
		if($product['stock'] < $product['minimum_quantity']){
			$disabled = "disabled";
		}
	@endphp
	    <div class="container margin_30">
			@if($product['promotion_available'])
	        {{--<div class="countdown_inner">-{{ $discount }}% This offer ends in <div data-countdown="2020/03/15" class="countdown"></div>
			</div>--}}
			@endif
	        <div class="row">
	            <!-- Galeria ///////////////////////////////// -->
			            <div class="col-md-5">

			            		<div class="container d-flex justify-content-center">
								   <section id="default" class="padding-top0">
								      <div class="row text-center" >
								      		@if($time<$item_time_promotion)
						@if($product['promotion_available'] && $product['show_promotion_timer'])
						        <div class="countdown_inner movil_header"> Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
								@endif
						@endif

								      	<input type="hidden" id="product_id" value="{{ $product['id'] }}">
										<h3 class="md_none desktop_header" style="padding-top: 15px;">{{ $product['name'] }}</h3>

								         <div class="large-5 column">
								            <div class="xzoom-container">
								            	@if(count($product->main_photo))
								            	<div class="big-img">
								            		<img class="xzoom" id="xzoom-default" src="{{ $product->main_photo->resource }}" xoriginal="{{ $product->main_photo->resource }}"  width="100%" />
								            	</div>
								               
								               @else

								               @foreach ($product->other_photos as $key => $image)
								               @if ($key == 0)
								               <div class="big-img">
								               	<img class="xzoom" id="xzoom-default" src="{{ $image['resource'] }}" xoriginal="{{ $image['resource'] }}"  width="100%" />
								               </div>
																
															@else
															
															@endif
								               
								               @endforeach

								               @endif



								               

								               
								               <div class="xzoom-thumbs img-selection"> 
											{{--	@if(count($product->main_photo))
												<a href="{{ $product->main_photo->resource }}"><img class="xzoom-gallery" width="80" src="{{ $product->main_photo->resource }}" xpreview="{{ $product->main_photo->resource }}"></a>
												@endif	--}}



												@foreach ($product->images as $key => $image)
																@if ($key == 0)
																
																		<a href="{{ $image['resource'] }}" class="img-thumbnail selected"><img class="xzoom-gallery" width="80" src="{{ $image['resource'] }}" xpreview="{{ $image['resource'] }}"></a>
																
																@else
																
																		<a href="{{ $image['resource'] }}" class="img-thumbnail"><img class="xzoom-gallery" width="80" src="{{ $image['resource'] }}" xpreview="{{ $image['resource'] }}"></a>
																
																@endif
								               
								               	@endforeach
								               		 {{--<a href="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190720/gallery/original/02_o_car.jpg"><img class="xzoom-gallery" width="80" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190720/gallery/preview/02_o_car.jpg"></a>
								               		 <a href="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190718/gallery/original/03_r_car.jpg"><img class="xzoom-gallery" width="80" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190715/gallery/preview/03_r_car.jpg"></a>
								               		 <a href="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190717/gallery/original/04_g_car.jpg"><img class="xzoom-gallery" width="80" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190714/gallery/preview/04_g_car.jpg"></a> --}}
								              </div>

								         



								            </div>
								         </div>
								      </div>
								   </section>
								</div>


	            </div>
	            <div class="col-md-4">
	                <div class="prod_info">
	                	<input type="hidden" name="" id="product_id" value="{{ $product['id'] }}">
											<h1 style="font-weight: 700;">{{ $product['name'] }}</h1>
	                    <!--span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span-->
	                    <p>{!! $product['description'] !!}</p>
	                    <div class="prod_options">
	                    </div>

	                </div>

	            </div>
	            <div class="col-md-3">
	                <div class="prod_info">

	                    <div class="row">

	                    	<div class="col-md-12 select_input" style="display: none;">
                                <label for="review">Precio por Sucursal</label>

																<form action="/api/template_1/set-place-no-ajax", method="POST" id="place_form_">
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
                                <div style="font-size: 11px;background: #d3fed3;   padding: 5px;
    margin-top: 5px;"><span style="font-weight: bold;" >Nota: </span>Puede seleccionar la sucursal que esta más cerca a su ubicación para visualizar el precio sugerido.</div>

                            </div>

	                    	<div class="col-lg-4 col-md-4">
								<label class="font-weight-bold">Precio:</label>

								@if(!count($presentations))
									@php
	                					$price = $product['price'];
	                					$stock = $product['stock'];
	                					$product_id = $product['id'];
	                				@endphp

									@if($product['promotion_available'])
			                    		@php
			                    			$price = $product['price_promotion'];
			                    		@endphp
										<div class="price_main">
											<span class="new_price new_price_presentation" style="font-weight: 700;">S/{{ number_format($product['price_promotion'], 2, '.', '') }}</span>
											{{-- 
											<span class="percentage">{{ $discount }}% DSCTO.</span> <br>
											--}}
											<span class="old_price old_price_presentation">S/{{ number_format($product['price'], 2, '.', '') }}</span></div><br><br>
									@else
										@if($product['price'])
											<div class="price_main"><span class="new_price new_price_presentation" style="font-weight: 700;">S/{{ number_format($product['price'], 2, '.', '') }}</span><br><br></div>

											@php
		                    					$price = $product['price'];
		                    				@endphp
										@else
											{{--
											<div class="price_main"><span class="new_price">S/{{ $product['price'] }}</span><br><br></div>
											--}}
										@endif
									@endif

								@else 

									@php
	                					$price = $presentations[0]['product']['price'];
	                					$stock = $presentations[0]['product']['stock'];
	                					$product_id = $presentations[0]['product']['id'];
	                				@endphp

									@if($presentations[0]['product']['promotion_available'])
			                    		@php
			                    			$price = $presentations[0]['product']['price_promotion'];
			                    		@endphp
										<div class="price_main">
											<span class="new_price new_price_presentation" style="font-weight: 700;">S/{{ number_format($presentations[0]['product']['price_promotion'], 2, '.', '') }}</span>
											{{-- 
											<span class="percentage">{{ $discount }}% DSCTO.</span> <br>
											--}}
											<span class="old_price old_price_presentation">S/{{ number_format($presentations[0]['product']['price'], 2, '.', '') }}</span></div><br><br>
									@else
										@if($presentations[0]['product']['price'])
											<div class="price_main"><span class="new_price new_price_presentation" style="font-weight: 700;">S/{{ number_format($presentations[0]['product']['price'], 2, '.', '') }}</span><br><br></div>

											@php
		                    					$price = $presentations[0]['product']['price'];
		                    				@endphp
										@else
											{{--
											<div class="price_main"><span class="new_price">S/{{ $presentations[0]['product']['price'] }}</span><br><br></div>
											--}}
										@endif
									@endif

								@endif
	                        </div>

	                        @if($stock < $product['minimum_quantity'])
	             				<div class="col-lg-8 col-md-8">
		                        	<div class="price_main">
		                        	<span style="font-weight: bold;">Stock No Disponible </span>
		                        	</div>
		                        </div>
	                        @endif
	                    </div>
	                    {{--<div class="row">
	                        <div class="col-lg-6 col-md-6">
	                        	<label class=""><strong>Cantidad</strong></label>
	                        	  <input type="hidden" name="" value="{{ $price }}" id="product_price">
	                        	  <div class="numbers-row product_profile">
										<input style="    left: 15% !important;" type="text" data-min="{{ $product['minimum_quantity'] }}" data-max="{{ $stock }}" value="{{ $product['minimum_quantity'] }}" id="quantity_1" class="qty2" name="quantity_1">
	                                </div>
	                        </div>

	                        @if($product['unit_price'])
	                        <div class="col-lg-6 col-md-6">
	                        	<label class=""><strong>Total</strong></label>
										<div class="price_main"><span class="new_price" id="product_total" style="font-weight: 700;">S/{{ $price*$product['minimum_quantity'] }}</span><br><br></div>

	                        </div>
	                        @endif
	                        <div class="col-md-12">
	                        	<span>Compra mínima {{ $product['minimum_quantity'] }} Unidades</span>
	                        
	                        </div>
	                         <div class="col-md-12">
	                    
	                        	<div class="row">
	   
		

	                        		
	                        	</div>

	                        </div>

	                    </div>--}}


	                    <div class="row">
	                    	<input type="hidden" name="" id="product_minimum-quantity" value="{{ $product['minimum_quantity'] }}">
	                        <div class="col-lg-12 col-md-12">
														<a href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20{{ $product['name'] }}" style="background: #077a51;
    padding: 10px;
    color: white;" target="_blank" title="Pedir por whatsapp" data-index="{{ $product['id'] }}">CONTACTAR POR WHATSAPP</a>
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
					                            <a href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank"><img src="/template_1/img/whatsapp.png" class="button_select" width="40px" style=" background: white;"><span>Whatsapp</span></a>
					                        </li>
					                        <li>
					                            <a href="tel:{{ $company_main->cel }}" ><img src="/template_1/img/llamar.png" class="button_select" width="40px" style=" background: white; "><span style="padding-top: 9px;">Contactar</span></a>
					                        </li>
					                    </ul>
					                </div>

	                        <div class="col-lg-12 col-md-12 text-center pt-2">
														<a  href="/catalogo" style="text-decoration: underline;" id="pivot">Ir al Catálogo</a>
														
	                        </div>
													<!--div class="col-md-12 mt-3">
														<div class="row align-items-center mx-0">
															<label class="mb-0 font-weight-bold">Compartir:&nbsp;</label>
															<a href="#" style="color: #3b5998;"><i class="fab fa-facebook fa-3x"></i></a>&nbsp;
															<a href="#" style="color: #64b161;"><i class="fab fa-whatsapp-square fa-3x"></i></a>&nbsp;
														</div>
													</div-->


	                    </div>
											<!-- /prod_info -->


	                </div>

	                <!-- /product_actions -->
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->

	    {{--<div class="tabs_product bg_white version_2">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Características y detalles</a>
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
	    </div>--}}
	    <!-- /tab_content_wrapper -->

	    <div class="container margin_60_35">
	    	@if(count($related_products))
	        <div class="main_title">
	            <h2>Productos Relacionados</h2>
	            <!--span>Products</span-->
	            <p>También tienes otra variedad de productos para escoger</p>
	        </div>
	        @endif
	        <div class="owl-carousel owl-theme products_carousel">
						@foreach ($related_products as $related_product)
							@php
								$image = ($related_product['photo']) ? $related_product['photo']['resource']  : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
								$disabled = "";
								if($product['stock'] < $product['minimum_quantity']){
									$disabled = "disabled";
								}
							@endphp
			            <div class="item p-2">
			                <div class="grid_item" >
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
				                    <div class="price_box text-left" style="margin-bottom: 40px !important;">


				                    	@if(!count($related_product['product_child']))
											@if($related_product['promotion_available'])
												<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($related_product['price_promotion'], 2, '.', '') }}</span><br>
												<span class="old_price font-weight-bold" style="color: #d8203c;">S/{{ number_format($related_product['price'], 2, '.', '') }}</span>
											@else
												<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($related_product['price'], 2, '.', '') }}</span>
											@endif
										@else
											@if($related_product['product_child']['promotion_available'])
												<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($related_product['product_child']['price_promotion'], 2, '.', '') }}</span><br>
												<span class="old_price font-weight-bold" style="color: #d8203c;">S/{{ number_format($related_product['product_child']['price'], 2, '.', '') }}</span>
											@else
												<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 18px;">S/{{ number_format($related_product['product_child']['price'], 2, '.', '') }}</span>
											@endif
										@endif
				                    </div>

														{{--<div class="mb-2">
																<div class="numbers-row product_related" style="text-align: center !important;">
																	<input type="text" data-min="{{ $related_product['minimum_quantity'] }}" data-max="{{ $related_product['stock'] }}" value="{{ $related_product['minimum_quantity'] }}" class="qty2 quantity_1" name="quantity_1">
								                </div>
														</div>--}}
														<div style="">
				

						<a href="https://api.whatsapp.com/send?phone={{ $product['company']['cel'] }}&text=Mayor%20informaci%C3%B3n%20del%20{{ $product['name'] }}" style="background: #077a51;
    padding: 10px;
    color: white;" target="_blank" title="Pedir por whatsapp" data-index="{{ $product['id'] }}">WHATSAPP</a>

				</div>
			                    @endif

			                   	@if($related_product['stock'] <= 0)
			                   		<br>
			                    	<span style="font-weight: bold;">Stock No Disponible </span>
			                    @endif

			                </div>
			                <!-- /grid_item -->
						</div>
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
    <link href="/template_1/css/product_page.css" rel="stylesheet">
    <link href="/template_1/css/tooltips.css" rel="stylesheet">

      <style type="text/css">
   /* body{
  background: #f9f9f9;
  color: #555e58;
}

.wrapper{
  position: relative;
  margin: 0 auto;
  width: 550px;
  padding-left: 150px;
}

.img-selection{
  position: absolute;
  left: 0;
  top: 0;
  width: 100px;
}*/

/*.img-thumbnail:first-of-type{
  margin-top: 0;
}

.img-thumbnail{
  margin-top: 10px;
  width: 140px;
  height: 140px;
  border: 1px solid #ddd;
  cursor: pointer;
  transition: .3s ease;
  opacity: .5;
}

.img-thumbnail:hover{
  opacity: 1;
}*/

.img-thumbnail.selected{
  opacity: 1;
}

.big-img{
  position: relative;
  /*width: 445px;
  height: 445px;*/
  border: 1px solid #ddd;
  cursor: zoom-in;
  overflow: hidden;
}

.big-img img.zoom{
  position: absolute;
  transition: width 0.2s ease-out, opacity 0.2s ease-out 0.2s; 
}

.display-img{
  width: 100%;
}

    </style>


@stop
@section('plugins-js')

<script type="text/javascript">

var thumbs = $('.img-selection').find('img');

thumbs.click(function(){
  var src = $(this).attr('src');
  var dp = $('.display-img');
  var img = $('.zoom');
  dp.attr('src', src);
  img.attr('src', src);
});

$(".img-thumbnail").click(function(){
  $('.img-thumbnail').removeClass('selected');
  $(this).addClass('selected');
});

var zoom = $('.big-img').find('img').attr('src');
$('.big-img').append('<img class="zoom" src="'+zoom+'">');
$('.big-img').mouseenter(function(){
  $(this).mousemove(function(event){
    var offset = $(this).offset();
    var left = event.pageX - offset.left;
    var top = event.pageY - offset.top;
    
    $(this).find('.zoom').css({
      width: '200%',
      opacity: 1,
      left: -left,
      top: -top,
    });
  });
});

$('.big-img').mouseleave(function(){
  $(this).find('.zoom').css({
    width: '100%',
    opacity: 0,
    left: 0,
    top: 0,
  });
});
</script>

<!-- SPECIFIC SCRIPTS -->
    <script  src="/template_1/js/carousel_with_thumbs.js"></script>
    <script  src="/template_1/js/add_cart_with_number.js"></script>
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
			$(`#product_total`).html(`S/${(parseInt($(`#quantity_1`).val())*parseFloat($(`#product_price`).val())).toFixed(2)}`);
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

    $(`.product-presentation`).on('click', function(){
    	let _id = $(this)[0].dataset.index;

    	axios.get(`/api/template_1/product/${_id}/price`)
    		.then((response) => {
    			$(`.new_price_presentation`).html(`S/${response.data[0]}`);
    			document.querySelector(`#product_price`).value = response.data[0];
    			document.querySelector(`#add_item_to_cart_with_number`).setAttribute('data-index', _id);
    			calculate_total_product();

    			if (response.data[1]) {
	    			$(`.old_price_presentation`).html(`S/${response.data[1]}`);
    				return;
    			}
    			$(`.old_price_presentation`).html(``);
    		});
    });

  	var presentations;

  	$(document).on('click', '.see-presentations', function(){
  		$(`#add-presentation-to-cart`).addClass('disabled');
  		$(`#product-presentation-price`).hide();
  		let _id = $(this)[0].dataset.index;
  		axios.get(`/api/template_1/products/${_id}/presentations`)
  			.then((response) => {
  				presentations = response.data.presentations;
				let _content = `<option value="">Seleccione</option>`;

				response.data.presentations.forEach(value => {
				_content += `<option value="${value.id}">${value.color.name}</option>`;
				});

				document.querySelector(`#presentation_name`).innerHTML = `Nombre del Producto: ${response.data.product_name}`;
				document.querySelector(`#product_presentations`).innerHTML = _content;
  			})
  	});

  	getElement(`#product_presentations`).addEventListener('change', (e) => {
  		$(`#add-presentation-to-cart`).attr('data-index', "");
  		$(`#add-presentation-to-cart`).removeClass('disabled');
  		$(`#add-presentation-to-cart`).addClass('disabled');
  		$(`#product-presentation-price`).hide();
  		let _object_found;
  		if (e.target.value) {
	  		$(`#add-presentation-to-cart`).removeClass('disabled');
	  		$(`#product-presentation-price`).show();
	  		_object_found = presentations.filter(a => a.id == e.target.value);
	  		$(`#add-presentation-to-cart`).attr('data-index', _object_found[0].product.id);

	  		if (_object_found[0].product.promotion_available) {
				getElement(`#product-price`).innerHTML = `Precio: S/ ${_object_found[0].product.price_promotion}`;
	  			getElement(`#old-product-price`).innerHTML = `S/ ${_object_found[0].product.price}`;
	  			return;
	  		}
	  		getElement(`#product-price`).innerHTML = `Precio: S/ ${_object_found[0].product.price}`;
	  		getElement(`#old-product-price`).innerHTML = ``;

  		}
  	});



	</script>
	<script src="/template_1/js/tooltips.js"></script>

	<!--ZOOMMMMM-->


		<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1565190285/Scripts/xzoom.min.js"></script>
	        		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>



	        		<script type="text/javascript">
	        			
	$(document).ready(function() {
		$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
		$('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
		$('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
		$('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
		$('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

});
	        			/*$(document).ready(function() {
		$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
		$('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
		$('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
		$('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
		$('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

		//Integration with hammer.js
		var isTouchSupported = 'ontouchstart' in window;

		if (isTouchSupported) {
		//If touch device
		$('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
		var xzoom = $(this).data('xzoom');
		xzoom.eventunbind();
		});

		$('.xzoom, .xzoom2, .xzoom3').each(function() {
		var xzoom = $(this).data('xzoom');
		$(this).hammer().on("tap", function(event) {
		event.pageX = event.gesture.center.pageX;
		event.pageY = event.gesture.center.pageY;
		var s = 1, ls;

		xzoom.eventmove = function(element) {
		element.hammer().on('drag', function(event) {
		event.pageX = event.gesture.center.pageX;
		event.pageY = event.gesture.center.pageY;
		xzoom.movezoom(event);
		event.gesture.preventDefault();
		});
		}

		xzoom.eventleave = function(element) {
		element.hammer().on('tap', function(event) {
		xzoom.closezoom();
		});
		}
		xzoom.openzoom(event);
		});
		});

		$('.xzoom4').each(function() {
		var xzoom = $(this).data('xzoom');
		$(this).hammer().on("tap", function(event) {
		event.pageX = event.gesture.center.pageX;
		event.pageY = event.gesture.center.pageY;
		var s = 1, ls;

		xzoom.eventmove = function(element) {
		element.hammer().on('drag', function(event) {
		event.pageX = event.gesture.center.pageX;
		event.pageY = event.gesture.center.pageY;
		xzoom.movezoom(event);
		event.gesture.preventDefault();
		});
		}

		var counter = 0;
		xzoom.eventclick = function(element) {
		element.hammer().on('tap', function() {
		counter++;
		if (counter == 1) setTimeout(openfancy,300);
		event.gesture.preventDefault();
		});
		}

		function openfancy() {
		if (counter == 2) {
		xzoom.closezoom();
		$.fancybox.open(xzoom.gallery().cgallery);
		} else {
		xzoom.closezoom();
		}
		counter = 0;
		}
		xzoom.openzoom(event);
		});
		});

		$('.xzoom5').each(function() {
		var xzoom = $(this).data('xzoom');
		$(this).hammer().on("tap", function(event) {
		event.pageX = event.gesture.center.pageX;
		event.pageY = event.gesture.center.pageY;
		var s = 1, ls;

		xzoom.eventmove = function(element) {
		element.hammer().on('drag', function(event) {
		event.pageX = event.gesture.center.pageX;
		event.pageY = event.gesture.center.pageY;
		xzoom.movezoom(event);
		event.gesture.preventDefault();
		});
		}

		var counter = 0;
		xzoom.eventclick = function(element) {
		element.hammer().on('tap', function() {
		counter++;
		if (counter == 1) setTimeout(openmagnific,300);
		event.gesture.preventDefault();
		});
		}

		function openmagnific() {
		if (counter == 2) {
		xzoom.closezoom();
		var gallery = xzoom.gallery().cgallery;
		var i, images = new Array();
		for (i in gallery) {
		images[i] = {src: gallery[i]};
		}
		$.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
		} else {
		xzoom.closezoom();
		}
		counter = 0;
		}
		xzoom.openzoom(event);
		});
		});

		} else {
		//If not touch device

		//Integration with fancybox plugin
		$('#xzoom-fancy').bind('click', function(event) {
		var xzoom = $(this).data('xzoom');
		xzoom.closezoom();
		$.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
		event.preventDefault();
		});

		//Integration with magnific popup plugin
		$('#xzoom-magnific').bind('click', function(event) {
		var xzoom = $(this).data('xzoom');
		xzoom.closezoom();
		var gallery = xzoom.gallery().cgallery;
		var i, images = new Array();
		for (i in gallery) {
		images[i] = {src: gallery[i]};
		}
		$.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
		event.preventDefault();
		});
		}
});*/
	        		</script>

@stop
