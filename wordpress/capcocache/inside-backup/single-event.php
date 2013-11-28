<?php get_header(); ?>
<div class="row">

<?php get_sidebar(); ?>

<!-- Row for main content area -->
	<div class="eight columns">
	
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<!--<ul class="postmetadata">
                	<li clsss="date"><i class="fa fa-clock-o"></i><time><?php //echo the_date('d F Y   H:i'); ?></time></li>
            	</ul>-->
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
				<p style="text-align: left;" align="center">
					<strong>Date: </strong> <?php the_date('d F Y'); ?><br>
					<strong>Time: </strong><?php the_time('H:i'); ?><br>
					<strong>Venue: </strong><?php the_field('venue'); ?><br>
					<strong>RSVP: </strong> To register for this lecture, please contact <a href="mailto:events@mishcon.com">events@mishcon.com</a>.
				</p>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php //comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	
</div><!-- .row -->
<?php get_footer(); ?>