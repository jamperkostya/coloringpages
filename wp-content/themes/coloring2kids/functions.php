<?php
/**
 * Art-IT/coloring2kids functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Art-IT/coloring2kids
 * @since Art-IT/coloring2kids 1.0
 */
if ( ! function_exists( 'theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function theme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Nineteen, use a find and replace
         * to change 'twentynineteen' to the name of your theme in all the template files.
         */
        // load_theme_textdomain( 'winbau', get_template_directory() . '/languages' );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', ['script', 'style'] );
        add_theme_support( 'menus' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo' );
        // register nav menu
        register_nav_menus( array(
            'header'	=> 'Display this menu in header',
            'footer-menu'	=> 'Display this menu in footer (menu)',
            'footer-popular-category'   => 'Display this menu in footer (Popular Category)',
            'footer-popular-pages'	=> 'Display this menu in footer (Popular Pages)',
        ) );
        
        // add new image size
        // add_image_size('product-medium', 350, 220);
        
        // remove not needed image size
        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
        
        // add custom styles
        function artit_theme_enqueue_styles() {
            // wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
            // wp_enqueue_style( 'owl-carousel-styles',	get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
            wp_enqueue_style( 'main-styles',	get_template_directory_uri() . '/assets/css/style.css?v=0.3.3' );
        }
        add_action( 'wp_enqueue_scripts',	'artit_theme_enqueue_styles' );
        
        // remove not needed files with styles
        add_action( 'wp_enqueue_scripts',     'artit_deregister_styles', 20 );
        function artit_deregister_styles() {
            wp_deregister_style( 'dashicons' );
            wp_dequeue_style( 'dashicons' );
            wp_deregister_style( 'global-styles' );
            wp_dequeue_style( 'global-styles' );
            wp_deregister_style( 'wp-block-library' );
            wp_dequeue_style( 'wp-block-library' );
            wp_deregister_style( 'classic-theme-styles' );
            wp_dequeue_style( 'classic-theme-styles' );
        }
        
        // add custom JS files
        function artit_adding_scripts() {
            // wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '0.0.1', true);
            // wp_enqueue_script('bootstrap');
            
            wp_register_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], '0.0.1', true);
            wp_enqueue_script('owl-carousel');
            
            wp_register_script('theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js?v=0.3.4', ['jquery'],'0.1.1', true);
            wp_enqueue_script('theme-scripts');

            wp_localize_script( 'theme-scripts', 'ajax_posts', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' )
            ));
         }
        
        add_action( 'wp_enqueue_scripts', 'artit_adding_scripts', 9999 );
    }
endif;

add_action( 'after_setup_theme', 'theme_setup' );

// add custom post types
require get_parent_theme_file_path( '/inc/custom-types.php' );

// add custom shortcodes
require get_parent_theme_file_path( '/inc/custom-shortcodes.php' );

// add carbon fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
        
    require_once get_template_directory() . '/inc/custom-fields.php';
}

// add alt and title for image if they (or one of them) are empty
function artit_add_img_title( $attr, $attachment = null ) {
    $img_title = trim( strip_tags( $attachment->post_title ) );
    $img_title = str_replace(['-', '_'], ' ', $img_title);
    if(empty($attr['title'])) $attr['title'] = $img_title;
    if(empty($attr['alt']))  $attr['alt'] = $img_title;
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','artit_add_img_title', 10, 2);

// add local jquery file
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
}

// disable auto p for contact form 7
// add_filter('wpcf7_autop_or_not', '__return_false');

// remove admin bar for front-end side
add_filter('show_admin_bar', '__return_false');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// REMOVE wlwmanifest.xml.
remove_action('wp_head', 'wlwmanifest_link');
// remove API links
function remove_api () {
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );

// Remove Really Simple Discovery Link
remove_action('wp_head', 'rsd_link');

