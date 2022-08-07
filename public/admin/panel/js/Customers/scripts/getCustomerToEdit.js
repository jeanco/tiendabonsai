function getCustomerToEdit(customerId) {
  let _route = `customers/${customerId}`;
  axios.get(_route)
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
}
