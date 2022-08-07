 <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="shop-single.html#desc">Características</a></li>
                        <li><a data-toggle="tab" href="shop-single.html#special">Especificaciones</a></li>
                        <li><a data-toggle="tab" href="shop-single.html#video">Descripción de la empresa</a></li>
                    </ul>
                    <div class="tab-content padding-lr">
                        <div id="desc" class="tab-pane fade in active">
                            {!! $product['features'] !!}
                        </div>
                        <div id="special" class="tab-pane fade">
                            {!! $product['specifications'] !!}
                        </div>
                        <div id="video" class="tab-pane fade">
                            <a href="{{ $product['pdf'] }}">Ficha</a>
                            <br>
                            {!! $product['company']['description_company']  !!}
                            <br>
                            <div id="location" style="width: 100%; height: 200px;" class="u-mb3"></div>
                        </div>
                    </div>