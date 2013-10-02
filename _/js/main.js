jQuery(document).ready(function($) {
	$('#menu-primary-items .menu-parent-item').on("click", function(e) {
		$(this).toggleClass("open");
	});
});