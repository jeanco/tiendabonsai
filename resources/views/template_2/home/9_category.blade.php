<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px">Te brindamos servicios</h2>
			</div>
		{{--<ul id="banners_grid" class="clearfix">
			@foreach ($services as $service)
			<li>
			    <a href="/servicios/{{ $service->slug }}" class="img_container">
				<img src="{{ $service->image}}" data-src="{{ $service->image }}" alt="" class="lazy" style="">
					<div class="short_info opacity-mask" >
						<h3 style="color:white;">{{ $service->name }}</h3>
						<div><span class="btn_1">Ver Servicio</span></div>
					</div>
				</a>
			</li>
			@endforeach
		

		</ul>--}}
		<!--/banners_grid -->

		 <div class="bg_white" style="background: #28b6ac;">
    <div class="container py-5">
      <!-- Servicio 1 -->
      <div class="row justify-content-between">
      @foreach ($services as $key => $service)
									

		 
        <div class="col-md-3 text-center">
          <a href="/servicios/{{ $service->slug }}"><img src="{{ isset( $service->image) ? $service->image:  ''  }}" alt="" style="    max-height: 100px;
    padding: 15px;"></a>
          <div class="font-weight-bold mb-2" style=" font-size: 25px; line-height: 1.2;">
            <a href="/servicios/{{ $service->slug }}" style="color: white !important;">{{ $service->name }}</a>
          </div>
          
        </div>
        {{--<div class="col-md-6">
          <div style="font-size: 16px; line-height: 1.2;">
            {!!$service->description !!}
          </div>
        </div>--}}
      
      
      <!--hr class="my-4" style="color: #cdcdcd;"-->
							@endforeach
              </div>


    </div>
  </div>
