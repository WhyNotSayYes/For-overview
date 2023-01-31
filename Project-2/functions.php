<?php

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

function wpassist_remove_block_library_css(){
wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

//подключение шрифтов, стилей и скриптов
add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts() {
    //шрифты
    add_action('wp_head', 'google_fonts');
    function google_fonts() {
        ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500&family=Montserrat:wght@400;500;600&family=Roboto:wght@700;900&display=swap" rel="stylesheet">

        <?php
    }


    function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
        wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
    }
    
    function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
        wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
    }
    
    //стили
    enqueue_versioned_style('main', '/assets/css/main.css' );
    enqueue_versioned_style('normalize', '/assets/css/normalize.css' );
    enqueue_versioned_style('animations', '/assets/css/animations.css' );
    enqueue_versioned_style('header', '/assets/css/header.css' );
    enqueue_versioned_style('welcome', '/assets/css/welcome.css' );
    enqueue_versioned_style('reviews', '/assets/css/reviews.css' );
    enqueue_versioned_style('services', '/assets/css/services.css' );
    enqueue_versioned_style('order-block', '/assets/css/order-block.css' );
    enqueue_versioned_style('about-us', '/assets/css/about.css' );
    enqueue_versioned_style('clients', '/assets/css/clients.css' );
    enqueue_versioned_style('portfolio', '/assets/css/portfolio.css' );
    enqueue_versioned_style('connect', '/assets/css/connect.css' );
    enqueue_versioned_style('footer', '/assets/css/footer.css' );
    enqueue_versioned_style('modal', '/assets/css/modal.css' );
    enqueue_versioned_style('project-page', '/assets/css/project-page.css' );
    enqueue_versioned_style('responsive', '/assets/css/responsive.css' );

    //скрипты
    wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), array(), null, true );
        wp_enqueue_script( 'jquery' );
    enqueue_versioned_script('burger', '/assets/js/burger.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('appearance', '/assets/js/appearance.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('slick', '/assets/js/slick.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('slider', '/assets/js/slider.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('scroll', '/assets/js/scroll.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('showmore', '/assets/js/showmore.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('dropdown', '/assets/js/dropdown.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('popup', '/assets/js/modal.js', array(), '0.0.0.0', true);
    enqueue_versioned_script('form', '/assets/js/form.js', array(), '0.0.0.0', true);

};

    //carbon fields
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