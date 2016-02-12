<?php

/*------------------------------------*\
	Work
\*------------------------------------*/

function display_work_posts() {

	$args = array(
		'posts_per_page' => -1,
		'post_type'	=> 'project',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);

	$projects_array = get_posts($args);

	?>

	<div class="work-grid">
		<?php foreach ($projects_array as $project) :
				$id = $project->ID;
		?>
		<div class="tile">
			<?php /* ?><h3><?php echo $project->post_title; ?></h3><?php */ ?>
			<a href="<?php echo get_the_permalink($id); ?>">
				<?php echo get_the_post_thumbnail($id, 'project-thumb'); ?>
			</a>
		</div>
		<?php endforeach; ?>
	</div>

	<?php

}

?>