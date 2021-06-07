<?php global $product; ?>

<div class="w-full md:w-1/3 px-4">
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
		<div class="py-3 pb-0 md:pb-3">
			<div class="product_card_id px-4 mb-2">
				<?php _e('Код', 'welbrix'); ?>: <?php echo $product->get_sku(); ?>
			</div>
			<div class="product_card_title px-4 mb-8">
				<?php the_title(); ?>
			</div>
			<div class="product_card_price mb-4 md:mb-0 px-4">
				<?php echo $product->get_price_html(); ?>
			</div>
			<div class="product_card_actions flex justify-between items-center">
				<div class="product_card_actions_add js-analytics-add-to-cart" data-item-id="<?php echo $product->get_sku(); ?>" data-item-name="<?php the_title(); ?>" data-item-price="<?php echo $product->get_price_html(); ?>">
					<?php 
						echo apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->get_id() ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() ? 'add_to_cart_button' : '',
						esc_attr( $product->get_type() ),
						esc_html( $product->add_to_cart_text() )
						),
						$product );
					?>
					<!-- <div class="inline-block cursor-pointer px-8 py-3 modal-js" data-modal="order" data-title="the_title();">
						_e('Купить', 'welbrix');
					</div> -->
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