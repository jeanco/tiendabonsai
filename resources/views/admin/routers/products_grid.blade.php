@extends('admin.layouts.index') @section('content')
<header class="c-sub-header u-bg-white">
  <div class="u-flex u-flex-1">
    <input type="hidden" value={{in_array('nueva-categoria', $permissions_array)}}>
    @if(in_array('ver-select-de-categorias', $permissions_array))

    <div class="c-categoriy__wrapper">
      <div class="c-category__mask hide-sub-menu"></div>
      <button type="button" class="c-category__dropdown toggle-sub-menu">
      Categorías
      <span class="caret"></span>
      </button>
      <ul class="c-category__container" style="width: 400px;">
        @if(in_array('nueva-categoria', $permissions_array))
        <li class='u-py3 u-px4 text-center c-category'>
          <button data-target="#category-modal" class="btn btn-success hide-sub-menu category__add" data-toggle="modal" title="Nueva Categoría">
          <i class="glyphicon glyphicon-plus"></i> Nueva Categoría
          </button>
        </li>
        @endif

        @foreach($categories as $key => $category)
        <li class="c-category">
          <div class="u-flex u-justify-between u-items-center u-py3 u-px4">
            <div class="u-flex">
              @if(in_array('editar-categoria', $permissions_array))
              <button onclick="categoryEdit(this)" data-target="#category-modal" value="{{$category['id']}}" class="btn btn-success u-mr2 hide-sub-menu category__edit"
              data-toggle="modal" title="Editar">
              <i class="glyphicon glyphicon-pencil"></i>
              </button>
              @endif

              @if(in_array('eliminar-categoria', $permissions_array))
              <button type="button" onclick="categoryDelete(this)" value="{{$category['id']}}" class="btn btn-danger hide-sub-menu" title="Eliminar">
              <i class="glyphicon glyphicon-trash"></i>
              </button>
              @endif
            </div>
            <button class="c-category__name">{{$category['name']}} ({{count($category['products'])}} u.)</button>
          </div>
          <ul class="c-category__subcategory-list" style="overflow-y: auto;">
            @if(in_array('nueva-sub-categoria', $permissions_array))
            <li class='u-py3 u-px4 text-center'>
              <button onclick="subcategoryAdd(this)" data-target="#subcategory-modal" class="btn btn-success hide-sub-menu" data-category_id="{{$category['id']}}"
              data-category_name="{{$category['name']}}" data-toggle="modal" title="Editar">
              <i class="glyphicon glyphicon-plus"></i> Nueva Subcategoria
              </button>
            </li>
            @endif

            @foreach($category['subcategories'] as $key => $subcategory)
            <li class="c-category__subcategory">
              <a onclick="updateCategorySubcategory(this)" class='hide-sub-menu u-mr3' href="#" data-subcategory_id="{{$subcategory['id']}}"
                data-category_id="{{$category['id']}}">
                {{ $subcategory['name'] }} ({{count($subcategory['products'])}} u.)
              </a>
              <div class="u-flex">
                @if(in_array('editar-sub-categoria', $permissions_array))
                <button onclick="subcategoryEdit(this)" data-target="#subcategory-modal" class="btn btn-success hide-sub-menu u-mr2" value="{{$subcategory['id']}}"
                data-category_name="{{$category['name']}}" data-toggle="modal" title="Editar">
                <i class="glyphicon glyphicon-pencil"></i>
                </button>
                @endif

                @if(in_array('eliminar-sub-categoria', $permissions_array))
                <button type="button" onclick="subcategoryDelete(this)" class="btn btn-danger hide-sub-menu" value="{{$subcategory['id']}}"
                title="Eliminar">
                <i class="glyphicon glyphicon-trash"></i>
                </button>
                @endif
              </div>
            </li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="c-sub-header__search">
      <input class="" id="product_to_search" type="text" name="search" placeholder="Buscar" />
      <i class="glyphicon glyphicon-search"></i>
    </div>
    <a href="/admin/productos-lista"><button  title="Ver en formato Lista de productos" class=" btn-info glyphicon glyphicon-th-list" style="width: 45px; height: 59px; display:none;"> </button></a>
    <!--span style="padding: 18px; font-weight: bold;">Ver en forma de lista</span-->
  </div>
</header>

