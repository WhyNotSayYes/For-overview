<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>


<section class="catalog__container container">

<!-- ========================================================================================== -->

<aside class="catalog__categories">
		
		<?php

		echo '<ul class="catalog__categories_list">';

		$args = array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'parent'   => 0,
			'orderby'    => 'count',
			'order'      => 'DESC',
		);
		$product_cat = get_terms( $args );
	
		foreach ($product_cat as $parent_product_cat)
		{

		$thumbnail_id = get_woocommerce_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
	
		echo '

				<li class="catalog__categories_item">
					
					<div class="catalog__categories_icon-inner"><img src="'.  wp_get_attachment_url( $thumbnail_id ) .'" alt="greenhouse_icon" class="catalog__categories_icon"></div>

					<a href="'.get_term_link($parent_product_cat->term_id).'" class="catalog__categories_link">'.$parent_product_cat->name.'
					</a>
						<ul class="catalog__sub-categories_list">
				';
		$child_args = array(
					'taxonomy' => 'product_cat',
					'hide_empty' => false,
					'parent'   => $parent_product_cat->term_id
				);
		$child_product_cats = get_terms( $child_args );
		foreach ($child_product_cats as $child_product_cat)
		{
		echo '
							<li class="catalog__sub-categories_item">
								<a href="'.get_term_link($child_product_cat->term_id).'" class="catalog__subcategories_link">'.$child_product_cat->name.'</a>
							</li>';
		}
	
		echo '
			</li>
		</ul>';
		}

		echo '</ul>';

		?>
</aside>

<!-- ========================================================================================== -->


<?php
if ( woocommerce_product_loop() ) {

?>

	<div class="catalog__page">

		<div class="woocommerce-products-header">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="catalog__page_title woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>

		<!-- КАТЕГОРИИ ДЛЯ МОБ. ВЕРСИИ - СТАРТ-->

		<div class="catalog__categories">
		
		<?php

		echo '<ul class="catalog__categories_list">';

		$args = array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'parent'   => 0,
			'orderby'    => 'count',
			'order'      => 'DESC',
		);
		$product_cat = get_terms( $args );
	
		foreach ($product_cat as $parent_product_cat)
		{

		$thumbnail_id = get_woocommerce_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
	
		echo '

				<li class="catalog__categories_item">
					
					<div class="catalog__categories_icon-inner"><img src="'.  wp_get_attachment_url( $thumbnail_id ) .'" alt="greenhouse_icon" class="catalog__categories_icon"></div>

					<a href="'.get_term_link($parent_product_cat->term_id).'" class="catalog__categories_link">'.$parent_product_cat->name.'
					</a>
						<ul class="catalog__sub-categories_list">
				';
		$child_args = array(
					'taxonomy' => 'product_cat',
					'hide_empty' => false,
					'parent'   => $parent_product_cat->term_id
				);
		$child_product_cats = get_terms( $child_args );
		foreach ($child_product_cats as $child_product_cat)
		{
		echo '
							<li class="catalog__sub-categories_item">
								<a href="'.get_term_link($child_product_cat->term_id).'" class="catalog__subcategories_link">'.$child_product_cat->name.'</a>
							</li>';
		}
	
		echo '
			</li>
		</ul>';
		}

		echo '</ul>';

		?>
		</div>

		<!-- КАТЕГОРИИ ДЛЯ МОБ. ВЕРСИИ - КОНЕЦ-->

		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
		?>
		</div>

		<div class="catalog__page_filters catalog-filters">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20 - removed
		 * @hooked pro_selectbox - 25 - added
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action( 'woocommerce_before_shop_loop' );
		?>
		</div>
	<?php

	

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );

	?>

	</div>

	<?php

	
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>

</section>



<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );


/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer();
