$(document).on('ready',function(){
	//Cargar automaticamente la empresa
	loadCompany();
});

$('#company-info-save').on('click',function(){
	saveCompanyInfo();
});

$('#company-slogan-save').on('click',function(){
	saveCompanySlogan();
});

$('#company_update').on('click',function(){
	updateCompany();
});

$('#company_add_video').on('click',function(){
	cleanModalCompanyVideo('add');
	cleanError();
});

$('#company_save_video').on('click',function(){
	saveCompanyVideo();
});

$(document).on('click','.edit_video',function(){
	cleanModalCompanyVideo('edit');
	getVideoToEdit($(this).data('index'));
});

$('#company_update_video').on('click',function(){
	updateCompanyVideo();
});

$(document).on('click','.delete_video',function(){
	cleanModalCompanyVideo('add');
	deleteVideo($(this).data('index'));
});

$(document).on('click','.company_delete_cover',function(){
		itemCover = $(this).parent().parent().parent();
		cleanModalCompanyVideo('add');
		deleteCover($(this).data('index'));
});

function cleanModalCompanyVideo(operation){
	$('#company_video_content').val('');
	$('#company_video_resource').val('');
	$('#company_video_id').val('');

	if (operation == 'add') {
		$('#company_save_video').show();
		$('#company_update_video').hide();
		$('#company_video_method').remove();
	}
	else if(operation == 'edit'){
		$('#company_save_video').hide();
		$('#company_update_video').show();
		$('#company_video_method').remove();
		$('#form_company_video').append('<input type="hidden" id="company_video_method" name="_method" value="PUT" />');
	}
}
