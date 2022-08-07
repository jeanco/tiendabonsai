(() => {
  const btnUpdate = getElement('#customer__update'),
    btnSave = getElement('#customer__save'),
    btnCancel = getElement('#customer__cancel'),
    btnAdd = getElement('#customer__add'),
    inputHiddenId = getElement('#customer_id');

  $(`#customer__add`).on(`click`, function(){
    axios.get(`countries`)
      .then(({
        data
      }) => {
        cleanError();
        cleanModalCustomer();
        none(btnUpdate);
        document.querySelector('#customer_type').value = 1;

        $('.customer_type-2').hide();

        let _options = `<option value="">Seleccione País</option>`;

        data.forEach(country => {
          _options += `<option value="${country.id}">${country.name}</option>`;
        });

        $('#customer_country').empty();
        $('#customer_country').append(_options);
      })

    $('#customer-modal').modal('show');
  });

  // btnAdd.addEventListener('click', () => {


  // });

  btnSave.addEventListener('click', () => {
    // cleanError();
    emptier(document.querySelectorAll(`.mensaje-error`));
    emptier(document.querySelectorAll(`.titulo-error`));

    let _formData = new FormData($('#customer_form')[0]);

    axios.post(`customers`, _formData)
      .then((response) => {

        toastNotice();
        $('#customer-modal').modal('hide');
        datatableCustomers();
      })
      .catch((error) => {
        toastError(`Ha ocurrido un error`);

        $('#customer_error').append("Corrija los siguientes campos por favor!");

        $.each(error.response.data, function(key, value) {
          if (key == "identity_document") {
            $.each(value, function(errores, eror) {
              $('#customer-document-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "first_name") {
            $.each(value, function(errores, eror) {
              $('#customer-firstname-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "last_name") {
            $.each(value, function(errores, eror) {
              $('#customer-lastname-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "legal_name") {
            $.each(value, function(errores, eror) {
              $('#customer-legalname-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "email") {
            $.each(value, function(errores, eror) {
              $('#customer-email-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "cel_whatsapp") {
            $.each(value, function(errores, eror) {
              $('#customer-cel-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "country_id") {
            $.each(value, function(errores, eror) {
              $('#customer-country-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "city_id") {
            $.each(value, function(errores, eror) {
              $('#customer-city-error').append("<li class='error-block'>" + eror + "</li>");
            });
          };
        });
      });
  });

  $(document).on('click', '.customer__edit', function() {
    let _id = $(this)[0].value;

    cleanError();
    cleanModalCustomer();
    addInputPut($('#customer_form'), 'customer_method');
    none(btnSave);

    axios.get(`customers/${_id}`)
      .then(({
        data
      }) => {
        let customer = data;

        $('#customer_id').val(customer.id);
        $('#customer_email').val(customer.email);
        $('#customer_cel').val(customer.cel_whatsapp);
        $('#customer_facebook').val(customer.facebook);
        $('#customer_document').val(customer.identity_document);
        $('#customer_type').val(customer.customer_type);
        $('#customer_birthday').val(customer.birthday);

        //certificates
        if (customer.certificate_one) {
          $('#certificate_one').show();
          $('#certificate_one').attr('href', customer.certificate_one);
        }

        if (customer.certificate_two) {
          $('#certificate_two').show();
          $('#certificate_two').attr('href', customer.certificate_two);
        }

        if (customer.certificate_three) {
          $('#certificate_three').show();
          $('#certificate_three').attr('href', customer.certificate_three);
        }

        if (customer.certificate_four) {
          $('#certificate_four').show();
          $('#certificate_four').attr('href', customer.certificate_four);
        }

        if (customer.certificate_five) {
          $('#certificate_five').show();
          $('#certificate_five').attr('href', customer.certificate_five);
        }

        if (customer.certificate_six) {
          $('#certificate_six').show();
          $('#certificate_six').attr('href', customer.certificate_six);
        }

        if (customer.certificate_seven) {
          $('#certificate_seven').show();
          $('#certificate_seven').attr('href', customer.certificate_seven);
        }

        if (customer.certificate_eight) {
          $('#certificate_eight').show();
          $('#certificate_eight').attr('href', customer.certificate_eight);
        }

        if (customer.certificate_nine) {
          $('#certificate_nine').show();
          $('#certificate_nine').attr('href', customer.certificate_nine);
        }

        if (customer.certificate_ten) {
          $('#certificate_ten').show();
          $('#certificate_ten').attr('href', customer.certificate_ten);
        }

        axios.get(`countries`)
          .then(({
            data
          }) => {
            let _options = `<option value="">Seleccione País</option>`;

            data.forEach(country => {
              _options += `<option value="${country.id}">${country.name}</option>`;
            });

            $('#customer_country').empty();
            $('#customer_country').append(_options);
            $('#customer_country').val(customer.country_id);

            axios.get(`countries/${customer.country_id}/cities`)
              .then((city) => {
                let _opts = `<option value="">Seleccione Ciudad</option>`;
                city.data.forEach(c => {
                  _opts += `<option value="${c.id}">${c.name}</option>`;
                });

                $('#customer_city').empty();
                $('#customer_city').append(_opts);
                $('#customer_city').val(customer.city_id);
              });
          });

        if (data.customer_type == 1) {
          $('#customer_firstname').val(customer.first_name);
          $('#customer_lastname').val(customer.last_name);
          $('.customer_type-2').hide();
        } else {
          $('#customer_legal-name').val(customer.legal_name);
          $('.customer_type-1').hide();
        }
      });

    $('#customer-modal').modal('show');
  });

  btnUpdate.addEventListener('click', () => {
    emptier(document.querySelectorAll('.titulo-error'));
    emptier(document.querySelectorAll('.mensaje-error'));

    let _formData = new FormData($('#customer_form')[0]);

    ajaxFormData(`customers/${inputHiddenId.value}`, _formData, function(response) {
      toastNotice();
      $('#customer-modal').modal('hide');
      datatableCustomers();
    }, function(error) {
      toastError(`Ha ocurrido un error`);

      $('#customer_error').append("Corrija los siguientes campos por favor!");

      $.each(error.responseJSON, function(key, value) {
        if (key == "identity_document") {
          $.each(value, function(errores, eror) {
            $('#customer-document-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "first_name") {
          $.each(value, function(errores, eror) {
            $('#customer-firstname-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "last_name") {
          $.each(value, function(errores, eror) {
            $('#customer-lastname-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "legal_name") {
          $.each(value, function(errores, eror) {
            $('#customer-legalname-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "email") {
          $.each(value, function(errores, eror) {
            $('#customer-email-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "cel_whatsapp") {
          $.each(value, function(errores, eror) {
            $('#customer-cel-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "country_id") {
          $.each(value, function(errores, eror) {
            $('#customer-country-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "city_id") {
          $.each(value, function(errores, eror) {
            $('#customer-city-error').append("<li class='error-block'>" + eror + "</li>");
          });
        };
      });

    })
  });

  btnCancel.addEventListener('click', () => {
    $('#customer-modal').modal('hide');
  });

  datatableCustomers();

  function datatableCustomers() {

    //Permissions
    let _hiddenColumns = [1,4], _editPermission = getElement(`#customer_edit`).value, _deletePermission = getElement(`#customer_delete`).value;

    if (getElement(`#customer_edit`).value == 0 && getElement(`#customer_delete`).value == 0) {
      _hiddenColumns.push(8);
    }


    $customersTable = $('#customers-datatable').DataTable({
      processing: true,
      serverSide: true,
      destroy: true,
      ajax: 'customers-datatable',
      columns: [{
        data: 'created_at',
        name: 'customers.created_at',
        searchable: false
      }, {
        data: 'id',
        name: 'customers.id',
        searchable: false
      }, {
        data: 'identity_document',
        name: 'customers.identity_document',
        searchable: false
      }, {
        data: 'first_name',
        name: 'customers.first_name',
        searchable: false
      }, {
        data: 'last_name',
        name: 'customers.last_name',
        searchable: false
      }, {
        data: 'birthday',
        name: 'customers.birthday',
        searchable: false
      }, {
        data: 'email',
        name: 'customers.email',
        searchable: false

      }, {
        data: 'cel_whatsapp',
        name: 'customers.cel_whatsapp',
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
        "aTargets": _hiddenColumns,
      }, {
        "aTargets": [3],
        "mData": "first_name",
        "mRender": function(data, type, full) {

          let _firstName = full['first_name'];
          let _lastName = full['last_name'];

          return `${_firstName} ${_lastName}`;
        }
      }, {
        "aTargets": [5],
        "mData": "birthday",
        "mRender": function(data, type, full) {

          if (!full['birthday']) {
            return '';
          }

          let _date = moment(full['birthday'], 'YYYY/MM/DD').format();
          let _newDate = moment(_date).format('DD/MM/YYYY');
          return _newDate;
        }
      },{
        "aTargets": [8],
        "mData": "Actions",
        "mRender": function(data, type, full) {
          return ((_editPermission) ? `<button class='btn btn-success btn-sm solsoShowModal customer__edit' title='Editar Cliente' value="${full['id']}">
                  <i class='glyphicon glyphicon-pencil notPointerEvent'></i>
                </button>` : ``)+
                ((_deletePermission) ? `<button class='btn btn-danger btn-sm solsoShowModal customer__delete' title='Eliminar Cliente' data-name="${full['first_name']} ${full['last_name']}" value="${full['id']}">
                <i class='glyphicon glyphicon-trash notPointerEvent'></i>
              </button>` : ``);

        }
      }

    ]
    });
  }

  $(document).on('click', '.customer__delete', function(e) {
    let _id = $(this)[0].value;
    deleteObjectAxios(`customers/${_id}`, {}, `¿Eliminar a ${e.target.dataset.name}?`, function(response) {
      datatableCustomers();
      toastNotice();
    }, function(error) {
      toastError();
    });
  });

  $('#customer__report').on('click', function(e) {
    e.preventDefault();
    window.open(window.location.origin + '/admin/customers/report-excel');
  });

  $('#customer_country').on('change', function(e) {
    let _id = $(this).val();
    let _route = `countries/${_id}/cities`;

    $('#customer_city').empty();

    if (_id != '') {
      axios.get(_route)
        .then(({
          data
        }) => {

          let _options = `<option value="">Seleccione ciudad</option>`;

          data.forEach(city => {
            _options += `<option value="${city.id}">${city.name}</option>`;
          });

          $('#customer_city').append(_options);
        });

    } else {
      $('#customer_city').append(`<option value="">Seleccione ciudad</option>`);
    }
  });


  $('#customer_type').on('change', function() {
    cleanError();
    if ($(this).val() == 1) {
      $('.customer_type-1').show();
      $('.customer_type-2').hide();
    } else if ($(this).val() == 2) {
      $('.customer_type-1').hide();
      $('.customer_type-2').show();
    }
  });

  function cleanModalCustomer() {
    $('#customer_method').remove();

    displayInlineBlock(btnSave);
    displayInlineBlock(btnUpdate);

    $('#customer_id').val('');
    $('#customer_document').val('');
    $('#customer_firstname').val('');
    $('#customer_lastname').val('');
    $('#customer_email').val('');
    $('#customer_cel').val('');
    $('#customer_facebook').val('');
    $('#customer_city').val('');
    $('#customer_country').val('');
    $('#customer_birthday').val('');

    $('.customer_type-1').show();
    $('.customer_type-2').show();

    $('input[name="certificate_one"]').val('');
    $('#certificate_one').hide();

    $('input[name="certificate_two"]').val('');
    $('#certificate_two').hide();

    $('input[name="certificate_three"]').val('');
    $('#certificate_three').hide();

    $('input[name="certificate_four"]').val('');
    $('#certificate_four').hide();

    $('input[name="certificate_five"]').val('');
    $('#certificate_five').hide();

    $('input[name="certificate_six"]').val('');
    $('#certificate_six').hide();

    $('input[name="certificate_seven"]').val('');
    $('#certificate_seven').hide();

    $('input[name="certificate_eight"]').val('');
    $('#certificate_eight').hide();

    $('input[name="certificate_nine"]').val('');
    $('#certificate_nine').hide();

    $('input[name="certificate_ten"]').val('');
    $('#certificate_ten').hide();

  }

})();