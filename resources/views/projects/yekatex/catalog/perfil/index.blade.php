@extends('yekatex.layouts.index')
@section('content')
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-100 ptb-sm-60">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                        @foreach($product['images'] as $key => $image)
                        <div id="thumb{{$key }}" class="tab-pane fade {{ ($key == 0) ? 'show active' : '' }}">
                            <a data-fancybox="images" href="" onclick="return false;"><img src="{{ $image['resource'] }}" alt="product-view"></a>
                        </div>
                        @endforeach
                        {{-- <div id="thumb2" class="tab-pane fade">
                            <a data-fancybox="images" href="/yekatex/img/products/13.jpg"><img src="/yekatex/img/products/13.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb3" class="tab-pane fade">
                            <a data-fancybox="images" href="/yekatex/img/products/15.jpg"><img src="/yekatex/img/products/15.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb4" class="tab-pane fade">
                            <a data-fancybox="images" href="/yekatex/img/products/4.jpg"><img src="/yekatex/img/products/4.jpg" alt="product-view"></a>
                        </div>
                        <div id="thumb5" class="tab-pane fade">
                            <a data-fancybox="images" href="/yekatex/img/products/5.jpg"><img src="/yekatex/img/products/5.jpg" alt="product-view"></a>
                        </div> --}}
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail mt-15">
                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                            @foreach($product['images'] as $i => $image)
                                <a class="{{ ($i == 0) ? 'active' : '' }}" data-toggle="tab" href="#thumb{{ $i }}"><img src="{{ $image['resource_thumb'] }}" alt="product-thumbnail"></a>
                            @endforeach
                                {{-- <a data-toggle="tab" href="#thumb2"><img src="/yekatex/img/products/13.jpg" alt="product-thumbnail"></a> --}}
                                {{-- <a data-toggle="tab" href="#thumb3"><img src="/yekatex/img/products/15.jpg" alt="product-thumbnail"></a> --}}
                                {{-- <a data-toggle="tab" href="#thumb4"><img src="/yekatex/img/products/4.jpg" alt="product-thumbnail"></a> --}}
                                {{-- <a data-toggle="tab" href="#thumb5"><img src="/yekatex/img/products/5.jpg" alt="product-thumbnail"></a> --}}
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                    <h3 class="product-header">{{ $product['name']  }}</h3>
                        <div class="rating-summary fix mtb-10">
                            <!-- <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div> -->
                            <!-- <div class="rating-feedback">
                                <a href="product.html#">(1 review)</a>
                                <a href="product.html#">add to your review</a>
                            </div> -->
                        </div>
                        <div class="pro-price mtb-30">
                            <p class="d-flex align-items-center">
                                @if($product['promotion_available'] == 1)
                                   <span class="prev-price">s/{{ $product['price'] }}</span>
                                   <span class="price">s/{{ $product['price_promotion'] }}</span>
                                   <span class="saving-price">{{ round(100 - ($product['price_promotion']*100)/$product['price'],2) }}%</span>
                                @else
                                    <span class="price" id="item_price">s/{{ $product['price'] }}</span>
                                @endif
                            </p>
                        </div>
                        <p class="mb-20 pro-desc-details">{!! $product['description'] !!}</p>
                        <br>
                        {{-- <div class="product-size mb-20 clearfix">
                            <label>Size</label>
                            <select class="">
                              <option>S</option>
                              <option>M</option>
                              <option>L</option>
                            </select>
                        </div> --}}
                        {{-- <div class="color clearfix mb-20">
                            <label>color</label>
                            <ul class="color-list">
                                <li>
                                    <a class="orange active" href="product.html#"></a>
                                </li>
                                <li>
                                    <a class="paste" href="product.html#"></a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="box-quantity d-flex hot-product2">
                            <form action="product.html#">
                                <input class="quantity mr-15" id="item_price_rule" type="number" min="1" value="1" data-index={{ $product['id'] }}>
                            </form>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a id="add_item_to_cart_with_number" style="width: 130px" href="#" title="" data-index={{ $product['id'] }} data-original-title="Agregar al carrito"> + Agregar</a>
                                </div>
                                <div class="actions-primary">
                                    <a href="/contacto" id="" style="width: 100px; background: #055692 none repeat scroll 0 0;
    border-color: #055692;"  href="#" title="" data-index={{ $product['id'] }} data-original-title="Escríbenos"> Contactar</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="https://api.whatsapp.com/send?phone=51995921377&text=Me%20interesa%20{{ $product['name']  }}%20.%20M%C3%A1s%20informaci%C3%B3n%20por%20favor.&source=&data=" target="_blank"  title="" data-original-title="Escribir por Whatsapp" ><i class="fa fa-whatsapp" style="color: #07a73b"></i> <span style="color: #07a73b;
    font-size: 17px;">Whatsapp</span></a>

                                </div>
                                <!-- <div class="actions-secondary">
                                    <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                    <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                </div> -->
                            </div>
                        </div>
                        <div class="pro-ref mt-20">
                            <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>
                        </div>
                        <div class="socila-sharing mt-25">
                            <ul class="d-flex">
                                <li>share</li>
                                <li><a href="product.html#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="product.html#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="product.html#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                <li><a href="product.html#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-100 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav tabs-area" role="tablist">
                    <li><a class="active" data-toggle="tab" href="product.html#dtail">Product Details</a></li>
                    <li><a data-toggle="tab" href="product.html#review">Reviews 1</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        <h3>Características</h3>
                        {!! $product['features'] !!}

                        <br>
                        <h3>Especificaciones</h3>
                        {!! $product['specifications'] !!}
                    </div>
                    <div id="review" class="tab-pane fade">
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding">
                            <div class="group-title">
                                <h2>customer review</h2>
                            </div>
                            <h4 class="review-mini-title">Truemart</h4>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Quality</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Truemart</label>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>price</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Review by <a href="https://themeforest.net/user/hastech">Truemart</a></label>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>value</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Posted on 7/20/18</label>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <h2 class="review-title mb-30">You're reviewing: <br><span>Faded Short Sleeves T-shirt</span></h2>
                            <p class="review-mini-title">your rating</p>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Quality</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>price</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>value</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                <form autocomplete="off" action="product.html#">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">Nickname</label>
                                        <input type="text" class="form-control" id="sure-name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="subject">Summary</label>
                                        <input type="text" class="form-control" id="subject" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">Review</label>
                                        <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                    </div>
                                    <button type="submit" class="customer-btn">Submit Review</button>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Realted Products Start Here -->
<div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
    <div class="container">
       <!-- Product Title Start -->
       <div class="post-title pb-30">
           <h2>Productos relacionados</h2>
       </div>
       <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
            <!-- Single Product Start -->
            @foreach ($interests as $i => $item)
            <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                    <a href="/productos/{{ $item['slug'] }}">
                        <img class="primary-img" src="{{ $item['imageThumbUrl'] }}" alt="single-product">
                        <img class="secondary-img" src="{{ $item['promotion']['imageUrl'] }}" alt="single-product">
                        </a>
                    <a href="/products/{{ $item['slug'] }}" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                        <h4><a href="/products/{{ $item['slug'] }}">{{ $item['name'] }}</a></h4>
                            @if($item['promotion']['flag'])
                                <p>
                                    <span class="price">s/{{ $item['promotion']['price'] }}</span>
                                    <del class="prev-price">s/{{ $item['price'] }}</del>
                                </p>
                            <div class="label-product l_sale">{{ round(100 - (100*$item['promotion']['price'])/$item['price'],2) }}<span class="symbol-percent">%</span></div>
                            @else
                                <p>
                                    <span class="price">s/{{ $item['price'] }}</span>
                                </p>
                            @endif
                            {{-- <p>
                                <span class="price">$90.45</span>
                                <del class="prev-price">$100.50</del>
                            </p>
                            <div class="label-product l_sale">20<span class="symbol-percent">%</span></div> --}}
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a clasS="add_to_cart" data-index={{ $item['id'] }} href="#" title="Add to Cart"> + Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                </div>
            @endforeach
            <!-- Single Product End -->
        </div>
        <!-- Hot Deal Product Active End -->

    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->
<!-- Support Area Start Here -->

<!-- Support Area End Here -->
@stop
@section('plugins-js')
<script src="/js/add_cart_with_number.js"></script>
<script src="/yekatex/js/product_profile.js"></script>

@stop
