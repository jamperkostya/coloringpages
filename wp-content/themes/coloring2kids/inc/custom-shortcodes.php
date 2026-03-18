<?php
// Функция для регистрации шорткода
function games_list_shortcode( $atts ) {
	// Проверяем, что это не автосохранение
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	// Проверяем, что это не запрос от REST API
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		return;
	}
	
	// Проверяем, что это не сохранение через WP CLI
	if ( defined( 'WP_CLI' ) && WP_CLI ) {
		return;
	}
	if(!is_admin())
	{
		// Установка значений по умолчанию для параметров шорткода
		$atts = shortcode_atts( [
			'items' => 6,             // Количество постов для вывода
			'category' => 0,
			'ids' => ''              // Список ID постов через запятую
		], $atts, 'games-list' );
		// Подготовка аргументов для WP_Query
		$query_args['post_type'] = 'game';
		$query_args['posts_per_page'] = intval( $atts['items'] );
		
		// Если передан параметр IDs, то добавляем его в запрос
		if ( ! empty( $atts['ids'] ) ) {
			$ids = array_map( 'intval', explode( ',', $atts['ids'] ) ); // Преобразуем строку в массив целых чисел
			$query_args['post__in'] = $ids;
			$query_args['orderby'] = 'post__in'; // Сохраняем порядок ID
		} elseif ( ! empty( $atts['category'] ) ) {
			// Если передана категория, то добавляем её в запрос
			$query_args['cat'] = intval( $atts['category'] );
		}
		if(!empty($atts['category'])) $query_args['cat'] = intval( $atts['category'] );
		
		// Запрос постов
		$query = new WP_Query( $query_args );
		
		// Проверяем, есть ли посты
		if ( $query->have_posts() ) {
			ob_start();
			echo '<section class="content-loop flex wrap content-loop-games">';
		
			while ( $query->have_posts() ) {
				$query->the_post();
		
				get_template_part( 'templates/content-part/content', get_post_type() );
			}
		
			echo '</section>';
			$output = ob_get_clean(); // Получаем содержимое буфера и очищаем его
			// Восстанавливаем глобальный объект поста
			wp_reset_postdata();
		
			return $output;
		} else {
			// Если постов не найдено
			return '<p>No games found.</p>';
		}
	}
}

// Регистрируем шорткод
// add_shortcode( 'games-list', 'games_list_shortcode' );
?>