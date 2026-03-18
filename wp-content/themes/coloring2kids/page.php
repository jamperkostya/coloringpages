<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	if(is_front_page())
    {
        get_template_part( 'templates/page/frontpage' );
    }
    else
    {
        get_template_part( 'templates/page/page' );
        // get_template_part( 'templates/content/content', get_post_type() );
    }

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		// comments_template();
	}
endwhile; // End of the loop.

get_footer();
