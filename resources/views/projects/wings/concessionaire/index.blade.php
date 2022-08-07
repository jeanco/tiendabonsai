@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url(  {{ isset( $gallery_company[9]->resource) ? $gallery_company[9]->resource:  ''  }} ) ">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Ubica a Nuestros Concesionarios</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/win-inicio">Inicio</a></li>
                <li>Concesionarios</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1">
      <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-md-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3792.815780492028!2d-70.29920348544324!3d-18.080080988117434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f39eaf49489191d!2sZOFRATACNA!5e0!3m2!1ses!2spe!4v1581442037946!5m2!1ses!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.3825624477!2d75.65046970649679!3d26.88544791796718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C+Rajasthan!5e0!3m2!1sen!2sin!4v1500819483219" style="border:0; width:100%; height:450px;" allowfullscreen></iframe> --}}
                </div>
                <!-- Left part END -->
      <!-- right part start -->
                <div class="col-md-5">
                  @foreach ($companies as $company)
                  <div class="icon-bx-wraper bx-style-1 p-a30">
                      <div class="icon-content">
                      <h5 class="dlab-tilte text-uppercase" style="font-weight: 600;">{{ $company->name_company }}</h5>
                        <p>
                          {{ $company->address }}<br>
                          CEL:{{ $company->cel }}<br>
                          Descripción: {{ $company->description_company }}<br>
                        </p>
                      </div>
                    </div>
                  @endforeach
                  {{-- <div class="icon-bx-wraper bx-style-1 p-a30">
                    <div class="icon-content">
                      <h5 class="dlab-tilte text-uppercase" style="font-weight: 600;">AUTOESPAR COMAS</h5>
                      <p>
                        Av. Tupac Amaru 1495<br>
                        TEL:(01) 536-6009<br>
                      </p>
                    </div>
                  </div>
                  <div class="icon-bx-wraper bx-style-1 p-a30">
                    <div class="icon-content">
                      <h5 class="dlab-tilte text-uppercase" style="font-weight: 600;">AUTOESPAR ICA</h5>
                      <p>
                        Av. Panamericana Sur Km 300.5<br>
                        TEL:(056) 258-356<br>
                        Horario: B&P L -V: 8am - 5 45 pm S: 8 30am - 12 45 pm<br>
                      </p>
                    </div>
                  </div> --}}
                </div>
                <!-- right part END -->
            </div>
        </div>
    </div>
    <!-- contact area  END -->
    <!-- contact area  END -->
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
