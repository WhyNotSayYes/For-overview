<footer class="footer">
            <div class="footer__container container">
                <?php wp_nav_menu( [
                    'theme_location' => 'footer_menu',
                    'container' => false,
                    'menu_class' => 'footer__menu',
                ])
                ?>
                <div class="footer__contacts">
                    <h3 class="footer__contacts_title">
                        КОНТАКТИ
                    </h3>
                    <ul class="footer__contacts_list">
                        <li class="footer__contacts_item footer__phone">
                            <a href="tel: <?php echo carbon_get_theme_option('number_to_call') ?>" class="footer__contacts_link"><?php echo carbon_get_theme_option('contact_number') ?></a>
                        </li>
                        <li class="footer__contacts_item footer__adress"><?php echo carbon_get_theme_option('footer_adress') ?></li>
                        <li class="footer__contacts_item footer__schedule"><?php echo carbon_get_theme_option('footer_schedule') ?></li>
                    </ul>
                    <div class="footer__social">
                        <div class="footer__social_title">
                            Ми в соцмережах
                        </div>
                        <ul class="footer__social_list">
                            <li class="footer__social_item">
                                <a href="<?php echo carbon_get_theme_option('inst_link') ?>" class="footer__social_link">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/main_imgs/footer_inst_icon.png" alt="footer_inst_icon" class="footer__social_icon">
                                </a>
                            </li>
                            <li class="footer__social_item">
                                <a href="<?php echo carbon_get_theme_option('fb_link') ?>" class="footer__social_link">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/main_imgs/footer_fb_icon.png" alt="footer_fb_icon" class="footer__social_icon">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a href="#callback" class="callback__button orange__button popup-link">
                        <?php echo carbon_get_theme_option('callback_btn_text_footer') ?>
                    </a>
                </div>
                <div class="footer__map">
                    <?php echo carbon_get_theme_option('footer_map') ?>
                </div>
            </div>
        </footer>

        <!-- === BUY ON ONE CLICK === -->
        <!-- Form Popup -->
        <section class="buy-on-one-click__layout popup" id="buy-on-one-click">
            <div class="popup__body">
                <form class="buy-on-one-click__content popup__content sendform" method="POST" action="wp-content/themes/agroprom/mail.php">
                    <div class="popup-close close-popup">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/popup/close-icon.png" alt="close-icon" class="popup-close__icon">
                    </div> 
                    <h1 class="buy-on-one-click__title">
                        Швидке замовлення:<br>
                        <span></span>
                    </h1>
                    <div class="buy-on-one-click__input-wrapper tab-field">
                        <input required type="text" name="name" placeholder="Ім'я">
                    </div>
                    <div class="buy-on-one-click__input-wrapper tab-field">
                        <input required type="text" name="phone" placeholder="Телефон">
                    </div>
                    <div class="quantity">
                        <label for="qty" class="buy-on-one-click_quantity-name">Бажана кількість</label>
                        <div class="buy-on-one-click_counter counter">
                            <button type="button" class="minus" data-action="minus">-</button>
                            <input type="text" name="qty" class="input qty" step="1" size="4" value="1" data-counter/>
                            <button type="button" class="plus" data-action="plus">+</button>
                        </div>
                    </div>
                    <input type="hidden" name="product" value="">

                    <button type="submit" class="buy-on-one-click__btn green__button">ЗАМОВИТИ</button>
                </form>
            </div>
        </section>
        
        <!-- Success Popup -->
        <section class="buy-on-one-click__layout popup buy-on-one-click_success">
            <div class="popup__body">
            <div class="buy-on-one-click__content popup__content">
                <div class="popup-close close-popup">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/popup/close-icon.png" alt="close-icon" class="popup-close__icon">
                </div> 
                <h1 class="buy-on-one-click__title">
                    Замовлення прийнято!
                </h1>
                <p class="buy-on-one-click__popup_text">
                    Очікуйте дзвінка консультанта для уточнення деталей.
                </p>
            </div>
            </div>
        </section>
        
        <!-- Fuck up Popup -->
        <section class="buy-on-one-click__layout popup buy-on-one-click_fuck-up">
            <div class="popup__body">
            <div class="buy-on-one-click__content popup__content">
                <div class="popup-close close-popup">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/popup/close-icon.png" alt="close-icon" class="popup-close__icon">
                </div> 
                <h1 class="buy-on-one-click__title">
                    Вибачте!
                </h1>
                <p class="buy-on-one-click__popup_text">
                    Виникла технічна помилка.<br>
                    Залиште свої контактні дані та наш представник зв'яжеться з Вами.
                </p>
                <a href="#callback" class="callback__button orange__button popup-link">
                    <?php echo carbon_get_theme_option('callback_btn_text') ?>
                </a>
            </div>
            </div>
        </section>

        <!-- === AUTH === -->
        <section class="auth__layout popup" id="auth">
            <div class="popup__body">
                <div class="auth__content popup__content">
                    <div class="popup-close close-popup">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/popup/close-icon.png" alt="close-icon" class="popup-close__icon">
                    </div> 
                    <div class="auth__header">
                        <nav class="auth__tab-items tab-items">
                            <div data-tab-name="tab-1" class="tab-items__item is-active">Вхід</div>
                            <div data-tab-name="tab-2" class="tab-items__item">Реєстрація</div>
                        </nav>
                    </div>
                    <div class="auth__tabs-content tabs-content">
                        <form class="tabs-content__page tab-page tab-1 is-active" method="POST">

                            <?php do_action( 'woocommerce_login_form_start' ); ?>

                            <div class="auth__input-wrapper tab-field">
                                <input required type="text" class="tab-field__input input-text" name="username" id="username" autocomplete="username" placeholder="Логін"/>
                            </div>
                            <div class="auth__input-wrapper tab-field">
                                <input required class="tab-field__input input-text woocommerce-Input" type="password" name="password" id="password" autocomplete="current-password" placeholder="Пароль"/>
                            </div>
                            <div class="clear"></div>

                            <?php do_action( 'woocommerce_login_form' ); ?>

                            <div class="tab-field__input-inner">
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Запам\'ятати мене', 'woocommerce' ); ?></span>
                                </label>
                            </div>

                            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                            <input type="hidden" name="redirect" value="<?php echo esc_url(get_permalink()); ?>" />
                            <div class="tab-field__for-registered-buttons">
                                <button type="submit" class="green__button woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'УВІЙТИ', 'woocommerce' ); ?></button>
                                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="tab-field__for-registered-buttons_link"><?php esc_html_e( 'Забули пароль?', 'woocommerce' ); ?></a>
                            </div>
                            <div class="clear"></div>
                            <?php do_action( 'woocommerce_login_form_end' ); ?>
                        </form>

                        <form class="tabs-content__page tab-page tab-2" method="POST" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>">
                            <div class="registration__input-wrapper tab-field">
                                <input required type="text" name="user_login" placeholder="Логін">
                            </div>
                            <div class="registration__input-wrapper tab-field">
                                <input required type="text" name="user_email" placeholder="Эл. пошта">
                            </div>

                            <?php do_action('register_form'); ?>
                            
                            <button type="submit" class="registration__btn green__button">ЗАРЕЄСТРУВАТИСЯ</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- === CALLBACK === -->
        <!-- Form Popup -->
        <section class="callback__layout popup" id="callback">
            <div class="popup__body">
                <form class="callback__content popup__content sendform" method="POST" action="wp-content/themes/agroprom/mail.php">
                    <div class="popup-close close-popup">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/popup/close-icon.png" alt="close-icon" class="popup-close__icon">
                    </div> 
                    <h1 class="callback__title">
                        Замовити дзвінок
                    </h1>
                    <div class="callback__input-wrapper tab-field">
                        <input required type="text" name="name" placeholder="Ім'я">
                    </div>
                    <div class="callback__input-wrapper tab-field">
                        <input required type="text" name="phone" placeholder="Телефон">
                    </div>

                    <button type="submit" class="callback__btn green__button">НАДІСЛАТИ</button>
                </form>
            </div>
        </section>

        <!-- Success Popup -->
        <section class="buy-on-one-click__layout popup callback_success">
            <div class="popup__body">
                <div class="buy-on-one-click__content popup__content">
                    <div class="popup-close close-popup">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/popup/close-icon.png" alt="close-icon" class="popup-close__icon">
                    </div> 
                    <h1 class="buy-on-one-click__title">
                        Дякуємо!
                    </h1>
                    <p class="buy-on-one-click__popup_text">
                        Очікуйте дзвінка консультанта для уточнення деталей.
                    </p>
                </div>
            </div>
        </section>

    </div>

    <?php wp_footer(); ?>

</body>
</html>