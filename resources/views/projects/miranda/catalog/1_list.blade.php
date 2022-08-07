    <div class="row">
        @foreach($products as $z => $product)
        <div class="col-md-6 col-12">
            <div class="single-property mb-40">
                <span class="bg-miranda">{{ (isset($product['own_attributes'][0])) ? $product->own_attributes[0]->name : 'No tiene' }}</span>
                <div class="property-img">
                    <a href="/catalogo/{{ $product['slug'] }}">
                      <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="galeria__img">
                    </a>
                    
                </div>
                <div class="property-desc">
                    <div class="property-desc-top">
                        <div style="height: 45px;">
                          <h6><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h6>
                        </div> <br>
                        <h4 class="price">S/. {{ $product['price'] }}</h4> <br>
                        <div class="property-location" style="height: 45px;">
                            <p><img src="/miranda/img/property/icon-5.png" alt="">{{ $product['address'] }}, {{ $product['city']['name'] }}</p>
                        </div><br>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="find-home-item">
                                        <button type="submit" class="catalog_contact" data-name="{{ $product['name'] }}" data-address="{{ $product['address'] }}" data-id={{$product['id']}} data-toggle="modal" data-target="#contactar">CONTACTAR</button>
                                    </div>
                            </div>
                            <div class="col-md-5">
                                 <div class="find-home-item">
                                        <button  class="clik_whatsapp" value="{{ $product['company']['cel'] }}"><i class="fab fa-whatsapp fa-lg"></i> Whatsapp</button>

                                    </div>

                            </div>
                        </div>


                    </div>
                    <div class="property-desc-bottom">
                        <div class="property-bottom-list">
                            <div style="height: 60px;">
                              <p style="color: #fff;">{{ substr(strip_tags($product['description']), 0, 60) }}...</p>
                            </div>
                            <ul>
                                @foreach ($product->attributes as $attribute)
                                <li>
                                    <img src="{{ $attribute->category_attribute->icon }}" alt="" style="width:20px!important;">
                                    <span>{{ $attribute->name }}</span>
                                    </li>
                                @endforeach
{{--
                                <li>
                                    <img src="/miranda/img/property/icon-2.png" alt="">
                                    <span>6</span>
                                </li>
                                <li>
                                    <img src="/miranda/img/property/icon-3.png" alt="">
                                    <span>4</span>
                                </li>
                                <li>
                                    <img src="/miranda/img/property/icon-4.png" alt="">
                                    <span>3</span>
                                </li> --}}
                            </ul>
                        </div>
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
