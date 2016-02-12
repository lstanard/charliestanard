<?php

/*------------------------------------*\
	Utility Functions
\*------------------------------------*/

function cs_get_blog_feed() {

	$args = array(
		'posts_per_page'	=> 5,
		'post_type' 		=> 'post'
	);

	$posts_array = get_posts($args);

	?>

		<div class="blog-list">
		<?php foreach ($posts_array as $post) :
				$post_title = $post->post_title;
				$post_date = get_the_date('j F Y', $post->ID);
				$permalink = get_permalink($post);
			 ?>
			<div class="post-excerpt">
				<h3><a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></h3>
				<p class="date"><?php echo $post_date; ?></p>
			</div>
		<?php endforeach ?>
		</div>

	<?php

}

function cs_get_project_url() {
	if (function_exists('get_field')) {
		global $post;
		$project_url = get_field('project_url', $post->ID);
		echo $project_url;
	}
}

/*------------------------------------*\
	Actions & Filters
\*------------------------------------*/

// Changing excerpt length
function new_excerpt_length($length) {
	return 100;
}

add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
	global $post;
	return '...<a class="moretag" href="'. get_permalink($post->ID) . '">read the full article</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

// Customize the Dashboard menu
function customize_dashboard_menu() {
	// Examples:
	// Removes the "Comments" item from the admin menu
	// remove_menu_page( 'edit-comments.php' );
	// Swaps the position of the "Pages" and "Posts" admin menu items
	// swap_admin_menu_sections('Pages','Posts');
}
add_action( 'admin_menu', 'customize_dashboard_menu' );

// Remove misc metaboxes
// Codex: https://codex.wordpress.org/Function_Reference/remove_meta_box
// TODO: Review which meta boxes should and should not appear on pages, posts and CPTs
function remove_metaboxes() {
	// Examples:
	// Removes the featured image meta box from all pages
	remove_meta_box( 'postimagediv', 'page', 'side' );
	// Removes the comments meta box from all pages
	remove_meta_box( 'commentsdiv', 'page', 'normal' );
	// Removes the comments meta box from all posts
	// remove_meta_box( 'commentsdiv', 'post', 'normal' );
}

add_action('do_meta_boxes', 'remove_metaboxes');

?>