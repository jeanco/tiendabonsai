function getUserToEdit(userId)
{
	$.get('users/'+userId, function(data)
	{
		$('#user_id').val(data.user.id);
		$('#user_username').val(data.user.username);
		$('#user_user-type').val(data.user.user_type);
		$('#user_firstname').val(data.user.first_name);
		$('#user_lastname').val(data.user.last_name);
		$('#user_email').val(data.user.email);
		$('#user_cel').val(data.user.cel);
		$('#user_address').val(data.user.address);
		$('#user_company').val(data.user.company_id);
		$('#user_city').val(data.user.city_id);

		if (data.user.user_image != '' && data.user.user_image != null) {
			$('#user_preview-text').remove();
			$('#user_preview-image').append('<img src="'+data.user.user_image+'" style="display: block;">');
		}
	})
}