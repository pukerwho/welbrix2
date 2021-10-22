</section>
<!-- CВЯЗАТЬСЯ С НАМИ -->
<div class="send pt-8 pb-6 md:py-3">
  <div class="container mx-auto px-4 md:px-0">
    <div class="block md:hidden mb-12">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/logo.svg" alt="Лого" class="mx-auto">
      </a>
    </div>
    <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center">
      <div class="send_text mb-2 md:mb-0">
        <?php _e('Свяжитесь с нами', 'welbrix'); ?>
      </div>
      <div class="send_form">
        <form name="send_email">
          <div class="flex flex-row">
            <input type="text" name="Email" placeholder="<?php _e('Введите ваш email', 'welbrix'); ?>" required>
            <button type="submit" class="send_btn"><?php _e('Отправить', 'welbrix'); ?></button>
          </div>
        </form>
      </div>
      <!-- <div class="social hidden md:block opacity-75">
        <ul class="flex items-center -mx-3">
          <li class="pr-3"><a href="#"><img src="/img/icons/facebook-icon.svg"></a></li>
          <li class="pr-3"><a href="#"><img src="/img/icons/twitter-icon.svg" alt=""></a></li>
          <li class="pr-3"><a href="#"><img src="echo get_stylesheet_directory_uri(); /img/icons/instagram-icon.svg" alt=""></a></li>
          <li class="pr-3"><a href="#"><img src="echo get_stylesheet_directory_uri();/img/icons/pinterest-icon.svg" alt=""></a></li>
        </ul>
      </div> -->
    </div> 
  </div>
