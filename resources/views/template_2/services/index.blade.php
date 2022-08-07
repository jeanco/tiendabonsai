@extends('template_2.layouts.index')
@section('content')
<main class="font-template">
  <div class="top_banner general" style="height: 230px;">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.46)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center">
							<div class="text-white font-weight-bold mb-4" style="font-size: 3.5rem; line-height: 1;">{{ $company_main->name_company }}<br>está a tu servicio</div>
							<div class="text-white" style="font-size: 16px; line-height: 1.2;">
                Brindando gran variedad de servicios y un buena atención al público, entre otros.
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="{{ isset( $gallery_company[0]->resource) ? $gallery_company[0]->resource:  ''  }}" class="img-fluid" alt="" style="height: 100%;">
	</div>
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
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
