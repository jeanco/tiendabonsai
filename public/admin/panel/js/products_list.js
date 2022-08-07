  var xlf = document.getElementById('file');
  var X = XLSX;
  var index_imports = 0;
  var data_imports=null;
  var cant_imports=0;

  function datatable_products(url){

    let _counter = 0, _published, _promotion;
  	$('#products-datatable').DataTable({
  		processing: true,
  		serverSide: true,
  		destroy: true,
      	bFilter: true,
  		ajax: url,
  		columns: [{
  			//0
  			data: 'product_id',
  			name: 'product_id',
  			searchable: false
  		}, {
      //1
        data: 'code',
        name: 'products.code',
        searchable: true
      },{
  			//2
  			data: 'product_name',
  			name: 'products.name',
  			searchable: true
  		}, {
  			//3
  			data: 'category_name',
  			name: 'category_name',
  			searchable: false
  		}, {

  			//4
  			data: 'subcategory_name',
  			name: 'subcategory_name',
  			searchable: false
  		}, {
  			//5
  			data: 'price',
  			name: 'price',
  			searchable: false
  		}, {
	        //6
	        data: 'stock',
	        name: 'stock',
	        searchable: false,
          class: 'text-center'
      	}, {
	        //7
	        data: 'type',
	        name: 'type',
	        searchable: false,
          class: 'text-center'
     	},{
	        //8
	        data: 'product_published',
	        name: 'product_published',
	        searchable: false
     	},{
	        //9
	        data: 'product_outstanding',
	        name: 'product_outstanding',
	        searchable: false
     	}, {
	        //10
	        data: 'promotion_available',
	        name: 'promotion_available',
	        searchable: false
     	},{
          //11
          data: 'outstanding_promotion',
          name: 'outstanding_promotion',
          searchable: false
      }, {
  			//12
  			data: 'Actions',
  			searchable: false
  		}],
  		"language": {
  			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
  			// "search": "_INPUT_",
  			"searchPlaceholder": "Buscar"
  		},
  		"aoColumnDefs": [{
  			"bVisible": false,
  			"aTargets": [0, 8, 9]
  		},{
        "aTargets": [6],
        "mData": "stock",
        "mRender": function(data, type, full) {
          if (full['promotion_available'] == 1) {
            return "Sí";
          }
          return "No";
      
        }
      }, {
        "aTargets": [7],
        "mData": "promotion_available",
        "mRender": function(data, type, full) {
        	if (full['outstanding_promotion'] == 1) {
        		return "Sí";
        	}
          return "No";
        }
      },  {
        "aTargets": [10],
        "mData": "type",
        "mRender": function(data, type, full) {

          return full['stock'];
      
        }
      }, {
        "aTargets": [11],
        "mData": "outstanding_promotion",
        "mRender": function(data, type, full) {

          if (full['type'] == 1) {
            return "ZF";
          }

      if (full['type'] == 2) {
            return "RG";
          }
        }
      }
      ,{
        "aTargets": [12],
        "mData": "Actions",
        "mRender": function(data, type, full) {

	        _published = simbolPublished(full['product_published']); //titulo y simbolo
	    	_promotion = statusPromotion(full['promotion_available']); //titulo y estilo

          return `<button style="width: 25px;" 
	                  onclick = "productPublished(this)"
	                  value="${full['product_id']}"
	                  data-name="${full['product_name']}"
	                  data-published="${full['product_published']}"
	                  title="${_published.name}"
	                  class="c-item__publish btn-info c-item__btn ${_published.simbol}">
                  </button>
					<button style="width: 25px;" 
					onclick="productOutstanding(this)"
					value="${full['product_id']}"
					data-name="${full['product_name']}"
					class="
					c-item__publish
					c-item__btn
					${(full['product_outstanding'] == 1) ? 'glyphicon glyphicon-thumbs-down' : 'glyphicon glyphicon-thumbs-up'}"
					title="${(full['product_outstanding'] == 1) ? 'Quitar destacado' : 'Destacar'}"
					data-outstanding="${full['product_outstanding']}"
					>
					</button>
					<button style="width: 25px;" 
						onclick="productPromotion(this)"
						value="${full['product_id']}"
						title="${_promotion.name}"
						data-name="${full['product_name']}"
						data-toggle="modal"
						data-target="#promotion-modal"
						class="c-item__promotion btn-warning c-item__btn glyphicon glyphicon-tag" style="${_promotion.estilo}";>
					</button>
          <button style="width: 25px;" 
            onclick="productTransfer(this)"
            value="${full['product_id']}"
            title="${_promotion.name}"
            data-name="${full['product_name']}"
            data-toggle="modal"
            data-target="#transfer-price-modal"
            class="c-item__promotion btn-warning c-item__btn glyphicon glyphicon-transfer" style="${_promotion.estilo}";>
          </button>
					<button style="width: 25px;" 
						value="${full['product_id']}"
						title="Editar"
						class="c-item__edit btn-success c-item__btn c-item__btn glyphicon glyphicon-pencil product__edit">
					</button>
					<button style="width: 25px;" 
						onclick="productImagesEdit(this)"
						value="${full['product_id']}"
						title="Editar imágenes"
						data-toggle="modal"
						data-target="#product-images-modal"
						class="
						c-item__edit
						c-item__btn
						c-item__btn
						glyphicon glyphicon-picture">
					</button>
					<button style="width: 25px;"  value="${full['product_id']}" title="Editar precio por mayor"
						data-toggle="modal"
						data-target="#prices-config"
						class="c-item__btn btn-info c-item__btn glyphicon glyphicon-cog product_config">
					</button>
					<button style="width: 25px;" 
						onclick = "productDelete(this)"
						value="${full['product_id']}"
						title="Eliminar"
						class="btn-danger c-item__btn glyphicon glyphicon-trash product__delete">
					</button>
          <button  style="width: 25px;"  data-index=${full['product_id']} class="c-item__edit btn-success c-item__btn c-item__btn glyphicon glyphicon-usd product-price__edit" title="Editar Precio" data-toggle="modal" data-target="#price-item">
					</button>
          <form action="/admin/configurar-presentaciones-ecommerce" method="post" target="_blank">
          <input type="hidden" name="product_id" value="${full['product_id']}">
          <button type="submit" style="width: 80px;    text-transform: none;"  value="${full['product_id']}" title="Configurar Presentaciones Ecommerce"
            class="c-item__btn btn-info c-item__btn"><li class=" glyphicon glyphicon-cog"> Presentacion</li>
          </button>
          </form>
          <form action="/admin/configurar-presentaciones" method="post" target="_blank">
          <input type="hidden" name="product_id" value="${full['product_id']}">
          <button type="submit" style="width: 80px;    text-transform: none;;"  value="${full['product_id']}" title="Configurar Presentaciones"
            class="c-item__btn btn-info c-item__btn"><li class=" glyphicon glyphicon-cog"> Color/Talla</li>
          </button>
          </form>
					`;
        }
      },
  		]
  	});
  }


