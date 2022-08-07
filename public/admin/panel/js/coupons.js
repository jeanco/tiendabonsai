(() => {

  $('input[name=start_date]').datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
  });
  $('input[name=end_date]').datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
  });

  $(`.without-products`).hide();

  $(`#coupon_not-these-products`).select2();
  $(`#coupon_products`).select2();

  $(`#coupon__add`).on(`click`, function(){
    cleanError();
    cleanModalcoupon();
    displayInlineBlock(getElement(`#coupon__save`));
  });


  getElement(`#coupon__save`)
    .addEventListener('click', () => {
    cleanError();

    let _input_radio_selected = $(`#coupon_form`).find(`input:checked`).attr('id');
    let _formData = new FormData($('#coupon_form')[0]);
    
    _formData.append('input_radio_selected', _input_radio_selected);
    _formData.append('checkbox_all', document.querySelector(`input[name="checkbox_all"]`).checked);

    if (_input_radio_selected == "radio_all-products") {
      _formData.append('products', $(`#coupon_products`).val());
    }

    if (_input_radio_selected == "radio_without-products") {
      _formData.append('products', $(`#coupon_not-these-products`).val());
    }

      lockWindow();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: `/admin/coupon`,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function(e) {
          toastNotice();
          unlockWindow();
          $('#coupon-modal').modal('hide');
          datatablecoupons();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          unlockWindow();
          $.each(jqXHR.responseJSON, function(key, value) {
            $('#coupon_error').append("Corrija los siguientes campos por favor!");

            if (key == "name") {
              $.each(value, function(errores, eror) {
                $('#place-name-error').append("<li class='error-block'>" + eror + "</li>");
              });
            };
          });
        }
      });
  });

  $(document).on('click', '.coupon__edit', function() {
    let _id = $(this)[0].value;

    cleanError();
    cleanModalcoupon();
    addInputPut($('#coupon_form'), 'coupon_method');
    displayInlineBlock(getElement(`#coupon__update`));

    axios.get(`/admin/coupon/${_id}`)
      .then(({
        data
      }) => {
        let coupon = data;

        $('#coupon_id').val(coupon.id);
        $('#coupon_code').val(coupon.code);
        $('#coupon_description').val(coupon.description);
        $('#coupon_type').val(coupon.coupon_type_id);
        $('#coupon_start-date').val(moment(coupon.start_date, 'YYYY-MM-DD').format('DD/MM/YYYY'));
        $('#coupon_end-date').val(moment(coupon.end_date, 'YYYY-MM-DD').format('DD/MM/YYYY'));
        $('#coupon_maximum').val(coupon.maximum);
        $('#coupon_minimum').val(coupon.minimum);
        $('#coupon_limit').val(coupon.limit);
        $('#coupon_conditions-policy').val(coupon.conditions_policy);
        $('#coupon_amount').val(coupon.amount);
        
        $(`select[name="company_id"]`).val(coupon.company_id);
        $(`select[name="place_id"]`).val(coupon.place_id);
        
        $(`#coupon_products`).val(null).trigger('change');
        $(`#coupon_not-these-products`).val(null).trigger('change');

        if (coupon.all_products) {
          $("#radio_all-products").prop("checked", true);
          $('input[name="checkbox_all"]').prop('checked', true);
          return;
        }

        if (coupon.coupon_products.length) {

          let _products = [];

          coupon.coupon_products.forEach((value) => {
            _products.push(value.product_id);
          });          
          //With
          if (coupon.coupon_products[0].include) {
            $("#radio_all-products").prop("checked", true);

            $("#coupon_products").select2().val(_products).trigger('change.select2');
            $(`.without-products`).hide();
            $(`.all-products`).show();
            return;


          }

          //Without
          $("#radio_without-products").prop("checked", true);
          $("#coupon_not-these-products").select2().val(_products).trigger('change.select2');
          $(`.without-products`).show();
          $(`.all-products`).hide();
        }


      });

    $('#coupon-modal').modal('show');
  });

  getElement(`#coupon__update`).addEventListener('click', () => {
    cleanError();

    let _input_radio_selected = $(`#coupon_form`).find(`input:checked`).attr('id');
    let _formData = new FormData($('#coupon_form')[0]);
    
    _formData.append('input_radio_selected', _input_radio_selected);
    _formData.append('checkbox_all', document.querySelector(`input[name="checkbox_all"]`).checked);

    if (_input_radio_selected == "radio_all-products") {
      _formData.append('products', $(`#coupon_products`).val());
    }

    if (_input_radio_selected == "radio_without-products") {
      _formData.append('products', $(`#coupon_not-these-products`).val());
    }


      lockWindow();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: `/admin/coupon/${ $('#coupon_id').val()}`,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function(e) {
          unlockWindow();
          toastNotice();
          $('#coupon-modal').modal('hide');
          datatablecoupons();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          unlockWindow();
          $('#coupon_error').append("Corrija los siguientes campos por favor!");
          $.each(jqXHR.responseJSON, function(key, value) {

            if (key == "name") {
              $.each(value, function(errores, eror) {
                $('#place-name-error').append("<li class='error-block'>" + eror + "</li>");
              });
            };
          });
        }
      });
  });

  // btnCancel.addEventListener('click', () => {
  //   $('#coupon-modal').modal('hide');
  // });

  datatablecoupons();
  
  function datatablecoupons() {

    // //Permissions
    // let _hiddenColumns = [1,4], _editPermission = getElement(`#coupon_edit`).value, _deletePermission = getElement(`#coupon_delete`).value;

    // if (getElement(`#coupon_edit`).value == 0 && getElement(`#coupon_delete`).value == 0) {
    //   _hiddenColumns.push(8);
    // }
    $couponsTable = $('#coupons-datatable').DataTable({
      processing: true,
      serverSide: true,
      destroy: true,
      ajax: '/admin/coupons-datatable',
      columns: [{
        data: 'created_at',
        name: 'coupons.created_at',
        searchable: false
      },{
        data: 'id',
        name: 'coupons.id',
        searchable: false
      }, {
        data: 'code',
        name: 'coupons.code',
        searchable: false
      }, {
        data: 'start_date',
        name: 'coupons.start_date',
        searchable: false
      }, {
        data: 'end_date',
        name: 'coupons.end_date',
        searchable: false
      }, {
        data: 'minimum',
        name: 'coupons.minimum',
        searchable: false
      }, {
        data: 'maximum',
        name: 'coupons.maximum',
        searchable: false
      }, {
        data: 'limit',
        name: 'coupons.limit',
        searchable: false
      }, {
        data: 'amount',
        name: 'coupons.amount',
        searchable: false
      }, {
        data: 'name',
        name: 'name',
        searchable: false
      }, {
        data: 'status',
        name: 'coupons.status',
        searchable: false
      }, {
        data: 'Actions',
        searchable: false
      }],
      order: [
        [1, 'desc']
      ],

      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
        // "search": "_INPUT_",
        "searchPlaceholder": "Buscar"
      },
      "aoColumnDefs": [{
        "bVisible": false,
        "aTargets": [1],
      }, {
        "aTargets": [0],
        "mData": "created_at",
        "mRender": function(data, type, full) {

          if (!full['created_at']) {
            return '';
          }
          
          let _date = moment(full['created_at'], 'YYYY-MM-DD').format();
          let _newDate = moment(_date).format('DD/MM/YYYY');
          return _newDate;

        }
      }, {
        "aTargets": [3],
        "mData": "start_date",
        "mRender": function(data, type, full) {

          if (!full['start_date']) {
            return '';
          }

          let _date = moment(full['start_date'], 'YYYY-MM-DD').format();
          let _newDate = moment(_date).format('DD/MM/YYYY');
          return _newDate;

        }
      }, {
        "aTargets": [4],
        "mData": "end_date",
        "mRender": function(data, type, full) {

          if (!full['end_date']) {
            return '';
          }

          let _date = moment(full['end_date'], 'YYYY-MM-DD').format();
          let _newDate = moment(_date).format('DD/MM/YYYY');
          return _newDate;
        }
      }, {
        "aTargets": [10],
        "mData": "status",
        "mRender": function(data, type, full) {

            if (full['status']) {
              return "Activo";
            }
            return "Inactivo";

        }
      }, {
        "aTargets": [11],
        "mData": "Actions",
        "mRender": function(data, type, full) {
          return `<button class='btn btn-success btn-sm solsoShowModal coupon__edit' title='Editar' value="${full['id']}">
                   <i class='glyphicon glyphicon-pencil notPointerEvent'></i>
                 </button>
                 <button class='btn btn-danger btn-sm solsoShowModal coupon__delete' title='Eliminar' value="${full['id']}">
                 <i class='glyphicon glyphicon-trash notPointerEvent'></i>
               </button>`;
        }
      }

    ]
    });
  }

  $(document).on('click', '.coupon__delete', function(e) {
    let _id = $(this)[0].value;
    deleteObjectAxios(`/admin/coupon/${_id}`, {}, `¿Eliminar?`, function(response) {
      datatablecoupons();
      $.growl.notice({
        message: response.data.message
      });
    }, function(error) {
      console.log(error);
      $.growl.warning({
        message: error.response.data.message
      });
    });
  });
  
  function cleanModalcoupon() {
    $('#coupon_method').remove();
    none(getElement(`#coupon__save`));
    none(getElement(`#coupon__update`));

    $(`#coupon_products`).val('');
    $(`#coupon_not-these-products`).val('');

    $(`#coupon_form`)[0].reset();
  }

  getElement(`#radio_all-products`)
    .addEventListener('click', () => {
      $(`.without-products`).hide();
      $(`.all-products`).show();

    });

  getElement(`#radio_without-products`)
    .addEventListener('click', () => {
      $(`.all-products`).hide();
      $(`.without-products`).show();
    });

})();