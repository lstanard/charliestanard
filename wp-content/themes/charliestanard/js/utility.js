/*------------------------------------------------------------------------
	UTILITY FUNCTIONS (manually compiled from js/_vendor-source/es-utility-collected.js)
-------------------------------------------------------------------------*/

/*------------------------------------------------------------------
	debouncedresize: special jQuery event that happens once after a window resize

	latest version and complete README available on Github:
	https://github.com/louisremi/jquery-smartresize

	Copyright 2012 @louis_remi
	Licensed under the MIT license.

	Usage:
	$(window).on("debouncedresize", function( event ) {
		// Your event handler code goes here.
	});
-------------------------------------------------------------------*/

(function($) {

	var $event = $.event,
		$special,
		resizeTimeout;

	$special = $event.special.debouncedresize = {
		setup: function() {
			$( this ).on( "resize", $special.handler );
		},
		teardown: function() {
			$( this ).off( "resize", $special.handler );
		},
		handler: function( event, execAsap ) {
			var context = this,
				args = arguments,
				dispatch = function() {
					event.type = "debouncedresize";
					$event.dispatch.apply( context, args );
				};

			if ( resizeTimeout ) {
				clearTimeout( resizeTimeout );
			}

			if (execAsap)
				dispatch();
			else
				resizeTimeout = setTimeout( dispatch, $special.threshold );
		},
		threshold: 150
	};

})(jQuery);