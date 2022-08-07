<!-- For Your Quick Look -->
<div class="section-full bg-white content-inner car-listing">
    <div class="container">
        <div class="section-head text-center">
            <div class="section-head style-1 text-center" data-name="V">
          <h2 class="h2"><span class="font-weight-800">PRODUCTOS</span> DESTACADOS  </h2>
        </div>
            <ul class="nav theme-tabs">
                @foreach ($category->subcategories as $key => $subcategory)
                <li role="presentation" class="{{ ($key == 0) ? 'active' : '' }}"><a data-toggle="tab" href="#{{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
                @endforeach {{--
                <li role="presentation" class="active"><a data-toggle="tab" href="#ciudad">Ciudad</a></li>
                <li role="presentation"><a data-toggle="tab" href="#combis">Combis</a></li>
                <li role="presentation"><a data-toggle="tab" href="#turismo">Turismo</a></li> --}}
            </ul>
        </div>
        <div class="section-content ">
            <div class="row">
                <div class="dlab-tabs">
                    <div class="tab-content">
                        <!-- NOVEDADES -->
                        @foreach ($category->subcategories as $key => $subcategory)
                        <div id="{{ $subcategory['slug'] }}" class="tab-pane {{ ($key == 0) ? 'active' : '' }} clearfix {{ ($key != 0) ? 'fade' : '' }}">
                            <div class="col-md-12 owl-carousel owl-btn-style-2 quick-look">
                                <!-- Oferta 1 -->
                                @foreach ($subcategory->products as $product)
                                <div class="item">
                                    <div class="dlab-feed-list">
                                        <div class="dlab-media" style="    height: 180px;">
                                            <a href="/productos/{{ $product['slug'] }}"><img src="{{ $product['photo']['resource'] }}" alt="" style=""></a>
                                        </div>
                                        <div class="dlab-info text-center">
                                            <h4 class="dlab-title" style="font-size: 16px;"><a href="/productos/{{ $product['slug'] }}">{{ $product['name'] }} </a></h4>
                                            <div class="dlab-separator bg-black" style="width: 92%; background-color: #9a9a9a;"></div>
                                            <div class="">
                                                @if( $product['price']> 0)
                                                <a href="/win-cotizador" class="" style=""> S/ {{ $product['price'] }} </a>
                                                @else
                                                <a href="/win-cotizador" class="site-button-catalog" style=""> COTIZAR </a>
                                                @endif
                                                
                                                <a href="/productos/{{ $product['slug'] }}" class="site-button-catalog" style="background-color: #9a9a9a;"> INFO </a>
                                            </div>
                                          
                                           {{-- <p class="dlab-price">
                                                 @if ($product['promotion_available'])
                                                <del>s/{{ $product['price'] }}</del>
                                                <span class="text-primary">s/{{ $product['price_promotion'] }}</span> @else
                                                <span class="text-primary">s/{{ $product['price'] }}</span> @endif 


                                            </p>--}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach {{--
                                <!-- Fin Oferta 1 -->
                                <!-- Oferta 2 -->
                                <div class="item">
                                    <div class="dlab-feed-list">
                                        <div class="dlab-media">
                                            <a href="/win-perfil-auto"><img src="/wings/img/bus2.png" alt="" style="height: 146px;"></a>
                                        </div>
                                        <div class="dlab-info">
                                            <h4 class="dlab-title" style="font-size: 16px;"><a href="/win-perfil-auto">CITY BUS 777 </a></h4>
                                            <div class="dlab-separator bg-black"></div>
                                            <p class="dlab-price">
                                                <!-- <del>$26,000</del>  -->
                                                <span class="text-primary">$21,000</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Oferta 2 -->
                                <!-- Oferta 3 -->
                                <div class="item">
                                    <div class="dlab-feed-list">
                                        <div class="dlab-media">
                                            <a href="/win-perfil-auto"><img src="/wings/img/bus4.png" alt="" style="height: 146px;"></a>
                                        </div>
                                        <div class="dlab-info">
                                            <h4 class="dlab-title" style="font-size: 16px;"><a href="/win-perfil-auto">CITY BUS 999 </a></h4>
                                            <div class="dlab-separator bg-black"></div>
                                            <p class="dlab-price">
                                                <!-- <del>$25,000</del>  -->
                                                <span class="text-primary">$20,000</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Oferta 3 -->
                                <!-- Oferta 4 -->
                                <div class="item">
                                    <div class="dlab-feed-list">
                                        <div class="dlab-media">
                                            <a href="/win-perfil-auto"><img src="/wings/img/bus5.png" alt="" style="height: 146px;"></a>
                                        </div>
                                        <div class="dlab-info">
                                            <h4 class="dlab-title" style="font-size: 16px;"><a href="/win-perfil-auto">CITY BUS 008 </a></h4>
                                            <div class="dlab-separator bg-black"></div>
                                            <p class="dlab-price">
                                                <!-- <del>$25,152</del>  -->
                                                <span class="text-primary">$20,598</span>
                                            </p>
                                        </div>
                                        <<!-- Fin Oferta 1 -->
                                            <!-/div>
                                    </div>
                                    <!-- Fin Oferta 4 -->--}}
                                </div>
                            </div>
                            @endforeach {{--
                            <!-- Fin NOVEDADES -->
                            <!-- POPULAR -->
                            <div id="combis" class="tab-pane clearfix fade">
                                <div class="col-md-12 owl-carousel owl-btn-style-2 quick-look">
                                    <!-- Oferta 1 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-popular.html"><img src="/wings/images/our-work/work/pic3.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-popular.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 1 -->
                                    <!-- Oferta 2 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-popular.html"><img src="/wings/images/our-work/work/pic4.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-popular.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 2 -->
                                    <!-- Oferta 3 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-popular.html"><img src="/wings/images/our-work/work/pic1.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-popular.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 3 -->
                                    <!-- Oferta 4 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-popular.html"><img src="/wings/images/our-work/work/pic2.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-popular.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 4 -->
                                </div>
                            </div>
                            <!-- Fin POPULAR -->
                            <!-- ANTERIORES -->
                            <div id="turismo" class="tab-pane clearfix fade">
                                <div class="col-md-12 owl-carousel owl-btn-style-2 quick-look">
                                    <!-- Oferta 1 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-latest.html"><img src="/wings/images/our-work/work/pic2.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-latest.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 1 -->
                                    <!-- Oferta 2 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-latest.html"><img src="/wings/images/our-work/work/pic3.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-latest.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 2 -->
                                    <!-- Oferta 3 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-latest.html"><img src="/wings/images/our-work/work/pic1.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-latest.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 3 -->
                                    <!-- Oferta 4 -->
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media">
                                                <a href="new-car-latest.html"><img src="/wings/images/our-work/work/pic4.jpg" alt=""></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="new-car-latest.html">Hyundai santa fe sport </a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><del>$40,152</del> <span class="text-primary">$26,598</span></p>
                                            </div>
                                            <!-- <div class="icon-box-btn text-center">
                                <ul class="clearfix">
                                  <li>2019</li>
                                  <li>Manual</li>
                                  <li>210 hp </li>
                                </ul>
                              </div> -->
                                        </div>
                                    </div>
                                    <!-- Fin Oferta 4 -->
                                </div>
                            </div> --}}
                            <!-- Fin ANTERIORES -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- For Your Quick Look END -->