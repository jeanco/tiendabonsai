{{--<div class="top_banner header_desktop">
	                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
	                        <div class="container pl-lg-5">
	                            <!--div class="breadcrumbs">
	                                <ul>
	                                    <li><a href="/">Inicio</a></li>
	                                    <li>Catálogo</li>
	                                </ul>
	                            </div-->
	                            <h1>{!! $simple_banner['title'] !!}</h1>
	                        </div>
	                    </div>
	                    <img src="{{ $simple_banner['image'] }}" class="img-fluid" alt="">
	                </div>

<div class="top_banner header_movil"  style="height: 300px !important;">
	                    
	                    <img src="{{ $simple_banner['image_thumb'] }}" class="img-fluid" alt="" style="height: auto !important;
    width: 100% !important;">
	                </div>--}}



	                <div id="carousel-home" class="header_desktop">
			<div class="owl-carousel owl-theme">
				@foreach ($banners as $key => $banner)
				<div class="owl-slide cover" style="background-image: url({{ $banner['image'] }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-right white">
										<h2 class="owl-slide-animated owl-slide-title">{!! $banner['title'] !!}</h2>
											<p class="owl-slide-animated owl-slide-subtitle">
												{{ $banner['subtitle'] }}
											</p>
										<!-- <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{ $banner['link'] }}" target="_blank" role="button">{{ $banner['link_text'] }}</a></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div id="icon_drag_mobile"></div>
</div>

<div id="carousel-home" class="header_movil">
			<div class="owl-carousel owl-theme">
				@foreach ($banners as $key => $banner)
				<div class="owl-slide cover" style="background-image: url({{ $banner['image_thumb'] }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-right white">
									<h2 class="owl-slide-animated owl-slide-title">{!! $banner['title'] !!}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											{{ $banner['subtitle'] }}
										</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{ $banner['link'] }}" target="_blank" role="button">{{ $banner['link_text'] }}</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div id="icon_drag_mobile"></div>
</div>



		<!--/carousel-->
<script type="text/javascript">


</script>
