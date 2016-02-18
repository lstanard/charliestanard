<?php

/*------------------------------------*\
	Shortcodes
\*------------------------------------*/

// Blog feed

function cs_blog_feed_shortcode() {

	$args = array(
		'posts_per_page'	=> 5,
		'post_type' 		=> 'post'
	);

	$posts_array = get_posts($args);

	// Output
	$output  = '<div class="blog-list">';

	foreach ($posts_array as $post) {
		$post_title = $post->post_title;
		$post_date = get_the_date('j F Y', $post->ID);
		$permalink = get_permalink($post);

		$output .= '<div class="post__excerpt">';
		$output .= '<h3><a href="' . $permalink . '" title="' . $post_title . '">' . $post_title . '</a></h3>';
		$output .= '<p class="date">' . $post_date . '</p>';
		$output .= '</div>';
	}

	$output .= '</div>';

	return $output;

}

add_shortcode('blog_feed', 'cs_blog_feed_shortcode');

// Project preview grid

function cs_project_grid_shortcode() {

	$args = array(
		'posts_per_page' => -1,
		'post_type'	=> 'project',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);

	$projects_array = get_posts($args);

	// Output
	$output  = '<div class="work-grid">';

	foreach ($projects_array as $project) {
		$id = $project->ID;
		$output .= '<div class="work-grid__tile">';
		$output .= '<figure class="tile__preview">';
		if (has_post_thumbnail($id)) {
			$output .= get_the_post_thumbnail($id, 'project-thumb');
		}
		$output .= '<figcaption>';
		$output .= '<a href="' . get_the_permalink($id) . '"><span>'. $project->post_title . '</span></a>';
		$output .= '</figcaption>';
		$output .= '</div>';
	}

	$output .= '</div>';

	return $output;

}

add_shortcode('project_grid', 'cs_project_grid_shortcode');

?>