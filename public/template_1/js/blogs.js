(() => {

	var perPage = 4;
	var tagId = '';
	var search = "";

	//Catching the tagId
	tagId = getValueParameter('tag');
	search = getValueParameter('search');

	fetch_data_blog(1, perPage, tagId, search);

	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
        let _page = $(this).attr('href').split('&page=')[1];
		fetch_data_blog(_page, perPage, tagId, search);
	});

	$(document).on('click', '.tag__change', function(e){
		e.preventDefault();
        let _tagSlug = $(this)[0].dataset.slug;
        tagId = _tagSlug;

        newUrl = `?tag=${tagId}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		fetch_data_blog(1, perPage, tagId);
	});
    
	function fetch_data_blog(page, perPage, tagId, search = '') {
		$.ajax({
			url: `/api/template_1/pagination/fetch-data-blogs?page=${page}&per_page=${perPage}&tag_slug=${tagId}&q=${search}`,
			success: function(data) {
				$('#table_data_blog').html(data);
			}
		});
	}

	document.querySelector(`#search_blog`)
		.addEventListener('keyup', (e) => {
			if (e.keyCode == 13) {
				newUrl = `?tag=${tagId}&search=${e.target.value}`;
				window.history.replaceState("object or string", "Page Title 2", newUrl);
				fetch_data_blog(1, perPage, tagId, e.target.value);
			}
	});

	function getValueParameter(parameter){
		var url_string = window.location.href;
		var url = new URL(url_string);
		let _risposta = url.searchParams.get(parameter);

		if (_risposta == null || _risposta == '') {
			return '';
		}
		return _risposta;
	}

})();