<?php

//отключение админбара для всех, кроме админа
add_action( 'init', function(){

	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}

} );

//отключаю удаление span
function pp_override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
    }
    add_filter('tiny_mce_before_init', 'pp_override_mce_options');

//удаляю лишний код Вордпресс
remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

//отключение встроенных стилей и скриптов
add_action('wp_enqueue_scripts', 'remove_default_styles_and_scripts');
function remove_default_styles_and_scripts() {
    wp_dequeue_style( 'wp-block-library' );

    if(!is_woocommerce() || !is_cart() || !is_checkout()) {
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-blocktheme');
        wp_dequeue_style('wc-blocks-vendors-style');
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_style('classic-theme-styles');
        
        if(!is_user_logged_in()) {
            wp_deregister_style('dashicons');
        }
        
        wp_dequeue_script('hoverintent');
        wp_dequeue_script('jquery-blockui');
    }
}

//подключение шрифтов
add_action('wp_head', 'google_fonts');

function google_fonts() {
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet">

    <?php
}

//подключение стилей и скриптов для всего сайта

function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
	wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
}

function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
	wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}

add_action('wp_enqueue_scripts', 'site_scripts_and_styles');
function site_scripts_and_styles() {
    global $template;

    //стили
    wp_dequeue_style('select2');
    if('archive-product.php' || 'taxonomy-product-cat.php' == basename($template) || is_checkout()) {
        wp_enqueue_style('select2');
    }

    enqueue_versioned_style('normalize', '/assets/css/normalize.css' );
    enqueue_versioned_style('main', '/assets/css/main.css' );
    enqueue_versioned_style('goods-grid', '/assets/css/goods-grid.css' );
    enqueue_versioned_style('catalog', '/assets/css/catalog.css' );
    enqueue_versioned_style('good-card', '/assets/css/good-card.css' );
    enqueue_versioned_style('cart', '/assets/css/cart.css' );
    enqueue_versioned_style('popups', '/assets/css/popups.css' );

    if('single-product.php' == basename($template)) {
        enqueue_versioned_style('landing', '/assets/css/landing.css' );
    }

    if(is_checkout()) {
        enqueue_versioned_style('ordering', '/assets/css/ordering.css' );
    }

    if('page-my-account.php' == basename($template)) {
        enqueue_versioned_style('personal-account', '/assets/css/personal-account.css' );
    }

    if('page-blog.php' == basename($template)) {
        enqueue_versioned_style('blog', '/assets/css/blog.css' );
    }

    if('page-post.php' || 'page-about.php' == basename($template)) {
        enqueue_versioned_style('blog-article', '/assets/css/blog-article.css' );
    }

    if('page-wholesale.php' || 'page-shipping-and-payment.php' == basename($template)) {
        enqueue_versioned_style('shipping-and-payment', '/assets/css/delivery-and-wholesale.css' );
    }

    if('page-contacts.php' == basename($template)) {
        enqueue_versioned_style('contacts', '/assets/css/contacts.css' );
    }
    
    if('page-reviews.php' == basename($template)) {
        enqueue_versioned_style('reviews', '/assets/css/reviews.css' );
    }
    
    if('page-cart.php' == basename($template) || is_checkout()) {
        enqueue_versioned_style('cart-page', '/assets/css/cart-page.css' );
    }

    if('page-lost-pass.php' == basename($template)) {
        enqueue_versioned_style('lost-pass', '/assets/css/lost-pass.css' );
    }
    
    enqueue_versioned_style('responsive', '/assets/css/responsive.css' );



    //скрипты
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'jquery' );

    enqueue_versioned_script('burger', '/assets/js/burger.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('buyOnOneClick', '/assets/js/buyOnOneClick.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('tabs', '/assets/js/tabs.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('product-quantity', '/assets/js/product-quantity.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('modal', '/assets/js/modal.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('favorites', '/assets/js/favorites.js', array(), '0.0.0.0', true);

    enqueue_versioned_script('arrowsInCategories', '/assets/js/arrowsInCategories.js', array(), '0.0.0.0', true);

    if(is_cart() || is_checkout()) {
        wp_dequeue_script( 'wc-cart' );
        enqueue_versioned_script('custom-cart', '/assets/js/custom-cart.js', array(), '0.0.0.0', true);
    }

    if(is_checkout()) {
        enqueue_versioned_script('remove-woo-wrapper', '/assets/js/removeWooWrapper.js', array(), '0.0.0.0', true);
    }

    if('page-home.php' || 'single-product.php' || 'page-reviews.php' == basename($template)) {
        enqueue_versioned_script('slick', '/assets/js/slick.min.js', array(), '0.0.0.0', true);
        enqueue_versioned_script('slider', '/assets/js/slider.js', array(), '0.0.0.0', true);
    }

    if(is_front_page()) {
        enqueue_versioned_script('countdown', '/assets/js/countdown.js', array(), '0.0.0.0', true);
    }

    if(is_checkout()) {
        enqueue_versioned_script('toggleComment', '/assets/js/toggleComment.js', array(), '0.0.0.0', true);
        enqueue_versioned_script('NP-customizing', '/assets/js/NP-customizing.js', array(), '0.0.0.0', true);
        enqueue_versioned_script('shippingFieldsControl', '/assets/js/shippingFieldsControl.js', array(), '0.0.0.0', true);
    }

    if('single-product.php' == basename($template)) {
        enqueue_versioned_script('gallery', '/assets/js/gallery.js', array(), '0.0.0.0', true);
        enqueue_versioned_script('blowup-main', '/assets/js/blowup.min.js', array(), '0.0.0.0', true);
        enqueue_versioned_script('blowup-console', '/assets/js/blowup-console.js', array(), '0.0.0.0', true);
    }

    if('archive-product.php' || 'taxonomy-product-cat.php' == basename($template) || is_checkout()) {
        wp_enqueue_script('select2');
        enqueue_versioned_script('customSelect', '/assets/js/customSelect.js', array(), '0.0.0.0', true);
    }
}


//подключение поддержки WooCommerce

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//подключение меню
add_action('after_setup_theme', 'site_navigation');
function site_navigation() {
    register_nav_menus([
        'header_menu' => 'Меню в шапке',
        'mobile_menu' => 'Меню для моб.устройств',
        'footer_menu' => 'Меню в футере'
    ]);
}

//подключение css-классов к элементам меню li
add_filter('nav_menu_css_class', 'custom_class_for_li', 10, 4);
function custom_class_for_li($classes, $item, $args, $depth) {
    if($args->theme_location === 'header_menu') {
        $classes[] = 'header__menu_item';
    }
    if($args->theme_location === 'mobile_menu') {
        $classes[] = 'mobile__menu_item';
    }
    if($args->theme_location === 'footer_menu') {
        $classes[] = 'footer__menu_item';
    }
    return $classes;
}

//подключение css-классов к элементам меню a
add_filter('nav_menu_link_attributes', 'custom_class_for_a', 10, 4);
function custom_class_for_a($atts, $menu_item, $args, $depth) {
    if($args->theme_location === 'header_menu') {
        $atts['class'] = 'header__menu_link';
    }
    if($args->theme_location === 'mobile_menu') {
        $atts['class'] = 'mobile__menu_link';
    }
    if($args->theme_location === 'footer_menu') {
        $atts['class'] = 'footer__menu_link';
    }

    return $atts;
}


//подключение Carbon Fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
require_once( 'includes/carbon-fields/vendor/autoload.php' );
\Carbon_Fields\Carbon_Fields::boot();
};

add_action('carbon_fields_register_fields','register_carbon_fields');
function register_carbon_fields() {
    require_once('includes/carbon-fields-options/theme-options.php');
    require_once('includes/carbon-fields-options/post-meta.php');
};

//подключение дочерних файлов functions
require 'includes/child-functions/catalogue-functions.php';
require 'includes/child-functions/single-product-functions.php';
require 'includes/child-functions/cart-functions.php';
require 'includes/child-functions/checkout-functions.php';
require 'includes/child-functions/my-account-functions.php';
require 'includes/child-functions/blog-functions.php';

?>