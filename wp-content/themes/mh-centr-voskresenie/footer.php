<footer>
    <div class="block blackish">
        <div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax5.jpg);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <div class="about">
                            <img src="<?php echo get_template_directory_uri() ?>/img/logo-centr.png" alt="Митрополичий реабилитационный центр Воскресение|centr-voskresenie.ru " />
                            <div class="contact">
                                <ul>
                                    <li><span><i class="fa fa-phone"></i>Телефон :</span>
                                        <?php
                                        $options = get_option('sample_theme_options');
                                        echo $options['phonetext']; ?>
                                    </li>
                                    <li><span><i class="fa fa-envelope"></i>Email:</span>
                                        <?php
                                        $options = get_option('sample_theme_options');
                                        echo $options['emailtext']; ?>
                                    </li>
                                    <li><span><i class="fa fa-home"></i>Адрес:</span>
                                        <?php
                                        $options = get_option('sample_theme_options');
                                        echo $options['addresstext']; ?>
                                    </li>
                                </ul>
                            </div>
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
                    </div>
                </div><!-- ABOUT WIDGET -->
                <div class="col-md-4">
                    <div class="widget">
                        <div class="widget-title"><h4>Быстрое сообщение</h4></div>
                        <div class="quick-message">
                            <div id="message"></div>
                            <form method="post" action="<?php echo get_template_directory_uri() ?>/contact.php" name="contactform" id="contactform">
                                <input name="name" class="half-field form-control" type="text" id="name"  placeholder="Имя" />
                                <input name="email" class="half-field form-control" type="text" id="email" placeholder="Email" />
                                <textarea name="comments" class="form-control" id="comments" placeholder="Ваше сообщение" ></textarea>
                                <input class="submit" type="submit"  id="submit" value="ОТПРАВИТЬ" />

                            </form><!--- FORM -->
                        </div>
                    </div>
                </div><!-- QUICK MESSAGE WIDGET -->

                <div class="col-md-4">
                    <div class="widget">
                        <div class="widget-title"><h4>Отзывы о нас</h4></div>
                        <div class="remove-ext">
                            <?php
                                $idObj = get_category_by_slug('otzyivyi');/*Получаем категорию по слагу*/
                                $cat_otziv_id = $idObj->term_id;
                                $args = ['category' => $cat_otziv_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '2'];
                                $myposts = get_posts( $args );
                                foreach( $myposts as $post ){ setup_postdata($post);
                                    // стандартный вывод записей
                            ?>
                                <div class="widget-blog">

                                    <div class="widget-blog-img">
                                        <?php echo the_post_thumbnail( [97,97] ); ?>
                                    </div>
                                    <h6><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h6>
                                    <p><?php echo get_post_meta($post->ID,'description',true); ?></p>
                                    <span><i class="fa fa-calendar-o"></i><?php the_time('j M. Y') ?></span>
                                </div><!-- WIDGET BLOG -->
                            <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>

                        </div>

                    </div>
                </div><!-- RECENT BLOG -->
            </div>
        </div>
    </div>
</footer><!-- FOOTER -->

<div class="bottom-footer">
    <div class="container">
        <p>©<?php echo date('Y') ?> <a href="#" title="">Митрополичий</a> Реабилитационный Центр <a href="#" title="">"Воскресенье"</a></p>

    </div>
</div><!-- BOTTOM FOOTER STRIP -->



</div>

<!-- SCRIPTS-->
<script src="<?php echo get_template_directory_uri() ?>/js/modernizr.custom.17475.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.1.10.2.js" type="text/javascript"></script>

<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.poptrox.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/enscroll-0.5.2.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.knob.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/knob-script.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>


<script src="<?php echo get_template_directory_uri() ?>/js/jquery.downCount.js" type="text/javascript"></script>
<script class="source" type="text/javascript">
    $('.countdown').downCount({
        date: '06/25/2022 12:00:00',
        offset: +10
    });
    $('.countdown2').downCount({
        date: '12/12/2014 12:00:00',
        offset: +10
    });
    $('.countdown3').downCount({
        date: '12/07/2014 12:00:00',
        offset: +10
    });
    $('.countdown4').downCount({
        date: '09/01/2016 12:00:00',
        offset: +10
    });
    $('.countdown5').downCount({
        date: '09/11/2018 12:00:00',
        offset: +10
    });
</script>

<script>
    $(document).ready(function() {
        $(".event-carousel").owlCarousel({
            autoPlay: false,
            rewindSpeed : 3000,
            slideSpeed:2000,
            items : 3,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,2],
            itemsTablet : [768,2],
            itemsMobile : [479,1],
            navigation : false,
        }); /*** PRODUCTS CAROUSEL ***/

        $(".pastors-carousel").owlCarousel({
            autoPlay: 5000,
            slideSpeed:1000,
            singleItem : true,
            transitionStyle : "goDown",
            navigation : false
        }); /*** CAROUSEL ***/

        $(".team-carousel").owlCarousel({
            autoPlay: 8000,
            rewindSpeed : 3000,
            slideSpeed:2000,
            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,2],
            itemsTablet : [768,2],
            itemsMobile : [479,1],
            navigation : false,
        }); /*** TEAM CAROUSEL ***/

    });

    //	$('audio,video').mediaelementplayer();
</script>

<!-- SLIDER REVOLUTION -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/revolution/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/revolution/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#slider1").revolution({
            sliderType:"standard",
            sliderLayout:"fullwidth",
            delay:7000,
            navigation: {
                arrows:{enable:true}
            },
            gridwidth:1100,
            gridheight:500
        });
    });

</script>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'L53Cljkh26';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->


<!--BEGIN Для кнопки callback JIVOSITE-->
<!--<script src="--><?php //echo get_template_directory_uri() ?><!--/jscallbut.js" type="text/javascript"></script>-->
<!--END Для кнопки callback JIVOSITE-->

<!--Показать/Спрятать -->
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            if ($(this).scrollTop()>90)

                $('#menu-phone').animate({
                    opacity: 1
                }, 0, function() {
                    // Animation complete.
                });
            else

                $('#menu-phone').animate({
                    opacity: 0
                }, 0, function() {
                    // Animation complete.
                });


        })
    })

</script>

<script>
    /*** AJAX CONTACT FORM ***/
    $('#contactform').submit(function(){
        var action = $(this).attr('action');
        $("#message").slideUp(750,function() {
            $('#message').hide();
            $('#submit')
                .after('<img src="<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif" class="loader" />')
                .attr('disabled','disabled');
            console.log(action);
            $.post(action, {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    comments: $('#comments').val(),
                    verify: $('#verify').val()
                },
                function(data){
                    document.getElementById('message').innerHTML = data;
                    $('#message').slideDown('slow');
                    $('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
                    $('#submit').removeAttr('disabled');
                    if(data.match('success') != null) $('#contactform').slideUp('slow');

                }
            );
        });
        return false;
    });
</script>


<?php wp_footer() ?>
</body>