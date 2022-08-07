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

$(document).on('click', '.product__add', (e) => {
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
  $('#etiquettes').select2();

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
    _formData.append('etiquettes', $('#etiquettes').val());
    _formData.append('has_hidden_price', getElement('#hidden-price').checked);
  lockWindow();
  axios.post(_route, _formData, {
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })
    .then((response) => {
      unlockWindow();
      toastNotice(`Se ha creado el producto.`);

      updateProductGrid();
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
        } else if(key == "minimum_quantity") {
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
    updateProductGrid();
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
          updateProductGrid();
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
      $(`#product_minimum-quantity`).val(data.minimum_quantity);

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
      unlockWindow();
      toastNotice(`Se ha actualizado el producto.`);

      updateProductGrid();
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
        } else if(key == "minimum_quantity") {
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
          addSummernoteEditorMini($(`.textarea-slider-product-images`));
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

btnProductClose.addEventListener('click', (e) => {
  divProductsWrap.style.display = 'inline-block';
  divProductWrap.style.display = 'none';
  updateProductGrid();
});

function updateProductGrid() {
  let _route = `categories/${sessionStorage.categoryId}/subcategories/${sessionStorage.subcategoryId}/products`;

  axios.get(_route)
    .then(({
      data
    }) => {
      loadGridProducts(data);
    });
}

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
    updateProductGrid();
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
  $(`#product_minimum-quantity`).val(``);
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
    slidesPerView: 1,
    simulateTouch:false,
    //centeredSlides: true,
    paginationClickable: true,
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
            addSummernoteEditorMini($(`.textarea-slider-product-images`));
          } else {
            toastError(`No hay imágenes`);
          }
        });
    }, 1000);

  });


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


getElement('#hidden-price')
  .addEventListener('click', (e) => {
    const nextElement = e.target.parentNode.nextElementSibling;
    nextElement.style.display = 'none';
    if (e.target.checked) {
      nextElement.style.display = 'block';
    }
  });