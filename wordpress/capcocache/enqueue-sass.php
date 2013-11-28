<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
function reverie_sass_style()
{
	// Register the main style
	wp_register_style( 'reverie-stylesheet', get_template_directory_uri() . '/css/app.css', array(), '', 'all' );
	wp_enqueue_style( 'reverie-stylesheet' );

	// Register Capco
	wp_register_style( 'capco-stylesheet', get_template_directory_uri() . '/css/overrides-capco.css', array(), '', 'all' );
	wp_enqueue_style( 'capco-stylesheet' );
}
add_action( 'wp_enqueue_scripts', 'reverie_sass_style' );
?>