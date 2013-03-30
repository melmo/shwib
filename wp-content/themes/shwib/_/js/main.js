jQuery.noConflict();
jQuery(document).ready(function($) {
	$('#slider-wrap').cycle({ 
    fx:     'shuffle', 
    delay:  -4000 
});
	$(window).resize(function() {
    	$('#slider-wrap').cycle('destroy').removeAttr('style').find('div[style]').removeAttr('style');
    	$('#slider-wrap').cycle();
    });
});
(jQuery);
