<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();?>
<?php if ( have_posts() ):?>
<article class="content category-description">
	<h1 class="h1">
		<?php
		printf(
			/* translators: %s: Search term. */
			esc_html__( 'Results for "%s"', 'twentytwentyone' ),
			'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
		);
		?>
	</h1>
	
	<div class="description">
		<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'twentytwentyone'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
	</div>
</article>
<section class="content">
	<div class="items grid grid-3-columns gap-24">
		<?php while ( have_posts() ):?>
		<?php the_post();?>
		<?php get_template_part( 'templates/content-part/content', 'post' );?>
		<?php endwhile;?>
	</div>
	<?php
	// Вывод пагинации
	the_posts_pagination(array(
		'mid_size'  => 2,
		'prev_text' => __('« Previous', 'textdomain'),
		'next_text' => __('Next »', 'textdomain'),
		'screen_reader_text' => '&nbsp;'
	));
	?>
</section>
<?php else:?>
<section class="content">
	<?php get_template_part( 'templates/content/content', 'none' );?>
</section>
<?php endif;?>
<?php get_footer();
