<div class="container margin_60_35 "style="border-top: double #dfa01b; border-bottom: double #dfa01b; padding-bottom: 20px; font-family: 'fira_sans_regular', sans-serif;">
		<div class="owl-carousel owl-theme products_carousel " >
				@foreach ($categories as $category)

					

					<div class="item owl-item-card" style="background-color: #fff;">
						<div class="grid_item mb-0 category_home" style=" height: 290px;">

							 <a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="img_container">
				<img src="{{ $category['icon'] }}" data-src="{{ $category['icon'] }}" alt="" class="lazy" style=" border-radius: 30px; ">
					<h6 style="color: black; padding:15px; ">{{$category['name']}}</h6>
				</a>
						</div>

					
						
					</div>




				@endforeach
				<!-- /item -->
			</div>
			<!-- /products_carousel -->

		<!--/banners_grid -->
	</div>

	<div class="container   text-center"  style="border-bottom: double var(--main-bg-color-terciario);">
	<div class="row">
		<div class="col-md-12">
					
				
								
								<div class="banner_info">
									<h4 style="margin-bottom: 0px;"><a href="{{ isset( $banners[0]->link) ? $banners[0]->link:  '' }}" style="font-family: 'fira_sans', sans-serif;">{!! isset( $banners[1]->title) ? $banners[1]->title:  ''  !!}</a></h4>
									
								</div>
				
				</div>
	
		
	</div>
</div>

{{--
<div class="container   text-center"  >
	<div class="row">
		<div class="col-md-4" style="   height: 55vh;
    display: flex;
    align-items: center;
    justify-content: center;">
					
				
					<img src="template_1/img/archive.jpg" width="350px">			
								
				
				</div>

				@foreach($catalogs as $value)
				<div class="col-md-2" style="padding: 25px;">
					
				
					<a href="{{$value->link}}" target="_blank"><img src="{{$value->image_desktop}}" width="100%"></a>			
								
				
				</div>
				@endforeach

				

				
	
		
	</div>
</div> --}}


			

<div class="container   text-center"  >
				<div class="row">
				<div class="col-md-3  d-none d-lg-block" style="    ">
					
				
					<img src="template_1/img/archive.jpg"  style="padding-top: 110px; display: flex; align-items: center;justify-content: center;" width="250px">			
								
				
				</div>

				<div class="col-lg-9 col-ms-12">
					<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					@foreach($catalogs as $value)
					<div class="item">
						
					
						<a href="{{$value->link}}" target="_blank">
							<img src="{{$value->image_desktop}}" width="100%" style="height: 240px;"></a>			
									
					
					</div>
					@endforeach
					</div>
				
				</div><!-- /carousel -->

				<a class="phone_top"><strong><span><a href="/libros" class="btn_1" style="margin-bottom: 20px;">VER MÁS</a></span></strong></a>
				</div>

			
			</div><!-- /container -->
		</div>