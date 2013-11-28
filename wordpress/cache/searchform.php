<?php 
global $current_category; 
$searchcl = 'search-form';
if($current_category){ $searchcl = 'academy-search-form';}
?>
<form role="search" method="get" id="searchform<?php echo $current_category; ?>" action="<?php echo home_url('/'); ?>">
<div class="<?php echo $searchcl; ?>">
	<?php if($current_category){echo '<label>Search Courses by Keywords</label>';} ?>
		<input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'reverie'); ?>">
		<?php if($current_category){ echo '<input type="hidden" value="course" name="post_type" id="post_type" />';} ?>
	<div class="boxed-icon-sm">
		<i class="fa fa-search"></i>
	</div>
</div>
</form>