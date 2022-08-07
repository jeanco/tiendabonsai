function getPostToEdit(postId)
{
	$.get('posts/'+postId,function(data){
		post.id.val(data.post.id);
		post.title.val(data.post.title);

		post.content.val(data.post.content);
		editor2('post-content');

		post.modalTitle.text("Información de la Noticia "+data.post.title);

	});
}
