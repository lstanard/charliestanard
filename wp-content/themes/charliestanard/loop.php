<?php

// If post is single or page, get partial type of "content" to display the full
// post contents. For all other posts use partial type of "excerpt".
// If not the front page, use the previously determined partial type and get
// the post type, otherwise load the Home page content partial.

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