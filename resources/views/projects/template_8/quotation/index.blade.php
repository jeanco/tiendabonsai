@extends('template_8.layouts.index')
@section('content')
<div class="p-0 bg_quot">
  <!--News Section-->
  <section class="pt-5">
    <div class="auto-container">
        <!--Sec Title-->
          <div class="sec-title centered">
            <h2 style="border: none;">Solicite una cotización</h2>
          </div>
          <div class="row clearfix">
            <!--News Block-->
            <div class="col-md-4 quot_active centered">
              <span>1. Seleccione un vehículo</span>
            </div>
            <!--News Block-->
            <div class="col-md-4 centered">
              <a href="/cotizar-modelo" class="select_quot">2. Introduzca su información</a>
            </div>
            <!--News Block-->
            <div class="col-md-4 centered">
              <a href="javascript:void(0);" class="select_quot">3. Solicitud completada</a>
            </div>
          </div>
      </div>
  </section>
  <!--End News Section-->
  <!--Cars Comparison Section-->
  <section class="cars-comparison-section py-5">
      <div class="auto-container">
        <!-- /////////////////////////////////// -->
        @foreach($categories as $category)
        <div class="row clearfix div_border py-3 mb-4">
          <!-- filtro -->
          <div class="col-md-3">
            <div class="title-column" style="width: 100%;">
                <h2 class="mb-4">{{ $category['name'] }}</h2>
                <div class="form-group">
                    <label>Tipo:</label>
                    <input type="hidden" class="category_id" value="{{ $category['id'] }}">
                    <select class="custom-select-box subcategory">
                        <option value="">Todos</option>
                        @foreach($category['subcategories_published'] as $subcategory)
                          <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>
          <!-- Modelos -->
          <div class="col-md-9 py-4 px-5">
            <div class="slider_quot owl-carousel owl-theme">
              @foreach($category['products_published'] as $product)
              <div class="item">
                <img src="{{ $product['main_photo']['resource_thumb'] }}" alt="">
                <div class="car_quot_title centered mb-3">{{ $product['name'] }}</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" data-index="{{ $product['id'] }}" class="btn_1 product_quotation">COTIZAR</a></div>
              </div>
              @endforeach
              {{--
              <div class="item">
                <img src="/template_8/images/resource/car-26.png" alt="">
                <div class="car_quot_title centered mb-3">TOYOTA CAMRY 2016</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-27.png" alt="">
                <div class="car_quot_title centered mb-3">TUCSON RTX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-25.png" alt="">
                <div class="car_quot_title centered mb-3">ACURA RDX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-26.png" alt="">
                <div class="car_quot_title centered mb-3">TOYOTA CAMRY 2016</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-27.png" alt="">
                <div class="car_quot_title centered mb-3">TUCSON RTX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              --}}
            </div>
          </div>
        </div>
        @endforeach
        <!-- /////////////////////////////////// -->
        {{--
        <div class="row clearfix div_border py-3 mb-4">
          <!-- filtro -->
          <div class="col-md-3">
            <div class="title-column" style="width: 100%;">
                <h2 class="mb-4">Mihandra</h2>
                <div class="form-group">
                    <label>Tipo:</label>
                    <select class="custom-select-box">
                        <option>Todos</option>
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Hatchback</option>
                        <option>Buses</option>
                    </select>
                </div>
            </div>
          </div>
          <!-- Modelos -->
          <div class="col-md-9 py-4 px-5">
            <div class="slider_quot owl-carousel owl-theme">
              <div class="item">
                <img src="/template_8/images/resource/car-25.png" alt="">
                <div class="car_quot_title centered mb-3">ACURA RDX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-26.png" alt="">
                <div class="car_quot_title centered mb-3">TOYOTA CAMRY 2016</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-27.png" alt="">
                <div class="car_quot_title centered mb-3">TUCSON RTX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-25.png" alt="">
                <div class="car_quot_title centered mb-3">ACURA RDX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-26.png" alt="">
                <div class="car_quot_title centered mb-3">TOYOTA CAMRY 2016</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-27.png" alt="">
                <div class="car_quot_title centered mb-3">TUCSON RTX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /////////////////////////////////// -->
        <div class="row clearfix div_border py-3 mb-4">
          <!-- filtro -->
          <div class="col-md-3">
            <div class="title-column" style="width: 100%;">
                <h2 class="mb-4">JMC</h2>
                <div class="form-group">
                    <label>Tipo:</label>
                    <select class="custom-select-box">
                        <option>Todos</option>
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Hatchback</option>
                        <option>Buses</option>
                    </select>
                </div>
            </div>
          </div>
          <!-- Modelos -->
          <div class="col-md-9 py-4 px-5">
            <div class="slider_quot owl-carousel owl-theme">
              <div class="item">
                <img src="/template_8/images/resource/car-25.png" alt="">
                <div class="car_quot_title centered mb-3">ACURA RDX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-26.png" alt="">
                <div class="car_quot_title centered mb-3">TOYOTA CAMRY 2016</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
              <div class="item">
                <img src="/template_8/images/resource/car-27.png" alt="">
                <div class="car_quot_title centered mb-3">TUCSON RTX 2015 SE</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" class="btn_1">COTIZAR</a></div>
              </div>
            </div>
          </div>
        </div>
        --}}
        <!-- /////////////////////////////////// -->
      </div>
  </section>
</div>

@stop
@section('plugins-css')
@stop
@section('plugins-js')
<script type="text/javascript">
  // Brands Slider, models slider
  $(document).ready(function() {
    $('.slider_quot').owlCarousel({
      dots: false,
      margin: 10,
      rewind: true,
      // autoplay:true,
      // autoplayTimeout:6000,
      nav: true,
      navText : ['<i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i>',
                 '<i class="fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i>'],
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          500:{
              items:2,
          },
          700:{
              items:3,
          },
          900:{
              items:4,
          }
      }
    });

  $(document).on('selectmenuchange', '.subcategory', function(E) {

    let _that = $(this), _value = E.target.value, _container = _that.parent().parent().parent().next(), _content;
    if (!_value) {
      _value = 0;
    }

    axios.get(`/api/template_8/subcategory/${_value}/products?category_id=${_that.parent().find('.category_id').val()}`)
      .then((response) => {
        _content = ``;
        _container.html(``);

        response.data.forEach((value) => {
          _content += `
              <div class="item">
                <img src="${value.main_photo.resource_thumb}" alt="">
                <div class="car_quot_title centered mb-3">${value.name}</div>
                <div class="car_quot_title centered"><a href="/cotizar-modelo" data-index="${value.id}" class="btn_1 product_quotation">COTIZAR</a></div>
              </div>`;
        });
        _container.html(`<div class="slider_quot owl-carousel owl-theme">${_content}</div>`);

        _container.children().owlCarousel({
          dots: false,
          margin: 10,
          rewind: true,
          // autoplay:true,
          // autoplayTimeout:6000,
          nav: true,
          navText : ['<i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i>',
                     '<i class="fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i>'],
          responsiveClass:true,
          responsive:{
              0:{
                  items:1,
              },
              500:{
                  items:2,
              },
              700:{
                  items:3,
              },
              900:{
                  items:4,
              }
          }
        });

      });

  });

  $(document).on('click','.product_quotation', function(e){
    let _that = $(this);
    e.preventDefault();
    localStorage.removeItem(`product_quotation`);
    localStorage.setItem(`product_quotation`, _that[0].dataset.index);
    location.replace(`/cotizar-modelo`);
  });

  });
</script>
@stop
