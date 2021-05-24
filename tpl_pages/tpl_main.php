<?php
/*
Template Name: ГЛАВНАЯ
*/
?>

<?php get_header(); ?>

<!-- ПЕРВЫЙ ЭКРАН -->
<div class="welcome pt-8">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex flex-wrap mx-0 md:-mx-4">
			<div class="w-full md:w-1/2 px-0 md:px-4">
				<div class="welcome_slider">
					<div class="welcome_slider_wrap">
						<div class="welcome_slider_item">
							<div class="welcome_slider_item_title">
								LED лампы Philips со скидкой 35%
							</div>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/welcome_slider.png">
						</div>
					</div>
				</div>
			</div>
			<div class="w-full md:w-1/2 px-0 md:px-4">
				<div class="flex flex-wrap">
					<div class="welcome_cat w-full md:w-1/2 flex items-center justify-center relative">
						<a href="#"></a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/spot.jpg">
						<span class="uppercase bg-white text-center text-dark-blue rounded-lg px-6 py-3">Споты</span>
					</div>
					<div class="welcome_cat w-full md:w-1/2 flex items-center justify-center relative">
						<a href="#"></a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/tochecno.jpg">
						<span class="uppercase bg-white text-center text-dark-blue rounded-lg px-6 py-3">точечные светильники</span>
					</div>
					<div class="welcome_cat w-full hidden md:flex items-center justify-center relative">
						<a href="#"></a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/led.jpg">
						<span class="uppercase bg-white text-center text-dark-blue rounded-lg px-6 py-3">Светодиодные светильники</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END ПЕРВЫЙ ЭКРАН -->

<!-- ПРЕИМУЩЕСТВА -->
<div class="advantage pt-10 mb-8 md:mb-20">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex flex-wrap items-center md:-mx-4">
			<div class="advantage_item w-full md:w-1/3 flex md:px-4 mb-8 md:mb-0">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/delivery-icon.svg" class="mr-3">
				<div>
					<p><?php _e('Бесплатная доставка', 'welbrix'); ?></p>
					<span><?php _e('При заказе от 1000 грн', 'welbrix'); ?></span>
				</div>
			</div>
			<div class="advantage_item w-full md:w-1/3 flex md:px-4 mb-8 md:mb-0">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/refresh-arrow-icon.svg" class="mr-3">
				<div>
					<p><?php _e('14 дней на возврат', 'welbrix'); ?></p>
					<span><?php _e('Возврат или обмен в течерии 14 дней', 'welbrix'); ?></span>
				</div>
			</div>
			<div class="advantage_item w-full md:w-1/3 flex md:px-4 mb-8 md:mb-0">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/garant-icon.svg" class="mr-3">
				<div>
					<p><?php _e('Гарантия', 'welbrix'); ?></p>
					<span><?php _e('Официальная гарантия от производителя', 'welbrix'); ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END ПРЕИМУЩЕСТВА -->

