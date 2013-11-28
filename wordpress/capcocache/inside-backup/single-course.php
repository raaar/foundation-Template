<?php get_header(); ?>
<div class="row">

<?php get_sidebar(); ?>

<!-- Row for main content area -->
	<div class="eight columns">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	<?php
		$course_hours = floatval(get_field('hours'));
		$course_minutes = ($course_hours % 1) * 60;
		
		$end_hour = intval(get_the_date('H'));
		$end_minute = intval(get_the_date('i'));
		$end_ampm = get_the_date('a');
		
		if($course_minutes != 0 && $course_minutes + $end_minute <= 59){
			$end_minute += $course_minutes;
			$end_hour += floor($course_hours);
		}
		elseif($course_minutes != 0 && $course_minutes + $end_minute > 59){
			$end_minute = ($course_minutes + $end_minute) % 60;
			$end_hour += floor($course_hours) + 1;
		}
		elseif($course_minutes == 0){
			$end_hour += floor($course_hours);
			if ($end_minute == 0){$end_minute = '00';}
		}
		
		$end_time = $end_hour.':'.$end_minute;
		
	?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<ul class="postmetadata">
                	<li clsss="date"><i class="fa fa-clock-o"></i>
						<?php if($post->post_status == 'pending'){
							?> <time>TBC</time> <?
						}
						else{
							?> <time><?php echo the_date('d F Y   H:i'); ?> - <?php echo $end_time; ?></time> <?php
						}
						?>
					</li>
            	</ul>
			</header>
			<div class="entry-content">
				<h3>Speaker: <?php the_field('speaker'); ?></h3>
				<?php the_content(); ?>
				<?php if(get_field('course_outline') != ''){echo '<h3>What will be covered:</h3>';} ?>
				<p><?php the_field('course_outline'); ?></p>
				<?php if(get_field('course_outline') != ''){echo '<p>'.the_field('session_description').'</p>';} ?>
				<?php 
					$course_link = get_field('vuture_link');
					if ($course_link == ''){ $course_link = $vuture_link; }
				?>
				<a class="academy-btn" href="<?php echo $course_link; ?>">Book now</a>
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