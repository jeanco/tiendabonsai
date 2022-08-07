(() => {

	var changeCheckbox = document.querySelector('.checkbox-permission');

	$('.checkbox-permission').on('change', function(){
		//console.log(changeCheckbox.checked);
		let _that = $(this)[0];
		let _roleId = _that.dataset.role_id,
			_permissionId = _that.dataset.permission_id;
		let _newStatus = _that.checked;

		axios.put(`/admin/roles/${_roleId}/permissions/${_permissionId}`, {
			'new_status': _newStatus
		})
			.then((response) => {
				$.growl.notice({ message: `${response.data.message}`  })
			})
			.catch((error) => {
				$.growl.error({ message: `Ha ocurrido un error`  })
			});

	});

})();