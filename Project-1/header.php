<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Агро-Пром</title>

    <?php wp_head(); ?>
</head>

<?php
    $logo_image_id = carbon_get_theme_option('site_logo');
    $logo_image_src = wp_get_attachment_image_url($logo_image_id, 'full');
    $search_image_id = carbon_get_theme_option('search_icon');
    $search_image_src = wp_get_attachment_image_url($search_image_id, 'full');
    $account_image_id = carbon_get_theme_option('account_icon');
    $account_image_src = wp_get_attachment_image_url($account_image_id, 'full');
    $account_mob_image_id = carbon_get_theme_option('account_icon_mob');
    $account_mob_image_src = wp_get_attachment_image_url($account_mob_image_id, 'full');
    $cart_image_id = carbon_get_theme_option('cart_icon');
    $cart_image_src = wp_get_attachment_image_url($cart_image_id, 'full');
?>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__row-1">
                <div class="header__container container">
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <div class="header__logo-inner">
                        <?php if(!is_front_page()) : ?>
                        <a href="<?php echo get_home_url(); ?>" class="header__logo_link">
                        <?php endif; ?>
                            <img src="<?php echo $logo_image_src; ?>" alt="logo" class="header__logo"></img>
                        <?php if(!is_front_page()) : ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    
                    <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="header__search">
                        <input type="text" name="s" class="search__input" placeholder="Знайти...">
                        <input type="hidden" name="post_type" value="product" />
                        <button type="submit" class="search__button">
                            <img src="<?php echo $search_image_src; ?>" alt="search" class="search__icon">
                        </button>
                    </form>

                    <?php if(is_user_logged_in()) { ?>
                    <a href="<?php echo get_page_link(17); ?>" class="header__button button__acc">
                        <img src="<?php echo $account_image_src; ?>" alt="account">
                    </a>
                    <?php } else { ?>
                    <a href="#auth" class="header__button button__acc popup-link">
                        <img src="<?php echo $account_image_src; ?>" alt="account">
                    </a>
                    <?php } ?>

                    <!-- <a href="#cart" class="header__button button__cart popup-link"> -->
                    <a href="<?php echo wc_get_cart_url(); ?>" class="header__button button__cart">
                        <img src="<?php echo $cart_image_src; ?>" alt="cart">
                        <span class="button__cart_quantity"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>

                    <div class="header__languages">
                        Укр / Рус
                    </div>
                    <div class="header__contacts">
                        <div class="header__phone_wrapper">
                            <a href="tel: <?php echo carbon_get_theme_option('number_to_call') ?>" class="header__phone_number">
                                <?php echo carbon_get_theme_option('contact_number') ?>
                            </a>
                        </div>
                        <a href="#callback" class="callback__button orange__button popup-link">
                            <?php echo carbon_get_theme_option('callback_btn_text') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__row-2 nav-bar">
                <nav class="header__menu container">
                    <div class="header__menu-header">
                        <div class="header__logo-inner">
                            <?php if(!is_front_page()) : ?>
                            <a href="<?php echo get_home_url(); ?>" class="header__logo_link">
                            <?php endif; ?>
                                <img src="<?php echo $logo_image_src; ?>" alt="logo" class="header__logo"></img>
                            <?php if(!is_front_page()) : ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="header__languages">
                            Укр / Рус
                        </div>
                    </div>
                    <div class="header__menu_login menu-login">
                        <?php if(is_user_logged_in()) { ?>
                            <img src="<?php echo $account_mob_image_src; ?>" alt="icon" class="menu-login__icon">
                            <a href="<?php echo get_page_link(17); ?>" class="menu-login__link">Мій аккаунт</a>
                        <?php } else { ?>
                            <img src="<?php echo $account_mob_image_src; ?>" alt="icon" class="menu-login__icon">
                            <a href="#auth" class="menu-login__link popup-link">Вхід</a>
                            <span>/</span>
                            <a href="#auth" class="menu-login__link popup-link">Реєстрація</a>
                        <?php } ?>

                    </div>
                    <?php 
                    //меню для десктопа
                    wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'container' => false,
                        'menu_class' => 'header__menu_list',
                    ]);

                    //меню для мобил и планшетов
                    wp_nav_menu([
                        'theme_location' => 'mobile_menu',
                        'container' => false,
                        'menu_class' => 'mobile__menu_list',
                    ]);
                    ?>
                    
                    <a href="#callback" class="callback__button orange__button popup-link">
                        <?php echo carbon_get_theme_option('callback_btn_text') ?>
                    </a>
                    
                </nav>
            </div>
        </header>