<?php $crb_title = carbon_get_post_meta(get_the_ID(), 'crb_title');?>
<?php $crb_description = carbon_get_post_meta(get_the_ID(), 'crb_description');?>
<?php $crb_subtitle = carbon_get_post_meta(get_the_ID(), 'crb_subtitle');?>
<section class="header-main text-center">
	<div class="container relative">
		<!-- <aside class="parallax left">
			<img class="image image-1" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-left-1.png">
			<img class="image image-2" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-left-2.png">
			<img class="image image-3" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-left-3.png">
		</aside>
		<aside class="parallax right">
			<img class="image image-1" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-right-1.png">
			<img class="image image-2" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-right-2.png">
			<img class="image image-3" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-right-3.png">
			<img class="image image-4" src="<?php echo get_template_directory_uri();?>/assets/images/parallax-right-4.png">
		</aside> -->
	</div>
	<h1 class="title p-t-110"><?php echo $crb_title;?></h1>
	<div class="description opacity-08 m-t-25 p-b-30"><?php echo $crb_description;?></div>
	
	<aside class="search-form-container">
		<?php get_search_form();?>
	</aside>
</section>