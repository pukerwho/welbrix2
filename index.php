<?php get_header(); ?>

<!-- ТОП ИНФОРМАЦИЯ -->
<div class="bg-white">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex flex-col py-4">
			<!-- Хлебные крошки -->
			<div>
				<?php get_template_part('components/breadcrumbs/news'); ?>
			</div>
			<!-- END Хлебные крошки -->
			<div>
				<h1><?php _e('Новости', 'welbrix'); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="container mx-auto px-4 md:px-6 lg:px-0 py-12">
	<div class="flex flex-wrap md:-mx-3">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="w-full md:w-1/3 lg:w-1/4 md:px-3 mb-6">
					<div class="single_item h-full relative flex flex-col bg-white">
						<a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0"></a>
						<div class="single_item_thumb mb-5">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="single_item_date px-3 mb-3">
							<?php echo get_the_modified_time('j.n.Y') ?>
						</div>
						<div class="single_item_title px-3 mb-3">
							<?php the_title(); ?>
						</div>
						<div class="single_item_desc px-3 pb-3">
							<?php 
								$content_text = wp_strip_all_tags( get_the_content() );
								echo mb_strimwidth($content_text, 0, 125, '...');
							?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php _e('Публикаций нет', 'welbrix'); ?>
		<?php endif; ?>	
	</div>
</div>

<?php get_footer(); ?>