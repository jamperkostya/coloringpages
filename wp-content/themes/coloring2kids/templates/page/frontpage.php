<?php $crb_subtitle = carbon_get_post_meta(get_the_ID(), 'crb_subtitle');?>
<?php
$query = new WP_Query([
	'post_type'      => 'post', // или 'blog', если кастомный
	'meta_query'     => [
		[
			'key'     => 'crb_show_as_top',
			'value'   => '1',
			'compare' => '=',
		],
	],
]);
?>
<?php if ($query->have_posts()):?>
<section class="content">
	<section class="items grid grid-3-columns gap-24">
		<?php while ($query->have_posts()): $query->the_post();?>
		<?php get_template_part('templates/content-part/content', get_post_type());?>
		<?php endwhile;?>
		<?php wp_reset_postdata();?>
	</section>
</section>
<?php endif;?>

<?php
$args = [
	'post__not_in'   => [$post->ID],      // исключаем текущий пост
	'post_type'      => 'post',           // или свой CPT,
	'orderby'        => 'date',
	'order'          => 'DESC',
];
$new = new WP_Query($args);
?>
<?php if ($new->have_posts()):?>
<?php $GLOBALS['counter'] = 1;?>
<section class="content" itemscope itemtype="https://schema.org/ItemList">
	<h2><?php echo $crb_subtitle;?></h2>
	<section class="items grid grid-3-columns gap-24">
		<meta itemprop="name" content="Kostenlose Malvorlagen für Kinder" style="display:none;">
		<meta itemprop="description" content="<?php echo get_bloginfo('description'); ?>" style="display:none;">

		<?php while ($new->have_posts()) : $new->the_post();?>
		<?php get_template_part('templates/content-part/content', get_post_type());?>
		<?php endwhile;?>
		<?php wp_reset_postdata();?>
	</section>
</section>
<?php endif;?>

<article class="seo-block-container content m-b--100 relative">
	<div class="seo-block"><?php the_content();?></div>
</article>