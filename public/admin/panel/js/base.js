const addSummernoteEditor = (element, high) => {
  element.summernote({
    dialogsInBody: true,
    height: high || 200,
    lang: 'es-ES',
    fontNames: [
            'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
            'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
            'Tahoma', 'Times New Roman', 'Verdana','Nerko One','Hyundai Sans Head Office','Hyundai Sans Text KR Medium','Hyundai Sans Text','Hyundai Sans Head'
        ],
        fontNamesIgnoreCheck: ['Tahoma'],
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear','color']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
      ['table', ['table']],

     /* ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],*/

     /* ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']],*/

      ['view', ['fullscreen', 'codeview', 'help']],
      ['custom', ['examplePlugin']],


    ],
  });
};

const addSummernoteEditorMini = (element, high) => {
  element.summernote({
    dialogsInBody: true,
    height: high || 200,
    lang: 'es-ES',
    fontNames: [
            'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
            'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
            'Tahoma', 'Times New Roman', 'Verdana','Nerko One','Hyundai Sans Head Office','Hyundai Sans Text KR Medium','Hyundai Sans Text','Hyundai Sans Head'
        ],
        fontNamesIgnoreCheck: ['Tahoma'],
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear','color']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
      ['table', ['table']],

     /* ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],*/

     /* ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']],*/

      ['view', ['fullscreen', 'codeview', 'help']],
      ['custom', ['examplePlugin']],


    ],
  });
};

const destroySummernote = (element) => element.summernote('destroy');

const lockWindow = () => {
  $.blockUI({
    message: "<h1>Espere por favor...</h1>",
    css: {
      border: 'none',
      padding: '15px',
      backgroundColor: '#000',
      opacity: .5,
      color: '#fff',
      display: 'flex',
      top: 0,
      bottom: 0,
      left: 0,
      right: 0,
      'z-index': 1051,
      width: '100%',
      'justify-content': 'center',
      'align-items': 'center',
    }
  });
};

const unlockWindow = () => $.unblockUI();

const emptier = (arr) => {
  arr.forEach(element => {
    element.innerHTML = '';
  });
};

function cleanError() {
  $('.mensaje-error').empty();
  $('.titulo-error').empty();
}


const addInputHiddenPut = (element, id) => {
  element.append(`<input type="hidden" name="_method" id="${id}" value="PUT" />`);
};

const updatePublishedWithAxios = (route, data, title, successFunction, errorFunction) => {
  swal({
      title: title,
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
      axios.put(route, data, {
          headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        })
        .then((response) => {
          unlockWindow();
          successFunction(response);
        })
        .catch((error) => {
          unlockWindow();
          errorFunction(error);
        });
    }
  );
}

const deleteObjectAxios = (route, data, title, successFunction, errorFunction) => {
  swal({
      title: title,
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
      axios.delete(route, data)
        .then((response) => {
          unlockWindow();
          successFunction(response);
        })
        .catch((error) => {
          unlockWindow();
          errorFunction(error);
        });
    }
  );
}

const toastNotice = (text) => {
  $.growl.notice({
    message: text || "Éxito."
  });
}

const toastError = (text) => {
  $.growl.error({
    message: text || "Ha ocurrido un error."
  });
}

const lg = console.log;

const simbolPublished = (publishedVal) => {
  var data = {};
  if (publishedVal == 0) {
    data.simbol = 'glyphicon glyphicon-eye-open';
    data.name = 'Publicar';
    return data;
  }

  if (publishedVal == 1) {
    data.simbol = 'glyphicon glyphicon-eye-close';
    data.name = 'Dejar de publicar';
    return data;
  }
}

const getElement = (element) => {
  return document.querySelector(element);
};

const statusPromotion = (promotionAvailabe) => {
  var data = {};
  if (promotionAvailabe == 1) {
    data.style = "";
    data.name = "Promocionado";
    return data;
  } else if (promotionAvailabe == 0) {
    data.style = "background-color: red;";
    data.name = "No promocionado";
    return data;
  }
}

const fillSelect = (selectElement, values, valueSelected, valueFirstOptionText) => {
  let _content = `<option value="">${valueFirstOptionText}</option>`;

  values.forEach(value => {
    _content += `<option value="${value.id}">${value.name}</option>`;
  });

  selectElement.innerHTML = _content;

  if (valueSelected != null) {
    selectElement.value = valueSelected;
  }
}

