<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$unique_id = wp_unique_id( 'search-form-' );

$aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" class="form grid flex-align-center gap-24" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> >
    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M25 25L18.8702 18.8702M18.8702 18.8702C20.3406 17.3999 21.25 15.3687 21.25 13.125C21.25 8.63769 17.6123 5 13.125 5C8.63769 5 5 8.63769 5 13.125C5 17.6123 8.63769 21.25 13.125 21.25C15.3687 21.25 17.3999 20.3406 18.8702 18.8702Z" stroke="#5457FC" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field" id="<?php echo $unique_id;?>" placeholder="" autocomplete="off" autofocus>
    <input type="submit" class="button button-search" value="Find">
    <div class="search-suggestions" id="search-suggestions"></div>
</form>