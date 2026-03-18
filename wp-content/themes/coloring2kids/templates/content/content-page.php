<?php
/**
 * The template part for displaying post page
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article class="content content-item">
	<div class="title-container">
		<h1 class="title"><?php the_title();?></h1>
	</div>
	<div><?php the_content();?></div>
</article>