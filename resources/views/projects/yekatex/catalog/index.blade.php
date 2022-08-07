@extends('yekatex.layouts.index')
@section('content')
<!-- Breadcrumb Start -->
<!-- <div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="{{ URL::to('/catalogo/perfil') }}">Shop</a></li>
            </ul>
        </div>
    </div>
</div> -->
<!-- Breadcrumb End -->
<!-- Shop Page Start -->
<div class="main-shop-page pt-50 pb-100 ptb-sm-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar">
                    <!-- Sidebar Electronics Categorie Start -->
                    <div class="electronics mb-40">
                        <h3 class="sidebar-title">Filtros</h3>
                        <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                            <ul>
                                @foreach($categories as $key => $category)
                                    <li class="has-sub"><a href="#" data-slug={{ $category['slug'] }} class="catalog-category__change">{{ $category['name'] }}</a>
                                    <ul class="category-sub">
                                        @foreach($category['subcategories'] as $u => $subcategory)
                                    <li><a href="#" data-slug={{ $subcategory['slug'] }} class="catalog-subcategory__change">{{ $subcategory['name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </div>
                    <!-- Sidebar Electronics Categorie End -->
                    <!-- Price Filter Options Start -->
                    <div class="search-filter mb-40">
                        <h3 class="sidebar-title">filter by price</h3>
                        <form action="shop.html#" class="sidbar-style">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" class="amount-range" readonly>
                        </form>
                    </div>
                    <!-- Price Filter Options End -->
                    <!-- Sidebar Categorie Start -->
                    @foreach($category_attributes as $y => $category_attribute)
                    <div class="sidebar-categorie mb-40">
                    <h3 class="sidebar-title">{{ $category_attribute['name'] }}</h3>
                        <ul class="sidbar-style">
                            @foreach($category_attribute['attributes_relationship'] as $t => $attribute)
                            <li class="form-check">
                                <input class="form-check-input catalog-brand__change" data-slug={{ $attribute['slug'] }} value="#" type="checkbox">
                                <label class="form-check-label" for="camera">{{ $attribute['name'] }} (8)</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    {{-- <!-- Sidebar Categorie Start -->
                    <!-- Product Size Start -->
                    <div class="size mb-40">
                        <h3 class="sidebar-title">size</h3>
                        <ul class="size-list sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="" id="small" type="checkbox">
                                <label class="form-check-label" for="small">S (6)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="" id="medium" type="checkbox">
                                <label class="form-check-label" for="medium">M (9)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="" id="large" type="checkbox">
                                <label class="form-check-label" for="large">L (8)</label>
                            </li>
                        </ul>
                    </div>
                    <!-- Product Size End -->
                    <!-- Product Color Start -->
                    <div class="color mb-40">
                        <h3 class="sidebar-title">color</h3>
                        <ul class="color-option sidbar-style">
                            <li>
                                <span class="white"></span>
                                <a href="shop.html#">white (4)</a>
                            </li>
                            <li>
                                <span class="orange"></span>
                                <a href="shop.html#">Orange (2)</a>
                            </li>
                            <li>
                                <span class="blue"></span>
                                <a href="shop.html#">Blue (6)</a>
                            </li>
                            <li>
                                <span class="yellow"></span>
                                <a href="shop.html#">Yellow (8)</a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- Product Color End -->
                    <!-- Product Top Start -->
                    {{-- <div class="top-new mb-40">
                        <h3 class="sidebar-title">Top New</h3>
                        <div class="side-product-active owl-carousel">
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/20.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/19.jpg" alt="single-product">
                                        </a>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$130.45</span><del class="prev-price">180.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/2.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/1.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/3.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/4.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Proin Work Lamp Silver </a></h4>
                                        <p><span class="price">$150.45</span><del class="prev-price">$200.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/25.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/26.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Side Item End -->
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/41.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/42.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$80.45</span><del class="prev-price">$100.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/36.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/35.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/33.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/34.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Lamp Proin Work  Silver </a></h4>
                                        <p><span class="price">$120.45</span><del class="prev-price">130.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/31.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/32.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$140.45</span><del class="prev-price">$150.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Side Item End -->
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/15.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/16.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Lamp Work Silver Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/17.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/18.jpg" alt="single-product">
                                        </a>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/23.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/24.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Proin Work Lamp Silver </a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ URL::to('/catalogo/perfil') }}">
                                            <img class="primary-img" src="/yekatex/img/products/25.jpg" alt="single-product">
                                            <img class="secondary-img" src="/yekatex/img/products/26.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{ URL::to('/catalogo/perfil') }}">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Side Item End -->
                        </div>
                    </div> --}}
                    <!-- Product Top End -->
                    <!-- Single Banner Start -->
                    <div class="col-img">
                        @foreach ($promotions_3 as $promotion_3)
                    <a href="{{ $promotion_3['link'] }}"><img src="{{ $promotion_3['image'] }}" alt="slider-banner"></a>
                        @endforeach
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2" id="table_data">
                @include('yekatex.catalog.3_right_catalog')
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->

@stop
@section('plugins-js')
<script src="/website/js/catalog.js"></script>
@stop
