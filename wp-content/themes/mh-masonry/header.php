<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
        <?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Результаты&nbsp; поиска<?php } ?>
        <?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
        <?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив&nbsp;| &nbsp;<?php single_cat_title(); ?><?php } ?>
        <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Метки&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
    </title>

    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container logo">
    <div class="row">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="logo" class="logo-img">
        <p class="slogan">интересно об it-решениях</p>
    </div>
</div>

<div class="container header">
    <div class="row">
        <div id="main-menu" class="navbar navbar-default main-menu">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                        <span class="sr-only">Открыть навигацию</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <?php
                    if(function_exists('wp_nav_menu')) {
                        wp_nav_menu( 'theme_location=menu_1&menu_class=nav navbar-nav main-nav&container=&fallback_cb=menu_2_default');
                    } else {
                        menu_2_default();
                    }

                    function menu_2_default()
                    {
                        ?>
                        <ul class="nav navbar-nav main-nav">
<!--                            <li --><?php //if(is_home()) { echo ' class="current-cat" '; } ?><!--><a href="--><?php //bloginfo('url'); ?><!--">Home</a></li>-->
                            <?php wp_list_categories('depth=3&exclude=1&hide_empty=0&orderby=name&show_count=0&use_desc_for_title=1&title_li='); ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>