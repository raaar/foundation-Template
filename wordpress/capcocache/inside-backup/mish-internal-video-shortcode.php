<?php
	// add the jwplayer script in:  
	function add_jwplayer_script() {
		wp_deregister_script( 'jwplayer' );
		wp_register_script('jwplayer', get_template_directory_uri().'/js/jwplayer.js', array('jquery'), null, true);
		wp_enqueue_script('jwplayer');
		// echo "<script src=\"".get_template_directory_uri()."/js/plugins/jwplayer.js\" type=\"text/javascript\"></script>";
		wp_deregister_script( 'swfobject' );
		//DM: including swfobject to make the crappy flash player work in the crappy ie8 browser.
		wp_register_script( 'swfobject', get_template_directory_uri() . '/js/swfobject.js', array( 'jquery' ), '', true );
		wp_enqueue_script('swfobject');
	}
	add_action( 'wp_footer', 'add_jwplayer_script' );
	
	// function that adds the shortcode:
    function AddMishVideo($params = array()) {  
        
		// default parameters: 
        extract(shortcode_atts(array(  
            'title' => 'Video',  
            'url' => 'please-insert-video-url.mp4',  
			'width' => 640,
			'height' => 360,
			'auto' => false,
        ), $params));  
		
		// if more than one player, we need to generate an name for each div id="flashplayer" :
		$title = rand(1,10000);

		// add the section that shows the player, copying in the url and height/width elements:
		?>
		<div class="video-embedded">
		<div id="flashplayer-<?php echo $title;?>" class="group">
			<p>This video requires Flash.</p>
			<div class="media mal pal"></div>
		</div>
		</div>
		<script type="text/javascript">
		jQuery(document).ready(function() {
			jwplayer("flashplayer-<?php echo $title;?>").setup({
				autostart: <?php echo $auto;?>,
				file: "<?php echo $url;?>",
				height: <?php echo $height;?>,
				width: <?php echo $width;?>,
				'controlbar.position': 'over',
				'controlbar.idlehide': 'true',
				<?php
				if (has_post_thumbnail()) {  
					$picurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
					echo "image: \"".$picurl."\",";
				} 
				?>
				modes: [
					{ type: "html5" },
					{ type: "flash", src: "<?php echo get_template_directory_uri();?>/flash/jwplayer/player.swf" },
					{ type: "download" }
				],
				events: { 
					onComplete: function() { 
						jwplayer("flashplayer").remove();
				}
			}
			});
		});
		</script>
		<?php
		
    }  
    add_shortcode('mishcon-video', 'AddMishVideo');  
	
	// This is the shortcode: [mishcon-video height=480 width=640 url="http://localhost/internal/the-edge/test.mp4" auto=false]
	
?>