<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- ТОП ИНФОРМАЦИЯ -->
	<div class="bg-white">
		<div class="container mx-auto px-4 md:px-0">
			<div class="flex flex-col py-4">
				<!-- Хлебные крошки -->
				<div>
					<?php get_template_part('components/breadcrumbs/single'); ?>
				</div>
				<!-- END Хлебные крошки -->
				<div>
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container mx-auto px-4 md:px-6 lg:px-0 py-12">
		<div class="w-full lg:w-10/12 bg-white mx-auto px-24 py-8 rounded-lg content">
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<?php get_footer(); ?>