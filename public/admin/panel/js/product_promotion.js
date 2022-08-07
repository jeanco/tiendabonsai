
const h3PromotionProductName = getElement('#promotion_product-name');
const inputPromotionTitle = getElement('#promotion_title');
const inputPromotionProductId = getElement('#promotion_product-id');
const inputPromotionImage = getElement('#promotion_image');
const labelPromotionPreviewTextImage = getElement('#promotion_preview-text-image');
const divPromotionPreviewImage = getElement('#promotion_preview-image')
const selectPromotionAvailable = getElement('#promotion_available');
const selectPromotionOutstanding = getElement('#promotion_outstanding');
const inputPromotionPrice = getElement('#promotion_price');
const inputPromotionEtiquette = getElement('#promotion_etiquette');
const divPromotionPreviewEtiquette = getElement('#promotion_preview-etiquette');
const labelPromotionPreviewTextEtiquette = getElement('#promotion_preview-text-etiquette');
const inputPromotionPercentage = getElement('#promotion_percentage');
const btnPromotionUpdate = getElement('#promotion__update');

function productPromotion(btn){
  let _productId = btn.value;
  let _route =`products/${_productId}`;

  axios.get(_route)
    .then(({data}) => {

      cleanPromotionModal();
      cleanError();

      h3PromotionProductName.innerHTML = `${data.name} - S/.${data.price} (Precio Sugerido)`

      $(`input[name="product_price"]`).val(data.price);
      inputPromotionProductId.value = data.id;
      inputPromotionTitle.value = data.promotion_title;
      //Promotion image
      $(`#promotion-image__remove`).hide();
      $(`#promotion-etiquette__remove`).hide();

      if (data.promotion_image_thumb) {
        divPromotionPreviewImage.innerHTML = `<img src="${data.promotion_image_thumb}" style="display: block;">`;
        none(labelPromotionPreviewTextImage);
      $(`#promotion-image__remove`).show();

      }

      $(`#promotion_date`).val(data.promotion_end_at_es_format);

      selectPromotionAvailable.value = data.promotion_available;
      console.log(data.outstanding_promotion);
      selectPromotionOutstanding.value = data.outstanding_promotion;
      inputPromotionPrice.value = data.price_promotion;
      inputPromotionPercentage.value = data.promotion_percentage;
      //Promotion etiquette
      if (data.promotion_label_image) {
        divPromotionPreviewEtiquette.innerHTML = `<img src="${data.promotion_label_image}" style="display: block;">`;
        none(labelPromotionPreviewTextEtiquette);
        $(`#promotion-etiquette__remove`).show();
      }

      $(`select[name="promotion_discount_type"]`).val(data.promotion_discount_type);
      $(`#saved`).html(`Ahorro: ${(data.promotion_discount) ? data.promotion_discount : ''}`);
      $(`#promotion_discount`).val((data.promotion_discount) ? data.promotion_discount : '');
      //calculate_saved_price();
      
      getElement(`select[name="promotion_config"]`).value = data.promotion_config;

    }); 
}

function productTransfer(btn){
  let _productId = btn.value;
  let _route =`products/${_productId}`;

  axios.get(_route)
    .then(({data}) => {

      //cleanPromotionModal();
      cleanError();
      $(`#transfer_form`)[0].reset();

      getElement('#transfer_product-name').innerHTML = `${data.name} - S/.${data.price} (Precio Sugerido)`
      $(`input[name="product_price"]`).val(data.price);
      getElement('#transfer_product-id').value = data.id;
      getElement('#transfer_title').value = data.transfer_title;
      //Promotion image
      $(`#transfer-etiquette__remove`).hide();
      $(`#transfer_date`).val(data.transfer_end_at_es_format);
      
      getElement('#transfer_available').value = data.transfer_available;
      getElement('#transfer_price').value = data.transfer_price;
      $(`#transfer_preview-text-etiquette`).show();
      //Promotion etiquette
      if (data.transfer_label_image) {
        getElement('#transfer_preview-etiquette').innerHTML = `<img src="${data.transfer_label_image}" style="display: block;">`;
        $(`#transfer_preview-text-etiquette`).hide();
        $(`#transfer-etiquette__remove`).show();
      }
    }); 
}

btnPromotionUpdate.addEventListener('click', (e) => {
  cleanError();
  
  let _route = `promotions/${inputPromotionProductId.value}`, _formData = new FormData($('#promotion_form')[0]);
  lockWindow();
  axios.post(_route, _formData, {
    headers: {
      'X-CSRF-TOKEN': $('input[name=_token]').val()
    }
  })
  .then((response) => {
    unlockWindow();
    toastNotice(`Se ha actualizado la promoción.`);

    $('#promotion-modal').modal('hide');

    if ($(`#product_datatable`).val()) {
      re_call_datatable_products();
    }

    if (!$(`#product_datatable`).val()) {
      updateProductGrid();
    }

  })
  .catch((error) => {
    unlockWindow();
    toastError();
  });
});

