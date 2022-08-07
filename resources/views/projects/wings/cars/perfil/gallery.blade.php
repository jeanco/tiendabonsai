@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(/wings/img/head5.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">{{-- $product->name --}}</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li><a href="/catalogo">Vehículos</a></li>
                <li>Detalle de vehículo</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->

    <div class="car-details-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
            <div class="nav">
              <ul>
                <li ><a href="/productos/{{ $product->slug }}">Detalles</a></li>
                <li ><a href="/especificaciones/{{ $product->slug }}">Especificaciones</a></li>
                <li class="active"><a href="/galeria-automoviles/{{ $product->slug }}">Galería</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-full p-t50 bg-white content-inner-1" >
			<div class="section-head text-center head-1">
				<h3 class="h3">Nuestra galería de imágenes</h3>
			</div>
			<div class="site-filters clearfix center m-b40">
				<ul class="filters" data-toggle="buttons">
					{{-- <li data-filter="" class="btn active">
						<input type="radio">
						<a href="car-detail-pictures.html#" class="site-button-secondry active"><span>Todas las imágenes</span></a>
					</li> --}}

					@foreach ($gallery_types as $key => $gallery_type)

						@if ($key == 0)
							<li data-filter="" class="btn">
								<input type="radio" >
								<a href="car-detail-pictures.html#" class="site-button-secondry"><span>{{ $gallery_type->name }}</span></a>
							</li>
						@else
							<li data-filter="{{ $gallery_type->slug }}" class="btn">
								<input type="radio" >
								<a href="car-detail-pictures.html#" class="site-button-secondry"><span>{{ $gallery_type->name }}</span></a>
							</li>

						@endif

					@endforeach

					{{-- <li data-filter="exterior" class="btn">
						<input type="radio">
						<a href="car-detail-pictures.html#" class="site-button-secondry"><span>Exterior</span></a>
					</li>
					<li data-filter="road-test" class="btn">
						<input type="radio">
						<a href="car-detail-pictures.html#" class="site-button-secondry "><span>En tránsito</span></a>
					</li> --}}
				</ul>
			</div>
            <div class="container-fluid">
                <div class="row car-gallery masonry" id="lightgallery">

					@foreach ($gallery_types as $key => $gallery_type)
						@foreach ($gallery_type->contents as $content)
							@if ($key == 0)
								<a href="{{ $content->resource }}" class="card-container col-md-4 col-sm-4 col-xs-6">
									<img src="{{ $content->resource }}" alt=""/>
								</a>
							@else
								<a href="{{ $content->resource }}" class="card-container col-md-4 col-sm-4 col-xs-6 {{ $gallery_type->slug }}">
									<img src="{{ $content->resource }}" alt=""/>
								</a>

							@endif

							@endforeach
					@endforeach

					{{-- <a href="/wings/img/autos/1.jpg" class="card-container col-lg-2 col-md-col-md-4 col-sm-4 col-xs-6 exterior">
						<img src="/wings/img/autos/1.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/2.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 exterior">
						<img src="/wings/img/autos/2.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/3.jpg" class="card-container col-md-4 col-sm-4 col-xs-6  exterior">
						<img src="/wings/img/autos/3.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/4.png" class="card-container col-md-4 col-sm-4 col-xs-6 interior">
						<img src="/wings/img/autos/4.png" alt=""/>
					</a>
					<a href="/wings/img/autos/5.png" class="card-container col-md-4 col-sm-4 col-xs-6 exterior">
						<img src="/wings/img/autos/5.png" alt=""/>
					</a>
					<a href="/wings/img/autos/6.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 interior">
						<img src="/wings/img/autos/6.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/7.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 interior">
						<img src="/wings/img/autos/7.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/8.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 interior">
						<img src="/wings/img/autos/8.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/9.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 road-test">
						<img src="/wings/img/autos/9.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/10.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 road-test">
						<img src="/wings/img/autos/10.jpg" alt=""/>
					</a>
					<a href="/wings/img/autos/11.jpg" class="card-container col-md-4 col-sm-4 col-xs-6 road-test">
						<img src="/wings/img/autos/11.jpg" alt=""/>
					</a> --}}


				</div>
            </div>
        </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="car-details" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <br>
      <iframe width="100%" height="480" class="video-youtube" id="product-perfil_video" src="" allowfullscreen="true"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
<link rel="stylesheet" type="text/css" href="/wings/plugins/imagegallery/css/lightgallery.css"/>
@stop
@section('plugins-js')
  <script  src="/wings/js/magnific-popup.js"></script>
<!-- magnific-popup js -->
<script  src="/wings/js/waypoints-min.js"></script>
<!-- waypoints js -->
<script  src="/wings/js/counterup.min.js"></script>
<!-- counterup js -->
<script src="/wings/js/imagesloaded.js"></script>
<!-- masonry  -->
<script src="/wings/js/masonry-3.1.4.js"></script>
<!-- masonry  -->
<script src="/wings/js/masonry.filter.js"></script>
<!-- masonry  -->
<script  src="/wings/js/owl.carousel.js"></script>
<!-- OWL  Slider  -->
<script src="plugins/rangeslider/rangeslider.js" ></script>
<!-- rangeslider fuctions -->
<script src="/wings/js/jquery.searchable-1.0.0.min.js"></script>
<!-- searchable fuctions -->
<script src="/wings/plugins/imagegallery/js/lightgallery.js"></script>
<script src="/wings/plugins/imagegallery/js/lg-thumbnail.js"></script>
<!-- lightgallery fuctions  -->
<script  src="/wings/js/custom.min.js"></script>
<!-- custom fuctions  -->
<script  src="/wings/js/dz.carousel.min.js"></script>
<!-- sortcode fuctions  -->
<script  src="/wings/js/dz.ajax.js"></script>
  <script>
	lightGallery(document.getElementById('lightgallery'));
</script>

@stop
