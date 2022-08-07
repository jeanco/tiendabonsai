@extends('admin.layouts.index') @section('content')


<div class="row u-mx4 u-mb4 u-mt5 u-bg-white" id="products_wrap">

<section class="col-md-12" >
	<div class="row">
		<div class="col-md-4">

		<div class="form-group">
          <h4>Etiqueta: {{ $etiquette['name'] }}</h4>
        </div>

        <div class="form-grup">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control" id="product_category">
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-grup" style="margin-top:10px;">
            <label for="">Subcategoría</label>
            <select name="subcategory_id" class="form-control" id="product_subcategory"></select>
            <div class="mensaje-error" id="product-subcategory-error"></div>
        </div>

		<div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona los Productos:</label>
         	<select class="js-example-basic-multiple" name="product" multiple="multiple" style="width: 100%">

			   </select>

        </div>
        {{--
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
        --}}
	</div>
  <div class="col-md-8">
    <div class="table-responsive box-body">
        <form id="configuration-form">
            <input type="hidden" name="etiquette_id" value="{{ $etiquette['id'] }}">
        </form>
    	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Sku</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="etiquettes-tbody">
            @foreach($products as $product)
            <tr>
                <input type="hidden" name="product_id[]" value="{{ $product->id }}" class="product-{{ $product->id }}">
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->subcategory_name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->name }}</td>
                <td><a class="remove_product" data-index="{{ $product->id }}">Eliminar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="/admin/configurar-etiquetas" method="POST" id="configuration-form-reload">
        {{ csrf_field() }}
        <input type="hidden" name="etiquette_id" value="{{ $etiquette['id'] }}">
    </form>
    </div>
    <!--     
    <div class="form-group text-right">
    	<button class="btn btn-success" title="Guardar" id="configuration__save"><i class=""> Guardar</i></button>
    </div>
    -->
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

    $(`select[name="product"]`).on('select2:select', function(e) {
        let _product_selected = e.params.data;

        //saving on db
        lockWindow();
        
        let _formData = new FormData($(`#configuration-form`)[0]);
        _formData.append('subcategory_id', $(`select[name="subcategory_id"]`).val());
        _formData.append('product_id', _product_selected.id);

        lockWindow();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        });
        $.ajax({
            url : `/admin/etiquette-configuration`,
            type: 'POST',
            data: _formData,
            contentType: false,
            processData: false,
            success: function(e){
                unlockWindow();
                $(`#etiquettes-tbody`).append(`
                    <tr>
                        <input type="hidden" name="product_id[]" value="${_product_selected.id}" class="product-${_product_selected.id}">
                        <td>${$("select[name='category_id'] option:selected").text()}</td>
                        <td>${$("select[name='subcategory_id'] option:selected").text()}</td>
                        <td></td>
                        <td>${_product_selected.text}</td>
                        <td><a class="remove_product" data-index="${_product_selected.id}">Eliminar</a></td>
                    </tr>
                `);
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
            }
        });
    });

    $(document).on('click', '.remove_product', function(e){
        e.preventDefault();
        let _id = $(this)[0].dataset.index, _that = $(this);

        swal({
            title: `¿Eliminar el producto de la etiqueta?`,
            text: '¿Está usted seguro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: true
        },
        function () {
            lockWindow();
            axios.post(`/admin/etiquette-configuration-delete`, {
                'etiquette_id': getElement(`input[name="etiquette_id"]`).value,
                'product_id': _id,
            })
            .then((response) => {
                unlockWindow();
                toastNotice(`Se ha eliminado el producto de la etiqueta`);
                _that.parent().parent().remove();
            })
            .catch((error) => {
                unlockWindow();
                toastError(`Ha ocurrido un error. Actualice la página.`);
            });
        }
        );
    });

    // $(`#cost_form select[name="district_id"]`).select2().val(selected).trigger('change.select2');

    $(`select[name="product"]`).on('select2:unselect', function(e) {
      let _id = e.params.data.id

        let _formData = new FormData($(`#configuration-form`)[0]);
        _formData.append('subcategory_id', $(`select[name="subcategory_id"]`).val());
        _formData.append('product_id', _id);

        lockWindow();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        });
        $.ajax({
            url : `/admin/etiquette-configuration-delete`,
            type: 'POST',
            data: _formData,
            contentType: false,
            processData: false,
            success: function(e){
                unlockWindow();
                $(`#etiquettes-tbody`).find(`.product-${_id}`).each((i, element) => {
                    $(element).parent().remove();
                });
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
            }
        });

    });

    // $(`#color`).on('select2:unselect', function(e) {
    //   let _color_id = e.params.data.id;
    //   $(`#configurations-tbody`).find(`.color-${_color_id}`).each((i, element) => {
    //     $(element).parent().remove();
    //   });
    // });

    // document.querySelector(`#configuration__save`)
    //     .addEventListener(`click`, () => {
    //         lockWindow();
            
    //         let _formData = new FormData($(`#configuration-form`)[0]);
    //         _formData.append('subcategory_id', $(`select[name="subcategory_id"]`).val());
    //         lockWindow();
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('input[name=_token]').val()
    //             }
    //         });
    //         $.ajax({
    //             url : `/admin/etiquette-configuration`,
    //             type: 'POST',
    //             data: _formData,
    //             contentType: false,
    //             processData: false,
    //             success: function(e){
    //                 unlockWindow();
    //                 $(`#configuration-form-reload`).submit();

    //             },
    //             error:function(jqXHR, textStatus, errorThrown)
    //             {
    //             }
    //         });

    //     });


  function updateProductGrid(){

  }

  axios.get(`categories/${getElement(`select[name="category_id"]`).value}/subcategories`)
  .then(({
    data
  }) => {
    fillSelectWithOutFirstOption(getElement(`select[name="subcategory_id"]`), data, null);
    return getElement(`select[name="subcategory_id"]`).value;
  })
  .then(() => {
    fill_select_products();
  });

  function fill_select_products(){
    axios.get(`/admin/etiquette/${getElement(`input[name="etiquette_id"]`).value}/subcategory/${getElement(`select[name="subcategory_id"]`).value}`)
        .then((risposta) => {
            fillSelectWithOutFirstOption(getElement(`select[name="product"]`), risposta.data.products, null);   
            return risposta.data.products_selected;
        })
        .then((products_selected) => {
            let _values = Object.values(products_selected);
           $(`select[name="product"]`).select2().val(_values).trigger('change.select2');
           //draw_tbody(products_selected);
        });
  }


  // function draw_tbody(products){

  //   let _content = ``;

  //   $(`#etiquettes-tbody`).html(``);

  //   Object.keys(products).forEach(key => {
  //       _content += `
  //                   <tr>
  //                       <input type="hidden" name="product_id[]" value="${products[key]}" class="product-${products[key]}">
  //                       <td>Por hacer</td>
  //                       <td>$Por hacer</td>
  //                       <td>${key}</td>
  //                       <td><a class="remove_product" data-index="${products[key]}">Eliminar</a></td>
  //                   </tr>
  //                   `;
  //   });

  //   $(`#etiquettes-tbody`).html(_content);
  // }

    $(`select[name="subcategory_id"]`).on('change', function(e){
        fill_select_products();
    });

    $(`select[name="category_id"]`).on('change', function(e){
        axios.get(`categories/${e.target.value}/subcategories`)
        .then(({
            data
        }) => {
            fillSelectWithOutFirstOption(getElement(`select[name="subcategory_id"]`), data, null);
        })
        .then(() => {
            fill_select_products();
        });

    });

</script>


@endsection
