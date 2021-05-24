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