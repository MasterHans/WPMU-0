<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
        <?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Результаты&nbsp; поиска<?php } ?>
        <?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив автора<?php } ?>
        <?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
        <?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
        <?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив&nbsp;| &nbsp;<?php single_cat_title(); ?><?php } ?>
        <?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив&nbsp; <?php the_time('F'); ?><?php } ?>
        <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Метки&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Православный реабилитационный центр Воскресение. Лечение наркомании и алкоголизма. Раебилитация наркозависимых и алкозависимых людей. Вхождение в социум. Как избавиться от зависимости."/>
    <meta name="keywords" content="лечение наркомании лечение алкоголизма избавление от табачной зависимости реабилитация в центре социальное жильё вхождение в социум как избавиться от наркотиков." />

    <!--favicon-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl-carousel.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/revolution.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/settings.css" type="text/css" media="screen" />


    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/colors/red.css" type="text/css" title="red" />

    <?php wp_head(); ?>
</head>

<body>
<div class="theme-layout">
    <header class="header2 stick">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo-site-name">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="logo">
                                        <a href="<?php echo get_home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo-centr-brown.png" alt="Митрополичий еабилитационный центр Воскресение|centr-voskresenie.ru"/></a>
                                    </div><!--- LOGO -->
                                </div>
                                <div class="col-sm-9">
                                    <div class="site-name">
                                        <p class="site-name-stroka2">митрополичий</p>
                                        <p class="site-name-stroka2">реабилитационный центр</p>
                                        <p class="site-name-stroka1">"<span class="span1">В</span>оскресение"</p>
                                        <p class="site-name-stroka2">Московский Патриархат</p>
                                        <p class="site-name-stroka2">Русская Православная Церковь</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">

                        <div class="topbar-middle">

                            <p class="topbar-call-us">Звоните прямо сейчас!</p>
                            <p class="topbar-telephone"><i class="fa fa-phone"></i>
<!--                                Телефон из настроек моей темы админке-->
                                <?php
                                $options = get_option('sample_theme_options');
                                echo $options['phonetext']; ?>
                            </p><!--- CONTACT -->
                            <p class="topbar-callback"><a href="#" onclick="jivo_api.open({start : 'call'});" title="Мы перезвоним вам через 27 секунд">ОСТАВЬТЕ ЗАЯВКУ МЫ ПЕРЕЗВОНИМ</a></p>

                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="topbar-internet">
                            <div class="social-block">
                                <ul class="social-media">
                                    <?php
                                    $idObj = get_category_by_slug('socials');/*Получаем категорию по слагу*/
                                    $soc_id = $idObj->term_id;
                                    $args = ['category' => $soc_id];
                                    $myposts = get_posts( $args );
                                    foreach( $myposts as $post ){ setup_postdata($post);
                                        // стандартный вывод записей
                                        ?>
                                        <li><a title="<?php the_title(); ?>" href="<?php echo get_post_meta($post->ID,'social_url',true) ?>" target="_blank"><i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i></a></li>
                                    <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
                                </ul>
                            </div>
                            <p class="topbar-email"><i class="fa fa-envelope"></i>
                                <?php
                                    $options = get_option('sample_theme_options');
                                    echo $options['emailtext'];
                                ?>
                            </p><!--- EMAIL -->
                            <div class="narc">
                                <div class="narc-sign">
                                    <?php
                                    $idObj = get_category_by_slug('docs');/*Получаем категорию по слагу*/
                                    $id = $idObj->term_id;
                                    ?>
                                    <p><a href="<?php echo get_category_link($id) ?>" title="<?php echo get_cat_name($id) ?>">Участник Национальной  Ассоциации<br> Реабилитационных Центров</a></p>
                                    <p><a href="<?php echo get_home_url(); ?>/wp-content/uploads/2016/03/dogovor.rar" title="">Скачать Договор</a></p>
                                </div>
                                <img src="<?php echo get_template_directory_uri() ?>/img/narc.png" alt="НАРЦ">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div><!--- TOP BAR -->

        <nav>
            <div class="container">
                <!--телефон-->
                <div id="menu-phone">
                    <i class="fa fa-phone"></i>
                    <?php
                    $options = get_option('sample_theme_options');
                    echo $options['phonetext']; ?>
                </div>

                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu_1',
                    'fallback_cb' => '__return_empty_string'
                ) );
                ?>

                <form class="header-search" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" placeholder="Введите строку поиска" name="s" id="s"/>
                    <input type="submit" value="" />
                </form>
            </div>
        </nav>
    </header><!--- HEADER -->
    <div class="responsive-header">
        <div class="responsive-prayer">
            <div class="responsive-topbar-callback">
                <a href="#" onclick="jivo_api.open({start : 'call'});" title="Мы перезвоним вам через 27 секунд">Закажите обратный звонок</a>
            </div>
        </div>
        <div class="responsive-contact">
		<span>
			<p class="responsive-phone">
                <i class="fa fa-phone"></i>
                <?php
                $options = get_option('sample_theme_options');
                echo $options['phonetext']; ?>
            </p>
			<p class="responsive-mail">
                <i class="fa fa-envelope"></i>
                <?php
                $options = get_option('sample_theme_options');
                echo $options['emailtext'];
                ?>
            </p>
		</span>
            <a class="phone-btn active" href="#" title=""><i class="fa fa-phone"></i></a>
            <a class="mail-btn" href="#" title=""><i class="fa fa-envelope"></i></a>
        </div><!-- Responsive Contact -->
        <div class="responsive-extras">
            <div class="responsive-search">
                <span><i class="fa fa-search"></i></span>
                <form action="<?php echo home_url( '/' ); ?>">
                    <input type="text" placeholder="Введите строку поиска" name="s" id="s"/>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form><!-- Responsive Search -->
            </div>
            <div class="responsive-social">
                <?php
                $idObj = get_category_by_slug('socials');/*Получаем категорию по слагу*/
                $soc_id = $idObj->term_id;
                $args = ['category' => $soc_id];
                $myposts = get_posts( $args );
                foreach( $myposts as $post ){ setup_postdata($post);
                    // стандартный вывод записей
                    ?>
                    <a title="<?php the_title(); ?>" href="<?php echo get_post_meta($post->ID,'social_url',true) ?>" target="_blank"><i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i></a>
                <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
            </div><!-- Responsive Social -->
        </div><!-- Responsive Extras -->
        <div class="responisve-bar">
            <div class="responsive-logo"><a href="#" title=""><img src="<?php echo get_template_directory_uri() ?>/img/logo-centr-brown.png" alt="" /></a></div>
            <div class="responsive-site-name">
                <p class="responsive-site-name-stroka2">митрополичий</p>
                <p class="responsive-site-name-stroka2">реабилитационный центр</p>
                <p class="responsive-site-name-stroka1">"<span class="span1">В</span>оскресение"</p>
                <p class="responsive-site-name-stroka2">Московский Патриархат</p>
                <p class="responsive-site-name-stroka2">Русская Православная Церковь</p>
            </div>
            <span class="responsive-btn"><i class="fa fa-list"></i></span>
        </div>
    </div><!-- Responsive Header -->

    <div class="responsive-menu">

        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu_mobile',
            'fallback_cb' => '__return_empty_string'
        ) );
        ?>

    </div><!-- Responsive Menu -->
