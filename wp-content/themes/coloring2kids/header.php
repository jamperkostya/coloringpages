<?php
/**
* The header.
*
* This is the template that displays all of the <head> section and everything up until main.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty-One 1.0
*/

?>
<!doctype html>
<html lang="de">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if( is_single() && 'post' === get_post_type() ):?>
        <link rel="preload" as="image" href="<?=get_the_post_thumbnail_url();?>" fetchpriority="high">
        <?php endif;?>
        <?php wp_head(); ?>

        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri();?>/assets/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri();?>/assets/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#fff">
        <meta name="google-site-verification" content="OwJrttHaZm_ddJMvAnneWo7ytt-nQxwFPT0x7inmwJs" />
        <script type="application/ld+json">
        [
            {
                "@context": "https://schema.org",
                "@type": "Organization",
                "@id": "https://coloring2kids.xyz/#organization",
                "name": "Coloring2Kids",
                "url": "https://coloring2kids.xyz/",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://coloring2kids.xyz/wp-content/uploads/2025/04/Group-21.png"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "contactType": "customer support",
                    "url": "https://coloring2kids.xyz/takedown-richtlinie/"
                }
            }
        ]
        </script>
    </head>
    <body <?php body_class(); ?>>
        <header class="header fixed flex flex-align-center">
            <section class="container grid relative">
                <?php echo add_class_to_custom_logo();?>
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'menu flex flex-space-between gap-20 flex-align-center'
                ]);?>
                <aside class="search-form-contaienr flex flex-align-center gap-20">
                    <form method="get" action="/" class="header-search-form flex">
                        <button class="search-submit">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 25L18.8702 18.8702M18.8702 18.8702C20.3406 17.3999 21.25 15.3687 21.25 13.125C21.25 8.63769 17.6123 5 13.125 5C8.63769 5 5 8.63769 5 13.125C5 17.6123 8.63769 21.25 13.125 21.25C15.3687 21.25 17.3999 20.3406 18.8702 18.8702Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <input type="text" name="s" placeholder="Search" class="search-input">
                    </form>
                </aside>
                <aside class="burger-menu">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </aside>
            </section>
        </header>
        <?php if(is_front_page()):?>
        <?php get_template_part('templates/section/header', 'main');?>
        <?php endif;?>
        <main role="main" class="main-container container m-t-110">