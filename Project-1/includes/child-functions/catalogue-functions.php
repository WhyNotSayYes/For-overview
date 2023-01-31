<?php
//====================================СТИЛИЗАЦИЯ СТРАНИЦЫ КАТАЛОГА

//АДАПТИРОВАННЫЙ ВАРИАНТ
// изменения сортировки товаров
add_filter( 'woocommerce_catalog_orderby', 'wc_customize_product_sorting' );

function wc_customize_product_sorting( $sorting_options ) {
    $sorting_options = array(
        // 'menu_order' => __( 'Default sorting', 'woocommerce' ),
        'popularity' => __( 'За популярністю', 'woocommerce' ),
        // 'rating' => __( 'За середнім рейтингом', 'woocommerce' ),
        'date' => __( 'Спочатку нові', 'woocommerce' ),
        'price' => __( 'Ціни за зростанням', 'woocommerce' ),
        'price-desc' => __( 'Ціни по спадінню', 'woocommerce' ),
    );

    return $sorting_options;
}

//выбор кол-ва товаров на странице
add_action( 'woocommerce_before_shop_loop', 'pro_selectbox', 25 );
function pro_selectbox() {
    $per_page = filter_input( INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT );


    echo '<div class="woocommerce-perpage">';
        echo '<div class="woocommerce-perpage-title">Показувати: </div>';
        echo '<select onchange="if (this.value) window.location.href=this.value">';
            $orderby_options = array(
                '6' => '6',
                '12' => '12',
                '24' => '24',
                '300' => 'Усі'
            );
            foreach ( $orderby_options as $value => $label ) {
                echo "<option " . selected( $per_page, $value ) . " value='?perpage=$value'>$label</option>";
            }
        echo '</select>';   
    echo '</div>';

}


add_action( 'pre_get_posts', 'pro_pre_get_products_query' );
function pro_pre_get_products_query( $query ) {
    $per_page = filter_input( INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT );
    if ( $query->is_main_query() && !is_admin() && is_post_type_archive( 'product' ) ) {
        $query->set( 'posts_per_page', $per_page );
    }
}

//убираю вывод инфо о кол-ве товаров на странице
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

//убираю вывод уведомлений CMS о добавлении товара в корзину на странице каталога
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

//====================================СТИЛИЗАЦИЯ КАРТОЧКИ ТОВАРА В КАТАЛОГЕ

//ссылка на карточку товара (открывающий тег)
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item', 'custom_product_link_open', 10);

function custom_product_link_open() {
    global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="good__item-link woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

//ссылка на карточку товара (закрывающий тег)
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('custom_product_link_close', 'custom_product_link_close');

function custom_product_link_close() {
    echo '</a>';
}


//название товара
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'custom_product_title', 10);

function custom_product_title(){
    echo '<h2 class="good__title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}


//кнопка "В избранное"
add_action('woocommerce_shop_loop_item_title', 'add_to_favorites_button');

function add_to_favorites_button() {
    global $post;
    if(in_array($post->ID, favorite_id_array())) { ?>
        <button class="add-to-favorites fv_<?php echo $post->ID; ?> delete-favorite" title="Вже у Бажаннях" data-post_id="<?php echo $post->ID; ?>"></button>
    <?php } else { ?>
        <button class="add-to-favorites fv_<?php echo $post->ID; ?> add-favorite" title="Додати до Бажань" data-post_id="<?php echo $post->ID; ?>"></button>
    <?php }
}

//кнопка "Заказать в 1 клик"
function button_buy_on_one_click() {
    echo '
    <button class="good__order_one-click green__button buy-one-click-btn">
        <a href="#buy-on-one-click" class="popup-link">ЗАМОВИТИ В 1 КЛІК</a>
    </button>';
}

//рейтинг

function custom_get_star_rating_html( $rating, $count = 0 ) {
	$html = '<div class="rating"><div class="rating-title">Рейтинг</div><div class="rating-stars"><span style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';

	if ( 0 < $count ) {
		/* translators: 1: rating 2: rating count */
		$html .= sprintf( _n( 'Рейтинг&nbsp; %1$s', 'Рейтинг&nbsp; %1$s', $count, 'woocommerce' ), '<strong class="rating-num">' . esc_html( $rating ) . '</strong>', '<span class="rating-num">' . esc_html( $count ) . '</span>' );
	} else {
		/* translators: %s: rating */
		$html .= sprintf( esc_html__( 'Рейтинг&nbsp; %s', 'woocommerce' ), '<strong class="rating-num">' . esc_html( $rating ) . '</strong>' );
	}

	$html .= '</span></div></div>';

	return apply_filters( 'woocommerce_get_star_rating_html', $html, $rating, $count );
}


//цена

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('custom_price_block', 'custom_price');
function custom_price() {
    wc_get_template( 'loop/price.php' );
}

//статус наличия товара
add_action('custom_annotation', 'custom_stocks');

function custom_stocks() {
    global $product;
    if ( $product->is_in_stock() ) {
        echo '<div class="good__availability" >Товар у наявності</div>';
    } else {
        echo '<div class="good__availability out" >Відсутній на складі</div>';
    }
}

//иконка гарантии
add_action('custom_annotation', 'guarantee_icon');

function guarantee_icon() {
        echo '<div class="good__guarantee" >Гарантія 3 роки</div>';
}
?>