var swiperProduct;

const divProductWrap = getElement('#product_wrap');
const divProductsWrap = getElement('#products_wrap');
const inputHiddenProductId = getElement('#product_id');
const inputProductName = getElement('#product_name');
const textProductDescription = getElement('#product_description');
const textProductFeatures = getElement('#product_features');
const textProductSpecifications = getElement('#product_specifications');
const selectProductCategory = getElement('#product_category');
const selectProductSubcategory = getElement('#product_subcategory');
const inputProductPrice = getElement('#product_price');
const inputProductStock = getElement('#product_stock');
const inputProductVideo = getElement('#product_video');
// const inputProductPdf = getElement('#product_pdf');
const formProduct = getElement('#product_form');
const inputHiddenCurrentCategoryId = getElement('#current_category_id');
const inputHiddenCurrentSubcategoryId = getElement('#current_subcategory_id');

const inputHiddenImagesProductId = getElement('#images_product-id');

// const labelProductPreviewPdfText = getElement('#product_preview-text');
// const divProductPreviewPdf = getElement('#product_preview-pdf');

const btnProductSave = getElement('#product__save');
const btnProductUpdate = getElement('#product__update');
const btnProductClose = getElement('#product__close');
const divProductAttributes = getElement('#product_attributes');



divProductWrap.style.display = `none`;

