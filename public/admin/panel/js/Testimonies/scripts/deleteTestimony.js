function deleteTestimony(testimonyId)
{
    swal({   title: 'Borrar el testimonio',
      text: '¿Está usted seguro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText:'Cancelar',
      closeOnConfirm: true },
      function(){
        var _route = "testimonies/"+testimonyId;
        lockWindow();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        });
        $.ajax({
            url: _route,
            data: {},
            type: 'DELETE',
            success: function(result) {
                unlockWindow();
                successDeleteTestimony(result)
            }
        });
});
}

function successDeleteTestimony(data)
{
    if (data.success == true) {
        $.growl.notice({ message: "Se ha borrado el testimonio" });
        $.get('testimonies', function(data){
            loadGridTestimonies(data);
        });
    }
    else if(data.success = false){
        $.growl.error({ message: "Ha ocurrido un error al eliminar el testimonio" });
    }
}