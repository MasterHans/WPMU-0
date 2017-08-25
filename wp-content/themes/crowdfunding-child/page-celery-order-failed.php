<?php
/*
Template Name: Celery order failed
*/
?>
<?php get_header(); ?>
<?php get_template_part('lib/sub-header'); ?>

        <main id="main-region" role="main">
            <div class="celery-page-container">
                <div id="content-region" class="celery-page-body">
                    <div class="Confirmation" style="opacity: 1; display: block;">
                        <div class="Confirmation-message">
                            <img class="failed-image animated tada"
                                 src="<?php echo get_stylesheet_directory_uri() . '/motivation/lib/img/failed.png' ?>">

                            <h3>Sorry, Order Failed!</h3>

                            <p class="Confirmation-orderInfo">
                                Order failed on Celery!
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        <!--/#content-->
    </section><!--/#main-->
<?php get_footer();