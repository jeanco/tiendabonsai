@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(/wings/img/head5.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">{{-- $product->name --}}</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li><a href="/catalogo">Vehículos</a></li>
                <li>Detalle de vehículo</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->

    <div class="car-details-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
            <div class="nav">
              <ul>
                <li ><a href="/productos/{{ $product->slug }}">Detalles</a></li>
                <li class="active" ><a href="/especificaciones/{{ $product->slug }}">Especificaciones</a></li>
                <li ><a href="/galeria-automoviles/{{ $product->slug }}">Galería</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-full p-t50 bg-white content-inner-2">
            <div class="container">
                <div class="row">
                    <!-- Side bar start -->
                    <div class="col-md-12">
						<div class="m-b30">
							<h3 class="h3 m-t0">Nuestras especificaciones</h3>
							<!--ul class="used-car-dl-info">
								<li>Ex-showroom price in Bangalore</li>
							</ul-->
						</div>
					</div>
				</div>
			</div>
			<div class="specifications owl-carousel owl-btn-center-lr">

				@foreach ($product->images as $image)
					<div class="item">
					<div class="dlab-thum-bx"> <img src="{{ $image['resource'] }}" alt=""> </div>
					</div>
				@endforeach

				{{-- <div class="item">
					<div class="dlab-thum-bx"> <img src="/wings/img/autos/2.jpg" alt=""> </div>
				</div>
				<div class="item">
					<div class="dlab-thum-bx"> <img src="/wings/img/autos/11.jpg" alt=""> </div>
				</div>
				<div class="item">
					<div class="dlab-thum-bx"> <img src="/wings/img/autos/10.jpg" alt=""> </div>
				</div> --}}
			</div>
			<div class="container">
                <div class="row">
                    <!-- Side bar start -->
                    <div class="col-md-12">
						<div class="used-car-features grid2 clearfix m-b30 m-t30">
							@foreach ($product->attributes as $attribute)
							<div class="car-features">
									<img src="{{ $attribute['resource'] }}" alt="" width="20%">
									{{-- <i class="flaticon-calendar"></i> --}}
									<h5>{{ $attribute['name'] }}</h5>
									<span>{{ $attribute['description'] }}</span>
							</div>
							@endforeach
							{{-- <div class="car-features">
								<i class="flaticon-dashboard"></i>
								<h5>0.00 km</h5>
								<span>Kilometraje</span>
							</div>
							<div class="car-features">
								<i class="flaticon-gas-station"></i>
								<h5>Diesel</h5>
								<span>Conbustible</span>
							</div>
							<div class="car-features">
								<i class="flaticon-mechanic"></i>
								<h5>46</h5>
								<span>Nro. Pasajeros</span>
							</div>
							<div class="car-features">
								<i class="flaticon-calendar"></i>
								<h5>Automatic</h5>
								<span>Transmision</span>
							</div> --}}
							<!--div class="car-features">
								<i class="flaticon-car-key"></i>
								<h5>First</h5>
								<span>Owner</span>
							</div-->
						</div>
						<!--div class="clearfix m-t30">
							<ul class="nav theme-tabs m-b10">
								<li role="presentation" class="active">
									<a data-toggle="tab"  aria-controls="engine"  href="car-detail-specifications.html#engine">
										<i class="fa fa-usd"></i>
										Engine & Transmission
									</a>
								</li>
								<li role="presentation" >
									<a data-toggle="tab"  aria-controls="capacity" href="car-detail-specifications.html#capacity">
										<i class="fa fa-tachometer"></i>
										Capacity
									</a>
								</li>
								<li role="presentation" >
									<a data-toggle="tab"  aria-controls="comfort" href="car-detail-specifications.html#comfort">
										<i class="fa fa-star"></i>
										Comfort
									</a>
								</li>
								<li role="presentation" >
									<a data-toggle="tab"  aria-controls="safety" href="car-detail-specifications.html#safety">
										<i class="fa fa-automobile"></i>
										Safety
									</a>
								</li>
								<li role="presentation" >
									<a data-toggle="tab"  aria-controls="others" href="car-detail-specifications.html#others">
										<i class="fa fa-exclamation-circle"></i>
										Others
									</a>
								</li>
							</ul>
							<div class="dlab-tabs">
								<div class="tab-content">
									<div id="engine"  class="tab-pane active clearfix city-list">
										<div class="icon-bx-wraper bx-style-1 p-a30">
											<ul class="table-dl clearfix">
												<li>
													<div class="leftview">Top Speed</div>
													<div class="rightview">235 kmph</div>
												</li>
												<li>
													<div class="leftview">Acceleration (0-100 kmph)</div>
													<div class="rightview">7.9</div>
												</li>
												<li>
													<div class="leftview">Engine Displacement(cc)</div>
													<div class="rightview">1968</div>
												</li>
												<li>
													<div class="leftview">Maximum Power</div>
													<div class="rightview">187.74bhp@3800-4200rpm</div>
												</li>

												<li>
													<div class="leftview">Maximum Torque</div>
													<div class="rightview">400nm@1750-3000rpm</div>
												</li>
												<li>
													<div class="leftview">Engine Description</div>
													<div class="rightview">2.0 litre 187.74bhp TDI Engine </div>
												</li>
												<li>
													<div class="leftview">Turning Radius</div>
													<div class="rightview">-</div>
												</li>
												<li>
													<div class="leftview">No. of Cylinders</div>
													<div class="rightview">4</div>
												</li>
												<li>
													<div class="leftview">Drive Type</div>
													<div class="rightview">FWD</div>
												</li>
												<li>
													<div class="leftview">Turbo Charger</div>
													<div class="rightview text-green"><i class="fa fa-check font-18"></i> Yes</div>
												</li>
												<li>
													<div class="leftview">Super Charger</div>
													<div class="rightview text-red"><i class="fa fa-close font-18"></i> No</div>
												</li>
												<li>
													<div class="leftview">Valves Per Cylinder</div>
													<div class="rightview">5</div>
												</li>
												<li>
													<div class="leftview">Compression Ratio</div>
													<div class="rightview">-</div>
												</li>
												<li>
													<div class="leftview">Fuel Supply System</div>
													<div class="rightview">CRDi</div>
												</li>
												<li>
													<div class="leftview">Gear box</div>
													<div class="rightview">7 Speed</div>
												</li>
												<li>
													<div class="leftview">Steering Gear Type</div>
													<div class="rightview">-</div>
												</li>
											  </ul>
										</div>
									</div>
									<div id="capacity"  class="tab-pane clearfix city-list">
										<div class="icon-bx-wraper bx-style-1 p-a30">
											<ul class="table-dl clearfix">
												<li>
													<div class="leftview">Seating Capacity</div>
													<div class="rightview">4 </div>
												</li>
												<li>
													<div class="leftview">No of Doors</div>
													<div class="rightview">4</div>
												</li>
												<li>
													<div class="leftview">Length</div>
													<div class="rightview">4752mm</div>
												</li>
												<li>
													<div class="leftview">Width</div>
													<div class="rightview">2029mm</div>
												</li>
												<li>
													<div class="leftview">Height</div>
													<div class="rightview">1384mm</div>
												</li>
												<li>
													<div class="leftview">Ground Clearance</div>
													<div class="rightview">-</div>
												</li>
												<li>
													<div class="leftview">Engine</div>
													<div class="rightview">1989 cc </div>
												</li>
												<li>
													<div class="leftview">BHP</div>
													<div class="rightview">188</div>
												</li>
												<li>
													<div class="leftview">No. of Cylinders</div>
													<div class="rightview">4</div>
												</li>
												<li>
													<div class="leftview">No. of Gears</div>
													<div class="rightview">Spped 7</div>
												</li>
											  </ul>
										</div>
									</div>
									<div id="comfort"  class="tab-pane clearfix city-list">
										<div class="icon-bx-wraper bx-style-1 p-a30">
											<ul class="table-dl clearfix">
												<li>
													<div class="leftview">Air Conditioner</div>
													<div class="rightview text-green"><i class="fa fa-check font-18"></i> Yes</div>
												</li>
												<li>
													<div class="leftview">Power Steering</div>
													<div class="rightview text-green"><i class="fa fa-check font-18"></i> Yes</div>
												</li>
												<li>
													<div class="leftview">Rear A/C Vents</div>
													<div class="rightview text-red"><i class="fa fa-close font-18"></i> Yes</div>
												</li>
												<li>
													<div class="leftview">Engine Start/Stop Button</div>
													<div class="rightview text-green"><i class="fa fa-check font-18"></i> Yes</div>
												</li>
											  </ul>
										</div>
									</div>
									<div id="safety"  class="tab-pane clearfix city-list">
										<div class="icon-bx-wraper bx-style-1 p-a30">
											<ul class="table-dl clearfix">
												<li>
													<div class="leftview">Parking Sensor</div>
													<div class="rightview">Yes </div>
												</li>
												<li>
													<div class="leftview">Airbags</div>
													<div class="rightview">Yes</div>
												</li>
											  </ul>
										</div>
									</div>
									<div id="others"  class="tab-pane clearfix city-list">
										<div class="icon-bx-wraper bx-style-1 p-a30">
											<ul class="table-dl clearfix">
												<li>
													<div class="leftview">Bore x Stroke</div>
													<div class="rightview">- </div>
												</li>
												<li>
													<div class="leftview">Synchronizers</div>
													<div class="rightview">-</div>
												</li>
												<li>
													<div class="leftview">Clutch Type</div>
													<div class="rightview">- </div>
												</li>
												<li>
													<div class="leftview">Country of Assembly</div>
													<div class="rightview">-</div>
												</li>
												<li>
													<div class="leftview">Country of Manufacture</div>
													<div class="rightview">- </div>
												</li>
												<li>
													<div class="leftview">Warranty Time</div>
													<div class="rightview">-</div>
												</li>
											  </ul>

										</div>
									</div>
								</div>
							</div>

						</div>

						<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="modal-body clearfix">
										<div class="pull-letf max-width-300"></div>
										<div class="lead-form">
											<form>
												<h3 class="m-t0">Personal Details</h3>
												<div class="form-group">
													<input  value="" class="form-control" placeholder="Name"/>
												</div>
												<div class="form-group">
													<input  value="" class="form-control" placeholder="Mobile Number"/>
												</div>
												<div class="clearfix">
													<button type="button" class="btn-primary site-button btn-block">Submit </button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div-->
					</div>
                    <!-- Side bar END -->
				 </div>
            </div>
        </div>
		<div class="section-full bg-white  p-t40 p-b70">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-head">
							<h3 class="h4 text-uppercase">Vehículos que tambien te pueden interesar</h3>

						</div>
						<div class="clearfix owl-carousel owl-btn-style-2 quick-look">
							@foreach ($related_products as $related_product)
								<div class="item">
										<div class="dlab-feed-list">
											<div class="dlab-media">
											<a href="new-car-search-result-column.html"><img src="{{ $related_product->photo->resource }}" alt=""></a>
											</div>
											<div class="dlab-info">
												<h4 class="dlab-title"><a href="new-car-search-result-column.html">{{ $related_product->name}} </a></h4>
												<div class="dlab-separator bg-black"></div>
												@if($related_product->price != 0)
													@if ($related_product->promotion_available)
														<p class="dlab-price"><del>${{ $related_product->price }}</del> <span class="text-primary">${{ $related_product->price_promotion }}</span></p>
													@else
													<p class="dlab-price"><span class="text-primary">${{ $related_product->price }}</span></p>
													@endif
												@endif
											</div>
											<!--div class="icon-box-btn text-center">
												<ul class="clearfix">
													<li>2019</li>
													<li>Manual</li>
													<li>210 hp </li>
												</ul>
											</div-->
										</div>
								</div>
							@endforeach

							{{-- <div class="item">
								<div class="dlab-feed-list">
									<div class="dlab-media">
										<a href="new-car-search-result-column.html"><img src="https://dl.dropboxusercontent.com/s/tnq5joxxn6vha52/1581442814-1581442814.png?dl=0" alt=""></a>
									</div>
									<div class="dlab-info">
										<h4 class="dlab-title"><a href="new-car-search-result-column.html">City Bus 777 </a></h4>
										<div class="dlab-separator bg-black"></div>
										<p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
									</div>
									<!--div class="icon-box-btn text-center">
										<ul class="clearfix">
											<li>2019</li>
											<li>Manual</li>
											<li>210 hp </li>
										</ul>
									</div-->
								</div>
							</div>
							<div class="item">
								<div class="dlab-feed-list">
									<div class="dlab-media">
										<a href="new-car-search-result-column.html"><img src="https://dl.dropboxusercontent.com/s/tnq5joxxn6vha52/1581442814-1581442814.png?dl=0" alt=""></a>
									</div>
									<div class="dlab-info">
										<h4 class="dlab-title"><a href="new-car-search-result-column.html">City Bus 777 </a></h4>
										<div class="dlab-separator bg-black"></div>
										<p class="dlab-price"><del>$ 20.00.</del> <span class="text-primary">$ 21.000</span></p>
									</div>
									<!--div class="icon-box-btn text-center">
										<ul class="clearfix">
											<li>2019</li>
											<li>Manual</li>
											<li>210 hp </li>
										</ul>
									</div-->
								</div>
							</div>
							<div class="item">
								<div class="dlab-feed-list">
									<div class="dlab-media">
										<a href="new-car-search-result-column.html"><img src="images/our-work/work/pic4.jpg" alt=""></a>
									</div>
									<div class="dlab-info">
										<h4 class="dlab-title"><a href="new-car-search-result-column.html">City Bus 777 </a></h4>
										<div class="dlab-separator bg-black"></div>
										<p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
									</div>
									<div class="icon-box-btn text-center">
										<ul class="clearfix">
											<li>2019</li>
											<li>Manual</li>
											<li>210 hp </li>
										</ul>
									</div>
								</div>
							</div> --}}
						</div>
					</div>
				</div>

			</div>
		</div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="car-details" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <br>
      <iframe width="100%" height="480" class="video-youtube" id="product-perfil_video" src="" allowfullscreen="true"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
<link rel="stylesheet" type="text/css" href="/wings/plugins/imagegallery/css/lightgallery.css"> 
@stop
@section('plugins-js')
  <script src="/wings/js/product_perfil.js"></script>

@stop
