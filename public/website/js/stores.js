  function datatableStores() {

    //Permissions
    let _hiddenColumns = [0], _editPermission = getElement(`#store_edit`).value, _deletePermission = getElement(`#store_delete`).value;

    if (_editPermission == 0 && _deletePermission == 0) {
      _hiddenColumns.push(10);
    }

    $storeTable = $('#stores-datatable').DataTable({
      processing: true,
      serverSide: true,
      destroy: true,
      ajax: '/admin/stores/datatable',
      columns: [{
        //0
        data: 'id',
        name: 'id',
        searchable: false
      }, {
        //1
        data: 'created_at',
        name: 'created_at',
        searchable: false
      }, {
        //2
        data: 'ruc',
        name: 'ruc',
        searchable: false
      }, {
        //3
        data: 'name_company',
        name: 'name_company',
        searchable: false
      }, {
        //4
        data: 'business_name',
        name: 'business_name',
        searchable: false
      }, {
        //5
        data: 'email',
        name: 'email',
        searchable: false
      }, {
        //6
        data: 'membership_date',
        name: 'membership_date',
        searchable: false
      }, {
        //7
        data: 'representative',
        name: 'representative',
        searchable: false
      }, {
        //8
        data: 'cel',
        name: 'cel',
        searchable: false
      }, {
        //9
        data: 'status',
        name: 'status',
        searchable: false
      }, {
        //10
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
        "aTargets": _hiddenColumns,
      }, {
        "aTargets": [9],
        "mData": "status",
        "mRender": function(data, type, full) {
          // console.log(full['status']);
          if (full['status'] == 1) {
            return 'Activo';
          } else {
            return 'Inactivo';
          }

        }
      }, {
        "aTargets": [10],
        "mData": "status",
        "mRender": function(data, type, full) {
          return ((_editPermission) ? `<button data-index="${full['id']}" class="btn btn-success btn-sm store__edit" title="Editar Tienda" data-target="#new-stores" data-toggle="modal">
            <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
            </button>` : ``)+
              ((_deletePermission) ? `<button data-index="${full['id']}" class="btn btn-danger btn-sm store__edit" title="Eliminar Tienda">
              <i class="glyphicon glyphicon-trash notPointerEvent"></i>
            </button>` : ``);
        }
      } ]
    });
  }

  (() => {
    datatableStores();
    $('#new-store_membership-date').datepicker({});

    axios.get(`/admin/countries`)
      .then((response) => {
        _fillSelectWithOutFirstOption(getElement(`#new-store_country`), response.data, null);
        return getElement(`#new-store_country`).value;
      })
      .then((country_id) => {
        changing_cities(country_id, null);
      })
      .then(() => {
        axios.get(`/admin/company-categories`)
          .then((risposta) => {
            _fillSelectWithOutFirstOption(getElement(`#new-store_category`), risposta.data, null);
          });
      });

    getElement(`#store__add`)
      .addEventListener('click', () => {
        clean_modal();
        $(`#new-store__update`).hide();
        $(`#new-store_membership-date`).val(moment().format('DD/MM/YYYY'));
        $(`#store_method`).remove();
      });

    getElement(`#new-store_country`)
      .addEventListener('change', (e) => {
        changing_cities(e.target.value, null);
      });

    getElement(`#new-store__save`)
      .addEventListener('click', () => {
        cleanError();
        let _formData = new FormData($('#new-store_form')[0]);
        let _route = "/admin/stores";

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        });
        $.ajax({
          url: _route,
          type: 'post',
          data: _formData,
          contentType: false,
          processData: false,
          success: function(e) {
            unlock_window();
            //after actions
            $(`#new-stores`).modal('hide');
            datatableStores();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            unlock_window();
            $.each(jqXHR.responseJSON, function(key, value) {
              if (key == "name_company") {
                $.each(value, function(errores, eror) {
                  $('#store-error-name').append("<li class='error-block'>" + eror + "</li>");
                });
              }
              if (key == "ruc") {
                $.each(value, function(errores, eror) {
                  $('#store-error-ruc').append("<li class='error-block'>" + eror + "</li>");
                });
              }
              if (key == "email") {
                $.each(value, function(errores, eror) {
                  $('#store-error-email').append("<li class='error-block'>" + eror + "</li>");
                });
              } else if (key == "business_name") {
                $.each(value, function(errores, eror) {
                  $('#store-error-business-name').append("<li class='error-block'>" + eror + "</li>");
                });
              } else if (key == "cel") {
                $.each(value, function(errores, eror) {
                  $('#store-error-cel').append("<li class='error-block'>" + eror + "</li>");
                });
              } else if (key == "membership_date_without_format") {
                $.each(value, function(errores, eror) {
                  $('#store-error-membership-date').append("<li class='error-block'>" + eror + "</li>");
                });
              };
            });
            // mistake(jqXHR, textStatus, errorThrown);
          }
        });

      });

    $(document).on('click', '.store__edit', function() {
      let _id = $(this)[0].dataset.index;

      clean_modal();
      addInputPut($('#new-store_form'), 'store_method');

      axios.get(`/admin/stores/${_id}`)
        .then((response) => {
          // console.log(response);
          getElement(`#new-store_id`).value = response.data.id;
          getElement(`#new-store_name`).value = response.data.name_company;
          getElement(`#new-store_business-name`).value = response.data.business_name;
          getElement(`#new-store_ruc`).value = response.data.ruc;
          getElement(`#new-store_cel`).value = response.data.cel;
          getElement(`#new-store_phone`).value = response.data.phone;
          getElement(`#new-store_email`).value = response.data.email;
          getElement(`#new-store_address`).value = response.data.address;
          getElement(`#new-store_representative`).value = response.data.representative;
          getElement(`#new-store_category`).value = response.data.category_id;
          getElement(`#new-store_status`).value = response.data.status;
          getElement(`#new-store_description`).value = response.data.description_company;
          getElement(`#new-store_membership-date`).value = response.data.membership_date_formatted;


          getElement(`#new-store_country`).value = response.data.country_id;
          changing_cities(response.data.country_id, response.data.city_id);
          // getElement(`#new-store_city`).value = ;

          $(`#new-store__save`).hide();

          // getElement(`#`)


          // getElement(`#new-store_address`).value = response.data.address;
        });
    });

    getElement(`#new-store__update`)
      .addEventListener('click', () => {
        cleanError();
        let _formData = new FormData($('#new-store_form')[0]);
        let _route =`/admin/stores/${getElement(`#new-store_id`).value}`;

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        });
        $.ajax({
          url: _route,
          type: 'post',
          data: _formData,
          contentType: false,
          processData: false,
          success: function(e) {
            unlock_window();
            $(`#new-stores`).modal('hide');
            datatableStores();

            //after actions
          },
          error: function(jqXHR, textStatus, errorThrown) {
            unlock_window();
            $.each(jqXHR.responseJSON, function(key, value) {
              if (key == "name_company") {
                $.each(value, function(errores, eror) {
                  $('#store-error-name').append("<li class='error-block'>" + eror + "</li>");
                });
              }
              if (key == "ruc") {
                $.each(value, function(errores, eror) {
                  $('#store-error-ruc').append("<li class='error-block'>" + eror + "</li>");
                });
              }
              if (key == "email") {
                $.each(value, function(errores, eror) {
                  $('#store-error-email').append("<li class='error-block'>" + eror + "</li>");
                });
              } else if (key == "business_name") {
                $.each(value, function(errores, eror) {
                  $('#store-error-business-name').append("<li class='error-block'>" + eror + "</li>");
                });
              } else if (key == "cel") {
                $.each(value, function(errores, eror) {
                  $('#store-error-cel').append("<li class='error-block'>" + eror + "</li>");
                });
              } else if (key == "membership_date_without_format") {
                $.each(value, function(errores, eror) {
                  $('#store-error-membership-date').append("<li class='error-block'>" + eror + "</li>");
                });
              };
            });
            // mistake(jqXHR, textStatus, errorThrown);
          }
        });


      });

    function clean_modal() {
      getElement(`#new-store_id`).value = ``;
      getElement(`#new-store_name`).value = ``;
      getElement(`#new-store_business-name`).value = ``;

      getElement(`#new-store_ruc`).value = ``;
      getElement(`#new-store_cel`).value = ``;
      getElement(`#new-store_phone`).value = ``;
      getElement(`#new-store_email`).value = ``;
      getElement(`#new-store_address`).value = ``;
      getElement(`#new-store_representative`).value = ``;
      getElement(`#new-store_description`).value = ``;
      // getElement(`#new-store_vision`).value = ``;
      // getElement(`#new-store_mission`).value = ``;

      $(`#new-store__save`).show();
      $(`#new-store__update`).show();
    }

    function changing_cities(country_id, city_id) {
      axios.get(`/admin/countries/${country_id}/cities`)
        .then((response) => {
          _fillSelectWithOutFirstOption(getElement(`#new-store_city`), response.data, city_id);
        });
    }

  })();