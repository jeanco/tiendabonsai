<!--Offer Section-->
<section class="py-5">
  <div class="auto-container">
    <div class="text-white">
      <div class="sec-title centered mb-4"><h2 class="text_1" style="border: none;">Elige la mejor marca</h2></div>
      <div class="row justify-content-md-center">
        <div class="col-md-10 brand_slider">
          <div class="slider_basic owl-carousel owl-theme">

               @foreach($categories as $category)
                <div class="item brand_effect">
                  <a href="/catalogo?categoria={{ $category['slug'] }}" class="brand_effect">
                    <div class="row justify-content-md-center">
                      <div class="col-sm-6 col-sm-6 py-3"><img src="{{ $category['icon'] }}" style="border-radius: .25rem;"></div>
                    </div>
                  </a>
                </div>
              @endforeach


              {{--<div class="item brand_effect">
                <a href="/" class="brand_effect">
                  <div class="row justify-content-md-center">
                    <div class="col-sm-6 py-3"><img src="/template_8/images/hyundai/hyundai.png" style="border-radius: .25rem;"></div>
                  </div>
                </a>
              </div>
              <div class="item brand_effect">
                <a href="/" class="brand_effect">
                  <div class="row justify-content-md-center">
                    <div class="col-sm-6 py-3"><img src="/template_8/images/hyundai/baic.png" style="border-radius: .25rem;"></div>
                  </div>
                </a>
              </div>
              <div class="item brand_effect">
                <a href="/" class="brand_effect">
                  <div class="row justify-content-md-center">
                    <div class="col-sm-6 py-3"><img src="/template_8/images/hyundai/brilliance.png" style="border-radius: .25rem;"></div>
                  </div>
                </a>
              </div>
              <div class="item brand_effect">
                <a href="/" class="brand_effect">
                  <div class="row justify-content-md-center">
                    <div class="col-sm-6 py-3"><img src="/template_8/images/hyundai/jmc.png" style="border-radius: .25rem;"></div>
                  </div>
                </a>
              </div>

              <div class="item brand_effect">
                <a href="/" class="brand_effect">
                  <div class="row justify-content-md-center">
                    <div class="col-sm-6 py-3"><img src="/template_8/images/hyundai/mahindra.png" style="border-radius: .25rem;"></div>
                  </div>
                </a>
              </div>--}}


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End Offer Section-->
