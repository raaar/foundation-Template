<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue-sass.php or enqueue-css.php
    - enqueueing scripts & styles for Sass OR CSS
    - please use either Sass OR CSS, having two enabled will ruin your weekend
*/
require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
//require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
/*
3. lib/foundation.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
//require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports.
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie'),
		'utility' => __('Utility Navigation', 'reverie')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

// Add in the teaser custom post type -
function mish_post_type_teaser() {
    register_post_type( 'teaser',
		array( 
			'label' => __('Teasers'), 
			'labels' => array(
				'edit_item' => 'Edit Teaser',
				'add_new_item' => 'Add New Teaser'
			),
			'public' => false, 
			'show_ui' => true,
			'menu_icon' => get_stylesheet_directory_uri() . '/img/teaser.png', /* the icon for the custom post type menu */
			'supports' => array(
				'custom-fields',
				'title',
				'editor',
				//'excerpt',
				'thumbnail'
			)
		) 
	);
	}

add_action('init', 'mish_post_type_teaser');

// Register new taxonomy type for Teasers:
function register_teaser_taxonomy() {
	$tax_labels = array(
		'name'				=> _x( 'Teaser Types', 'Teaser Types', 'text_domain' ),
		'singular_name'			=> _x( 'single taxonomy', 'Teaser Type', 'text_domain' ),
		'search_items'			=> __( 'Search Teaser Types', 'text_domain' ),
		'popular_items'			=> __( 'Popular Teaser Types', 'text_domain' ),
		'all_items'			=> __( 'All Teaser Types', 'text_domain' ),
		'parent_item'			=> __( 'Parent Teaser Type', 'text_domain' ),
		'parent_item_colon'		=> __( 'Parent Teaser Type', 'text_domain' ),
		'edit_item'			=> __( 'Edit Teaser Type', 'text_domain' ),
		'update_item'			=> __( 'Update Teaser Type', 'text_domain' ),
		'add_new_item'			=> __( 'Add New Teaser Type', 'text_domain' ),
		'new_item_name'			=> __( 'New Teaser Type Name', 'text_domain' ),
		'add_or_remove_items'	=> __( 'Add or remove Teaser Types', 'text_domain' ),
		'choose_from_most_used'	=> __( 'Choose from most used Teaser Types', 'text_domain' ),
		'menu_name'			=> __( 'Teaser Type', 'text_domain' ),
	);
	$tax_args = array(
		'labels'		=> $tax_labels,
		'public' 		=> false,
		'show_in_nav_menus'	=> false,
		'hierarchical'		=> true,
		'show_tagcloud'		=> false,
		'show_ui'		=> true,
		'query_var'		=> true,
		'rewrite'		=> true,
		'query_var'		=> true,
	);
	register_taxonomy( 'teaser_type', 'teaser', $tax_args ); 
}
add_action( 'init', 'register_teaser_taxonomy' );

// Add in the event custom post type -
function mish_post_type_event() {
    register_post_type( 'event',
		array( 
			'label' => __('Events'), 
			'labels' => array(
				'edit_item' => 'Edit Event',
				'add_new_item' => 'Add New Event'
			),
			'public' => true,
			'exclude_from_search' => false,
			'query_var' => true,
			'show_ui' => true,
			'menu_icon' => get_stylesheet_directory_uri() . '/img/event.png', /* the icon for the custom post type menu */
			'supports' => array(
				'custom-fields',
				'title',
				'editor',
				'excerpt',
				'thumbnail'
			),
			'taxonomies' => array( 'post_tag')
		) 
	);
	}

add_action('init', 'mish_post_type_event');

// Register new taxonomy type for Events:
function register_event_taxonomy() {
	$tax_labels = array(
		'name'				=> _x( 'Event Types', 'Event Types', 'text_domain' ),
		'singular_name'			=> _x( 'single taxonomy', 'Event Type', 'text_domain' ),
		'search_items'			=> __( 'Search Event Types', 'text_domain' ),
		'popular_items'			=> __( 'Popular Event Types', 'text_domain' ),
		'all_items'			=> __( 'All Event Types', 'text_domain' ),
		'parent_item'			=> __( 'Parent Event Type', 'text_domain' ),
		'parent_item_colon'		=> __( 'Parent Event Type', 'text_domain' ),
		'edit_item'			=> __( 'Edit Event Type', 'text_domain' ),
		'update_item'			=> __( 'Update Event Type', 'text_domain' ),
		'add_new_item'			=> __( 'Add New Event Type', 'text_domain' ),
		'new_item_name'			=> __( 'New Event Type Name', 'text_domain' ),
		'add_or_remove_items'	=> __( 'Add or remove Event Types', 'text_domain' ),
		'choose_from_most_used'	=> __( 'Choose from most used Event Types', 'text_domain' ),
		'menu_name'			=> __( 'Event Type', 'text_domain' ),
	);
	$tax_args = array(
		'labels'		=> $tax_labels,
		'public' 		=> false,
		'show_in_nav_menus'	=> false,
		'hierarchical'		=> true,
		'show_tagcloud'		=> false,
		'show_ui'		=> true,
		'query_var'		=> true,
		'rewrite'		=> true,
		'query_var'		=> true,
	);
	register_taxonomy( 'event_type', 'event', $tax_args ); 
}
add_action( 'init', 'register_event_taxonomy' );

