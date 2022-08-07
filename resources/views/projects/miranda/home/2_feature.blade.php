<!--Feature property section start-->
<div class="property-area fadeInUp wow ptb-130" data-wow-delay="0.2s">
  <div class="container">
    @foreach($categories_with_products as $i => $category)
    <div class="row">
      <div class="col-12">
        <div class="feature-property-title">
          <h3>Todo sobre {{ $category['name'] }} que tenemos para tí</h3>
        </div>
      </div>
    </div>
     <div class="row">
      <div class="col-12">
        <div class="tab-content" id="property-tab-content">
          <div role="tabpanel" class="tab-pane active" id="sale" aria-labelledby="property-sale-tab">
            <div class="property-list owl-carousel">
              @foreach($category['products'] as $t => $product)
              <div class="item" style="margin-bottom: 40px;">
                <div class="single-property">
                  <!--  -->
                  <span class="bg-miranda">{{ (isset($product['own_attributes'][0])) ? $product->own_attributes[0]->name : 'No tiene' }}</span>
                  <!--  -->
                  <div class="property-img">
                    <a href="/catalogo/{{ $product['slug'] }}">
                      <img src="{{ ($product->photo != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" style="height: 250px;">
                    </a>
                  </div>
                  <div class="property-desc">
                    <div class="property-desc-top" style="padding-top: 10px; padding-bottom: 10px;">
                      <div style="height: 47px;">
                          <h6><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h6>
                      </div>
                      <div class="property-location" style="height: 40px;">
                        <p><img src="/miranda/img/property/icon-5.png" alt="">{{ $product['address'] }}, {{ $product['city']['name'] }}</p>
                      </div>
                    </div>
                    <div class="property-desc-bottom">
                      <div class="property-bottom-list">
                        <ul>
                          <li>
                            <span>Desde</span>
                            <span style="color: #fff; font-size: 20px; font-weight: 600;">S/. {{ $product['price'] }}</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<!--Feature property section end-->
