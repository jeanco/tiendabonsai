	<div class="container margin_60_35 add_bottom_30">
		<div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 20px;"><b>Lo más vendido en {{ $company_main->business_name }}</b></div>
	<ul id="banners_grid" class="clearfix">
			@foreach($secction_promotions as $key => $promotions)
				@if($key == 0)

				@else
				<li>
				<a href="{{ isset( $promotions->link) ? $promotions->link:  ''  }}" class="img_container">
					<img src="{{ isset( $promotions->image) ? $promotions->image:  ''  }}" data-src="{{ isset( $promotions->image_thumb) ? $promotions->image_thumb:  ''  }}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
						<h3>{!! isset( $promotions->title) ? $promotions->title:  ''  !!}</h3>
						<div><span class="btn_1">{{ isset( $promotions->link_text) ? $promotions->link_text:  ''  }}</span></div>
					</div>
				</a>
				</li>
				@endif

			

			@endforeach
			
			<!--li>
				<a href="index.html#0" class="img_container">
					<img src="/template_4/img/banners_cat_placeholder.jpg" data-src="/template_4/img/banner_2.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Womens's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="index.html#0" class="img_container">
					<img src="/template_4/img/banners_cat_placeholder.jpg" data-src="/template_4/img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Kids's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li-->
		</ul>
		<!--/banners_grid -->
	</div>