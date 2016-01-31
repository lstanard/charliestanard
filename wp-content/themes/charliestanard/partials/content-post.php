<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-heading">

		<?php if ( has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-heading-img">
				<?php the_post_thumbnail(); ?>
			</a>
		<?php endif; ?>

		<h1><?php the_title(); ?></h1>

		<div class="post-heading-meta">
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author">Posted by: <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link('Comments', '1 Comment', '% Comments'); ?></span>
		</div>

	</header>

	<div class="post-body">
		<?php the_content(); ?>
	</div>

	<div class="post-tags">
		<?php the_tags('Tags: ', ', ', '<br>'); ?>
	</div>

	<div class="post-meta">
		<p>Posted in: <?php the_category(', '); ?></p>
		<p>Posted by: <?php the_author_posts_link(); ?></p>
	</div>

	<?php edit_post_link(); ?>

</article>

<?php comments_template(); ?>