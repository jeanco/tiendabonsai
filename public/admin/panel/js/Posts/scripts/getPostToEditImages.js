function getPostToEditImages(postId)
{
	$.get('posts/'+postId,function(data){
		if (data.post) {
			post.form.hide();
			post.id.val(data.post.id);
			post.modalTitle.text('Imágenes de la Noticia '+data.post.title);
			post.titleAfterSaved.append(data.post.title);
			post.contentAfterSaved.append(data.post.content);
			post.save.hide();
			post.update.hide();

			setTimeout(function () {
				if (statusCarouselPost == false) {
					startCarouselPost();
					statusCarouselPost = true;
				}

				$.get('contents/'+data.post.id+'/3/1',function(data){
					if (data.images.length) {
						addImageToSlide(swiperPost,$('#post-swiper-container'),data.images);
						post.carousel.show();
					}
					else {
						post.carousel.hide();
					}
				});
			}, 1000);
		}
		else{
			alert("Error");
		}
	});
}
