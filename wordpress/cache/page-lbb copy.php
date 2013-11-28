<?php 
/*
Template Name: LBB List Page
*/
get_header(); ?>
<div class="row">




<!-- Row for main content area -->
	<div class="twelve columns l-article">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
			<header>
				<h1><?php the_title(); ?></h1>
				<!--<ul class="postmetadata">
                	<li clsss="date"><i class="fa fa-clock-o"></i><time><?php echo the_date(); ?> </time></li>
            	</ul>-->
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>

		</article>
	<?php endwhile; // End the loop ?>
	<div class="large-list-two l-article">
	<?php
			$course_args = array(
				'post_type' => 'the-edge',
				'post_status' => array( 'publish'),
				'posts_per_page' => 15,
				'paged' => get_query_var( 'paged' ),
				'tax_query' => array(
					array(
						'taxonomy' => 'edge_type',
						'field' => 'slug',
						'terms' => 'little-black-book'
					)
				)
			);
			$wp_query = new WP_Query( $course_args );
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					$thumb_image = '/wp-content/uploads/2013/11/edge-slide-placeholder1.png';
					if (has_post_thumbnail( $post->ID )){ $thumb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $thumb_image = $thumb_image[0];}
					?>

					<li>
						<div class="list-content">
							<div class="thumb-absolute">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo $thumb_image; ?>">
								</a>
							</div>
							<div class="list-content-text">
								<a href="<?php the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
								<?php the_excerpt(); ?>
								<i class="fa fa-arrow-circle-right"></i>
							</div>
						</div>
					</li>
					<hr>

					<?php
			}
				if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
					</nav>
				<?php }
			}
			else {
				echo '<h3>There are currently no new thoughts available.</h3>';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</div>
	</div>

	<div class="one columns"></div>

	<?php get_template_part(); ?> 






</div><!-- .row -->
<?php get_footer(); ?>