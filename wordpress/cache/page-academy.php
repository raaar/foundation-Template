<?php
/*
Template Name: Academy Page
*/
get_header(); ?>

<div class="row">
	<div class="five columns"></div>
	<div cass="two columns"></div>
	<div class="five columns"><?php the_content(); ?></div>
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
			<?php mish_liquid_slider('slider-id-2', 'course', true, false); ?>
		</div>
	</div>
		
<?php get_footer(); ?>