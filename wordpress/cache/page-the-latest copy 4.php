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
			'posts_per_page' => 6,
			'paged' => get_query_var( 'paged' ),
			'tag' => 'news'
		);
		
	$news_query = new WP_Query( $news_args );
	
	$news_post_count = 0;
	
	if ( $news_query->have_posts() ) {
		while ( $news_query->have_posts() ) {
			$news_query->the_post();
			$news_post_count++;
			?>
			<a href="<?php the_permalink(); ?>">
				<div class="<?php if($news_post_count % 6 == 1){echo 'twelve';} else{ echo 'six';} ?> columns">
					<div class="panel fixed-panel">
						<h3><?php the_title(); ?></h3>
						<ul class="postmetadata">
							<li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
							<li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
						</ul>
						<?php the_excerpt(); ?>
					</div>
				</div>
			</a>
			<?php
		}
	}
	wp_reset_postdata();
	?>
</div>
<?php get_footer(); ?>