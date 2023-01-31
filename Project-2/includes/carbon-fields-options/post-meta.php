<?php

    if(!defined('ABSPATH')) {
        exit;
    }
    
     use Carbon_Fields\Container;
     use Carbon_Fields\Field;
    
     //Поля для Главной

     Container::make( 'post_meta', 'Дополнительные поля' )
     ->show_on_page(14)

     ->add_tab('Первый экран', array(
         Field::make( 'rich_text', 'main_title', 'Заголовок' ),
         Field::make( 'rich_text', 'main_subtitle', 'Подзаголовок' ),
         Field::make( 'image', 'main_image', 'Изображение' ),
     ) )

     ->add_tab('Отзывы', array(
        Field::make( 'complex', 'reviews_slider', 'Слайдер с отзывами' )
        ->add_fields( array(
            Field::make( 'rich_text', 'reviews_slider_text', 'Текст отзыва' )->set_width(50),
            Field::make( 'text', 'reviews_slider_author', 'Автор, город' )->set_width(50)
        ))
        
     ) )
    
     ->add_tab('Услуги', array(
        Field::make( 'text', 'services_title', 'Заголовок раздела' ),
        Field::make( 'complex', 'services_group', 'Группа услуг' )
        ->add_fields( array(
            Field::make( 'text', 'services_group_name', 'Название группы' )->set_width(50),
            Field::make( 'complex', 'services_items', 'Пункты списка' )->set_width(50)
            ->add_fields( array(
                Field::make( 'text', 'services_item', 'Услуга' )
            ))
        ))
    ) )

    ->add_tab('Раздел CTA', array(
        Field::make( 'rich_text', 'cta_text', 'Текст' ),
    ) )

    ->add_tab('О нас', array(
        Field::make( 'text', 'about_title', 'Заголовок раздела' ),
        Field::make( 'rich_text', 'about_subtitle', '"Вступительное слово"' ),
        Field::make( 'image', 'service1_icon', 'Иконка' )->set_width(33),
        Field::make( 'text', 'service1_title', 'Заголовок' )->set_width(33),
        Field::make( 'rich_text', 'service1_text', 'Текст' )->set_width(33),
        Field::make( 'image', 'service2_icon', 'Иконка' )->set_width(33),
        Field::make( 'text', 'service2_title', 'Заголовок' )->set_width(33),
        Field::make( 'rich_text', 'service2_text', 'Текст' )->set_width(33),
        Field::make( 'image', 'service3_icon', 'Иконка' )->set_width(33),
        Field::make( 'text', 'service3_title', 'Заголовок' )->set_width(33),
        Field::make( 'rich_text', 'service3_text', 'Текст' )->set_width(33)
    ) )

    ->add_tab('ЦА', array(
        Field::make( 'text', 'clients_title', 'Заголовок раздела' ),
        Field::make( 'rich_text', 'clients_subtitle', '"Вступительное слово"' ),
        Field::make( 'image', 'clients1_icon', 'Иконка' )->set_width(33),
        Field::make( 'text', 'clients1_title', 'Заголовок' )->set_width(33),
        Field::make( 'rich_text', 'clients1_text', 'Текст' )->set_width(33),
        Field::make( 'image', 'clients2_icon', 'Иконка' )->set_width(33),
        Field::make( 'text', 'clients2_title', 'Заголовок' )->set_width(33),
        Field::make( 'rich_text', 'clients2_text', 'Текст' )->set_width(33)
    ) )

    ->add_tab('Портфолио', array(
        Field::make( 'text', 'portfolio_title', 'Заголовок раздела' ),
        Field::make( 'complex', 'portfolio_item', 'Проект' )
        ->add_fields( array(
            Field::make( 'text', 'item_title', 'Название проекта' ),
            Field::make( 'text', 'item_objective', 'Задача' ),
            Field::make( 'image', 'item_image', 'Скриншот (540*300)' ),
            Field::make( 'text', 'item_link', 'Ссылка на стр. проекта' ),
        ))
    ) )

    ->add_tab('Форма отправки', array(
        Field::make( 'text', 'connect_title', 'Заголовок раздела' ),
        Field::make( 'image', 'connect_image', 'Изображение' ),
        Field::make( 'complex', 'connect_dropdown', 'Выпадающий список' )
            ->add_fields( array(
                Field::make( 'text', 'dropdown_item', 'Элемент списка')
            ))
    ) );


    //Поля для страницы проекта
    Container::make( 'post_meta', 'Дополнительные поля' )
     ->show_on_template('page-post.php')

     ->add_tab('Настройки страницы', array(
        Field::make( 'text', 'project_title', 'Заголовок страницы' ),
        Field::make( 'text', 'project_name', 'Название проекта' )->set_width(50),
        Field::make( 'complex', 'project_shots', 'Скриншоты' )->set_width(50)
            ->add_fields( array(
                Field::make( 'image', 'project_image', 'Изображение' )
            )),
        Field::make( 'complex', 'project_objectives', 'Задачи' )
            ->add_fields( array(
                Field::make( 'rich_text', 'project_objective', 'Задача' )
            )),
        Field::make( 'complex', 'project_solutions', 'Решения' )
            ->add_fields( array(
                Field::make( 'rich_text', 'project_solution', 'Решение' )
            )),
        Field::make( 'text', 'project_link', 'Ссылка на сайт' )
    ) );

?>
