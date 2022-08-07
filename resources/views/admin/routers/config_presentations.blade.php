@extends('admin.layouts.index') @section('content')


<div class="row u-mx4 u-mb4 u-mt5 u-bg-white" id="products_wrap">

<section class="col-md-12" >
	<div class="row">
		<div class="col-md-4">

        <div class="form-grup">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control" id="product_category">
                @foreach($categories as $category)
                  @if($category['id'] == $product['category_id'])
                    <option value="{{ $category['id'] }}" selected="selected">{{ $category['name'] }}</option>
                  @else
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                  @endif
                @endforeach
            </select>
            <!-- <div class="mensaje-error" id="product-category-error"></div> -->
        </div>

        <div class="form-grup" style="margin-top:10px;">
            <label for="">Subcategoría</label>
            <select name="subcategory_id" class="form-control" id="product_subcategory"></select>
            <div class="mensaje-error" id="product-subcategory-error"></div>
        </div>


		    <div class="form-group">
          <h4>Define la siguientes presentaciones de tu producto: {{ $product['name'] }}</h4>
        </div>

        <div class="form-grup" style="margin-top:10px;">
            <label for="">Código base:</label>
            <input type="text" class="form-control" name="code" id="product_base-code" value="{{ $main_product->code }}">
        </div>

        <div class="form-grup" style="margin-top:10px;">
            <label for="">Nombre base:</label>
            <input type="text" class="form-control" name="" id="product_base-name" value="{{ $main_product->name }}">
        </div>
		<div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona el Color:</label>
         	<select class="js-example-basic-multiple" id="color" name="color[]" multiple="multiple" style="width: 100%">
                @foreach($color_attributes as $color)
                    @if(count($color['color_presentations']))
                    <option value="{{ $color['id'] }}" selected="selected">{{ $color['name'] }}</option>
                    @else
                        <option value="{{ $color['id'] }}">{{ $color['name'] }}</option>
                    @endif
                @endforeach
			     <!-- <option value="AL">Rojo</option>
			  <option value="WY">Verde</option>
			  <option value="WY">Blanco</option> -->
			   </select>

        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona la talla:</label>
         	<select class="js-example-basic-multiple" id="size" name="size[]" multiple="multiple" style="width: 100%">
                @foreach($size_attributes as $size)
                    @if(count($size['size_presentations']))
                    <option value="{{ $size['id'] }}" selected="selected">{{ $size['name'] }}</option>
                    @else
                    <option value="{{ $size['id'] }}">{{ $size['name'] }}</option>
                    @endif
                @endforeach
