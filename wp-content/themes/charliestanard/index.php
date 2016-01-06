<?php get_header(); ?>

	<div class="interior-wrapper">
		<div class="container">
			<section class="main">
				<h1>Recent Posts</h1>
				<ul>
					<?php get_template_part('loop'); ?>
				</ul>
				<?php get_template_part('pagination'); ?>
			</section>
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>