{{-- <div class="panel" id="table_category-attribute">
    <div class="acod-head">
      <h5 class="acod-title">
        <a data-toggle="collapse" href="#brand" class="collapsed" >
          Marcas
        </a>
      </h5>
    </div>
    <div id="brand" class="acod-body collapse in">
      <div class="acod-content">
        <div class="product-brand">
          <div class="search-content">
            <input id="brand1" type="checkbox">
            <label for="brand1" class="search-content-area">Carrera </label>
          </div>
          <div class="search-content">
            <input id="brand2" type="checkbox">
            <label for="brand2" class="search-content-area">Boxster  </label>
          </div>
          <div class="search-content">
            <input id="brand3" type="checkbox">
            <label for="brand3"  class="search-content-area">3-Series </label>
          </div>
          <div class="search-content">
            <input id="brand4" type="checkbox">
            <label for="brand4"  class="search-content-area">Cayenne </label>
          </div>
          <div class="search-content">
            <input id="brand5" type="checkbox">
            <label for="brand5"  class="search-content-area">F-type</label>
          </div>
          <div class="search-content">
            <input id="brand6" type="checkbox">
            <label for="brand6"  class="search-content-area">GT-R </label>
          </div>
          <div class="search-content">
            <input id="brand7" type="checkbox">
            <label for="brand7"  class="search-content-area">GTS </label>
          </div>
          <div class="search-content">
            <input id="brand8" type="checkbox">
            <label for="brand8"  class="search-content-area">M6 </label>
          </div>
          <div class="search-content">
            <input id="brand9" type="checkbox">
            <label for="brand9"  class="search-content-area">Macan </label>
          </div>
          <div class="search-content">
            <input id="brand10" type="checkbox">
            <label for="brand10"  class="search-content-area">Mazda6 </label>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

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