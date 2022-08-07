(() => {


function reDrawTablePrices(product_id, place_id){

    axios.get(`/admin/products/${product_id}/prices?place_id=${place_id}`)
        .then((risposta) => {

            let _content = ``;
            $(`#product-prices_tbody`).html(``);

           risposta.data.forEach((value) => {

            _content += `
                    <tr>
                        <td>
                            <select class="form-control">
                              <option value="1" ${value.type == 1 ? 'selected' : ''}>Precio por unidad</option>
                              <option value="2" ${value.type == 2 ? 'selected' : ''}>Precio por 6 unidades</option>
                              <option value="3" ${value.type == 3 ? 'selected' : ''}>Precio por 12 unidades</option>
                            </select>
                            <input type="hidden" value=${value.id}>
                        </td>
                        <td><input class="form-control" type="number" name="" value="${value.price}"></td>
                        <td><input class="form-control" type="number" name="" value="${value.min_quantity}"></td>
                        <td>
                            <select class="form-control" name="" style="width:auto">
                            <option value="1" ${(value.status) ? 'selected' : ''}>Activo</option>
                            <option value="0" ${(value.status == 0) ? 'selected' : ''}>Inactivo</option>
                            </select>
                        </td>
                        <td>
                            <div class="u-flex">
                            <button type="button" class="btn btn-success product-price__update">Actualizar</button>
                            <button type="button" class="btn btn-danger u-mx3 product-price__remove">Eliminar</button>
                            <!--button type="button" class="btn btn-primary">Editar</button-->
                            </div>
                        </td>
                    </tr>`;

           });

           $(`#product-prices_tbody`).append(_content);
        });
}

$(document).on('click', '.product_config', function(){

    let _that = $(this);

    $(`#product-price_product-id`).val(_that.val());
    reDrawTablePrices($(`#product-price_product-id`).val(), getElement(`#product_place`).value)
});
    
getElement(`#product_place`)
    .addEventListener('change', (e) => {
        reDrawTablePrices($(`#product-price_product-id`).val(), getElement(`#product_place`).value)
    });

$(document).on('click', '.product-price__save', function(){
    let _that = $(this);
    axios.post(`/admin/product-prices`, {
        'product_id': $(`#product-price_product-id`).val(),
        'type' : _that.parent().parent().prev().prev().prev().prev().children().val(),
        'price': _that.parent().parent().prev().prev().prev().children().val(),
        'min_quantity': _that.parent().parent().prev().prev().children().val(),
        'status': _that.parent().parent().prev().children().val(),
        'place_id': getElement(`#product_place`).value,
    })
    .then((risposta) => {
        $.growl.notice({ message: risposta.data.message });
    })
    .catch((error) => {
        $.growl.warning({ message: error.response.data.message });
    });
});

$(document).on('click', '.product-price__update', function(){
    let _that = $(this), _id = _that.parent().parent().prev().prev().prev().prev().children().next().val();
    axios.put(`/admin/product-prices/${_id}`, {
        // 'product_id': $(`#product-price_product-id`).val(),
        'type' : _that.parent().parent().prev().prev().prev().prev().children().val(),
        'price': _that.parent().parent().prev().prev().prev().children().val(),
        'min_quantity': _that.parent().parent().prev().prev().children().val(),
        'status': _that.parent().parent().prev().children().val(),
    })
    .then((risposta) => {
        $.growl.notice({ message: risposta.data.message });
    })
    .catch((error) => {
        $.growl.warning({ message: error.response.data.message });
    });

});

//------------------With Modal Prices--------------------------------
$(document).on('click', '.product_prices', function(){
    let productId = $(this).data('index');

	var _content = '', _isAvailable='', _unitName, _sizeName, _isPromotionalAvailable;

	$.get('products/'+productId, function(data){
		$('#product-prices_name').text(data.product.name);
	});

	// $.get('products/'+productId+'/settings',  function(data){
	// 	if (data.color == 1) {
	// 		$('#product-prices_th-color').show();
	// 	} else {
	// 		$('#product-prices_th-color').hide();
	// 	}

	// 	if (data.size == 1 ) {
	// 		$('#product-prices_th-size').show();
	// 	} else {
	// 		$('#product-prices_th-size').hide();
	// 	}
	// });

	$.get('products/'+productId+'/presentations', function(data){
		console.log(data);
		$.each(data.presentations, function(i,presentation){
			_isAvailable = '<option value="1" selected>Disponible</option>'+
					       '<option value="0">Agotado</option>';

			if (presentation.available == 0) {
			_isAvailable = '<option value="1" >Disponible</option>'+
					       '<option value="0" selected>Agotado</option>';

			}

			_isPromotionalAvailable = '<option value="0" selected>No promocionado</option>'+
					       			  '<option value="1">Activa</option>';

			if (presentation.available_promotional == 1) {
				_isPromotionalAvailable = '<option value="0">No promocionado</option>'+
					       			  	  '<option value="1" selected>Activa</option>';
			}

			_sizeName = '';
			_unitName = '';

			if (presentation.size_id != 0) {
				_sizeName = '<td>'+presentation.size.name+'</td>';
			}

			if (presentation.unit_id != 0) {
				_unitName = '<td>'+presentation.unit.name+'</td>';
			}

			_content = _content + '<tr>'+
					                  _sizeName+
					                  _unitName+
					                  '<td>'+
					                    '<input class="form-control" type="number" name="" value="'+presentation.price+'">'+
					                  '</td>'+
					                  '<td>'+
					                    '<input class="form-control" type="number" name="" value="'+presentation.promotional_price+'">'+
					                  '</td>'+
					                  '<td>'+
					           			'<select class="form-control" name="" style="width:auto">'+
					                      _isPromotionalAvailable+
					                    '</select>'+
					                  '</td>'+
					                  '<td>'+
					                    '<select class="form-control" name="" style="width:auto">'+
					                      _isAvailable+
					                    '</select>'+
					                  '</td>'+
					                  '<td>'+
					                    '<div class="u-flex">'+
					                      '<button type="button" class="btn btn-success product-prices__save" data-index="'+presentation.id+'">Guardar</button>'+
					                  '</div>'+
					                  '</td>'+
					              '</tr>';
		});

		$('#product-prices_tbody').empty();
		$('#product-prices_tbody').append(_content);
	});

});

$(document).on('click', '.product-prices__save', function(){

    let btnSave = $(this), presentationId = $(this).data('index');

	var _price = 0, _isAvailable = false, _route='';
	_price = btnSave.parent().parent().prev().prev().prev().prev().children().val();
	_isAvailable = btnSave.parent().parent().prev().children().val();
	_pricePromotional = btnSave.parent().parent().prev().prev().prev().children().val();
	_isPromotionalAvailable = btnSave.parent().parent().prev().prev().children().val();

	_route = 'presentations/'+presentationId;

	lockWindow();
	$.ajaxSetup({
	  headers: {
	      'X-CSRF-TOKEN': $('input[name=_token]').val()
	  }
	});
	$.ajax({
	 url : _route,
	 type: 'PUT',
	 data: {'price': _price, 'isAvailable': _isAvailable, 'pricePromotional': _pricePromotional, 'isPromotionalAvailable': _isPromotionalAvailable},
	 success: function(data){
		   unlockWindow()
		   if (data.success == true) {
		 		$.growl.notice({ message: "Se ha guardado correctamente la presentacion" });
		   }else if(data.success == false){
		   		$.growl.error({ message: "Ha ocurrido un error" });
		   }
		}
	});
});

    getElement(`#product-price__add`)
        .addEventListener('click', () => {

            let _content = ``;

            _content = `
                        <tr>
                        <td>
                          <select class="form-control">
                              <option value="1">Precio por unidad</option>
                              <option value="2">Precio por 6 unidades</option>
                              <option value="3">Precio por 12 unidades</option>
                          </select>
                        </td>
                        <td><input class="form-control" type="number" name="" value="10.00"></td>
                        <td><input class="form-control" type="number" name="" value="10.00"></td>
                        <td>
                            <select class="form-control" name="" style="width:auto">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                            </select>
                        </td>
                        <td>
                            <div class="u-flex">
                            <button type="button" class="btn btn-success product-price__save">Guardar</button>
                            <button type="button" class="btn btn-danger u-mx3 product-price__remove">Eliminar</button>
                            <!--button type="button" class="btn btn-primary">Editar</button-->
                            </div>
                        </td>
                    </tr>`;

            $(`#product-prices_tbody`).append(_content);
        });


    $(document).on('click', '.product-price__remove', function(){

        let _that = $(this), _id = _that.parent().parent().prev().prev().prev().prev().children().next().val();
        axios.delete(`/admin/product-prices/${_id}`)
        .then((risposta) => {
            $(this).parent().parent().parent().remove();
            $.growl.notice({ message: risposta.data.message });
        })
        .catch((error) => {
            console.log(error.response.data.message);
        });



    });

})();