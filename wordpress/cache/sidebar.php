<aside id="sidebar" class="three columns l-sidebar">



	<?php get_search_form(); ?>
	
	<?php
		$news_args = array(
			'post_type' => 'post',
			'posts_per_page' => 3
		);
		$news_query = new WP_Query( $news_args );
		if ( $news_query->have_posts() ) {
			echo '<div class="panel-sm"><ul><li><h2>News</h2></li>';
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
	
</aside><!-- /#sidebar -->
<div class="one columns"></div>