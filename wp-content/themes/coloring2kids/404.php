<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<section class="content content-404">
    <div>
        <h1>404 page not found</h1>
        <p></p>
        <a href="<?=home_url('/');?>" class="btn decorate"><span>To mainpage</span></a>
    </div>
</section>


<?php
get_footer();
