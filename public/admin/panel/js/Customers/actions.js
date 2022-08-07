$(document).on('ready', function () {
  $.get('customers', function (data) {
    loadGridCustomers(data.customers);
  });
});

$('#customer__add').on('click', function (e) {
  let _route = `countries`;
  
  axios.get(_route)
    .then(({
      data
    }) => {
      cleanError();
      cleanModalCustomer();
      $('#customer_save').show();
      $('.customer_type-2').hide();

      let _options = `<option value="">Seleccione País</option>`;

      data.forEach(country => {
        _options += `<option value="${country.id}">${country.name}</option>`;
      });

      $('#customer_country').empty();
      $('#customer_country').append(_options);
    })
});

$('#customer_country').on('change', function (e) {
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

$(document).on('click', '.customer_delete', function () {
  deleteCustomer($(this).data('index'));
});

$(document).on('click', '.customer_edit', function () {
  cleanError();
  cleanModalCustomer();
  addInputPut($('#form_customers'), 'customer_method');
  $('#customer_update').show();
  getCustomerToEdit($(this).data('index'));
});

$('#customer_save').on('click', function () {
  saveCustomer();
});

$('#customer_update').on('click', function () {
  updateCustomer();
});





function cleanModalCustomer() {
  $('#customer_method').remove();
  $('#customer_save').hide();
  $('#customer_update').hide();
  
  $('#customer_id').val('');
  $('#customer_firstname').val('');
  $('#customer_lastname').val('');
  $('#customer_email').val('');
  $('#customer_cel').val('');
  $('#customer_facebook').val('');
  $('#customer_city').val('');
  $('#customer_country').val('');

  $('.customer_type-1').show();
  $('.customer_type-2').show();

}
