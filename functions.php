<?php
include('inc/enqueues.php');
// require_once get_template_directory() . '/inc/TGM/example.php';

function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support('woocommerce');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );

require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
require_once get_template_directory() . '/inc/custom-fields/product-meta.php';
require_once get_template_directory() . '/inc/welbrix-functions/woocommerce-functions.php';

function welbrix_scripts() {
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/css/style.css', false, time() );
    // wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/js/all.js', '','',true);
};
add_action( 'wp_enqueue_scripts', 'welbrix_scripts' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

add_action( 'after_setup_theme', function() {
  remove_theme_support( 'yoast-seo-breadcrumbs' );
}, 20 );

register_nav_menus( array(
    'top_header' => 'Верхнее меню',
    'bottom_header' => 'Основное меню',
    'lang_header' => 'Вывод языков',
    'footer_cat' => 'ФУТЕР (Категории)',
    'footer_info' => 'ФУТЕР (Информация)',
    'footer_links' => 'ФУТЕР (Ссылки)',
    'mobile_menu' => 'Мобильное основное меню',
) );

function editLoginPage() { ?>
  <style type="text/css">
    #login h1 a {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/icons/logo.svg);
      display: block;
      width: 153px;
      height: 18px;
      background-size: auto;
    }
  </style>
<?php }

add_action('login_enqueue_scripts', 'editLoginPage');

function editLoginPageTitle() {
  return 'Welbrix';
}

add_action('login_headertext', 'editLoginPageTitle');

function editLoginPageTitleUrl() {
  return 'https://welbrix.com.ua';
}

add_action('login_headerurl', 'editLoginPageTitleUrl');

function my_custom_upload_mimes($mimes = array()) {
    $mimes['svg'] = "image/svg+xml";
    $mimes['webp'] = 'image/webp';  
    return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');


//CARBON FIELDS + WPML
function crb_get_i18n_suffix() {
    $suffix = '';
    if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
        return $suffix;
    }
    $suffix = '_' . ICL_LANGUAGE_CODE;
    return $suffix;
}

function crb_get_i18n_theme_option( $option_name ) {
    $suffix = crb_get_i18n_suffix();
    return carbon_get_theme_option( $option_name . $suffix );
}