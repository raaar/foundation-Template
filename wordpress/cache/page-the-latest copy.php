<?php
/*
Template Name: The Latest Page
*/
get_header(); ?>
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	
<div class="row">
	<?php $front_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $front_image = $front_image[0]; ?>
	
	<div class="four columns l-article"><img src="<?php echo $front_image; ?>"></div>
	<div class="two columns l-article"></div>
	<div class="six columns l-20"><?php the_content(); ?></div>
</div>
	
<!-- Top News Headline Row -->
	<div class="row">
		<div class="twelve columns">
			<?php mish_flex_slider('featured-course'); ?>
		</div>
	</div>
	
<!-- News Slider Row -->
	<div class="row">
		<div class="twelve columns l-slider">
			<h1 class="home-title">News</h1>
			<?php mish_liquid_slider('slider-id', 'news', false, false, 'post'); ?>
		</div>
	</div>
	
<!-- Events Slider Row -->
	<div class="row">
		<div class="twelve columns l-slider">
			<h1 class="home-title">Events</h1>
			<?php mish_liquid_slider('slider-id-2', 'event', false, false, 'event'); ?>
		</div>
	</div>
		<?php endwhile; // End the loop ?>


<div class="row tight-grid ">
	<div class="twelve columns l-article">
		<h1>News</h1>
	</div>

	<div class="six columns">
		<div class="panel fixed-panel">
			<h3>Panel Name</h3>
			<ul class="postmetadata">
                <li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
                <li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
            </ul>
			<p>
				I recently contributed to a panel discussion on data theft, hosted by Mishcon de Reya to launch Mishcon Recover. Together with Dr Stephen Page and Robert Howe QC, and chaired by Savvy Woman‘s Sarah Pennells, we discussed issues particularly relating to internal data theft.
			</p>
		</div>
	</div>

	<div class="six columns">
		<div class="panel fixed-panel">
			<h3>Panel Name</h3>
			<ul class="postmetadata">
                <li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
                <li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
            </ul>
			<p>
				I recently contributed to a panel discussion on data theft, hosted by Mishcon de Reya to launch Mishcon Recover. Together with Dr Stephen Page and Robert Howe QC, and chaired by Savvy Woman‘s Sarah Pennells, we discussed issues particularly relating to internal data theft.
			</p>
		</div>
	</div>

	<div class="twelve columns">
		<div class="panel fixed-panel-wide">
			<h3>Full span panel</h3>
			<ul class="postmetadata">
                <li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
                <li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
            </ul>
			<p>
				I recently contributed to a panel discussion on data theft, hosted by Mishcon de Reya to launch Mishcon Recover. Together with Dr Stephen Page and Robert Howe QC, and chaired by Savvy Woman‘s Sarah Pennells, we discussed issues particularly relating to internal data theft.
			</p>
		</div>
	</div>

	<div class="six columns">
		<div class="panel fixed-panel">
			<h3>Panel Name</h3>
			<ul class="postmetadata">
                <li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
                <li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
            </ul>
			<p>
				I recently contributed to a panel discussion on data theft, hosted by Mishcon de Reya to launch Mishcon Recover. Together with Dr Stephen Page and Robert Howe QC, and chaired by Savvy Woman‘s Sarah Pennells, we discussed issues particularly relating to internal data theft.
			</p>
		</div>
	</div>

	<div class="six columns">
		<div class="panel fixed-panel">
			<h3>Panel Name</h3>
			<ul class="postmetadata">
                <li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
                <li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
            </ul>
			<p>
				I recently contributed to a panel discussion on data theft, hosted by Mishcon de Reya to launch Mishcon Recover. Together with Dr Stephen Page and Robert Howe QC, and chaired by Savvy Woman‘s Sarah Pennells, we discussed issues particularly relating to internal data theft.
			</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>