<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'good__item', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );


	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );


	/**
	 * Хук, закрывающий ссылку, которая открывается хуком woocommerce_before_shop_loop_item
	 */
	do_action('custom_product_link_close');

	?>


	<div class="good__text-block">
		<div class="good__row-1">

	<?php
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 * 
	 * @hooked custom_product_title - 10 (from functions.php)
	 * 
	 * @hooked add_to_favorites_button (from catalog-functions.php)
	 */

			do_action( 'woocommerce_shop_loop_item_title' ); 
	?>

		</div>

		<div class="good__row-2">

			<?php 
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' ); 
			?>
			
		</div>

	

		<div class="good__row-3">

			<div class="good__price">
				<?php do_action('custom_price_block'); ?>
			</div>

			<div class="good__annotation">
				<?php do_action('custom_annotation'); ?>
			</div>
		</div>

	</div>

	<?php
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5 - функция отключена
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );
	
	button_buy_on_one_click();
	?>
</li>
