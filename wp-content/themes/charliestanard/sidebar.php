<aside class="sidebar" role="complementary">
	<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
		<input type="search" name="s" placeholder="Search">
		<button type="submit" role="button">Search</button>
	</form>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>
</aside>