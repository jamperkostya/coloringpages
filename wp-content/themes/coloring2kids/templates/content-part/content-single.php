<?php
/**
 * The template part for displaying content single loop item
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<a href="<?php echo esc_url( get_permalink() );?>">
	<article>
		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="<?php the_title();?>">
		<header><?php the_title();?></header>
		<div><?php the_excerpt();?>
	</article>
</a>