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
<?php 
$is_dark = get_field('is_dark');
$extra_body_classes = 'off-canvas hide-extras';
if($is_dark[0]){$extra_body_classes .= ' body-academy';}
?>

<body <?php body_class($extra_body_classes); ?>>
	<div class="container">
		<header class="row" role="banner">
			<div class="hide-for-small l-header-large">
				<div class="eight columns">
					<img class="logo-md" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/img/MdR-Logotype_Orange.png'" src="<?php echo get_template_directory_uri(); ?>/img/MdR-Logotype_Orange.png">
				</div>
				<div class="four columns l-search-box">
					<div class="search-form">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="twelve columns phone-two hide-for-small">
				<!-- Starting the Top-Bar -->
				<nav id="menu" class="l-top-nav" role="navigation">
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
	<div class="<?php if($is_dark[0]){echo'academy-content';}?>">
	<div class="row">
		<section role="main">
			<?php if($is_dark[0]){ ?>
			<div class="row content-academy">
				<div class="twelve columns phone-two hide-for-small">
					<nav id="menu" class="academy-top-nav" role="navigation">
					<?php
						wp_nav_menu( array(
							'menu' => 'Main Sub Nav',
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