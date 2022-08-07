<div class="header_desktop">
	<div class="carousel_img_banner owl-carousel">
		@foreach ($banners as $key => $banner)
			<div>
				<a href="{{ $banner['link'] }}" target="_blank"><img src="{{ $banner['image'] }}" alt=""></a>
			</div>
		@endforeach
	</div>
</div>
<div class="header_movil">
	<div class="carousel_img_banner owl-carousel">
		@foreach ($banners as $key => $banner)
			<div>
				<a href="{{ $banner['link'] }}" target="_blank"><img src="{{ $banner['image_thumb'] }}" alt=""></a>
			</div>
		@endforeach
	</div>
</div>