<!-- 			  <option value="AL">S</option>
			  <option value="WY">M</option>
			  <option value="WY">XL</option> -->
			</select>

        </div>

        <div class="form-group">
          <label for="">Descripción</label>
          <textarea name="description" rows="20" class="form-control" id="product_description">{{ $product['description'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="">Características del Producto</label>
          <textarea name="features" rows="20" class="form-control" id="product_features">{{ $product['features'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="">Detalles del Producto (Especificaciones)</label>
          <textarea name="specifications" rows="20" class="form-control" id="product_specifications">{{ $product['specifications'] }}</textarea>
        </div>

	</div>
  <div class="col-md-8">
    <div class="table-responsive box-body">
        <form id="configuration-form">
            <input type="hidden" name="main_product_id" value="{{ $main_product_id }}">
            <input type="hidden" name="category_id" value="{{ $product->category_id }}">
            <input type="hidden" name="subcategory_id" value="{{ $product->subcategory_id }}">
    	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Color</th>
                <th>Talla</th>
                <th>Stock</th>
                <th>Precio Unitario</th>
                <th>Precio Promocional</th>
                <th>Mostrar en el catálogo</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="configurations-tbody">

            @foreach($presentations as $presentation)
            <tr>
                <input type="hidden" name="product_id[]" value="{{ $presentation['product_id'] }}">
                <input type="hidden" class="color-{{ $presentation['color']['id'] }}" name="color[]" value="{{ $presentation['color']['id'] }}">
                <input type="hidden" class="size-{{ $presentation['size']['id'] }}" name="size[]" value="{{ $presentation['size']['id'] }}">
                <td><li class="glyphicon glyphicon-picture product_images"></li></td>
                <td>{{ $presentation['color']['name'] }}</td>
                <td>{{ $presentation['size']['name'] }}</td>
                <td><input type="number" name="stock[]" value="{{ $presentation['product']['stock'] }}"></td>
                <td><input type="number" name="price[]" value="{{ $presentation['product']['price'] }}"></td>
                <td><input type="number" name="price_promotion[]" value="{{ $presentation['product']['price_promotion'] }}"></td>
                <td>
                    <select name="promotion_available[]">
                        @if($presentation['product']['promotion_available'])
                            <option value="1" selected="selected">Sí</option>
                            <option value="0">No</option>
                        @else
                            <option value="1">Sí</option>
                            <option value="0" selected="selected">No</option>
                        @endif
                    </select>
                </td>
                <td><a href="" class="delete-presentation" index="{{ $presentation['id'] }}">Eliminar</a></td>
            </tr>
            @endforeach

            {{--
            <tr>
                <td><li class="glyphicon glyphicon-picture"></li></td>
                <td>Rojo</td>
                <td>S</td>
                <td><input type="number" name="" value="15"></td>
                <td><input type="number" name="" value="350"></td>
            </tr>
            <tr>
                <td><li class="glyphicon glyphicon-picture"></li></td>
                <td>Rojo</td>
                <td>M</td>
                <td><input type="number" name="" value="15"></td>
                <td><input type="number" name="" value="350"></td>
            </tr>
           <tr>
                <td><li class="glyphicon glyphicon-picture"></li></td>
                <td>Rojo</td>
                <td>XL</td>
                <td><input type="number" name="" value="15"></td>
                <td><input type="number" name="" value="350"></td>
            </tr>
            --}}
        </tbody>

    </table>
    </form>
    <form action="/admin/configurar-presentaciones" method="POST" id="configuration-form-reload">
        <input type="hidden" name="product_id" value="{{ $main_product_id }}">
    </form>
    </div>
    <div class="form-group text-right">
    	<button class="btn btn-success" title="Guardar" id="configuration__save"><i class=""> Guardar</i></button>
    </div>
  </div>

	</div>



</section>
</div>
@include('admin.modals.item.price_item')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('admin/plugins/jszip/jszip.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/plugins/xlsx/xlsx.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/products_list.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/admin/panel/js/product_prices.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('admin/panel/js/product_promotion.js') }}"></script>

<!--
{{-- Categorias --}}
 <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/actions.js') }}"></script>
{{-- Subcategories --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/actions.js') }}"></script>
{{-- Productos --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Products/actions.js') }}"></script>
{{-- Promotion --}}

{{-- Product prices --}}

 -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $(`#color`).on('select2:select', function(e) {
        let _color_selected = e.params.data, _size_array = $('#size').select2('data');

        if (!_size_array) {
            return;
        }

        _size_array.forEach((value) => {
            //call ajax
            axios.get(`/admin/products/presentations?main_product_id=${$(`input[name="main_product_id"]`).val()}&color_id=${_color_selected.id}&size_id=${value.id}`)
            .then((response) => {
                if (response.data) {
                    $(`#configurations-tbody`).append(`
                        <tr>
                            <input type="hidden" name="product_id[]" value="${response.data.product_id}">
                            <input type="hidden" class="color-${_color_selected.id}" name="color[]" value="${_color_selected.id}">
                            <input type="hidden" class="size-${value.id}" name="size[]" value="${value.id}">
                            <td><li class="glyphicon glyphicon-picture product_images"></li></td>
                            <td>${_color_selected.text}</td>
                            <td>${value.text}</td>
                            <td><input type="number" name="stock[]" value="${response.data.product.stock}"></td>
                            <td><input type="number" name="price[]" value="${response.data.product.price}"></td>
                            <td><input type="number" name="price_promotion[]" value="${response.data.product.price_promotion}"></td>
                            <td>
                                <select name="promotion_available[]">
                                        ${(response.data.product.promotion_available) ? '<option value="1" selected="selected">Sí</option><option value="0">No</option>' : '<option value="1">Sí</option><option value="0" selected="selected">No</option>'}
                                </select>
                            </td>
                        </tr>
                        `);
                } else {
                    $(`#configurations-tbody`).append(`
                        <tr>
                            <input type="hidden" name="product_id[]" value="0">
                            <input type="hidden" class="color-${_color_selected.id}" name="color[]" value="${_color_selected.id}">
                            <input type="hidden" class="size-${value.id}" name="size[]" value="${value.id}">
                            <td><li class=""></li></td>
                            <td>${_color_selected.text}</td>
                            <td>${value.text}</td>
                            <td><input type="number" name="stock[]" value="0"></td>
                            <td><input type="number" name="price[]" value="0"></td>
                            <td><input type="number" name="price_promotion[]" value="0"></td>
                            <td>
                                <select name="promotion_available[]">
                                        <option value="1">Sí</option>
                                        <option value="0" selected="selected">No</option>
                                </select>
                            </td>
                        </tr>
                        `);
                }

            });

        });
    });

    $(`#size`).on('select2:select', function(e) {
        let _size_selected = e.params.data, _color_array = $('#color').select2('data');

        if (!_color_array) {
            return;
        }

        _color_array.forEach((value) => {

            axios.get(`/admin/products/presentations?main_product_id=${$(`input[name="main_product_id"]`).val()}&color_id=${value.id}&size_id=${_size_selected.id}`)
            .then((response) => {
                if (response.data) {
                    $(`#configurations-tbody`).append(`
                        <tr>
                            <input type="hidden" name="product_id[]" value="${response.data.product_id}">
                            <input type="hidden" class="color-${value.id}" name="color[]" value="${value.id}">
                            <input type="hidden" class="size-${_size_selected.id}" name="size[]" value="${_size_selected.id}">
                            <td><li class="glyphicon glyphicon-picture product_images"></li></td>
                            <td>${value.text}</td>
                            <td>${_size_selected.text}</td>
                            <td><input type="number" name="stock[]" value="${response.data.product.stock}"></td>
                            <td><input type="number" name="price[]" value="${response.data.product.price}"></td>
                            <td><input type="number" name="price_promotion[]" value="${response.data.product.price_promotion}"></td>
                            <td>
                                <select name="promotion_available[]">
                                        ${(response.data.product.promotion_available) ? '<option value="1" selected="selected">Sí</option><option value="0">No</option>' : '<option value="1">Sí</option><option value="0" selected="selected">No</option>'}
                                </select>
                            </td>
                        </tr>
                        `);
                } else {
                    $(`#configurations-tbody`).append(`
                        <tr>
                            <input type="hidden" name="product_id[]" value="0">
                            <input type="hidden" class="color-${value.id}" name="color[]" value="${value.id}">
                            <input type="hidden" class="size-${_size_selected.id}" name="size[]" value="${_size_selected.id}">
                            <td><li class=""></li></td>
                            <td>${value.text}</td>
                            <td>${_size_selected.text}</td>
                            <td><input type="number" name="stock[]" value="0"></td>
                            <td><input type="number" name="price[]" value="0"></td>
                            <td><input type="number" name="price_promotion[]" value="0"></td>
                            <td>
                                <select name="promotion_available[]">
                                        <option value="1">Sí</option>
                                        <option value="0" selected="selected">No</option>
                                </select>
                            </td>
                        </tr>
                        `);
                }

            });
        });

    });

    $(`#size`).on('select2:unselect', function(e) {
      let _size_id = e.params.data.id
      $(`#configurations-tbody`).find(`.size-${_size_id}`).each((i, element) => {
        $(element).parent().remove();
      });
    });

    $(`#color`).on('select2:unselect', function(e) {
      let _color_id = e.params.data.id;
      $(`#configurations-tbody`).find(`.color-${_color_id}`).each((i, element) => {
        $(element).parent().remove();
      });
    });

    document.querySelector(`#configuration__save`)
        .addEventListener(`click`, () => {
            lockWindow();

            if (!$(`#product_base-name`).val()) {
              swal(`Advertencia`,`El nombre base no puede estar vacío`,`warning`);
              unlockWindow();

              return;
            }

            if (!$(`#product_base-code`).val()) {
              swal(`Advertencia`,`El código base no puede estar vacío`,`warning`);
              unlockWindow();
              return;
            }


            let _formData = new FormData($(`#configuration-form`)[0]);
            _formData.append('category_id', $(`#product_category`).val());
            _formData.append('subcategory_id', $(`#product_subcategory`).val());
            _formData.append('description', $(`#product_description`).val());
            _formData.append('features', $(`#product_features`).val());
            _formData.append('specifications', $(`#product_specifications`).val());
            _formData.append('base_name', $(`#product_base-name`).val());
            _formData.append('code', $(`#product_base-code`).val());

            lockWindow();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name=_token]').val()
                }
            });
            $.ajax({
                url : `/admin/products/presentations`,
                type: 'POST',
                data: _formData,
                contentType: false,
                processData: false,
                success: function(e){
                    unlockWindow();

                    $(`#configuration-form-reload`).submit();

                },
                error:function(jqXHR, textStatus, errorThrown)
                {
                    // unlockWindow();
                    // $.each(jqXHR.responseJSON, function (key, value) {
                    //       $.each(value, function (errores, eror) {
                    //         $('#checkout-email-error').append("<li class='error-block'>" + eror + "</li>");
                    //       });
                    //   });
                }
            });

        });

    $(document).on('click', '.product_images', function(){
        $(`#product-images-modal`).modal('show');
        let _product_id = $(this).parent().parent().find(`input[name="product_id[]"]`).val();
        let _galleryTypeId = 1;
        if (!!document.getElementById("product_gallery-type")) {
            //Set the first option for the select gallery-type
            document.querySelector(`#product_gallery-type`).selectedIndex = 0;
            _galleryTypeId = document.querySelector(`#product_gallery-type`).value;
        }

        cleanImagesProductModal();

        let _productId = _product_id;
        let _route = `products/${_productId}/images?gallery_type_id=${_galleryTypeId}`;
        inputHiddenImagesProductId.value = _productId;

        setTimeout(() => {
            axios.get(_route)
            .then(({
                data
            }) => {
                startCarouselProduct();
                if (data) {
                  addImageToSliderProduct(swiperProduct, $('#product-swiper-container'), data);
                  addSummernoteEditorMini($(`.textarea-slider-product-images`));
                } else {
                  toastError(`No hay imágenes`);
                }
            });
        }, 1000);
    });

    $(document).on('click', '.delete-presentation', function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
    });


    function startCarouselProduct() {
      swiperProduct = new Swiper('#product-swiper-container', {
        loop: false,
        pagination: '#product-swiper-pagination',
        nextButton: '#product-swiper-button-next',
        prevButton: '#product-swiper-button-prev',
        slidesPerView: 3,
        //centeredSlides: true,
        //paginationClickable: true,
        spaceBetween: 30,
      });
    }


    function cleanImagesProductModal() {
        inputHiddenImagesProductId.value = ``;
        $('#product-swiper-container .swiper-wrapper').empty();
    }

    $(`#product_gallery-type`)
      .on('change', function(e){
        $('#product-swiper-container .swiper-wrapper').empty();
        _galleryTypeId = e.target.value;
        let _route = `products/${inputHiddenImagesProductId.value}/images?gallery_type_id=${_galleryTypeId}`;

        setTimeout(() => {
          axios.get(_route)
            .then(({
              data
            }) => {
              startCarouselProduct();

              if (data) {
                addImageToSliderProduct(swiperProduct, $('#product-swiper-container'), data);
                addSummernoteEditorMini($(`.textarea-slider-product-images`));
              } else {
                toastError(`No hay imágenes`);
              }
            });
        }, 1000);

      });

function deleteImageFromSliderProduct(btn) {
  swal({
      title: "Borrar Imagen",
      text: "¿Estás seguro?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Si,borrar",
      closeOnConfirm: true
    },
    function() {
      let _route = `contents/${btn.value}`;
      lockWindow();
      axios.delete(_route, {})
        .then((response) => {
          unlockWindow();
          toastNotice(`Se ha borrado la imagen`);
          $('#product-swiper-container').attr('data-number', -1);
          $('#product-swiper-container .swiper-wrapper').empty();

          let _galleryTypeId = 1;
          if (!!document.getElementById("product_gallery-type")) {
            _galleryTypeId = document.querySelector(`#product_gallery-type`).value;
          }

          let _r = `products/${inputHiddenImagesProductId.value}/images?gallery_type_id=${_galleryTypeId}`;
          axios.get(_r)
            .then(({
              data
            }) => {
              if (data) {
                addImageToSliderProduct(swiperProduct, $('#product-swiper-container'), data);
                addSummernoteEditorMini($(`.textarea-slider-product-images`));

              } else {
                toastError(`No hay imágenes`);
              }
            });
        })
        .catch((error) => {
          unlockWindow();
          toastError();
        });
    });
}


  $(document).on('click', '.slider-text__update', function(e){
    e.preventDefault();
    let _that = $(this),
     _id = _that[0].dataset.index,
     _value = _that.parent().find('.textarea-slider-product-images').val();

     axios.put(`/admin/content/${_id}/description`, {
      'content': _value,
     })
     .then((response) => {
       toastNotice(`${response.data.message}`);
     })
     .catch((error) => {

     });

  });

  function updateProductGrid(){

  }

  axios.get(`categories/${getElement(`input[name="category_id"]`).value}/subcategories`)
  .then(({
    data
  }) => {
    fillSelectWithOutFirstOption(getElement(`#product_subcategory`), data, getElement(`input[name="subcategory_id"]`).value);
  });

  $("#product_category").change(function(e) {
    let _value = e.target.value;
    let _route = `categories/${_value}/subcategories`;
    axios.get(_route)
    .then(({
      data
    }) => {
      fillSelectWithOutFirstOption(getElement(`#product_subcategory`), data, null);
    });
  });

  addSummernoteEditor($('#product_description'));
  addSummernoteEditor($('#product_features'));
  addSummernoteEditor($('#product_specifications'));

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>

@endsection
