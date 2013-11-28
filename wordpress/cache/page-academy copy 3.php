<?php
/*
Template Name: Academy Page
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
			<?php mish_flex_slider('academy'); ?>
		</div>
	</div>
	
<!-- Featire Slider Row -->
	<div class="row">
		<div class="twelve columns">
			<h1 class="home-title">Features</h1>
			<?php mish_liquid_slider('slider-id', 'academy-feature', false, false); ?>
		</div>
	</div>
	
<!-- Little Category Row -->
	<div class="row">
		<div class="twelve columns">
			<h1 class="home-title">Courses</h1>
			<?php mish_liquid_slider('slider-id-2', 'course', true, true); ?>
		</div>
	</div>
		<?php endwhile; // End the loop ?>
<?php get_footer(); ?>