<!-- Side bar start -->
<div class="col-sm-4 col-md-4 col-lg-3">
    <aside  class="side-bar">
        <div class="widget recent-posts-entry">
        <h4 class="widget-title">Filtros</h4>
        <div class="dlab-accordion advanced-search toggle" id="accordion1">
          <!-- Categorias -->
          <div class="panel">
            <div class="acod-head">
              <h5 class="acod-title">
                <a data-toggle="collapse" href="new-car-search-result-list.html#city" class="collapsed">Categorías</a>
              </h5>
            </div>

            <div class="acod-body collapse in">
              <div class="acod-content">
                <div class="input-group">

                  <select class="form-control" id="catalog_category">
                    <option value="">Todas las Categorías</option>
                    @foreach ($category->subcategories as $subcategory)
                      @if ($subcategory['id'] == app('request')->input('category'))
                        <option value="{{ $subcategory['id'] }}" selected>{{ $subcategory['name'] }}</option>
                      @else
                        <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}</option>

                      @endif


                    @endforeach

                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- Filtros -->
          <!--div class="panel">
            <div class="acod-head">
              <h5 class="acod-title">
                <a data-toggle="collapse" href="new-car-search-result-list.html#price-range">
                  Price Range
                </a>
              </h5>
            </div>
            <div id="price-range" class="acod-body collapse in">
              <div class="acod-content">

                <div class="price-slide range-slider m-b30">
                  <div class="price">
                    <label for="amount">Rango de Precio</label>
                    <input type="text" id="amount" class="amount" readonly="" value="$5000 - $50000" />
                    <div id="slider-range"></div>
                  </div>
                 </div>
              </div>
            </div>
          </div-->
          <!-- Buscador -->
          <div class="panel">
            <div class="acod-head">
              <h5 class="acod-title">
                <a data-toggle="collapse"  href="new-car-search-result-list.html#brand" class="collapsed" >
                  Buscar Producto
                </a>
              </h5>
            </div>
            <div class="acod-body collapse in">
              <div class="acod-content">
                <input type="search" value="" class="form-control" id="catalog-product__search" placeholder="Buscar...">
              </div>
            </div>
          </div>
          <!-- Marcas -->
          @include('wings.cars.category_attribute_filter')
        </div>
      </div>
    </aside>
</div>
<!-- Side bar END -->
