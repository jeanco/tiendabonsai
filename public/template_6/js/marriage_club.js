(() => {

	$(`#register`)
		.on('click', function(){

	  	lockWindow();

	  	let _formData = new FormData($('#club_form')[0]);
		_formData.append('boyfriend_full_name', $(`#boyfriend_form input[name="full_name"]`).val());
		_formData.append('boyfriend_identity_document', $(`#boyfriend_form input[name="identity_document"]`).val());
		_formData.append('boyfriend_cellphone', $(`#boyfriend_form input[name="cellphone"]`).val());
		_formData.append('boyfriend_email', $(`#boyfriend_form input[name="email"]`).val());
		_formData.append('boyfriend_birthday', $(`#boyfriend_form input[name="birthday"]`).val());
		_formData.append('boyfriend_address', $(`#boyfriend_form input[name="address"]`).val());
		_formData.append('girlfriend_full_name', $(`#girlfriend_form input[name="full_name"]`).val());
		_formData.append('girlfriend_identity_document', $(`#girlfriend_form input[name="identity_document"]`).val());
		_formData.append('girlfriend_cellphone', $(`#girlfriend_form input[name="cellphone"]`).val());
		_formData.append('girlfriend_email', $(`#girlfriend_form input[name="email"]`).val());
		_formData.append('girlfriend_birthday', $(`#girlfriend_form input[name="birthday"]`).val());
		_formData.append('girlfriend_address', $(`#girlfriend_form input[name="address"]`).val());

		let _boyfriendForm = new FormData($(`#boyfriend_form`)[0]);

		var object = {};
		_boyfriendForm.forEach((value, key) => {object[key] = value});
		var jsonBoyfriend = JSON.stringify(object);

		_formData.append('boyfriend', jsonBoyfriend);

		let _girlfriendForm = new FormData($(`#girlfriend_form`)[0]);
		var object = {};

		_girlfriendForm.forEach((value, key) => {object[key] = value});

		var jsonGirlfriend = JSON.stringify(object);
		_formData.append('girlfriend', jsonGirlfriend);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: `/api/template_6/boyfriends-register`,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function(e) {
          toastNotice(`${e.message}`);
          unlockWindow();
          $(`#girlfriend_form`)[0].reset();
          $(`#boyfriend_form`)[0].reset();
          $(`#club_form`)[0].reset();
        },
        error: function(jqXHR, textStatus, errorThrown) {

          unlockWindow();
           $.each(jqXHR.responseJSON, function(key, value) {
              $.each(value, function(errores, eror) {
                $(`#${key}-error`).append("<li class='error-block'>" + eror + "</li>");
              });
          });
        }
      });



	});







})();