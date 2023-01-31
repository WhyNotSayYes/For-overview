<?php

    if(!defined('ABSPATH')) {
        exit;
    }
    
     use Carbon_Fields\Container;
     use Carbon_Fields\Field;

    //===================================ГЛАВНАЯ СТРАНИЦА
    Container::make( 'post_meta', 'КОНТЕНТ ГЛАВНОЙ СТРАНИЦЫ' )
    ->show_on_page(5)
    ->add_tab('Карусель', array(
        Field::make( 'complex', 'home_slider', 'Добавьте изображения в карусель' )
        ->add_fields(array(
            Field::make('image', 'home_slider_image', 'Выберите изображение')->set_width(25),
            Field::make('text', 'home_slider_upper_title', 'Текст над заголовком')->set_width(25),
            Field::make('text', 'home_slider_title', 'Заголовок')->set_width(25),
            Field::make('text', 'home_slider_under_title', 'Текст под заголовком')->set_width(25),
            Field::make('text', 'home_slider_button_text', 'Текст кнопки')->set_width(50),
            Field::make('text', 'home_slider_button_link', 'Ссылка кнопки')->set_width(50)
        ))
    ))

    ->add_tab('Счетчик', array(
        Field::make('image', 'home_counter_image', 'Выберите изображение'),
        Field::make('rich_text', 'home_counter_text', 'Введите текст'),
        Field::make('date_time', 'home_counter_date_time', 'Выберите конечные дату и время')
    ))
    
    ->add_tab('Раздел "АКЦИИ"', array(
        Field::make('text', 'home_on_sale_title', 'Введите текст заголовка')
    ));

    //===================================КАРТОЧКА ТОВАРА (АДМИНКА)

    //Таб "Комплектация"
    Container::make( 'post_meta', 'Комплектация - контент (нужно объединить с метабоксом "Комплектация")' )
    ->where('post_type', '=', 'product')
    ->add_fields(array(
        Field::make( 'complex', 'equipment_tab_content', 'Контент' )
        ->add_fields(array(
            Field::make('image', 'equipment_tab_image', 'Изображение')->set_width(50),
            Field::make('text', 'equipment_tab_text', 'Текст')->set_width(50)
        ))
    ));
           
    //Таб "Аксессуары"
    Container::make( 'post_meta', 'Аксессуары - баннер (нужно объединить с метабоксом "Аксессуары")' )
    ->where('post_type', '=', 'product')
    ->add_fields(array(
        Field::make('image', 'accessories_tab_banner', 'Изображение баннера')
    ));

    //Таб "Гарантия"
    Container::make( 'post_meta', 'Гарантия - контент (нужно объединить с метабоксом "Гарантия")' )
    ->where('post_type', '=', 'product')
    ->add_fields(array(
        Field::make('complex', 'guarantee_item', 'Элемент списка')
        ->add_fields(array(
            Field::make('image', 'guarantee_item_image', 'Изображение')->set_width(67),
            Field::make('text', 'guarantee_item_number', 'Номер п/п')->set_width(33),
            Field::make('rich_text', 'guarantee_item_text', 'Текст')
        ))
    ));

    // Лэндинг внутри таба "Описание товара"
    Container::make( 'post_meta', 'КОНТЕНТ ЛЕНДИНГА' )
    ->where('post_type', '=', 'product')
    ->add_fields(array(
        Field::make('separator', 'first_separator', __('ПЕРВЫЙ ЭКРАН')),
        Field::make('text', 'landing_title', 'Наименование товара')->set_width(50),
        Field::make('rich_text', 'landing_subtitle', 'Подзаголовок')->set_width(50),
        Field::make('image', 'landing_main_image', 'Основное фото (1125x600)'),

        Field::make('separator', 'description_separator', __('ОПИСАНИЕ')),
        Field::make('complex', 'description_list', 'Характеристики')
        ->add_fields(array(
            Field::make('image', 'description_item_image', 'Изображение')->set_width(50),
            Field::make('text', 'description_item_title', 'Заголовок')->set_width(50),
            Field::make('rich_text', 'description_item_text', 'Текст')
        )),

        Field::make('separator', 'advantages_separator', __('ПРЕИМУЩЕСТВА')),
        Field::make('text', 'advantages_title', 'Отображаемый заголовок раздела'),
        Field::make('complex', 'advantages_list', 'Список преимуществ')
        ->add_fields(array(
            Field::make('image', 'advantages_item_image', 'Изображение')->set_width(50),
            Field::make('rich_text', 'advantages_item_text', 'Текст')->set_width(50)
        )),

        Field::make('separator', 'scopes_separator', __('СФЕРЫ ИСПОЛЬЗОВАНИЯ')),
        Field::make('text', 'scopes_title', 'Отображаемый заголовок раздела'),
        Field::make('rich_text', 'scopes_subtitle', 'Отображаемый подзаголовок раздела'),
        Field::make('complex', 'scopes_list', 'Список сфер')
        ->add_fields(array(
            Field::make('image', 'scopes_item_image', 'Изображение (364x234)')->set_width(50),
            Field::make('rich_text', 'scopes_item_text', 'Текст')->set_width(50)
        )),

        Field::make('separator', 'instruction_separator', __('ИНСТРУКЦИЯ')),
        Field::make('text', 'instruction_title', 'Отображаемый заголовок раздела'),
        Field::make('image', 'instruction_image', 'Изображение внутри раздела (555x410)'),
        Field::make('complex', 'instruction_list', 'Этапы')
        ->add_fields(array(
            Field::make('text', 'instruction_item_number', 'Номер п/п')->set_width(20),
            Field::make('text', 'instruction_item_title', 'Заголовок')->set_width(80),
            Field::make('rich_text', 'instruction_item_text', 'Текст')
        )),

        Field::make('separator', 'checkout_separator', __('КАК ОФОРМИТЬ ЗАКАЗ?')),
        Field::make('text', 'landing_checkout_title', 'Отображаемый заголовок раздела'),
        Field::make('complex', 'landing_checkout_list', 'Этапы оформления заказа')
        ->add_fields(array(
            Field::make('image', 'landing_checkout_item_icon', 'Иконка этапа'),
            Field::make('rich_text', 'landing_checkout_item_text', 'Описание этапа')
        ))

        ));


    //===================================СТРАНИЦА ОТДЕЛЬНОЙ ЗАПИСИ
    Container::make( 'post_meta', 'БАННЕР' )
    ->where('post_type', '=', 'post')
    ->add_fields(array(
        Field::make('image', 'post_baner', 'Выберите изображение')
    ));
        
    //===================================СТРАНИЦА СТАТЕЙ
    Container::make( 'post_meta', 'БАННЕР НА СТРАНИЦЕ СТАТЕЙ' )
    ->show_on_page(202)
    ->add_fields(array(
        Field::make('image', 'blog_baner', 'Выберите изображение')
    ));

    //===================================ДОСТАВКА и ОПЛАТА
    Container::make( 'post_meta', 'КОНТЕНТ СТРАНИЦЫ' )
    ->show_on_page(245)
    ->add_fields(array(
        Field::make('text', 'daw_title', 'Заголовок страницы'),

        Field::make('rich_text', 'daw_keynote', 'Введите "вступительные слова"'),

        Field::make('image', 'daw_image', 'Выберите изображение'),

        Field::make('complex', 'daw_list', 'СПИСОК ДОСТУПНЫХ ВАРИАНТОВ')
        ->add_fields(array(
            Field::make('text', 'daw_list_title', 'Введите заголовок для списка')->set_width(50),
            Field::make('complex', 'daw_list_items', 'Элементы списка')->set_width(50)
            ->add_fields(array(
                Field::make('text', 'daw_list_item', 'Введите текст')
            ))
        ))
    ));

    //===================================ОПТ И ДРОПШИППИНГ
    Container::make('post_meta', 'КОНТЕНТ СТРАНИЦЫ')
    ->show_on_page(253)
    ->add_fields(array(
        Field::make('text', 'wholesale_title', 'Заголовок страницы'),

        Field::make('rich_text', 'wholesale_keynote', 'Введите "вступительные слова"'),

        Field::make('image', 'wholesale_image', 'Выберите изображение'),

        Field::make('complex', 'wholesale_list', 'СПИСОК ДОСТУПНЫХ ВАРИАНТОВ')
        ->add_fields(array(
            Field::make('text', 'wholesale_list_title', 'Введите заголовок для списка')->set_width(50),
            Field::make('complex', 'wholesale_list_items', 'Элементы списка')->set_width(50)
            ->add_fields(array(
                Field::make('text', 'wholesale_list_item', 'Введите текст')
            ))
        ))
    ));

    //===================================КОНТАКТЫ
    Container::make('post_meta', 'КОНТЕНТ СТРАНИЦЫ')
    ->show_on_page(266)
    ->add_fields(array(
        Field::make('text', 'contacts_title', 'Заголовок страницы'),
        Field::make('text', 'contacts_btn_text', 'Введите текст кнопки')
    ));

    //===================================ОТЗЫВЫ О МАГАЗИНЕ
    Container::make('post_meta', 'КОНТЕНТ СТРАНИЦЫ')
    ->show_on_page(270)
    ->add_tab('Отзывы из соцсетей', array(
        Field::make('complex', 'reviews_slider', 'КАРУСЕЛЬ ОТЗЫВОВ ИЗ СОЦСЕТЕЙ')
        ->add_fields(array(
            Field::make('image', 'reviews_slider_image', 'Выберите скриншот')
        ))
    ))


        
    ->add_tab('Список отзывов', array(
        Field::make('complex', 'reviews_list', 'ОТЗЫВЫ О МАГАЗИНЕ')
        ->add_fields(array(
            Field::make('image', 'reviews_customer_avatar', 'Загрузите аватар пользователя')->set_width(50),
            Field::make('text', 'reviews_customer_name', 'Укажите фамилию и имя клиента')->set_width(50),
            // Field::make('text', 'reviews_customer_grade', 'Поставьте оценку (от 1 до 5)')->set_width(50),
            Field::make('select', 'reviews_customer_grade', 'Выберите оценку')
            ->set_options(array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            )),
            Field::make('rich_text', 'reviews_customer_review', 'Введите текст отзыва')
        ))
    ))


?>
