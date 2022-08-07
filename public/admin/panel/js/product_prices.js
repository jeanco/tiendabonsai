(() => {


function reDrawTablePrices(product_id, place_id){

    axios.get(`/admin/products/${product_id}/prices?place_id=${place_id}`)
        .then((risposta) => {

            let _content = '';
            $(`#product-prices_tbody`).html('');

           risposta.data.forEach((value) => {

           	let image = "";
           	let btnDeleteImg = "";
           	let promotion_end_at_formatted = "";

           	if (value.etiquette) {
           		image = `<a href="${value.etiquette}" target="_blank">Link</a>`;
           		btnDeleteImg = `<button class="btn btn-success etiquette__remove">Borrar Etiqueda</button>`;
           	}

           	if (value.promotion_end_at) {
           		promotion_end_at_formatted = moment(value.promotion_end_at, 'YYYY-MM-DD').format('DD/MM/YYYY');
           	}

            _content += `
                    <tr>
                        <td>
                            <select class="form-control" name="type" style="width: 120px;">
                              <option value="1" ${value.type == 1 ? 'selected' : ''}>P. Und.</option>
                              <option value="2" ${value.type == 2 ? 'selected' : ''}>P. Promoción</option>
                            </select>
                            <input type="hidden" name="price_id" value=${value.id}>
                        </td>
                        <td><input class="form-control" type="number" style="width: 100px;" name="price" value="${value.price}"></td>
                        <td><input class="form-control" type="number" style="width: 100px;" name="min_quantity" value="${value.min_quantity}"></td>
                        
                        <td><input type="text" name="promotion_end_at" style="width: 100px;" placeholder="Fecha" class="form-control promotion_date" value="${promotion_end_at_formatted}"></td>
                        	
                        <td>
                        <input style="width: 80px;" type="file" accept="image/jpeg, image/png" class="etiquette" name="etiquette" data-base64="">
		                ${image}
		                </td>
                        <td>
                            <select class="form-control" name="status" style="width:auto">
                            <option value="1" ${(value.status) ? 'selected' : ''}>Activo</option>
                            <option value="0" ${(value.status == 0) ? 'selected' : ''}>Inactivo</option>
                            </select>
                        </td>
                        <td>
                            <div class="u-flex">
                            <button type="button" class="btn btn-success product-price__update">Actualizar</button>
                            <button type="button" class="btn btn-danger u-mx3 product-price__remove">Eliminar</button>
                            <!--button type="button" class="btn btn-primary">Editar</button-->
                            ${btnDeleteImg}
                            </div>
                        </td>
                    </tr>`;

           });

           $(`#product-prices_tbody`).append(_content);

           $(`.promotion_date`).datepicker({
    			format: 'dd/mm/yyyy',
    			language: 'es-ES',
			});
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

	lockWindow();

    let _that = $(this);
    const divMajor = _that.parent().parent().parent();
    const img = divMajor.find('input[name="etiquette"]').attr('data-base64');
    let date = "";

    if (divMajor.find('input[name="promotion_end_at"]').val()) {
    	date = moment(divMajor.find('input[name="promotion_end_at"]').val(), 'DD/MM/YYYY').format('YYYY-MM-DD');
    }

    axios.post(`/admin/product-prices`, {
        'product_id': $(`#product-price_product-id`).val(),
        'type' : divMajor.find('select[name="type"]').val(),
        'price': divMajor.find('input[name="price"]').val(),
        'min_quantity': divMajor.find('input[name="min_quantity"]').val(),
        'status': divMajor.find('select[name="status"]').val(),
        'place_id': getElement(`#product_place`).value,
        'promotion_end_at': date,
        'etiquette': img,

    })
    .then((risposta) => {
    	unlockWindow();
        $.growl.notice({ message: risposta.data.message });
        divMajor.find('input[name="price_id"]').val(risposta.data.id);
    })
    .catch((error) => {
    	unlockWindow();
        $.growl.warning({ message: error.response.data.message });
    });
});

$(document).on('change', '.etiquette', function(){
	lockWindow();
    let _that = $(this);
    get_base_64(_that);
    setTimeout(() => {
    	unlockWindow();
    }, 1000);
});

$(document).on('click', '.product-price__update', function(){
    let _that = $(this);
    lockWindow();

    const divMajor = _that.parent().parent().parent();

    const id = divMajor.find('input[name="price_id"]').val();
    const img = divMajor.find('input[name="etiquette"]').attr('data-base64');
    let date = "";

    console.log(divMajor.find('input[name="promotion_end_at"]').val());
    if (divMajor.find('input[name="promotion_end_at"]').val()) {
    	console.log(divMajor.find('input[name="promotion_end_at"]').val());
    	date = moment(divMajor.find('input[name="promotion_end_at"]').val(), 'DD/MM/YYYY').format('YYYY-MM-DD');
    }

    axios.put(`/admin/product-prices/${id}`, {
        // 'product_id': $(`#product-price_product-id`).val(),
        'type' : divMajor.find('select[name="type"]').val(),
        'price': divMajor.find('input[name="price"]').val(),
        'min_quantity': divMajor.find('input[name="min_quantity"]').val(),
        'status': divMajor.find('select[name="status"]').val(),
        'promotion_end_at': date,
        'etiquette': img,
    })
    .then((risposta) => {
    	unlockWindow();
        $.growl.notice({ message: risposta.data.message });
    })
    .catch((error) => {
    	unlockWindow();
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
                          <select class="form-control" name="type" style="width: 120px;">
                              <option value="1">P. Und.</option>
                              <option value="2">P. Promoción</option>
                          </select>
                          <input type="hidden" name="price_id" value="">

                        </td>
                        <td><input class="form-control" style="width: 100px;" type="number" name="price" value="1"></td>
                        <td><input class="form-control" style="width: 100px;" type="number" name="min_quantity" value="1"></td>
                        <td><input type="text" style="width: 100px;" name="promotion_end_at" placeholder="Fecha" class="form-control promotion_date_new" id="promotion_date"></td>
                        <td>
                        
		                <input  style="width: 80px;" type="file" accept="image/jpeg, image/png" class="etiquette" name="etiquette" data-base64="">
		                </td>
                        <td>
                            <select class="form-control" name="status" style="width:auto">
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

            $(`.promotion_date_new`).datepicker({
    			format: 'dd/mm/yyyy',
    			language: 'es-ES',
			});

        });


    $(document).on('click', '.product-price__remove', function(){
    	lockWindow();
        let _that = $(this);

	    const divMajor = _that.parent().parent().parent();
    	const id = divMajor.find('input[name="price_id"]').val();

    	if (id) {
			axios.delete(`/admin/product-prices/${id}`)
	        .then((risposta) => {
	        	unlockWindow();
	            $(this).parent().parent().parent().remove();
	            $.growl.notice({ message: risposta.data.message });
	        })
	        .catch((error) => {

	            console.log(error.response.data.message);
	        });

	        return;
    	}
	    
    	unlockWindow();
	    $(this).parent().parent().parent().remove();
        
    });


	$(document).on('click', '.etiquette__remove', function(e){
		lockWindow();

 		let _that = $(this);
	    const divMajor = _that.parent().parent().parent();
    	const id = divMajor.find('input[name="price_id"]').val();

	  	e.preventDefault();

		axios.delete(`/admin/product-prices/${id}/etiquette`)
		.then((response) => {
			unlockWindow();
			divMajor.find('a').remove();
			divMajor.find('.etiquette__remove').remove();
			$.growl.notice({ message: response.data.message });
		})
		.catch((err) => {
			unlockWindow();
			$.growl.error({ message: "Ha ocurrido un error" });
		});
	});

})();