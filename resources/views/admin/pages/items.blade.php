<header class="c-sub-header u-bg-white">
  <div class="u-flex u-flex-1">
    <div class="c-sub-header__categories-container">
      <div class="c-category__mask toggle-sub-menu"></div>
      <button type="button" class="c-category__dropdown toggle-sub-menu">
        Categorías <span class="caret"></span>
      </button>

      <ul class="c-category__container">
        @foreach($categories as $key => $category)
          <li class="c-category">
            <div class="u-flex u-justify-between u-items-center u-py3 u-px4">
              <button class="c-category__name">{{$category->name}}</button>

              <div class="u-flex">
                <button data-target="#add-category" data-category_id="{{$category->id}}" class="btn btn-success u-mr2 toggle-sub-menu category_edit" data-toggle="modal" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>

                <button type="button" data-category_id="{{$category->id}}" class="btn btn-danger toggle-sub-menu category_delete" title="Eliminar">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </div>
            </div>

            <ul class="c-category__subcategory-list">
              {{-- @foreach($category->subcategories as $key => $subcategory)
                <li class="c-category__subcategory">
        					<a class='toggle-sub-menu u-mr3 one-subcategory' href="#" data-subcategory_id="{{$subcategory->id}}" data-category_id="{{$category->id}}">
        							{{ $subcategory->name }}
        					</a>
                  <div class="u-flex">
                    <button data-target="#subcategory-modal" class="btn btn-success toggle-sub-menu u-mr2 subcategory_edit" data-subcategory_id="{{$subcategory->id}}" data-toggle="modal" title="Editar">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-danger toggle-sub-menu subcategory_delete" data-subcategory_id="{{$subcategory->id}}" title="Eliminar">
                      <i class="glyphicon glyphicon-trash"></i>
                    </button>
                  </div>
                </li>
              @endforeach
              <li  class='u-py3 u-px4 text-center'>
                <button data-target="#subcategory-modal" class="btn btn-success toggle-sub-menu subcategory_add" data-category_id="{{$category->id}}" data-toggle="modal" title="Editar">
                  <i class="glyphicon glyphicon-plus"></i> Nueva Subcategoria
                </button>
              </li>
            </ul>
          </li>
        @endforeach --}}
		<li class='u-py3 u-px4 text-center'>
		  <button data-target="#add-category" class="btn btn-success toggle-sub-menu category_add" data-toggle="modal" title="Editar">
			<i class="glyphicon glyphicon-plus"></i> Nueva Categoría
		  </button>
		</li>
      </ul>
    </div>
    <div class="c-sub-header__search">
      <input class="" id="product_to_search" type="text" name="search" placeholder="Buscar"/>
      <i class="glyphicon glyphicon-search"></i>
    </div>
    
  </div>
</header>

<div class="row u-mx4 u-mb4 u-mt5 u-bg-white">
  <input type="hidden" id="current_category_id" name="" value="">
  <input type="hidden" id="current_subcategory_id" name="" value="">

  <div class="col-md-12 u-pt4 u-pb5" style="display:none;">
  	<div class="col-lg-3 col-xl-2">
  		<h2 id="current_category_name" class="man u-primary"></h2>
  	</div>
  	<div class="col-lg-9 col-xl-9">
  		<p id="current_category_content" class=" u-tertiary mbn">
  		</p>
  	</div>
  </div>

  <div class="col-md-12 u-pt5 u-pb5">
	  <div class="col-lg-3 col-xl-2">
		  <h2 id="current_subcategory_name" class="u-mt0 u-mb3 u-primary"></h2>
	  </div>
	  <div class="col-lg-9 col-xl-9">
		  <p id="current_subcategory_content" class=" u-tertiary mbn">
		  </p>
	  </div>
  </div>

  <section class="col-md-12 " id="products_grid">
    <div class="col-lg-4 col-md-6">
      <button class="c-item c-item--add" id="product_add" data-target="#edit-item" data-toggle="modal">
        <i class="glyphicon glyphicon-plus"></i>
        <h3>Añadir Producto</h3>
      </button>
    </div>
  </section>
</div>
