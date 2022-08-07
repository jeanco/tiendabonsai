@extends('template_2.layouts.index')
@section('content')
<main class="font-template">
  <div class="top_banner general" style="height: 230px;">
			<div class="opacity-mask d-flex align-items-md-center" >
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center">
							<div class="text-white font-weight-bold mb-4" style="font-size: 3.5rem; line-height: 1;"></div>
							<div class="text-white" style="font-size: 16px; line-height: 1.2;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="{{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }}" class="img-fluid" alt="" style="height: 100%;">
	</div>
  <div class="bg_white" >
    <div class="container py-5">
      <!-- Servicio 1 -->
      <div class="row">
      	<div class="col-md-4 " style="color: white !important; background:var(--main-bg-color-primario); padding: 50px; height:300px;">
          <span class="ti-headphone-alt"></span>
         <h3 class="font-weight-bold mb-4 " style="color:white;">EMERGENCIAS</h3>
         <p style="font-size:25px; font-weight:bold;">{{ $company_main->cel }}</p>
          
        </div>
        <div class="col-md-4 " style="color: white !important; background:#0f6c65; padding: 50px; height:300px;">
          <span class="ti-calendar"></span>
         <h3 class="font-weight-bold mb-4 " style="color:white;">CITA CON EL MÉDICO</h3>
          <a class="btn_1" href="{{ $company_main->whatsapp }}" target="_blank" role="button" style="margin-top: 20px;">HACER UNA CITA</a>
        </div>
        <div class="col-md-4 " style="color: white !important; background:var(--main-bg-color-primario); padding: 50px; height:300px;">
          <span class="ti-email"></span>

          @php

          $schedules_array = [];

            $schedules = explode(',', $company_main->schedule);

            foreach ($schedules as $i => $schedule) {
              $schedules_array[] = $schedule;
            }

          @endphp
         <h3 class="font-weight-bold mb-4 " style="color:white;">CONSULTAS</h3>
         {{--@foreach($schedules_array as $schedule)
                <p>{{ $schedule }} </p> 
                 
                @endforeach--}}

                <p>{{ $company_main->email}}</p>
        </div>
      	
      </div>

    

    </div>
  </div>
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
