<?php
/*
Template Name: Course List
*/
get_header(); ?>
<?php 
//$vuture_link = 'http://sites.mishcon.vuturevx.com/8/3081/landing-pages/form(web).asp';
$vuture_link = 'mailto:academy%40mishcon.com?subject=Academy%20web%20notification%3A%20I%20am%20interested%20in%20attending%20a%20course&cc=julie.begum%40mishcon.com&body=Please%20provide%20us%20with%20the%20title%20of%20the%20course%20you%20are%20interested%20in%20attending%3A%0D%0A%0D%0A%0D%0A%0D%0APlease%20also%20provide%20us%20with%20the%20date%20the%20course%20will%20be%20held%20on%3A%20';

$dept_categories = get_categories( build_cat_args(20) );
$skill_cats = get_categories( build_cat_args(21) );
$audience_cats = get_categories( build_cat_args(29) );
$mq2_array = array('care','bpm','knowledge');

$current_array = array();

$current_dept = '';
if($_GET['dept']){$current_dept = $_GET['dept'];}
if($current_dept != ''){array_push($current_array, $current_dept);}

$current_skill = '';
if($_GET['skill']){$current_skill = $_GET['skill'];}
if($current_skill != ''){array_push($current_array, $current_skill);}

$current_role = '';
if($_GET['role']){$current_role = $_GET['role'];}
if($current_role != ''){array_push($current_array, $current_role);}

$current_mq2 = '';
if($_GET['mq2']){$current_mq2 = $_GET['mq2'];}


// PAGE FUNCTIONS

function build_cat_args($child_of){
	return array( 'hide_empty' => 0, 'child_of'   => $child_of);
}

function build_filter_link($cat_name = '', $cat_data = ''){

	global $current_dept;
	global $current_skill;
	global $current_role;
	global $current_mq2;
	
	$dept = $current_dept;
	$skill = $current_skill;
	$role = $current_role;
	$the_mq2 = $current_mq2;
	
	//Alter defaults using cat_name/cat_data
	if ($cat_name == 'dept'){$dept = $cat_data;}
	if ($cat_name == 'skill'){$skill = $cat_data;}
	if ($cat_name == 'role'){$role = $cat_data;}
	if ($cat_name == 'mq2'){$the_mq2 = $cat_data;}
	
	// build actual permalink using defaults- 
	$link_string = get_permalink()."?";
	$prepender = '';
	if ($dept != ''){$link_string = $link_string.$prepender.'dept='.$dept; $prepender = '&';}
	if ($skill != ''){$link_string = $link_string.$prepender.'skill='.$skill; $prepender = '&';}
	if ($role != ''){$link_string = $link_string.$prepender.'role='.$role; $prepender = '&';}
	if ($the_mq2 != ''){$link_string = $link_string.$prepender.'mq2='.$the_mq2;}
	
	return $link_string;
}

function generate_args($current_array, $sticky_query_params){
		$args_array_output = array(
			'post_type' => 'course',
			'post_status' => array( /*'publish', 'draft',*/'pending', 'future'),
			'posts_per_page' => 15,
			'category__and' => $current_array,
			'order' => 'ASC',
			//'orderby' => 'meta_value',
			'paged' => get_query_var( 'paged' ),
			'meta_query' => $sticky_query_params
		);
		return $args_array_output;
	}
