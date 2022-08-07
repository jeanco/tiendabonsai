<div class="col-lg-8 col-12 order-lg-2">
    <div class="single-property-details">
        <div class="row mb-2 align-items-center">
          <div class="col-md-9">
            <input type="hidden" name="" id="product-perfil_id" value="{{ $product['id'] }}">
            <div class="font-weight-bold" style="font-size: 18px; margin-bottom: 10px;">{!! $product['name'] !!}</div>
            <!-- <span><i class="fas fa-map-marker-alt"></i>&emsp;{{ $product['address'] }}, {{ $product['city']['name'] }} - {{ $product['country']['name'] }}</span> -->
            <span><i class="fas fa-map-marker-alt"></i>&emsp;{{ $product['address'] }}</span>
          </div>
          <div class="col-md-3 text-right">
            <button type="button" class="btn btn-price">$ {{ $product['price'] }}</button>
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
        </div>
        @endif

        <div class="single-property-description">
            <div class="border-catalog">
              <div class="desc-title">
                  <h5>Descripción</h5>
              </div>
              <div class="description-inner">
                  {!! $product['description'] !!}
              </div>
            </div>
        </div>
    </div>
</div>
