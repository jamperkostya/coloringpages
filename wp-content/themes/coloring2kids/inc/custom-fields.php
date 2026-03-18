<?php
if (!function_exists( 'carbon_get_post_meta')) {
	function carbon_get_post_meta($id, $name, $type = null) {
		return false;
	}
}
if (!function_exists('carbon_get_the_post_meta')) {
	function carbon_get_the_post_meta($name, $type = null) {
		return false;
	}
}
if (!function_exists('carbon_get_theme_option')) {
	function carbon_get_theme_option($name, $type = null) {
		return false;
	}
}
if (!function_exists('carbon_get_term_meta')) {
	function carbon_get_term_meta($id, $name, $type = null) {
		return false;
	}
}
if (!function_exists('carbon_get_user_meta')) {
	function carbon_get_user_meta($id, $name, $type = null) {
		return false;
	}
}
if (!function_exists('carbon_get_comment_meta')) {
	function carbon_get_comment_meta($id, $name, $type = null) {
		return false;
	}
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// theme options tab
// Container::make( 'theme_options', __( 'Settings', 'crb' ) )
// ->add_fields(
//     [
//         Field::make('text', 'crb_link', 'Link')
// 		->set_width(100),
// 		Field::make('Image', 'crb_default_image', 'Default game image')
// 		->set_width(100),
// 		Field::make('text', 'crb_enter_link', 'Enter Link')
// 		->set_attribute( 'placeholder', 'это кнопка для "Вход" на сайте, кодируется тут в Base64, т.к. она на внешний идет ресурс' )
// 		->set_width(100),
//     ]
// );

// add language support
// function carbon_lang() {
//     $suffix = '';
//     if ( ! function_exists( 'pll_current_language' ) ) {
//         return $suffix;
//     }
//     $suffix = '_' . pll_current_language();
//     return $suffix;
// }

// add google map api key
// add_filter( 'carbon_fields_map_field_api_key', 'crb_get_gmaps_api_key' );
// function crb_get_gmaps_api_key( $current_key ) {
//     return 'AIzaSyBkLMQlLFkUPYYHCc0zYz0FLq-F1kSv-tQ';
// }
// fields for provider and game's category
// Container::make('term_meta', 'Properties')
// ->show_on_taxonomy(['provider', 'games', 'help-center'])
// ->add_fields(
// 	[
// 		Field::make('image', 'crb_thumb', 'Thumbnail'),
// 		Field::make('image', 'crb_avatar', 'Icon'),
// 		Field::make( 'checkbox', 'crb_show_as_top', 'Show in top' )
// 		->set_width(33)
// 		->set_option_value( 'yes' ),
// 	]
// );
// fields for post type - game
// Container::make( 'post_meta', 'Game' )
// ->where( 'post_type', '=', 'game' )
// ->add_fields(
//     [
//         Field::make('File', 'crb_background', 'Background')
// 		->set_width(34)
// 		->set_type(['image']),
// 		Field::make( 'checkbox', 'crb_show_as_top', 'Show in top' )
// 		->set_width(33)
// 		->set_option_value( 'yes' ),
// 		Field::make( 'checkbox', 'crb_show_in_shortcode', 'Show in shortcode' )
// 		->set_width(33)
// 		->set_option_value( 'yes' ),
// 		Field::make( 'text', 'crb_frame', 'Demo link' )
// 		->set_width(100)
//     ]
// );
// // custom post fields for front-page
Container::make( 'post_meta', 'Frontpage' )
->where( 'post_id', '=', get_option( 'page_on_front' ) )
->add_fields(
    [
        Field::make('Text', 'crb_title', 'Title')
		->set_width(100),
		Field::make('rich_text', 'crb_description', 'Description')
		->set_width(100),
		Field::make('Text', 'crb_subtitle', 'Subtitle')
		->set_width(100),
    ],
);

// Container::make( 'post_meta', 'Contacts' )
// ->show_on_template('page-contacts-one.php')
// ->add_fields(
//     [
//         Field::make('Rich_text', 'crb_teaser', 'Teaser text near map')
//         ->set_width(50),
//         
//         Field::make( 'map', 'crb_location', 'Location' )
//         ->set_help_text( 'drag and drop the pin on the map to select location' )
//     ]
// );
// Container::make( 'post_meta', 'Team' )
// ->where( 'post_type', '=', 'team' )
// ->add_fields(
//     [
//         Field::make('association', 'crb_association_services')
//         ->set_types([
//             [
//                 'type' => 'post',
//                 'post_type' => 'service',
//             ]
//         ])
//     ]
// );
// Container::make( 'post_meta', 'Slider' )
// ->where( 'post_type', 'IN', ['page','service'] )
// ->add_fields(
//     [
//         Field::make('File', 'crb_slider_background', 'Slider background')
//         ->set_type(['image'])
//     ]
// )
// fields for term - category and others
Container::make('term_meta', 'Дополнительные настройки категории')
->where('term_taxonomy', '=', 'category') // только для рубрик
->add_fields([
	Field::make('text', 'crb_title', 'H1 заголовок')
		->set_help_text('Введите H1 для этой категории. Если пусто — будет использоваться название категории.')
]);
Container::make('term_meta', 'Properties')
->add_fields(
	[
		Field::make( 'checkbox', 'crb_show_as_top', 'Show in top' )
		->set_width(33)
		->set_option_value( '1' ),
		Field::make('rich_text', 'crb_seo_text', 'SEO text'),
		Field::make('select', 'crb_category_author', 'Author')
			->set_options('get_all_users_as_options')
			->set_default_value('')
			->set_required(true),
	]
);
// fields for term - category and others

// fields for post type - post
Container::make( 'post_meta', 'Post' )
->where( 'post_type', '=', 'post' )
->add_fields(
    [
		Field::make( 'checkbox', 'crb_show_as_top', 'Show in top' )
		->set_width(33)
		->set_option_value( '1' ),
		Field::make( 'complex', 'crb_coloring', 'Hero' )
		->add_fields( 'section', 'Coloring', [
			Field::make('File', 'crb_image', 'Image (JPG)')
			->set_width(50)
			->set_type(['image']),
			Field::make('File', 'crb_pdf', 'Image (PDF)')
			->set_width(50)
			->set_type(['pdf']),
		]),
		Field::make('rich_text', 'crb_seo_text', 'SEO text'),
    ]
);
// fields for post type - post

// Функция, которая возвращает список пользователей
function get_all_users_as_options() {
	$users = get_users();
	$options = [];

	foreach ($users as $user) {
		$options[$user->ID] = $user->display_name;
	}

	return $options;
}

Container::make( 'user_meta', 'Дополнительные поля пользователя' )
->add_fields(
	[
	Field::make('image', 'crb_image', 'Image'),
	Field::make( 'text', 'crb_job_title', 'Job title' ),
	Field::make( 'text', 'crb_experience', 'Experience' ),
	
	Field::make( 'text', 'crb_facebook', 'Facebook' ),
	Field::make( 'text', 'crb_twitter', 'Twitter' ),
	Field::make( 'text', 'crb_whatsapp', 'Whatsapp' ),
	Field::make( 'text', 'crb_email', 'Email' ),
	Field::make( 'text', 'crb_instagram', 'Instagram' )
	]
);
?>
