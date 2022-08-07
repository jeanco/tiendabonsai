<section class="slide v2" style="top: -50px;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row top-row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="single-item js-banner">
            @foreach($covers as $key => $cover)
            <div class="slide-img">
              <img style=" width: 100%; height: 260px; object-fit: cover; filter: brightness(70%);" src="{{ $cover->image }}" alt="images" class="img-reponsive" width="100%" height="500">
              <div class="slide-content">
                <!-- <h5 class="brand">Antención dental</h5> -->
                <h3><span class="strong">{!! $cover->title !!}</span></h3>
                <!-- <p>Oferta especial</p> -->
              </div>
              <a href="{{ $cover->link }}" class="slide-button">Comprar Ahora</a>
            </div>
            @endforeach
<!--             <div class="slide-img">
              <img style=" width: 100%; height: 250px; object-fit: cover; filter: brightness(70%);" src="website/img/slider/image-slider1.jpg" alt="images" class="img-reponsive" width="100%" height="500">
              <div class="slide-content">
                <h5 class="brand">Antención dental</h5>
                <h3><span class="strong">¡Solo por hoy!</span></h3>
                <p>Oferta especial</p>
              </div>
              <a href="index.html#" class="slide-button">Comprar Ahora</a>
            </div>
            <div class="slide-img">
              <img style=" width: 100%; height: 250px; object-fit: cover; filter: brightness(70%);" src="website/img/slider/image-slider1.jpg" alt="images" class="img-reponsive" width="100%" height="500">
              <div class="slide-content">
                <h5 class="brand">Antención dental</h5>
                <h3><span class="strong">¡Solo por hoy!</span></h3>
                <p>Oferta especial</p>
              </div>
              <a href="index.html#" class="slide-button">Comprar Ahora</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>