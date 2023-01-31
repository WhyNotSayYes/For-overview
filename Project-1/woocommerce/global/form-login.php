<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     7.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="tabs-content__page_inner woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

	<div class="ordering__tab-fields_field tab-field form-row form-row-first">
		<label for="username" class="tab-field__title"><?php esc_html_e( 'Ел. пошта', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<div class="tab-field__input-inner">
			<input type="text" class="tab-field__input input-text" name="username" id="username" autocomplete="username" />
		</div>
	</div>
	<div class="ordering__tab-fields_field tab-field form-row form-row-last">
		<label for="password" class="tab-field__title"><?php esc_html_e( 'Пароль', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<div class="tab-field__input-inner">
			<input class="tab-field__input input-text woocommerce-Input" type="password" name="password" id="password" autocomplete="current-password" />
		</div>
	</div>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<div class="ordering__tab-fields_field tab-field form-row">
		<div class="empty_div tab-field__title"></div>
		<div class="tab-field__input-inner">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Запам\'ятати мене', 'woocommerce' ); ?></span>
			</label>
		</div>
	</div>
	<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
	<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
	<div class="tab-field__for-registered-buttons">
		<button type="submit" class="green__button woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'УВІЙТИ', 'woocommerce' ); ?></button>
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="tab-field__for-registered-buttons_link"><?php esc_html_e( 'Забули пароль?', 'woocommerce' ); ?></a>
	</div>


	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
