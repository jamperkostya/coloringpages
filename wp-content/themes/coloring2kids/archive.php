<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
$queried_object = get_queried_object();
$last_modified = get_term_meta($queried_object->term_id, 'last_modified', true);
$crb_category_author = carbon_get_term_meta($queried_object->term_id, 'crb_category_author');
$crb_title = carbon_get_term_meta($queried_object->term_id, 'crb_title');
if(empty($crb_title)) $crb_title = $queried_object->name;
$author = WP_User::get_data_by( 'id', $crb_category_author );
?>
<?php if(is_author()===true):?>
<?php
$author_id = $queried_object->ID;
$first_name = get_user_meta( $author_id, 'first_name', true );
$last_name = get_user_meta( $author_id, 'last_name', true );
$bio = get_the_author_meta( 'description', $author_id );
$crb_job_title = carbon_get_user_meta($author_id, 'crb_job_title');
$crb_experience = carbon_get_user_meta($author_id, 'crb_experience');
$crb_image = carbon_get_user_meta($author_id, 'crb_image');

$crb_facebook = carbon_get_user_meta($author_id, 'crb_facebook');
$crb_twitter = carbon_get_user_meta($author_id, 'crb_twitter');
$crb_whatsapp = carbon_get_user_meta($author_id, 'crb_whatsapp');
$crb_email = carbon_get_user_meta($author_id, 'crb_email');
$crb_instagram = carbon_get_user_meta($author_id, 'crb_instagram');
?>
<article class="content author-description">
	<section class="author-info-container flex gap-50">
		<?php if(!empty($crb_image)):?>
		<aside class="avatar">
			<img src="<?php echo wp_get_attachment_image_url($crb_image);?>" alt="">
		</aside>
		<?php endif;?>
		<aside style="width:100%;">
			<h1 class="h1"><?php echo $first_name;?> <?php echo $last_name;?></h1>
			<section class="m-t-40 flex flex-space-between">
				<div class="details">
					<div>Job title: <span><?php echo $crb_job_title;?></span></div>
					<div>Experience: <span><?php echo $crb_experience;?></span></div>
				</div>
			</section>
		</aside>
	</section>
	<div class="description"><?php echo wpautop( wp_kses_post($bio) );?></div>
	<section class="share-block flex flex-space-between flex-align-center">
		<div>How to contact:</div>
		<div class="socials gap-20">
			<?php if(!empty($crb_facebook)):?>
			<a href="<?php echo $crb_facebook;?>" target="_blank" class="facebook">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16.6234 3.00395L14.2249 3C11.5302 3 9.78878 4.8353 9.78878 7.67593V9.83184H7.37715C7.16875 9.83184 7 10.0054 7 10.2195V13.3431C7 13.5572 7.16895 13.7306 7.37715 13.7306H9.78878V21.6126C9.78878 21.8267 9.95753 22 10.1659 22H13.3124C13.5208 22 13.6896 21.8265 13.6896 21.6126V13.7306H16.5093C16.7177 13.7306 16.8865 13.5572 16.8865 13.3431L16.8876 10.2195C16.8876 10.1167 16.8478 10.0182 16.7772 9.9455C16.7066 9.87276 16.6103 9.83184 16.5103 9.83184H13.6896V8.00424C13.6896 7.12583 13.8933 6.6799 15.0073 6.6799L16.623 6.67931C16.8312 6.67931 17 6.50576 17 6.29189V3.39137C17 3.1777 16.8314 3.00435 16.6234 3.00395Z" fill="#5457FC"/>
				</svg>
			</a>
			<?php endif;?>
			<?php if(!empty($crb_twitter)):?>
			<a href="<?php echo $crb_twitter;?>" target="_blank" class="twitter">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M21 6.65642C20.3375 6.93751 19.6266 7.12814 18.8798 7.21324C19.6424 6.77597 20.2261 6.08239 20.5028 5.25847C19.7875 5.66342 18.9978 5.95746 18.1565 6.11686C17.4828 5.42866 16.5244 5 15.4615 5C13.4223 5 11.7688 6.5832 11.7688 8.53473C11.7688 8.81151 11.8014 9.08184 11.8644 9.34034C8.79601 9.19277 6.07515 7.78514 4.25412 5.64618C3.9358 6.16747 3.75471 6.77487 3.75471 7.42325C3.75471 8.64997 4.40709 9.73236 5.39692 10.3656C4.79177 10.3462 4.22262 10.1868 3.72435 9.92189V9.96605C3.72435 11.6785 4.99762 13.1077 6.68592 13.4329C6.37659 13.5126 6.05042 13.5568 5.71297 13.5568C5.47453 13.5568 5.24394 13.5342 5.01786 13.4911C5.488 14.8966 6.85127 15.9187 8.46648 15.9467C7.20333 16.8944 5.61062 17.4577 3.88071 17.4577C3.58265 17.4577 3.28906 17.4405 3 17.4093C4.63433 18.4141 6.57459 19 8.65995 19C15.4525 19 19.1655 13.6128 19.1655 8.94077L19.1531 8.48305C19.8786 7.98759 20.5062 7.3651 21 6.65642Z" fill="#5457FC"/>
				</svg>
			</a>
			<?php endif;?>
			<?php if(!empty($crb_whatsapp)):?>
			<a href="<?php echo $crb_whatsapp;?>" target="_blank" class="whatsapp">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M12 2C6.4775 2 2 6.145 2 11.2587C2 14.1725 3.45375 16.7712 5.72625 18.4688V22L9.13125 20.1313C10.04 20.3825 11.0025 20.5187 12 20.5187C17.5225 20.5187 22 16.3737 22 11.26C22 6.14625 17.5225 2 12 2ZM12.9937 14.4688L10.4475 11.7525L5.47875 14.4688L10.945 8.66625L13.5538 11.3825L18.46 8.66625L12.9937 14.4688Z" fill="#5457FC"/>
				</svg>
			</a>
			<?php endif;?>
			<?php if(!empty($crb_email)):?>
			<a href="mailto:<?php echo $crb_email;?>" target="_blank" class="email">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.53568 9.87498C5.73808 10.0178 6.34818 10.442 7.36601 11.1473C8.38388 11.8526 9.16364 12.3957 9.70531 12.7766C9.76482 12.8183 9.89126 12.9091 10.0847 13.049C10.2781 13.189 10.4389 13.3021 10.5668 13.3884C10.6948 13.4746 10.8495 13.5714 11.0312 13.6785C11.2127 13.7855 11.3839 13.866 11.5446 13.9193C11.7053 13.973 11.8541 13.9996 11.991 13.9996H12H12.009C12.1459 13.9996 12.2947 13.973 12.4555 13.9193C12.6161 13.866 12.7874 13.7854 12.9688 13.6785C13.1504 13.5712 13.3051 13.4746 13.4331 13.3884C13.5611 13.3021 13.7217 13.189 13.9152 13.049C14.1086 12.909 14.2352 12.8183 14.2947 12.7766C14.8422 12.3957 16.2352 11.4284 18.4732 9.87479C18.9077 9.57135 19.2707 9.20521 19.5624 8.77662C19.8542 8.34821 20 7.89879 20 7.4286C20 7.03569 19.8585 6.69935 19.5758 6.41962C19.293 6.13982 18.9581 6 18.5714 6H5.42851C4.97021 6 4.61751 6.15474 4.37049 6.46421C4.1235 6.77375 4 7.16066 4 7.6249C4 7.99989 4.16374 8.40625 4.49108 8.84373C4.81838 9.28123 5.16669 9.62502 5.53568 9.87498Z" fill="#5457FC"/>
				<path d="M19.107 10.8305C17.1548 12.1518 15.6725 13.1786 14.6607 13.9109C14.3215 14.1608 14.0462 14.3558 13.8349 14.4956C13.6235 14.6355 13.3424 14.7784 12.9911 14.9241C12.64 15.0701 12.3127 15.1429 12.0091 15.1429H12H11.991C11.6875 15.1429 11.36 15.0701 11.0089 14.9241C10.6578 14.7784 10.3765 14.6355 10.1652 14.4956C9.95393 14.3558 9.67861 14.1608 9.33936 13.9109C8.53574 13.3216 7.0566 12.2947 4.90188 10.8305C4.5625 10.6044 4.26191 10.3453 4 10.0537V17.1428C4 17.5359 4.13982 17.872 4.41962 18.1518C4.69935 18.4317 5.03572 18.5715 5.4286 18.5715H18.5715C18.9643 18.5715 19.3006 18.4317 19.5804 18.1518C19.8602 17.8719 20 17.5359 20 17.1428V10.0537C19.744 10.3393 19.4465 10.5984 19.107 10.8305Z" fill="#5457FC"/>
				</svg>
			</a>
			<?php endif;?>
			<?php if(!empty($crb_instagram)):?>
			<a href="<?php echo $crb_instagram;?>" target="_blank" class="instagram">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M12 3.5C14.7976 3.5 16.1968 3.50005 17.2852 3.99707C18.4884 4.54667 19.4533 5.51159 20.0029 6.71484C20.5 7.80317 20.5 9.20237 20.5 12C20.5 14.7976 20.5 16.1968 20.0029 17.2852C19.4533 18.4884 18.4884 19.4533 17.2852 20.0029C16.1968 20.5 14.7976 20.5 12 20.5C9.20237 20.5 7.80317 20.5 6.71484 20.0029C5.51159 19.4533 4.54667 18.4884 3.99707 17.2852C3.50005 16.1968 3.5 14.7976 3.5 12C3.5 9.20237 3.50005 7.80317 3.99707 6.71484C4.54667 5.51159 5.51159 4.54667 6.71484 3.99707C7.80317 3.50005 9.20237 3.5 12 3.5ZM12 7.5C9.51487 7.5 7.5 9.51487 7.5 12C7.5 14.4851 9.51487 16.5 12 16.5C14.4851 16.5 16.5 14.4851 16.5 12C16.5 9.51487 14.4851 7.5 12 7.5ZM12 9.1875C13.5503 9.1875 14.8125 10.4486 14.8125 12C14.8125 13.5503 13.5503 14.8125 12 14.8125C10.4497 14.8125 9.1875 13.5503 9.1875 12C9.1875 10.4486 10.4497 9.1875 12 9.1875ZM16.8379 6.5625C16.5067 6.56251 16.2383 6.83096 16.2383 7.16211C16.2383 7.49327 16.5067 7.76171 16.8379 7.76172C17.1691 7.76172 17.4375 7.49327 17.4375 7.16211C17.4375 6.83095 17.169 6.5625 16.8379 6.5625Z" fill="#5457FC"/>
				</svg>
			</a>
			<?php endif;?>
		</div>
	</section>
