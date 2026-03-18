$(function(){
	function initOwlCarousel(){
		$('.post-carousel').owlCarousel({
			loop:true,
			margin:24,
			nav:true,
			dots: true,
			navText: ['<img src="/wp-content/themes/coloring2kids/assets/images/owl-arrow-left.svg">Prev', 'Next<img src="/wp-content/themes/coloring2kids/assets/images/owl-arrow-right.svg">'],
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});
	}
	initOwlCarousel();
	let resizeTimer;
	let lastWindowWidth = $(window).width();
	$(window).on('resize', function () {
		let currentWidth = $(window).width();
	
		if (currentWidth !== lastWindowWidth) {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function () {
				$(".owl-carousel")
					.trigger('destroy.owl.carousel')
					.removeClass('owl-loaded');
				initOwlCarousel();
				lastWindowWidth = currentWidth;
			}, 300);
		}
	});
	
	$('.burger-menu').on('click', function(){
		$(this).toggleClass('open');
		$('.header .menu').toggleClass('open');
	});
	
	$('.likes').on('click', function() {
		var btn = $(this);
		var attachment_id = btn.data('attachment');
		
		// Защита от повторных нажатий
		if (btn.hasClass('processing') || btn.hasClass('active')) return;
		btn.addClass('processing');
	
		$.post(ajax_posts.ajaxurl, {
			action: 'toggle_attachment_like',
			attachment_id: attachment_id
		}, function(response) {
			if (response.success) {
				btn.find('.number').text(response.data.likes);
				if (response.data.liked) {
					btn.addClass('active');
				} else {
					btn.removeClass('active');
				}
			}
			
			btn.removeClass('processing');
		});
	});
	
	$('.share').click(function(){
		$('.socials').toggleClass('show');
	});
	
	$('.header-search-form').submit(function(){
		if($('.search-input').val()==0)
		{
			return false;
		}
	});
	
	$('#menu-top-menu .menu-item-has-children a').click(function(e){
		if ($(this).attr('href') === '#' || $(this).attr('href') === '' || $(this).parent().find('.sub-menu').length) {
			e.preventDefault();
		}
		if ($(window).width() < 992) {
			let $parent = $(this).parent();
			let $submenu = $parent.find('> .sub-menu');
		
			if ($submenu.length) {
				e.preventDefault(); // отменяем переход по ссылке
		
				// добавляем класс active родителю
				$parent.addClass('active');
		
				// показываем подменю, если оно скрыто
				$submenu.show();
			}
		}
		else
		{
			let $parent = $(this).parent();
			if ($parent.hasClass('active')) {
				$parent.removeClass('active');
			}
			else
			{
				$('#menu-top-menu .menu-item-has-children').removeClass('active');
				$parent.addClass('active');
			}
		}
	});
});

// search's suggestions
document.addEventListener('DOMContentLoaded', function () {
	const input = document.getElementById('search-form-1');
	if(input!=null)
	{
		const resultsBox = document.getElementById('search-suggestions');
		
		input.addEventListener('input', function () {
			const query = input.value;
			if (query.length < 2) {
				resultsBox.innerHTML = '';
				resultsBox.classList.remove('active'); // Удаляем класс, если мало символов
				return;
			}
			fetch(ajax_posts.ajaxurl + '?action=ajax_search&search=' + encodeURIComponent(query))
			.then(res => res.json())
			.then(data => {
				const results = data.results; // Извлекаем массив из ключа results
				if (results != undefined && results.length) {
					resultsBox.innerHTML = results.map(post =>
						'<a href="' + post.link + '" class="suggestion">' + post.title + '</a>'
					).join('');
					resultsBox.classList.add('active'); // Добавляем класс, если есть результаты
				} else {
					resultsBox.innerHTML = '<div>Ничего не найдено</div>';
					resultsBox.classList.remove('active'); // Удаляем класс, если нет результатов
				}
			});
		});
		
	}
});