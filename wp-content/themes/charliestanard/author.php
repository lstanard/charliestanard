<?php get_header(); ?>

	<h1>Author archives for <?php echo get_the_author(); ?></h1>
	<?php get_template_part('loop'); ?>

<?php get_footer(); ?>