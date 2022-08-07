function deleteCustomer(customerId) {
  swal({
      title: 'Borrar el cliente',
      text: '¿Está usted seguro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      closeOnConfirm: true
    },
    function () {
      var ruta = "customers/" + customerId;
      lockWindow();
    
      axios.delete(`customers/${customerId}`)
        .then(({data}) => {
          unlockWindow();
          toastNotice(`El cliente ha sido eliminado.`);

          axios.get(`customers`)
            .then(({data}) => {
              loadGridCustomers(data.customers);
            });
        })
        .catch((error) => {
          unlockWindow();
          toastError(error.response.data.message);
        });   
    });
}