jQuery(document).ready(function($) {
	$('#menu-primary-items .dropdown > a').on("click", function(e) {
		e.preventDefault();
		if($(this).parent('li').hasClass("open");) {
			$(this).parent('li').removeClass("open");
		} else {
			$('#menu-primary-items .dropdown').removeClass('open');
			$(this).parent('li').addClass("open");
		}
	});
});