<div class="row u-mx4 u-mb4 u-mt5 u-bg-white" id="product_wrap" style="display:none">
  <div class="row">
    <h3 class="text-center u-primary u-mb5 u-mt0">Información del Producto</h3>
    <div id="product-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>
    {!! Form::open(array('id' => 'product_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="id" id="product_id">
    <div class="col-md-12">
      <div class="col-md-7">

        <div class="form-group">
          <label for="">Nombre comercial de producto</label>
          <input type="text" name="name" class="form-control" id="product_name">
          <div class="mensaje-error" id="product-name-error"></div>
        </div>

        @if(in_array('descripcion-del-producto', $permissions_array))
        <div class="form-group">
          <label for="">Descripción</label>
          <textarea name="description" rows="50" class="form-control" id="product_description"></textarea>
          <div class="mensaje-error" id="product-description-error"></div>
        </div>
        @endif
        @if(in_array('detalles-del-producto', $permissions_array))
        <div class="form-group">
          <label for="">Detalles del Producto (Especificaciones)</label>
          <textarea name="specifications" class="form-control" id="product_specifications"></textarea>
        </div>
        @endif
        @if(in_array('caracteristicas-del-producto', $permissions_array))
        <div class="form-group">
          <label for="">Características del Producto</label>
          <textarea name="features" class="form-control" id="product_features"></textarea>
        </div>
        @endif
      </div>
      <div class="col-md-5">

        <div class="form-group">
              <label for="">Código de Producto</label>
              <input type="text" name="code" class="form-control" id="">
        </div>

        <div class="form-group">
              <label for="">Tipo</label>
            <select name="type_id" class="form-control">
               <option value="2">RG</option>
              <option value="1">ZF</option>

            </select>
        </div>

        <div class="form-grup">
              <label for="">Categoría</label>
            <select name="category_id" class="form-control" id="product_category"></select>
            <div class="mensaje-error" id="product-category-error"></div>
        </div>

        <div class="form-grup" style="margin-top:10px;">
            <label for="">Subcategoría</label>
            <select name="subcategory_id" class="form-control" id="product_subcategory"></select>
            <div class="mensaje-error" id="product-subcategory-error"></div>
        </div>

        <div class="form-group" style="margin-top:10px;">
          <label for="">Precio público sugerido</label> &emsp;&emsp;
          {{--<label class="radio-inline"><input type="radio" name="optradio1" checked>con Precio</label>
          <label class="radio-inline"><input type="radio" name="optradio1">Gratis</label>--}}


          <div class="input-group">
            <input type="text" name="price" class="form-control" id="product_price">
            <span class=" input-group-addon u-mb4 u-bg-success"> En su moneda </span>
          </div>
          <div class="mensaje-error" id="product-price-error"></div>

        </div>

        <div class="form-group" style="margin-top:10px; display: none;">
          <label class="u-mb0"><input type="checkbox" id="hidden-price">Ocultar precio público</label>
          <div class="input-group" style="display: none;">
            <label for="">Indicar mensaje por defecto al ocultar precio</label>
            <input type="text" placeholder="Ejm. a consultar" name="message_about_price" class="form-control">
          </div>
        </div>


        @if(in_array('comision-de-producto', $permissions_array))
        <div class="form-group">
            <label for="">Comisión:</label>
            <input type="text" name="" class="form-control">
        </div>
        @endif

        {{--<div class="form-group">
          <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cant.</th>
                    <th></th>
                </tr>
            </thead>
            <tbady>
              <tr role="row" class="odd">
                  <td ><input type="text" name="price" class="form-control" value="Precio x Docena"></td>
                  <td><input type="text" name="price" class="form-control" value="100.00"></td>
                  <td><input type="text" name="price" class="form-control" value="12"></td>
                  <td><span class=" input-group-addon u-mb4 u-bg-danger"> X </span></td>
                </tr>
            </tbady>
        </table>

        </div> --}}
        @if(in_array('stock-de-producto', $permissions_array))
        <div class="form-group">
          <label for="">Stock</label> &emsp;&emsp;
          {{--<label class="radio-inline"><input type="radio" name="optradio" checked>Disponible</label>
          <label class="radio-inline"><input type="radio" name="optradio">Agotado</label>--}}
          <input type="text" name="stock" class="form-control" id="product_stock">
          <div class="mensaje-error" id="product-stock-error"></div>
        </div>
        @endif

        <div class="form-group">
          <label for="">Compra mínima</label> &emsp;&emsp;
          <input type="text" name="minimum_quantity" class="form-control" id="product_minimum-quantity" value="1">
          <div class="mensaje-error" id="product-minimum-quantity-error"></div>
        </div>

        @if(in_array('tiempo-de-entrega', $permissions_array))
        <div class="form-group">
          <label for="">Tiempo de entrega</label>
          <input type="text" name="delivery_time" id="product_delivery-time" class="form-control">
        </div>
        @endif

        @if(in_array('tiempo-de-instalacion', $permissions_array))
        <div class="form-group">
          <label for="">Tiempo de instalación</label>
          <input type="text" name="installation_time" id="product_installation-time" class="form-control">
        </div>
        @endif

        <div class="form-group" style="display:none">
          <label for="">Garantía</label>
          <input type="text" name="warranty" class="form-control" id="product_warranty">
        </div>

        @if(in_array('filtros-para-la-busqueda', $permissions_array))
        <div class="form-group">
            <label for="">Filtros para la búsqueda</label>
        </div>

        <div id="product_attributes">
        </div>
        @endif

        <div class="form-group" style="display:none">
            <label for="">Etiqueta</label>
            <select class="js-example-basic-multiple" id="etiquettes" multiple="multiple" style="width: 100%">
              @foreach($etiquettes as $etiquette)
                <option value="{{ $etiquette['id'] }}"> {{ $etiquette['name'] }} </option>
              @endforeach
            </select>

        </div>

        @if(in_array('pais-y-ciudad', $permissions_array))
        <div class="form-group">
            <label for="">País</label>
            <select name="country_id" class="form-control" id="product_country"></select>
        </div>

        <div class="form-group">
            <label for="">Ciudad</label>
            <select name="city_id" class="form-control" id="product_city"></select>
        </div>
        @endif

        @if(in_array('direccion', $permissions_array))
       <div class="form-group">
          <label for="">Dirección</label>
          <input type="text" name="address" id="product_address_" class="form-control">
        </div>
        @endif

        @if(in_array('google-maps', $permissions_array))
        <div class="form-group">
          <input type="text" id="product_address" name="" class="form-control u-mb3" placeholder="Google Maps" />
          <input type="hidden" id="product_latitude" name="latitude" value="">
          <input type="hidden" id="product_longitude" name="longitude" value="">
          <div id="location" style="width: 100%; height: 200px;" class="u-mb3"></div>
        </div>
        @endif

        @if(in_array('ficha-tecnica', $permissions_array))
        <div class="form-grup">
          <label for="">Ficha técnica</label>
          <input type="file" class="form-control" id="product_pdf" name="product_pdf">
          <a href="" class="" id="product_pdf-link">Ver Ficha técnica</a>
        </div>
        @endif

        @if(in_array('brochure-del-producto', $permissions_array))
        <div class="form-grup">
          <label for="">Brochure del producto</label>
          <input type="file" class="form-control" id="product_brochure" name="brochure">
          <a href="" class="" id="product_brochure-link">Ver Brochure</a>
        </div>
        @endif

        @if(in_array('enlace-de-youtube', $permissions_array))
        <div class="form-group">
          <label for="">Enlace de Youtube</label>
          <input type="text" name="link" class="form-control" id="product_link">
          <!-- <div class="mensaje-error" id="product-price-error"></div> -->
        </div>
        @endif

        <div class="form-group" style="display:none">
          <label for="">Video Promocional</label>
          <input type="text" name="video" class="form-control" id="product_video">
        </div>
      </div>
    </div>
    {!! Form::close() !!}
    <div class="col-md-12 col-xs-12 u-mb3 text-center">
      <button type="button" class="btn btn-primary btn-modal" id="product__save">Crear</button>
      <button type="button" class="btn btn-primary btn-modal" id="product__update">Actualizar</button>
      <button type="button" class="btn btn-primary btn-modal" id="product__close">Cancelar</button>
    </div>
  </div>
</div>

<div class="row u-mx4 u-mb4 u-mt5 u-bg-white" id="products_wrap">

    <input type="hidden" id="current_category_id" name="" value="">
    <input type="hidden" id="current_subcategory_id" name="" value="">

    <div class="col-md-12 title_grid_product">
      <h3 id="current_category_name"></h3><h3>/</h3>
      <h3 id="current_subcategory_name"></h3><h3>/</h3>
    </div>

    <input type="hidden" id="product_add" value={{ in_array('anadir-producto', $permissions_array) }}>
    <input type="hidden" id="product_publish" value={{ in_array('publicar-producto', $permissions_array) }}>
    <input type="hidden" id="product_highlight" value={{ in_array('destacar-producto', $permissions_array) }}>
    <input type="hidden" id="product_promote" value={{ in_array('promocionar-producto', $permissions_array) }}>
    <input type="hidden" id="product_edit" value={{ in_array('editar-producto', $permissions_array) }}>
    <input type="hidden" id="product_edit-images" value={{ in_array('editar-imagenes-de-producto', $permissions_array) }}>
    <input type="hidden" id="product_edit-prices" value={{ in_array('editar-precio-al-por-mayor', $permissions_array) }}>
    <input type="hidden" id="product_delete" value={{ in_array('eliminar-producto', $permissions_array) }}>


    {{-- <section class="col-md-12" id="products_grid"></section> --}}

    <section class="col-md-12">
      <div class="row row_grid_product" id="products_grid">



      </div>
    </section>

</div>
@endsection @section('scripts') {{-- Categorias --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/actions.js') }}"></script>
{{-- Subcategories --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/actions.js') }}"></script>
{{-- Productos --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Products/actions.js') }}"></script>
{{-- Promotion --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/product_promotion.js') }}"></script>
{{-- Product prices --}}
<script type="text/javascript" src="{{ URL::asset('/yekatex/js/product_prices.js') }}"></script>

<script type="text/javascript">
var altura = $('.c-sub-header').offset().top;
var flag = false;
$(window).on('scroll', function () {
if ($(window).scrollTop() >= altura && !flag) {
$('.c-sub-header').addClass('is-fixed');
flag = true;
} else if ($(window).scrollTop() < altura && flag) {
$('.c-sub-header').removeClass('is-fixed');
flag = false;
}
});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>

@endsection
