
<div class="container margin_60_35 add_bottom_30">

		<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px">Te brindamos Productos de Alta Calidad</h2>
		</div>
		<ul id="banners_grid" class="clearfix">
			@foreach ($categories as $category)
			<li>
			    <a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=" class="img_container">
				<img src="{{ $category['icon_white'] }}" data-src="{{ $category['icon_white'] }}" alt="" class="lazy">
					<div class="short_info opacity-mask" >
						<h3>{{-- $category['name'] --}}</h3>
						<div><span class="btn_1">Ver Productos</span></div>
					</div>
				</a>
			</li>
			@endforeach
			{{--
			<li>
				<a href="index.html#0" class="img_container">
					<img src="/template_11/img/banners_cat_placeholder.jpg" data-src="/template_11/img/banner_2.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Womens's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="index.html#0" class="img_container">
					<img src="/template_11/img/banners_cat_placeholder.jpg" data-src="/template_11/img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Kids's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="index.html#0" class="img_container">
					<img src="/template_11/img/banners_cat_placeholder.jpg" data-src="/template_11/img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Kids's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="index.html#0" class="img_container">
					<img src="/template_11/img/banners_cat_placeholder.jpg" data-src="/template_11/img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Kids's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="index.html#0" class="img_container">
					<img src="/template_11/img/banners_cat_placeholder.jpg" data-src="/template_11/img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Kids's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			--}}
		</ul>
		<!--/banners_grid -->



	</div>
