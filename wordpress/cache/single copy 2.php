<?php get_header(); ?>
<div class="row">

<?php get_sidebar(); ?>

<!-- Row for main content area -->
	<div class="eight columns">
	

	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article class="l-article" <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<ul class="postmetadata">
                	<li clsss="date"><i class="fa fa-clock-o"></i><time><?php echo the_date(); ?> </time></li>
            	</ul>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php //the_tags(); ?></p>
			</footer>
			<?php //comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	
</div><!-- .row -->
<?php get_footer(); ?>