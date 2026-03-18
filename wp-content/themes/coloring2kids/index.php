<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
get_header();?>
    <?php if ( have_posts() ):?>
        <!-- // Load posts loop. -->
        <?php while ( have_posts() ):?>
            <article class="content-loop">
                <?php
                the_post();
                get_template_part( 'templates/content-part/content', get_post_format() );
                ?>
            </article>
        <?php endwhile;?>
    <?php else:?>
        <!-- // If no content, include the "No posts found" template. -->
        <?php echo get_template_part( 'templates/content/content-none' );?>
    <?php endif;?>

<?php get_footer();?>
