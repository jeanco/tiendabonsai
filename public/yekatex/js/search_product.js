(() => {
	getElement(`#home-search__go`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			window.location.replace(`${window.location.origin}/catalogo?q=${getElement(`#home-search_text`).value}&category=${$(`#home-search_category`).find(':selected').data('slug')}`);
		});
})();