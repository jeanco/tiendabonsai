<!--Form Column-->
<div class="form-column pull-left col-md-3 col-xs-12">

    <!-- Search Box -->
    <div class="faq-search-box mb-2">
      <div class="outer-box">
            <!-- <form> -->
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Buscar" id="catalog-product__search">
                    <button type="button"><span class="icon fa fa-search"></span></button>
                </div>
            <!-- </form> -->
        </div>
    </div>

    <!--Select Car Tabs-->
    <div class="select-cars-tabs">
        <!--  -->
        <!--Cars Form-->
        <div class="cars-form" style="padding: 10px 20px;">
            <form method="" action="">
                <div class="form-group">
                    <label>Marca:</label>
                    <select class="custom-select-box catalog-category__change">
                        <option>Todos</option>
                        @foreach($categories as $category)
                            <option data-slug="{{ $category['slug'] }}" value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                        {{--
                        <option>Brilliance</option>
                        <option>JMC</option>
                        <option>Mihandra</option>
                        --}}
                    </select>
                </div>

                <div class="form-group">
                    <label>Tipo:</label>
                    <select class="custom-select-box catalog-subcategory__change">
                        <option>Todos</option>
                        {{--
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Hatchback</option>
                        <option>Buses</option>
                        --}}
                    </select>
                </div>

                <div id="table_category-attribute">
                    @include('template_8.catalog.attribute_filter')
                </div>
                {{--
                <div class="form-group">
                  <a href="/" class="theme-btn btn-style-one" id="apply_filters">Aplicar Filtros</a>
                </div>
                <div class="form-group">
                  <a href="/catalogo" type="reset" class="reset-all"><span class="fa fa-refresh"></span>Reinciar</a>
                </div>
                --}}

            </form>
        </div>

    </div>
    <!--End Select Car Tabs-->

</div>