add_filter('wpcf7_form_elements', function($content) {
    // $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

// dibasle auto update for theme and plugins
add_filter( 'auto_update_theme', '__return_false' );
add_filter( 'auto_update_plugin', '__return_false' );

// custom breadcrumbs
function custom_breadcrumbs() {
    $home_link   = home_url('/');
    $home_text   = 'Home';
    $delimiter   = ''; // Можно поставить ' › ' для наглядности
    $position    = 1; // Счётчик Schema.org

    $link = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
          . '<a itemprop="item" href="%1$s"><span itemprop="name">%2$s</span></a>'
          . '<meta itemprop="position" content="%3$d" /></li>';

    $current = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
             . '<span itemprop="name">%1$s</span>'
             . '<meta itemprop="position" content="%2$d" /></li>';

    $breadcrumb_trail = '';
    $page_addon       = '';

    global $wp_the_query;
    $queried_object = $wp_the_query->get_queried_object();

    // Singular
    if ( is_singular() && $queried_object instanceof WP_Post ) {
        $post_object = sanitize_post( $queried_object );
        $title       = apply_filters( 'the_title', $post_object->post_title );
        $parent      = $post_object->post_parent;
        $post_type   = $post_object->post_type;
        $post_id     = $post_object->ID;
        $parent_str  = '';
        $type_link   = '';
        $cat_links   = '';

        // категории
        if ( in_array( $post_type, ['post','game'] ) ) {
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                $category = $categories[0];
                $parents  = get_ancestors( $category->term_id, 'category' );
                $parents  = array_reverse( $parents );
                foreach ( $parents as $cat_id ) {
                    $position++;
                    $breadcrumb_trail .= sprintf( 
                        $link,
                        esc_url( get_category_link($cat_id) ),
                        esc_html( get_cat_name($cat_id) ),
                        $position
                    );
                }
                $position++;
                $breadcrumb_trail .= sprintf(
                    $link,
                    esc_url( get_category_link($category->term_id) ),
                    esc_html( $category->name ),
                    $position
                );
            }
        }

        // custom post type
        if ( !in_array( $post_type, ['post','page','attachment','blog'] ) ) {
            $obj = get_post_type_object( $post_type );
            if ( $obj && $obj->has_archive ) {
                $position++;
                $breadcrumb_trail .= sprintf(
                    $link,
                    esc_url( get_post_type_archive_link( $post_type ) ),
                    esc_html( $obj->labels->singular_name ),
                    $position
                );
            }
        }

        // родители поста
        if ( $parent ) {
            $parents = [];
            while ( $parent ) {
                $post_parent = get_post( $parent );
                $parents[]   = $post_parent;
                $parent      = $post_parent->post_parent;
            }
            $parents = array_reverse( $parents );
            foreach ( $parents as $p ) {
                $position++;
                $breadcrumb_trail .= sprintf(
                    $link,
                    esc_url( get_permalink( $p->ID ) ),
                    esc_html( get_the_title( $p->ID ) ),
                    $position
                );
            }
        }

        // текущий пост
        $position++;
        $breadcrumb_trail .= sprintf( $current, esc_html( $title ), $position );
    }

    // Archive
    elseif ( is_archive() ) {
        if ( is_category() || is_tag() || is_tax() ) {
            $term = $queried_object;
            if ( $term && isset($term->term_id) ) {
                if ( $term->parent ) {
                    $parents = get_ancestors( $term->term_id, $term->taxonomy );
                    $parents = array_reverse( $parents );
                    foreach ( $parents as $term_id ) {
                        $t = get_term( $term_id, $term->taxonomy );
                        $position++;
                        $breadcrumb_trail .= sprintf(
                            $link,
                            esc_url( get_term_link($t) ),
                            esc_html( $t->name ),
                            $position
                        );
                    }
                }
                $position++;
                $breadcrumb_trail .= sprintf( $current, esc_html( $term->name ), $position );
            }
        }
        elseif ( is_author() ) {
            $position++;
            $breadcrumb_trail = sprintf( $current, sprintf(__('Author: %s'), esc_html($queried_object->data->display_name) ), $position );
        }
        elseif ( is_date() ) {
            if ( is_year() ) {
                $position++;
                $breadcrumb_trail = sprintf( $current, get_query_var('year'), $position );
            } elseif ( is_month() ) {
                $position++;
                $breadcrumb_trail = sprintf(
                    $link,
                    esc_url( get_year_link( get_query_var('year') ) ),
                    get_query_var('year'),
                    $position
                );
                $position++;
                $breadcrumb_trail .= sprintf( $current, date_i18n( 'F', mktime(0,0,0,get_query_var('monthnum')) ), $position );
            } elseif ( is_day() ) {
                $year  = get_query_var('year');
                $month = get_query_var('monthnum');
                $position++;
                $breadcrumb_trail = sprintf( $link, esc_url( get_year_link($year) ), $year, $position );
                $position++;
                $breadcrumb_trail .= sprintf( $link, esc_url( get_month_link($year, $month) ), date_i18n('F', mktime(0,0,0,$month)), $position );
                $position++;
                $breadcrumb_trail .= sprintf( $current, get_query_var('day'), $position );
            }
        }
        elseif ( is_post_type_archive() ) {
            $obj = get_post_type_object( get_query_var('post_type') );
            $position++;
            $breadcrumb_trail = sprintf( $current, $obj->labels->singular_name, $position );
        }
    }

    // Search
    elseif ( is_search() ) {
        $position++;
        $breadcrumb_trail = sprintf( $current, sprintf(__('Search: %s'), get_search_query()), $position );
    }

    // 404
    elseif ( is_404() ) {
        $position++;
        $breadcrumb_trail = sprintf( $current, __('Error 404'), $position );
    }

    // Страницы пагинации
    if ( is_paged() ) {
        $current_page = max( get_query_var('paged'), get_query_var('page') );
        $position++;
        $breadcrumb_trail .= sprintf( $current, sprintf(__('Page %s'), $current_page), $position );
    }

    // Output
    $out  = '<ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumbs p-b-30">';
    if ( !is_home() && !is_front_page() ) {
        $out .= sprintf(
            $link,
            $home_link,
            $home_text,
            $position
        );
        $out .= $delimiter . $breadcrumb_trail;
    }
    $out .= '</ul>';

    return $out;
}
add_shortcode('custom_breadcrumbs','custom_breadcrumbs');


// add custom JS code to footer
add_action( 'wp_footer', 'artit_wp_footer' );
function artit_wp_footer() {
?>
<!-- <script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '6' == event.detail.contactFormId ) { // Change 123 to the ID of the form 
        jQuery('#consulting').modal('hide');
        jQuery('#thankyou').modal('show'); //this is the bootstrap modal popup id       
    }
}, false );
</script> -->
<?php }?>
<?php 
// add table button for TINY MCE
function add_the_table_button( $buttons ) {
    array_push( $buttons, 'separator', 'table' );
    return $buttons;
}
add_filter( 'mce_buttons', 'add_the_table_button' );

