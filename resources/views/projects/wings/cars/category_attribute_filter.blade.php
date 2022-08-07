<div class="panel" id="table_category-attribute">
    @foreach ($category_attributes as $key =>  $category_attribute)
    <div class="acod-head">
        <h5 class="acod-title">
        <a data-toggle="collapse"  href="new-car-search-result-list.html#fuel-type{{ $key }}" class="collapsed" >
              {{ $category_attribute['name'] }}
          </a>
        </h5>
      </div>
    <div id="fuel-type{{ $key }}" class="acod-body collapse">
        <div class="acod-content">
          <div class="product-brand">
            @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
            <div class="search-content">
              <input id="fuel{{ $key }}{{ $i }}" data-index={{ $attribute['id'] }} value="" class="catalog-attribute__change" type="checkbox">
              <label for="fuel{{ $key }}{{ $i }}" class="search-content-area">{{ $attribute['name'] }} </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>