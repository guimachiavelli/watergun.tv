<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
	
		<title>
			<?php
				global $page, $paged;
				wp_title( '–', true, 'right' );
				bloginfo( 'name' );
			?>
		</title>

		<meta name="description" content="<?php bloginfo( 'description', 'display' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<meta name="viewport" content="width=960">
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

		<script src="<?php echo template_url?>/js/libs/modernizr.js"></script>

		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		
		<header id="intro" role="banner">
			<hgroup>
				<h1 id="logo"><a href="<?php echo bloginfo('url'); ?>"><img src="<?php echo template_url?>/imgs/logo.png" alt="Watergun"></a></h1>
				<h2 id="lettering"><a href="<?php echo bloginfo('url'); ?>"><img src="<?php echo template_url?>/imgs/lettering.png" alt="Watergun Lettering"></a></h2>
			</hgroup>
		</header>

		<nav id="primary-menu">
			<h1 class="outline">Menu</h1>
			<ul class="menu">
				<li>
					<a class="work-toggle" href="#">Work</a>
					<ul class="second-level">
						<li><a href="<?php echo watergun_url; ?>/project">All</a></li>
						<?php wp_list_categories( array('taxonomy' => 'project-type', 'exclude' => 7, 'title_li' => '') ); ?>
					</ul>
				</li>
				<li><a href="<?php echo watergun_url; ?>/about">About</a></li>
				<li><a href="<?php echo watergun_url; ?>/blog">Blog</a></li>
				<li><a href="<?php echo watergun_url; ?>/contact">Contact</a></li>
			</ul>
		</nav>


