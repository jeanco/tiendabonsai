function publishedPost(postId,postName,lastStatus)
{
	var text;
	if (lastStatus == 1) {
		text = "¿Dejar de publicar la noticia "+postName+'?';
	}
	else if (lastStatus == 0) {
		text = "¿Publicar la noticia "+postName+'?';
	}

	swal({   title: text,
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "posts/change-published-status";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'postId':postId,'lastStatus':lastStatus},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true){
					$.growl.notice({ message: msgPublishedChangePost });
					$.get('posts',function(data){
						loadGridPosts(data.posts)
					});
				}
				else if(result.success == false){
					$.growl.error({ message: msgPublishedChangePostError });
				}
			}
		});
	  });
}
