function savePost()
{
	cleanError();
	saveOrUpdateFormData('post-form','posts',successSavePost,errorSavePost);
}

function successSavePost(data)
{
	if (data.success == true){
		$.growl.notice({ message: msgSavePost });

		$.get('posts',function(data){
			loadGridPosts(data.posts)
		});

		post.form.hide();
		post.dropzoneArea.show();

		post.id.val(data.post.id);
		post.modalTitle.text("Imágenes de la Noticia "+data.post.title);

		post.titleAfterSaved.empty();
		post.titleAfterSaved.append(data.post.title);

		post.contentAfterSaved.empty();
		post.contentAfterSaved.append(data.post.content);
		post.save.hide();
		post.close.show();

		statusCloseModalPost = true;

		post.carousel.show();
		
		if (statusCarouselPost == false) {
			statusCarouselPost = true;
			startCarouselPost();
		}
	}
	else if(data.success == false){
		$.growl.error({ message: msgFailedAction });
	}
}

function errorSavePost(jqXHR, textStatus, errorThrown)
{
	$('#post-error').append(msgError);
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "title") {
			$.each(value, function( errores, eror ) {
				$('#post-title-error').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "content") {
			$.each(value, function( errores, eror ) {
				$('#post-content-error').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
}
