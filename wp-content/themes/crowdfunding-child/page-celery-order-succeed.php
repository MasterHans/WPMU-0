<?php
/*
Template Name: Celery order succeed
*/
?>

<?php get_header(); ?>
<?php get_template_part('lib/sub-header'); ?>

        <main id="main-region" role="main">
            <div class="celery-page-container">
                <div id="content-region" class="celery-page-body">
                    <div class="Confirmation" style="opacity: 1; display: block;">
                        <div class="Confirmation-message">
                            <img class="Confirmation-image animated tada"
                                 src="<?php echo get_stylesheet_directory_uri() . '/motivation/lib/img/thankyou_check@2x.png' ?>">

                            <h3>Thank you!</h3>

                            <p class="Confirmation-orderInfo">
                                Your order number is <strong>#<span><?= $_GET['number'] ?></span></strong>. You'll receive an e-mail
                                confirmation shortly for your records.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        <!--/#content-->
    </section><!--/#main-->
<?php get_footer();
