jQuery(document).ready(function($) {
	var currentPage = 1;

    //load more functon
	$('.btn-load-more').on('click', function(e) {
		e.preventDefault();		
		var button = $(this);
 
		$.ajax({
			type: "POST",
			dataType: "html",
			url: loadmore_params_testimonials.ajaxurl,
			data:  {
				action: 'loadmore_testimonials',
				offsetPage: currentPage * 5
			},
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success: function(data){
				currentPage++;
				var $data = $(data);
				if($data.length){
					button.text( 'Load More Testimonials' );
					$(".testimonial-holder").append(data);
				} else {
					button.addClass('disabled');
					button.text('End of Posts');
				}
			},
			error : function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
				button.text( 'Error!' );
                button.addClass('disabled');
			}
		});
	});
});