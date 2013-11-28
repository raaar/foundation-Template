<?php
/*
Template Name: Edge
*/
get_header(); ?>
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	
	<div class="row">
		<div class="eight columns l-article">
			<img src="<?php bloginfo('template_url')?>/img/LogoTheEdgeStrap.png" ?>
		</div>
	</div>


	

<div class="row">
    <div class="twelve columns l-article">
        <!-- Place somewhere in the <body> of your page -->
        <div class="flexslider large-flexslider">
            <ul class="slides">

                <li>
                    <img src="<?php bloginfo('template_url'); ?>/img/film2placeholder.jpg" />
                </li>
                <li>
                    <img src="<?php bloginfo('template_url'); ?>/img/film2placeholder.jpg" />
                </li>

            </ul>
        </div>

        <hr class="flexslider-hr">
    </div>
</div>

	

<!-- Featire Slider Row -->
	<div class="row ">
		<div class="twelve columns l-slider">
			<h1>The Edge</h1>
			<!--<h1 class="home-title">Features</h1> -->
			<?php mish_liquid_slider('slider-id', 'edge', false, false); ?>
		</div>
	</div>

<!-- Featire Slider Row -->

	<div class="row tight-grid ">
		<div class="twelve columns l-slider">
			<h1>Posters</h1>
		</div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/poster-1.jpg" alt="Edge December"></div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/posterfee.jpg" alt="Edge December"></div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/poster-timerecording.jpg" alt="Edge December"></div>
		<div class="three columns"><img src="http://mishconinside.wellstudio.co.uk/wp-content/uploads/2013/11/poster3.jpg" alt="Edge December"></div>
	</div>

	<?php endwhile; // End the loop ?>

<?php get_footer(); ?>