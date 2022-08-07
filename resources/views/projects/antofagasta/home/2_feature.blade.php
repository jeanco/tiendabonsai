<!--Feature property section start-->
<div class="property-area fadeInUp wow ptb-50" data-wow-delay="0.2s">
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
                <!-- ============= -->
                <div class="single-property-box">
                    <div class="property-item">
                        <a class="property-img" href="/catalogo/{{ $product['slug'] }}"><img src="{{ ($product->photo != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="#" class="galeria__img">
                        </a>
                        <ul class="feature_text">
                            <li class="feature_cb"><span>{{ (isset($product['own_attributes'][0])) ? $product->own_attributes[0]->name : 'No tiene' }}</span></li>
                        </ul>
                    </div>
                    <div class="property-title-box">
                        <div style="height: 50px; margin-top: 10px;">
                            <h4><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h4>
                        </div>
                        <div class="property-location">
                            <i class="fa fa-map-marker-alt"></i>
                            <!-- <p>{{ $product['address'] }}, {{ $product['city']['name'] }}</p> -->
                            <p>{{ $product['address'] }}</p>
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
                <!-- ============= -->
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
