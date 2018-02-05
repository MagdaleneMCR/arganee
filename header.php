<?php
/**
 * @package wp-magd-helios
 */
?>
<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
	<head>
		<!--title>Magdalene MCR Helios</title-->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/main.css" rel="stylesheet"  media="all" type="text/css" />

			<?php wp_head(); ?>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	</head>

	<body <?php body_class(); ?>> <!--?php body_class(); ?> -->
			<!--?php $header_image = get_header_image(); ?-->
			<!--?php echo esc_url( get_header_image() ); ?-->
		<div id="page-wrapper">

			<!-- Header -->
				<!--div id="header" background-image="<?php echo( get_header_image() ); ?>" background-attachtment="fixed" -->
					<!--div id="header" style="background-image:<?php echo get_template_directory_uri(); ?>/images/header.jpg"
					--><div id="header" style="background-image:  <?php header_image(); ?>">

					<!-- Nav -->
						<nav id="nav">
							<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary' ) ); ?>
						</nav>
