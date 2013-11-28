<?php
/*
Template Name: Home Page
*/
get_header(); ?>
	
<!-- Top News Headline Row -->
<div class="row">
    <div class="twelve columns intro">
			<?php 
			while (have_posts()) : the_post();
				$front_image = 'default.png';
				if (has_post_thumbnail( $post->ID )){ 
					$front_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
					$front_image = $front_image[0];
				} else {
					$front_image = "";
				}
			endwhile; // End the loop ?>

        <div class="intro-image">
        	<img alt="Academy" src="<?php echo $front_image ?>" />
        </div>
        <div class="intro-sidebar">
			<?php
			$news_args = array(
				'post_type' => 'post',
				'posts_per_page' => 3
			);
			$news_query = new WP_Query( $news_args );
			if ( $news_query->have_posts() ) {
				echo '<div class="panel-sm dark"><ul><li><h2>Sidebar panel</h2></li>';
				while ( $news_query->have_posts() ) {
					$news_query->the_post();
					echo '<li><a href="'.get_permalink().'"><h3>' . get_the_title() . '</h3></a><p>' . get_the_excerpt() . '</p><hr></li>';
				}
				echo '</ul></div>';
			} else {
				echo '<div class="panel-sm dark"><ul></ul></div>';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
        </div>
    </div>
    <div class="twelve column">
        <hr>
    </div>
</div>


	
<!-- Featire Slider Row -->
	<div class="row">
		<div class="twelve columns">
			<h1 class="home-title">Features</h1>
			<?php mish_liquid_slider('slider-id', 'feature', false, false); ?>
		</div>
	</div>
	
<!-- Little Category Row -->
	<div class="row">
		<div class="twelve columns">
			<h1 class="home-title">Channels</h1>
			<?php mish_liquid_slider('slider-id-2', 'channel', true, false); ?>
		</div>
	</div>
		
<?php get_footer(); ?>