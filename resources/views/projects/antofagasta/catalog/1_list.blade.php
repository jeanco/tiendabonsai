    <div class="row">
        @foreach($products as $z => $product)
        <div class="col-md-6 col-xs-12">
            <div class="single-property-box">
                <div class="property-item">
                    <a class="property-img" href="/catalogo/{{ $product['slug'] }}"><img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="#" class="galeria__img">
                    </a>
                    <ul class="feature_text">
                        <li class="feature_cb"><span>{{ (isset($product['own_attributes'][0])) ? $product->own_attributes[0]->name : 'No tiene' }}</span></li>
                    </ul>
                </div>
                <div class="property-title-box">
                  <div style="height: 70px;">
                      <h4><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h4>
                  </div>
                  <div class="property-location">
                      <i class="fa fa-map-marker-alt"></i>
                      <!-- <p>{{ $product['address'] }}, {{ $product['city']['name'] }}</p> -->
                      <p>{{ $product['address'] }}</p>
                  </div>
                  <div class="text-justify" style="padding-top: 5px; padding-bottom: 10px; height: 50px;">
                    {{ substr(strip_tags($product['description']), 0, 60) }}...
                  </div>
                  <div class="trending-bottom">
                      <a class="trend-right float-right">
                          <div class="trend-open">
                              <p>$ {{ $product['price'] }}</p>
                          </div>
                      </a>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            <div class="pagination">
                <div class="pagination-inner text-center">
                    {{ $products->appends(request()->except('page'))->links() }}
<!--                     <ul>
                        <li class="prev"><a href="properties-sidebar.html#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="current">1</li>
                        <li><a href="properties-sidebar.html#">2</a></li>
                        <li><a href="properties-sidebar.html#">3</a></li>
                        <li>. . . . . .</li>
                        <li><a href="properties-sidebar.html#">15</a></li>
                        <li class="next"><a href="properties-sidebar.html#"><i class="fa fa-angle-right"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
