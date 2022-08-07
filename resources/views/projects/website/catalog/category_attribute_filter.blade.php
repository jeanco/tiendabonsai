    <!-- All atributes -->
    <div id="table_category-attribute">
      @foreach($category_attributes as $key => $category_attribute)
      <div class="filter-block-shop">
        <div class="block-title">
          <h3>{{ $category_attribute['name'] }}</h3>
        </div>
        <div class="block-content">
          <form>
            @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
            <div class="checkbox">
              <label>
                <input type="checkbox" data-slug={{ $attribute['slug'] }} value="" class="catalog-brand__change">{{ $attribute['name'] }}</label>
              </div>
              @endforeach
            </form>
          </div>
        </div>
        @endforeach
    </div>