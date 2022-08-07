<!-- About Us -->
<div class="section-full about-us bg-white content-inner-2" style="background-image: url({{ isset( $gallery_company[0]->resource) ? $gallery_company[0]->resource:  ''  }}); background-position:bottom; background-repeat:no-repeat; background-size:100%;">
  <div class="container">
    <div class="section-head text-center head-1">
      <span>Bienvenidos a</span>
      <h3 class="h3 text-uppercase">WINGS</h3>
      <div class="dlab-separator bg-gray-dark"></div>
      <!--h3>Conosca los beneficios que ofrecemos</h3-->
    </div>
    {{-- <div class="row">
      @foreach ($values as $key =>  $value)
      <div class="col-md-3 col-sm-6  col-xs-6">
          <div class="dlab-box-bg m-b30 box-hover" style="background-image: url(/wings/images/our-work/work/pic1.jpg)">
            <div class="icon-bx-wraper center p-lr20 p-tb30">
              <div class="text-info m-b20">
              <img src="{{ $value->image_thumb }}" alt="" style="height: 100px;">
                <!--span class="icon-cell">
                  <i class="glyph-icon flaticon-steering-wheel"></i>
                </span--> 
              </div>
              <div class="icon-content">
                <h4 class="dlab-tilte text-uppercase">{{ $value->title }}
                </h4>
                <p>...</p>
              </div>
            </div>
            <!--div class="icon-box-btn text-center">
              <a href="#" class="site-button btn-block">Leer más</a>
            </div-->
          </div>
      </div>
      @endforeach

    </div> --}}
  </div>
  <div class="dlab-info-about">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="">
            <h3 class="h3 text-uppercase m-b10 m-t0">Nosotros </h3>
          </div>
          <div class="about-us-info">
            <p>Somos una empresa que ofertamos vehículos económicos, de alto rendimiento, con servicio técnico garantizado y repuestos originales. Buscamos la preservación del medio ambiente. En Wings trabajamos con: Eficacia, innovación y responsabilida</p>
            <div class="media media-info">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="/wings/images/testimonials/pic2.jpg" alt="">
                </a>
              </div>
              <div class="media-body p-l15">
                <h4 class="font-weight-700 text-uppercase text-info m-b10">Quiere consultar ?</h4>
                <h2 class="media-heading open-sans font-weight-700">{{ $company['phone'] }}</h2>
              </div>
            </div>
            <div class="m-t30">
              <a href="/nosotros" class="site-button">Leer Más</a>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="about-side-img wow fadeInRight text-center" data-wow-duration="1.50s" data-wow-delay="0.50s">
            <img src="{{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }}" style="width: 500px;" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Us END -->
