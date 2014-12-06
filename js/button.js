jQuery(document).ready(function($) {
	$('.update-field').click(function() {
		jQuery.ajax({
			url : my_ajax_script.ajaxurl,
			data : { action : 'get_my_option' },
			success : function() {
				alert('You kickass!');
			}
		});
	});
});