function re_call_datatable_products(){
	datatable_products(`/admin/products/datatable?category_id=${$(`#product_categories`).val()}&subcategory_id=${$(`#product_subcategories`).val()}&promotion_available=${getElement(`#promotion_available_`).value}&promotion_outstanding=${getElement(`#promotion_outstanding_`).value}`);
}

re_call_datatable_products();
// axios.get(`/admin/category/${$(`#product_categories`).val()}/subcategories`)
// 	.then((response) => {
// 		fillSelectWithOutFirstOption(getElement(`#product_subcategories`), response.data, null);
// 		re_call_datatable_products();
// 	});

$('#etiquettes').select2();

$(`#product_categories`).on('change', function(e){
	getElement(`#product_subcategories`).innerHTML = `<option value="">Todas las subcategorías</option>`;
	if (e.target.value == '') {
		return;
	}
	axios.get(`/admin/category/${e.target.value}/subcategories`)
		.then((response) => {
			fillSelect(getElement(`#product_subcategories`) ,response.data, null, `Todas las subcategorías`);
			re_call_datatable_products();
		});
});

$(`#product_subcategories`).on('change', function(){
	re_call_datatable_products();
});

$(`#promotion_available_`).on('change', function(){
  re_call_datatable_products();
});

$(`#promotion_outstanding_`).on('change', function(){
  re_call_datatable_products();
});


$(document).on('click', '.product__add', (e) => {
  $(`#product_filter`).hide();
  cleanProductView();
  cleanProductErrorValidation();
  btnProductUpdate.style.display = `none`;
  divProductsWrap.style.display = `none`;
  divProductWrap.style.display = `inline-block`;

  addSummernoteEditor($('#product_description'), 150);
  addSummernoteEditor($('#product_features'), 150);
  addSummernoteEditor($('#product_specifications'), 150);

  $('#product_pdf').val(``);
  $('#product_brochure').val(``);

  let _routeCategories = `categories`;
  axios.get(_routeCategories)
    .then(({
      data
    }) => {


      fillSelect(selectProductCategory, data, null, `Seleccione una categoría`);
      fillSelect(selectProductSubcategory, [], null, `Seleccione una subcategoría`);
    });

  axios.get(`subcategories/${inputHiddenCurrentSubcategoryId.value}/categories-attributes`)
    .then((response) => {
      let _categories = response.data;
      // lg(response.data);
      let _content = ``;
      let _options;
      _categories.forEach(category => {

        _options = ``;

        category.attributes_relationship.forEach(attribute => {
          _options += `<option value="${attribute.id}">${attribute.name}</option>`;
        });

        _content += `
                    <div class="form-group">
                      <label class="control-label">${category.name}</label>
                      <select name="values_category_${category.id}[]" class="form-control select2" id="attr-product-${category.id}" multiple="multiple" style="width: 100%;">
                        ${_options}
                      </select>
                    </div>
                    `;

      });

      $('#product_attributes').html(_content);
      //divProductAttributes.innerHTML = _content;

      _categories.forEach(category => {
        $(`#attr-product-${category.id}`).select2();
      });

      $('#product_latitude').val('');
      $('#product_longitude').val('');

      $('#location').locationpicker({
        enableAutocomplete: true,
        enableReverseGeocode: true,
        radius: 0,
        location: {
          latitude: $('#product_latitude').val(),
          longitude: $('#product_longitude').val()
        },
        inputBinding: {
          latitudeInput: $('#product_latitude'),
          longitudeInput: $('#product_longitude'),
          locationNameInput: $('#product_address')
        }
      });


    })
    .then(() => {
      fillCountriesAndCities(null, getElement(`#product_country`), null, getElement(`#product_city`));
    });

});

/*selectProductCategory.addEventListener('change', (e) => {

});*/

$("#product_category").change(function(e) {
    let _value = e.target.value;
  let _route = `categories/${_value}/subcategories`;
  axios.get(_route)
    .then(({
      data
    }) => {
      fillSelect(selectProductSubcategory, data, null, `Seleccione una subcategoría`);
    });
  });

btnProductSave.addEventListener('click', (e) => {
  cleanError();
  let _route = `products`,
    _formData = new FormData($('#product_form')[0]);
    _formData.append('has_hidden_price', getElement('#hidden-price').checked);

  lockWindow();
  axios.post(_route, _formData, {
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })
    .then((response) => {
      $(`#product_filter`).show();
      unlockWindow();
      toastNotice(`Se ha creado el producto.`);

      re_call_datatable_products();
      divProductsWrap.style.display = `inline-block`;
      divProductWrap.style.display = `none`;
    })
    .catch((error) => {
      unlockWindow();
      toastError();

      $('#product-error').append(msgError);
      lg(error.response.data);

      $.each(error.response.data, function(key, value) {
        if (key == "name") {
          $.each(value, function(errores, eror) {
            $('#product-name-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "description") {
          $.each(value, function(errores, eror) {
            $('#product-description-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "category_id") {
          $.each(value, function(errores, eror) {
            $('#product-category-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "subcategory_id") {
          $.each(value, function(errores, eror) {
            $('#product-subcategory-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "price") {
          $.each(value, function(errores, eror) {
            $('#product-price-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "stock") {
          $.each(value, function(errores, eror) {
            $('#product-stock-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "minimum_quantity"){
            $.each(value, function(errores, eror) {
            $('#product-minimum-quantity-error').append("<li class='error-block'>" + eror + "</li>");
            });
        };
      });
    });
});

function productPublished(btn) {
  let _id = btn.value;
  let _route = `products/${_id}/published`;

  let _text = (btn.getAttribute('data-published') == 1) ? '¿Desea no publicar este producto?' : '¿Publicar este producto?';

  updatePublishedWithAxios(_route, {}, _text, (response) => {
    toastNotice(`Se ha cambiado el estado`);
    re_call_datatable_products();
  }, (error) => {
    toastError();
  })
}

function productOutstanding(btn) {
  let _id = btn.value;
  let _text = (btn.getAttribute('data-outstanding') == 1) ? `¿No destacar?` : `¿Destacar?`;
  let _route = `products/${_id}/outstanding`;
  swal({
      title: _text,
      text: '¿Está usted seguro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      closeOnConfirm: true
    },
    function() {
      lockWindow();
      axios.put(_route, {}, {
          headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        })
        .then((response) => {
          unlockWindow();
          toastNotice(`Se ha cambiado el estado del producto.`);
          re_call_datatable_products();
        })
        .catch((error) => {
          unlockWindow();
          toastError();
        });
    }
  );
}

$(document).on('click', '.product__edit', (e) => {
  let _id = e.target.value;
  let _route = `products/${_id}`;

  axios.get(_route)
    .then(({
      data
    }) => {
      $(`#product_filter`).hide();
      cleanProductView();
      cleanProductErrorValidation();
      addInputHiddenPut($('#product_form'), 'product_method');

      inputHiddenProductId.value = data.id;

      $(`#product_name`).val(data.name)
      $(`input[name="code"]`).val(data.code)

      // inputProductName.value = ;
      $(`#product_description`).val(data.description);
      // textProductDescription.value = data.description;
      $(`#product_specifications`).val(data.specifications);
      $(`#product_features`).val(data.features);
      // textProductFeatures.value = data.features;
      // textProductSpecifications.value = data.specifications;
      inputProductPrice.value = data.price;
      // inputProductStock.value = data.stock;
      $(`#product_stock`).val(data.stock);
      $(`#product_video`).val(data.video);
      // inputProductVideo.value = data.video;
      $(`#product_warranty`).val(data.warranty);
      $(`select[name="type_id"]`).val(data.type_id);

      getElement(`#hidden-price`).checked = data.has_hidden_price;
      getElement(`input[name="message_about_price"]`).value = data.message_about_price;
      getElement(`#hidden-price`).parentNode.nextElementSibling.style.display = 'none';  
      
      if (data.has_hidden_price == 1) {
        getElement(`#hidden-price`).parentNode.nextElementSibling.style.display = 'block';  
      }


      $(`#product_delivery-time`).val(data.delivery_time)
      $(`#product_installation-time`).val(data.installation_time)

      // getElement(`#product_delivery-time`).value = data.delivery_time;
      // getElement(`#product_installation-time`).value = data.installation_time;

      $('#product_pdf').val(``);
      $('#product_brochure').val(``);

      let _categoryId = data.category_id;
      let _subcategoryId = data.subcategory_id;

      addSummernoteEditor($('#product_description'));
      addSummernoteEditor($('#product_features'));
      addSummernoteEditor($('#product_specifications'));

      $('#product_latitude').val(data.latitude);
      $('#product_longitude').val(data.longitude);
      $(`#product_address_`).val(data.address);
      // $('#product_address').val(data.address);

      $('#location').locationpicker({
        enableAutocomplete: true,
        enableReverseGeocode: true,
        radius: 0,
        location: {
          latitude: $('#product_latitude').val(),
          longitude: $('#product_longitude').val()
        },
        inputBinding: {
          latitudeInput: $('#product_latitude'),
          longitudeInput: $('#product_longitude'),
          locationNameInput: $('#product_address')
        }
      })

      $('#product_pdf-link').hide();
      $('#product_brochure-link').hide();
      $('#product_link').val(data.link);

      if (data.pdf != '' && data.pdf != null) {
        $('#product_pdf-link').show();
        $('#product_pdf-link').attr('href', data.pdf);
      }

      if (data.brochure != '' && data.brochure != null) {
        $('#product_brochure-link').show();
        $('#product_brochure-link').attr('href', data.brochure);
      }

      let _routeCategories = `categories`;
      axios.get(_routeCategories)
        .then(({
          data
        }) => {
          fillSelect(selectProductCategory, data, _categoryId, `Seleccione una categoría`);

          let _routeSubcategories = `categories/${_categoryId}/subcategories`;

          axios.get(_routeSubcategories)
            .then(({
              data
            }) => {
              fillSelect(selectProductSubcategory, data, _subcategoryId, `Seleccione subcategoría`);
              divProductsWrap.style.display = `none`;
              divProductWrap.style.display = `inline-block`;
              btnProductSave.style.display = `none`;
            });
        });

      axios.get(`subcategories/${_subcategoryId}/categories-attributes`)
        .then((response) => {
          return response.data;
        })
        .then((categories_attributes) => {
          axios.get(`products/${_id}/attributes`)
            .then((response) => {
              let _productAttributes = response.data;
              let _content = ``;
              let _options;
              let _opt;
              categories_attributes.forEach(category => {
                _options = ``;

                category.attributes_relationship.forEach(attribute => {
                  _opt = `<option value="${attribute.id}">${attribute.name}</option>`
                  _productAttributes.forEach(attrSelected => {
                    if (attrSelected.id == attribute.id) {
                      _opt = `<option value="${attribute.id}" selected="selected">${attribute.name}</option>`
                    }
                  });
                  _options += _opt;
                });

                _content += `
                            <div class="form-group">
                              <label class="control-label">${category.name}</label>
                              <select name="values_category_${category.id}[]" class="form-control select2" id="attr-product--${category.id}" multiple="multiple" style="width: 100%;">
                                ${_options}
                              </select>
                            </div>
                          `;
              });

              $(`#product_attributes`).html(_content)
              // divProductAttributes.innerHTML = _content;

              categories_attributes.forEach(category => {
                $(`#attr-product--${category.id}`).select2();
              });
            });
        });

      //etiquettes;
      let _arr_etiquettes_selected = [];

      data.etiquettes.forEach((value, index) => {
        _arr_etiquettes_selected.push(value.id);
      });
      $(`#etiquettes`).select2().val(_arr_etiquettes_selected).trigger('change.select2');

      return [data.city_id, data.country_id];
    })
    .then((array_returned) => {
      let _countryId = array_returned[1];
      let _cityId = array_returned[0];

      fillCountriesAndCities(_countryId, getElement(`#product_country`), _cityId, getElement(`#product_city`));
    });
});

btnProductUpdate.addEventListener('click', (e) => {
  cleanError();
  let _route = `products/${inputHiddenProductId.value}`,
    _formData = new FormData($('#product_form')[0]);
    _formData.append('etiquettes', $('#etiquettes').val());
    _formData.append('has_hidden_price', getElement('#hidden-price').checked);

  lockWindow();
  axios.post(_route, _formData, {
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })
    .then((response) => {
      $(`#product_filter`).show();
      unlockWindow();
      toastNotice(`Se ha actualizado el producto.`);

      re_call_datatable_products();
      divProductsWrap.style.display = `inline-block`;
      divProductWrap.style.display = `none`;
    })
    .catch((error) => {
      unlockWindow();
      toastError();

      $('#product-error').append(msgError);
      $.each(error.response.data, function(key, value) {
        if (key == "name") {
          $.each(value, function(errores, eror) {
            $('#product-name-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "description") {
          $.each(value, function(errores, eror) {
            $('#product-description-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "category_id") {
          $.each(value, function(errores, eror) {
            $('#product-category-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "subcategory_id") {
          $.each(value, function(errores, eror) {
            $('#product-subcategory-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "price") {
          $.each(value, function(errores, eror) {
            $('#product-price-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "stock") {
          $.each(value, function(errores, eror) {
            $('#product-stock-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "minimum_quantity"){
            $.each(value, function(errores, eror) {
              $('#product-minimum-quantity-error').append("<li class='error-block'>" + eror + "</li>");
            });
        };
      });
    });
});

function productImagesEdit(btn) {

  let _galleryTypeId = 1;

  if (!!document.getElementById("product_gallery-type")) {
    //Set the first option for the select gallery-type
    document.querySelector(`#product_gallery-type`).selectedIndex = 0;
    _galleryTypeId = document.querySelector(`#product_gallery-type`).value;
  }

  cleanImagesProductModal();

  let _productId = btn.value;
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
        } else {
          toastError(`No hay imágenes`);
        }
      });
  }, 1000);
}

function cleanImagesProductModal() {
  inputHiddenImagesProductId.value = ``;
  $('#product-swiper-container .swiper-wrapper').empty();

}

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

btnProductClose.addEventListener('click', (e) => {
  $(`#product_filter`).show();
  divProductsWrap.style.display = 'inline-block';
  divProductWrap.style.display = 'none';
  re_call_datatable_products();
});



// $(document).on('click', '.presentations_config', (e) => {

//     window.open(`${window.location.origin}/admin/configurar-presentaciones`);
              
//   });

$('#product_to_search').on('keyup', function(e) {
  let _text = $(this).val();
  let _route = `products/search?q=${_text}`;
  axios.get(_route)
    .then(({
      data
    }) => {
      loadGridProducts(data);
    });
});

function productDelete(btn) {
  let _id = btn.value;
  let _route = `products/${_id}`;
  deleteObjectAxios(_route, {}, `¿Eliminar?`, (response) => {
    toastNotice();
    re_call_datatable_products();
  }, (error) => {
    toastError(`${error.response.data.message}`);
  })
}

function cleanProductErrorValidation() {
  emptier(document.querySelectorAll('.mensaje-error'));
  emptier(document.querySelectorAll('.titulo-error'));
}

function cleanProductView() {

  $('#product_method').remove();

  inputHiddenProductId.value = '';
  //inputProductName.value = '';
  $(`#product_name`).val(``)


  destroySummernote($('#product_description'));
  destroySummernote($('#product_features'));
  destroySummernote($('#product_specifications'));

  $(`#product_description`).val(``);
  // textProductDescription.value = '';
  $(`#product_specifications`).val(``);
  $(`#product_features`).val(``);


  $('#product_category').val(``);
  //selectProductCategory.value = '';
  $('#product_subcategory').val(``);
  //selectProductSubcategory.value = '';
  inputProductPrice.value = '';

  $(`#product_delivery-time`).val('')
  $(`#product_installation-time`).val('')

  $(`#product_stock`).val(``);
  //ffff
  // inputProductStock.value = '';
  $(`#product_video`).val(``);
  // inputProductVideo.value = '';

  btnProductSave.style.display = 'inline-block';
  btnProductUpdate.style.display = 'inline-block';

}

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

function fillCountriesAndCities(country_id, select_country, city_id, select_city) {

  axios.get(`/admin/countries`)
    .then((risposta) => {
      _fillSelectWithOutFirstOption(getElement(`#product_country`), risposta.data, (country_id == 0) ? null : country_id);
    })
    .then(() => {
        // getElement(`#product_city`).innerHTML = `<option value="">Seleccione ciudad</option>`

        if ($(`#product_country`).val() == undefined) {
          axios.get(`/admin/countries/${$(`#product_country`).val()}/cities`)
          .then((response) => {
            _fillSelectWithOutFirstOption(getElement(`#product_city`), response.data, (city_id == 0) ? null : city_id);
          });
        }
    });
}

$(`#product_country`).on('change', function(e){

  axios.get(`/admin/countries/${e.target.value}/cities`)
  .then((response) => {
    _fillSelectWithOutFirstOption(getElement(`#product_city`), response.data, null);
  });
});

// if (getElement(`#product_country`) != null) {
//   getElement(`#product_country`)
//   .addEventListener('change', (e) => {

//     axios.get(`/admin/countries/${e.target.value}/cities`)
//       .then((response) => {
//         _fillSelectWithOutFirstOption(getElement(`#product_city`), response.data, city_id);
//       });

//   });
// }

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
          } else {
            toastError(`No hay imágenes`);
          }
        });
    }, 1000);

  });

xlf.addEventListener('change',handFile,false);

function handFile(e){
    var files = e.target.files;
    var f = files[0];
    {
        var reader = new FileReader();
        var name = f.name;

        reader.onload = function(e) {
            //if(typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
            var data = e.target.result;
            //console.log("-----------------------------------------------------");
            //console.log(data);
            var arr = fixdata(data);
            //console.log("--------------------");
            //console.log(arr);
            var wb;
            wb = X.read(btoa(arr), {type: 'base64'});
            //console.log(wb);
            process_wb(wb);
        };
        reader.readAsArrayBuffer(f);
    }

    //var files = e.
}

function fixdata(data) {
    var o = "", l = 0, w = 10240;
    for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint8Array(data.slice(l*w,l*w+w)));
    o+=String.fromCharCode.apply(null, new Uint8Array(data.slice(l*w)));
    return o;
}

function to_csv(workbook) {
    var result = [];
    workbook.SheetNames.forEach(function(sheetName) {
        var csv = X.utils.sheet_to_csv(workbook.Sheets[sheetName], null, "=?");
        //console.log(csv);
        if(csv.length > 0){
            /*result.push("SHEET: " + sheetName);
            result.push("");*/
            result.push(csv);
        }
    });
    return result.join("\n");
}

var out;

function process_wb(wb){
    output = to_csv(wb);
    output = output.split('\n');
    out = output;
    var cant = calc_cant(output);
    data_imports=clear_data(output); //Crear otro registro pero sin filas en blanco
}

function calc_cant(data){
    var cant=0;
    if(data!=""){ // los registros a partir de la fila 2
        for(var i=2;i<data.length;i++){
            if(data[i].split('=?')[0]!=""){
                cant++;
            }
        }
    }
    return cant;
}

function clear_data(data){
    var cant=0;
    var j=0;
    var aux = new Array();
    if(data!=""){ // los registros a partir de la fila 3
        for(var i=1;i<data.length;i++){
            if(data[i].split('=?')[0]!=""){
                aux[j]=data[i];
                cant++;
                j++;
            }
        }
    }
    return aux;
}

  $(`#product__import`).on('click', function(e){
    e.preventDefault();

      let codes = new Array();
      let types = new Array();
      let names = new Array();
      let descriptions = new Array();
      let prices = new Array();
      let promotion_availables = new Array();
      let price_promotions = new Array();
      let stocks = new Array();
      let categories = new Array();
      let subcategories = new Array();
      let outstandings = new Array();
      let publisheds = new Array();
      let hidden_price = new Array();
      let message_about_price = new Array();

      let skus = new Array();

      let splitted;
      let _left_array = [];
      let _max;
      let _j;
      let _temp = [];
      data_imports.forEach((value, index) => {
        
        splitted = value.split(`=?`);
        _max = splitted.length;
        codes[index] = splitted[1];
        skus[index] = splitted[2];
        types[index] = splitted[3];
        names[index] = splitted[4];
        descriptions[index] = splitted[5];
        prices[index] = splitted[6];
        promotion_availables[index] = splitted[7];
        price_promotions[index] = splitted[8];
        stocks[index] = splitted[9];
        categories[index] = splitted[10];
        subcategories[index] = splitted[11];
        outstandings[index] = splitted[12];
        publisheds[index] = splitted[13];
        hidden_price[index] = splitted[14];
        message_about_price[index] = splitted[15];

        _j = 0;
        _temp = [];
        for (var i = 16; i < _max; i++) {
            _temp[_j] = splitted[i];
            _j++;
        }
        _left_array[index] = _temp;
      });

      axios.post(`/admin/products/import`, {
        codes :codes,
        types : types,
        names : names,
        descriptions : descriptions,
        prices : prices,
        promotion_availables : promotion_availables,
        price_promotions : price_promotions,
        stocks : stocks,
        categories : categories,
        subcategories : subcategories,
        outstandings : outstandings,
        publisheds : publisheds,
        hidden_price : hidden_price,
        message_about_price : message_about_price,

        left_columns : _left_array,
        skus: skus,
      })
      .then((response) => {
        toastNotice(response.data.message);
        location.reload();
      });
  });

  $(`#product__export`).on('click', function(e){
    e.preventDefault();
    let _category_id = $(`#product_categories`).val();
    let _subcategory_id = $(`#product_subcategories`).val();

    window.open(window.location.origin + `/admin/products/list/excel?category_id=${_category_id}&subcategory_id=${_subcategory_id}`);
  });

  var modal_price = "#price-item";
  $(document).on('click', '.product-price__edit', function(){
    let _id = $(this)[0].dataset.index;
    getElement(`${modal_price} input[name="product_id"]`).value = _id;
    fetch(`/admin/product/${_id}/price`)
      .then((response) => {
        return response.json();
      })
      .then((myjson) => {
        getElement(`${modal_price} input[name="price"]`).value = myjson.toFixed(2);

      });
  });

  getElement(`${modal_price} .update`)
    .addEventListener('click', () => {
      cleanError();

      axios.patch(`/admin/product/${getElement(`${modal_price} input[name="product_id"]`).value}/price`, {
              'price': getElement(`${modal_price} input[name="price"]`).value
           })
        .then((response) => {
          toastNotice(response.data.message);
          $(`#price-item`).modal('hide');
          re_call_datatable_products();
        })
        .catch((err) => {
          unlockWindow();
          toastError();

          $.each(err.response.data, function(key, value) {
            $.each(value, function(errores, eror) {
                $(`#product-item_${key}_error`).append("<li class='error-block'>" + eror + "</li>");
            });
          });
        })
    });

getElement('#hidden-price')
  .addEventListener('click', (e) => {
    const nextElement = e.target.parentNode.nextElementSibling;
    nextElement.style.display = 'none';
    if (e.target.checked) {
      nextElement.style.display = 'block';
    }
  });
