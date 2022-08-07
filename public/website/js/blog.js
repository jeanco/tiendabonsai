(() => {

	var perPage = 6;
	
	fetch_data(1, perPage);
	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data(_page, perPage);
	});
	
	function fetch_data(page, perPage) {
		$.ajax({
			url: `/api/pagination/fetch-data-blog?page=${page}&per_page=${perPage}`,
			success: function(data) {
				$('#table_data_blog').html(data);
				$(".windows8").hide();
			}
		});
	}

})();