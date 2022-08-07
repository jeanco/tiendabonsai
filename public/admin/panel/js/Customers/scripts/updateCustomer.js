function updateCustomer() {
  cleanError();
  saveOrUpdateFormData('form_customers', 'customers', successUpdateCustomer, errorSaveCustomer);

}

function successUpdateCustomer(data) {
  $.growl.notice({
    message: "Se ha actualizado correctamente al cliente"
  });

  $.get('customers', function (data) {
    loadGridCustomers(data.customers);
  });
  
  $('#add-customers').modal('hide');
}
