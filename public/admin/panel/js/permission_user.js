(() => {

	$('.permission-user-checkbox').on('change', function(){
		let _that = $(this)[0];
		let _userId = _that.dataset.user_id,
			_permissionId = _that.dataset.permission_id;
		let _newStatus = _that.checked;

		axios.put(`/admin/users/${_userId}/permissions/${_permissionId}`, {
			'new_status': _newStatus
		})
			.then((response) => {
				toastNotice(`Se ha cambiado el estado del Permiso-Usuario!`);

			})
			.catch((error) => {
				toastError(`Ha ocurrido un error!`);
			});
	});

	$('.permission-additional-user-checkbox').on('change', function(){
		let _that = $(this)[0];
		let _userId = _that.dataset.user_id,
			_permissionId = _that.dataset.permission_id;
		let _newStatus = _that.checked;

		axios.put(`/admin/users/${_userId}/additional-permissions/${_permissionId}`, {
			'new_status': _newStatus
		})
			.then((response) => {
				toastNotice(`Se ha cambiado el estado del Permiso Adicional-Usuario!`);
			})
			.catch((error) => {
				toastError(`Ha ocurrido un error!`);
			});
	});




})();