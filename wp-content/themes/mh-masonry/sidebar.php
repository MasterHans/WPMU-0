<div class="container col-lg-3 sidebar">
    <div class="row">
        <div class="socset">

            <!--Кнопки соц. сетей-->
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/google-mono.png" alt="Google+"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/twitter-mono.png" alt="Twitter"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/rss-mono.png" alt="Rss"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/ok-mono.png" alt="Одноклассники"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/vk-mono.png" alt="В контакте"></a>
            <!--Текст в шапке-->

        </div>
        <hr class="hr-sidebar">

        <div class="hidden-sm formsearch">
            <?php get_search_form(); ?>
        </div>

        <?php
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : endif;
        ?>


    </div>
</div>