<?php
// create custom post type - blog
function create_blog_post_type() {
	$labels = [
		'name'               => _x( 'Blog', 'post type general name', '' ),
		'singular_name'      => _x( 'Blog', 'post type singular name', '' ),
		'menu_name'          => _x( 'Blog', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Add blog entry', 'add new on admin bar', '' ),
		'add_new'            => _x( 'Add New', '', '' ),
		'add_new_item'       => __( 'Add New blog entry', '' ),
		'new_item'           => __( 'New blog entry', '' ),
		'edit_item'          => __( 'Edit blog entry', '' ),
		'view_item'          => __( 'View blog entry', '' ),
		'all_items'          => __( 'All blogs', '' ),
		'search_items'       => __( 'Search blogs', '' ),
		'parent_item_colon'  => __( 'Parent blogs:', '' ),
		'not_found'          => __( 'No blogs found.', '' ),
		'not_found_in_trash' => __( 'No blogs in Trash.', '' )
	];
	$args = [
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-awards',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => ['title', 'editor', 'author', 'thumbnail'],
		'rewrite'            => ['slug' => 'blog', 'with_front' => false],
	];

	register_post_type( 'blog', $args );
}
add_action( 'init', 'create_blog_post_type', 0 );

// create taxonomy - provider for custom_post_type - blog
// function create_game_taxonomy() {
// 	$labels = [
// 		'name'              => _x('Providers', 'taxonomy general name'),
// 		'singular_name'     => _x('Provider', 'taxonomy singular name'),
// 		'search_items'      => __('Search Provider'),
// 		'all_items'         => __('All providers'),
// 		'parent_item'       => __('Parent provider'),
// 		'parent_item_colon' => __('Parent provider:'),
// 		'edit_item'         => __('Edit provider'),
// 		'update_item'       => __('Update provider'),
// 		'add_new_item'      => __('Add New provider'),
// 		'new_item_name'     => __('New provider'),
// 		'menu_name'         => __('Provider'),
// 	];
// 	$args = [
// 		'hierarchical'      => true, // Make it hierarchical (like categories)
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'rewrite'      => ['slug' => 'provider', 'with_front' => false],
// 	];
// 	register_taxonomy('provider', 'game', $args);
// }
// add_action('init', 'create_game_taxonomy');

// create taxonomy - provider for custom_post_type - game
// function create_game_category_taxonomy() {
// 	$labels = [
// 		'name'              => _x('Categories', 'taxonomy general name'),
// 		'singular_name'     => _x('Categories', 'taxonomy singular name'),
// 		'search_items'      => __('Search category'),
// 		'all_items'         => __('All categories'),
// 		'parent_item'       => __('Parent category'),
// 		'parent_item_colon' => __('Parent category:'),
// 		'edit_item'         => __('Edit category'),
// 		'update_item'       => __('Update category'),
// 		'add_new_item'      => __('Add New category'),
// 		'new_item_name'     => __('New category'),
// 		'menu_name'         => __('Category'),
// 	];
// 	$args = [
// 		'hierarchical'      => true, // Make it hierarchical (like categories)
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'rewrite'      => ['slug' => 'games', 'with_front' => false],
// 	];
// 	register_taxonomy('games', 'game', $args);
// }
// add_action('init', 'create_game_category_taxonomy');

// create custom post type - help
// function create_help_post_type() {
// 	$labels = [
// 		'name'               => _x( 'Help', 'post type general name', '' ),
// 		'singular_name'      => _x( 'Help', 'post type singular name', '' ),
// 		'menu_name'          => _x( 'Help', 'admin menu', '' ),
// 		'name_admin_bar'     => _x( 'Add game', 'add new on admin bar', '' ),
// 		'add_new'            => _x( 'Add New', 'bonus fara depunere', '' ),
// 		'add_new_item'       => __( 'Add New help', '' ),
// 		'new_item'           => __( 'New help', '' ),
// 		'edit_item'          => __( 'Edit help', '' ),
// 		'view_item'          => __( 'View help', '' ),
// 		'all_items'          => __( 'All help', '' ),
// 		'search_items'       => __( 'Search help', '' ),
// 		'parent_item_colon'  => __( 'Parent help:', '' ),
// 		'not_found'          => __( 'No help found.', '' ),
// 		'not_found_in_trash' => __( 'No help in Trash.', '' )
// 	];
// 	$args = [
// 		'labels'             => $labels,
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'query_var'          => true,
// 		'menu_icon'          => 'dashicons-awards',
// 		'capability_type'    => 'post',
// 		'has_archive'        => false,
// 		'hierarchical'       => false,
// 		'menu_position'      => null,
// 		'supports'           => ['title', 'editor', 'author', 'excerpt'],
// 		'rewrite'            => ['slug' => 'help-center/%help-center%', 'with_front' => false],
// 		'taxonomies'         => ['help-center'],
// 	];
// 
// 	register_post_type( 'help', $args );
// }
// add_action( 'init', 'create_help_post_type', 0 );
// 
// // create taxonomy - provider for custom_post_type - game
// function create_help_category_taxonomy() {
// 	$labels = [
// 		'name'              => _x('Categories', 'taxonomy general name'),
// 		'singular_name'     => _x('Categories', 'taxonomy singular name'),
// 		'search_items'      => __('Search category'),
// 		'all_items'         => __('All categories'),
// 		'parent_item'       => __('Parent category'),
// 		'parent_item_colon' => __('Parent category:'),
// 		'edit_item'         => __('Edit category'),
// 		'update_item'       => __('Update category'),
// 		'add_new_item'      => __('Add New category'),
// 		'new_item_name'     => __('New category'),
// 		'menu_name'         => __('Category'),
// 	];
// 	$args = [
// 		'hierarchical'      => true, // Make it hierarchical (like categories)
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'rewrite'           => ['slug' => 'help-center', 'with_front' => false],
// 	];
// 	register_taxonomy('help-center', 'help', $args);
// }
// add_action('init', 'create_help_category_taxonomy');
// 
// // Установка пользовательского URL для записей типа custom_post_type
// function custom_permalink($permalink, $post) {
// 	if ($post->post_type == 'game') {
// 		$terms = wp_get_post_terms($post->ID, 'games');
// 		if (!empty($terms) && !is_wp_error($terms)) {
// 			$category_slug = $terms[0]->slug;
// 			return home_url('/game/' . $category_slug . '/' . $post->post_name . '/');
// 		}
// 	}
// 	elseif($post->post_type=='help')
// 	{
// 		$terms = wp_get_post_terms($post->ID, 'help-center');
// 		if (!empty($terms) && !is_wp_error($terms)) {
// 			$category_slug = $terms[0]->slug;
// 			return home_url('/help-center/' . $category_slug . '/' . $post->post_name . '/');
// 		}
// 	}
// 	return $permalink;
// }
// add_filter('post_type_link', 'custom_permalink', 10, 2);
// 
// 
// // Кастомные правила перезаписи для корректного отображения URL
// function custom_crewrite_rules() {
// 	add_rewrite_tag('%provider%', '([^&]+)');
// 	add_rewrite_rule(
// 		'^game\/([^/]+)/([^/]+)/?$',
// 		'index.php?post_type=game&name=$matches[2]',
// 		'top'
// 	);
// 	
// 	add_rewrite_tag('%games%', '([^&]+)');
// 	add_rewrite_rule(
// 		'^games\/([^/]+)/([^/]+)/?$',
// 		'index.php?post_type=game&name=$matches[2]',
// 		'top'
// 	);
// }
// add_action('init', 'custom_crewrite_rules');

// Register Custom Post Type - Services
// function services_post_type() {
// 	$labels = array(
// 		'name'                  => __( 'Services', 'Post Type General Name', '{domain}' ),
// 		'singular_name'         => __( 'Service', 'Post Type Singular Name', '{domain}' ),
// 		'menu_name'             => __( 'Services', '{domain}' ),
// 		'name_admin_bar'        => __( 'Services', '{domain}' ),
// 		'parent_item_colon'     => __( 'Parent Item:', '{domain}' ),
// 		'add_new_item'          => __( 'Add New Item', '{domain}' ),
// 		'add_new'               => __( 'Add New', '{domain}' ),
// 		'edit_item'             => __( 'Edit', '{domain}' ),
// 		'update_item'           => __( 'Update', '{domain}' ),
// 	);
// 	$template = array(
// 		array( 'core/image', array(
// 			'align' => 'left',
// 		) ),
// 		array( 'core/heading', array(
// 			'placeholder' => 'Add Author...',
// 		) ),
// 		// Allow a Paragraph block to be moved or removed.
// 		array( 'core/paragraph', array(
// 			'placeholder' => 'Add Description...',
// 			'lock' => array(
// 				'move'   => false,
// 				'remove' => false,
// 			),
// 		) ),
// 	);
// 
// 	$args = array(
// 		'label'                 => __( 'Services', '{domain}' ),
// 		'labels'                => $labels,
// 		'supports'              => array( 'title', 'thumbnail', 'editor'),
// 		'taxonomies'            => array( 'category' ),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 4,
// 		'menu_icon'             => 'dashicons-welcome-learn-more',
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		'has_archive'           => false,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'capability_type'       => 'post',
// 		'template'				=> $template,
// 		'show_in_rest'			=> true
// 	);
// 	register_post_type( 'service', $args );
// 
// }
// add_action( 'init', 'services_post_type', 0 );
// Register Custom Post Type - Services


// create create_bonus_fara_depunere_post_type
// function create_bonus_fara_depunere_post_type() {
// 	$labels = array(
// 		'name'               => _x( 'Bonus Fara Depunere', 'post type general name', '' ),
// 		'singular_name'      => _x( 'Bonus Fara Depunere', 'post type singular name', '' ),
// 		'menu_name'          => _x( 'Bonus Fara Depunere', 'admin menu', '' ),
// 		'name_admin_bar'     => _x( 'Bonus Fara Depunere', 'add new on admin bar', '' ),
// 		'add_new'            => _x( 'Add New', 'bonus fara depunere', '' ),
// 		'add_new_item'       => __( 'Add New Bonus Fara Depunere', '' ),
// 		'new_item'           => __( 'New Bonus Fara Depunere', '' ),
// 		'edit_item'          => __( 'Edit Bonus Fara Depunere', '' ),
// 		'view_item'          => __( 'View Bonus Fara Depunere', '' ),
// 		'all_items'          => __( 'All Bonuses Fara Depunere', '' ),
// 		'search_items'       => __( 'Search Bonuses Fara Depunere', '' ),
// 		'parent_item_colon'  => __( 'Parent Bonuses Fara Depunere:', '' ),
// 		'not_found'          => __( 'No Bonuses Fara Depunere found.', '' ),
// 		'not_found_in_trash' => __( 'No Bonuses Fara Depunere found in Trash.', '' )
// 	);
// 
// 	$args = array(
// 		'labels'             => $labels,
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'query_var'          => true,
// 		'menu_icon'          => 'dashicons-awards',
// 		'capability_type'    => 'post',
// 		'has_archive'        => true,
// 		'hierarchical'       => false,
// 		'menu_position'      => null,
// 		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
// 		'rewrite'            => array('slug' => 'bonus-fara-depunere', 'with_front' => false),
// 		'taxonomies'         => array('bonus_fara_category'),
// 	);
// 
// 	register_post_type( 'bonus-fara-depunere', $args );
// }
// add_action( 'init', 'create_bonus_fara_depunere_post_type' );
// 
// function create_bonus_fara_taxonomy() {
// 	$labels = array(
// 		'name'              => _x('Bonus Fara Depunere categories', 'taxonomy general name'),
// 		'singular_name'     => _x('Bonus Fara Depunere category', 'taxonomy singular name'),
// 		'search_items'      => __('Search Bonus Fara Depunere Categories'),
// 		'all_items'         => __('All Bonus Fara Depunere Categories'),
// 		'parent_item'       => __('Parent Bonus Fara Depunere Category'),
// 		'parent_item_colon' => __('Parent Bonus Fara Depunere Category:'),
// 		'edit_item'         => __('Edit Bonus Fara Depunere Category'),
// 		'update_item'       => __('Update Bonus Fara Depunere Category'),
// 		'add_new_item'      => __('Add New Bonus Fara Depunere Category'),
// 		'new_item_name'     => __('New Bonus Fara Depunere Category Name'),
// 		'menu_name'         => __('Bonus Fara Depunere Category'),
// 	);
// 
// 	$args = array(
// 		'hierarchical'      => true, // Make it hierarchical (like categories)
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'rewrite'           => array('slug' => 'bonus-fara-depunere'), // This will prepend the custom post type slug
// 		'rewrite'      => array('slug' => 'bonus_fara_category', 'with_front' => false),
// 	);
// 
// 	register_taxonomy('bonus_fara_category', 'bonus-fara-depunere', $args);
// }
// add_action('init', 'create_bonus_fara_taxonomy');
// create create_bonus_fara_depunere_post_type

// Установка пользовательского URL для  записей типа custom_post_type
// function custom_permalink($permalink, $post) {
// 	if ($post->post_type == 'cazinouri-online') {
// 		$terms = wp_get_post_terms($post->ID, 'cazinouri_category');
// 		if (!empty($terms) && !is_wp_error($terms)) {
// 			$category_slug = $terms[0]->slug;
// 			return home_url('/cazinouri-online-' . $category_slug . '/' . $post->post_name . '/');
// 		}
// 	}
// 	elseif ($post->post_type == 'bonus-fara-depunere') {
// 		$terms = wp_get_post_terms($post->ID, 'bonus_fara_category');
// 		if (!empty($terms) && !is_wp_error($terms)) {
// 			$category_slug = $terms[0]->slug;
// 			return home_url('/bonus-fara-depunere-' . $category_slug . '/' . $post->post_name . '/');
// 		}
// 	}
// 	return $permalink;
// }
// add_filter('post_type_link', 'custom_permalink', 10, 2);
// Кастомные правила перезаписи для корректного отображения URL
// function custom_crewrite_rules() {
// 	add_rewrite_tag('%cazinouri_category%', '([^&]+)');
// 	add_rewrite_rule(
// 		'^cazinouri-online-([^/]+)/([^/]+)/?$',
// 		'index.php?post_type=cazinouri-online&name=$matches[2]',
// 		'top'
// 	);
// 	add_rewrite_tag('%bonus_fara_category%', '([^&]+)');
// 	add_rewrite_rule(
// 		'^bonus-fara-depunere-([^/]+)/([^/]+)/?$',
// 		'index.php?post_type=bonus-fara-depunere&name=$matches[2]',
// 		'top'
// 	);
// }
// add_action('init', 'custom_crewrite_rules');

// set php.ini defines
// @ini_set( 'upload_max_size' , '256M' );
// @ini_set( 'post_max_size', '256M');
// @ini_set( 'max_execution_time', '300' );

// добавляем для нужных таксономий noindex
// add_filter('wpseo_robots', 'artit_wpseo_robots', 10, 2);
// function artit_wpseo_robots($robots_str, $index) {
// 	if (is_tax()) {
// 		$current_taxonomy = get_queried_object();
// 		
// 		if(in_array($current_taxonomy->taxonomy, ['cazinouri_category', 'bonus_fara_category']))
// 		{
// 			return 'noindex, nofollow';
// 		}
// 	}
// 	// По умолчанию возвращаем значение
// 	return $robots_str;
// }
// добавляем для нужных таксономий noindex

// удаляем страницы из sitemap
// add_filter('wpseo_sitemap_entry', 'artit_modify_sitemap', 10, 3);
// function artit_modify_sitemap($url, $type, $post) {
// 	if($_SERVER['REQUEST_URI']=='/page-sitemap.xml')
// 	{
// 		if(in_array($post->post_name, ['cazinouri-online', 'blog']))
// 		{
// 			unset($url);
// 		}
// 	}
// 	return $url;
// }
// удаляем страницы из sitemap

// shortcode for calculator бездепозит бонус
function calculation_bonus_shortcode() {
	ob_start();
	?>
	<div>
	</div>
	<?php
	return ob_get_clean();
}
// add_shortcode('calculation_bonus', 'calculation_bonus_shortcode');
// shortcode for calculator бездепозит бонус
?>