// add TINY MCE table plugin
function add_the_table_plugin( $plugins ) {
    $plugins['table'] = get_template_directory_uri().'/assets/js/tiny_mce_table.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );

//DEFER js
// function add_defer_attribute_to_scripts($tag, $handle, $src) {
    // Пропускаем скрипты, которые начинаются с 'jquery', чтобы не нарушать зависимости jQuery
    // if (strpos($handle, 'jquery') === 0 || is_admin() ) {
        // return $tag;
    // }
    // Добавляем атрибут defer ко всем остальным скриптам
    // return str_replace('<script ', '<script defer ', $tag);
// }
// add_filter('script_loader_tag', 'add_defer_attribute_to_scripts', 10, 3);

// register multilanguage variables (polylang)
// if (function_exists('pll_register_string')) {
//     add_action('init', function () {
//         // pll_register_string('page', '');
//     });
// }

// add own class for custom logo
add_filter( 'get_custom_logo', 'add_class_to_custom_logo' );
function add_class_to_custom_logo()
{
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>', esc_url( home_url( '/' ) ), wp_get_attachment_image( $custom_logo_id, 'full', false, ['class' => 'custom-logo']));
    return $html;   
}

// add lightbox rel for image's link
// add_filter('the_content', 'addlightboxrel');
// function addlightboxrel($content) {
//     global $post;
//     $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
//     $replacement = '<a$1href=$2$3.$4$5 data-lightbox="image-set"$6>';
//     $content = preg_replace($pattern, $replacement, $content);
//     return $content;
// }

// check if content is empty
function empty_content($str) {
    return trim(str_replace('&nbsp;','',strip_tags($str,'<img>'))) == '';
}

// // Регистрируем действие для AJAX
// function load_more_posts() {
//     $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
//     $taxonomy = isset($_GET['taxonomy']) ? htmlspecialchars($_GET['taxonomy']) : 'cat';
//     $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//     $post_type = isset($_GET['post_type']) ? htmlspecialchars($_GET['post_type']) : 'post';
//     
//     $args = array(
//         'post_type'      => $post_type,
//         'posts_per_page' => get_option('posts_per_page'),
//         'paged'          => $page,
//         'tax_query'      => array(
//             array(
//                 'taxonomy' => $taxonomy,
//                 'field'    => 'term_id',
//                 'terms'    => $category_id
//             )
//         )
//     );
//     // Запрос к базе данных
//     $query = new WP_Query($args);
// 
//     // Если есть посты
//     if ($query->have_posts()) {
//         $posts = '';
//     
//         while ($query->have_posts()) {
//             $query->the_post();
//             ob_start();
//             get_template_part( 'templates/content-part/content', $post_type );
//             $posts .= ob_get_clean();
//         }
//     
//         // Проверка, есть ли еще посты для подгрузки
//         $has_more_posts = $query->max_num_pages > $page;
//     
//         // Ответ
//         wp_send_json([
//             'posts' => $posts,
//             'has_more_posts' => $has_more_posts
//         ]);
//     } else {
//         // Если постов нет
//         wp_send_json([
//             'posts' => '',
//             'has_more_posts' => false
//         ]);
//     }
//     
//     // Завершаем выполнение запроса
//     wp_die();
// }
// 
// // Хук для регистрации обработчика AJAX
// add_action('wp_ajax_load_posts', 'load_more_posts'); // Для авторизованных пользователей
// add_action('wp_ajax_nopriv_load_posts', 'load_more_posts'); // Для неавторизованных пользователей
// 
function ajax_search_handler() {
    if (!isset($_GET['search']) || empty($_GET['search'])) {
        wp_send_json(
            [
                'status' => 'error',
                'message' => 'Введите минимум 3 символа'
            ]
        );
    }

    $query = sanitize_text_field($_GET['search']);

    $args = array(
        'posts_per_page' => 5,
        's'             => $query,
        'post_status' => 'publish',
    );

    $search_query = new WP_Query($args);

    if ($search_query->have_posts()) :
        $response['status'] = 'success';
        while ($search_query->have_posts()) : $search_query->the_post();
            $response['results'][] = [
                'title' => get_the_title(),
                'link' => get_permalink(),
            ];
        endwhile;
        $response['message'] = 'Found '.$search_query->post_count.' games by query: '.$query;
    else :
        $response['status'] = 'error';
        $response['message'] = 'Nothing found';
    endif;
    wp_send_json($response);
    wp_die();
}

add_action('wp_ajax_ajax_search', 'ajax_search_handler');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search_handler');
// 
// function custom_excerpt_more($more) {
//     return '... <span class="read-more-text">Read More</span>';
// }
// add_filter('excerpt_more', 'custom_excerpt_more');

// Удаление /category/ из URL категории
add_filter('category_rewrite_rules', function ($category_rewrite) {
    $category_rewrite = [];
    $categories = get_categories(['hide_empty' => false]);

    foreach ($categories as $category) {
        $slug = $category->slug;
        if ($category->parent == 0) {
            $category_rewrite["{$slug}/?$"] = "index.php?category_name={$slug}";
            $category_rewrite["{$slug}/page/?([0-9]{1,})/?$"] = "index.php?category_name={$slug}&paged=\$matches[1]";
        } else {
            $parents = get_category_parents($category->term_id, false, '/', true);
            $parents = str_replace('/', '', $parents);
            $category_rewrite["{$parents}/?$"] = "index.php?category_name={$parents}";
            $category_rewrite["{$parents}/page/?([0-9]{1,})/?$"] = "index.php?category_name={$parents}&paged=\$matches[1]";
        }
    }

    return $category_rewrite;
});
// Удаление base 'category' из URL
add_filter('request', function ($query_vars) {
    if (isset($query_vars['category_name']) && strpos($query_vars['category_name'], 'category/') === 0) {
        $query_vars['category_name'] = str_replace('category/', '', $query_vars['category_name']);
    }
    return $query_vars;
});

// Обновляем правила при активации темы
add_action('init', function () {
    global $wp_rewrite;
    $wp_rewrite->extra_permastructs['category']['struct'] = '%category%';
});

// добавляем дату изменения категории (term)
add_action('edited_category', 'save_category_last_modified', 10, 2);
add_action('created_category', 'save_category_last_modified', 10, 2);
function save_category_last_modified($term_id, $tt_id) {
    update_term_meta($term_id, 'last_modified', current_time('mysql'));
}

// выводим посты по алфавиту
add_action('pre_get_posts', 'sort_posts_alphabetically');
function sort_posts_alphabetically($query) {
    if (!is_admin() ) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}

// Регистрируем AJAX-обработчик для всех (авторизованных и нет)
add_action('wp_ajax_nopriv_toggle_attachment_like', 'toggle_attachment_like');
add_action('wp_ajax_toggle_attachment_like', 'toggle_attachment_like');

function toggle_attachment_like() {
    $attachment_id = intval($_POST['attachment_id']);

    if (!$attachment_id || get_post_type($attachment_id) !== 'attachment') {
        wp_send_json_error('Неверный ID');
    }

    // Уникальный ключ для куки
    $cookie_key = 'liked_attachment_' . $attachment_id;

    // Получаем текущее число лайков
    $likes = (int) get_post_meta($attachment_id, '_likes', true);

    if (isset($_COOKIE[$cookie_key])) {
        // Уже лайкали — убираем лайк
        $likes = max(0, $likes - 1);
        delete_post_meta($attachment_id, '_likes');
        update_post_meta($attachment_id, '_likes', $likes);
        setcookie($cookie_key, '', time() - 3600, '/');
        wp_send_json_success(['liked' => false, 'likes' => $likes]);
    } else {
        // Лайк
        $likes++;
        update_post_meta($attachment_id, '_likes', $likes);
        setcookie($cookie_key, '1', time() + 3600 * 24 * 365, '/');
        wp_send_json_success(['liked' => true, 'likes' => $likes]);
    }
}

add_filter('wp_dropdown_users_args', function($query_args, $r) {
    // Исключаем администраторов из выпадающего списка выбора автора
    $query_args['role__not_in'] = ['Administrator'];
    return $query_args;
}, 10, 2);


// Количество элементов в текущем посте
function yoast_var_post_count() {
    if ( ! function_exists('carbon_get_post_meta') ) {
        return 0;
    }
    $crb_coloring = carbon_get_post_meta( get_the_ID(), 'crb_coloring' );
    return is_array( $crb_coloring ) ? count( $crb_coloring ) : 0;
}

// Общее количество элементов по всем постам
function yoast_var_total_count() {
    if ( ! function_exists('carbon_get_post_meta') ) {
        return 0;
    }

    // Кэшируем результат (чтобы не грузить базу каждый раз)
    $cache_key = 'yoast_total_coloring_count';
    $cached    = wp_cache_get( $cache_key, 'yoast' );
    if ( false !== $cached ) {
        return $cached;
    }

    $args = [
        'post_type'      => 'post', // замени на свой кастомный тип, если нужно
        'post_status'    => 'publish',
        'fields'         => 'ids',
        'nopaging'       => true,
    ];

    $post_ids = get_posts( $args );

    $total = 0;
    foreach ( $post_ids as $post_id ) {
        $crb_coloring = carbon_get_post_meta( $post_id, 'crb_coloring' );
        if ( is_array( $crb_coloring ) ) {
            $total += count( $crb_coloring );
        }
    }

    // Кэшируем на 10 минут
    wp_cache_set( $cache_key, $total, 'yoast', 600 );

    return $total;
}

// Регистрируем переменные для Yoast SEO
add_action( 'wpseo_register_extra_replacements', function () {
    wpseo_register_var_replacement(
        '%%post_count%%',
        'yoast_var_post_count',
        'advanced',
        'Количество элементов в текущем посте'
    );

    wpseo_register_var_replacement(
        '%%total_count%%',
        'yoast_var_total_count',
        'advanced',
        'Общее количество элементов по всем постам'
    );
});

// Добавляем placeholder в поля формы комментариев
function my_custom_comment_placeholders($fields) {
    
    // Placeholder для имени
    if(isset($fields['author'])) {
        $fields['author'] = str_replace(
            '<input', 
            '<input placeholder="Name *"', 
            $fields['author']
        );
    }

    // Placeholder для email
    if(isset($fields['email'])) {
        $fields['email'] = str_replace(
            '<input', 
            '<input placeholder="Your e-mail *"', 
            $fields['email']
        );
    }

    // Placeholder для сайта (если есть)
    if(isset($fields['url'])) {
        $fields['url'] = str_replace(
            '<input', 
            '<input placeholder="Ваш сайт (необязательно)"', 
            $fields['url']
        );
    }

    return $fields;
}
add_filter('comment_form_default_fields', 'my_custom_comment_placeholders');


// Добавляем placeholder для самого комментария
function my_custom_comment_textarea_placeholder($args) {
    $args['comment_field'] = str_replace(
        '<textarea', 
        '<textarea placeholder="Comment"', 
        $args['comment_field']
    );
    return $args;
}
add_filter('comment_form_defaults', 'my_custom_comment_textarea_placeholder');

add_action( 'template_redirect', function() {
    if ( user_can( get_the_author_meta('ID'), 'administrator') ) {
        // 404:
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();
        include( get_404_template() );
        exit;
    }
});

// Убираем стандартное поле "Biographical Info"
remove_filter( 'user_description', 'wp_filter_kses' );
remove_filter( 'pre_user_description', 'wp_filter_kses' );
// Скрываем стандартное поле "Biographical Info" через CSS
function hide_default_bio_field() {
    echo '<style>
        #description { display: none; }
    </style>';
}
add_action( 'admin_head-user-edit.php', 'hide_default_bio_field' );
add_action( 'admin_head-profile.php', 'hide_default_bio_field' );
// Добавляем свой визуальный редактор для Biographical Info
function my_custom_user_bio_editor( $user ) {
    ?>
    <h3><?php _e("Biographical Info", "textdomain"); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="description_editor"><?php _e("Biographical Info", "textdomain"); ?></label></th>
            <td>
                <?php
                $content   = get_the_author_meta( 'description', $user->ID );
                $editor_id = 'description_editor';
                $settings  = array(
                    'textarea_name' => 'description', // важно для сохранения
                    'media_buttons' => false,
                    'textarea_rows' => 10,
                    'teeny'         => true,
                );
                wp_editor( $content, $editor_id, $settings );
                ?>
            </td>
        </tr>
    </table>
    <?php
}
add_action( 'show_user_profile', 'my_custom_user_bio_editor' );
add_action( 'edit_user_profile', 'my_custom_user_bio_editor' );

// Сохраняем данные
function my_save_custom_user_bio_editor( $user_id ) {
    if ( current_user_can( 'edit_user', $user_id ) && isset($_POST['description']) ) {
        update_user_meta( $user_id, 'description', wp_kses_post($_POST['description']) );
    }
}
add_action( 'personal_options_update', 'my_save_custom_user_bio_editor' );
add_action( 'edit_user_profile_update', 'my_save_custom_user_bio_editor' );

// PHP функция для увеличения счётчика
function increase_attachment_open_count($attachment_id) {
    $attachment_id = intval($attachment_id);
    if ($attachment_id <= 0) return false;

    $count = (int) get_post_meta($attachment_id, '_open_count', true);
    update_post_meta($attachment_id, '_open_count', $count + 1);

    return $count + 1;
}

// AJAX обработчик для JS
add_action('wp_ajax_track_attachment_click', 'ajax_track_attachment_click');
add_action('wp_ajax_nopriv_track_attachment_click', 'ajax_track_attachment_click');

function ajax_track_attachment_click() {
    if (!isset($_POST['attachment_id'])) {
        wp_send_json_error('No attachment ID');
    }

    $new_count = increase_attachment_open_count($_POST['attachment_id']);
    wp_send_json_success(['new_count' => $new_count]);
}
function add_all_posts_menu_items($items, $args = null) {
    if (!$args || !isset($args->theme_location) || $args->theme_location !== 'header') {
        return $items;
    }

    foreach ($items as $item) {
        // пропускаем уже добавленный "All posts"
        if (in_array('menu-item-all-posts', $item->classes, true)) {
            continue;
        }

        // ищем детей у текущего пункта
        $children = array_filter($items, function ($i) use ($item) {
            return $i->menu_item_parent == $item->ID;
        });

        if (!empty($children) && $item->object === 'category') {
            // ищем максимальный order среди детей
            $max_order = max(array_map(function ($i) {
                return $i->menu_order;
            }, $children));

            // создаём новый пункт меню "All posts"
            $all_posts_item = new \stdClass();
            $all_posts_item->ID = rand(100000, 999999); // уникальный ID
            $all_posts_item->title = 'All posts';
            $all_posts_item->url = get_category_link($item->object_id);
            $all_posts_item->menu_item_parent = $item->ID;
            $all_posts_item->classes = ['menu-item', 'menu-item-all-posts'];
            $all_posts_item->type = '';
            $all_posts_item->object = '';
            $all_posts_item->object_id = 0;
            $all_posts_item->menu_order = $max_order + 1; // ставим его последним

            $items[] = $all_posts_item;
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'add_all_posts_menu_items', 10, 2);
// Убираем RSS ссылки из <head>
remove_action('wp_head', 'feed_links', 2);        // Основные RSS ссылки
remove_action('wp_head', 'feed_links_extra', 3);  // RSS для категорий, тегов и т.д.
// Убираем shortlink из <head>
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);