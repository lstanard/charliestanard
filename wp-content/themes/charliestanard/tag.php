<?php get_header(); ?>

	<h1>Tagged <?php echo single_tag_title('', false); ?></h1>
	<?php get_template_part('loop'); ?>

<?php get_footer(); ?>