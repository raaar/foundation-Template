<?php get_header(); ?>

<div class="row">

<!-- Row for main content area -->
	<div class="nine columns">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class('l-article') ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
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
		<ul>
	<?php
			$course_args = array(
				'post_type' => 'post',
				'post_status' => array( 'publish'),
				'posts_per_page' => 15,
				'paged' => get_query_var( 'paged' )
				/*
				'tax_query' => array(
					array(
						'taxonomy' => 'edge_type',
						'field' => 'slug',
						'terms' => array('film', 'podcast')
					)
				)
				*/
			);
			$wp_query = new WP_Query( $course_args );
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					$thumb_image =  get_bloginfo('template_url') . '/img/capco-placeholder.png';
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
									<ul class="postmetadata">
                						<li clsss="date"><i class="fa fa-clock-o"></i><time><?php echo the_date(); ?> </time></li>
            						</ul>
								</a>
								<?php the_excerpt(); ?>
								<i class="fa fa-arrow-circle-right"></i>
							</div>
						</div>
					</li>
					<hr>


					<?php
			}
			?>
			</div><!-- large-list-two -->

			<?php
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
		</ul>





	</div><!-- eight-columns -->

	<div class="three columns l-sidebar-2">
		<div class="panel-header">
			Twitter
		</div>
		<div class="panel-sm twitter-sidebar">

			<?php
	/* your parameters */
	$jltw_args = array(
		'username'	=> 'Mishcon_de_Reya',
		'nb_tweets'	=> 1,
		'avatar'	=> false,
		'cache'		=> 1600,
		'transition'	=> true,
		'delay'		=> 10,
		'links'		=> false
	);

	/* set variable */

	$list_of_tweets = get_jltw($jltw_args);

	/* more later */
	echo $list_of_tweets;
?>

<!--
			<a class="twitter-timeline" href="https://twitter.com/raflondon" data-theme="dark" data-link-color="#a0926b" data-widget-id="405725416339435520" data-chrome="nofooter transparent noscrollbar noborders" data-tweet-limit="3" >Tweets by @raflondon</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
-->
		</div>

	</div>


</div><!-- .row -->
		
<?php get_footer(); ?>