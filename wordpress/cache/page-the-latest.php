<?php
/*
Template Name: The Latest Page
*/
get_header(); ?>
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	
<div class="row">
	<?php $front_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $front_image = $front_image[0]; ?>
	
	<div class="four columns l-article"><img src="<?php echo $front_image; ?>"></div>
	<div class="two columns l-article"></div>
	<div class="six columns l-20"><?php the_content(); ?></div>
</div>
	
<!-- Top News Headline Row -->
	<div class="row">
		<div class="twelve columns">
			<?php mish_flex_slider('featured-course'); ?>
		</div>
	</div>
	
<!-- News Slider Row -->
	<div class="row">
		<div class="twelve columns l-slider">
			<h1 class="home-title">News</h1>
			<?php mish_liquid_slider('slider-id', 'news', false, false, 'post'); ?>
		</div>
	</div>
	
<!-- Events Slider Row -->
	<div class="row">
		<div class="twelve columns l-slider">
			<h1 class="home-title">Events</h1>
			<?php mish_liquid_slider('slider-id-2', 'event', false, false, 'event'); ?>
		</div>
	</div>
		<?php endwhile; // End the loop ?>
<?php get_footer(); ?>