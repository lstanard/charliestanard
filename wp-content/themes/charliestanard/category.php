<?php get_header(); ?>

	<h1>Category: <?php single_cat_title(); ?></h1>
	<?php get_template_part('loop'); ?>

<?php get_footer(); ?>