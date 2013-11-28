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
					?>
					        <div class="intro-image">
								<a href="<?php the_field('link'); ?>"><img alt="Academy" src="<?php echo $image; ?>" /></a>
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

		<!--
        <div class="intro-sidebar">
			<?php
			$news_args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'tag' => 'news'
			);
			$news_query = new WP_Query( $news_args );
			if ( $news_query->have_posts() ) {
				echo '<div class="panel-sm dark"><ul>';
				//echo '<li><h2>Sidebar panel</h2>';
				echo '</li>';
				while ( $news_query->have_posts() ) {
					$news_query->the_post();
					$linkage = get_permalink();
					if (get_field('link') != ''){$linkage = get_field('link');}
					echo '<li><a href="'.$linkage.'"><h3>' . get_the_title() . '</h3></a><p>' . get_the_excerpt() . '</p><hr></li>';
				}
				echo '</ul></div>';
			} else {
				echo '<div class="panel-sm dark"><ul></ul></div>';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
        </div>
		-->

        <div class="image-sidebar">
			<?php
			$news_args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'tag' => 'news'
			);
			$news_query = new WP_Query( $news_args );
			if ( $news_query->have_posts() ) {
				while ( $news_query->have_posts() ) {
					$news_query->the_post();
					$linkage = get_permalink();
					if (get_field('link') != ''){$linkage = get_field('link');}

 					if (has_post_thumbnail( $post->ID )){	
						$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
					}else{
						$image_url[0] = "/wp-content/themes/foundation-inside/img/gradient.jpg";
					}

		
					echo '<a href="' . $linkage . '"><div class="image-item" style="background-image: url(' . $image_url[0] . ') ">';
					echo "<h3>" . get_the_title() . "</h3>";
					echo "</div></a>";
				}
				echo '</div>';
			} else {
				echo '<div class="panel-sm dark"><ul></ul></div>';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
        </div>

    </div>
</div>
<div class="row">
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