<div class="checkout_box bg-white rounded mb-8 p-5">
	<h2 class="normal-case mb-12">2. <?php _e('Доставка', 'welbrix'); ?></h2>
	<div class="op">
		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			<?php wc_cart_totals_shipping_html(); ?>
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php do_action( 'woocommerce_checkout_shipping' ); ?>
		
	</div>
</div>