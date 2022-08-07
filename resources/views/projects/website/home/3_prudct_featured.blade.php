
<section class="featured-product">
    <div class="container">
        <div class="heading-v1">
            <h3 class="pull-left">Productos destacados</h3>
            <ul class="otherr-link pull-right">
                <li class="active"><a id="" class="featured-products_category" data-index="0" data-toggle="pill" href="">Todos</a></li>
                @foreach($categories as $key => $category)
                    <li><a data-toggle="pill" class="featured-products_category" data-index="{{ $category['id'] }}" href="#">{{ $category['name'] }}</a></li>
                @endforeach
                <!--
                <li><a data-toggle="pill" href="index.html#elec">Electronic</a></li>
                <li><a data-toggle="pill" href="index.html#fashion">Fashion        </a></li>
                <li><a data-toggle="pill" href="index.html#it">IT</a></li>
                <li><a data-toggle="pill" href="index.html#food">Food & Drink</a></li> -->
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="tab-content">
            <div id="all" class="tab-pane fade in active">
                <div class="prod-fea-list">
                    <div class="row" id="featured_products">
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/smarphone.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="prod-price">
                                        <span class="price black">$212.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sound3.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony MDRXB950BT/B Ex .fa-1tra Bass Bluetooth Headphones...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price old">$699.6</span>
                                        <span class="price">$510.02</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/tivi.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
                                    <div class="ratingstar sm" style="display:none;">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$399.6</span>
                                        <span class="price">$299.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sony.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony a7 Full-Frame Mirrorless Digital Camera...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price black">$199.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/macbook.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Apple iPad 4 16GB 9.7" Retina Display WiFi Bluetooth...</a></h3>
                                    <div class="ratingstar" style="display:none;"><span class="number">(12)</span></div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$299.6</span>
                                        <span class="price">$109.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="elec" class="tab-pane fade ">
                <div class="prod-fea-list">
                    <div class="row">
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/smarphone.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="prod-price">
                                        <span class="price black">$212.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sound3.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony MDRXB950BT/B Ex .fa-1tra Bass Bluetooth Headphones...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price old">$699.6</span>
                                        <span class="price">$510.02</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/tivi.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
                                    <div class="ratingstar sm" style="display:none;">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$399.6</span>
                                        <span class="price">$299.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sony.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony a7 Full-Frame Mirrorless Digital Camera...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price black">$199.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/macbook.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Apple iPad 4 16GB 9.7" Retina Display WiFi Bluetooth...</a></h3>
                                    <div class="ratingstar" style="display:none;"><span class="number">(12)</span></div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$299.6</span>
                                        <span class="price">$109.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fashion" class="tab-pane fade ">
                <div class="prod-fea-list">
                    <div class="row">
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/smarphone.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="prod-price">
                                        <span class="price black">$212.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sound3.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony MDRXB950BT/B Ex .fa-1tra Bass Bluetooth Headphones...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price old">$699.6</span>
                                        <span class="price">$510.02</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/tivi.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
                                    <div class="ratingstar sm" style="display:none;">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$399.6</span>
                                        <span class="price">$299.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sony.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony a7 Full-Frame Mirrorless Digital Camera...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price black">$199.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/macbook.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Apple iPad 4 16GB 9.7" Retina Display WiFi Bluetooth...</a></h3>
                                    <div class="ratingstar" style="display:none;"><span class="number">(12)</span></div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$299.6</span>
                                        <span class="price">$109.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="it" class="tab-pane fade  ">
                <div class="prod-fea-list">
                    <div class="row">
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/smarphone.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="prod-price">
                                        <span class="price black">$212.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sound3.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony MDRXB950BT/B Ex .fa-1tra Bass Bluetooth Headphones...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price old">$699.6</span>
                                        <span class="price">$510.02</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/tivi.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
                                    <div class="ratingstar sm" style="display:none;">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$399.6</span>
                                        <span class="price">$299.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sony.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony a7 Full-Frame Mirrorless Digital Camera...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price black">$199.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/macbook.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Apple iPad 4 16GB 9.7" Retina Display WiFi Bluetooth...</a></h3>
                                    <div class="ratingstar" style="display:none;"><span class="number">(12)</span></div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$299.6</span>
                                        <span class="price">$109.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="food" class="tab-pane fade  ">
                <div class="prod-fea-list">
                    <div class="row">
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/smarphone.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="prod-price">
                                        <span class="price black">$212.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sound3.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony MDRXB950BT/B Ex .fa-1tra Bass Bluetooth Headphones...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price old">$699.6</span>
                                        <span class="price">$510.02</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/tivi.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
                                    <div class="ratingstar sm" style="display:none;">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$399.6</span>
                                        <span class="price">$299.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/sony.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Sony a7 Full-Frame Mirrorless Digital Camera...</a></h3>
                                    <div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="p-price">
                                        <span class="price black">$199.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="index.html#"><img src="img/products/macbook.jpg" alt="images" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="index.html#" class="addcart">ADD TO CART</a>
                                        <a href="index.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3><a href="index.html#">Apple iPad 4 16GB 9.7" Retina Display WiFi Bluetooth...</a></h3>
                                    <div class="ratingstar" style="display:none;"><span class="number">(12)</span></div>
                                    <div class="p-price margin--top">
                                        <span class="price old">$299.6</span>
                                        <span class="price">$109.69</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
