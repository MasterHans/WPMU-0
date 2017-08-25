<?php
global $post;
/*Get All or nothing page by slug all-or-nothing*/
$args = ['ID' => $post->ID, 'post_type' => 'woo_faq', 'post_status' => 'publish'];
$myposts = get_posts($args);
?>


<div class="mb6 col-8 mt_faq_main">
    <h3 class="type-24 normal mb2">
        Frequently Asked Questions
    </h3>
</div>
<div class="mb6 flex">
    <ul class="faqs col-8">

        <?php foreach ($myposts as $post) {
            setup_postdata($post);
            //стандартный вывод записей
            ?>


            <li class="js-faq bg-white border mb2 shadow-button rounded hover-bg-grey-200">
                <div>
                    <a href="#" class="js-faq-question-toggle p3 no-outline flex items-center">
                    <span class="type-14 navy-700 medium">
                        <?php the_title() ?>
                    </span>
                    <span class="navy-600 pl3 ml-auto">
                    <div class="js-arrow-icon">
                        <svg class="svg-icon__arrow-right svg-icon--sm fill-navy-600" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-right"></use>
                        </svg>
                    </div>
                    </span>
                    </a>
                </div>
                <div class="js-faq-answer pl3 pr9 hide">
                    <?php
                    $args_answer = [
                        'post_id' => $post->ID,
                        'post_type' => 'woo_faq',
                        'status' => 'approve',
                        'number' => 1,
                    ];
                    if ($comments = get_comments($args_answer)) :
                        foreach ($comments as $comment):?>
                            <div class="type-14 navy-700 normal mt_answer_content">
                                <?= get_comment_text($comment->comment_ID) ?>
                            </div>
                            <div class="type-12 navy-500 mb3">
                                Last updated:
                                <time datetime="<?=motivation_date_tag_format($comment->comment_date)?>" data-format="llll z" class="js-adjust-time">
                                    <?= motivation_date_output_format($comment->comment_date) ?>
                                </time>
                            </div>

                        <?php endforeach;
                    endif; ?>
                </div>
            </li>


        <?php }
        wp_reset_postdata(); // сбрасываем переменную $post ?>
    </ul>

    <div class="h20p col-right col-4 border-left border-thick border-grey-500 pl4 ml7 py2">
        <p class="mt_faq_ask_header type-14">Don't see the answer to your question? Ask the project creator directly.</p>
    <span><a class="remote_modal_dialog message_creator_modal_link bttn bttn-medium bttn-blue js-ask-a-question"
             data-modal-class="modal_send_message"
             data-modal-title="Ask a question about Moment 2.0: Make your iPhone or Pixel A Better ..." href="#">
            Ask a question
        </a>
    </span>
    </div>
</div>
