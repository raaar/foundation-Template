<?php
/*
Template Name: Course List
*/
get_header(); ?>
<?php 
$cat_args = array(
	'hide_empty' => 0,
	'exclude' => '1',
);
$categories = get_categories( $cat_args );
$current_category = "any";
if($_GET['cat']){$current_category = $_GET['cat'];}
// this gets an array of child categories if they exist
$child_categories = '';
if ($current_category != "any"){
	$parent_category = get_category_by_slug($current_category);
	$parent_category = $parent_category->term_id;
	$child_categories = get_categories( array('hide_empty' => 0, child_of => $parent_category) );
}
?>
<!-- Top News Headline Row -->
	<div class="row">
		<!-- Cat list plus options -->
		<div class="three columns">
		<aside class="academy-sidebar">
			<?php 
			while (have_posts()) : the_post();
				$front_image = 'default.png';
				if (has_post_thumbnail( $post->ID )){ $front_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $front_image = $front_image[0];}
				echo '<img src="'.$front_image.'">';
			endwhile; // End the loop ?>
			<h1>Courses:</h1>
			<section class="sidebar-item">
				<?php
					get_search_form();
				?>
			</section>
			<section class="sidebar-item">
				<h3>Courses by department</h3>
				<ol>
				<?php
				foreach($categories as $cat){
					$active = '';
					if($current_category == $cat->slug){$active = 'active';}
					if ($cat->parent == 0){
						echo '<li class="'.$active.'"><a href="'.get_permalink().'?cat='.$cat->slug.'">'.$cat->name.'</a></li>';
					}
				}
				?>
				</ol>
				<?php
					if ($current_category != "any" && !empty($child_categories)){
						echo '<ol>';
						foreach($child_categories as $cat){
							$active = '';
							if($current_category == $cat->slug){$active = 'active';}
							echo '<li class="'.$active.'"><a href="'.get_permalink().'?cat='.$cat->slug.'">'.$cat->name.'</a></li>';
						}
						echo '<ol>';
					}
				?>
			</section>
		</aside>
		</div>
		<?php if($current_category == "any"){$current_category = "";} ?>
		<!-- Course List -->
		<div class="eight column offset-by-one end">
			<dl class="academy-accordion">
			<?php
			$course_args = array(
				'post_type' => 'course',
				'post_status' => array( 'publish', 'pending', 'draft', 'future'),
				'category_name' => $current_category
			);
			$course_query = new WP_Query( $course_args );
			if ( $course_query->have_posts() ) {
				while ( $course_query->have_posts() ) {
				
					$course_query->the_post();
					
					
					$mq2 = get_field('mq2');
					$care = in_array( 'care', $mq2) ? 'true' : false;
					$bpm = in_array( 'bpm', $mq2) ? 'true' : false;
					$knowledge = in_array( 'knowledge', $mq2) ? 'true' : false;
					?>
					<dt>
						<div class="row"> 
							<div class="nine column">
								<h3><?php the_title(); ?></h3>
								<time datetime="<?php the_time('d F Y H:ia'); ?>"><?php the_time('d F Y H:ia'); ?></time>
							</div>
							
							<div class="two column">
								<?php if($care){echo '<div class="course-icon"><i>C</i></div>';} ?>
								<?php if($bpm){echo '<div class="course-icon"><i>BPM</i></div>';} ?>
								<?php if($knowledge){echo '<div class="course-icon"><i>K</i></div>';} ?>
							</div>
							
							<div class="one column">
								<div class="info-cpd"> CPD: <?php the_field('hours'); ?></div>
								<div class="open-arrow">
									<i class="fa fa-angle-down"></i>
								</div>
							</div>
						</div>
					</dt>
					<dd>
						<?php the_content(); ?>
						<p><?php the_field('course_outline'); ?></p>
						<a class="academy-btn" href="<?php the_field('vuture_link'); ?>">Go to signup form</a>
						<div class="close-arrow">
							<i class="fa fa-angle-up"></i>
						</div>
					</dd>
					<?php
					
				}
			}
			else {
				echo 'No Posts';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</dl>
		</div>
	</div>
	
<?php get_footer(); ?>