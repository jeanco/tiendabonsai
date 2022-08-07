// getElement(`.product_quotation`)
// 	.addEventListener('click', (e) => {
// 		e.preventDefault();
// 		localStorage.removeItem(`product_quotation`);
// 		localStorage.setItem(`product_quotation`, getElement(`#product_id`).value);
// 		//location.replace(`/cotizar-modelo`);
// 		console.log("dawdadwa");
// 	});

$(`.product_quotation`).on('click', function(e){
	e.preventDefault();
	localStorage.removeItem(`product_quotation`);
	localStorage.setItem(`product_quotation`, getElement(`#product_id`).value);
	location.replace(`/cotizar-modelo`);
});