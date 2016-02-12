<?php
/*
Template Name: Home page
*/
?>
<?php get_header(); ?>

	<div class="inner-wrap">
		<div class="main-wrap">
			<?php get_template_part('loop'); ?>
			<hr>
			<h2 id="projects">Projects</h2>
			<!-- TODO: Turn this into a WP shortcode -->
			<?php display_work_posts(); ?>
			<hr>
			<h2>Blog</h2>
			<!-- TODO: Turn this into a WP shortcode -->
			<?php cs_get_blog_feed(); ?>
		</div>
	</div>

<?php get_footer(); ?>