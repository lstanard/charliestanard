<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="project__preview">
		<?php if (has_post_thumbnail()) {
			the_post_thumbnail();
		} ?>
		<figcaption>
			<a href="<?php cs_get_project_url(); ?>" target="_blank">Visit site</a>
		</figcaption>
	</figure>
	<div class="project__details">
		<p class="super">Project&nbsp;/</p>
		<h1><?php the_title(); ?></h1>
		<div class="project__body">
			<?php the_content(); ?>
		</div>
		<div class="project__tags">
			<?php
				$posttags = get_the_tags();
				if ($posttags) {
					foreach($posttags as $tag) {
						echo '<span>' . $tag->name . '</span>';
					}
				}
			?>
		</div>
	</div>
</article>
<nav class="post__nav">
	<div class="container">
		<p>See also:</p>
		<div class="links">
			<p><?php previous_post_link('%link'); ?> <?php next_post_link('%link'); ?></p>
		</div>
	</div>
</nav>