const loadGridProducts = (products) => {

  let _content = '';
  let _published;
  let _promotion;
  let _currentPrice;

  products.forEach(product => {
    _published = simbolPublished(product.published); //titulo y simbolo
    _promotion = statusPromotion(product.promotion_available); //titulo y estilo
    _currentPrice = (product.promotion_available == 1 ? product.price_promotion : product.price);
    _content +=
      `
        <div class="col-md-4 col-sm-6 item_grid_product">
          <div class="area_grid_product">
            <div class="row u-ml0 u-mr0">
              <div class="col-md-4 col-sm-4 u-p0">
                <div class="img_grid_product">
                  <img src="${(product.random_image) ? product.random_image.resource : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}" alt="">
                </div>
              </div>
              <div class="col-md-8 col-sm-8 desc_grid_product">
                <h4 class="text-muted">${product.code}</h4>
                <h4 class="product_name_grid" title="${product.name}">${product.name}</h4>
                ${(product.promotion_available) ? `<span class="offer_grid_product">En oferta</span>` : `` }
                <h4 class="text-info"><span>Precio: </span>${parseInt(_currentPrice)}</h4>
                <div class="btn_grid_product u-mb4">`+
                  ((getElement(`#product_publish`).value) ? `<button
                      onclick = "productPublished(this)"
                      value="${product.id}"
                      data-name="${product.name}"
                      data-published="${product.published}"
                      title="${_published.name}"
                      class="btn btn_rb btn_lb text-info ${_published.simbol}">
                    </button>` : ``)+
                  ((getElement(`#product_highlight`).value) ? `<button
                      onclick="productOutstanding(this)"
                      value="${product.id}"
                      data-name="${product.name}"
                      class="
                              btn
                              btn_rb
                              text-secondary
                              ${(product.outstanding == 1) ? 'glyphicon glyphicon-thumbs-down' : 'glyphicon glyphicon-thumbs-up'}"
                      title="${(product.outstanding == 1) ? 'Quitar destacado' : 'Destacar'}"
                      data-outstanding="${product.outstanding}"
                      >
                    </button>` : ``)+
                  ((getElement(`#product_promote`).value) ? `<button
                      onclick="productPromotion(this)"
                      value="${product.id}"
                      title="${_promotion.name}"
                      data-name="${product.name}"
                      data-toggle="modal"
                      data-target="#promotion-modal"
                      class="btn btn_rb text-warning glyphicon glyphicon-tag product__published" style="${_promotion.estilo}";>
                    </button>` : ``)+
                  ((getElement(`#product_edit`).value) ? `<button
                      value="${product.id}"
                      title="Editar"
                      class="btn btn_rb text-success glyphicon glyphicon-pencil product__edit">
                    </button>` : ``)+
                  ((getElement(`#product_edit-images`).value) ? `<button
                      onclick="productImagesEdit(this)"
                      value="${product.id}"
                      title="Editar imágenes"
                      data-toggle="modal"
                      data-target="#product-images-modal"
                      class="
                            btn
                            btn_rb
                            text-primary
                            glyphicon glyphicon-picture">
                    </button>` : ``)+
                  ((getElement(`#product_edit-prices`).value) ? `<button value="${product.id}" title="Editar precio por mayor"
                      data-toggle="modal"
                      data-target="#prices-config"
                      class="btn btn_rb text-config glyphicon glyphicon-cog product_config">
                    </button>` : ``)+
                  ((getElement(`#product_delete`).value) ? `<button
                      onclick = "productDelete(this)"
                      value="${product.id}"
                      title="Eliminar"
                      class="btn btn_rb text-danger glyphicon glyphicon-trash product__delete">
                    </button>` : ``)+
                  `
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
  });

  let _productsGrid = getElement('#products_grid');

  _productsGrid.innerHTML = ``;

  let btnAddProduct =
    `
        <div class="col-md-4 col-sm-6 item_grid_product">
          <button type="button" class="btn_add_grid_product product__add">
            <i class="fas fa-plus fa-2x"></i>
            <h3>Añadir Producto</h3>
          </button>
        </div>
    `;

   _productsGrid.innerHTML = `${(getElement(`#product_add`).value) ? btnAddProduct : `` }${_content}`;
}

const none = (element) => {
  element.style.display = `none`;
};

const displayBlock = (element) => {
    element.style.display = `block`;
}

const displayInlineBlock = (element) => {
    element.style.display = `inline-block`;
}

const addImageToSliderProduct = (swiper, swiperContainer, images) => {

	var number = swiperContainer.attr('data-number');
	if (number == "") {
		number = -1;
	}
	else {
		number = parseInt(number);
	}
	$.each(images,function(i,image) {
		number = number + 1;
		swiper.appendSlide(`<div class="swiper-slide" data-index="${number}" style="display:flex;flex-direction:column">
                            <img src="${image.resource_thumb}" alt="" style="margin-bottom: 10px;"/>
                            <textarea class="form-control textarea-slider-product-images" rows="3">${image.content}</textarea>
                            <button onclick="deleteImageFromSliderProduct(this)" class="form-control" value="${image.id}" style="margin-top: 10px;max-width:8rem;">Eliminar</button>
                            <button class="form-control slider-text__update" data-index="${image.id}" style="margin-top: 10px;max-width:8rem;">Guardar</button>
                        </div>`);
	});
		swiperContainer.attr('data-number',number);
}

function fillSelectWithOutFirstOption(selectElement, values, valueSelected) {

  if (selectElement != null) {
    let _content = ``;
    values.forEach(value => {
      _content += `<option value="${value.id}">${value.name}</option>`;
    });

    selectElement.innerHTML = _content;

    if (valueSelected != null) {
      selectElement.value = valueSelected;
    }
  }
}

function get_base_64(inputFileUsed) {
  var inputElement = inputFileUsed;
  var selectedFile = inputFileUsed[0].files[0];

  return process_base64(function(base64) {
  }, selectedFile, inputElement);
}

function process_base64(callback, selectedFile, inputElement) {
  var reader = new FileReader();
  reader.onload = function(e) {
    inputElement.attr('data-base64', e.target.result);
    console.log(1);
    //inputElement.value = e.target.result;
  };
  reader.onerror = function(e) {
    alert("Error procesando la image!");
    //console.log(null);
    //callback(null);
  };
  return reader.readAsDataURL(selectedFile);
}

function cleanAllChildren(element){
  while (element.firstChild) {
    element.removeChild(element.firstChild);
  }
}
