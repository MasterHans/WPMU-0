<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
        ?>

        <p class="nocomments">Введите пароль.</p>

        <?php
        return;
    }
}

/* This variable is for alternating comment background */
$oddcomment = '';
?>

<!--    <br />-->
<?php if ($comments) : ?>

    <h4 id="comments">Обсуждение. <?php comments_number('Пока нет комментариев', 'Есть 1 комментарий', 'Оставлено % коммент.' );?></h4>

    <div class="commentlist alert alert-success">
        <?php wp_list_comments('avatar_size=64'); ?>
    </div>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->

    <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

    <div id="respond">
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>

        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>Пожалуйста,  <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">зарегистрируйтесь </a> для комментирования.</p>
        <?php else : ?>

            <!--тут форма-->

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-inline">

                <?php if ( $user_ID ) : ?>

                    <p>Здравствуйте, <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти">Выход &raquo;</a></p>

                <?php else : ?>

                    <legend>Оставить комментарий</legend>
                    <label>Ваше имя*</label>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" class="form-control" name="author" placeholder="Имя">
                    </div>
                    <br>
                    <label>Ваш e-mail*</label>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input type="text" class="form-control" name="email" placeholder="e-mail">
                    </div>
                    <br>

                <?php endif; ?>

                <textarea id="comment" style="display: none;" name="comment"></textarea>

                <label>Текст сообщения</label>
                <br>
                <div class="input-group">
                    <textarea id="real-comment" name="real-comment"></textarea>
                    <br />

<!--                                --><?php //if( function_exists(checkbot_show) ) { checkbot_show(); } ?>
                <p><input name="submit" type="submit" id="submit" tabindex="5" value="Отправить" class="btn btn-primary btn-submit" />
                    <?php comment_id_fields(); ?>
                </p>
                    <?php do_action('comment_form', $post->ID); ?>
                </div>


            </form>
        <?php endif; // If registration required and not logged in ?>
    </div>

<?php endif; // if you delete this the sky will fall on your head ?>