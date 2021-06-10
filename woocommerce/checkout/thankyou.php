<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>
<?php if ( $order ) : ?>
	<?php do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>
	<div class="container mx-auto px-4 md:px-6 lg:px-0 py-12">
		<div class="w-full lg:w-8/12 relative flex flex-col md:flex-row items-center bg-white mx-auto py-6">
			<div class="w-1/2 md:w-5/12 mb-6 md:mb-0 mx-auto">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb.png" alt="<?php _e('Страница не найдена', 'welbrix'); ?>" class="thumb_icon">
			</div>
			<div class="w-full md:w-7/12 px-10">
				<div class="mb-6">
					<p class="text-2xl"><?php _e('Ваш заказ', 'welbrix'); ?> #<?php echo $order->get_order_number(); ?> <?php _e('принят', 'welbrix'); ?></p>
					<p><?php _e('Спасибо за ваш заказ! Наши менеджеры свяжутся с вами в ближайшее время, чтобы уточнить все детали и ответить на любые ваши вопросы', 'welbrix'); ?></p>
				</div>
				<div class="block btn_blue py-4">
					<a href="<?php echo home_url(); ?>" class="text-md uppercase">
						<?php _e('На главную', 'welbrix'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		console.log('analytics');
	  gtag('event', 'purchase', {
	    affiliation: 'Google',
	    currency: 'UAH',
	  })
	</script>
<?php endif; ?>