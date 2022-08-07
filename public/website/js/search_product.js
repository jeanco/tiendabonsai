(() => {
	
	$(`#search_product`)
		.addEventListener('keyup', (E) => {
			console.log(E.target.value);
		});
})();