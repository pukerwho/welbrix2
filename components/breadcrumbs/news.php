<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
  <ul class="flex">
		<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			<a itemprop="item" href="<?php echo home_url(); ?>" class="breadcrumbs_home">
				<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
			</a>                        
			<meta itemprop="position" content="1">
		</li>
		<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			
			<a itemprop="item" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
				<span itemprop="name"><?php _e('Новости', 'welbrix'); ?></span>
			</a>                        
			<meta itemprop="position" content="2">
		</li>
  </ul>
</div>