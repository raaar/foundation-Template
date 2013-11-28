<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article class="l-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<ul class="postmetadata">
            <li clsss="date"><i class="fa fa-clock-o"></i><time><?php echo the_date(); ?> </time></li>
        </ul>
	</header>
	<div class="entry-content">
		<?php if (get_excerpt != ''){the_excerpt();}
		else {the_content(__('Continue reading...', 'reverie'));} ?>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr />
</article>