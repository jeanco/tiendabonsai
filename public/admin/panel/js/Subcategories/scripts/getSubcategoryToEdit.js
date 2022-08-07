function getSubcategoryToEdit(subcategoryId)
{
	var ruta = "subcategories/"+subcategoryId;
	$.get(ruta,function(data){
		if (data.subcategory) {
			$('#subcategory_id').val(data.subcategory.id);
			$('#subcategory_name').val(data.subcategory.name);
			$('#subcategory_content').val(data.subcategory.content);


			$('#subcategory_published').prop('checked', false).change();
			
			if (data.subcategory.published == true) {
				$('#subcategory_published').prop('checked', true).change();
			}

			$('#subcategory-modal').modal('show');
		}
		else {
			alert("error");
		}
	});
}
