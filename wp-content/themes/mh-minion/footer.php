
</div>

<div id="footer">
    <div id="footer-menu-container">

        <?php
        if ( function_exists( 'wp_nav_menu' ) )
            wp_nav_menu(
                array(
                    'theme_location' => 'custom-menu',
                    'fallback_cb'=> 'custom_menu',
                    'container' => 'ul',
                    'menu_id' => 'footer-menu',
                    'menu_class' => 'footer-menu')
            );
        else custom_menu();
        ?>



        <div class="clear"></div>
        <div id="copyright">
            <p><i class="fa fa-copyright"></i> 2015 Мастер Ганс</p>
        </div>
    </div>



    <div id="minion-footer">
        <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/minions-footer.png" alt="">
    </div>
</div>


 <?php wp_footer()?>
</body>
</html>