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
					<?php get_template_part('components/breadcrumbs/archive'); ?>
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
				<div class="contact_block">
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
			</div>
			<div class="w-full md:w-2/3 md:px-2">
				<h2 class="mb-6"><?php _e('Обратная связь', 'welbrix'); ?></h2>
				<div>
					<!-- ФОРМА -->
		      <form name="form_contact">
		      	<div class="flex flex-wrap md:-mx-2 mb-4">
		      		<div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
			      		<input type="email" name="Email" placeholder="<?php _e('Email', 'welbrix'); ?>" class="w-full text-sm rounded border-custom-blue py-4 px-2" required>	
		      		</div>
			      	<div class="w-full md:w-1/2 px-2">
				      	<input type="tel" name="Телефон" placeholder="<?php _e('Телефон', 'welbrix'); ?>" class="w-full text-sm rounded border-custom-blue px-2 py-4">		
			      	</div>
		      	</div>
		      	<textarea name="Сообщение" rows="5" class="w-full text-sm text-black py-4 px-2 mb-4 rounded border-custom-blue" placeholder="<?php _e('Сообщение', 'welbrix'); ?>"></textarea>	
		        <button type="submit" class="form_submit flex">
		          <?php _e('Отправить', 'welbrix'); ?>
		        </button>	
		      </form>
		      <div class="success_contact hidden bg-green-500 px-2 py-4 mt-4">
		        👌 <?php _e('Отлично, мы получили Вашу заявку. В ближайшее время с Вами свяжется наш менеджер', 'welbrix'); ?>. 
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