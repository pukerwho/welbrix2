<div class="header_bottom_icon cart">
  <a href="<?php echo wc_get_cart_url(); ?>">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/cart-icon.svg">
    <?php 
      global $woocommerce;
      $count = $woocommerce->cart->cart_contents_count;
      if ($count != 0) {
        echo '<span>';
        echo $count;  
        echo '</span>';
      }
    ?>
  </a>
</div>