</article>
<?php else:?>
<article class="content category-description">
	<h1 class="h1"><?php echo $crb_title;?></h1>
	<div class="details m-y-50">
		<div>By: <a href="<?php echo get_author_posts_url($crb_category_author);?>"><?php echo $author->display_name;?></a></div>
		<div>Last updated: <time datetime="<?php echo date_i18n('Y-m-d', strtotime($last_modified));?>"><?php echo date_i18n('F j, Y', strtotime($last_modified));?></time></div>
	</div>
	<div class="description"><?php echo wpautop( wp_kses_post($description));?></div>
</article>
<?php endif;?>

<section class="content">
	<?php if ( have_posts() ):?>
	<?php if ( is_author() ):?>
	<h2 class="h2">Top Coloring Pages</h2>
	<?php endif;?>
	<div class="items grid grid-3-columns gap-24">
		<?php while ( have_posts() ):?>
		<?php the_post();?>
		<?php get_template_part( 'templates/content-part/content', 'post' );?>
		<?php endwhile;?>
	<?php else:?>
		<?php get_template_part( 'templates/content-part/content', 'none' );?>
	<?php endif;?>
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

<?php $crb_seo_text = carbon_get_term_meta($queried_object->term_id, 'crb_seo_text');?>
<?php if(!empty_content($crb_seo_text) && ! is_paged()):?>
<article class="seo-block-container content m-b--100 relative">
	<div class="seo-block"><?php echo apply_filters('the_content', $crb_seo_text);?></div>
</article>
<?php endif;?>
<?php get_footer(); ?>