getElement(`#transfer__update`).addEventListener('click', (e) => {
  cleanError();
  
  let _route = `/admin/transfer/${getElement('#transfer_product-id').value}`, _formData = new FormData($('#transfer_form')[0]);
  lockWindow();
  axios.post(_route, _formData, {
    headers: {
      'X-CSRF-TOKEN': $('input[name=_token]').val()
    }
  })
  .then((response) => {
    unlockWindow();
    toastNotice(`Se ha actualizado el precio de transferencia.`);

    $('#transfer-price-modal').modal('hide');

    // if ($(`#product_datatable`).val()) {
    //   re_call_datatable_products();
    // }

    // if (!$(`#product_datatable`).val()) {
    //   updateProductGrid();
    // }

  })
  .catch((error) => {
    unlockWindow();
    toastError();
  });
});


function cleanPromotionModal(){
  h3PromotionProductName.innerHTML = ``;
  inputPromotionProductId.value = ``;
  inputPromotionTitle.value = ``;
  inputPromotionImage.value = ``;
  divPromotionPreviewImage.innerHTML = ``;
  $(`#promotion_preview-text-image`).show();

  //displayInlineBlock(labelPromotionPreviewTextImage);
  
  selectPromotionAvailable.value = 0;
  selectPromotionOutstanding.value = 0;
  
  inputPromotionPrice.value = ``;
  inputPromotionEtiquette.value = ``;
  divPromotionPreviewEtiquette.innerHTML = ``;
  //displayInlineBlock(labelPromotionPreviewTextEtiquette);
  $(`#promotion_preview-text-etiquette`).show();

  inputPromotionPercentage.value = ``;
}

$(`#promotion-image__remove`).on('click', function(e){
  lockWindow();
  e.preventDefault();
  axios.delete(`/admin/product/${$(`#promotion_product-id`).val()}/promotion-image`)
    .then((response) => {
      unlockWindow();
      divPromotionPreviewImage.innerHTML = ``;
      $(`#promotion_preview-text-image`).show();
      //displayInlineBlock(labelPromotionPreviewTextImage);
      toastNotice(`${response.data.message}`);
      $(`#promotion-image__remove`).hide();
    })
    .catch((err) => {
      unlockWindow();
      toastError(`${err.response.data.message}`);
    });
});

$(`#promotion-etiquette__remove`).on('click', function(e){
  lockWindow();

  e.preventDefault();

  axios.delete(`/admin/product/${$(`#promotion_product-id`).val()}/promotion-etiquette`)
    .then((response) => {
      unlockWindow();
      divPromotionPreviewEtiquette.innerHTML = ``;
      $(`#promotion_preview-text-etiquette`).show();
      //displayInlineBlock(labelPromotionPreviewTextEtiquette);
      toastNotice(`${response.data.message}`);
      $(`#promotion-etiquette__remove`).hide();

    })
    .catch((err) => {
      unlockWindow();
      toastError(`${err.response.data.message}`);
    });
});

$(`#transfer-etiquette__remove`).on('click', function(e){
  lockWindow();

  e.preventDefault();

  axios.delete(`/admin/product/${$(`#transfer_product-id`).val()}/transfer-etiquette`)
    .then((response) => {
      unlockWindow();
      getElement('#transfer_preview-etiquette').innerHTML = ``;
      $(`#transfer_preview-text-etiquette`).show();
      toastNotice(`${response.data.message}`);
      $(`#transfer-etiquette__remove`).hide();
    })
    .catch((err) => {
      unlockWindow();
      toastError(`${err.response.data.message}`);
    });
});


$(`#promotion_date`).datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
});

$(`#transfer_date`).datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
});

function calculate_saved_price(){
    let _value = $(`select[name="promotion_discount_type"]`).val(), _promotion_price = $(`#promotion_price`).val();
    let _discount;
    //%
    if (_value == 1 && _promotion_price) {
      _discount = (100 -(100*_promotion_price)/$(`input[name=product_price]`).val()).toFixed(2);
      _discount = Math.round(_discount);
      $(`#saved`).html("Ahorro: "+_discount);
      $(`#promotion_discount`).val(_discount);

      return;
    } 
    //amount
    if (_value == 2 && _promotion_price) {
      _discount = `${(parseFloat($(`input[name=product_price]`).val()) - parseFloat($(`#promotion_price`).val())).toFixed(2)}`
      $(`#saved`).html(`Ahorro: ${_discount}`);
      $(`#promotion_discount`).val(_discount);

      return;
    }

}

$(`select[name="promotion_discount_type"]`)
  .on('change', function(e){
    calculate_saved_price();
  });

$(`#promotion_price`)
  .on('keyup', function(){
    calculate_saved_price();
  })
