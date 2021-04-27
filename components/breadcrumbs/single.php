<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
  <ul class="flex">
		<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			<a itemprop="item" href="<?php echo home_url(); ?>" class="breadcrumbs_home">
				<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
			</a>                        
			<meta itemprop="position" content="1">
		</li>
		<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			<a itemprop="item" href="#">
				<span itemprop="name"><?php _e('Новости', 'welbrix'); ?></span>
			</a>                        
			<meta itemprop="position" content="2">
		</li>
		<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			<a itemprop="item" href="<?php the_permalink(); ?>">
				<span itemprop="name"><?php the_title(); ?></span>
			</a>                        
			<meta itemprop="position" content="3">
		</li>
  </ul>
</div>