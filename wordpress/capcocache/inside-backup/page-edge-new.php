<?php
/*
Template Name: Edge
*/
get_header(); ?>



<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	<?php
	$image = 'default.png';
	if (has_post_thumbnail( $post->ID )){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0];}
	?>
	<div class="row">
		<div class="six columns l-40">
			<img src="<?php echo $image; ?>">
		</div>
		<div class='six columns l-20 header-strapline'>
			<?php the_content(); ?>
		</div>
	</div>




<div class="row">
	<div class="twelve columns intro">

		<div class="intro-image">
	        <div class="flexslider large-flexslider">
	            <ul class="slides">
<!--
	                <li>
	                    <img class="activate-lightbox" src="<?php bloginfo('template_url'); ?>/img/film2placeholder.jpg" />
	                </li>
-->
		<li class="slide-brightcove">
<object id="flashObj" width="100%" height="408" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,47,0"><param name="movie" value="http://c.brightcove.com/services/viewer/federated_f9?isVid=1&isUI=1" /><param name="bgcolor" value="#FFFFFF" /><param name="flashVars" value="@videoPlayer=2304654054001&playerID=2383208629001&playerKey=AQ~~,AAABWWVjUgk~,9_eVlIpI5ihRbkQxZ-E-ZM9CALrNWqpu&domain=embed&dynamicStreaming=true" /><param name="base" value="http://admin.brightcove.com" /><param name="seamlesstabbing" value="false" /><param name="allowFullScreen" value="true" /><param name="swLiveConnect" value="true" /><param name="allowScriptAccess" value="always" /><embed src="http://c.brightcove.com/services/viewer/federated_f9?isVid=1&isUI=1" bgcolor="#FFFFFF" flashVars="@videoPlayer=2304654054001&playerID=2383208629001&playerKey=AQ~~,AAABWWVjUgk~,9_eVlIpI5ihRbkQxZ-E-ZM9CALrNWqpu&domain=embed&dynamicStreaming=true" base="http://admin.brightcove.com" name="flashObj" width="100%" height="408" seamlesstabbing="false" type="application/x-shockwave-flash" allowFullScreen="true" allowScriptAccess="always" swLiveConnect="true" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed></object>
		</li>



					<!--
	                <li class="slide-podcast">
	                	<div class="podcast-text">
	                		<h1>Gary Miller</h1>
	                		<hr>
	                		<h1>Gifts and Hospitality</h1>
	                	</div>
	                	<div class="podcast-embed">
							<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/116842530&amp;color=f58024&amp;auto_play=false&amp;show_artwork=true"></iframe>	                	
						</div>
	                </li>

	                <li class="slide-podcast">
	                	<div class="podcast-text">
	                		<h1>Gary Miller</h1>
	                		<hr>
	                		<h1>Gifts and Hospitality</h1>
	                	</div>
	                	<div class="podcast-embed">
							<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/116842530&amp;color=f58024&amp;auto_play=false&amp;show_artwork=true"></iframe>	                	
						</div>
	                </li>
	            -->

	            </ul>
	        </div>
		</div>
	    <div class="image-sidebar">
			<?php 
			$poster_args = array(
				'post_type' => 'teaser',
				'posts_per_page' => 1,
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'teaser_type',
						'field' => 'slug',
						'terms' => 'edge-poster'
					)
				)
			);
			$poster_loop = new WP_Query($poster_args);
			if ( $poster_loop->have_posts() ) :
				while ( $poster_loop->have_posts() ) : $poster_loop->the_post();
				$image = 'default.png';
				if (has_post_thumbnail( $post->ID )){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0];}
				?>
					<div class="image-item-full" >
						<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
					</div>
					<?
				endwhile;
				wp_reset_query();
			endif;
			?>
	    </div>
	</div>
</div>
<div class="row">
    <div class="twelve column">
        <hr class="flexslider-hr">
    </div>
</div>

	

<!-- Featire Slider Row -->
	<div class="row ">
		<div class="twelve columns l-slider">
			<h1>Latest</h1>
			<!--<h1 class="home-title">Features</h1> -->
			<?php mish_liquid_slider('slider-id', 'edge', false, false); ?>
		</div>
	</div>


<div class="row tight-grid">
	<div class="l-home-small-panels">
		<div class="four columns">
			<div class="panel-xs">
				<h1>Podcast</h1>
				<div class="panel-icon"><i class="fa fa-play"></i></div>
				<p>Short section description</p>
				<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/116842530&amp;color=f58024&amp;auto_play=false&amp;show_artwork=true"></iframe>	                	
			</div>
		</div>
		<div class="four columns">
			<div class="panel-xs">
				<h1>Calendar</h1>
				<div class="panel-icon"><i class="fa fa-calendar"></i></div>
				<h3>15th November 2013</h3>
				<hr>
				<p>Drinks Matteo Timpani Crowe Clark Whitehill LLP</p>
			</div>
		</div>
		<div class="four columns">
			<div class="panel-xs">
				<h1>Little<br>Back Book</h1>
				<div class="panel-icon"><i class="fa fa-book"></i></div>
				<div class="l-fixed-image">
					<img src="http://internal.mishcon.com/the-edge/wp-content/uploads/2013/10/Mark.Raskin-300x200.jpg" />
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Featire Slider Row
	<div class="row tight-grid ">
		<div class="twelve columns l-slider">
			<h1>Posters</h1>
		</div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/poster-1.jpg" alt="Edge December"></div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/posterfee.jpg" alt="Edge December"></div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/poster-timerecording.jpg" alt="Edge December"></div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/poster3.jpg" alt="Edge December"></div>
	</div>
 -->

	<?php endwhile; // End the loop ?>

<?php get_footer(); ?>