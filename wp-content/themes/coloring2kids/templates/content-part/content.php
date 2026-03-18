<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<a href="<?php echo esc_url( get_permalink() );?>" class="flex center content-loop-item">
    <?php the_post_thumbnail('thumbnail');?>
	<div>
        <h2><?php the_title();?></h2>
	    <?php the_excerpt();?>
    </div>
</a>