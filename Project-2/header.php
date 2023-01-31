<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (is_single()) { ?> 
    <meta property="og:type" content="article" />
    <?php } else { ?> 
    <meta property="og:type" content="website" />  
    <?php } ?> 
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:title" content="<Майстерня>" />
    <meta property="og:description" content="Сайти для бізнесу, які створені с душею" />
    <meta property="og:image" content="http://maisternya.com.ua/wp-content/uploads/2022/09/social_cover.jpg" />
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head();?>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container container">
                <div class="header__left">
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <nav class="header__menu">
                        <ul class="header__menu_list container">
                            <li class="header__menu_item"><a href="#reviews" class="header__menu_link"><?php echo carbon_get_theme_option('menu-reviews') ?></a></li>
                            <li class="header__menu_item"><a href="#services" class="header__menu_link"><?php echo carbon_get_theme_option('menu-services') ?></a></li>
                            <li class="header__menu_item"><a href="#about" class="header__menu_link"><?php echo carbon_get_theme_option('menu-about') ?></a></li>
                            <li class="header__menu_item"><a href="#clients" class="header__menu_link"><?php echo carbon_get_theme_option('menu-clients') ?></a></li>
                            <li class="header__menu_item"><a href="#portfolio" class="header__menu_link"><?php echo carbon_get_theme_option('menu-portfolio') ?></a></li>
                        </ul>
                    </nav>
                    <a href="#welcome" class="header__logo" data-scroll="#welcome">
                        <span><</span> Майстерня <span>></span>
                    </a>
                    <a href="tel:0955815470" class="header__phone-mobile">
                        <?php 
                            $connect_image_id = carbon_get_theme_option('phone_icon');
                            $connect_image_src = wp_get_attachment_image_url($connect_image_id, 'full');
                        ?>
                        <img src="<?php echo $connect_image_src;?>" alt="0955815470">
                    </a>
                </div>
                <div class="header__right">
                    <a href="tel:0955815470" class="header__phone">
                        <?php echo carbon_get_theme_option('company_phone') ?>
                    </a>
                    <a href="#connect" class="button order" data-scroll="#connect">
                        <?php echo carbon_get_theme_option('cta') ?>
                    </a>
                </div>
            </div>
        </header>