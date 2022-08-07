(() => {
	getElement(`#logistic__search`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			console.log("clicking...");
			axios.get(`/template_6/order/${getElement(`input[name="code"]`).value}/trackings-by-code`)
				.then((response) => {
					getElement(`.ligistic_nav`).innerHTML = ``;
					let _content = ``;

					response.data.states.forEach((value) => {

						switch(value.id){
							case 1:
								_content+= `<li class="${(response.data.trackings.shipping_status_id == 1) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 1) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}"  >${value.name}</span></li>`;
							break;
							case 2:
								_content+= `<li class="${(response.data.trackings.shipping_status_id == 2) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 2) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}"  >${value.name}</span></li>`;
							break;

							case 3:
								_content+= `<li class="${(response.data.trackings.shipping_status_id == 3) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 3) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}">${value.name}</span></li>`;
							break;

							case 4:
								_content+= `<li class="${(response.data.trackings.shipping_status_id == 4) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 4) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}"  >${value.name}</span></li>`;
							break;							
						}
					});
					console.log(_content);
					getElement(`.ligistic_nav`).innerHTML = _content;



					/*getElement(`.ligistic_nav_description`).innerHTML = ``;
					let _content_ = ``;

					response.data.states.forEach((value) => {

						switch(value.id){
							case 1:
								_content_+= `<li >${(response.data.trackings.shipping_status_id == 1) ? "<span>"+response.data.trackings.description+"</span>" : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}</li>`;
							break;
							case 2:
								_content_+= `<li >${(response.data.trackings.shipping_status_id == 2) ? "<span>"+response.data.trackings.description+"</span>" : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}</li>`;
							break;

							case 3:
								_content_+= `<li >${(response.data.trackings.shipping_status_id == 3) ? "<span>"+response.data.trackings.description+"</span>" : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}</li>`;
							break;

							case 4:
								_content_+= `<li >${(response.data.trackings.shipping_status_id == 4) ? "<span>"+response.data.trackings.description+"</span>" : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}</li>`;
							break;							
						}
					});
					console.log(_content_);
					getElement(`.ligistic_nav_description`).innerHTML = _content_;*/
				})
				.catch((err) => {
					getElement(`.ligistic_nav`).innerHTML = ``;
					toastNotice(`${err.response.data.message}`);
				});

		});


})();