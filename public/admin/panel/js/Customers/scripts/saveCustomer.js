function saveCustomer() {
  cleanError();
  saveOrUpdateFormData('form_customers', 'customers', successSaveCustomer, errorSaveCustomer);
}

function successSaveCustomer(data) {

  $.growl.notice({
    message: "Se ha creado al cliente"
  });

  $.get('customers', function (data) {
    loadGridCustomers(data.customers);
  });

  $('#add-customers').modal('hide');
}

function errorSaveCustomer(jqXHR, textStatus, errorThrown) {
  $.growl.error({
    message: "Ha ocurrido un error"
  });
  $('#customer_error').append("Corrija los siguientes campos por favor!");
  $.each(jqXHR.responseJSON, function (key, value) {
    if (key == "identity_document") {
      $.each(value, function (errores, eror) {
        $('#customer-document-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "first_name") {
      $.each(value, function (errores, eror) {
        $('#customer-firstname-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "last_name") {
      $.each(value, function (errores, eror) {
        $('#customer-lastname-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "legal_name") {
      $.each(value, function (errores, eror) {
        $('#customer-legalname-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "email") {
      $.each(value, function (errores, eror) {
        $('#customer-email-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "cel_whatsapp") {
      $.each(value, function (errores, eror) {
        $('#customer-cel-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "country_id") {
      $.each(value, function (errores, eror) {
        $('#customer-country-error').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "city_id") {
      $.each(value, function (errores, eror) {
        $('#customer-city-error').append("<li class='error-block'>" + eror + "</li>");
      });
    };
  });
}
