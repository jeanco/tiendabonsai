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
  {{-- <aside class="single-side-box feature">
    <div class="filter-block">
      <div class="filter-block-shop filter-price">
        <div class="aside-title"><h5>Filtrar por Precio</h5></div>
        <div class="find-home-item">
            <!-- shop-filter -->
            <div class="shop-filter">
                <div class="price_filter">
                    <div class="price_slider_amount">
                        <input type="submit" value="price range" />
                        <input type="text" id="amount1" name="price"
                            placeholder="Add Your Price" />
                    </div>
                    <div id="slider-range"></div>
                </div>
            </div>
        </div>
        <span class="filter-button">
          <a href="#" id="remove_filters1">quitar filtros</a>
        </span>

      </div>
    </div>
  </aside><br> --}}
  <aside class="single-side-box feature">
    @include('antofagasta.catalog.category_attribute_filter')
  </aside><br>

  <!-- <aside class="single-side-box feature sm-none">
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
                                    <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="feature__img">
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
        </aside> -->
</div>
  <script type="text/javascript">
 /* $(document).ready(function() {
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
