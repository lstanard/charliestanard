<?php

$partial_type = (is_single() || is_page()) ? 'content' : 'excerpt';
$page_partial = !is_front_page() ? 'partials/' . $partial_type . '-' . get_post_type() : 'partials/content-home';

	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part($page_partial);
		}
	}
	else {
		get_template_part( 'partials/content', 'none' );
	}

?>