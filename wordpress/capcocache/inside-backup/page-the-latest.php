<?php
/*
Template Name: The Latest Page
*/
get_header(); ?>
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	
<div class="row">
    <div class="twelve columns intro">
		<div class="intro-image academy-large-slider">
			<?php mish_flex_slider('featured-course', false); ?>
		</div>
		<!-- Twitter widget goes in this next bit -->
		<div class="image-sidebar">
			<a class="twitter-timeline" href="https://twitter.com/Mishcon_de_Reya" data-widget-id="324884238434443264" width="250" height="400" data-chrome="nofooter noscrollbar" data-theme="dark" data-border-color="#cbcbcb">Tweets by @Mishcon_de_Reya</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>
	
<!-- Top News Headline Row -->
	<div class="row">
		<div class="twelve columns">
			<?php //mish_flex_slider('featured-course'); ?>
		</div>
	</div>
	
<!-- News Slider Row -->
	<!--<div class="row">
		<div class="twelve columns l-slider">
			<h1 class="home-title">News</h1>
			<?php mish_liquid_slider('slider-id', 'news', false, false, 'post'); ?>
		</div>
	</div>-->
	
<!-- Events Slider Row -->
	<!--<div class="row">
		<div class="twelve columns l-slider">
			<h1 class="home-title">Events</h1>
			<?php mish_liquid_slider('slider-id', 'event', false, false, 'event'); ?>
		</div>
	</div>-->
		<?php endwhile; // End the loop ?>


<div class="row tight-grid ">
	<div class="twelve columns l-article">
		<h1 class="home-title">Latest</h1>
	</div>
	
	<!-- begin news post list -->
	<?php
	$news_args = array(
			'post_type' => array('post', 'event'),
			'post_status' => array( 'publish'),
			'posts_per_page' => 15,
			'paged' => get_query_var( 'paged' ),
			'tag' => 'news'
		);
		
	$news_query = new WP_Query( $news_args );
	
	$news_post_count = 0;
	
	if ( $news_query->have_posts() ) {
		while ( $news_query->have_posts() ) {
			$news_query->the_post();
			$news_post_count++;
			$thumb_image = 'default.png';
			if (has_post_thumbnail( $post->ID )){ $thumb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $thumb_image = $thumb_image[0];}
			if($news_post_count < 6 && get_query_var( 'paged' ) == 0){
			?>
				<div class="<?php if($news_post_count % 5 == 1){echo 'twelve';} else{ echo 'six';} ?> columns">
					<div class="panel fixed-panel">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<ul class="postmetadata">
							<li clsss="date"><i class="fa fa-clock-o"></i>
								<?php 
									if($post->post_type == 'post'){echo '<time>'.the_date().'</time>';}
									else {echo '<time>'.the_date().'</time>';}
								?>
							</li>
							<li><i class="fa fa-tag"></i><?php the_tags(); ?></li>
						</ul>
						<?php the_excerpt(); ?>
					</div>
				</div>
			<?php
			}
			else {
				?>
					<div class="twelve columns">
						<div class="panel">
							
							<div class="row">
								<div class="three columns">
									<a href="<?php the_permalink(); ?>"><figure>
										<img src="<?php echo $thumb_image; ?>">
									</figure></a>
								</div>
								<div class="one columns">
								</div>
								<div class="eight columns">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<ul class="postmetadata">
										<li clsss="date"><i class="fa fa-clock-o"></i>
											<?php 
												if($post->post_type == 'post'){echo '<time>'.the_date().'</time>';}
												else {echo '<time>'.the_date().'</time>';}
											?>
										</li>
										<li><i class="fa fa-tag"></i><?php the_tags(); ?></li>
									</ul>
									
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
		}
		if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
					</nav>
				<?php }
	}
	wp_reset_postdata();
	?>
</div>
<?php get_footer(); ?>