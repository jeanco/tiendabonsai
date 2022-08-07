<div class="col-lg-8 col-12 order-lg-2">
    <div class="single-property-details">
        <div class="row mb-2 align-items-center">
          <div class="col-md-9">
            <input type="hidden" name="" id="product-perfil_id" value="{{ $product['id'] }}">
            <span class="font-weight-bold" style="font-size: 18px;">{!! $product['name'] !!}</span>&emsp;
            <span><i class="fas fa-map-marker-alt"></i> {{ $product['address'] }}, {{ $product['city']['name'] }} - {{ $product['country']['name'] }}</span>
          </div>
          <div class="col-md-3 text-right">
            <button type="button" class="btn btn-price">S/. {{ $product['price'] }}</button>
          </div>
        </div>

        @if(count($product['images']))
        <div class="single-property-area">
            <div class="single-property-tab-content tab-content">
              {{-- @if(count($product['images']))
              <div class="single-property-area">
                  <div class="single-property-tab-content tab-content">
                      @foreach($product['images'] as $key => $image)
                      <div class="tab-pane fade show active" id="image{{ $key }}" role="tabpanel" aria-labelledby="image-{{ $key }}-tab">
                          <img src="{{ $image['resource'] }}" alt="">
                      </div>
                      @endforeach
                  </div>

                  <div class="nav single-property-tab-slider owl-carousel indicator-style2 mt-20">
                    @foreach($product['images'] as $key => $image)
                      <div class="nav-item">
                        <a class="nav-link" href="#image{{ $key }}" id="image-{{ $key }}-tab" data-toggle="tab" role="tab" aria-controls="image-{{ $key }}" aria-selected="true">
                          <img src="{{ $image['resource'] }}" alt=""/>
                        </a>
                      </div>
                    @endforeach
                  </div>
              </div>
              @endif --}}
                @foreach ($product['images'] as $i => $image)
                  <div class="tab-pane fade {{ ($i == 0) ? 'show active': '' }}" id="image-{{ $i }}" role="tabpanel" aria-labelledby="image-{{ $i }}-tab">
                    <img src="{{$image['resource']}}" alt="">
                  </div>
                @endforeach
            </div>

            <div class="nav single-property-tab-slider owl-carousel indicator-style2 mt-20">
              @foreach ($product['images'] as $u => $image_thumb)
              <div class="nav-item">
              <a class="nav-link {{ ($u == 0) ? 'active' : '' }}" href="#image-{{ $u }}" id="image-{{ $u }}-tab" data-toggle="tab" role="tab" aria-controls="image-{{ $u }}" aria-selected="true">
                <img src="{{ $image_thumb['resource_thumb'] }}" alt=""/>
                </a>
              </div>
              @endforeach
            </div>
                {{-- <div class="tab-pane fade show active" id="image-1" role="tabpanel" aria-labelledby="image-1-tab">
                    <img src="/miranda/img/property/property-tab-large-1.jpg" alt="">
                </div>
                <div class="tab-pane fade" id="image-2" role="tabpanel" aria-labelledby="image-2-tab">
                    <img src="/miranda/img/property/property-tab-large-2.jpg" alt="">
                </div>
                <div class="tab-pane fade" id="image-3" role="tabpanel" aria-labelledby="image-3-tab">
                    <img src="/miranda/img/property/property-tab-large-3.jpg" alt="">
                </div>
                <div class="tab-pane fade" id="image-4" role="tabpanel" aria-labelledby="image-4-tab">
                    <img src="/miranda/img/property/property-tab-large-4.jpg" alt="">
                </div>
                <div class="tab-pane fade" id="image-5" role="tabpanel" aria-labelledby="image-5-tab">
                    <img src="/miranda/img/property/property-tab-large-5.jpg" alt="">
                </div>
                <div class="tab-pane fade" id="image-6" role="tabpanel" aria-labelledby="image-6-tab">
                    <img src="/miranda/img/property/property-tab-large-2.jpg" alt="">
                </div>
                <div class="tab-pane fade" id="image-7" role="tabpanel" aria-labelledby="image-7-tab">
                    <img src="/miranda/img/property/property-tab-large-3.jpg" alt="">
                </div>
            </div>

            <div class="nav single-property-tab-slider owl-carousel indicator-style2 mt-20">
                <div class="nav-item">
                  <a class="nav-link active" href="#image-1" id="image-1-tab" data-toggle="tab" role="tab" aria-controls="image-1" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-1.jpg" alt=""/>
                  </a>
                </div>
                <div class="nav-item">
                  <a class="nav-link" href="#image-2" id="image-2-tab" data-toggle="tab" role="tab" aria-controls="image-2" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-2.jpg" alt="" />
                  </a>
                </div>
                <div class="nav-item">
                  <a class="nav-link" href="#image-3" id="image-3-tab" data-toggle="tab" role="tab" aria-controls="image-3" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-3.jpg"alt="" />
                  </a>
                </div>
                <div class="nav-item">
                  <a class="nav-link" href="#image-4" id="image-4-tab" data-toggle="tab" role="tab" aria-controls="image-4" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-4.jpg" alt="" />
                  </a>
                </div>
                <div class="nav-item">
                  <a class="nav-link" href="#image-5" id="image-5-tab" data-toggle="tab" role="tab" aria-controls="image-5" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-5.jpg" alt="" />
                  </a>
                </div>
                <div class="nav-item">
                  <a class="nav-link" href="#image-6" id="image-6-tab" data-toggle="tab" role="tab" aria-controls="image-6" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-2.jpg" alt="" />
                  </a>
                </div>
                <div class="nav-item">
                  <a class="nav-link" href="#image-7" id="image-7-tab" data-toggle="tab" role="tab" aria-controls="image-7" aria-selected="true">
                    <img src="/miranda/img/property/property-tab-small-3.jpg" alt="" />
                  </a>
                </div>
            </div> --}}
        </div>
        @endif

        <div class="single-property-description">
            <div class="border-catalog">
              <div class="desc-title">
                  <h5>Descripción</h5>
              </div>
              <div class="description-inner">
                  {!! $product['description'] !!}
                  <!-- <p class="text-justify">Haven ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo</p>
                  }
 -->              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="font-weight-bold mb-3">Condiciones</div>
                    <div class="property-condition-list" style="padding: 15px; background: none; height: auto;">
                        <ul>
                            @foreach($product['own_attributes'] as $k => $attribute)
                            <li>
                                <img src="{{ $attribute['icon'] }}" alt="">
                                <span>{{ $attribute['name'] }}</span>
                            </li>
                            @endforeach
                           <!--  <li>
                                <img src="/miranda/img/property/icon-7.png" alt="">
                                <span>Bedroom 5</span>
                            </li>
                            <li>
                                <img src="/miranda/img/property/icon-8.png" alt="">
                                <span>Bedroom 5</span>
                            </li>
                            <li>
                                <img src="/miranda/img/property/icon-9.png" alt="">
                                <span>Garage 2</span>
                            </li>
                            <li>
                                <img src="/miranda/img/property/icon-10.png" alt="">
                                <span>Kitchaen 2</span>
                            </li>
                            <li>
                                <span class="price">
                                    $52,350
                                </span>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-sm-12">
                  <div class="font-weight-bold mb-3">Ambientes</div>
                    <div class="amenities-list" style="padding: 15px; background: none;">
                      <ul>
                          <li><i class="far fa-check-square"></i> <span>Air Conditioning</span></li>
                          <li><i class="far fa-check-square"></i> <span>Bedding</span></li>
                          <li><i class="far fa-check-square"></i> <span>Balcony</span></li>
                          <li><i class="far fa-check-square"></i> <span>Cable TV</span></li>
                          <li><i class="far fa-check-square"></i> <span>Internet</span></li>
                          <li><i class="far fa-check-square"></i> <span>Parking</span></li>
                          <li><i class="far fa-check-square"></i> <span>lift</span></li>
                          <li><i class="far fa-check-square"></i> <span>Pool</span></li>
                          <li><i class="far fa-check-square"></i> <span>Dishwasher</span></li>
                          <li><i class="far fa-check-square"></i> <span>Toaster</span></li>
                      </ul>
                    </div>
                </div> -->
                @if($product['link'] != '')
                <div class="col-md-6 col-sm-12">
                  <div class="plan-title">
                      <h5>Video Presentaciónn</h5>
                  </div>
                  <div class="vimeo-video">
                      <div class="embed-responsive embed-responsive-4by3">
                          <!-- <iframe class="embed-responsive-item"
                              src=""
                              allowfullscreen></iframe> -->
                            <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ explode('=',$product['link'])[1] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                      </div>
                  </div>
                </div>
                @endif
                <div class="col-md-6 col-sm-12">
                  <div class="plan-title">
                      <h5>Geolocalización</h5>
                  </div>
                  <input type="hidden" name="" id="product_latitude" value="{{ $product['latitude'] }}">
                  <input type="hidden" name="" id="product_longitude" value="{{ $product['longitude'] }}">
                  <div id="" class="">
                      <div class="">
                          <div id="googleMap-145" style="width:100%;height:260px;"></div>
                      </div>
                  </div>
                </div>

              </div>
              <div class="text-right mt-4 mb-4" style="display: none;">
                  <button type="submit" class="btn btn-perfil">CONTACTAR</button>
              </div>

            </div>

        </div>



    </div>
</div>
