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
<html>
	<head>
		<title>Magdalene MCR Helios</title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/main.css" rel="stylesheet"  media="all" type="text/css" />

			<?php wp_head(); ?>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	</head>

	<body class="homepage">
			<?php $header_image = get_header_image(); ?>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Nav -->
						<nav id="nav">
							<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary' ) ); ?>
							<!--ul>
								<li><a href="index.html">Home</a></li>
								<li>
									<a href="#">Dropdown</a>
									<ul>
										<li><a href="#">Lorem ipsum dolor</a></li>
										<li><a href="#">Magna phasellus</a></li>
										<li><a href="#">Etiam dolore nisl</a></li>
										<li>
											<a href="#">And a submenu &hellip;</a>
											<ul>
												<li><a href="#">Lorem ipsum dolor</a></li>
												<li><a href="#">Phasellus consequat</a></li>
												<li><a href="#">Magna phasellus</a></li>
												<li><a href="#">Etiam dolore nisl</a></li>
											</ul>
										</li>
										<li><a href="#">Veroeros feugiat</a></li>
									</ul>
								</li>
								<li><a href="left-sidebar.html">Left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="no-sidebar.html">No Sidebar</a></li>
							</ul-->
						</nav>
