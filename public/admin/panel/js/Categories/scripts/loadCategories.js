// function loadCategories(){
// 	var ruta = 'categories';
// 	ajaxAll_GET(ruta,successLoadCategories);
// }
//
// function successLoadCategories(data){
// 	if (data.categories) {
// 		var content = '';
// 		$.each(data.categories,function(i,category){
// 			content = content +	'<div class="owl-item" style="margin-right: 10px;">'+
// 												'<li>'+
// 												 ' <a class="c-sub-header__item" data-index="'+category.id+'">'+
// 													'<figure>'+
// 													  '<img src="'+category.image_thumb+'"/>'+
// 													'</figure>'+
// 													'<span>'+category.name+'</span>'+
// 												 ' </a>'+
// 												'</li>'+
// 											'</div>';
// 		});
// 		$('#categories_carousel .owl-stage').append(content);
// 	}
// 	else {
// 		alert('No existe categorias')
// 	}
// }
