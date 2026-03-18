<section class="content-item-block">
<aside class="content-item">
	<div class="content">
		<?php echo custom_breadcrumbs();?>
		<h1 class="title m-b-30"><?php the_title();?></h1>
		
		<div class="details-container flex flex-space-between m-b-30 flex-align-center">
			<div class="details m-y-30">
				<div>By: <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>"><?php echo get_the_author_meta('display_name');?></a></div>
				<div>Last updated: <time datetime="<?php echo get_the_modified_date('Y-m-d');?>"><?php echo get_the_modified_date();?></time></div>
			</div>
			<div class="share-container">
				<?php echo get_template_part('templates/section/share');?>
			</div>
		</div>
		<div class="description"><?php the_content();?></div>
	</div>
</aside>