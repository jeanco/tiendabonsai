(() => {
	$(document).on('click', '.tracking', function(){
		let _order_id = $(this)[0].dataset.index;
		getElement(`#tracking-order input[name="order_id"]`).value = _order_id;
		reload_tbody(_order_id);
	});

	getElement(`#tracking__add`)
		.addEventListener('click', () => {

			axios.post(`/admin/tracking`, {
				'order_id': getElement(`#tracking-order input[name="order_id"]`).value,
				'description': getElement(`#tracking-order input[name="description"]`).value,
				'shipping_status_id': getElement(`#tracking-order select[name="shipping_status_id"]`).value,
			})
			.then((risposta) => {
				console.log(risposta.data);
				getElement(`#tracking-order input[name="description"]`).value = "";
			})
			.then(() => {
				reload_tbody(getElement(`#tracking-order input[name="order_id"]`).value)

			})
			.catch((err) => {
				toastError(`${err.response.data.message}`);

			});

		});


	function reload_tbody(order_id){

		axios.get(`/admin/order/${order_id}/trackings`)
			.then((response) => {
				getElement(`#tracking_tbody`).innerHTML = ``;
				let _content = ``;
				response.data.forEach((value, index) => {
					_content += `
					                <tr>
					                  <td>${index+1}</td>
					                  <td>${value.shipping_status.name}</td>
					                  <td>${value.date_formatted}</td>
					                  <td>${value.description}</td>
					                  <td> <button type="button" data-index=${value.id} name="button" class="btn btn-danger glyphicon glyphicon-remove tracking__delete"></button> </td>
					                </tr>
								`;

				});
				getElement(`#tracking_tbody`).innerHTML = _content;

			});

	}

	$(document).on('click', '.tracking__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/tracking/${_id}`, {}, `¿Desea eliminarlo?`, (response) => {
			toastNotice(`${response.data.message}`);
			reload_tbody(getElement(`#tracking-order input[name="order_id"]`).value);
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});


})();