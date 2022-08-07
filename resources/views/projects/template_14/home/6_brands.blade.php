@if(count($agreetments)>0)

<div class="main_title">
				<h2 style="padding-top: 35px">Ellos confían en nosotros</h2>
			</div>
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					@foreach ($agreetments as $agreetment)
					<div class="item">
						<a href="index.html#0"><img src="{{$agreetment->image}}" data-src="{{$agreetment->image}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					@endforeach
					{{--<div class="item">
						<a href="index.html#0"><img src="/template_14/img/brands/placeholder_brands.png" data-src="/template_14/img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="index.html#0"><img src="/template_14/img/brands/placeholder_brands.png" data-src="/template_14/img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="index.html#0"><img src="/template_14/img/brands/placeholder_brands.png" data-src="/template_14/img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="index.html#0"><img src="/template_14/img/brands/placeholder_brands.png" data-src="/template_14/img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="index.html#0"><img src="/template_14/img/brands/placeholder_brands.png" data-src="/template_14/img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item --> --}}
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->


@else
@endif

