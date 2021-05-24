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
				<!-- Слайдер Контейнер -->
				<div class="welcome_slider swiper-container swiper-welcome-container">
					<div class="welcome_slider_wrap swiper-wrapper">
						<?php 
						$welcome_sliders = crb_get_i18n_theme_option('crb_main_sliders');
						foreach( $welcome_sliders as $welcome_slider ): ?>
						<!-- СЛАЙДЕР ITEM -->
						<div class="swiper-slide welcome_slider_item">
							<!-- <div class="welcome_slider_item_title"></div> -->
							<?php 
							 $welcome_photo_medium = wp_get_attachment_image_src($welcome_slider['crb_main_slider_img'], 'medium'); 
							 $welcome_photo_large = wp_get_attachment_image_src($welcome_slider['crb_main_slider_img'], 'large');
							 $welcome_photo_full = wp_get_attachment_image_src($welcome_slider['crb_main_slider_img'], 'full');
							?>
							<img srcset="<?php echo $welcome_photo_medium[0] ?> 767w, 
										<?php echo $welcome_photo_large[0] ?> 1280w,
										<?php echo $welcome_photo_full[0] ?> 1440w"
										sizes="(max-width: 767px) 767px,
									  (max-width: 1280px) 1280px,
									  1440px"
							src="<?php echo $welcome_photo_full[0] ?>">
						</div>
						<!-- END СЛАЙДЕР ITEM -->
						<?php endforeach; ?>
					</div>
					<div class="swiper-button-next swiper-welcome-next"></div>
						<div class="swiper-button-prev swiper-welcome-prev"></div>
				</div>
				<!-- END Слайдер Контейнер -->
			</div>
			<div class="w-full md:w-1/2 px-0 md:px-4">
				<div class="flex flex-wrap">
					<!-- Категория №1 -->
					<div class="welcome_cat w-full md:w-1/2 flex items-center justify-center relative">
						<a href="<?php echo crb_get_i18n_theme_option( 'crb_main_cat_one_link' ); ?>"></a>
						<!-- PHOTO -->
						<?php 
							$cat_one_src_medium = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_one_thumb'), 'medium'); 
							$cat_one_src_large = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_one_thumb'), 'large'); 
							$cat_one_src_full = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_one_thumb'), 'full'); 
						?>
						<img srcset="<?php echo $cat_one_src_medium[0] ?> 767w, 
						<?php echo $cat_one_src_large[0] ?> 1280w,
						<?php echo $cat_one_src_full[0] ?> 1440w"
						sizes="(max-width: 767px) 767px,
            (max-width: 1280px) 1280px,
            1440px"
						src="<?php echo $cat_one_src_full[0] ?>" alt="" loading="lazy">
						<!-- END PHOTO -->
						<span class="uppercase bg-white text-center text-dark-blue rounded-lg px-6 py-3"><?php echo crb_get_i18n_theme_option( 'crb_main_cat_one_title' ); ?></span>
					</div>
					<!-- END Категория №1 -->

					<!-- Категория №2 -->
					<div class="welcome_cat w-full md:w-1/2 flex items-center justify-center relative">
						<a href="<?php echo crb_get_i18n_theme_option( 'crb_main_cat_two_link' ); ?>"></a>
						<!-- PHOTO -->
						<?php 
							$cat_two_src_medium = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_two_thumb'), 'medium'); 
							$cat_two_src_large = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_two_thumb'), 'large'); 
							$cat_two_src_full = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_two_thumb'), 'full'); 
						?>
						<img srcset="<?php echo $cat_two_src_medium[0] ?> 767w, 
						<?php echo $cat_two_src_large[0] ?> 1280w,
						<?php echo $cat_two_src_full[0] ?> 1440w"
						sizes="(max-width: 767px) 767px,
            (max-width: 1280px) 1280px,
            1440px"
						src="<?php echo $cat_two_src_full[0] ?>" alt="" loading="lazy">
						<!-- END PHOTO -->
						<span class="uppercase bg-white text-center text-dark-blue rounded-lg px-6 py-3"><?php echo crb_get_i18n_theme_option( 'crb_main_cat_two_title' ); ?></span>
					</div>
					<!-- END Категория №2 -->

					<!-- Категория №3 -->
					<div class="welcome_cat w-full hidden md:flex items-center justify-center relative">
						<a href="<?php echo crb_get_i18n_theme_option( 'crb_main_cat_three_link' ); ?>"></a>
						<!-- PHOTO -->
						<?php 
							$cat_three_src_medium = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_three_thumb'), 'medium'); 
							$cat_three_src_large = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_three_thumb'), 'large'); 
							$cat_three_src_full = wp_get_attachment_image_src(carbon_get_theme_option('crb_main_cat_three_thumb'), 'full'); 
						?>
						<img srcset="<?php echo $cat_three_src_medium[0] ?> 767w, 
						<?php echo $cat_three_src_large[0] ?> 1280w,
						<?php echo $cat_three_src_full[0] ?> 1440w"
						sizes="(max-width: 767px) 767px,
            (max-width: 1280px) 1280px,
            1440px"
						src="<?php echo $cat_three_src_full[0] ?>" alt="" loading="lazy">
						<!-- END PHOTO -->
						<span class="uppercase bg-white text-center text-dark-blue rounded-lg px-6 py-3"><?php echo crb_get_i18n_theme_option( 'crb_main_cat_three_title' ); ?></span>
					</div>
					<!-- END Категория №3 -->

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
					<p><?php _e('Доставка', 'welbrix'); ?></p>
					<span><?php _e('Доставка по всем регионам Украины', 'welbrix'); ?></span>
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
					<span><?php _e('Официальная гарантия от производителя 2 года', 'welbrix'); ?></span>
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
					    'orderby' => 'term_order',
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
			<?php 
				$banners = crb_get_i18n_theme_option('crb_main_banners');
				foreach ($banners as $banner):
			?>
				<div class="w-full md:w-1/<?php echo count($banners); ?> md:px-4 mb-3 md:mb-0">
					<div class="banner">
						<a href="<?php echo $banner['crb_main_banner_link']; ?>" class="banner_link"></a>
						<!-- PHOTO -->
						<?php 
							$banner_src_medium = wp_get_attachment_image_src($banner['crb_main_banner_img'], 'medium'); 
							$banner_src_large = wp_get_attachment_image_src($banner['crb_main_banner_img'], 'large'); 
							$banner_src_full = wp_get_attachment_image_src($banner['crb_main_banner_img'], 'full'); 
						?>
						<img srcset="<?php echo $banner_src_medium[0] ?> 767w, 
						<?php echo $banner_src_large[0] ?> 1280w,
						<?php echo $banner_src_full[0] ?> 1440w"
						sizes="(max-width: 767px) 767px,
            (max-width: 1280px) 1280px,
            1440px"
						src="<?php echo $banner_src_full[0] ?>" alt="" loading="lazy" class="banner_img">
						<!-- END PHOTO -->
						<div class="banner_info px-6 py-4">
							<div class="banner_info_subtitle text-center mb-2"><?php echo $banner['crb_main_banner_subtitle']; ?></div>
							<div class="banner_info_title text-center"><?php echo $banner['crb_main_banner_title']; ?></div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
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