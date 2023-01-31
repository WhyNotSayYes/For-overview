<footer class="footer">
            <div class="footer__container container">
                <div class="footer__logo">
                    <span><</span> Майстерня <span>></span>
                </div>
                <div class="footer__social">
                    <div class="footer__social_item">
                        <?php 
                            $connect_image_id = carbon_get_theme_option('inst_icon');
                            $connect_image_src = wp_get_attachment_image_url($connect_image_id, 'full');
                        ?>
                        <a href="http://instagram.com/<?php echo carbon_get_theme_option('company_inst') ?>" class="footer__social_link"><img src="<?php echo $connect_image_src;?>" alt="Instagram" class="footer__social_img"></a>
                    </div>
                    <div class="footer__social_item">
                        <?php 
                            $connect_image_id = carbon_get_theme_option('fb_icon');
                            $connect_image_src = wp_get_attachment_image_url($connect_image_id, 'full');
                        ?>
                        <a href="https://www.facebook.com/<?php echo carbon_get_theme_option('company_fb') ?>" class="footer__social_link"><img src="<?php echo $connect_image_src;?>" alt="Facebook" class="footer__social_img"></a>
                    </div>
                    <div class="footer__social_item">
                        <?php 
                            $connect_image_id = carbon_get_theme_option('tg_icon');
                            $connect_image_src = wp_get_attachment_image_url($connect_image_id, 'full');
                        ?>
                        <a href="tg://resolve?domain=<?php echo carbon_get_theme_option('company_tg') ?>" class="footer__social_link"><img src="<?php echo $connect_image_src;?>" alt="Telegram" class="footer__social_img"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="popup-thnx popup" id="popup-thnx">
        <div class="popup-thnx__body">
            <div class="popup-thnx__content">
                <a href="#" class="popup-thnx__close close-popup">
                    <?php 
                        $close_image_id = carbon_get_theme_option('close_icon');
                        $close_image_src = wp_get_attachment_image_url($close_image_id, 'full');
                    ?>
                    <img src="<?php echo $close_image_src;?>" alt="close">
                </a>
                <div class="popup-thnx__title">
                    Ваша заявка вже у нас!
                </div>
                <div class="popup-thnx__text">
                    Найближчим часом наш спеціаліст зв'яжеться з Вами ;)
                </div>
            </div>
        </div>
    </div>

    <?php wp_footer();?>
</body>
</html>