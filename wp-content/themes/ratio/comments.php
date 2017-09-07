<div class="edgtf-comment-holder clearfix" id="comments">
	<div class="edgtf-comment-number">
		<div class="edgtf-comment-number-inner">
			<h3><?php comments_number( esc_html__('No Comments','ratio'), '1'.esc_html__(' Comment ','ratio'), '% '.esc_html__(' Comments ','ratio')); ?></h3>
		</div>
	</div>
<div class="edgtf-comments">
<?php if ( post_password_required() ) : ?>
				<p class="edgtf-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'ratio' ); ?></p>
			</div></div>
<?php
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>

	<ul class="edgtf-comment-list">
		<?php wp_list_comments(array( 'callback' => 'ratio_edge_comment')); ?>
	</ul>


<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'ratio'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'Post a Comment','ratio' ),
	'title_reply_to' => esc_html__( 'Post a Reply to %s','ratio' ),
	'cancel_reply_link' => esc_html__( 'Cancel Reply','ratio' ),
	'label_submit' => esc_html__( 'Submit','ratio' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Write your comment here...','ratio' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="edgtf-three-columns clearfix"><div class="edgtf-three-columns-inner clearfix"><div class="edgtf-column"><div class="edgtf-column-inner"><input id="author" name="author" placeholder="'. esc_html__( 'Your full name','ratio' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
		'url' => '<div class="edgtf-column"><div class="edgtf-column-inner"><input id="email" name="email" placeholder="'. esc_html__( 'E-mail address','ratio' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>',
		'email' => '<div class="edgtf-column"><div class="edgtf-column-inner"><input id="url" name="url" type="text" placeholder="'. esc_html__( 'Website','ratio' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div></div>'
		 ) ) );

	if(is_user_logged_in()){
		$args['class_form'] = 'edgtf-comment-registered-user';
		$args['title_reply_before'] = '<h3 id="reply-title" class="comment-reply-title edgtf-comment-reply-title-registered">';
	}

 ?>
<?php if(get_comment_pages_count() > 1){
	?>
	<div class="edgtf-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
 <div class="edgtf-comment-form">
	<?php comment_form($args); ?>
</div>
								
							


