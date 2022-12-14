        <!-- Grid & List View Start -->
        {{-- <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
            <div class="grid-list-view  mb-sm-15">
                <ul class="nav tabs-area d-flex align-items-center">
                    <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                    <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                </ul>
            </div>
            <!-- Toolbar Short Area Start -->
            <div class="main-toolbar-sorter clearfix">
                <div class="toolbar-sorter d-flex align-items-center">
                    <label>Sort By:</label>
                    <select class="sorter wide">
                        <option value="Position">Relevance</option>
                        <option value="Product Name">Neme, A to Z</option>
                        <option value="Product Name">Neme, Z to A</option>
                        <option value="Price">Price low to heigh</option>
                        <option value="Price" selected>Price heigh to low</option>
                    </select>
                </div>
            </div>
            <!-- Toolbar Short Area End -->
            <!-- Toolbar Short Area Start -->
            <div class="main-toolbar-sorter clearfix">
                <div class="toolbar-sorter d-flex align-items-center">
                    <label>Show:</label>
                    <select class="sorter wide">
                        <option value="12">12</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <!-- Toolbar Short Area End -->
        </div> --}}
        <!-- Grid & List View End -->
        <div class="main-categorie mb-all-40">
            <!-- Grid & List Main Area End -->
            <div class="tab-content fix">
                <div id="grid-view" class="tab-pane fade show active">
                    <div class="row">
                        <!-- Single Product Start -->
                        @foreach ($products as $key => $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="/productos/{{ $product['slug'] }}">
                                    <img class="primary-img galeria__img" src="{{ ($product->photo != '') ? $product->photo->resource_thumb : '' }}" alt="single-product">
                                        <img class="secondary-img galeria__img" src="{{ ($product->photo != '') ? $product->photo->resource_thumb : '' }}" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                    <h4><a href="/catalog/{{ $product['slug'] }}">{{ $product['name'] }}</a></h4>
                                        <p>
                                            @if($product->promotion_available == 0)
                                            <span class="price">s/{{ $product->price }}</span>
                                            @else
                                                <span class="price">s/.{{ $product->price_promotion }}</span>
                                                <del class="prev-price">s/.{{ $product->price }}</del>
                                            @endif
                                        </p>
                                        @if($product->promotion_available == 1)
                                            <div class="label-product l_sale">{{ round(100 - (100*$product['price_promotion'])/$product['price'], 0) }}<span class="symbol-percent">%</span></div>
                                        @endif
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="#" class="add_to_cart" data-index={{ $product->id }} title="Add to Cart"> + A??adir al Carrito</a>
                                        </div>
                                        <!-- <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        </div>
                        @endforeach
                        {{-- <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/3.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/4.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Gpoly and Bark Eames Style</a></h4>
                                        <p><span class="price">$150.30</span></p>
                                        <div class="label-product l_sale">10<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/5.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/6.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/8.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/9.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Eames and Bark  Style</a></h4>
                                        <p><span class="price">$180.45</span></p>
                                        <div class="label-product l_sale">18<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/11.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/12.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Eames and Vortex Side</a></h4>
                                        <p><span class="price">$160.45</span><del class="prev-price">$190.50</del></p>
                                        <div class="label-product l_sale">12<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        </div> --}}
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/15.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/16.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Bark Vortex Side Eames</a></h4>
                                        <p><span class="price">$84.45</span></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/13.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/14.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/42.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/43.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Utensils and Knives Block</a></h4>
                                        <p><span class="price">$84.45</span></p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/40.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/41.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Terra Xpress HE Cooking </a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$300.50</del></p>
                                        <div class="label-product l_sale">25<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/39.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/38.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Robert Welch Knife Block</a></h4>
                                        <p><span class="price">$100.45</span><del class="prev-price">$150.50</del></p>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div> --}}
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/36.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/37.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$90.50</span><del class="prev-price">$120.50</del></p>
                                        <div class="label-product l_sale">15<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/35.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/36.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Bark and  Vortex Side</a></h4>
                                        <p><span class="price">$69.20</span><del class="prev-price">$145.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                        </div> --}}
                        <!-- Single Product End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- #grid view End -->
                <div id="list-view" class="tab-pane fade">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="row">
                            <!-- Product Image Start -->
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/23.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/24.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                     <span class="sticker-new">new</span>
                                </div>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="pro-content hot-product2">
                                    <h4><a href="{{ URL::to('/catalogo/perfil') }}">Accessorize with a straw hat</a></h4>
                                    <p><span class="price">$15.19</span></p>
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!Faded short sleeves t-shirt with high neckline. Soft and stretchy material.</p>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="" data-original-title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="row">
                            <!-- Product Image Start -->
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/30.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/31.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="pro-content hot-product2">
                                    <h4><a href="{{ URL::to('/catalogo/perfil') }}">Tretchy Material Comfortable</a></h4>
                                    <p><span class="price">$199.19</span><del class="prev-price">$205.50</del></p>
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!Faded short sleeves t-shirt with high neckline. Soft and stretchy material.</p>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="" data-original-title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="row">
                            <!-- Product Image Start -->
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/41.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/42.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                    <span class="sticker-new">new</span>
                                </div>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="pro-content hot-product2">
                                    <h4><a href="{{ URL::to('/catalogo/perfil') }}">Neckline Short Sleeves  Stretchy</a></h4>
                                    <p><span class="price">$58.19</span></p>
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!Faded short sleeves t-shirt with high neckline. Soft and stretchy material.</p>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="" data-original-title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="row">
                            <!-- Product Image Start -->
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/2.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="pro-content hot-product2">
                                    <h4><a href="{{ URL::to('/catalogo/perfil') }}">Accessorize with a straw hat</a></h4>
                                    <p><span class="price">$152.19</span><del class="prev-price">$160.50</del></p>
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!Faded short sleeves t-shirt with high neckline. Soft and stretchy material.</p>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="" data-original-title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="row">
                            <!-- Product Image Start -->
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="pro-img">
                                    <a href="{{ URL::to('/catalogo/perfil') }}">
                                        <img class="primary-img" src="/yekatex/img/products/23.jpg" alt="single-product">
                                        <img class="secondary-img" src="/yekatex/img/products/24.jpg" alt="single-product">
                                    </a>
                                    <a href="shop.html#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="pro-content hot-product2">
                                    <h4><a href="{{ URL::to('/catalogo/perfil') }}">Faded Short Sleeves T-shirt</a></h4>
                                    <p><span class="price">$15.19</span><del class="prev-price">$16.50</del></p>
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!Faded short sleeves t-shirt with high neckline. Soft and stretchy material.</p>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="" data-original-title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- #list view End -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="pro-pagination">
                      <ul class="blog-pagination">
                        {{ $products->appends(request()->except('page'))->links() }}
                      </ul>
                      <div class="product-pagination">
                        <span class="grid-item-list">Showing 1 to 12 of 51 (5 Pages)</span>
                      </div>
                    </div>
                    <!-- Product Pagination Info -->
                  </div>
                </div>
                <!-- Product Pagination Info -->
            </div>
            <!-- Grid & List Main Area End -->
        </div>
