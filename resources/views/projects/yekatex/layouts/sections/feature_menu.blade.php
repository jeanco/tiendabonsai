<div class="sidebar">
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
</div>
