@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url( {{ isset( $gallery_company[3]->resource) ? $gallery_company[3]->resource:  ''  }});">
    <div class="auto-container">
        <h1>Servicios</h1>
    </div>
</section>
<!--End Page Title-->
<!--Services Section Two-->
<style type="text/css">
  .image_left{
   /* height: 300px;
  width: 300px;*/
  position: relative;
  overflow: hidden;
  /*background: url(http://placekitten.com/g/300/300);*/
  }
  .image_left:after {
  content: "";
  position: absolute;
  top: -20%;
  left: 96%;
  height: 180%;
  width: 150%;
  background: #232323;
  -webkit-transform: rotate(-5deg);
  -moz-transform: rotate(-5deg);
  transform: rotate(-5deg);
}
 .image_right{
   /* height: 300px;
  width: 300px;*/
  position: relative;
  overflow: hidden;
  /*background: url(http://placekitten.com/g/300/300);*/
  }
.image_right:after {
  content: "";
  position: absolute;
  top: -20%;
  right: 96%;
  height: 180%;
  width: 150%;
  background: white ;
  -webkit-transform: rotate(5deg);
  -moz-transform: rotate(5deg);
}
.inner-column{
  padding: 100px;
}


@media (max-width: 768px) {
    .inner-column{
  padding: 50px 10px 30px 10px;
}
.image_right:after {
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
}

.image_left:after {
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
}

}

</style>


@foreach($services as $key => $service)

  @if($key%2==0)
        <section class="">

          <div class="row align-items-center ">
              <!--Image Column-->
              <div class="col-md-6">
                <div class="inner-column" >
                        <div class="sec-title mb-4">
                          <h2 >{{ $service['name'] }}</h2>
                        </div>
                        <div class="text">
                         {!! $service['description'] !!}
                        </div>
                    </div>
              </div>
              <div class="col-md-6 image_right" >
                <img data-id="" src="{{ $service->image }}" alt="" style="width: 100%" />
              </div>
              

              
            </div>

    </section>
  @else
  <section class="">

          <div class="row align-items-center " style="background: #232323;">
              <!--Image Column-->

              <div class="col-md-6 image_left" >
                <img data-id="" src="{{ $service->image }}" alt=""  style="width: 100%" />
              </div>
              <div class="col-md-6">
                <div class="inner-column">
                        <div class="sec-title mb-4">
                          <h2 style="color: white !important ;">{{ $service['name'] }}</h2>
                        </div>
                        <div class="text">
                         {!! $service['description'] !!}
                        </div>
                    </div>
              </div>

              
            </div>

    </section>
  @endif
@endforeach