<!-- ТОПОВЫЕ ПРОДУКТЫ -->
<div class="mb-8 md:mb-20">
	<div class="container mx-auto px-4 md:px-0">
		<div class="products_best">
			<div class="flex justify-between items-center mb-12">
				<h2>
					<?php _e('Топ продаж', 'welbrix'); ?>
				</h2>
				<div class="hidden md:flex items-center">

					<!-- ПОЛУЧАЕМ КАТЕГОРИИ -->
					<?php 
						$product_categories = get_categories( array(
					    'taxonomy'     => 'product_cat',
						) );
					?>
					<!-- END ПОЛУЧАЕМ КАТЕГОРИИ -->

					<?php foreach(array_slice($product_categories, 0, 4) as $product_cat): ?>
						<div class="products_tab_heading cursor-pointer" data-nav-top-products="cat-<?php echo $product_cat->term_id; ?>">
							<?php echo $product_cat->name; ?>
						</div>	
					<?php endforeach; ?>

				</div>
			</div>
			<?php foreach(array_slice($product_categories, 0, 4) as $product_cat): ?>
				<div class="products_tab_content flex flex-wrap md:-mx-4" data-content-top-products="cat-<?php echo $product_cat->term_id; ?>">
					<?php 
						$query = new WP_Query( array( 
							'post_type' => 'product', 
							'posts_per_page' => 8,
							'order'    => 'DESC',
							'tax_query' => array(
						    array(
					        'taxonomy' => 'product_cat',
							    'terms' => $product_cat->term_id,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
						<div class="w-full md:w-1/4 md:px-4">
							<!-- PRODUCT CARD -->
							<div class="product_card">
								<a href="<?php echo $product->get_permalink(); ?>" class="product_card_link"></a>
								<!-- SALE BADGE -->
								<?php $check_sale_price = $product->get_sale_price();  if ($check_sale_price): ?>
									<div class="product_card_badge">
										<?php _e('Акция', 'welbrix'); ?>
									</div>
								<?php endif; ?>
								<!-- END SALE BADGE -->
								<div class="product_card_thumb pt-4 md:pt-2">
									<?php echo $product->get_image(); ?>
								</div>
								<div class="px-4 py-3">
									<div class="product_card_id mb-2">
										<?php _e('Код', 'welbrix'); ?>: <?php echo $product->get_sku(); ?>
									</div>
									<div class="product_card_title mb-8">
										<?php the_title(); ?>
									</div>
									<div class="product_card_price">
										<?php echo $product->get_price_html(); ?>
									</div>
									<div class="product_card_actions flex justify-between items-center">
										<div class="product_card_actions_add">
											<div class="inline-block cursor-pointer px-8 py-3 modal-js" data-modal="order" data-title="<?php the_title(); ?>">
												<?php _e('Купить', 'welbrix'); ?>	
											</div>
										</div>
										<div class="product_card_actions_icons flex items-center">
											<div class="mr-4">
												<?php echo do_shortcode('[yith_wcwl_add_to_wishlist label="0" title="" product_added_text="" icon="fa fa-heart-o" already_in_wishslist_text="" browse_wishlist_text=""]'); ?>
											</div>
											<div class="mr-4">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/compare-icon.svg">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END PRODUCT CARD -->
						</div>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>	
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- END ТОПОВЫЕ ПРОДУКТЫ -->

<!-- Баннеры -->
<div class="banners mb-20">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex flex-col md:flex-row md:items-center md:-mx-4">
			<div class="w-full md:w-1/2 md:px-4 mb-3 md:mb-0">
				<div class="banner">
					<a href="#" class="banner_link"></a>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/banner1.jpg" class="banner_img">
					<div class="banner_info px-6 py-4">
						<div class="banner_info_subtitle text-center mb-2">Новая коллекция</div>
						<div class="banner_info_title text-center">Трековые светильники</div>
					</div>
				</div>
			</div>
			<div class="w-full md:w-1/2 md:px-4 mb-3 md:mb-0">
				<div class="banner">
					<a href="#" class="banner_link"></a>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/banner2.jpg" class="banner_img">
					<div class="banner_info px-6 py-4">
						<div class="banner_info_subtitle text-center mb-2">Распродажа</div>
						<div class="banner_info_title text-center">Скидки до 50%</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END Баннеры -->

<!-- БЛОГ -->
<div class="mb-20 md:mb-32">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex items-end justify-between mb-8 md:mb-12">
			<h2><?php _e('Новое в нашем блоге', 'welbrix'); ?></h2>
			<div class="hidden md:block">
				<a href="<?php echo get_post_type_archive_link( 'posts' ); ?>" class="dark-link uppercase"><?php _e('Читать все', 'welbrix'); ?></a>
			</div>
		</div>
		<div class="flex flex-wrap items-center md:-mx-4">
			<?php 
				$blog_query = new WP_Query( array( 
					'post_type' => 'post', 
					'posts_per_page' => 3,
				) );
			if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
				<div class="w-full md:w-1/3 md:px-4 mb-8 md:mb-0">
					<div class="post">
						<a href="<?php the_permalink(); ?>" class="post_link"></a>
						<div class="post_thumb">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="post_img">	
						</div>
						<div class="post_content bg-white px-4 pt-8 pb-6">
							<div class="post_title mb-3">
								<?php the_title(); ?>
							</div>
							<div class="post_description">
								Споты светильники — это точечные локальные осветительные приборы. Споты отличаются длительным
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<!-- END БЛОГ -->

<!-- ТЕКСТ НА ГЛАВНОЙ -->
<div class="mb-20 md:mb-40">
	<div class="container mx-auto px-4 md:px-0">
		<div class="w-full lg:w-10/12 mx-auto">
			<div class="content">
				<?php $main_text = crb_get_i18n_theme_option( 'crb_main_text' ); ?>
				<?php echo apply_filters( 'the_content', $main_text  ); ?>	
			</div>	
		</div>
		
	</div>
</div>
<!-- END ТЕКСТ НА ГЛАВНОЙ -->

<?php get_footer(); ?>