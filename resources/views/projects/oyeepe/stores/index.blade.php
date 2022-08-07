@extends('oyeepe.layouts.index')
@section('content')
<section class="product-page">
        <div class="container">
            <div class="heading-sub ver2">
                <h3 class="pull-left">Nuestras Tiendas</h3>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="widget-product-collection">
                <div class="row ">
                    @foreach($companies as $key => $company)
                    <div class="col-md-2 col-sm-4 col-xs-12 ">
                        <div class="product-item ver2" style="text-align: center;">
                            <div class="prod-item img" style="height: 50px;" >
                                <a href="/{{ $company['slug_company']  }}"><img style=" width: 100%; height: 50px; object-fit: contain; filter: brightness(70%);" src="{{ $company['logotype'] }}" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info-ver2">
                                <h3 class="text-center"><a href="/{{ $company['slug_company']  }}" title="">{{ $company['name_company'] }}</a></h3>
                                <span class="total text-center">({{ count($company['products']) }} {{ (count($company['products']) == 1) ? 'producto' : 'productos' }})</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
<!--                     <div class="col-md-4 col-sm-4 col-xs-12 ">
                        <div class="product-item ver2">
                            <div class="prod-item img">
                                <a href="product-collection.html#"><img src="website/img/product-collection/product2.png" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info-ver2">
                                <h3><a href="product-collection.html#" title="">Beauty, Health & Grocery</a></h3>
                                <span class="total">(102 product)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 ">
                        <div class="product-item ver2">
                            <div class="prod-item img">
                                <a href="product-collection.html#"><img src="website/img/product-collection/product3.png" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info-ver2">
                                <h3><a href="product-collection.html#" title="">Sports & Outdoors</a></h3>
                                <span class="total">(102 product)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 ">
                        <div class="product-item ver2">
                            <div class="prod-item img">
                                <a href="product-collection.html#"><img src="website/img/product-collection/product4.png" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info-ver2">
                                <h3><a href="product-collection.html#" title="">Home, Garden & Tools</a></h3>
                                <span class="total">(102 product)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 ">
                        <div class="product-item ver2">
                            <div class="prod-item img">
                                <a href="product-collection.html#"><img src="website/img/product-collection/product5.png" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info-ver2">
                                <h3><a href="product-collection.html#" title="">Books & Audible</a></h3>
                                <span class="total">(102 product)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 ">
                        <div class="product-item ver2">
                            <div class="prod-item img">
                                <a href="product-collection.html#"><img src="website/img/product-collection/product6.png" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info-ver2">
                                <h3><a href="product-collection.html#" title="">Automotive & Industrial</a></h3>
                                <span class="total">(102 product)</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>


@stop

@section('pulgins-js')


@stop
