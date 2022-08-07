//Variables
var post = {
	form: $('#post-form'),
	method: $('#post-method'),
	id: $('#post-id'),
	title: $('#post-title'),
	titleAfterSaved:$('#post-title__after-saved'),
	content: $('#post-content'),
	contentAfterSaved:$('#post-content__after-saved'),

	grid: $('#posts-grid'),
	dropzoneArea: $('#post-dropzone-area'),
	info:$('#post-info__after-saved'),

	save: $('#post-button__save'),
	update: $('#post-button__update'),
	close:$('#post-button__close'),

	carousel:$('#post-swiper-container'),

	modal: $('#add-news'),
	modalTitle: $('#label-news-title'),

	btnCloseX: $('#btn-figure-x_modal-news__close'),
};

var swiperPost;




$(document).on('ready',function(){
	$.get('posts',function(data){
		loadGridPosts(data.posts);
	});
	
});

$('#post-button__create').on('click',function(){
	cleanModalPost('create');
	statusCloseModalPost = false;
});

$(document).on('click','.post-button__edit',function(){
	cleanModalPost('edit');
	statusCloseModalPost = false;
	getPostToEdit($(this).data('post_id'));
});

$(document).on('click','.post-button__edit-images',function(){
	cleanModalPost();
	statusCloseModalPost = true;
	getPostToEditImages($(this).data('post_id'));
});

$(document).on('click','.post-button__published',function(){
	publishedPost($(this).data('post_id'),$(this).data('post_title'),$(this).data('published'));
});

$(document).on('click','.post-button__delete',function(){
	deletePost($(this).data('post_id'));
});

post.save.on('click',function(){
	savePost();
});

post.update.on('click',function(){
	updatePost();
});

post.close.on('click',function(){
	cleanDropzone('post-dropzone');
	lockWindow();
	$.get('posts',function(data){
		unlockWindow();
		loadGridPosts(data.posts);
		post.modal.modal('hide');
	});
});

post.btnCloseX.on('click',function(){
	cleanDropzone('post-dropzone');
	if (statusCloseModalPost) {
		lockWindow();
		$.get('posts',function(data){
			unlockWindow();
			loadGridPosts(data.posts);
		});
	}
});

$(document).on('click','.image-slide-button__delete',function(){
	deleteSlide($(this).parent().data('index'),$(this).data('image_id'),swiperPost,$('#post-swiper-container'));
});

function cleanModalPost(action)
{
	cleanError();
	unlockElement(post.close);

	post.form.show();
	post.dropzoneArea.show();
	post.carousel.show();
	post.carousel.attr('data-number','');

	post.id.val('');
	post.title.val('');
	cleanEditor(post.content);
	post.content.val('');

	post.titleAfterSaved.empty();
	post.contentAfterSaved.empty();

	$('.swiper-wrapper').empty();
	
	$('#post-method').remove();

	post.save.show();
	post.update.show();
	post.close.show();

	post.modalTitle.text('Información de la Noticia');

	if (action == "create") {
		editor2('post-content')
		post.dropzoneArea.hide();
		post.carousel.hide();
		post.close.hide();
		post.update.hide();

		post.carousel.hide();

	}
	if (action == "edit") {
		post.form.append('<input type="hidden" id="post-method" name="_method" value="PUT" />');
		post.dropzoneArea.hide();
		post.carousel.hide();
		post.close.hide();
		post.save.hide();
	}
}

function startCarouselPost(){
	swiperPost = new Swiper('#post-swiper-container', {
		loop: false,
		pagination: '#post-gallery_swiper-pagination',
		nextButton: '#post-gallery_swiper-button-next',
		prevButton: '#post-gallery_swiper-button-prev',
		slidesPerView: 3,
		//centeredSlides: true,
		//paginationClickable: true,
		spaceBetween: 30,
	});
}
