<div class="col-md-3 col-xs-12">
    <div class="filter-block">
        <div class="filter-block-shop filter-price">
            <div class="block-title">
                <h3>FILTRAR POR PRECIO</h3>
            </div>
            <span class="filter-button">
                <a href="shop-list-v2.html#" id="remove_filters">quitar filtros</a>
            </span>
            <div class="block-content">
                <div class="price-range-holder">
                    <input type="hidden" name="" id="min_price_" value={{\App\PriceRange::first()->start}}>
                    <input type="hidden" name="" id="max_price_" value="{{ \App\PriceRange::first()->end}}">
                    <input type="text" class="price-slider" id="price-slider_" value="">
                    <span class="min-max">
                        Price: {{\App\PriceRange::first()->start}} - {{\App\PriceRange::first()->end}}
                    </span>
                    <span class="filter-button">
                        <a href="shop-list-v2.html#" id="filter_by_price">Filter</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="filter-block-shop filter-cate">
            <div class="block-title">
                <h3>Categories</h3>
            </div>
            <div class="block-content">
                <ul>
                    @foreach($categories as $key => $category)
                    <li class="">
                        <a href="" data-slug={{ $category['slug'] }} class="catalog-category__change">{{ $category['name'] }}</a>
                        <span class="number">--</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="filter-block-shop">
            <div class="block-title">
                <h3>BRAND</h3>
            </div>
            <div class="block-content">
                <form>
                    @foreach($brands as $key => $brand)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" data-slug={{ $brand['slug'] }} value="" class="catalog-brand__change">{{ $brand['name'] }}</label>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="filter-block-shop filter-color filter-cate-color">
                <div class="block-title">
                    <h3>Color</h3>
                </div>
                <div class="block-content">
                    <ul>
                        @foreach($colors as $key => $color)
                        <li><a href="" data-slug={{ $color['slug'] }} value="" class="catalog-color__change"><i class=""></i>{{ $color['name'] }} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
