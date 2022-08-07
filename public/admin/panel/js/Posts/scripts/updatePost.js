function updatePost()
{
	cleanError();
	saveOrUpdateFormData('post-form','posts',successUpdatePost,errorUpdatePost);
}

function successUpdatePost(data)
{
	if (data.success == true){
		$.growl.notice({ message: msgUpdatePost });

		$.get('posts',function(data){
			loadGridPosts(data.posts)
		});

		post.form.hide();
		post.dropzoneArea.show();
		post.id.val(data.post.id);
		post.modalTitle.text('Imágenes de la Noticia '+data.post.title);
		post.titleAfterSaved.empty();
		post.titleAfterSaved.append(data.post.title);

		post.contentAfterSaved.empty();
		post.contentAfterSaved.append(data.post.content);
		post.update.hide();
		post.close.show();

		statusCloseModalPost  = true;
		
			$.get('contents/'+data.post.id+'/3/1',function(data){

				if (data.images.length) {
					post.carousel.show();

					if (statusCarouselPost == false) {
						startCarouselPost();
						statusCarouselPost = true;
					}
					addImageToSlide(swiperPost,$('#post-swiper-container'),data.images);
				}
			});
	}
	else if(data.success == false){
		$.growl.error({ message: msgFailedAction });
	}
}

function errorUpdatePost(jqXHR, textStatus, errorThrown)
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
