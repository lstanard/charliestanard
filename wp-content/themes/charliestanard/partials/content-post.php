<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post__head">
		<?php if ( has_post_thumbnail()) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<h1><?php the_title(); ?></h1>
		<p class="date"><?php the_date('j F Y'); ?></p>
	</header>
	<?php the_content(); ?>
</article>
<div class="post__cats">
	<p>Filed under:</p>
	<div class="links">
		<p><?php the_category(' '); ?></p>
	</div>
</div>
<?php comments_template(); ?>