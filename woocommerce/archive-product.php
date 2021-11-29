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
			<div>
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
				<!-- КОНТЕНТ -->
				<div class="content pt-10">
					<!-- ТЕКСТ -->
					<div>
						<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_product_cat_content') ?>
					</div>
					<!-- END ТЕКСТ -->
					<!-- FAQ -->
					<?php if (carbon_get_term_meta(get_queried_object_id(), 'crb_product_cat_faq')): ?>
						<div id="product_cat-faq" class="pt-10">
							<h2 class="mb-4"><?php _e('Часто задаваемые вопросы', 'restx'); ?></h2>
							<div>
								<div itemscope itemtype="https://schema.org/FAQPage">
									<?php 
									$product_cat_faqs = carbon_get_term_meta(get_queried_object_id(), 'crb_product_cat_faq');
									foreach( $product_cat_faqs as $product_cat_faq ): ?>
										<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-3">
											<summary class="zag" itemprop="name">
												<div>
													<?php echo $product_cat_faq['crb_product_cat_faq_question'] ?>	
												</div>
												<div class="icon">
													<span></span>
													<span></span>
												</div>
											</summary> 
											<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="content">
												<div itemprop="text">
													<p><?php echo $product_cat_faq['crb_product_cat_faq_answer'] ?></p>
												</div>
											</div>
										</details>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<!-- END FAQ -->
					<!-- ТАБЛИЦА -->
					<div class="pt-10">
						<?php 

							$current_tax = get_queried_object();
					    $current_id = get_queried_object_id();
					    $current_posts = get_posts(array(
					      'post_type' => 'product',
					      'numberposts' => -1,
					      'orderby'     => 'date',
					      'tax_query' => array(
					        array(
					          'taxonomy' => 'product_cat',
					          'terms' => $current_id,
					          'field' => 'term_id',
					          'include_children' => true,
					          'operator' => 'IN'
					        )
					      ),
					    ));
					    
					    $name_cat = $current_tax->name;

							if (get_locale() == 'ru_RU') {
								$arr = [
								  'январь',
								  'февраль',
								  'март',
								  'апрель',
								  'май',
								  'июнь',
								  'июль',
								  'август',
								  'сентябрь',
								  'октябрь',
								  'ноябрь',
								  'декабрь'
								];
							} else {
								$arr = [
								  'січень',
								  'лютий',
								  'березень',
								  'квітень',
								  'травень',
								  'червень',
								  'липень',
								  'серпень',
								  'вересень',
								  'жовтень',
								  'листопад',
								  'грудень'
								];
							}

							$month = date('n')-1;
						?>
						<h2><?php _e('Актуальные цены на', 'welbrix'); ?>: <?php echo $arr[$month].', '.date('Y'); ?></h2>
						<div>
							<table class="inner-table w-full">
								<thead class="bg-gray-300">
									<tr>
										<th class="text-left p-2"><?php _e('Товар', 'welbrix'); ?></th>
										<th class="text-left px-2"><?php _e('Цена', 'welbrix'); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach (array_slice($current_posts, 0,5) as $post): ?>
									<?php $product = wc_get_product( $post->ID ); ?>
									<tr>
										<td class="p-2"><?php echo $post->post_title; ?></td>
										<td class="p-2"><?php echo $product->get_regular_price(); ?> грн.</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END ТАБЛИЦА -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>