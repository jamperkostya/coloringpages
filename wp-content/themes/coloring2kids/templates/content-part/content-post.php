<a href="<?php the_permalink();?>" class="item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
	<meta itemprop="position" content="<?php echo $GLOBALS['counter']++;?>">
	<meta itemprop="name" content="<?php the_title();?>">
	<meta itemprop="url" content="<?php the_permalink();?>">
	
	<div class="item-image" itemprop="item">
		<?php echo get_the_post_thumbnail(get_the_ID(), 'medium');?>
	</div>
	<header><?php the_title();?></header>
	<button class="button">Choose image</button>
</a>