    <!-- All atributes -->
    <div id="table_category-attribute">
      @foreach($category_attributes as $key => $category_attribute)
      <div class="filter-block-shop mb-4">
        <div class="aside-title"><h5>{{ $category_attribute['name'] }}</h5></div>
        <div class="block-content">
          <form>
            @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
            <div class="mb-1">
              <input type="checkbox" data-index={{ $attribute['id'] }} value="" class="inputcheck catalog-attribute__change" id="atributo{{$key}}{{$i}}0"  style="display: none;">
              <label class="checkbox" for="atributo{{$key}}{{$i}}0" style=""><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;{{ $attribute['name'] }}</label>
            </div>
            @endforeach
            </form>
          </div>
        </div>
        @endforeach
    </div>
