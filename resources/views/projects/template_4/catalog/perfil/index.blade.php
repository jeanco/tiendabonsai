
@extends('template_4.layouts.index')
@section('content')


	        		

<main>
	@php
		$discount = (int)((($product['price'] - $product['price_promotion'])*100)/$product['price']);
		$time=Carbon\Carbon::now()->format('Y/m/d');
		$item_time_promotion=Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d');
	@endphp
	    <div class="container margin_15">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h3 style="font-weight: bold; ">{{ $product['name'] }}</h3>
	        		<hr style="margin: 3px 0 5px 0;">




									

	        	</div>
							<!-- Galeria ///////////////////////////////// -->
			            <div class="col-md-5">

			            		<div class="container d-flex justify-content-center">
								   <section id="default" class="padding-top0">
								      <div class="row">
								         <div class="large-5 column">
								            <div class="xzoom-container">
								            	@if(count($product->main_photo))
								               <img class="xzoom" id="xzoom-default" src="{{ $product->main_photo->resource }}" xoriginal="{{ $product->main_photo->resource }}"  width="100%" />
								               @else

								               @foreach ($product->other_photos as $key => $image)
								               @if ($key == 0)
																<img class="xzoom" id="xzoom-default" src="{{ $image['resource'] }}" xoriginal="{{ $image['resource'] }}"  width="100%" />
															@else
															
															@endif
								               
								               @endforeach

								               @endif
								               

								               
								               <div class="xzoom-thumbs"> 
												@if(count($product->main_photo))
												<a href="{{ $product->main_photo->resource }}"><img class="xzoom-gallery" width="80" src="{{ $product->main_photo->resource }}" xpreview="{{ $product->main_photo->resource }}"></a>
												@endif											
												@foreach ($product->other_photos as $key => $image)
								               	<a href="{{ $image['resource'] }}"><img class="xzoom-gallery" width="80" src="{{ $image['resource'] }}" xpreview="{{ $image['resource'] }}"></a>
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




	                {{--<div class="all">
											
	                    <div class="slider">
	                        <div class="owl-carousel owl-theme main">
	                        	@if(count($product->main_photo))
															<div style="background-image: url({{ $product->main_photo->resource }});  height: 450px;
															background-position: center; 
															background-size: contain;
															background-repeat: no-repeat;" class="item-box"></div>
														@endif

														@foreach ($product->other_photos as $image)
															<div style="background-image: url({{ $image['resource'] }});  height: 450px; 
															background-position: center; 
															background-size: contain;
															background-repeat: no-repeat;" class="item-box"></div>
														@endforeach
	                        </div>
	                        <div class="left nonl"><i class="ti-angle-left"></i></div>
	                        <div class="right"><i class="ti-angle-right"></i></div>
	                    </div>
	                    <div class="slider-two">
	                        <div class="owl-carousel owl-theme thumbs">
	                        	@if(count($product->main_photo))
															<div style="background-image: url({{ $product->main_photo->resource }}); height: 80px;background-position: center; 
															background-size: contain;
															background-repeat: no-repeat;" class="item active"></div>
															@foreach ($product->other_photos as $key => $image)
																<div style="background-image: url({{ $image['resource'] }}); height: 80px; background-position: center; 
															background-size: contain;
															background-repeat: no-repeat; " class="item"></div>
															@endforeach
														@else
														@foreach ($product->other_photos as $key => $image)
															@if ($key == 0)
																<div style="background-image: url({{ $image['resource'] }});  height: 80px; background-position: center; 
															background-size: contain;
															background-repeat: no-repeat;" class="item active"></div>
															@else
																<div style="background-image: url({{ $image['resource'] }});  height: 80px; background-position: center; 
															background-size: contain;
															background-repeat: no-repeat;" class="item"></div>
															@endif
														@endforeach
													@endif
	                        </div>
	                        <div class="left-t nonl-t"></div>
	                        <div class="right-t"></div>
	                    </div>
	                </div>--}}


	            </div>
							<!-- Descripcion ///////////////////////////////// -->
	            <div class="col-md-4 sm_none">
	                <div class="prod_info">
											{{--<h1>{{ $product['name'] }}</h1>--}}
											<h1 style="font-weight: bold;">Descripción</h1>
	                    <p>{!! $product['description'] !!}</p>
	                    <div class="prod_options">
	                    </div>
	                </div>
									{{--<div>Tipo de producto: <span>
										@if($product['type_id'] == 2)
										Régimen General
										@else
										Zofra tacna
										@endif

								</span></div>--}}
	            </div>
							<!-- Precio ///////////////////////////////// -->
	            <div class="col-md-3">
	            				<label style="font-weight: bold; color: black;" class="b_font_">Marca: {{$brand}}</label>
									@if($time<$item_time_promotion)
								@if($product['promotion_available'] && $product['show_promotion_timer'])
						        <div class="countdown_inner desktop_header">Esta oferta termina en <div data-countdown="{{ \Carbon\Carbon::parse($product['promotion_end_at'])->format('Y/m/d') }}" class="countdown"></div>
						        <!-- 2020/06/20 -->
								</div>
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
                    			@php
							 		$price = $product['price'];
							 	@endphp
								@if($product['promotion_available'])
								 	@php
								 		$price = $product['price_promotion'];
								 	@endphp
									<div class="price_main">
										<span class="new_price b_font_">S/{{ $product['price_promotion'] }}</span>
										<span class="percentage b_font_">{{ $discount }}% DSCTO.</span> <br>
										<span class="old_price b_font_">S/{{ $product['price'] }}</span></div><br><br>
								@else
									<div class="price_main "><span class="new_price b_font_">S/{{ $product['price'] }}</span><br><br></div>
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
										<div class="price_main"><span class="new_price b_font_" id="product_total">S/{{ number_format($price*$product['minimum_quantity'], 2, ".", "") }}</span><br><br></div>

	                        </div>
	                        @if($product['stock'] <= 0)
	                        <div class="col-lg-6 b_font_">
	                        	Stock: <span class="" style="color: red;">Agotado</span>
	                        </div>
	                        @else
	                        <div class="col-lg-6 b_font_">
	                        	Stock:<span class=""> {{ $product['stock'] }}</span>
	                        </div>
	                        @endif
	                        <div class="col-lg-6">
	                        	<span class="">Pago en efectivo</span>
	                        </div>
	                    </div>
	                   
	                    <div class="row">
	                        <div class="col-lg-6 col-md-6">
							<div class="btn_add_to_cartx"><a href="#" data-index="{{ $product['id'] }}" class="btn_1 {{ $product['stock'] == 0 ? 'disabled' : '' }}" id="add_item_to_cart_with_number" style="width: 100%; margin: 10px 0 10px 0; padding: 10px 5px !important;">Agregar Carrito</a></div>
	                        </div>

	                        <div class="col-lg-6 col-md-6">
							<div class="btn_add_to_cartx"><a data-index="{{ $product['id'] }}" class="btn_1 {{ $product['stock'] == 0 ? 'disabled' : '' }}" id="buy_now" style="width: 100%; margin: 10px 0 10px 0;  padding: 10px 5px !important;">Comprar Ahora</a></div>
	                        </div>
	                        @if( $product['pdf'])
	                        <div class="col-lg-12 col-md-12">
							<div class="btn_add_to_cartx"><a  href="{{ $product['pdf'] }}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; background: #fdf010; color: black">Descargar Ficha Técnica</a></div>
	                        </div>
	                        @endif

	                         <div class="col-lg-12 col-md-12">
	                         	@if($product['stock'] == 1)
	                         	<span style="color: red; font-weight: bold;">Importante: </span>Stock {{ $product['stock'] }}
	                         	 	<p style="line-height: 15px; text-align: center;">Antes de comprar consultar disponibilidad al {{ $company_main->cel }}</p>
	                         	@endif
	                        
							
	                        </div>

	                        
	                        
	                       

	                    </div>
	                </div>
	                <!-- /prod_info -->
	                
	                <div class="row">
	                	<div class="col-md-6">
	                        	<div class="btn_add_to_cartx" style="padding-top: 15px;"><a class="btn_1" style="width: 100%; margin: 10px 0 10px 0; background: #29b73b;" href="https://api.whatsapp.com/send?phone={{ $company_main->cel }}&text=Mayor%20informaci%C3%B3n%20del%20producto" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a></div>
	                        </div>
	                	<div class="col-md-6">
	                		<div class="header_desktop">
	                	<label class=""><strong>Compartir</strong></label>
	                </div>
	                		<div class="share-buttons-row">
	                		<div class="share-fb" style="width: 37px; height: 37px; border-radius: 15px;"></div>
											<div class="share-twitter" style="width: 37px; height: 37px; border-radius: 15px;"></div>
											</div>
	                	</div>

	                	 <div class="col-md-6">
	                        	<a href="/metodos-de-entrega" target="_blank"><img src="{{ isset( $gallery_company[10]->resource) ? $gallery_company[10]->resource:  ''  }}" style="height: 60px;"></a>
	                        </div>
	                        <div class="col-md-6">
	                        	<img src="{{ isset( $gallery_company[11]->resource) ? $gallery_company[11]->resource:  ''  }}" style="height: 60px;">
	                        </div>
	                	
	                </div>
	                	
						

					
	                <div class="header_movil" >
	                	<h5 style="font-weight: bold; padding-top: 20px;">Descripción</h5>
	                </div>
	                <hr>


					

	               
	                <!-- /product_actions -->
									<!--  -->
									<div class="prod_info md_none">
											<p>{!! $product['description'] !!}</p>
	                </div>
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->



	    <div class="tabs_product bg_white version_2">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item" style="font-weight: bold;">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true" >Detalles del Producto</a>
	                </li>
	                <li class="nav-item" style="font-weight: bold;">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Características</a>
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
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A" style="font-weight: bold;">
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
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B" style="font-weight: bold;">
	                                Características
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
							<i class="ti-medall"></i>
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
    <link href="/template_4/css/product_page.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1565190284/Scripts/xzoom.css" media="all" />

    <style type="text/css">
	        			.xzoom-gallery {
						    margin-top: 10px
						}

						.xzoom {
						    margin-top: 10px;
						    box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 0%);
						}

					
	        		</style>

@stop
@section('plugins-js')

<!-- SPECIFIC SCRIPTS -->
    <script  src="/template_4/js/carousel_with_thumbs.js"></script>
    <script  src="/template_4/js/add_cart_with_number.js"></script>
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

				axios.get(`/api/template_4/product/${_productId}/is-there-stock?stock=1`)
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
});
	        		</script>

@stop
