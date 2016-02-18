<?php get_header(); ?>
	<h1>Blog</h1>
	<?php foreach (cs_get_posts_by_year() as $year => $posts) : ?>
		<div class="post__group">
			<h2><?php echo $year; ?></h2>
			<?php foreach ($posts as $post) : ?>
				<?php debug_log($post); ?>
			<div class="post__excerpt">
				<h3><a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a></h3>
				<p class="date"><?php echo get_the_date('j F Y', $post->ID); ?></p>
			</div>
			<?php endforeach ?>
		</div>
	<?php endforeach; ?>
<?php get_footer(); ?>