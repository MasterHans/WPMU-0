<!DOCTYPE html>
<html lang="en">
<head>



    <link href='https://fonts.googleapis.com/css?family=Bad+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">

    <meta charset="UTF-8">
    <title>Мастер Ганс Шаблон № 1</title>
    <?php wp_head();?>

</head>
<body >


<div id = "header">

    <div id="header-top-block">
        <div id="header-top-line">
            <!--Кнопки соц. сетей-->
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/vkonakte.png" alt="В контакте"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/ok.png" alt="Одноклассники"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/youtube.png" alt="YouTube"></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/img/gplus.png" alt="Google+"></a>
            <!--Текст в шапке-->
            <p>Авторский проэкт об IT-технологиях.</p>
        </div>
    </div>

    <div id="header-main-line">
        <p>Мастер</p>
        <a href="http://wp.tw1.su"><img src="<?php bloginfo('template_url'); ?>/img/minion1.png" alt="Логотип-Миньон"></a>
        <p>Ганс</p>
        <div id="pagemenu-container">
<!--            <ul id="pagemenu">-->
<!--                <li><a href="#">Карта сайта</a></li>-->
<!--                <li><a href="#">Контакты</a></li>-->
<!--                <li><a href="http://wp.tw1.su/obo-mne/">Обо мне</a></li>-->
<!--            </ul>-->
            <?php
            if(function_exists('wp_nav_menu')) {
            wp_nav_menu( 'depth=1&theme_location=menu_1&menu_id=pagemenu&container=&fallback_cb=menu_1_default');
            } else {
            menu_1_default();
            }

            function menu_1_default()
            {
            ?>

            <ul id="pagemenu">
                <li <?php if(is_home()) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Главная</a></li>
                <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>
            </ul>
            <?php
            } ?>


        </div>
    </div>

    <div id="main-nav">

        <?php
        if(function_exists('wp_nav_menu')) {
            wp_nav_menu( 'theme_location=menu_2&menu_id=main-menu&container=&fallback_cb=menu_2_default');
        } else {
            menu_2_default();
        }

        function menu_2_default()
        {
            ?>
            <ul id="nav">
                <li <?php if(is_home()) { echo ' class="current-cat" '; } ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
                <?php wp_list_categories('depth=3&exclude=1&hide_empty=0&orderby=name&show_count=0&use_desc_for_title=1&title_li='); ?>
            </ul>
            <?php
        }
        ?>




    </div>

</div>
