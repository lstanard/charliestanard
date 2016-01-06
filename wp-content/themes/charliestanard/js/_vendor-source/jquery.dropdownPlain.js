(function($) {

	$(function(){

		$(".nav-dropdown ul li").hover(function(){

			$(this).addClass("hover");
			$('ul:first',this).css('visibility', 'visible');

		}, function(){

			$(this).removeClass("hover");
			$('ul:first',this).css('visibility', 'hidden');

		});

		$(".nav-dropdown ul li ul li:has(ul)").find("a:first").append(" &raquo; ");

	});

})(jQuery);