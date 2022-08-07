(() => {
	getElement(`#logistic__search`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			axios.get(`/template_11/order/${getElement(`input[name="code"]`).value}/trackings-by-code`)
				.then((response) => {
					getElement(`.ligistic_nav`).innerHTML = ``;
					let _content = ``;

					/*response.data.states.forEach((value) => {

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
					});*/

					if (response.data.trackings == null) {
						_content = `<li class="event color_activado" data-date="${response.data.order_date}"><h3 style="margin-bottom: 1px; ">Pendiente</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;

						response.data.states.forEach((value) => {
							switch(value.id){
								case 1:
									//_content+= `<li class="${(response.data.trackings.shipping_status_id == 1) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 1) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}"  >${value.name}</span></li>`;
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;
								break;
								case 2:
									//_content+= `<li class="${(response.data.trackings.shipping_status_id == 2) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 2) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}"  >${value.name}</span></li>`;
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;"></p></li>`;
								break;

								case 3:
									//_content+= `<li class="${(response.data.trackings.shipping_status_id == 3) ? "active" : ""}"><span class="${(response.data.trackings.shipping_status_id == 3) ? "bg-primary ligistic_text p-2" : "bg-info ligistic_text p-2"}">${value.name}</span></li>`;
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;"></p></li>`;
								break;

								case 4:
									//_content+= `<li class=class=ext p-2" : "bg-info ligistic_text p-2"}"  >${value.name}</span></li>`;
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;"></p></li>`;
								break;							
							}
						});

						getElement(`.ligistic_nav`).innerHTML = _content;

						return;
					}

					_content = `<li class="event" data-date="${response.data.order_date}"><h3 style="margin-bottom: 1px; ">Pendiente</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;

					response.data.states.forEach((value) => {
						switch(value.id){
							case 1:

								if (response.data.trackings.shipping_status_id == 1) {
									_content+= `<li class="event color_activado" data-date="${response.data.date_formatted}"><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" >${response.data.trackings.description}</p></li>`;
								} else {
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;
								}

							break;
							case 2:

								if (response.data.trackings.shipping_status_id == 2) {
									_content+= `<li class="event color_activado" data-date="${response.data.date_formatted}"><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;">${response.data.trackings.description}</p></li>`;
								} else {
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;
								}

							break;

							case 3:
								if (response.data.trackings.shipping_status_id == 3) {
									_content+= `<li class="event color_activado" data-date="${response.data.date_formatted}"><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;">${response.data.trackings.description}</p></li>`;
								} else {
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;
								}
							break;

							case 4:

								if (response.data.trackings.shipping_status_id == 4) {
								_content+= `<li class="event color_activado" data-date="${response.data.date_formatted}"><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;">${response.data.trackings.description}</p></li>`;
								} else {
									_content+= `<li class="event" data-date=""><h3 style="margin-bottom: 1px; ">${value.name}</h3><p style="    margin-top: 0px!important; margin-bottom: 30px !important;" ></p></li>`;
								}
							break;							
						}
					});

					getElement(`.ligistic_nav`).innerHTML = _content;
				})
				.catch((err) => {
					getElement(`.ligistic_nav`).innerHTML = `No existe pedido con ese código.`;
				});

		});


})();