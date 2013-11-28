<?php
/*
Template Name: Home Page
*/
get_header(); ?>


	
<!-- Top News Headline Row -->
<div class="row">
    <div class="twelve columns intro">
			<?php 
			$banner_args = array(
				'post_type' => 'teaser',
				'tax_query' => array(
					array(
						'taxonomy' => 'teaser_type',
						'field' => 'slug',
						'terms' => 'main-page',
						'posts_per_page'=> 1
					)
				)
			);
			$banner_loop = new WP_Query($banner_args);
			if ( $banner_loop->have_posts() ) :
				while ( $banner_loop->have_posts() ) : $banner_loop->the_post();
					if (has_post_thumbnail( $post->ID )){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0];}
					$has_video = get_field('has_video');
					if ($has_video){
						//echo $has_video;
						?>
								<div class="intro-image">
									<?php the_content(); ?>
								</div>
						<?php
					}
					else {
						//echo $has_video;
						?>
								<div class="intro-image academy-large-slider">
									<a href="<?php the_field('link'); ?>">
										<div class="row">
											<div class="six columns">
												<div class="l-text">
													<?php the_content(); ?>
												</div>
											</div>
										</div>
										<img class="flex-bk" draggable="false" src="<?php echo $image; ?>" />
									</a>
								</div>
						<?php
					
					
				endwhile;
			wp_reset_query();
		endif;
			
			/*while (have_posts()) : the_post();
				$front_image = 'default.png';
				if (has_post_thumbnail( $post->ID )){ 
					$front_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
					$front_image = $front_image[0];
				} else {
					$front_image = "";
				}
			endwhile; // End the loop */?>
=

    </div>
</div>
<div class="row">
    <div class="twelve column">
        <hr class="flexslider-hr">
    </div>
</div>


		
<?php get_footer(); ?>