jQuery(document).ready(function($) {
	//add logical tab index
	$('a, input, select, button, textarea').attr('tabindex',0);
});

// Copyright 2014-2015 Twitter, Inc.
// Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement('style');
  msViewportStyle.appendChild(
    document.createTextNode(
      '@-ms-viewport{width:auto!important}'
    )
  );
  document.head.appendChild(msViewportStyle);
}

/* Search functions in nav bar */

jQuery(document).ready(function($) {
	var hideSearch;
	$('#search-toggle').on('click',function(e) {
		if ($(this).hasClass('open')) {
			clearTimeout(hideSearch);
			if (!$(e.target).hasClass('search-text')) {
				$(this).find('form').trigger('submit');
			}
		} else {
			$(this).addClass('open');
			$(this).find('input[type=text]').focus();
		}
	});
	$('#search-toggle input[type=text]').on('blur',function(e) {
		if($(document.activeElement).prop("tagName") === 'BODY') {
			hideSearch = setTimeout(function(){
				$('#search-toggle').removeClass('open');
			}, 300);
		}
	});
	$('#mobile-search-submit').on('click',function() {
		$(this).parents('.navbar-mobile-search').find('form').submit();
	});
});

jQuery(document).ready(function($) {

	function setMatchingHeights(selector, min, max) { // max and min width of screen sizes to apply the resizing
		var maxHeight = 0;
		if ($(window).width() < max && $(window).width() > min) {
			$(selector).css('min-height','0px').each(function() {
				if ($(this).outerHeight() > maxHeight) {
					maxHeight = $(this).outerHeight();
				}
			}).css('min-height', maxHeight + 'px');
		} else {
			$(selector).css('min-height','0px');
		}
	}

	function setDemoHeights() {
		setMatchingHeights('.demo', 750, 1204);
	}

	setDemoHeights();

	$(window).on('resize',setDemoHeights);

});