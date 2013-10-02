jQuery(document).ready(function($) {
	$('#menu-primary-items .dropdown > a').on("click", function(e) {
		e.preventDefault();
		$(this).parent('li').toggleClass("open");
	});
});