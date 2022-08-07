<!-- Side bar start -->
<div class="col-sm-4 col-md-4 col-lg-3">
    <aside  class="side-bar">
        <!--  -->
        <div class="widget widget_categories">
            <h4 class="widget-title">Categorías</h4>
            <ul>
                <li><a class="catalog_category" data-index="" href="">Todos</a> ({{ count($category->products) }}) </li>
                @foreach ($category->subcategories as $subcategory)
                  <li><a class="catalog_category" href="" data-index={{ $subcategory['id'] }}>{{ $subcategory->name }}</a> ({{ count($subcategory->products) }}) </li>
                @endforeach
            </ul>
        </div>
        <!--  -->
        <div class="widget recent-posts-entry">
            <h4 class="widget-title">Filtros</h4>
            <div class="dlab-accordion advanced-search toggle" id="accordion1">
              <!--  -->
              <div class="panel">
                <div class="acod-head">
                  <h5 class="acod-title">
                    <a data-toggle="collapse" href="#city" class="collapsed">
                      Buscar Repuesto
                    </a>
                  </h5>
                </div>
                <div id="city" class="acod-body collapse in">
                  <div class="acod-content">
                    <input type="search" id="catalog-product__search" value="" class="form-control" placeholder="Buscar...">
                  </div>
                </div>
              </div>
              <!--  -->
              <!--div class="panel">
                <div class="acod-head">
                  <h5 class="acod-title">
                    <a data-toggle="collapse" href="#price-range">
                      Price Range
                    </a>
                  </h5>
                </div>
                <div id="price-range" class="acod-body collapse in">
                  <div class="acod-content">
                    <div class="price-slide range-slider m-b30">
                      <div class="price">
                        <label for="amount">Price Range</label>
                        <input type="text" id="amount" class="amount" readonly="" value="$200 - $5000" />
                        <div id="slider-range"></div>
                      </div>
                     </div>
                  </div>
                </div>
              </div-->
              <!--  -->
              @include('wings.catalog.category_attribute_filter')
              <!--  -->
            </div>
        </div>
    </aside>
</div>
<!-- Side bar END -->
