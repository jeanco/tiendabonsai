(() => {

	getElement(`#claim__save`)
		.addEventListener('click', function(e) {
			lockWindow();
			e.preventDefault();
			cleanError();

			let _formData = new FormData($(`#claim_form`)[0]);

			let _item_option_id = $(`#item_type`).find('input:checked')[0].dataset.index;
			let _claim_option_id = $(`#claim_type`).find('input:checked')[0].dataset.index;

			_formData.append('item_option_id', _item_option_id);
			_formData.append('claim_option_id', _claim_option_id);

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			});
			$.ajax({
				url : `/api/template_14/claim`,
				type: 'POST',
				data: _formData,
				contentType: false,
				processData: false,
				success: function(e){
					unlockWindow();
					$(`#claim_form`)[0].reset();
					Swal.fire(
	                    e.title,
	                    e.message,
	                    'success'
                    )
				},
				error:function(jqXHR, textStatus, errorThrown)
				{
					unlockWindow();
					$.each(jqXHR.responseJSON, function (key, value) {
						  $.each(value, function (errores, eror) {
							$(`#claim-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
						  });
					  });
				}
			})
		});


	$(`#rad_1`)
		.on('click', function(){
			$(`#rad_2`).prop("checked", false);
		});

	$(`#rad_2`)
		.on('click', function(){
			$(`#rad_1`).prop("checked", false);
		});


	$(`#rad_3`)
		.on('click', function(){
			$(`#rad_4`).prop("checked", false);
			$(`#rad_5`).prop("checked", false);

		});

	$(`#rad_4`)
		.on('click', function(){
			$(`#rad_3`).prop("checked", false);
			$(`#rad_5`).prop("checked", false);

		});

	$(`#rad_5`)
		.on('click', function(){
			$(`#rad_3`).prop("checked", false);
			$(`#rad_4`).prop("checked", false);
		});
})();