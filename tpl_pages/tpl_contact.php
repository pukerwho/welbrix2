<?php
/*
Template Name: КОНТАКТЫ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- ТОП ИНФОРМАЦИЯ -->
	<div class="bg-white">
		<div class="container mx-auto px-4 md:px-0">
			<div class="flex flex-col py-4">
				<!-- Хлебные крошки -->
				<div>
					<?php get_template_part('components/breadcrumbs/page'); ?>
				</div>
				<!-- END Хлебные крошки -->
				<div>
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container mx-auto px-4 md:px-6 lg:px-0 py-12">
		<div class="flex flex-wrap flex-col md:flex-row md:-mx-2">
			<div class="w-full md:w-1/3 mb-6 md:mb-0 md:px-2">
				<h2 class="mb-6"><?php _e('Связаться с нами', 'welbrix'); ?></h2>
				<div class="contact_block mb-8">
  				<li class="flex items-start mb-4">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/phone-transparent-icon.svg" class="mr-2">
						<div class="flex flex-col">
							<?php $phones = carbon_get_theme_option('crb_contact_phones');
							foreach ($phones as $phone): ?>
								<a href="tel:<?php echo $phone['crb_contact_phone']; ?>"><?php echo $phone['crb_contact_phone']; ?></a>
							<?php endforeach; ?>
						</div>
  				</li>
  				<li class="flex items-center mb-4">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/clock-transparent-icon.svg" class="mr-2">
						<span><?php _e('Пн-Сб с 9:00 до 18:00', 'welbrix'); ?></span>
  				</li>
  				<li class="flex items-start mb-4">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/mail-icon.svg" class="mr-2">
						<a href="mailto:<?php echo carbon_get_theme_option('crb_contact_email'); ?>"><?php echo carbon_get_theme_option('crb_contact_email'); ?></a>
  				</li>
  			</div>

  			<h2 class="mb-6"><?php _e('Мы в соцсетях', 'welbrix'); ?></h2>
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
			<div class="w-full md:w-2/3 md:px-2">

				<!-- АДРЕС -->
				<h2 class="mb-6"><?php _e('Адрес склада', 'welbrix'); ?></h2>
				<div>
					<div class="flex items-start mb-4">
						<div class="mr-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#10084C">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
							</svg>
						</div>
						<div class="flex flex-col">
							<span class="font-light"><?php echo crb_get_i18n_theme_option('crb_contact_address'); ?></span>
						</div>
  				</div>
  				<div class="mb-8">
  					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2569.233843746876!2d36.42172391548856!3d49.913185733811936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41270c56181830ab%3A0x6a3185cecb0d37fa!2z0YPQuy4g0KDQvtCz0LDQvdGB0LrQsNGPLCAxNDksINCl0LDRgNGM0LrQvtCyLCDQpdCw0YDRjNC60L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA2MTAwMA!5e0!3m2!1sru!2sua!4v1634935773245!5m2!1sru!2sua" width="100%" height="375" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  				</div>
				</div>
				<!-- END АДРЕС -->

				<h2 class="mb-6"><?php _e('Обратная связь', 'welbrix'); ?></h2>
				<div>
					<!-- ФОРМА -->
		      <form name="form_contact">
		      	<div class="flex flex-wrap md:-mx-2 mb-4">
		      		<div class="w-full md:w-1/2 md:px-2 mb-4 md:mb-0">
			      		<input type="email" name="Email" placeholder="<?php _e('Email', 'welbrix'); ?>" class="w-full text-sm rounded border-custom-blue py-4 px-2" required>	
		      		</div>
			      	<div class="w-full md:w-1/2 md:px-2">
				      	<input type="tel" name="Телефон" placeholder="<?php _e('Телефон', 'welbrix'); ?>" class="w-full text-sm rounded border-custom-blue px-2 py-4">		
			      	</div>
		      	</div>
		      	<textarea name="Сообщение" rows="5" class="w-full text-sm text-black py-4 px-2 mb-4 rounded border-custom-blue" placeholder="<?php _e('Сообщение', 'welbrix'); ?>"></textarea>	
		        <button type="submit" class="form_submit flex">
		          <?php _e('Отправить', 'welbrix'); ?>
		        </button>	
		      </form>
		      <div class="success_contact hidden bg-green-500 px-2 py-4 mt-4">
		        👌 <?php _e('Отлично, мы получили Ваше сообщение. В ближайшее время с Вами свяжется наш менеджер', 'welbrix'); ?>. 
		      </div>
		      <!-- END ФОРМА -->
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>