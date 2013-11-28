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
// these are going to have to be the way that we dictate the variations in pages atm, with conditional variables that are ticked (isn't life wonderful?)
$is_dark = get_field('is_dark');
$is_edge = get_field('is_edge');
$is_latest = get_field('is_latest');

// check for individual event page
$this_post_type = get_post_type();
if(is_single() && $this_post_type == 'event'){$is_latest[0] = true;}

// Add extra body class for css triggers on specific pages:
$extra_body_classes = 'off-canvas hide-extras';
/*
if($is_dark[0] && !is_search()){$extra_body_classes .= ' body-academy';}
if($is_latest[0] && !is_search()){$extra_body_classes .= ' body-latest';}
if($is_edge[0] && !is_search()){$extra_body_classes .= ' body-edge';}
*/

switch( !is_search() && true ) {
	case $is_dark[0]: $extra_body_classes .= ' body-academy'; break;
	case $is_latest[0]: $extra_body_classes .= ' body-latest'; break;
	case $is_edge[0]: $extra_body_classes .= ' body-edge'; break;
}



$extra_main_classes = '';
if($is_dark[0] && !is_search()){$extra_main_classes .= ' academy-content';}
if($is_edge[0] && !is_search()){$extra_main_classes .= ' edge-content';}
if($is_latest[0] && !is_search()){$extra_main_classes .= ' latest-content';}

// Add different sub menu for each page type:
$sub_menu_name = '';
if($is_dark[0]){$sub_menu_name = 'Academy Sub Nav';}
if($is_edge[0]){$sub_menu_name = 'Edge Sub Nav';}
if($is_latest[0]){$sub_menu_name = 'Latest Sub Nav';}

//Detecting user IP address (If is NY)
$ip = $_SERVER['REMOTE_ADDR'];
echo '<div class="hide">'.$ip.'</div>';
$is_NY = false;
if(preg_match('/192\.168\.70\./' ,$ip) || preg_match('/192\.168\.71\./' ,$ip)/* || preg_match('/192\.168\.90\./' ,$ip)*/){$is_NY = true;};

// Load up logo image url:
$logo_image =  get_template_directory_uri().'/img/m-inside-logo.png'; // default logo
if($is_edge[0]){
	//$logo_image =  get_template_directory_uri().'/img/edge-logo.png';
	$logo_image =  get_template_directory_uri().'/img/m-inside-logo.png'; // default logo
}
?>

<body <?php body_class($extra_body_classes); ?>>
	<div class="container">
		<header class="row" role="banner">
			<div class="hide-for-small l-header-large">
				<div class="eight columns">
					<a href="http://mishcon-inside/"><img class="logo-md" src="<?php echo $logo_image; ?>"></a>
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
					if(!$is_NY){
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
					}
					else {
						wp_nav_menu( array(
							'menu' => 'Main Nav NY',
							'container' => false,
							'depth' => 1,
							'items_wrap' => '<ul class="mainNav">%3$s</ul>',
							'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
							/*'walker' => new reverie_walker( array(
								'in_top_bar' => false,
								'item_type' => 'li'
							) ),*/
						) );
					}
					?>
				</nav>
				<!-- End of Top-Bar -->
			</div>
		</header>
<!-- Start the main container -->
	<div class="<?php echo $extra_main_classes; ?> content-custom">
	<div class="row">
		<section role="main">
			<?php if($is_dark[0] || $is_latest[0] || $is_edge[0]){ ?>
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