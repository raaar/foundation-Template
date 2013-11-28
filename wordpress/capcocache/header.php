<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

<?php wp_head(); ?>

</head>

<body <?php body_class("off-canvas hide-extras"); ?> >
	<div class="container">
		<header id="header" class="row" role="banner">



					<div class="show-for-small app-navbar">
						    <div class="navbar-search">
						                  <div class="navbar-search-bar"><input type="text" placeholder="Search..."></div>
						                  <div class="navbar-search-search"><i class="fa fa-search"></i></div>
						                  <div class="navbar-search-close"><i class="fa fa-times"></i></div>
						          </div>
						          <a href="#sidebar" id="sidebarButton" class="btn-navbar-menu">
						                <div class="line"></div>
						                <div class="line"></div>
						                <div class="line"></div>
						          </a>

						          <div class="navbar-logo">
						              <div class="navbar-logo-va">
						              	<!--
						                <img onerror="this.onerror=null; this.src='images/MdR-Logotype_Orange.png'" src="images/MdR-Logotype_Orange.svg">
						            	-->
						              </div>
						          </div>

						    <div id="sidebarSearch" class="btn-navbar-search"><i class="fa fa-search"></i></div>
					</div>



			<div class="hide-for-small l-header-large">
				<div class="eight columns">
					<a href="http://mishcon-inside/"><img class="logo-md" src="<?php bloginfo('template_url') ?>/img/logo-capco.png"></a>
				</div>
				<div class="four columns l-search-box">

					<div class="search-form">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>


			<div class="twelve columns phone-two hide-for-small">
				<!-- Starting the Top-Bar -->
				<nav id="menu" class="top-nav" role="navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'container' => false,
							'depth' => 1,
							'items_wrap' => '<ul class="mainNav">%3$s</ul>',
							'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
							/*'walker' => new reverie_walker( array(
								'in_top_bar' => false,
								'item_type' => 'li'
							) ),*/
						) );
					?>
				</nav>
				<!-- End of Top-Bar -->
			</div>
		</header>
<!-- Start the main container -->
	<div class="row">
		<section role="main">
			<?php if(1 != 1){ ?>
			<div class="row">
				<div class="twelve columns phone-two hide-for-small">
					<nav id="menu" class="sub-nav" role="navigation">
					<?php
						wp_nav_menu( array(
							'menu' => $sub_menu_name,
							'container' => false,
							'depth' => 1,
							'items_wrap' => '<ul class="mainNav">%3$s</ul>',
							'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
							/*'walker' => new reverie_walker( array(
								'in_top_bar' => false,
								'item_type' => 'li'
							) ),*/
						) );
					?>
					</nav>
				</div>
			</div>
			<?php } ?>