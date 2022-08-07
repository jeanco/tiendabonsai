function updateSubcategory()
{
	cleanError();
	var ruta  = 'subcategories';
	var formData = new FormData($('#form_subcategory')[0]);

	lockWindow();
	$.ajaxSetup({
		headers: {
			'csrftoken': $('input[name=_token]').val()
		}
	});
	$.ajax({
	   url : ruta,
	   type: 'post',
	   data: formData,
	   contentType: false,
	   processData: false,
	   success: function(e){
		 unlockWindow();
		 if (e.success == false) {
			 $.growl.error({ message: "Ha ocurrido un error" });
		 }
		 else if(e.success == true){
			 $.growl.notice({ message: "Se ha guardado la subcategoría "+e.subcategory.name  });
			 $('#subcategory-modal').modal('hide');
			 location.reload();
		 }
	 },
	 error:function(jqXHR, textStatus, errorThrown)
	 {
		 unlockWindow();
		 $('#subcategory-error').append(msgError);
		 $.each(jqXHR.responseJSON, function( key, value ) {
			 if (key == "name") {
				 $.each(value, function( errores, eror ) {
					 $('#subcategory-name-error').append("<li class='error-block'>"+eror+"</li>");
				 });
			 }
			 else if (key == "content") {
				 $.each(value, function( errores, eror ) {
					 $('#subcategory-content-error').append("<li class='error-block'>"+eror+"</li>");
				 });
			 };
		 });
 	 }
	 });
}
