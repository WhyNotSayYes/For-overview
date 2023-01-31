<?php $page_id = get_the_ID();?>

<?php get_header(); ?>

    <main class="main">
        <section id="welcome" class="main__welcome welcome">
            
            <div class="welcome__container container ">
                <div class="welcome__text-block">
                    <h1 class="welcome__title">
                        <?php echo carbon_get_post_meta($page_id, 'main_title')?>
                    </h1>
                    <p class="welcome__subtitle">
                        <?php echo carbon_get_post_meta($page_id, 'main_subtitle')?>
                    </p>
                    <a href="#connect" class="button order button-margin" data-scroll="#connect">
                        <?php echo carbon_get_theme_option('cta') ?>
                    </a>
                </div>
                <div class="welcome__image-block">
                    <div class="welcome__image">
                        <?php 
                            $main_image_id = carbon_get_post_meta($page_id, 'main_image');
                            $main_image_src = wp_get_attachment_image_url($main_image_id, 'full');
                        ?>
                        <img src="<?php echo $main_image_src; ?>" alt="prototypes" class="welcome__image_img">
                    </div>
                </div>
                <div class="square-1"></div>
                <div class="square-2"></div>
                <div class="square-3"></div>
                <div class="square-4"></div>
                <div class="square-5"></div>
                <div class="square-6"></div>
                <div class="square-7"></div>
            </div>
        </section>
        <section id="reviews" class="main__reviews reviews">
            <div class="reviews__slider">
                <?php
                    $list_items = carbon_get_post_meta(get_the_ID(), 'reviews_slider');

                    if (!empty($list_items)) :
                ?>
                <?php 
                    foreach ($list_items as $list_item) :
                ?>

                <div class="reviews__item">
                    <p class="reviews__text">
                        <?php echo $list_item['reviews_slider_text']?>
                    </p>
                    <p class="reviews__person">
                        <?php echo $list_item['reviews_slider_author']?>
                    </p>
                </div>
                
                <?php
                    endforeach;
                ?>
                <?php 
                    endif;
                ?>            
            </div>
        </section>
        <section id="services" class="main__services services">
            <div class="services__container container">
                <div class="services__title-repeat title-repeat transform-left">
                    <?php echo carbon_get_post_meta($page_id, 'services_title')?>
                </div>
                <div class="services__content content">
                    <h2 class="services__title title transform-right">
                        <?php echo carbon_get_post_meta($page_id, 'services_title')?>
                    </h2>
                    <article class="services__items">

                    <?php
                        $list_items = carbon_get_post_meta(get_the_ID(), 'services_group');

                        if (!empty($list_items)) :
                    ?>
                    <?php 
                        foreach ($list_items as $list_item) :
                    ?>


                        <div class="services__item">
                            <h3 class="services__item-title">
                                <?php echo $list_item['services_group_name']?>
                            </h3>

                            <ul class="services__list">
                           
                            <?php 
                                foreach ($list_item['services_items'] as $point) :
                            ?>

                                <li class="services__list-item">
                                    <?php echo $point['services_item']?>
                                </li>

                            <?php
                                endforeach;
                            ?>
                         
                            </ul>

                        </div>   

                    <?php
                        endforeach;
                    ?>
                    <?php 
                        endif;
                    ?>           
                       
                    </article>
                </div>
            </div>
        </section>
        <section class="main__order-block order-block">
            <div class="order-block__container container">
                <p class="order-block__text">
                    <?php echo carbon_get_post_meta($page_id, 'cta_text')?>
                </p>
                <a href="#connect" class="order-block__button button order" data-scroll="#connect">
                    <?php echo carbon_get_theme_option('consultation') ?>
                </a>
            </div>
        </section>
        <section id="about" class="main__about about">
            <div class="about__container container">
                <article class="about__text">
                    <div class="about__title-repeat title-repeat transform-left">
                        <?php echo carbon_get_post_meta($page_id, 'about_title')?>
                    </div>
                    <div class="about__text-content content">
                        <h2 class="about__title title transform-right">
                            <?php echo carbon_get_post_meta($page_id, 'about_title')?>
                        </h2>
                        <p class="about__text-content_text">
                            <?php echo carbon_get_post_meta($page_id, 'about_subtitle')?>
                        </p>
                    </div>
                </article>
                <article class="about__content">
                    <div class="about__items">
                        <div class="about__item">
                            <div class="about__item-left">
                                <img src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'service1_icon'), 'full') ?>" alt="icon" class="about__item_icon">
                            </div>
                            <div class="about__item-right">
                                <h3 class="about__item_title">
                                    <?php echo carbon_get_post_meta($page_id, 'service1_title')?>
                                </h3>
                                <p class="about__item_subtitle">
                                    <?php echo carbon_get_post_meta($page_id, 'service1_text')?>
                                </p>
                            </div>
                        </div>
                        <div class="about__item">
                            <div class="about__item-left">
                                <img src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'service2_icon'), 'full') ?>" alt="icon" class="about__item_icon">
                            </div>
                            <div class="about__item-right">
                                <h3 class="about__item_title">
                                    <?php echo carbon_get_post_meta($page_id, 'service2_title')?>
                                </h3>
                                <p class="about__item_subtitle">
                                    <?php echo carbon_get_post_meta($page_id, 'service2_text')?>
                                </p>
                            </div>
                        </div>
                        <div class="about__item">
                            <div class="about__item-left">
                                <img src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'service3_icon'), 'full') ?>" alt="icon" class="about__item_icon">
                            </div>
                            <div class="about__item-right">
                                <h3 class="about__item_title">
                                    <?php echo carbon_get_post_meta($page_id, 'service3_title')?>
                                </h3>
                                <p class="about__item_subtitle">
                                    <?php echo carbon_get_post_meta($page_id, 'service3_text')?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <section id="clients" class="main__clients clients">
            <div class="clients__container container">
                <div class="clients__content">
                    <div class="clients__items">
                        <div class="clients__item">
                            <div class="clients__item-left">
                                <img src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'clients1_icon'), 'full') ?>" alt="icon" class="clients__item_icon">
                            </div>
                            <div class="clients__item-right">
                                <h3 class="clients__item_title">
                                    <?php echo carbon_get_post_meta($page_id, 'clients1_title')?>
                                </h3>
                                <p class="clients__item_subtitle">
                                    <?php echo carbon_get_post_meta($page_id, 'clients1_text')?>
                                </p>
                            </div>
                        </div>
                        <div class="clients__item">
                            <div class="clients__item-left">
                                <img src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'clients2_icon'), 'full') ?>" alt="icon" class="clients__item_icon">
                            </div>
                            <div class="clients__item-right">
                                <h3 class="clients__item_title">
                                    <?php echo carbon_get_post_meta($page_id, 'clients2_title')?>
                                </h3>
                                <p class="clients__item_subtitle">
                                    <?php echo carbon_get_post_meta($page_id, 'clients2_text')?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clients__text-content">
                    <div class="clients__title-repeat title-repeat transform-left">
                        <?php echo carbon_get_post_meta($page_id, 'clients_title')?>
                    </div>
                    <div class="clients__text content">
                        <h2 class="clients__title title transform-right">
                            <?php echo carbon_get_post_meta($page_id, 'clients_title')?>
                        </h2>
                        <p class="clients__text_text">
                            <?php echo carbon_get_post_meta($page_id, 'clients_subtitle')?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="portfolio" class="main__portfolio portfolio">
            <div class="portfolio__container container">
                <div class="portfolio__title-repeat title-repeat transform-left">
                    <?php echo carbon_get_post_meta($page_id, 'portfolio_title')?>
                </div>
                <article class="portfolio__content content">
                    <h2 class="portfolio__title title transform-right">
                        <?php echo carbon_get_post_meta($page_id, 'portfolio_title')?>
                    </h2>
                    <div class="portfolio__items">

                    <?php
                        $list_items = carbon_get_post_meta(get_the_ID(), 'portfolio_item');

                        if (!empty($list_items)) :
                    ?>
                    <?php 
                        foreach ($list_items as $list_item) :
                    ?>

                        <a class="portfolio__item" href="<?php echo $list_item['item_link']?>" target="_blank"> 
                            <img src="<?php echo wp_get_attachment_image_url($list_item['item_image'], 'full');?>" alt="screenshot" class="portfolio__item_img">
                            <div class="portfolio__item_overlay item-overlay">
                                <div class="item-overlay__title">
                                    <?php echo $list_item['item_title']?>
                                </div>
                                <div class="item-overlay__objectives">
                                    <?php echo $list_item['item_objective']?>
                                </div>
                            </div>
                        </a>

                    <?php
                    endforeach;
                    ?>
                    <?php 
                        endif;
                    ?>                

                    </div>
                    <button class="button order portfolio-button">
                        <?php echo carbon_get_theme_option('more') ?>
                    </button>
                </article>
            </div>
        </section>
        <section id="connect" class="main__connect connect">
            <div class="connect__container container">
                <div class="connect__tittle-repeat title-repeat transform-left">
                    <?php echo carbon_get_post_meta($page_id, 'connect_title')?>
                </div>
                <div class="connect__content content">
                    <h2 class="connect__title title transform-right">
                        <?php echo carbon_get_post_meta($page_id, 'connect_title')?>
                    </h2>
                    <article class="connect__inner">
                        <form action="" class="connect__form form-send">
                            <div class="input__wrapper">
                                <input type="text" name="Имя" placeholder="Введіть Ваше ім'я" class="connect__input-name" required>
                                <span class="form__error">Нам дуууже цікаво знати, як до Вас звертатися:)</span>
                            </div>
                            <div class="input__wrapper">
                                <input type="tel" name="Телефон" placeholder="Введіть Ваш номер" class="connect__input-number" required>
                                <span class="form__error">Введіть, будь-ласка, номер у форматі 0501234567</span>
                            </div>
                            <div class="select__title">
                                Що Вас цікавить?
                            </div>
                            <div class="dropdown__wrapper">
                                    <button type="button" class="dropdown__button">
                                        Сайт "Під ключ"
                                    </button>
                                    <ul class="dropdown__list">
                                    
                                    <?php
                                        $list_items = carbon_get_post_meta(get_the_ID(), 'connect_dropdown');

                                        if (!empty($list_items)) :
                                    ?>
                                    <?php 
                                        foreach ($list_items as $list_item) :
                                    ?>

                                        <li class="dropdown__item" data-value="<?php echo $list_item['dropdown_item']?>"><?php echo $list_item['dropdown_item']?></li>
                                    
                                    <?php
                                    endforeach;
                                    ?>
                                    <?php 
                                        endif;
                                    ?>            

                                    </ul>
                                    <input type="text" name="Услуга" class="dropdown__input" value="Сайт 'Під ключ'">
                            </div>
                            <button type="submit" id="submit" class="button order connect-button">
                                <?php echo carbon_get_theme_option('send') ?>
                            </button>
                        </form>
                        <div class="connect__image">
                            <?php 
                                $connect_image_id = carbon_get_post_meta($page_id, 'connect_image');
                                $connect_image_src = wp_get_attachment_image_url($connect_image_id, 'full');
                            ?>
                            <img src="<?php echo $connect_image_src;?>" alt="envelope" class="connect__image_img">
                        </div>
                    </article>
                </div>
                <div class="connect__square-1"></div>
                <div class="connect__square-2"></div>
                <div class="connect__square-3"></div>
                <div class="connect__square-4"></div>
                <div class="connect__square-5"></div>
                <div class="connect__square-6"></div>
                <div class="connect__square-7"></div>
                <div class="connect__square-8"></div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>