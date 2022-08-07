<div class="col-md-9 col-xs-12">
    <div class="filter-block bd">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-view">
                    <span>Showing 1–12 of 40 results</span>
                    <div class="button-view">
                        <span class="col"><i class="ion-ios-keypad fa-3a"></i></span>
                        <span class="list"><i class="icon-grid-4"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-7 margin-top3">
                <div class="box show pull-left">
                    <span>Mostrar</span>
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">12
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="filter_per_page" data-value=12 href="">12</a></li>
                        <li><a class="filter_per_page" data-value=24 href="">24</a></li>
                        <li><a class="filter_per_page" data-value=36 href="">36</a></li>
                    </ul>
                    <span>Por página</span>
                </div>
                <div class="box sort pull-right">
                    <span>Sort by:</span>
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" id="menu2">
                    <span class="dropdown-label">Relevancia</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                        <li><a href="" class="ordered_by" data-value="relevance" title="">Relevancia</a></li>
                        <li><a href="" class="ordered_by" data-value="min_price" title="">Precio menor</a></li>
                        <li><a href="" class="ordered_by" data-value="max_price" title="">Precio mayor</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="product-list grid_full grid_sidebar grid-uniform">
        @foreach ($products as $product)
        <div class="product-list-item">
            <div class="product-item-img">
                <a href="/productos/{{ $product->slug }}"><img src="{{ $product->image->resource_thumb }}" alt="images" class="img-responsive" style="height: 200px"></a>
                <div class="label label-2 red label-top-20">Hot</div>
            </div>
            <div class="product-item-info" >
                <h3  style="height: 75px; font-size: 5px;"><a href="/productos/{{ $product->slug }}" title="">{{ $product->name }}</a></h3>
                <div class="product-item-star ratingstar sm">
                    <a href="shop-list-v2.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-list-v2.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-list-v2.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-list-v2.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-list-v2.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <span class="number">(12)</span>
                </div>
                <div class="prod-price">
                    <span class="price black">S/.{{ $product->price }}</span>
                </div>
                <div class="button-ver2">
                    <a href="" class="addcart-ver2 add_to_cart" data-index="{{ $product->id }}" style="margin-bottom: 10px;" title="Add to cart"><span class="icon"></span>ADD TO CART</a>
                    {{--<a href="/productos/{{ $product->slug }}" class="quickview" title="quick view"><i class="ion-eye fa-4" aria-hidden="true"></i></a>
                    <a href="#" class="wishlist ver_click" title="wishlist"><i class="ion-heart fa-4" aria-hidden="true"></i></a>--}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="product-pagination">
        {{ $products->appends(request()->except('page'))->links() }}
    </div>
</div>

