<!-- БЛОГ -->
<div class="mb-20 md:mb-32">
	<div class="container mx-auto px-4 md:px-0">
		<div class="flex items-end justify-between mb-8 md:mb-12">
			<h2><?php _e('Новое в нашем блоге', 'welbrix'); ?></h2>
			<div class="hidden md:block">
				<a href="<?php echo get_post_type_archive_link( 'posts' ); ?>" class="dark-link uppercase"><?php _e('Читать все', 'welbrix'); ?></a>
			</div>
		</div>
		<div class="flex flex-wrap items-center md:-mx-4">
			<?php 
				$blog_query = new WP_Query( array( 
					'post_type' => 'post', 
					'posts_per_page' => 3,
				) );
			if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
				<div class="w-full md:w-1/3 md:px-4 mb-8 md:mb-0">
					<div class="post">
						<a href="<?php the_permalink(); ?>" class="post_link"></a>
						<div class="post_thumb">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="post_img">	
						</div>
						<div class="post_content bg-white px-4 pt-8 pb-6">
							<div class="post_title mb-3">
								<?php the_title(); ?>
							</div>
							<div class="post_description">
								Споты светильники — это точечные локальные осветительные приборы. Споты отличаются длительным
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<!-- END БЛОГ -->