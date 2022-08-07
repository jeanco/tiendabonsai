
@extends('template_3.layouts.index')
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
		$time=Carbon\Carbon::now()->format('Y/m/d');
		$item_time_promotion=Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d');
		$transfer_end_at=Carbon\Carbon::parse($product['transfer_end_at'])->format('Y/m/d');

	@endphp
	    <div class="container margin_30">
	        <div class="row">
				<!-- Galeria ///////////////////////////////// -->
				     <div class="col-md-4">

				     					

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

						@if($product['transfer_available'] && $transfer_end_at >= $time)
						<div class="countdown_inner movil_header"> Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($transfer_end_at)->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
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

	            {{--<div class="col-md-5">
	                <div class="all">
						<!-- nombre -->
						@if($time<$item_time_promotion)
						@if($product['promotion_available'] && $product['show_promotion_timer'])
						        <div class="countdown_inner movil_header"> Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
								@endif
						@endif

						<input type="hidden" id="product_id" value="{{ $product['id'] }}">
						<h3 class="md_none desktop_header">{{ $product['name'] }}</h3>
	                    <div class="slider">
	                        <div class="owl-carousel owl-theme main">
	                        	@if(count($product->main_photo))
									<div style="background-image: url({{ $product->main_photo->resource }});" class="item-box"></div>
								@endif

								@foreach ($product->other_photos as $image)
									<div style="background-image: url({{ $image['resource'] }});" class="item-box"></div>
								@endforeach
	                        </div>
	                        <div class="left nonl"><i class="ti-angle-left"></i></div>
	                        <div class="right"><i class="ti-angle-right"></i></div>
	                    </div>

	                    <div class="slider-two desktop_header">
	                        <div class="owl-carousel owl-theme thumbs">
								@foreach ($product->images as $key => $image)
									@if ($key == 0)
										<div style="background-image: url({{ $image['resource'] }});" class="item active"></div>
									@else
										<div style="background-image: url({{ $image['resource'] }});" class="item"></div>
									@endif
								@endforeach
								
	                        </div>
	                        <div class="left-t nonl-t"></div>
	                        <div class="right-t"></div>
	                    </div>
	                 </div>
	            </div>--}}

							<!-- Descripcion ///////////////////////////////// -->
	            <div class="col-md-4 sm_none">
	                <div class="prod_info">
											<h1 class="font_bold">{{ $product['name'] }}</h1>
	                    <p>{!! $product['description'] !!}</p>
	                    <div class="prod_options">
	                    </div>
	                </div>
									<div><span class="font_bold">Tipo de producto:</span><span>
										@if($product['type_id'] == 2)
										Régimen General
										@else
										Zofra tacna
										@endif

								</span></div>
	            </div>
							<!-- Precio ///////////////////////////////// -->
	            <div class="col-md-4">
	            			

							@if($product['transfer_available'] && $transfer_end_at >= $time)
						<div class="countdown_inner desktop_header"> Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($transfer_end_at)->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
								@else


								@if($time<$item_time_promotion)
								@if($product['promotion_available'] && $product['show_promotion_timer'])
						        <div class="countdown_inner desktop_header">Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
								@endif
							@endif

						@endif

	                <div class="prod_info">

	                    <div class="row">

	                    	<!--div class="col-md-12 select_input">
                                <label for="review">Precio por Sucursal</label>
                                <select class="form-control" size="1">
                                    <option value="India">Tacna</option>
                                    <option value="UAE">Ilo</option>
                                </select>
                            </div-->

	                    	<div class="col-lg-12 col-md-12">
	                    		<h3 class="md_none movil_header font_bold" style="font-size: 16px;">{{ $product['name'] }}</h3>
                    			@php
							 		$price = $product['price'];
							 	@endphp
								@if($product['promotion_available'])
								 	@php
								 		$price = $product['price_promotion'];
								 	@endphp

								 	<div class="row">
								 		<div class="col-7 text-left">
								 			@if($product['transfer_available'] && $transfer_end_at >= $time)
								 			<span>Exclusivo con transferencia  </span> <br>
								 			@endif
								 			<span>Precio online  </span><span class="percentage">{{ $discount }}% DSCTO.</span><br>
								 			<span>Precio Sugerido </span><br>
								 			
								 		</div>
								 		<div class="col-5 text-right">
								 			<div class="price_main">
								 				@if($product['transfer_available'] && $transfer_end_at >= $time)
											 <span class="transfer_price font_bold">S/{{ $product['transfer_price'] }}</span>
										@endif
										<span class="new_price font_bold">S/{{ $product['price_promotion'] }}</span><br>
										 <span class="old_price font_bold">S/{{ $product['price'] }}</span><br>
										
									</div><br>
								 		</div>
								 		
								 	</div>

									
								@else
									{{--<div class="price_main font_bold">
									<span class="new_price">S/{{ $product['price'] }}</span><br>
									@if($product['transfer_available'])
									<span class="font_bold">S/{{ $product['transfer_price'] }}</span>
									@endif
									<br>
								</div>--}}

								<div class="row">
								 		<div class="col-7 text-left">
								 			<span>Precio Sugerido </span><br>
								 			@if($product['transfer_available'] && $transfer_end_at >= $time)
								 			<span>Precio con transferencia  </span> <br>
								 			@endif
								 		</div>
								 		<div class="col-5 text-right">
								 		<div class="price_main">
										<span class="new_price font_bold">S/{{ $product['price'] }}</span><br>
										@if($product['transfer_available'] && $transfer_end_at >= $time)
											 <span class="transfer_price font_bold">S/{{ $product['transfer_price'] }}</span>
										@endif
									</div><br>
								 		</div>
								 		
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


	                        <div class="col-lg-6 col-md-6 text-right">
	                        	<label class=""><strong>Total</strong></label>
										<div class="price_main font_bold"><span class="new_price" id="product_total">S/{{ number_format($price*$product['minimum_quantity'], 2, ".", "") }}</span><br><br></div>

	                        </div>

	                    </div>
	                    <div class="row">
	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a href="#" data-index="{{ $product['id'] }}" class="btn_1 {{ $product['stock'] == 0 ? 'disabled' : '' }}" id="add_item_to_cart_with_number" style="width: 100%; margin: 10px 0 10px 0;">Agregar Carrito</a></div>
	                        </div>

	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a data-index="{{ $product['id'] }}" class="btn_1 {{ $product['stock'] == 0 ? 'disabled' : '' }}" id="buy_now" style="width: 100%; margin: 10px 0 10px 0;">Comprar Ahora</a></div>
	                        </div>

	                        <div class="col-lg-12 col-md-12">
	                        @if($product['pdf'])
	                        <div class="btn_add_to_cartx">
								<a  href="{{ $product['pdf'] }}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; background: #fdf010; color: black">Descargar Ficha Técnica</a>
							</div>
	                        @endif
	                        </div>

	                    </div>
	                    <div class="row">
	                    	 @if($product['stock'] == 0)
	                        <div class="col-lg-12">
	                        	<span style="color: red;
    font-weight: bold;
    font-size: 19px;
    margin-top: 10px;">Stock No Disponible</span>
	                        </div>
	                        @else
	                        <div class="col-lg-12">
	                        	<span>Disponible: {{ $product['stock'] }} Unidades</span>
	                        </div>
	                        @endif

	                    </div>
	                    <hr>
	                    <div class="row">
	                    	<div class="col-lg-12">
	                    	Comparte con tus Amigos
	                    	</div>
	                    </div>
	                </div>

	                <!-- /prod_info -->
					<div class="share-buttons-row">
						<!--Facebook's Button -->
						<div class="share-fb"><a href="{{ $company_main->facebook }}" target="_blank" ><i class="fab fa-facebook-f fa-2x"></i></a>	</div>
						<!--Twitter's Button -->
						<div class="share-twitter">
							<a href="{{ $company_main->twitter }}" target="_blank" ><i class="fab fa-twitter fa-2x"></i></a>
						</div>
					</div>


	                {{--<div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank"><img src="/template_3/img/whatsapp.png" class="button_select" width="45px" style="padding: 1px; background: white;"><span>Whatsapp</span></a>
	                        </li>
	                        <li>
	                            <a href="tel:{{ $company_main->cel }}" ><img src="/template_3/img/contacto.jpg" class="button_select" width="45px" style=""><span style="">Contactar</span></a>
	                        </li>
	                    </ul>
	                </div>--}}
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
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Detalles</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Características</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Opiniones</a>
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
	                                Detalles
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

	                <div id="pane-C" class="card tab-pane fade" role="tabpanel"  aria-labelledby="tab-C">
	                    <div class="card-header" role="tab" id="heading-C">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
	                                Características
	                            </a>
	                        </h5>
	                    </div>

	                    <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                
	                                <div class="col-lg-12">
	                                    
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
	                        	@if(count($reviews))
	                        		@php
	                        			$k = 0;
	                        		@endphp
								@for ($i = 0; $i < $div_reviews; $i++)
	                            <div class="row justify-content-between">
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating">
	                                            	{!! str_repeat('<i class="icon-star"></i>', $reviews[$k]['point']) !!}
	                                            	{!! str_repeat('<i class="icon-star empty"></i>', 5 - $reviews[$k]['point']) !!}
	                                            	<!-- <i class="icon-star"></i>
	                                            	<i class="icon-star"></i>
	                                            	<i class="icon-star"></i>
	                                            	<i class="icon-star"></i>
	                                            	<i class="icon-star"></i> -->
	                                            	<em>{{ $reviews[$k]['point'] }}.0/5.0</em></span>
	                                            	<em>Publicado el {{ Date::parse($reviews[$k]['created_at'])->format('d \d\e F \d\e\l Y ') }} </em>
	                                        </div>
	                                        <h4>{{ $reviews[$k]['title'] }}</h4>
	                                        <p>{{ $reviews[$k]['message'] }}</p>
	                                    </div>
	                                </div>

	                                @if(isset($reviews[$k+1]))
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating">
													{!! str_repeat('<i class="icon-star"></i>', $reviews[$k+1]['point']) !!}
	                                            	{!! str_repeat('<i class="icon-star empty"></i>', 5 - $reviews[$k+1]['point']) !!}
	                                            	<em>{{ $reviews[$k+1]['point'] }}.0/5.0</em></span>
	                                            <em>Publicado el {{ Date::parse($reviews[$k+1]['created_at'])->format('d \d\e F \d\e\l Y ') }}</em>
	                                        </div>
	                                        <h4>{{ $reviews[$k+1]['title'] }}</h4>
	                                        <p>{{ $reviews[$k+1]['message'] }}</p>
	                                    </div>
	                                </div>
	                                @endif
	                            </div>
									@php
										$k += 2;
									@endphp
								@endfor
	                           	@else
	                           		No hay ninguna opinión aún
	                           	@endif
	                            <!-- /row -->
	                            {{--
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
	                            --}}
	                            <!-- /row -->
	                            @if(Auth::check())
	                            <p class="text-right"><a href="#" id="leave_my_review" class="btn_1">Dejar mi Opinión</a></p>
	                            @endif
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

						$time=Carbon\Carbon::now()->format('Y/m/d');
						$item_time_promotion=Carbon\Carbon::parse($related_product['promotion_end_at'])->format('Y/m/d');

						$transfer_end_at = Carbon\Carbon::parse($related_product['transfer_end_at'])->format('Y/m/d');

					@endphp
	            <div class="item">
	                <div class="grid_item">
	                    <span class="ribbon new">Nuevo</span>
											<figure>
												<center>
												<a href="/catalogo/{{ $related_product['slug'] }}">
												<img class="owl-lazy" src="" data-src="{{ $image }}" alt="" style="max-height: 180px; width: auto;">
												</a>
												</center>
												@if($time<$item_time_promotion)
													@if($related_product['promotion_available'] && $related_product['show_promotion_timer'])
											        <div class="countdown_inner" style="">Esta Oferta termina en <br><div data-countdown="{{ \Carbon\Carbon::parse($related_product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
													</div>
													@endif
												@endif


												@if($related_product['transfer_available'] && $transfer_end_at >= $time)
											<div class="countdown_inner" style="">Esta Oferta termina en <br><div data-countdown="{{ \Carbon\Carbon::parse($transfer_end_at)->format('Y/m/d') }}" class="countdown"></div>
													</div>
										@endif
										
											</figure>
											@if($related_product['promotion_available'])
											@if($related_product['promotion_label_image'] != '')
											<div class="brand_ribbon"><img src="{{ $related_product['promotion_label_image'] }}"></div>
											@endif
											
											@endif
											<a href="/catalogo/{{ $related_product['slug'] }}">
												<div class="font-weight-bold text-center" style="font-size: 18px; color: #2b2b2b;">{{ $related_product['name'] }}</div>
											</a>

											<div style="display: flex;
										    flex-direction: column;
										    justify-content: space-between;
										    height: 135px;">

						    				@if($product['stock'] <= 0)
												<span style="color: red;
    font-weight: bold;
    font-size: 19px;
    margin-top: 10px;">Stock No Disponible</span>
											@endif

											<div class="price_box text-center my-3">

												<div class="row">
													<div class="col-6 text-left">
														@if($related_product['transfer_available'] && $transfer_end_at >= $time)
														<span>Exclusivo con Transferencia  </span> <br>
														@endif
														@if($related_product['promotion_available'])
														<span>Precio Online</span><br>
														@endif
														<span>Precio Sugerido </span><br>
														
													</div>
													<div class="col-6 text-right">
														<div class="price_main">
															@if($related_product['transfer_available'] && $transfer_end_at >= $time)
															<br>
													<span class="transfer_price font_bold" style="">S/ {{ $related_product['transfer_price'] }}</span>
													<br><br>	
													@endif

													@if($related_product['promotion_available'])
													
													<span class="new_price font_bold" style="">S/ {{ $related_product['price_promotion'] }}</span><br>
													<span class="old_price font_bold">S/ {{ $related_product['price'] }}</span><br>
													{{--<span class="font_bold" style="color: #d8203c;">Ahorras {{ $related_product['promotion_discount'] }}</span>--}}
													<span class="percentage">Ahorras {{ $related_product['promotion_discount'] }}</span><br>
													@else
														<span class="new_price font_bold" style="">S/ {{ $related_product['price'] }}</span><br>
													@endif

													
													</div>
													</div>
												</div>


												{{--@if($related_product['promotion_available'])
													<span class="old_price">S/{{ $related_product['price'] }}</span><br>
													<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 24px;">S/{{ $related_product['price_promotion'] }}</span><br>
													<span class="font-weight-bold" style="color: #d8203c;">Ahorras {{ $related_product['promotion_discount'] }}</span>
												@else
													<span class="new_price font-weight-bold" style="color: #d8203c; font-size: 24px;">S/{{ $related_product['price'] }}</span>
												@endif

												@if($related_product['transfer_available'])
													<br>
													<span class="font_bold">S/{{ $related_product['transfer_price'] }}</span>
												@endif	--}}


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
	                            <img class="owl-lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/5.jpg" alt="">
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
	                            <img class="owl-lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/8.jpg" alt="">
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
	                            <img class="owl-lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/2.jpg" alt="">
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
	                            <img class="owl-lazy" src="/template_3/img/products/product_placeholder_square_medium.jpg" data-src="/template_3/img/products/shoes/3.jpg" alt="">
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
								<p>Nos encargamos de gartizar la calidad del producto</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Pago seguro</h3>
								<p>100% Seguro</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Soporte</h3>
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








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_3/css/product_page.css" rel="stylesheet">

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
    <script  src="/template_3/js/carousel_with_thumbs.js"></script>
    <script  src="/template_3/js/add_cart_with_number.js"></script>
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

				axios.get(`/api/template_3/product/${_productId}/is-there-stock?stock=1`)
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

		function calculate_total_product(){
			//console.log(parseInt($(`#quantity_1`).val()), parseFloat($(`#product_price`).val()));

			$(`#product_total`).html(`S/${(parseInt($(`#quantity_1`).val())*parseFloat($(`#product_price`).val())).toFixed(2)}`);
		}

		$(`#leave_my_review`)
			.on('click', function(e){
				e.preventDefault();
                localStorage.removeItem(`id_product_to_review`);
  				localStorage.setItem(`id_product_to_review`, $(`#product_id`).val());
				location.replace('/enviar-opinion');

			})

	</script>

	<script type="text/javascript">
		const ARTICLE_URL = encodeURIComponent(window.location.href);
		
		$('.share-fb').click(function(){
			open_window('http://www.facebook.com/sharer/sharer.php?u='+ARTICLE_URL, 'facebook_share');
		});

		$('.share-twitter').click(function(){
			open_window('http://twitter.com/share?url='+ARTICLE_URL, 'twitter_share');
		});


		function open_window(url, name){
			window.open(url, name, 'height=320, width=640, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');
		}

	</script>

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
