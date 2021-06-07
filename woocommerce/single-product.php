<?php 
	get_header(); 
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	global $product;
?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<!-- ТОП ИНФОРМАЦИЯ -->
	<div class="bg-white">
		<div class="container mx-auto px-4 md:px-0">
			<div class="flex flex-col py-4">
				<!-- Хлебные крошки -->
				<?php 
				$current_term = wp_get_post_terms(  get_the_ID() , 'product_cat', array( 'parent' => 0 ) );
				foreach (array_slice($current_term, 0,1) as $myterm); {
				} ?>
				<?php if ($myterm): ?>
				<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				  <ul class="flex">
						<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
							<a itemprop="item" href="<?php echo home_url(); ?>" class="breadcrumbs_home">
								<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
							</a>                        
							<meta itemprop="position" content="1">
						</li>
						<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
							<a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'product_cat') ?>">
								<span itemprop="name"><?php echo $myterm->name; ?></span>
							</a>                        
							<meta itemprop="position" content="2">
						</li>
						<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
							<a itemprop="item" href="<?php the_permalink(); ?>">
								<span itemprop="name"><?php the_title(); ?></span>
							</a>                        
							<meta itemprop="position" content="3">
						</li>
				  </ul>
				</div>
				<?php endif; ?>
				<!-- END Хлебные крошки -->
				<div>
					<h1><?php the_title(); ?></h1>
				</div>
				<!-- SKU и STOCK -->
				<div class="flex justify-between md:justify-start items-end">
					<div class="product_sku mr-5">
						<span class="opacity-60"><?php _e('Код', 'welbrix'); ?>:</span> <span class="font-bold"><?php echo $product->get_sku(); ?></span>
					</div>
					<div>
						<?php $product_stock_status = $product->get_stock_status(); ?>
						<?php if ($product_stock_status === 'instock'): ?>
							<span class="product_stock instock"><?php _e('В наличии', 'welbrix'); ?></span>
						<?php else: ?>
							<span class="product_stock outstock"><?php _e('Нет в наличии', 'welbrix'); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!-- END SKU и STOCK -->
			</div>
		</div>
	</div>

	<div class="py-5 md:py-10">
		<div class="container mx-auto  px-4 md:px-0">
			<?php do_action( 'woocommerce_before_single_product' ); ?>
			<!-- ОСНОВНАЯ ИНФОРМАЦИЯ О ПРОДУКТЕ -->
			<div class="product-box bg-white mb-8">
				<div class="flex flex-wrap md:-mx-4">
					<div class="w-full md:w-1/2 md:px-4">
						<?php get_template_part('components/gallery/single-product-image'); ?>
					</div>
					<div class="w-full md:w-1/2 md:px-4">
						<!-- ИНФО МЕТА -->
						<div class="product_meta_info px-2 md:px-0 pt-5 md:pt-10 pb-5 mr-0 md:mr-10">
							<?php if(carbon_get_the_post_meta('product_info_style')): ?>
							<div class="flex items-center mb-5">
								<div class="w-2/5 md:w-1/5 pr-3">
									<span><?php _e('Стиль', 'welbrix'); ?></span>:
								</div>
								<div class="w-3/5 md:w-4/5">
									<?php echo carbon_get_the_post_meta('product_info_style'); ?>
								</div>
							</div>
							<?php endif; ?>	

							<?php if(carbon_get_the_post_meta('product_info_typelamp')): ?>
							<div class="flex items-center mb-5">
								<div class="w-2/5 md:w-1/5 pr-3">
									<span><?php _e('Тип лампы', 'welbrix'); ?></span>:
								</div>
								<div class="w-3/5 md:w-4/5">
									<?php echo carbon_get_the_post_meta('product_info_typelamp'); ?>
								</div>
							</div>
							<?php endif; ?>	

							<?php if(carbon_get_the_post_meta('product_info_typecokol')): ?>
							<div class="flex items-center mb-5">
								<div class="w-2/5 md:w-1/5 pr-3">
									<span><?php _e('Тип цоколя', 'welbrix'); ?></span>:
								</div>
								<div class="w-3/5 md:w-4/5">
									<?php echo carbon_get_the_post_meta('product_info_typecokol'); ?>
								</div>
							</div>
							<?php endif; ?>	

							<?php if(carbon_get_the_post_meta('product_info_material')): ?>
							<div class="flex items-center mb-5">
								<div class="w-2/5 md:w-1/5 pr-3">
									<span><?php _e('Материал', 'welbrix'); ?></span>:
								</div>
								<div class="w-3/5 md:w-4/5">
									<?php echo carbon_get_the_post_meta('product_info_material'); ?>
								</div>
							</div>
							<?php endif; ?>	
						</div>
						<!-- END ИНФО МЕТА -->

						<!-- Цена, В корзину, Избранное -->
						<div class="flex flex-col md:flex-row items-center py-5 md:py-10 md:mr-10">
							<div class="product_price mb-6 md:mb-0 md:mr-6">
								<?php echo $product->get_price_html(); ?>
							</div>
							<div class="flex items-center">

								<div class="mr-6 js-analytics-add-to-cart" data-item-id="<?php echo $product->get_sku(); ?>" data-item-name="<?php the_title(); ?>" data-item-price="">
									<!-- шаблон components/product/add-to-cart-signle-product -->
									<?php 
										echo apply_filters( 'woocommerce_loop_add_to_cart_link',
										sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="product_btn inline-block px-8 md:px-12 py-4 %s product_type_%s">%s</a>',
										esc_url( $product->add_to_cart_url() ),
										esc_attr( $product->get_id() ),
										esc_attr( $product->get_sku() ),
										$product->is_purchasable() ? 'add_to_cart_button' : '',
										esc_attr( $product->get_type() ),
										esc_html( $product->add_to_cart_text() )
										),
										$product );
									?>
									<!-- <div class="product_btn inline-block cursor-pointer px-8 md:px-12 py-4 modal-js" data-modal="order">
										 _e('Купить', 'welbrix');
									</div> -->
								</div>
								<div>
									<?php echo do_shortcode('[yith_wcwl_add_to_wishlist label="0" title="Add to Wishlist2" product_added_text="" icon="fa fa-heart-o" already_in_wishslist_text="" browse_wishlist_text="Избранное"]'); ?>
								</div>
							</div>
							
						</div>
						<!-- END Цена, В корзину, Избранное -->

						<!-- Короткое описание -->
						<div class="product_description py-5 px-2 md:px-0 md:py-10 md:mr-10">
							<span><?php _e('Описание', 'welbrix'); ?></span>
							<div class="mt-3 mb-4">
								<?php echo $product->get_short_description(); ?>
							</div>
							<a href="#content-single-product"><?php _e('Подробнее', 'welbrix'); ?></a>
						</div>
						<!-- END Короткое описание -->
					</div>
				</div>
			</div>
			<!-- END ОСНОВНАЯ ИНФОРМАЦИЯ О ПРОДУКТЕ -->

			<!-- ОПИСАНИЕ ПРОДУКТА -->
			<?php if ( !empty( get_the_content() ) ): ?>
			<div id="content-single-product" class="product-box bg-white mb-8">
				<div class="product_content px-2 md:px-8 py-5 md:py-12">
					<h2><?php _e('Описание', 'welbrix'); ?></h2>
					<div class="title uppercase mb-8"><?php the_title(); ?></div>
					<div class="w-full lg:w-10/12 content">
						<?php the_content(); ?>
					</div>	
				</div>
			</div>
			<?php endif; ?>
			<!-- END ОПИСАНИЕ ПРОДУКТА -->

			<!-- ХАРАКТЕРИСТИКИ ПРОДУКТА -->
			<div class="product-box bg-white mb-8">
				<div class="product_params px-2 md:px-8 py-5 md:py-12">
					<h2><?php _e('Характеристики', 'welbrix'); ?></h2>
					<div class="title uppercase mb-6 md:mb-8"><?php the_title(); ?></div>
					<div class="flex flex-wrap md:-mx-4">
						<?php if(carbon_get_the_post_meta('product_info_mosh')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Номинальная мощность', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_mosh'); ?>
							</div>
						</div>
						<?php endif; ?>

						<?php if(carbon_get_the_post_meta('product_info_analoglep')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Аналог ЛЭП, Вт', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_analoglep'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_tempcolor')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Температура цвет, К', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_tempcolor'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_diapazon')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Диапазон рабочего напряжения, V', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_diapazon'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_typecokol')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Тип цоколя', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_typecokol'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_qr')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Штрихкод', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_qr'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_dlina')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Длина', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_dlina'); ?>
							</div>
						</div>
						<?php endif; ?>

						<?php if(carbon_get_the_post_meta('product_info_shirina')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Ширина', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_shirina'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_visota')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Высота', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_visota'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_moshnist')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Мощность', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_moshnist'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_qty_istochnikov')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Кол-во источников света', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_qty_istochnikov'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_cct')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('CCT', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_cct'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_pitanie')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Питание', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_pitanie'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_montag')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Монтаж', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_montag'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_shirina_vnutri')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Ширина внутренняя', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_shirina_vnutri'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_glubina_vrezki')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Глубина врезки', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_glubina_vrezki'); ?>
							</div>
						</div>
						<?php endif; ?>

						<?php if(carbon_get_the_post_meta('product_info_color')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Цвет', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_color'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_napriazhenie')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Напряжение', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_napriazhenie'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_max_nagruzka')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Максимальная нагрузка', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_max_nagruzka'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_diametr')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Диаметр', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_diametr'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_material_korpusa')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Материал корпуса', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_material_korpusa'); ?>
							</div>
						</div>
						<?php endif; ?>	

						<?php if(carbon_get_the_post_meta('product_info_svetodiod')): ?>
						<div class="product_params_item w-full md:w-1/2 flex items-end justify-between md:px-4 py-5 md:py-2">
							<div>
								<?php _e('Светодиоды', 'welbrix'); ?>
							</div>
							<div>
								<?php echo carbon_get_the_post_meta('product_info_svetodiod'); ?>
							</div>
						</div>
						<?php endif; ?>	

					</div>
				</div>
			</div>
			<!-- END ХАРАКТЕРИСТИКИ ПРОДУКТА -->
		</div>
	</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>