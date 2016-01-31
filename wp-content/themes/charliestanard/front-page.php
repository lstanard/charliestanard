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
			<h2>Projects</h2>
			<?php display_work_posts(); ?>
			<hr>
		</div>
	</div>

<?php get_footer(); ?>