<!--Popular Cars Section-->
<section class="popular-cars-section pb-1">
  <div class="auto-container">
    <!-- /////////////////////////////////////////////// -->
    <!--Sec Title Brand 1-->

    {{--@foreach($categories_featured as $category)
    <div class="row align-items-center mx-0 mb-3 sec-title">
        <h2 class="mr-5">{{ $category['name'] }}</h2>
        <a href="/catalogo?categoria={{ $category['slug'] }}" class="btn_1">Ver Más</a>
    </div>
    <!--End Sec Title-->
    <!-- Carousel Brand 1 -->
    <div class="slider_basic owl-carousel owl-theme">
      <!-- Model 1 -->
      @foreach($category['products'] as $product)
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_4">Nuevo</div>
                  <a href="/catalogo/{{ $product['slug'] }}"><img src="{{ $product['photo']['resource'] }}" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">{{ $product['name'] }}</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Diesel</li>
                      <li><span class="icon fa fa-car"></span>{{ $product['subcategory']['name'] }}</li>
                      <li><span class="icon fa fa-clock-o"></span>2014</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
    --}}

    <div class="row align-items-center mx-0 mb-3 sec-title">
        <h2 class="mr-5">Hyundai</h2>
        <a href="/catalogo" class="btn_1">Ver Más</a>
    </div>
    <!--End Sec Title-->
    <!-- Carousel Brand 1 -->
    <div class="slider_basic owl-carousel owl-theme">
      <!-- Model 1 -->
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_4">Nuevo</div>
                  <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-1.png" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">BMW F12 6 Convertible</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Diesel</li>
                      <li><span class="icon fa fa-car"></span>Sedan</li>
                      <li><span class="icon fa fa-clock-o"></span>2014</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
      <!-- Model 2 -->
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_4">Nuevo</div>
                  <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-2.png" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">Audi A8 3.0 TDI S12</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Petrol</li>
                      <li><span class="icon fa fa-car"></span>Sedan</li>
                      <li><span class="icon fa fa-clock-o"></span>2008</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
      <!-- Model 3 -->
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_4">Nuevo</div>
                  <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-3.png" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">Ford Fiesta Hatchback</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Diesel</li>
                      <li><span class="icon fa fa-car"></span>Hatchback</li>
                      <li><span class="icon fa fa-clock-o"></span>2005</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
      <!-- Model 4 -->
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_4">Nuevo</div>
                  <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-4.png" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">Audi A8 3.0 TDI S12</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Petrol</li>
                      <li><span class="icon fa fa-car"></span>Sedan</li>
                      <li><span class="icon fa fa-clock-o"></span>2008</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
      <!-- Model 5 -->
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_4">Nuevo</div>
                  <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-5.png" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">Caterham 7 Superlight</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Diesel</li>
                      <li><span class="icon fa fa-car"></span>Sedan</li>
                      <li><span class="icon fa fa-clock-o"></span>2010</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
      <!-- Model 6 -->
      <div class="item">
        <div class="car-block">
          <div class="inner-box">
              <div class="image">
                  <div class="ribbon_model bg_5">Nuevo</div>
                  <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-6.png" alt="" /></a>
              </div>
              <h3><a href="/catalogo/perfil">Mercedes Benz c Class</a></h3>
              <div class="lower-box">
                  <ul class="car-info">
                      <li><span class="fa fa-road icon"></span>Diesel</li>
                      <li><span class="icon fa fa-car"></span>Sedan</li>
                      <li><span class="icon fa fa-clock-o"></span>2014</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /////////////////////////////////////////////// -->
  </div>
</section>

<section class="offer-section bg_white pt-0">
    <div class="auto-container">
      <!--Sec Title Brand 2-->
      <div class="row align-items-center mx-0 mb-0 sec-title">
          <h2 class="mr-5">Últimos Lanzamientos</h2>
          <a href="/catalogo" class="btn_1">Ver Más</a>
      </div>
      <!--End Sec Title-->
      <!--Sec Title-->
      <div class="slider_basic scale owl-carousel owl-theme">
          @foreach($last_products as $product)
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/{{ $product['slug'] }}"><img src="{{ $product['main_photo'] ? $product['main_photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img_feature"/></a>
                      <div class="price bg_4">Nuevo</div>
                  </div>
                  <h3><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                        @foreach($product->own_attributes as $attribute)
                          <img src="{{ $attribute->category_attribute->icon }}" alt="" style="width:20px!important;">
                          <span>{{ $attribute->name }}</span>
                        @endforeach

                          {{--
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2014</li> -->
                          <li><span class="icon fa fa-gear"></span>Hyundai</li>
                          --}}
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          @endforeach
          {{--
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-17.png" alt="" class="img_feature"/></a>
                  </div>
                  <h3><a href="/catalogo/perfil">Touareg Personal Luxuary Car</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2010</li> -->
                          <li><span class="icon fa fa-gear"></span>Mihandra</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-18.png" alt="" class="img_feature"/></a>
                  </div>
                  <h3><a href="/catalogo/perfil">Dauphine Campact car Sedan</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2015</li> -->
                          <li><span class="icon fa fa-gear"></span>JMC</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-11.png" alt="" class="img_feature"/></a>
                      <div class="price bg_4">Nuevo</div>
                  </div>
                  <h3><a href="/catalogo/perfil">ACURA RDX 2015 SE</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2014</li> -->
                          <li><span class="icon fa fa-gear"></span>Hyundai</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-12.png" alt="" class="img_feature"/></a>
                      <div class="price bg_4">Nuevo</div>
                  </div>
                  <h3><a href="/catalogo/perfil">CAMRY 2016</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2014</li> -->
                          <li><span class="icon fa fa-gear"></span>Jinbei</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-1.png" alt="" class="img_feature"/></a>
                  </div>
                  <h3><a href="/catalogo/perfil">Grand i10 Sedán</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2018</li> -->
                          <li><span class="icon fa fa-gear"></span>Hyundai</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-3.png" alt="" class="img_feature"/></a>
                      <div class="price bg_4">Nuevo</div>
                  </div>
                  <h3><a href="/catalogo/perfil">Grand i10 Hatchback</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Hatchback</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2019</li> -->
                          <li><span class="icon fa fa-gear"></span>Hyundai</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="offer-block pt-4">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-26.png" alt="" class="img_feature"/></a>
                      <div class="price bg_4">Nuevo</div>
                  </div>
                  <h3><a href="/catalogo/perfil">Hyundai Verna</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>Sedan</li>
                          <!-- <li><span class="icon fa fa-clock-o"></span>2014</li> -->
                          <li><span class="icon fa fa-gear"></span>Hyundai</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          --}}
      </div>
    </div>
</section>
  <!--End Offer Section-->
