<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <!-- <link rel="stylesheet" href="../css/style.css" inline> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <?php
    wp_head();
  ?>
  <?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>
<body <?php echo body_class(); ?>>
  <header id="header" class="header sticky top-0 z-10" role="banner">
    <div>
      <div class="header_top block bg-white">
        <div class="container mx-auto px-4 md:px-0">
          <div class="flex justify-between items-center">
            <div class="hidden md:flex items-center header_top_menu">
              <div class="mr-4 border-r-2">
                <?php wp_nav_menu([
                  'theme_location' => 'top_header',
                  'container' => 'ul',
                  'menu_class' => 'flex',
                ]); ?>    
              </div>
              <!-- Соцсети -->
              <ul class="flex items-center">
                <li class="relative flex items-start mr-2">
                  <a href="<?php echo carbon_get_theme_option('crb_contact_instagram'); ?>" class="w-full h-full absolute left-0 right-0 z-10"></a>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/instagram-icon-stroke.svg">
                </li>
                <li class="relative flex items-start mr-2">
                  <a href="<?php echo carbon_get_theme_option('crb_contact_youtube'); ?>" class="w-full h-full absolute left-0 right-0 z-10"></a>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/youtube-icon-stroke.svg">
                </li>
                <li class="relative flex items-start">
                  <a href="<?php echo carbon_get_theme_option('crb_contact_facebook'); ?>" class="w-full h-full absolute left-0 right-0 z-10"></a>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook-icon-stroke.svg">
                </li>
              </ul>
              <!-- END Соцсети -->
            </div>
            <div class="w-full md:w-auto flex justify-between md:justify-start items-center">
              <div class="hidden md:flex items-center mr-6">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/phone-icon.svg" class="mr-2">
                <?php $phones = carbon_get_theme_option('crb_contact_phones');
                foreach (array_slice($phones, 0, 1) as $phone): ?>
                  <a href="tel:<?php echo $phone['crb_contact_phone']; ?>"><?php echo $phone['crb_contact_phone']; ?></a>
                <?php endforeach; ?>
              </div>
              <div class="flex items-center mr-6">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/clock-icon.svg" class="mr-2">
                <span><?php _e('Пн-Сб с 9:00 до 18:00', 'welbrix'); ?></span>
              </div>
              <div class="lang">
                <?php wp_nav_menu([
                  'theme_location' => 'lang_header',
                  'container' => 'div',
                  'menu_class' => 'flex',
                ]); ?> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container mx-auto px-4 md:px-0">
          <div class="flex justify-between items-center">
            <div class="logo">
              <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/logo.svg" alt="Лого">
              </a>
            </div>
            <div class="flex items-center md:hidden">
              <div class="header_bottom_icon">
                <?php $phones = carbon_get_theme_option('crb_contact_phones');
                foreach (array_slice($phones, 0, 1) as $phone): ?>
                  <a href="tel:<?php echo $phone['crb_contact_phone']; ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/telephone-white.svg" width="22">
                  </a>
                <?php endforeach; ?>
              </div>
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
              <div class="header_toggle md:hidden">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
            <div class="hidden md:flex items-center">
              <div class="header_bottom_menu">
                <?php wp_nav_menu([
                  'theme_location' => 'bottom_header',
                  'container' => 'ul',
                  'menu_class' => 'flex',
                ]); ?> 
              </div>
              <div class="flex items-center">
                <div class="header_bottom_icon search-icon cursor-pointer modal-js" data-modal="search">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/search-icon.svg">  
                </div>
                <div class="header_bottom_icon">
                  <a href="<?php echo home_url(); ?>/wishlist">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/fav-icon.svg">
                  </a>
                </div>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="mobile-menu">
    <div class="container px-4">
      <?php wp_nav_menu([
        'theme_location' => 'mobile_menu',
        'container' => 'ul',
        'menu_class' => 'flex flex-col py-5',
      ]); ?>     
      <div class="phone mb-6 pt-6">
        <?php $phones = carbon_get_theme_option('crb_contact_phones');
        foreach (array_slice($phones, 0, 1) as $phone): ?>
          <a href="tel:<?php echo $phone['crb_contact_phone']; ?>" class="flex items-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/phone-icon.svg" width="18" class="mr-2 -mt-1">
            <span><?php echo $phone['crb_contact_phone']; ?></span>
          </a>
        <?php endforeach; ?>
      </div>
      <!-- Соцсети -->
      <ul class="flex items-center">
        <li class="relative flex items-start mr-4">
          <a href="<?php echo carbon_get_theme_option('crb_contact_instagram'); ?>" class="w-full h-full absolute left-0 right-0 z-10"></a>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/instagram-icon-stroke.svg">
        </li>
        <li class="relative flex items-start mr-4">
          <a href="<?php echo carbon_get_theme_option('crb_contact_youtube'); ?>" class="w-full h-full absolute left-0 right-0 z-10"></a>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/youtube-icon-stroke.svg">
        </li>
        <li class="relative flex items-start">
          <a href="<?php echo carbon_get_theme_option('crb_contact_facebook'); ?>" class="w-full h-full absolute left-0 right-0 z-10"></a>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook-icon-stroke.svg">
        </li>
      </ul>
      <!-- END Соцсети -->
    </div>

    
  </div>
  <section id="content" role="main">