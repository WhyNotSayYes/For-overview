<?php

    if(!defined('ABSPATH')) {
        exit;
    }
    
     use Carbon_Fields\Container;
     use Carbon_Fields\Field;
 
     Container::make( 'theme_options', 'Настройки сайта' )
        ->add_tab ('Основные', array(
            Field::make( 'text', 'company_phone', 'Номер для звонков' ),
            Field::make( 'text', 'company_inst', 'Instagram' ),
            Field::make( 'text', 'company_fb', 'Facebook' ),
            Field::make( 'text', 'company_tg', 'Telegram' ),
            Field::make( 'text', 'cta', 'Текст CTA' ),
            Field::make( 'text', 'consultation', 'Получить консультацию' ),
            Field::make( 'text', 'send', 'Кнопка "Отправить"' ),
            Field::make( 'text', 'more', 'Кнопка "Еще"' ),
            Field::make( 'text', 'tothesite', 'Кнопка "Перейти на сайт"' )
        ))
        ->add_tab ('Иконки', array(
            Field::make( 'image', 'inst_icon', 'Instagram' ),
            Field::make( 'image', 'fb_icon', 'Facebook' ),
            Field::make( 'image', 'tg_icon', 'Telegram' ),
            Field::make( 'image', 'phone_icon', 'Иконка телефона' ),
            Field::make( 'image', 'close_icon', 'Кнопка ЗАКРЫТЬ' )
        ))
        ->add_tab ('Навигация', array(
            Field::make( 'rich_text', 'menu-reviews', 'Название раздела "Отзывы"' ),
            Field::make( 'rich_text', 'menu-services', 'Название раздела "Услуги"' ),
            Field::make( 'rich_text', 'menu-about', 'Название раздела "О нас"' ),
            Field::make( 'rich_text', 'menu-clients', 'Название раздела "ЦА"' ),
            Field::make( 'rich_text', 'menu-portfolio', 'Название раздела "Портфолио"' )
        ));

?>