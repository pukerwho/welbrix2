<!-- Баннеры -->
<div class="banners mb-20">
  <div class="container mx-auto px-4 md:px-0">
    <div class="flex flex-col md:flex-row md:items-center md:-mx-4">
      <?php 
        $banners = crb_get_i18n_theme_option('crb_main_banners');
        foreach ($banners as $banner):
      ?>
        <div class="w-full md:w-1/<?php echo count($banners); ?> md:px-4 mb-3 md:mb-0">
          <div class="banner">
            <a href="<?php echo $banner['crb_main_banner_link']; ?>" class="banner_link"></a>
            <!-- PHOTO -->
            <?php 
              $banner_src_medium = wp_get_attachment_image_src($banner['crb_main_banner_img'], 'medium'); 
              $banner_src_large = wp_get_attachment_image_src($banner['crb_main_banner_img'], 'large'); 
              $banner_src_full = wp_get_attachment_image_src($banner['crb_main_banner_img'], 'full'); 
            ?>
            <img srcset="<?php echo $banner_src_medium[0] ?> 767w, 
            <?php echo $banner_src_large[0] ?> 1280w,
            <?php echo $banner_src_full[0] ?> 1440w"
            sizes="(max-width: 767px) 767px,
            (max-width: 1280px) 1280px,
            1440px"
            src="<?php echo $banner_src_full[0] ?>" alt="" loading="lazy" class="banner_img">
            <!-- END PHOTO -->
            <div class="banner_info px-6 py-4">
              <div class="banner_info_subtitle text-center mb-2"><?php echo $banner['crb_main_banner_subtitle']; ?></div>
              <div class="banner_info_title text-center"><?php echo $banner['crb_main_banner_title']; ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- END Баннеры -->