?>
<!-- Top News Headline Row -->
	<div class="row">
		<!-- Cat list plus options -->
		<div class="three columns">
		<aside class="academy-sidebar l-sidebar">
			
			<section class="sidebar-item">
			<?php 
			while (have_posts()) : the_post();
				$front_image = 'default.png';
				if (has_post_thumbnail( $post->ID )){ $front_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $front_image = $front_image[0];}
				echo '<img src="'.$front_image.'">';
			endwhile; // End the loop ?>
			<h1>Courses:</h1>
			</section>

			<section class="sidebar-item">
				<?php
					get_search_form();
				?>
			</section>
			<section class="sidebar-item">
				<h3>Courses by department</h3>
				<ol>
				<?php
				foreach($dept_categories as $cat){
					$active = '';
					if($current_dept == $cat->term_id){$active = 'active';}
					echo '<li class="'.$active.'"><a href="'.build_filter_link('dept',$cat->term_id).'">'.$cat->name.'</a></li>';
				}
				?>
				</ol>
				<?php
					/*if ($current_category != "any" && !empty($child_categories)){
						echo '<ol>';
						foreach($child_categories as $cat){
							$active = '';
							if($current_category == $cat->slug){$active = 'active';}
							echo '<li class="'.$active.'"><a href="'.get_permalink().'?cat='.$cat->slug.'">'.$cat->name.'</a></li>';
						}
						echo '<ol>';
					}*/
				?>
				<hr>
				<h3>Courses by core skill</h3>
				<ol>
				<?php
				foreach($skill_cats as $cat){
					$active = '';
					if($current_skill == $cat->term_id){$active = 'active';}
					echo '<li class="'.$active.'"><a href="'.build_filter_link('skill',$cat->term_id).'">'.$cat->name.'</a></li>';
				}
				?>
				</ol>
				<hr>
				<h3>Courses by my role</h3>
				<ol>
				<?php
				foreach($audience_cats as $cat){
					$active = '';
					if($current_role == $cat->term_id){$active = 'active';}
					echo '<li class="'.$active.'"><a href="'.build_filter_link('role',$cat->term_id).'">'.$cat->name.'</a></li>';
				}
				?>
				</ol>
				<hr>
				<h3>Courses by MQ2</h3>
				<ol>
				<?php 
				foreach($mq2_array as $mq2){
					$active = '';
					$mq2_uc = '';
					if($current_mq2 == $mq2){$active = 'active';}
					if ($mq2 == 'bpm'){$mq2_uc = 'BPM';}
					else {$mq2_uc = ucwords($mq2);}
					echo '<li class="'.$active.'"><a href="'.build_filter_link('mq2',$mq2).'">'.$mq2_uc.'</a></li>';
				}
				?>
				</ol>
				<hr>
				<h3>Sign up</h3>
				<a class="academy-btn" style="background:#f58024" href="http://sites.mishcon.vuturevx.com/6/10/forms-new/subscribe-academy-(web).asp"><h3>Your options</h3></a>
			</section>
		</aside>
		</div>
		<!-- Course List -->
		<div class="eight column offset-by-one end l-article">
			<dl class="academy-accordion">
			<?php
			// generate the parameters for the mq2 custom field query (conditional on whether the mq2 is specified) -
			$mq2_query_params = array('key' => 'mq2');
			if ($current_mq2 != ''){$mq2_query_params = array('key' => 'mq2', 'value' => $current_mq2,'compare' => 'LIKE');}
			
			// Generate sticky posts -
			$sticky_query_params = array(
				$mq2_query_params,
				array('key' => 'show_on_top', 'value' => true, 'compare' => '=')
			);
			$sticky_args = generate_args($current_array, $sticky_query_params); 
			
			// Generate course arguments for non sticky posts -
			$sticky_query_params = array(
				'relation' => 'OR',
				$mq2_query_params,
				array('key' => 'show_on_top', 'value' => true, 'compare' => 'NOT LIKE'),
				array('key' => 'show_on_top', 'compare' => 'NOT EXISTS')
			);
			$course_args = generate_args($current_array, $sticky_query_params);
			
			// Create query object for stickies -
			$sticky_query = new WP_Query( $sticky_args );
			
			// Create query object for base post list -
			$wp_query = new WP_Query( $course_args );
			
			// merging the posts from stickies and the main query -
			$sticky_posts = $sticky_query->posts;
			$wp_query_posts = $wp_query->posts;
			$sticky_posts = array_merge($sticky_posts, $wp_query_posts); 
			$wp_query->posts = $sticky_posts;
			
			/*echo '<h3>';
				echo sizeof($wp_query_posts);
				echo sizeof($wp_query->posts);
				print_r($wp_query);
			echo '</h3>';*/
			
			// Start if loop for all posts -
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
				
					$wp_query->the_post();
					
					
					$mq2 = get_field('mq2');
					$admin_link = get_field('admin_link');
					if(!is_array($mq2)){$mq2 = array('', $mq2);}
					$care = in_array( 'care', $mq2) ? 'true' : false;
					$bpm = in_array( 'bpm', $mq2) ? 'true' : false;
					$knowledge = in_array( 'knowledge', $mq2) ? 'true' : false;
					?>
					<dt>
						<div class="row"> 
							<div class="nine column">
								<h3><?php the_title(); ?></h3>
								<?php if($post->post_status == 'pending'){
								?> <time>Date TBC</time> <?
								}
								else{
								?> <time datetime="<?php the_time('d F Y H:i'); ?>"><?php the_time('d F Y H:i'); ?></time> <?php
								}
								?>
								
							</div>
							
							<!--
							<div class="two column">
								<?php if($care){echo '<div class="has-tip tip-top course-icon" title="title"><i>C</i></div>';} ?>
								<?php if($bpm){echo '<div class="course-icon"><i>BPM</i></div>';} ?>
								<?php if($knowledge){echo '<div class="course-icon"><i>K</i></div>';} ?>
							</div>
							
							<div class="one column">
								<div class="info-cpd"> CPD: <?php the_field('hours'); ?></div>
								<div class="open-arrow">
									<i class="fa fa-angle-down"></i>
								</div>
							</div>
							-->

							<div class="three columns">
								<div class="row">
									<div class="five columns">
										<?php if($care){echo '<div class="has-tip tip-top course-icon" title="MQ2 : Care"><i alt="Care">C</i></div>';} ?>
										<?php if($bpm){echo '<div class="has-tip tip-top course-icon" title="MQ2 : Best Practice Management"><i>BPM</i></div>';} ?>
										<?php if($knowledge){echo '<div class="has-tip tip-top course-icon" title="MQ2 : Knowledge"><i>K</i></div>';} ?>
									</div>
									<div class="seven columns">
										<div class="info-cpd"> A+ hours: <?php the_field('hours'); ?></div>
										<div class="open-arrow">
											<i class="fa fa-angle-down"></i>
										</div>
									</div>
								</div>
							</div>


						</div>
					</dt>
					<dd>
						<h3>Speaker: <?php the_field('speaker'); ?></h3>
						<?php the_content(); ?>
						<?php if(get_field('course_outline') != ''){echo '<h3>What will be covered:</h3>';} ?>
						<p><?php the_field('course_outline'); ?></p>
						<?php if(get_field('course_outline') != ''){echo '<p>'.the_field('session_description').'</p>';} ?>
						<?php 
							$course_link = get_field('vuture_link');
							$link_is_blank = false;
							if ($course_link == ''){ $course_link = $vuture_link; $link_is_blank = true; }
						?>
						<a class="academy-btn" href="<?php echo $course_link; ?>">
						<?php 
						if($link_is_blank){echo 'Register your interest for this course';  } 
						else {echo 'Book now';}
						?>
						</a>
						<?php if($admin_link && is_user_logged_in() && current_user_can( 'administrator' )){echo '<a class="academy-btn" href="'.$admin_link.'">Attendance List</a>';} ?>
						<div class="close-arrow">
							<i class="fa fa-angle-up"></i>
						</div>
					</dd>
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
				if (!$current_array[0]){echo '<h3>There are currently no courses available.</h3>';}
				else{ echo '<h3>There are currently no courses in these categories.</h3>';}
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</dl>
		</div>
	</div>


	
<?php get_footer(); ?>