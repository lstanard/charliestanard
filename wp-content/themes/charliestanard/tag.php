<?php get_header(); ?>

	<div class="inner-wrap">
		<div class="main-wrap">
			<h1>Tagged <?php echo single_tag_title('', false); ?></h1>
			<?php get_template_part('loop'); ?>
		</div>
	</div>

<?php get_footer(); ?>