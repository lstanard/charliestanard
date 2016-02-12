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
			<div class="post-excerpt">
				<h3><a href="#">Building my first WordPress plugin</a></h3>
				<p class="date">10 February 2016</p>
			</div>
			<div class="post-excerpt">
				<h3><a href="#">Organizing front-end assets in WordPress</a></h3>
				<p class="date">10 February 2016</p>
			</div>
			<div class="post-excerpt">
				<h3><a href="#">WordPress Grunt Workflow</a></h3>
				<p class="date">10 February 2016</p>
			</div>
		</div>
	</div>

<?php get_footer(); ?>