<?php get_header(); ?>

<!-- ТОП ИНФОРМАЦИЯ -->
<div class="bg-white">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex flex-col py-4">
			<!-- Хлебные крошки -->
			<div>
				<?php if ( is_shop() ) {
					get_template_part('components/breadcrumbs/shop');
				} else {
					get_template_part('components/breadcrumbs/category');
				} ?>
			</div>
			<!-- END Хлебные крошки -->
			<div>
				<h1><?php woocommerce_page_title(); ?></h1>
			</div>
		</div>
	</div>
</div>
<!-- END ТОП ИНФОРМАЦИЯ -->
<div class="sidebar-fixed w-3/12 hidden md:block bg-white"></div>
<div class="container mx-auto  px-4 md:px-0">
	<div class="flex flex-col md:flex-row">

		<!-- Кнопка вызова фильтра на мобильных -->
		<div class="filter_mobile_toggle flex lg:hidden items-center cursor-pointer">
			<div class="mb-4"><?php _e('Фильтр', 'welbrix'); ?></div>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/filter-icon.svg">
		</div>
		<!-- END Кнопка вызова фильтра на мобильных -->

		<!-- Мобильный фильтр OPEN -->
		<div class="filter_mobile_cover flex lg:hidden">
			<div class="container mx-auto">
				<div class="px-2 py-10">
					<h2 class="text-center text-2xl mb-6"><?php _e('Фильтр', 'welbrix'); ?></h2>
					<div id="filter" class="filter">
						<?php echo do_shortcode('[wpf-filters id=1]') ?>
					</div>
					<div class="filter_mobile_cover_close cursor-pointer">
						<?php _e('Закрыть', 'welbrix'); ?>
					</div>		
				</div>
			</div>
		</div>
		<!-- END Мобильный фильтр OPEN -->

		<!-- Сайдбар на десктопе -->
		<div class="hidden lg:block w-3/12 relative bg-white py-10 pr-8">
			<div id="filter" class="filter">
				<?php echo do_shortcode('[wpf-filters id=1]') ?>
			</div>
		</div>
		<!-- END Сайдбар на десктопе -->

		<div class="w-full lg:w-9/12 py-10 lg:pl-8">
			<?php do_action( 'woocommerce_before_single_product' ); ?>	
			<?php
				if ( woocommerce_product_loop() ) {
					
					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
				do_action( 'woocommerce_after_main_content' );
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>