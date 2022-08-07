<div class="cate">
    <div class="container">
        <div class="row">
            @foreach($categories as $key => $category)
            <div class="col-md-2 col-sm-4 col-xs-12" style="margin-left: 35px;">
                <div class="heading-v3 dif">
                    <!-- <img src="" alt="images" class="img-responsive"> -->
                    <div class="photo">
                        <a href="/catalogo?category={{ $category['slug'] }}"><img src="{{ $category['icon'] }}" alt="images" class="img-responsive" style="filter: invert(100%); height: 50px; width: 50px;"></a>
                    </div>

                </div>
                <span>{{$category['name']}}</span>
                <div class="product-item ver3">
                
                    <ul>
                        @foreach($category['subcategories'] as $i => $subcategory)
                        <li><a href="/catalogo?category={{ $category['slug'] }}&subcategory={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach()
        </div>
    </div>
</div>
