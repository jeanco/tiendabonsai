function updateTestimony()
{
    var _route  = 'testimonies/'+$('#testimony_id').val();
    var _formData = new FormData($('#form_testimony')[0]);

    lockWindow();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
       url : _route,
       type: 'POST',
       data: _formData,
       contentType: false,
       processData: false,
       success: function(e){
         unlockWindow();
         if (e.success == false) {
             $.growl.error({ message: "Ha ocurrido un error" });
         }
         else if(e.success == true){
            $.growl.notice({ message: "Se ha actualizado correctamente el testimonio" });
            $('#add-testimony').modal('hide');

            $.get('testimonies', function(data){
                loadGridTestimonies(data);
            });
         }
     },
      error:function(jqXHR, textStatus, errorThrown)
        {
          $.unblockUI();
          $('#testimony_error').append("Corrija los siguientes campos por favor!");
          $.each(jqXHR.responseJSON, function( key, value ) {
              if (key == "full_name") {
                $.each(value, function( errores, eror ) {
                  $('#testimony_error-name').append("<li class='error-block'>"+eror+"</li>");
                });
              }
              else if (key == "description") {
                $.each(value, function( errores, eror ) {
                  $('#testimony_error-description').append("<li class='error-block'>"+eror+"</li>");
                });
              }
          });
       }
     });
}