{{--

<section class="services-section-two py-5">
  <div class="auto-container">
      <div class="row align-items-center clearfix p-4">
          <!--Image Column-->
          <div class="image-column col-md-4 col-sm-12 col-xs-12 mb-0">
              <div class="image">
                  <img src="{{ $service['image'] }}" alt="" style="border-radius: 0.25em;"/>
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12 py-2">
                <div class="inner-column">
                    <div class="sec-title mb-4">
                      <h2>{{ $service['name'] }}</h2>
                    </div>
                    <div class="text">
                      {!! $service['description'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End Services Section Two-->
<!--Services Section Three-->
<section class="services-section-three">
    <div class="auto-container">
        <div class="row align-items-center clearfix bg_white p-4" style="border-radius: 0.25em;">
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12 py-2">
                <div class="inner-column">
                    <div class="sec-title mb-4">
                      <h2>TALLER</h2>
                    </div>
                    <div class="text">
                      <p>Ofrecemos a nuestros clientes los mejores estándares de calidad, además de estar respaldado por un grupo humano altamente calificado, con experiencia y en constante capacitación.</p>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-md-4 col-sm-12 col-xs-12">
              <div class="image">
                  <img src="http://www.jmautomotriz.com/wp-content/uploads/2019/01/servicios2.jpg" alt="" style="border-radius: 0.25em;"/>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Section Three-->
<!--Services Section Two-->
<section class="services-section-two py-5">
  <div class="auto-container">
      <div class="row align-items-center clearfix p-4">
            <!--Image Column-->
            <div class="image-column col-md-4 col-sm-12 col-xs-12 mb-0">
                <div class="image">
                  <img src="http://www.jmautomotriz.com/wp-content/uploads/2019/01/servicios3.jpg" alt="" style="border-radius: 0.25em;"/>
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12 py-2">
                <div class="inner-column">
                    <div class="sec-title mb-4">
                      <h2>DIAGNÓSTICO COMPUTARIZADO</h2>
                    </div>
                    <div class="text">
                      <p>Ofrecemos el servicio de diagnóstico computarizado del vehículo utilizando scanners originales de alta tecnología para detectar fallos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Section Two-->
<!--Services Section Three-->
<section class="services-section-three">
    <div class="auto-container">
        <div class="row align-items-center clearfix bg_white p-4" style="border-radius: 0.25em;">

            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12 py-2">
                <div class="inner-column">
                    <div class="sec-title mb-4">
                      <h2>ALINEAMIENTO  Y BALANCEO</h2>
                    </div>
                    <div class="text">
                      <p>Este trabajo se desarrolla mediante un proceso electrónico el que tiene como resultado una  alineación exacta.</p>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-md-4 col-sm-12 col-xs-12">
              <div class="image">
                  <img src="http://www.jmautomotriz.com/wp-content/uploads/2019/01/servicios4.jpg" alt="" style="border-radius: 0.25em;"/>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Section Three-->
<!--Services Section Two-->
<section class="services-section-two py-5">
  <div class="auto-container">
      <div class="row align-items-center clearfix p-4">
          <!--Image Column-->
          <div class="image-column col-md-4 col-sm-12 col-xs-12 mb-0">
              <div class="image">
                  <img src="http://www.jmautomotriz.com/wp-content/uploads/2019/01/servicios5.jpg" alt="" style="border-radius: 0.25em;"/>
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12 py-2">
                <div class="inner-column">
                    <div class="sec-title mb-4">
                      <h2>HORNO PRESURIZADO</h2>
                    </div>
                    <div class="text">
                      <p>Ofrecemos el servicio de diagnóstico computarizado del vehículo utilizando scanners originales de alta tecnología para detectar fallos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
--}}
<!--End Services Section Two-->
<!--Services Section Three-->
<section class="services-section-three">
  <div class="auto-container">
      <!--Sec Title-->
        <div class="sec-title light centered">
          <h2 class="blog_title" style="border:none;">Beneficios</h2>
        </div>
        <div class="four-item-carousel owl-carousel owl-theme">

            <!--Services Block Five-->
            @foreach($values as $value)
            <div class="services-block-five">
                <a href="" class="value_description" data-index="{{ $value['id'] }}" data-toggle="modal" data-target="#benefit_info">
                  <div class="inner-box p-0" style="overflow-y: hidden;">
                      <div class="content-box p-4">
                          <div class="row py-2 justify-content-center mx-1">
                              <img src="{{ $value['image'] }}" alt="" style="width: 100px">
                          </div>
                          <div class="text benefit_title mt-2 mb-3 text_white">{{ $value['title'] }}</div>
                      </div>
                      <div class="overlay-box">
                          <div class="overlay-inner p-4">
                              <div class="row py-2 justify-content-center mx-1">
                                  <img src="{{ $value['image'] }}" alt="" style="width: 100px">
                              </div>
                              <div class="text benefit_title mt-2">{{ $value['title'] }}</div>
                          </div>
                      </div>
                  </div>
                </a>
            </div>
            @endforeach

            {{--
            <!--Services Block Five-->
            <div class="services-block-five">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#benefit_info">
                  <div class="inner-box p-0" style="overflow-y: hidden;">
                      <div class="content-box p-4">
                          <div class="row py-2 justify-content-center mx-1">
                              <img src="/images/benefits/benefit_2.png" alt="" style="width: 100px">
                          </div>
                          <div class="text benefit_title mt-2 mb-3 text_white">GESTOR AUTOMOTOR</div>
                      </div>
                      <div class="overlay-box">
                          <div class="overlay-inner p-4">
                              <div class="row py-2 justify-content-center mx-1">
                                  <img src="/images/benefits/benefit_2.png" alt="" style="width: 100px">
                              </div>
                              <div class="text benefit_title mt-2">GESTOR AUTOMOTOR</div>
                          </div>
                      </div>
                  </div>
                </a>
            </div>

            <!--Services Block Five-->
            <div class="services-block-five">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#benefit_info">
                  <div class="inner-box p-0" style="overflow-y: hidden;">
                      <div class="content-box p-4">
                          <div class="row py-2 justify-content-center mx-1">
                              <img src="/images/benefits/benefit_3.png" alt="" style="width: 100px">
                          </div>
                          <div class="text benefit_title mt-2 mb-3 text_white">ASESORÍA LEGAL</div>
                      </div>
                      <div class="overlay-box">
                          <div class="overlay-inner p-4">
                              <div class="row py-2 justify-content-center mx-1">
                                  <img src="/images/benefits/benefit_3.png" alt="" style="width: 100px">
                              </div>
                              <div class="text benefit_title mt-2">ASESORÍA LEGAL</div>
                          </div>
                      </div>
                  </div>
                </a>
            </div>

            <!--Services Block Five-->
            <div class="services-block-five">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#benefit_info">
                  <div class="inner-box p-0" style="overflow-y: hidden;">
                      <div class="content-box p-4">
                          <div class="row py-2 justify-content-center mx-1">
                              <img src="/images/benefits/benefit_4.png" alt="" style="width: 100px">
                          </div>
                          <div class="text benefit_title mt-2 mb-3 text_white">ASISTENCIA TÉCNICA</div>
                      </div>
                      <div class="overlay-box">
                          <div class="overlay-inner p-4">
                              <div class="row py-2 justify-content-center mx-1">
                                  <img src="/images/benefits/benefit_4.png" alt="" style="width: 100px">
                              </div>
                              <div class="text benefit_title mt-2">ASISTENCIA TÉCNICA</div>
                          </div>
                      </div>
                  </div>
                </a>
            </div>

            <!--Services Block Five-->
            <div class="services-block-five">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#benefit_info">
                  <div class="inner-box p-0" style="overflow-y: hidden;">
                      <div class="content-box p-4">
                          <div class="row py-2 justify-content-center mx-1">
                              <img src="/images/benefits/benefit_5.png" alt="" style="width: 100px">
                          </div>
                          <div class="text benefit_title mt-2 mb-3 text_white">CALL CENTER</div>
                      </div>
                      <div class="overlay-box">
                          <div class="overlay-inner p-4">
                              <div class="row py-2 justify-content-center mx-1">
                                  <img src="/images/benefits/benefit_5.png" alt="" style="width: 100px">
                              </div>
                              <div class="text benefit_title mt-2">CALL CENTER</div>
                          </div>
                      </div>
                  </div>
                </a>
            </div>
            --}}
        </div>
    </div>
</section>
<!--End Services Section Three-->
@include('template_8.services.benefit_modal')

@stop
@section('plugins-css')
@stop
@section('plugins-js')
  <script type="text/javascript">

    $(`.value_description`).on('click', function(e){
      e.preventDefault();
      let _id = $(this)[0].dataset.index;
      axios.get(`/api/template_8/value/${_id}`)
        .then((response) => {
          $(`#value_title`).html(response.data.title);
          $(`#value_description`).html(response.data.description);
          $(`#benefit_info`).modal('show');
      });
    });

    // getElement(`.value_description`)
    //   .addEventListener('click', (e) => {
    //     e.preventDefault();
    //     console.log("dawda");
    //     let _id = $(this)[0].dataset.index;
    //     axios.get(`/api/template_8/value/${_id}`)
    //       .then((response) => {
    //         console.log(response.data);
    //       });
    //   });

  </script>
@stop
