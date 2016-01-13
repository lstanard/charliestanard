<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class=""> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet" type="text/css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header class="header" role="banner">
			<div class="container">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo"><img src="<?php echo get_theme_mod( 'logo_upload' ); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
				<nav class="nav nav-dropdown" role="navigation" id="header-menu">
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'Primary Navigation', 'items_wrap' => '%3$s' ) ); ?>
					</ul>
				</nav>
			</div>
		</header>
		<main role="main">
