function deletePost(postId)
{
	swal({   title: "Borrar Noticia",
	  text: "¿Estás seguro?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Aceptar",
	  cancelButtonText:"Cancelar",
	  closeOnConfirm: true },
	  function(){
		  var ruta = "posts";
		  lockWindow();
		  $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('input[name=_token]').val()
			}
		  });
		  $.ajax({
			  url: ruta,
			  data: {'postId':postId},
			  type: 'DELETE',
			  success: function(result) {
				  unlockWindow();
				  if (result.success == true) {
					  $.growl.notice({message: msgDeletePost});
					  $.get('posts',function(data){
						  loadGridPosts(data.posts)
					  });
				  }
				  else if(result.success == false) {
					  $.growl.error({message: msgDeletePostError});

				  }
			  }
		  });
	  });
}
