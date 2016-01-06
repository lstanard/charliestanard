<?php get_header(); ?>

	<div class="interior-wrapper">
		<div class="container">
			<section class="main">
				<h1>Tag: <?php echo single_tag_title('', false); ?></h1>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</section>
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>