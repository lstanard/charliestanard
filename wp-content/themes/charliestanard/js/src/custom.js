/*------------------------------------------------------------------
	CUSTOM UI SCRIPTS
-------------------------------------------------------------------*/

(function($) {

	$(document).ready(function() {

		var $w = $(window),
			sw = document.documentElement.clientWidth,
			sh = document.documentElement.clientHeight;

		function bodyHasClass(pageClass) {
			var bodyClasses = $('body').attr('class').split(" ");
			return $.inArray(pageClass, bodyClasses) >= 0 ? true : false;
		}

		// Instantiate mmenu mobile menu plugin
		// $('#header-menu').mmenu({
		// 	extensions: [ 'pageshadow' ]
		// }, {
		// 	clone: true,
		// });

		// Instantiate slicknav mobile menu plugin
		// $('#header-menu > ul').slicknav();

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
