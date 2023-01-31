<?php

    if(!defined('ABSPATH')) {
        exit;
    }
    
     use Carbon_Fields\Container;
     use Carbon_Fields\Field;
 
     Container::make( 'theme_options', 'Общие настройки' )
        ->add_tab ('Хэдер', array(
            Field::make( 'image', 'site_logo', 'Логотип' ),
            Field::make( 'image', 'search_icon', 'Иконка поиска' )->set_width(25),
            Field::make( 'image', 'account_icon', 'Иконка ЛК' )->set_width(25),
            Field::make( 'image', 'account_icon_mob', 'Иконка ЛК (в бургере)' )->set_width(25),
            Field::make( 'image', 'cart_icon', 'Иконка корзины' )->set_width(25),
            Field::make( 'text', 'contact_number', 'Телефон для входящих (текст)' )->set_width(50),
            Field::make( 'text', 'number_to_call', 'Телефон для входящих (ссылка)' )->set_width(50)
        ))
        ->add_tab ('Футер', array(
            Field::make( 'text', 'footer_adress', 'Адрес' )->set_width(50),
            Field::make( 'text', 'footer_schedule', 'График работы' )->set_width(50),
            Field::make( 'text', 'inst_link', 'Ссылка на Инстаграм' )->set_width(50),
            Field::make( 'text', 'fb_link', 'Ссылка на Фейсбук' )->set_width(50),
            Field::make( 'text', 'email_adress', 'E-mail' )->set_width(50),
            Field::make( 'rich_text', 'footer_map', 'Параметры карты' )
        ))

        ->add_tab ('Кнопки', array(
            Field::make( 'text', 'callback_btn_text', 'Заказать звонок' )->set_width(50),
            Field::make( 'text', 'callback_btn_text_footer', 'Заказать звонок (футер)' )->set_width(50),
        ))

        ->add_tab ('Карточка товара (сайдбар)', array(
            Field::make( 'image', 'stocks_icon', 'Иконка для раздела "Остатки"' ),

            Field::make( 'image', 'payments_icon', 'Иконка для вариантов оплаты' )->set_width(50),
            Field::make('complex', 'payment_options', 'Варианты оплаты')->set_width(50)
            ->add_fields( array(
                Field::make( 'text', 'payment_option', 'Вариант')
            )),

            Field::make( 'image', 'shipping_icon', 'Иконка для вариантов доставки' )->set_width(50),
            Field::make('complex', 'shipping_options', 'Варианты доставки')->set_width(50)
            ->add_fields( array(
                Field::make( 'text', 'shipping_option', 'Вариант')
            )),

            Field::make( 'image', 'guarantee_icon', 'Иконка для раздела "Гарантии"' )->set_width(50),
            Field::make('complex', 'guarantee_options', 'Гарантии')->set_width(50)
            ->add_fields( array(
                Field::make( 'text', 'guarantee_option', 'Текст')
            ))
        ))
?>