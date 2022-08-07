function getServiceToEdit(serviceId)
{
	$.get('services/'+serviceId,function(data){
		if (data) {
			$('#service_name').val(data.service.name);
			document.querySelector('#service_content').value = data.service.description;
			addSummernoteEditor($('#service_content'), 200);
			$('#service_id').val(data.service.id);
				
			$('#service_published').prop('checked', false).change();
			if (data.service.published === '1') {
				$('#service_published').prop('checked', true).change();
			}

			if (data.service.image) {
				$('#service_preview_image').append('<img src="'+data.service.image+'" style="display: block;">');
				$('#service_preview_text').hide();
			}
		}
		else {
			alert("error");
		}
	});
}
