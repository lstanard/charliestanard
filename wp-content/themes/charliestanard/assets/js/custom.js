/*------------------------------------------------------------------
	CUSTOM UI SCRIPTS
-------------------------------------------------------------------*/

(function($) {

	$(document).ready(function() {

		var $w = $(window),
			sw = document.documentElement.clientWidth,
			sh = document.documentElement.clientHeight;

	});

	$(window).load(function(){

		// Page loaded, add 'loaded' class to body
		window.setTimeout(function() {
			$('body').addClass('loaded');
		}, 500);

	});

	$(window).on('debouncedresize', function() {
		sw = document.documentElement.clientWidth;
		sh = document.documentElement.clientHeight;
	});

})(jQuery);
