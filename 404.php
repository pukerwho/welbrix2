<?php get_header(); ?>

<div class="container mx-auto px-4 md:px-6 lg:px-0 py-12">
	<div class="ups w-full lg:w-8/12 relative flex items-center bg-white mx-auto">
		<div class="w-3/12 lg:w-5/12">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/404.png" alt="<?php _e('Страница не найдена', 'welbrix'); ?>" class="ups_icon">
		</div>
		<div class="w-9/12 lg:w-7/12 px-10">
			<p class="text-sm mb-6">
				<?php _e('Ой!', 'welbrix'); ?>
				<br>
				<?php _e('Данная страница не найдена или ее никогда не существовало. Вы можете вернуться на главную или посмотреть наши популярные товары!', 'welbrix'); ?>
			</p>
			<div class="block btn_blue py-4">
				<a href="<?php echo home_url(); ?>" class="text-md uppercase">
					<?php _e('На главную', 'welbrix'); ?>
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>