// This function below exists purely to serve the slider building function the correct arguments based on 
function args_for_liquid_slider($post_type, $teaser_type){
	$argumentatives = '';
	if ($post_type == 'post'){
		$argumentatives = array(
			'post_type' => $post_type,
			'tag' => $teaser_type
		);
	}
	elseif ($post_type == 'teaser'){
		$argumentatives = array(
			'post_type' => $post_type,
			'tax_query' => array(
				array(
					'taxonomy' => 'teaser_type',
					'field' => 'slug',
					'terms' => $teaser_type
				)
			)
		);
	}
	elseif ($post_type == 'event'){
		$argumentatives = array(
			'post_type' => $post_type,
			'post_status' => array( 'publish', 'future')
		);
	}
	return $argumentatives;
}

// This function will output a liquid slider on the page, using the teaser post type
// $slider_id - Slider IDs that are commonly used in the slider setup javascript are 'slider-id' and 'slider-id-2'
// $teaser_type - This dictates the type of teaser from the custom 'teaser_type' taxonomy. An example would be 'features' or 'large_front_page'
function mish_liquid_slider($slider_id, $teaser_type, $small, $academy, $post_type = 'teaser'){

	$slider_args = args_for_liquid_slider($post_type, $teaser_type);
	
	$additional_classes = '';
	$arrow_class = 'first';
	$bottom_link_class = '';
	if ($small){$additional_classes .= ' sm-slide'; $arrow_class = 'second';}
	if ($academy){$additional_classes .= ' academy';}
	if ($academy && $small){ $additional_classes .= ' academy-sm-slide'; $bottom_link_class = ' color:white;';}
	   // Loop begins:
	   $slider_loop = new WP_Query($slider_args);
		if ( $slider_loop->have_posts() ) :
			echo '<section class="features clearfix"><div id="'.$slider_id.'-wrapper" class="liquid-slider-wrapper liquid-responsive hidden-slider"><div class="liquid-slider" id="'.$slider_id.'">';
			while ( $slider_loop->have_posts() ) : $slider_loop->the_post();
				$large = get_field('is_large');
				$image = 'default.png';
				$linky = get_field('link');
				if($post_type != 'teaser'){$linky = get_permalink();}
				if (has_post_thumbnail( $post->ID )){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0];}
				echo '<div class="panel latest '.$large[0].$additional_classes.'"><header><div class="row"><div class="four columns mobile-one"><i class="icon-fixed-width icon-play-sign"></i></div><div class="eight columns mobile-three text-right">';
				echo '<time>'.the_date('d M Y').'</time>';
				echo '</div></div></header>';
				echo '<h2><a href="'.$linky.'">'.get_the_title().'</a></h2>';
				echo '<a href="'.$linky.'"><figure>';
				if ($image != 'default.png'){
					echo'<img src="'.$image.'" alt="'.get_the_title().'" />';
				}
				echo '</figure>';
					echo '<div class="liquid-caption">';
				if($post_type == 'teaser'){the_content();}
				else {the_excerpt();}
					edit_post_link();
					echo /* '<hr><p class="text-right more-info" style="height:1.5em; min-height:1.5em;'.$bottom_link_class.'">READ MORE</p> ' . */ '</div></a>'; //close liquid caption
				echo '</div>';
			endwhile;
			wp_reset_query();
			echo '</div><div class="arrows"><a class="'.$arrow_class.' arrow-left"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left angle-left-overlay"></i></a><a class="'.$arrow_class.' arrow-right"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right angle-right-overlay"></i></a></div></div><div class="slider-tab-panel '.$arrow_class.'"></div></section>';
		endif;
	   // Loop Ends
}

function mish_flex_slider($teaser_type, $endline = true){
	$slider_args = array(
		'post_type' => 'teaser',
		'tax_query' => array(
			array(
				'taxonomy' => 'teaser_type',
				'field' => 'slug',
				'terms' => $teaser_type
			)
		)
	);
	$slider_loop = new WP_Query($slider_args);
		if ( $slider_loop->have_posts() ) :
			echo '<div class="flexslider large-flexslider large-slider"><ul class="slides">';
			while ( $slider_loop->have_posts() ) : $slider_loop->the_post();
				if (has_post_thumbnail( $post->ID )){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0];}
				
				?>
				  <li>  
					  <a href="<?php the_field('link'); ?>">
						  <div class="row">
							 <div class="six columns"> 
								<div class="l-text">
									<?php the_content(); ?>
									<?php edit_post_link(); ?>
								</div>	
							 </div>					 
						  </div>
						  <img class="flex-bk" src="<?php echo $image; ?>" />
					  </a>
				  </li>
				<?php
			endwhile;
			wp_reset_query();
			echo '</ul></div>';
			if($endline){echo '<hr class="flexslider-hr"><!-- Flex end -->';}
		endif;
}
?>