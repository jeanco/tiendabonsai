function changePublishTestimony(testimonyId, lastStatus)
{
    var _text;
    var _route = "testimonies/publish";

    if (lastStatus == 1) {
        _text = "¿Dejar de publicar el testimonio?";
    }
    else if (lastStatus == 0) {
        _text = "¿Publicar el testimonio?";
    }
    swal({
      title: _text,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText:'Cancelar',
      closeOnConfirm: true },
      function(){
        lockWindow();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        });
        $.ajax({
            url: _route,
            data: {'testimonyId':testimonyId,'lastStatus':lastStatus},
            type: 'PUT',
            success: function(result) {
                unlockWindow();
                if (result.success == true) {
                    $.growl.notice({ message: "Se ha cambiado el estado del testimonio" });
                    $.get('testimonies', function(data){
                        loadGridTestimonies(data);
                    });
                }
                if (result.success == false) {
                    $.growl.error({ message: "Ha ocurrido un error al intentar cambiar el estado del testimonio" });
                }
            }
        });
      });
}