jQuery(document).ready(function($) {
	$('#menu-primary-items .sub-menu-parent').on("click", function(e) {
		$(this).toggleClass("open");
	});
});