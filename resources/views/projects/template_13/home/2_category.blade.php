<div class="container margin_60_35 ">
<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px">Te brindamos Productos de Alta Calidad</h2>
			</div>

		<div class="owl-carousel owl-theme products_carousel " >
				@foreach ($categories as $category)

					

					<div class="item owl-item-card" style="background-color: #fff;">
						<div class="grid_item mb-0 category_home" style="">

							 <a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="img_container">
				<img src="{{ $category['image'] }}" data-src="{{ $category['image'] }}" alt="" class="lazy" style=" border-radius: 30px;  ">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)" style="padding-top: 50px;     border-radius: 30px;">
						<h3 style="color: white; font-size: 25px;">{{$category['name']}}</h3>
						<div style="    padding: 50px 25px 0px 25px; "><span class="btn_1" style="width: 100%;">Ver más</span></div>
					</div>
				</a>
						</div>

					
						
					</div>
				@endforeach
				<!-- /item -->
			</div>
			<!-- /products_carousel -->


		{{--<ul id="banners_grid" class="clearfix">
			@foreach ($categories as $category)
			<li>
			    <a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="img_container">
				<img src="{{ $category['image'] }}" data-src="{{ $category['image'] }}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)" >
						<h3 style="color: white;">{{$category['name']}}</h3>
						<div><span class="btn_1">Ver Productos</span></div>
					</div>
				</a>
			</li>
			@endforeach				
		
		</ul>--}}
		<!--/banners_grid -->
	</div>