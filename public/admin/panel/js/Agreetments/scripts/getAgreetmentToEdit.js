function getAgreetmentToEdit(agreetmentId)
{
	$.get('agreetments/'+agreetmentId,function(data){
		console.log(data)
		if (data) {
			$('#agreetment_title').val(data.agreetment.title);
			$('#agreetment_website').val(data.agreetment.website);
			// editor2('agreetment_description');
			$('#agreetment_id').val(data.agreetment.id);
			document.querySelector('#agreetment_description').value = data.agreetment.description;
			editor3($('#agreetment_description'));

			$('#agreetment_published').prop('checked', false).change();
			if (data.agreetment.published === '1') {
				$('#agreetment_published').prop('checked', true).change();
			}

			if (data.agreetment.image) {
				$('#agreetment_preview_image').append('<img src="'+data.agreetment.image+'" style="display: block;">');
				$('#agreetment_preview_text').hide();
			}
		}
		else {
			alert("error");
		}
	});
}
