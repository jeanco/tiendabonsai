	
@if(count($secction_promotions)>0)
{{--<div class="featured lazy header_desktop" data-bg="url({{ $secction_promotions[0]->image }})">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.22)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
						<h3>{!! $secction_promotions[0]->title !!}</h3>
							<p></p>
							<div class="feat_text_block">
								
							@if($secction_promotions[0]->link_text)
							<a class="btn_1" href="{{ $secction_promotions[0]->link }}" role="button">{{ $secction_promotions[0]->link_text }}</a>
							@else
							@endif
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- /featured -->


		<div id="carousel-home" class="header_desktop" style="padding-top: 80px;">
			<div class="owl-carousel owl-theme">
				@foreach ($secction_promotions as $key => $banner)
				<div class="owl-slide cover" 
				style="	background:url('{{ $banner['image'] }}');">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
						<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
						<h3>{!! $banner->title !!}</h3>
							<p></p>
							<div class="feat_text_block">
								{{--<div class="price_box">
									<span class="new_price">$90.00</span>
									<span class="old_price">$170.00</span>
								</div> --}}
							@if($banner->link_text)
							<a class="btn_1" href="{{ $banner->link }}" role="button">{{ $banner->link_text }}</a>
							@else
							@endif
							
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

		<div class="featured lazy header_movil" data-bg="url({{ $secction_promotions[0]->image_thumb }})">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.22)">
				<div class="container ">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
						<h3>{!! $secction_promotions[0]->title !!}</h3>
							<p></p>
							<div class="feat_text_block">
								{{--<div class="price_box">
									<span class="new_price">$90.00</span>
									<span class="old_price">$170.00</span>
								</div> --}}
							@if($secction_promotions[0]->link_text)
							<a class="btn_1" href="{{ $secction_promotions[0]->link }}"  role="button">{{ $secction_promotions[0]->link_text }}</a>
							@else
							@endif
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@else
@endif
