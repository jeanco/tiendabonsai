function ajaxAll_GET(ruta,accion,datos){
	lockWindow();
    $.ajax({
        url: ruta,
        type: 'get',
		data: datos,
        dataType: 'json',
        success:function(data)
        {  unlockWindow();
            accion(data);
        }
    });
}

function ajaxAll_PUT(ruta,data,accion){
  $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
  $.ajaxSetup({
      headers: {
          'csrftoken': $('input[name=_token]').val()
      }
  });
  $.ajax({
     type: 'PUT',
     url : ruta,
     data: data,
	 dataType: 'json',
	 contentType: "application/json",
	 processData: false,
     success: function(e){
       $('body').modalmanager('removeLoading');
       accion(e);
     }
   });
}

//ajax que funciona sin serializeObject
function ajaxAll_PUT_(ruta,data,accion){
  $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
  $.ajaxSetup({
      headers: {
          'csrftoken': $('input[name=_token]').val()
      }
  });
  $.ajax({
     type: 'PUT',
     url : ruta,
     data: data,
     success: function(e){
       $('body').modalmanager('removeLoading');
       accion(e);
     }
   });
}

function ajaxAll_POST(ruta,data,accion){
  // $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
  });
  $.ajax({
	 url : ruta,
     type: 'post',
     data: data,
	 dataType: 'json',
	 contentType: "application/json",
	 processData: false,
     success: function(e){
    //    $('body').modalmanager('removeLoading');
       accion(e);
     }
   });
}

function ajaxall_POST_formData(ruta,data,accion,mistake){
  $.blockUI(
	  {
		  message: "<h1>Espere por favor...</h1>",
		  css: {
			 border: 'none',
			 padding: '15px',
			 backgroundColor: '#000',
			 opacity: .5,
			 color: '#fff',
			 display: 'flex',
			 top: 0,
			 bottom: 0,
			 left: 0,
			 right: 0,
			 'z-index': 1051,
			 width :'100%',
			 'justify-content': 'center',
			 'align-items': 'center',
     } });
     
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
  });
  $.ajax({
	 url : ruta,
     type: 'post',
     data: data,
	 contentType: false,
	 processData: false,
     success: function(e){
	   $.unblockUI();
       accion(e);
   },
   error:function(jqXHR, textStatus, errorThrown)
   {
		$.unblockUI();
		mistake(jqXHR, textStatus, errorThrown);
   }

   });
}
