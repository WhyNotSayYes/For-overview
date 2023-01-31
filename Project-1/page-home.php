<?php

/*
Template Name: Главная
*/

?>

<?php get_header(); ?>

<main class="main">
    <section class="main__offers offers">
        <div class="offers__container container">
            <div class="offers__slider">

            <?php
                $homepage_slider = carbon_get_post_meta(get_the_ID(), 'home_slider');

                if(!empty($homepage_slider)) :
                    foreach($homepage_slider as $slide) :
            ?>

                <div class="offers__slider_item slider-item">
                    <img src="<?php echo wp_get_attachment_image_url($slide['home_slider_image']); ?>" alt="offers_bg" class="slider-item__background">
                    <div class="slider__item_text">
                        <div class="slider-item__upper-subtitle"><?php echo $slide['home_slider_upper_title']; ?></div>
                        <h1 class="slider-item__title"><?php echo $slide['home_slider_title']; ?></h1>
                        <h2 class="slider-item__subtitle"><?php echo $slide['home_slider_under_title']; ?></h2>
                        <?php if($slide['home_slider_button_text']) { ?>
                        <a href="<?php echo $slide['home_slider_button_link']; ?>" class="slider-item__button orange__button"><?php echo $slide['home_slider_button_text']; ?></a>
                        <?php } ?>
                    </div>
                </div>

            <?php
                    endforeach;
                endif;
            ?>
                
            </div>
            
            <div class="offers__counter">
                <div class="offers__counter_banner">
                    <?php
                        $counter_image_id = carbon_get_post_meta(get_the_ID(), 'home_counter_image');
                        $counter_image_src = wp_get_attachment_image_url($counter_image_id, 'full');

                        if($counter_image_id) :
                    ?>
                    <img src="<?php echo $counter_image_src; ?>" alt="counter_background" class="offers__counter_image">
                    <?php
                        endif;
                    ?>
                    <div class="offers__counter_banner-overlay"></div>
                    <div class="offers__counter_text">
                        <?php echo carbon_get_post_meta(get_the_ID(), 'home_counter_text'); ?>
                    </div>
                </div>

                <div class="offers__counter_meter meter">
                    <div class="meter__item">
                        <div id="days" class="meter__item_value"></div>
                        <div class="meter__item_timename">ДНІВ</div>
                    </div>
                    <div class="meter__item">
                        <div id="hours" class="meter__item_value"></div>
                        <div class="meter__item_timename">ГОДИН</div>
                    </div>
                    <div class="meter__item">
                        <div id="minutes" class="meter__item_value"></div>
                        <div class="meter__item_timename">ХВИЛИН</div>
                    </div>
                    <div class="meter__item">
                        <div id="seconds" class="meter__item_value"></div>
                        <div class="meter__item_timename">СЕКУНД</div>
                    </div>
                </div>
                <div class="target-date"><?php echo carbon_get_post_meta(get_the_ID(), 'home_counter_date_time'); ?></div>
            </div>
        </div>
    </section>
    <section class="main__propositions propositions">
        <div class="propositions__container container">
            <h3 class="propositions__title">
                <?php echo carbon_get_post_meta(get_the_ID(), 'home_on_sale_title'); ?>
            </h3>
            <div class="propositions__content">
                <ul class="good__items">
                    <?php
                    $products_on_sale = wc_get_product_ids_on_sale();
                    $args = array(
                        'post_type' => 'product',
                        'post__in' => array_merge(array(0), $products_on_sale)
                    );
                    $loop = new WP_Query($args);

                    if($loop->have_posts()) {
                        while($loop->have_posts()) : $loop->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                    }

                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>