<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="project-preview">
		<?php if ( has_post_thumbnail()) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<figcaption>
			<a href="<?php cs_get_project_url(); ?>" class="btn-outline--white" target="_blank">Visit site</a>
		</figcaption>
	</figure>
	<div class="project-details">
		<p class="super">Project&nbsp;/</p>
		<h1><?php the_title(); ?></h1>
		<div class="project-body">
			<?php the_content(); ?>
		</div>
		<div class="project-tags">
			<?php the_tags('', '', '<br>'); ?>
		</div>
	</div>
</article>
<nav class="project-nav">
	<p>See also:</p>
	<div class="project-nav-links">
		<?php previous_post_link('%link'); ?> <?php next_post_link('%link'); ?>
	</div>
</nav>