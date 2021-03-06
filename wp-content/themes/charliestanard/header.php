<!DOCTYPE html>
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class=""> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,300" rel="stylesheet" type="text/css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header">
		<div class="container">
			<nav class="nav">
				<ul>
					<?php wp_nav_menu( array( 'theme_location' => 'Primary Navigation', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
			<p class="header__hello"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Hi, I&rsquo;m Charlie.</a></p>
			<p>Interactive Designer &amp; Developer</p>
			<hr />
		</div>
	</header>
	<main>
		<div class="inner-wrap">
			<div class="main-wrap">
