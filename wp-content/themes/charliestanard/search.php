<?php

	get_header();

	// WordPress Advanced Search configuration
	$args = array();

	$args['form'] = array('action' => '/');

	$args['wp_query'] = array('post_type' => array('post', 'page'),
	                                'posts_per_page' => get_option('posts_per_page'),
	                                'order' => 'DESC',
	                                'orderby' => 'date');

	$args['fields'][] = array('type' => 'search',
	                                'value' => '');

	$args['fields'][] = array('type' => 'submit',
	                                'value' => 'Search &gt;');

	$args['fields'][] = array('type' => 'post_type',
									'label' => 'Search in: ',
	                                'values' => array('page' => 'Website', 'post' => 'Blog'),
	                                'default_all' => true,
	                                'format' => 'checkbox');

	$my_search_object = new WP_Advanced_Search($args);

	$search_query = get_query_var('s');

	if (!empty($search_query)) {
		$temp_query = $wp_query;
		$wp_query = $my_search_object->query();

?>

	<h1><?php echo sprintf('%s Search Results for: ', $wp_query->found_posts ); echo get_search_query(); ?></h1>

	<?php
		$my_search_object->the_form();

		if ( have_posts() ):
			while ( have_posts() ): the_post();

			?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><strong>Author:</strong> <?php the_author();?> &nbsp;&nbsp; <strong>Date:</strong> <?php the_date();?></p>
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink(); ?>">Read more...</a></p>
			<?php
			endwhile;

			$pagination = html5wp_pagination(false, false);
			$pagination = str_replace('/page/', '&page=', $pagination);
			$pagination = str_replace('/">', '">', $pagination);
	?>

	<div class="pagination">
		<?php echo $pagination; ?>
	</div>

	<?php

		else :
			echo 'Sorry, no pages matched your criteria.';
		endif;

		$wp_query = $temp_query;
		wp_reset_query();

		} else {
	?>

	<h1>Search</h1>

	<?php
		$my_search_object->the_form();

		}
	?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>