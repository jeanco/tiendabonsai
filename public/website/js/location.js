(() => {
	
	axios.get(`/admin/companies/${document.querySelector(`#company_id`).value}`)
		.then((response) => {
			$('#location').locationpicker({
				enableAutocomplete: true,
				enableReverseGeocode: true,
				radius: 0,
				location: {
					latitude: response.data.latitude,
					longitude: response.data.longitude,
				},
				inputBinding: {
					// latitudeInput: $('#company_latitude'),
					// longitudeInput: $('#company_longitude'),
					// locationNameInput: $('#company_address_')
				}
			})
		});



})();