</div>
<!-- END CВЯЗАТЬСЯ С НАМИ -->
<footer id="footer" class="footer hidden md:block bg-white py-10">
  <div class="container mx-auto">
  	<div class="flex flex-wrap -mx-4">

      <!-- Популярные товары -->
      <div class="w-full md:w-6/12 px-4">
        <div class="footer_subtitle mb-5">
          <?php _e('Популярные товары', 'welbrix'); ?>
        </div>
        <div class="flex flex-wrap md:-mx-2">
          <?php 
            $query = new WP_Query( array( 
              'post_type' => 'product', 
              'posts_per_page' => 6,
              'order'    => 'DESC',
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?> 
            <div class="w-full md:w-1/2 relative mb-4 md:px-2">
              <a href="<?php the_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
              <div class="flex">
                <div class="w-1/3 mr-2">
                  <?php echo woocommerce_get_product_thumbnail('thumb'); ?>
                </div>  
                <div class="w-2/3 text-sm">
                  <?php the_title(); ?>
                </div>
              </div>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      <!-- END Популярные товары -->


  		<!-- ПОЛЕЗНЫЕ ССЫЛКИ -->
  		<div class="w-full md:w-3/12 px-4">
  			<div class="footer_subtitle mb-5">
  				<?php _e('Полезные ссылки', 'welbrix'); ?>
  			</div>
  			<div>
  				<?php wp_nav_menu([
            'theme_location' => 'footer_links',
            'container' => 'ul',
          ]); ?>  
  			</div>
  		</div>
  		<!-- END ПОЛЕЗНЫЕ ССЫЛКИ -->

  		<!-- КОНТАКТЫ -->
  		<div class="w-full md:w-3/12 px-4">
  			<div class="footer_subtitle mb-5">
  				<?php _e('Контакты', 'welbrix'); ?>
  			</div>
  			<div class="mb-6">
  				<!-- <li class="flex items-start">
						<img src=" echo get_stylesheet_directory_uri(); /img/icons/location-icon.svg" class="mr-2">
						<span> echo crb_get_i18n_theme_option( 'crb_contact_address' ); </span>
  				</li> -->
  				<li class="flex items-start">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/phone-transparent-icon.svg" class="mr-2">
						<div class="flex flex-col">
							<?php $phones = carbon_get_theme_option('crb_contact_phones');
							foreach ($phones as $phone): ?>
								<a href="tel:<?php echo $phone['crb_contact_phone']; ?>"><?php echo $phone['crb_contact_phone']; ?></a>
							<?php endforeach; ?>
						</div>
  				</li>
  				<li class="flex items-start">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/clock-transparent-icon.svg" class="mr-2">
						<span><?php _e('Пн-Сб с 9:00 до 18:00', 'welbrix'); ?></span>
  				</li>
  				<li class="flex items-start">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/mail-icon.svg" class="mr-2">
						<a href="mailto:<?php echo carbon_get_theme_option('crb_contact_email'); ?>"><?php echo carbon_get_theme_option('crb_contact_email'); ?></a>
  				</li>
  			</div>
        <div class="footer_subtitle mb-5"><?php _e('Мы в соцсетях', 'welbrix'); ?></div>
        <div class="contact_block">
          <li class="flex items-start mb-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/instagram-icon-stroke.svg" class="mr-2">
            <div class="flex flex-col">
              <a href="<?php echo carbon_get_theme_option('crb_contact_instagram'); ?>">Instagram</a>
            </div>
          </li>
          <li class="flex items-start mb-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/youtube-icon-stroke.svg" class="mr-2">
            <div class="flex flex-col">
              <a href="<?php echo carbon_get_theme_option('crb_contact_youtube'); ?>">Youtube</a>
            </div>
          </li>
          <li class="flex items-start mb-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook-icon-stroke.svg" class="mr-2">
            <div class="flex flex-col">
              <a href="<?php echo carbon_get_theme_option('crb_contact_facebook'); ?>">Facebook</a>
            </div>
          </li>
        </div>
  		</div>
  		<!-- END КОНТАКТЫ -->
  	</div>
  </div>
</footer>
<div class="copyright py-2">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex justify-between">
			<div class="copyright_text">
				© 2021, Welbrix
			</div>
			<div class="flex items-center">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/visa-icon.svg" class="mr-2">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/mastercard-icon.svg">
			</div>
		</div>
	</div>
</div>

<!-- MODALS -->

<!-- SEARCH -->
<div class="modal" data-modal="search">
  <div class="search-form h-full w-full py-5">
    <div class="container mx-auto px-4 md:px-0">
      <div class="w-full md:w-8/12 relative mx-auto">
        <div class="modal_content_close text-white -mx-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
        <div class="pt-12">
          <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>    
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ORDER MODAL -->
<div class="modal" data-modal="order">
  <div class="modal_content">
    <div class="modal_content_close">
      ✖️
    </div>
    <div class="text-xl mb-5">
      <?php _e('Купить', 'welbrix'); ?>: <span class="product-title-js"></span>
    </div>
    <div>
      <!-- ФОРМА -->
      <form name="form_order">
        <input type="email" name="Email" placeholder="<?php _e('Email', 'welbrix'); ?>" class="w-full px-2 py-4 mb-4 rounded border-custom-blue" required>
        <input type="tel" name="Телефон" placeholder="<?php _e('Телефон', 'welbrix'); ?>" class="w-full text-black px-2 py-4 mb-4 rounded border-custom-blue">
        <textarea name="Сообщение" rows="5" class="w-full text-black px-2 py-4 mb-4 rounded border-custom-blue" placeholder="<?php _e('Примечания', 'welbrix'); ?>"></textarea>
        <input type="hidden" name="Cтраница" value="<?php echo get_the_permalink(); ?>">
        <input type="hidden" name="Товар" value="<?php the_title(); ?>">
        <button type="submit" class="form_submit flex">
          <?php _e('Отправить', 'welbrix'); ?>
        </button>
      </form>
      <div class="success_order hidden bg-green-500 px-2 py-4 mt-4">
        👌 <?php _e('Отлично, мы получили Вашу заявку. В ближайшее время с Вами свяжется наш менеджер', 'welbrix'); ?>. 
      </div>
      <!-- END ФОРМА -->
    </div>
  </div>
</div>
<!-- END ORDER MODAL -->

<div class="modal-bg"></div>

<?php wp_footer(); ?>
</body>
</html>