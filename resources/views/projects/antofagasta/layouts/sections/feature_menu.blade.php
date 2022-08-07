<div class="sidebar left">
  <aside class="single-side-box archive mb-4">
      <div class="aside-title">
          <h5>Categorías</h5>
      </div>
      <div class="archive-list">
          <ul>
            <li class="category"><a href="#" class="catalog-category__change {{(Request::get('category') == '') ? 'active' : ''}}" data-index=''>Todos</a></li>
            @foreach($categories as $key => $category)
              <li class="category"><a href="#" class="catalog-category__change {{($category['id'] == Request::get('category')) ? 'active' : ''}}" data-index="{{ $category['id'] }}">{{ $category['name'] }}</a></li>
            @endforeach
          </ul>
      </div>
  </aside><br>
  <aside class="single-side-box feature">
    <div class="filter-block">
      <div class="filter-block-shop filter-price">
        <div class="aside-title"><h5>Filtrar por Precio</h5></div>
        <div class="find-home-item">
            <!-- shop-filter -->
            <div class="shop-filter">
                <div class="price_filter">
                    <div class="price_slider_amount">
                        <input type="submit" value="price range" />
                        <input type="text" id="amount" name="price"
                            placeholder="Add Your Price" />
                    </div>
                    <div id="slider-range"></div>
                </div>
            </div>
        </div>
        <span class="filter-button">
          <a href="#" id="remove_filters">quitar filtros</a>
        </span>

      </div>
    </div>
  </aside><br>
  <aside class="single-side-box feature">
    <!-- All atributes -->
    <div id="table_category-attribute">
      @foreach($category_attributes as $key => $category_attribute)
      <div class="filter-block-shop mb-4">
        <div class="aside-title"><h5>{{ $category_attribute['name'] }}</h5></div>
        <div class="block-content">
          <form>
            @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
            <div class="mb-2">
              <input type="checkbox" data-index={{ $attribute['id'] }} value="" class="inputcheck catalog-attribute__change" id="atributo{{$key}}{{$i}}"  style="display: none;">
              <label class="checkbox" for="atributo{{$key}}{{$i}}" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;{{ $attribute['name'] }}</label>
            </div>
            @endforeach
            </form>
          </div>
        </div>
        @endforeach
      <!-- end -->
    </div>

  </aside><br>

  <aside class="single-side-box feature sm-none">
            @foreach($categories_with_products as $u => $category)
            <div class="aside-title">
                <h5>{{ $category['name'] }} Destacadas</h5>
            </div>
            <div class="feature-property">
                <div class="row">
                    @foreach($category['products'] as $c => $product)
                    <div class="col-md-6 col-12">
                        <div class="single-property">
                            <div class="property-img">
                                <a href="/catalogo/{{ $product['slug'] }}">
                                    <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
                                </a>
                            </div>
                            <div class="property-desc text-center">
                                <div class="property-desc-top">
                                    <h6><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a>
                                    </h6>
                                    <h4 class="price">S/{{ $product['price'] }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </aside>
</div>
  <script type="text/javascript">
  /*$(document).ready(function() {
  //menu left toggle
  $('.toggle-nav').click(function() {
  // alert('done');
  $this = $(this);
  $nav = $('.nice-nav');
  //$nav.fadeToggle("fast", function() {
  //  $nav.slideLeft('250');
  //  });
  $nav.toggleClass('open');
  });
  $('.body-part').click(function(){
  $nav.addClass('open');
  });
  //  $nav.addClass('open');
  //drop down menu
  $submenu = $('.child-menu-ul');
  $('.child-menu .toggle-right').on('click', function(e) {
  e.preventDefault();
  $this = $(this);
  $parent = $this.parent().next();
  // $parent.addClass('active');
  $tar = $('.child-menu-ul');
  if (!$parent.hasClass('active')) {
  $tar.removeClass('active').slideUp('fast');
  $parent.addClass('active').slideDown('fast');
  } else {
  $parent.removeClass('active').slideUp('fast');
  }
  });
  }); */
  </script>
