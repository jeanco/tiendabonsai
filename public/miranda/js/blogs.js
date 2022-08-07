(() => {

	var perPage = 5;
	var tagId = '';
 		
	//Catching the tagId
	tagId = getValueParameter('tag_id');

	fetch_data_blog(1, perPage, tagId);
	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data_blog(_page, perPage, tagId);
	});
		
	$(document).on('click', '.tag__change', function(e){
		e.preventDefault();
		let _tagId = $(this)[0].dataset.tag_id;
		fetch_data_blog(1, perPage, _tagId);
	});


	function fetch_data_blog(page, perPage, tagId) {
		$.ajax({
			url: `/api/miranda/pagination/fetch-data-blog?page=${page}&per_page=${perPage}&tag_id=${tagId}`,
			success: function(data) {
				$('#table_data_blog').html(data);
			}
		});
	}

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